<?php

/**
 * ZeusEdy.php
 *
 * @copyright Copyright (C)  ZEUS CO.,LTD.All Rights Reserved.
 * @version $Id: ZeusEdy.php 22307 2013-09-25 05:03:18Z shimada $
 */

require_once(CLASS_REALDIR. 'SC_Session.php');

class ZeusEdy extends LC_Page_Ex {

    var $objFormParam;
    var $objQuery;
    var $objPurchase;

    var $isMobile;
    var $isPc;
    var $isSPhone;

    function ZeusEdy() {
        $this->httpCacheControl('nocache');
        $request_type = 
           (   (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') 
               || (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == '1') 
               || (isset($_SERVER['HTTP_X_FORWARDED_BY']) && strstr(strtoupper($_SERVER['HTTP_X_FORWARDED_BY']),'SSL') ) 
               || (isset($_SERVER['HTTP_X_FORWARDED_HOST']) &&  strstr(strtoupper($_SERVER['HTTP_X_FORWARDED_HOST']),'SSL') ) 
               || (isset($_SERVER['SCRIPT_URI']) && strtolower(substr($_SERVER['SCRIPT_URI'], 0, 6)) == 'https:') 
               || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ) 
           ) ? 'SSL' : 'NONSSL';
        if( $request_type === 'NONSSL' ){
            $netUrl = new Net_URL($_SERVER['REQUEST_URI']);
            $session = SC_SessionFactory::getInstance();
            if (SC_Display_Ex::detectDevice() == DEVICE_TYPE_MOBILE || $session->useCookie() == false) {
                $netUrl->addQueryString(session_name(), session_id());
            }
            $netUrl->addQueryString(TRANSACTION_ID_NAME, SC_Helper_Session_Ex::getToken());
            $url = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            header('Location: '.$url);
            exit;
        }
        $this->objQuery     = new SC_Query();
        $this->objFormParam = new SC_FormParam();
        $this->objPurchase  = new SC_Helper_Purchase_Ex();
    }

    function init() {
        if (version_compare(ECCUBE_VERSION, '2.13.0-dev') >=0) {
            $this->skip_load_page_layout = true;
            $this->tpl_column_num        = 1;
        }
        parent::init();
        $this->isMobile = (SC_Display_Ex::detectDevice() == DEVICE_TYPE_MOBILE);
        $this->isSPhone = (SC_Display_Ex::detectDevice() == DEVICE_TYPE_SMARTPHONE);
        $this->isPc     = ( !$this->isMobile && !$this->isSPhone );
        if ($this->isMobile) {
            $this->tpl_mainpage = realpath(dirname( __FILE__)) . "/tpl_edy/zeus_edy_mobile.tpl";
        } elseif ($this->isSPhone) {
            $this->tpl_mainpage = realpath(dirname( __FILE__)) . "/tpl_edy/zeus_edy_sphone.tpl";
        } else {
            $this->tpl_mainpage = realpath(dirname( __FILE__)) . "/tpl_edy/zeus_edy.tpl";
        }

        $this->allowClientCache();
    }

    function process() {
        $objCartSess = new SC_CartSession();

        foreach ($objCartSess->getKeys() as $key) {
            $this->tpl_message = $objCartSess->checkProducts($key);
            $this->tpl_total_inctax[$key] = $objCartSess->getAllProductsTotal($key);
            $this->tpl_total_tax[$key] = $objCartSess->getAllProductsTax($key);
        }

        if ( !$this->isMobile ) {
            $this->tpl_onload = " document.charset='shift_jis'; document.nextform.acceptCharset='shift_jis'; setTimeout(\"document.nextform.submit()\", 2000); ";
        }
        $this->tpl_uniqid = $this->getOrderTempId($_SESSION['order_id']);
        $orderData = $this->objPurchase->getOrderTemp($this->tpl_uniqid);
        $paymentDbData = $this->getPaymentDB($orderData['order_id']);

        $this->objFormParam->setParam($_POST);
        if( $paymentDbData['status'] != ORDER_PENDING || $paymentDbData['del_flg'] != 0 || $_SESSION['zeus_edy_order_id'] == $_SESSION['order_id'] ){ // 決済処理中でなければエラーとする。
            SC_Utils_Ex::sfDispSiteError(PAGE_ERROR);
            exit;
        }
        $_SESSION['zeus_edy_order_id'] = $_SESSION['order_id'];

        $this->setDispData($orderData['payment_id'],  $paymentDbData, $orderData);
        $this->sendResponse();
    }

    function getOrderTempId($orderId) {
        $ret = $this->objQuery->getRow('order_temp_id', 'dtb_order_temp', 'order_id = ?',
                                 array($orderId));
        return $ret['order_temp_id'];
    }

    function setDispData($payment_id, $paymentDbData, $orderData ) {

        $this->arrForm   = $this->objFormParam->getFormParamList();

        $this->clientip  = $paymentDbData['clientip'];
        $this->act       = ($this->isMobile)?'mobile_order':'order';
        $this->money     = $paymentDbData['payment_total'];
        $this->username  = mb_convert_kana($paymentDbData['order_kana01'].' '.$paymentDbData['order_kana02'], 'KVS', CHAR_CODE );
        $this->telno     = $paymentDbData['order_tel01']. $paymentDbData['order_tel02']. $paymentDbData['order_tel03'];
        $this->email     = $paymentDbData['order_email'];
        $this->sendid    = $orderData['order_id'];
        $this->sendpoint = $this->getSendPoint($paymentDbData['clientauthkey'], $paymentDbData['clientip'], $orderData['order_id']);
        if ($this->isMobile) {
            $this->tpl_title = ZEUS_EDY_SITE_TITLE_MOBILE;
        }else{
            $this->tpl_title = ZEUS_EDY_SITE_TITLE;
        }
        $this->success_url    = $paymentDbData['success_url'];
        $this->success_str    = $paymentDbData['success_str'];
        $this->failure_url    = $paymentDbData['failure_url'];
        $this->failure_str    = $paymentDbData['failure_str'];
        $this->edyLinkPointUrl = EDY_LINK_POINT_URL;
    }

    function getPaymentDB($orderId){
        $arrRet = array();
        $sql = "SELECT ".
               "   dtb_payment.memo01 as clientip ,       ".
               "   dtb_payment.memo02 as clientauthkey  , ".
               "   dtb_payment.memo04 as success_url    , ".
               "   dtb_payment.memo05 as success_str    , ".
               "   dtb_payment.memo06 as failure_url    , ".
               "   dtb_payment.memo07 as failure_str    , ".
        	   "   dtb_order.payment_total,".
               "   dtb_order.status,       ".
               "   dtb_order.order_kana01, ".
               "   dtb_order.order_kana02, ".
               "   dtb_order.order_tel01,  ".
               "   dtb_order.order_tel02,  ".
               "   dtb_order.order_tel03,  ".
               "   dtb_order.order_email,  ".
               "   dtb_order.del_flg       ".
               " FROM dtb_order ".
               "     LEFT JOIN dtb_payment ".
               "          ON dtb_order.payment_id = dtb_payment.payment_id ".
               " WHERE dtb_order.order_id = ? ";
        $arrRet = $this->objQuery->getall($sql, array($orderId));
        return $arrRet[0];
    }

    function getSendPoint($privateKey, $ipcode, $orderNo) {
        return sha1($privateKey. $this->numberToStrReplace($ipcode . $orderNo));
    }

    function numberToStrReplace($val) {
        $search  = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
        $replace = array('D', 'Y', 'Z', 'J', 'W', 'M', 'T', 'S', 'B', 'P');
        return str_replace($search, $replace, $val);
        
    }
}
?>
