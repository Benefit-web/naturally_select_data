<?php

/**
 * ZeusSecureApi.php
 *
 * @copyright Copyright (C)  ZEUS CO.,LTD.All Rights Reserved.
 * @version $Id: ZeusSecureApi.php 22307 2013-09-25 05:03:18Z shimada $
 */

require_once(CLASS_REALDIR. 'SC_Session.php');

class ZeusSecureApi extends LC_Page_Ex {

    var $objFormParam;
    var $objQuery;
    var $objPurchase;

    var $isMobile;
    var $isPc;
    var $isSPhone;

    var $isUseQuickChargeCheckUser;
    var $isUseQuickChargeCheckSystem;
    var $isUse3dSecureCheckSystem;
    var $getCvvPattern;
    var $isUseQuickChargeCvv;
    var $getDetails;

    function ZeusSecureApi() {

        $this->httpCacheControl('nocache');
        $request_type = 
           (   (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') 
               || (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == '1') 
               || (isset($_SERVER['HTTP_X_FORWARDED_BY']) && strstr(strtoupper($_SERVER['HTTP_X_FORWARDED_BY']),'SSL') ) 
               || (isset($_SERVER['HTTP_X_FORWARDED_HOST']) &&  strstr(strtoupper($_SERVER['HTTP_X_FORWARDED_HOST']),'SSL') ) 
               || (isset($_SERVER['SCRIPT_URI']) && strtolower(substr($_SERVER['SCRIPT_URI'], 0, 6)) == 'https:') 
               || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ) 
           ) ? 'SSL' : 'NONSSL';
        if ($request_type === 'NONSSL'){
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
        parent::init();

        $this->isMobile = (SC_Display_Ex::detectDevice() == DEVICE_TYPE_MOBILE);
        $this->isSPhone = (SC_Display_Ex::detectDevice() == DEVICE_TYPE_SMARTPHONE);
        $this->isPc     = ( !$this->isMobile && !$this->isSPhone );
        $this->isUseQuickChargeCheckSystem = null;
        $this->isUseQuickChargeCheckUser   = ( $_REQUEST['quick_charge_use'] === '1' );
        $this->isUse3dSecureCheckSystem    = null;
        $this->getCvvPattern               = null;
        $this->isUseQuickChargeCvv         = null;
        $this->getDetails                  = null;

        if ($this->isMobile) {
            if ($_REQUEST['mode'] === 'quick_charge_mobile' || $_REQUEST['quick_charge_use'] === '1'){
                $this->tpl_mainpage = realpath(dirname( __FILE__)) . "/tpl/zeus_credit_mobile_quick.tpl";
            }else{
                $this->tpl_mainpage = realpath(dirname( __FILE__)) . "/tpl/zeus_credit_mobile.tpl";
            }
        } elseif ($this->isSPhone) {
            $this->tpl_mainpage = realpath(dirname( __FILE__)) . "/tpl/zeus_credit_sphone.tpl";
        } else {
            $this->tpl_mainpage = realpath(dirname( __FILE__)) . "/tpl/zeus_credit.tpl";
        }

        $this->allowClientCache();
    }

    function process() {
        $objView = ($this->isMobile) ? new SC_MobileView() : new SC_SiteView();
        $objCartSess = new SC_CartSession();
        $objSiteSess = new SC_SiteSession();
        $objCustomer = new SC_Customer();

        foreach ($objCartSess->getKeys() as $key) {
            $this->tpl_message = $objCartSess->checkProducts($key);
            $this->tpl_total_inctax[$key] = $objCartSess->getAllProductsTotal($key);
            $this->tpl_total_tax[$key] = $objCartSess->getAllProductsTax($key);
        }

        $this->tpl_uniqid = $this->getOrderTempId($_SESSION['order_id']);
        $orderData = $this->objPurchase->getOrderTemp($this->tpl_uniqid);

        // ログイン処理が行われた際に、注文情報の電話番号,Emailをログイン会員情報で更新する。
        if ($objCustomer->isLoginSuccess(true) && $orderData['customer_id'] === '0'){
            $orderUpdateData = array();
            $orderUpdateData['customer_id'] = $objCustomer->getValue('customer_id');
            $orderUpdateData['order_tel01'] = $objCustomer->getValue('tel01');
            $orderUpdateData['order_tel02'] = $objCustomer->getValue('tel02');
            $orderUpdateData['order_tel03'] = $objCustomer->getValue('tel03');
            $orderUpdateData['order_email'] = $objCustomer->getValue('email');
            $this->objPurchase->registerOrder($_SESSION['order_id'], $orderUpdateData);
            $this->objPurchase->saveOrderTemp($this->tpl_uniqid, $orderUpdateData, $objCustomer);
            $orderData = $this->objPurchase->getOrderTemp($this->tpl_uniqid);
        }

        // ログアウト後のバックボタン制御は、遷移エラーとする。
        $order = $this->objPurchase->getOrder($orderData['order_id']);
        $customerCheckId = $objCustomer->getValue('customer_id');
        $customerId = ( empty($customerCheckId) ) ? '0' : $customerCheckId;
        if ( ($this->isPc && $orderData['customer_id'] !== $customerId) || $order['status'] != ORDER_PENDING){
            SC_Utils_Ex::sfDispSiteError(PAGE_ERROR);
            exit;
        }
        $paymentDbData = $this->getPaymentDB( $orderData['order_id'] );
        if ($paymentDbData['del_flg'] != 0) {
            SC_Utils_Ex::sfDispSiteError(PAGE_ERROR);
            exit;
        }
        $this->getDetails                  = $paymentDbData['detailsname'];
        $orderData['payment_total']        = $paymentDbData['payment_total'];
        $this->isUse3dSecureCheckSystem    = ( $paymentDbData['threeflg'] === 'secure_3d_on' || $paymentDbData['threeflg'] === 'secure_3d_select' );
        $this->isUse3dSecureCheckSystemNecessity  = ( $paymentDbData['threeflg'] === 'secure_3d_on' );
        $this->isUseQuickChargeCheckSystem = ( $this->getQuickChargeUesed() && $paymentDbData['quickchargeflg'] === 'quick_charge_on') ;
        $this->isUseQuickChargeCheckSystem = ( $objCustomer->isLoginSuccess(true) && $orderData['customer_id'] !== '0' )? $this->isUseQuickChargeCheckSystem : false ;
        $this->getCvvPattern               = $paymentDbData['cvvflg'];
        $this->isUseQuickChargeCvv         = ( $paymentDbData['cvvflg'] === 'cvv_on' );//2回目もCVVが必要な為の判定フラグ(エラーメッセージで対応)
        if ($this->isMobile && $_REQUEST['mode'] === 'quick_charge_mobile'){
            $this->initParamMobileQuickCharge($paymentDbData);
        } elseif ($this->isUseQuickChargeCheckSystem && $this->isUseQuickChargeCheckUser){
            $this->initParamCheckQuickCharge($paymentDbData);
        } else {
            $this->initParam($paymentDbData);
        }
        $this->objFormParam->setParam($_POST);
        $lastOrderData = $this->getLastOrderData( $orderData['customer_id'] );
        switch ( isset($_REQUEST['mode']) ? $_REQUEST['mode'] : "") {
        case 'rollback':
            $this->objPurchase->rollbackOrder($_SESSION['order_id']);
            SC_Response_Ex::sendRedirect(SHOPPING_CONFIRM_URLPATH);
            exit;
            break;
        case 'return':
            $this->objFormParam->convParam();
            if (count($this->arrErr) == 0) {
                $inputData = $this->objFormParam->getHashArray();
            }
            if ($lastOrderData['order_id'] === $orderData['order_id']){
                SC_Utils_Ex::sfDispSiteError(PAGE_ERROR);
                exit;
            }
            $this->initDisp = true;
            break;
        case 'config':
            $this->objFormParam->convParam();
            $this->arrErr = $this->checkError();
            $expirationData = $_REQUEST['card_year'].$_REQUEST['card_month'];
            if (!empty($expirationData)){
                if ($this->checkExpirationDate($expirationData)){
                    $this->initDisp = true;
                    $this->other_tpl_error = ZEUS_ERROR_EXPIRATION_DATE;
                }
            }
            $this->arrErrCount = count($this->arrErr);
            if ($this->arrErrCount == 0) {
                $inputData = $this->objFormParam->getHashArray();
            }
            if ($lastOrderData['order_id'] === $orderData['order_id']){
                SC_Utils_Ex::sfDispSiteError(PAGE_ERROR);
                exit;
            }
            break;
        case 'next':
            $this->objFormParam->convParam();
            $this->arrErr = $this->checkError();

            if ($lastOrderData['order_id'] === $orderData['order_id'] 
                || $_SESSION['order_id_zeus_regist'] === $orderData['order_id']){
                SC_Utils_Ex::sfDispSiteError(PAGE_ERROR);
                exit;
            }
            $_SESSION['order_id_zeus_regist'] = $orderData['order_id'];
            if (count($this->arrErr) == 0) {
                $inputData = $this->objFormParam->getHashArray();
                // 3D認証は以下の処理内でリダイレクト実施。
                $paymentSendStatus = $this->paymentDataSend($objCustomer, $orderData, $inputData, $paymentDbData);
                if ($paymentSendStatus === true) {
                    $objSiteSess->setRegistFlag();
                }
                $this->checkCompleteStatus($paymentSendStatus);
            }
            unset($_SESSION['order_id_zeus_regist']);
            break;
        case 'pares'://3d PaRes/authorize Action
            $paymentSendStatus = $this->paymentDataSendAuthorize($objCustomer, $orderData);
            $this->checkCompleteStatus($paymentSendStatus);
            break;
        case 'quick_charge_mobile':
        default:
            if ($lastOrderData['order_id'] === $orderData['order_id']){
                SC_Utils_Ex::sfDispSiteError(PAGE_ERROR);
                exit;
            }
            $this->initDisp = true;
            break;
        }
        $this->prefix = $this->getZeusResultData($lastOrderData['zeus_response_data'],"/<prefix>(.*)<\/prefix>/");
        $this->suffix = $this->getZeusResultData($lastOrderData['zeus_response_data'],"/<suffix>(.*)<\/suffix>/");

        $this->setDispData($orderData['payment_id'], $orderData['customer_id'], $paymentDbData);
        if ($this->isPc){
            // PCのみ共通設定を利用する。
            if ($this->isUseQuickChargeCheckSystem && ($this->initDisp || $this->arrErrCount > 0)){
                $this->tpl_onload = "var state=( document.getElementById('quick').checked == true )?'none':'block';document.getElementById('normalCard').style.display=state;var state=( document.getElementById('quick').checked != true )?'none':'block';document.getElementById('quickCard').style.display=state;";
            }
            $this->sendResponse();
        }else{
            $objView->assignobj($this);
            $objView->display($this->tpl_mainpage);
        }
    }

    function initParam($paymentDbData) {
        $this->objFormParam->addParam('支払回数'    , 'payment_class', INT_LEN      , 'n', array('SELECT_CHECK', 'MAX_LENGTH_CHECK'));
        $this->objFormParam->addParam('カード番号' , 'card_no'    , ZEUS_CREDIT_NO_LEN, 'n', array('EXIST_CHECK' , 'MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $this->objFormParam->addParam('カード期限年', 'card_year'    , CARD_YEAR_LEN, 'n', array('SELECT_CHECK', 'NUM_COUNT_CHECK' , 'NUM_CHECK'));
        if ($paymentDbData['cvvflg'] === 'cvv_on' || $paymentDbData['cvvflg'] === 'cvv_first_use'  || $paymentDbData['cvvflg'] === 'cvv_first_on_quick_opt'){
            $this->objFormParam->addParam('セキュリティコード'       , 'cvv_data', CVV_DATA_LEN, 'n', array('EXIST_CHECK', 'MAX_LENGTH_CHECK', 'NUM_CHECK'));
        } elseif ($paymentDbData['cvvflg'] === 'cvv_first_opt_quick_opt'){
            $this->objFormParam->addParam('セキュリティコード'       , 'cvv_data', CVV_DATA_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        }
        $this->objFormParam->addParam('カード期限月', 'card_month'   , CARD_MONTH_LEN, 'n'  , array('SELECT_CHECK', 'NUM_COUNT_CHECK', 'NUM_CHECK'));
        $this->objFormParam->addParam('名'          , 'card_name01'  , STEXT_LEN     , 'KVa', array('EXIST_CHECK' , 'MAX_LENGTH_CHECK', 'ALPHA_CHECK'));
        $this->objFormParam->addParam('姓'          , 'card_name02'  , STEXT_LEN     , 'KVa', array('EXIST_CHECK' , 'MAX_LENGTH_CHECK', 'ALPHA_CHECK'));
        $this->objFormParam->addParam('クイックチャージ', 'quick_charge_use');
        $this->objFormParam->addParam('クイックチャージ', 'cvv_data_quick');
        $this->objFormParam->addParam('3Dセキュアの利用', 'secure_3d_use');
    }

    function initParamCheckQuickCharge($paymentDbData) {
        $this->objFormParam->addParam('支払回数'    , 'payment_class', INT_LEN      , 'n', array('SELECT_CHECK', 'MAX_LENGTH_CHECK'));
        if ($paymentDbData['cvvflg'] === 'cvv_on'){
            $this->objFormParam->addParam('セキュリティコード'       , 'cvv_data_quick', CVV_DATA_LEN, 'n', array('EXIST_CHECK', 'MAX_LENGTH_CHECK', 'NUM_CHECK'));
        } elseif ($paymentDbData['cvvflg'] === 'cvv_first_on_quick_opt' || $paymentDbData['cvvflg'] === 'cvv_first_opt_quick_opt'){
            $this->objFormParam->addParam('セキュリティコード'       , 'cvv_data_quick', CVV_DATA_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        }
        $this->objFormParam->addParam('クイックチャージ' , 'quick_charge_use');
        $this->objFormParam->addParam('3Dセキュアの利用' , 'secure_3d_use');
    }

    function initParamMobileQuickCharge($paymentDbData) {
        $this->objFormParam->addParam('支払回数'    , 'payment_class');
        $this->objFormParam->addParam('セキュリティコード'       , 'cvv_data');
        $this->objFormParam->addParam('クイックチャージ', 'quick_charge_use');
        $this->objFormParam->addParam('クイックチャージ', 'cvv_data_quick');
        $this->objFormParam->addParam('3Dセキュアの利用', 'secure_3d_use');
    }

    function checkError() {
        return $this->objFormParam->checkError();
    }

    function checkExpirationDate($yearMonth){
        return !( $yearMonth >= date( 'Ym', mktime(0, 0, 0, date("m"), date("d"), date("Y"))));
    }

    function checkCompleteStatus($status) {

        unset($_SESSION['order_id_zeus_regist']);
        if ($status === true) {
            if ($this->isMobile) {
                SC_Response_Ex::sendRedirect(MOBILE_SHOPPING_COMPLETE_URLPATH);
            } else {
                SC_Response_Ex::sendRedirect(SHOPPING_COMPLETE_URLPATH);
            }
            exit;
        } else {
            $this->initDisp = true;
            $this->tpl_error = ZEUS_AUTH_ERROR_MESSAGE;
        }
    }

    function setDispData($payment_id, $customer_id, $paymentDbData ) {
        $this->arrPaymentClass = getPaymentClass();

        $objDate = new SC_Date();
        $objDate->setStartYear(date("Y"));
        $objDate->setEndYear(date("Y") + CREDIT_ADD_YEAR);

        $this->arrYear  = $objDate->getYear();
        $this->arrMonth = $objDate->getZeroMonth();
        $this->arrForm = $this->objFormParam->getFormParamList();
        $this->paymentDataCvv = $paymentDbData['cvvflg'];
        $this->paymentEmail   = $paymentDbData['order_email'];
        $this->paymentTel     = $paymentDbData['order_tel01'] .'-'. $paymentDbData['order_tel02'] .'-'. $paymentDbData['order_tel03'];
        $this->paymentTotal   = number_format($paymentDbData['payment_total']);

        if ($this->isUseQuickChargeCheckSystem){
            $lastOrderData = $this->getLastOrderData( $customer_id );
            $this->quickPaymentEmail   = $lastOrderData['order_email'];
            $this->quickPaymentTel     = $lastOrderData['order_tel01'] . $lastOrderData['order_tel02'] . $lastOrderData['order_tel03'];
        }
    }

    function paymentDataSend(&$objCustomer, $orderDbData, $inputData, $paymentDbData){
        $orderUpdateData = array();

        if ($this->isUseQuickChargeCheckSystem && $this->isUseQuickChargeCheckUser){
            $cvvPostData = ( $paymentDbData['cvvflg'] !== 'cvv_first_use' && !empty($inputData['cvv_data_quick']) ) ? '<cvv>'.$inputData['cvv_data_quick'].'</cvv>' : '';
        }else{
            $cvvPostData = ( $paymentDbData['cvvflg'] === 'cvv_on' 
                          || $paymentDbData['cvvflg'] === 'cvv_first_use' 
                          || $paymentDbData['cvvflg'] === 'cvv_first_on_quick_opt' 
                          || ( $paymentDbData['cvvflg'] === 'cvv_first_opt_quick_opt' && !empty($inputData['cvv_data']) )
                        ) ? '<cvv>'.$inputData['cvv_data'].'</cvv>' : '';
        }
        $secure3d    = ( $paymentDbData['threeflg'] === 'secure_3d_on' || ( $paymentDbData['threeflg'] === 'secure_3d_select' && $_REQUEST['secure_3d_use'] === '1' ) ) ? true : false;
        $enrolXid    = '';
        $enrolAcsUrl = '';
        $enrolPaReq  = '';
        if ($secure3d === true && $this->isMobile !== true){
            // Enrol Action Start
            $toApiPostData = $this->getZeusPostData3dToEnrolReq($orderDbData, $paymentDbData, $inputData, $cvvPostData);
            $httpRequest = secureSendAction(SECURE_3D_LINK_URL, $toApiPostData);
            if (!PEAR::isError( $httpRequest->sendRequest() )) {
                $response = $httpRequest->getResponseBody();
                GC_Utils::gfPrintLog('ゼウス応答結果(3D_EnrolReq)：'.$response);
                if (ereg('<status>invalid</status>', $response)) {
                    return false;
                }
                if (ereg('<status>success</status>', $response)) {

                } elseif (ereg('<status>outside</status>', $response)) {
                    $enrolXid    = $this->getEnrolXid($response);
                    $toApiPostData = $this->getZeusPostData3dToPayReq($enrolXid);
                    $httpRequest = secureSendAction(SECURE_3D_LINK_URL, $toApiPostData);
                    if (!PEAR::isError( $httpRequest->sendRequest() )) {
                        $response = $httpRequest->getResponseBody();
                    } else {
                        GC_Utils::gfPrintLog('ゼウス通信失敗：'.$httpRequest->sendRequest()->getMessage());
                        return false;
                    }
                    $httpRequest->clearPostData();
                    GC_Utils::gfPrintLog('ゼウス応答結果：'.$response);
            
                    $orderUpdateData['memo01'] = MDL_ZEUS_CODE;  // モジュールコード
                    $orderUpdateData['memo03'] = $response;      // 処理結果
            
                    $this->objPurchase->saveOrderTemp($orderDbData['order_temp_id'], $orderUpdateData, $objCustomer);
                    if (ereg('<status>success</status>', $response)) {
                        sendPaymentData(MDL_ZEUS_CODE, $orderDbData['payment_total']);
                        $this->orderStatusUpdate($orderDbData['order_id'], ORDER_PRE_END, $this->getZeusOrderId( $response ), $response);
                        $this->objPurchase->sendOrderMail($orderDbData['order_id']);
                        $this->objQuery->insert(
                                'dtb_zeus_payment', 
                                array(
                                    'order_id'          => $orderDbData['order_id'], 
                                    'zeus_order_id'     => $this->getZeusOrderId( $response ), 
                                    'zeus_response_data'=> $response, 
                                    'zeus_request_data' => $toApiPostData
                                )
                        );
                        return true;
                    } else {
                        return false;
                    }
                }else{
                    return false;
                }
                $enrolXid    = $this->getEnrolXid($response);
                $enrolAcsUrl = $this->getEnrolAcsUrl($response);
                $enrolPaReq  = $this->getEnrolPaReq($response);
            } else {
                GC_Utils::gfPrintLog('ゼウス通信失敗：'.$httpRequest->sendRequest()->getMessage());
                return false;
            }
            $httpRequest->clearPostData();
            // Enrol Action End
            // PaReq Action Start(PaReqは本人認証URLをユーザページよりリダイレクトさせ本人認証ページを表示させます。)
            $termUrl = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'?transactionid='.$this->transactionid.'&mode=pares';
            $paReqRequest = array( 
                               'MD'     => $enrolXid,
                               'PaReq'  => $enrolPaReq,
                               'TermUrl'=> $termUrl
                            );
            $this->acsPostRedirect( $enrolAcsUrl, $paReqRequest );
            exit;
        }else{
            $toApiPostData = $this->getZeusPostData($orderDbData, $paymentDbData, $inputData, $cvvPostData);
            $orderUpdateData['memo04'] = 'normal_order';
        }
        $httpRequest = secureSendAction(SECURE_LINK_URL, $toApiPostData);

        $toApiPostData = $this->setMaskCardNumber( $toApiPostData );
        if (!PEAR::isError( $httpRequest->sendRequest() )) {
            $response = $httpRequest->getResponseBody();
        } else {
            GC_Utils::gfPrintLog('ゼウス通信失敗：'.$httpRequest->sendRequest()->getMessage());
            return false;
        }
        $httpRequest->clearPostData();
        GC_Utils::gfPrintLog('ゼウス応答結果：'.$response);

        $orderUpdateData['memo01'] = MDL_ZEUS_CODE;  // モジュールコード
        $orderUpdateData['memo03'] = $response;      // 処理結果

        $this->objPurchase->saveOrderTemp($orderDbData['order_temp_id'], $orderUpdateData, $objCustomer);
        if (ereg('<status>success</status>', $response)) {
            sendPaymentData(MDL_ZEUS_CODE, $orderDbData['payment_total']);
            $this->orderStatusUpdate($orderDbData['order_id'], ORDER_PRE_END, $this->getZeusOrderId( $response ), $response);
            $this->objPurchase->sendOrderMail($orderDbData['order_id']);
            $this->objQuery->insert(
                    'dtb_zeus_payment', 
                    array(
                        'order_id'          => $orderDbData['order_id'], 
                        'zeus_order_id'     => $this->getZeusOrderId( $response ), 
                        'zeus_response_data'=> $response, 
                        'zeus_request_data' => $toApiPostData
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    function paymentDataSendAuthorize(&$objCustomer, $orderDbData){
        $paResMD = $_REQUEST['MD'];
        $paResPARES = $_REQUEST['PaRes'];
        // AuthReq
        $toApiPostData = $this->getZeusPostData3dToAuthReq($paResMD, $paResPARES);
        $httpRequest = secureSendAction(SECURE_3D_LINK_URL, $toApiPostData);
        if (!PEAR::isError( $httpRequest->sendRequest() )) {
            $response = $httpRequest->getResponseBody();
            GC_Utils::gfPrintLog('ゼウス応答結果(3D_AuthReq)：'.$response);
            if (ereg('<status>invalid</status>', $response)) {
                return false;
            }

            if (ereg('<status>success</status>', $response)) {
            }else{
                return false;
            }
        } else {
            GC_Utils::gfPrintLog('ゼウス通信失敗：'.$httpRequest->sendRequest()->getMessage());
            return false;
        }
        $httpRequest->clearPostData();
        // PayReq
        $toApiPostData = $this->getZeusPostData3dToPayReq($paResMD);
        $httpRequest = secureSendAction(SECURE_3D_LINK_URL, $toApiPostData);
        if (!PEAR::isError( $httpRequest->sendRequest() )) {
            $response = $httpRequest->getResponseBody();
        } else {
            GC_Utils::gfPrintLog('ゼウス通信失敗：'.$httpRequest->sendRequest()->getMessage());
            return false;
        }
        $httpRequest->clearPostData();
        GC_Utils::gfPrintLog('ゼウス応答結果：'.$response);

        $orderUpdateData['memo01'] = MDL_ZEUS_CODE;  // モジュールコード
        $orderUpdateData['memo03'] = $response;      // 処理結果

        $this->objPurchase->saveOrderTemp($orderDbData['order_temp_id'], $orderUpdateData, $objCustomer);
        if (ereg('<status>success</status>', $response)) {
            sendPaymentData(MDL_ZEUS_CODE, $orderDbData['payment_total']);
            $this->orderStatusUpdate($orderDbData['order_id'], ORDER_PRE_END, $this->getZeusOrderId( $response ), $response);
            $this->objPurchase->sendOrderMail($orderDbData['order_id']);
            $this->objQuery->insert(
                    'dtb_zeus_payment', 
                    array(
                        'order_id'          => $orderDbData['order_id'], 
                        'zeus_order_id'     => $this->getZeusOrderId( $response ), 
                        'zeus_response_data'=> $response, 
                        'zeus_request_data' => $toApiPostData
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    function getZeusOrderId( $zeusResponse ){
        $pattern = "/<order_number>(.*)<\/order_number>/";
        preg_match($pattern, $zeusResponse, $matches);
        return ( count($matches) > 1 ) ? $matches[1] : "";
    }

    function getEnrolXid( $zeusResponse ){
        $pattern = "/<xid>(.*)<\/xid>/";
        preg_match($pattern, $zeusResponse, $matches);
        return ( count($matches) > 1 ) ? $matches[1] : "";
    }

    function getEnrolPaReq( $zeusResponse ){
        $pattern = "/<PaReq>(.*)<\/PaReq>/";
        preg_match($pattern, $zeusResponse, $matches);
        return ( count($matches) > 1 ) ? $matches[1] : "";
    }

    function getEnrolAcsUrl( $zeusResponse ){
        $pattern = "/<acs_url>(.*)<\/acs_url>/";
        preg_match($pattern, $zeusResponse, $matches);
        return ( count($matches) > 1 ) ? $matches[1] : "";
    }

    function setMaskCardNumber( $zeusRequest ){
        $pattern = "/<number>(.*)<\/number>/";
        preg_match($pattern, $zeusRequest, $matches);
        if (count($matches) > 1){
            $len = strlen( $matches[1] );
            $mask = '';
            for( $i=0; $i<( $len - 6 ); $i++ )
                $mask .= '*';
            $maskCardNumber = ( strlen($matches[1]) > 4 )? substr( $matches[1], 0, 2 ) . $mask . substr($matches[1], -4) : $matches[1];
            $zeusRequest = str_replace($matches[1], $maskCardNumber, $zeusRequest);
        }
        return $zeusRequest;
    }

    function getOrderTempId($orderId) {
        $ret = $this->objQuery->getRow('order_temp_id', 'dtb_order_temp', 'order_id = ?',
                                 array($orderId));
        return $ret['order_temp_id'];
    }

    function getPaymentDB($orderId){
        $arrRet = array();
        $sql = "SELECT ".
               "   dtb_payment.memo01 as clientip , ".
               "   dtb_payment.memo02 as clientauthkey  , ".
               "   dtb_payment.memo04 as cvvflg , ".
               "   dtb_payment.memo05 as quickchargeflg , ".
               "   dtb_payment.memo06 as threeflg , ".
               "   dtb_payment.memo07 as detailsname , ".
               "   dtb_order.order_email,  ".
               "   dtb_order.order_tel01,  ".
               "   dtb_order.order_tel02,  ".
               "   dtb_order.order_tel03,  ".
               "   dtb_order.payment_total,".
               "   dtb_order.del_flg".
               " FROM dtb_order ".
               "     LEFT JOIN dtb_payment ".
               "          ON dtb_order.payment_id = dtb_payment.payment_id ".
               " WHERE dtb_order.order_id = ? ";
        $arrRet = $this->objQuery->getall($sql, array($orderId));

        return $arrRet[0];
    }

    function getZeusPostData($orderDbData, $paymentDbData, $inputData, $cvvPostData){

        if ($this->isUseQuickChargeCheckSystem && $this->isUseQuickChargeCheckUser){
            $lastOrderData = $this->getLastOrderData( $orderDbData['customer_id'] );
            return 
                   "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
                   "  <request service=\"secure_link\" action=\"payment\">".
                   "    <authentication>".
                   "      <clientip>".$paymentDbData['clientip']."</clientip>".
                   "      <key>".$paymentDbData['clientauthkey']."</key>".
                   "    </authentication>".
                   "    <card>".
                   "      <history action=\"send_email\">".
                   "        <key>telno</key>".
                   "        <key>sendid</key>".
                   "      </history>".
                   $cvvPostData .
                   "    </card>".
                   "    <payment>".
                   "      <amount>".$orderDbData['payment_total']."</amount>".
                   "      <count>".$inputData['payment_class']."</count>".
                   "    </payment>".
                   "    <user>".
                   "      <email>".$orderDbData['order_email']."</email>".
                   "      <telno validation=\"permissive\">".$orderDbData['order_tel01'].$orderDbData['order_tel02'].$orderDbData['order_tel03']."</telno>".
                   "    </user>".
                   "    <uniq_key>".
                   "      <sendid>".$orderDbData['customer_id']."</sendid>".
                   "      <sendpoint></sendpoint>".
                   "    </uniq_key>".
                   "</request>";
        }else{
            return 
                   "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
                   "  <request service=\"secure_link\" action=\"payment\">".
                   "    <authentication>".
                   "      <clientip>".$paymentDbData['clientip']."</clientip>".
                   "      <key>".$paymentDbData['clientauthkey']."</key>".
                   "    </authentication>".
                   "    <card>".
                   "      <number>".$inputData['card_no']."</number>".
                   "      <expires>".
                   "        <year>".$inputData['card_year']."</year>".
                   "        <month>".$inputData['card_month']."</month>".
                   "      </expires>".
                   $cvvPostData .
                   "      <name>".$inputData['card_name01'].$inputData['card_name02']."</name>".
                   "    </card>".
                   "    <payment>".
                   "      <amount>".$orderDbData['payment_total']."</amount>".
                   "      <count>".$inputData['payment_class']."</count>".
                   "    </payment>".
                   "    <user>".
                   "      <email>".$orderDbData['order_email']."</email>".
                   "      <telno validation=\"permissive\">".$orderDbData['order_tel01'].$orderDbData['order_tel02'].$orderDbData['order_tel03']."</telno>".
                   "    </user>".
                   "    <uniq_key>".
                   "      <sendid>".$orderDbData['customer_id']."</sendid>".
                   "      <sendpoint></sendpoint>".
                   "    </uniq_key>".
                   "</request>";
        }
    }

    function getZeusPostData3dToEnrolReq($orderDbData, $paymentDbData, $inputData, $cvvPostData){
        if ($this->isUseQuickChargeCheckSystem && $this->isUseQuickChargeCheckUser){
            $lastOrderData = $this->getLastOrderData( $orderDbData['customer_id'] );
            return 
                   "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
                   "  <request  service=\"secure_link_3d\" action=\"enroll\">".
                   "    <authentication>".
                   "      <clientip>".$paymentDbData['clientip']."</clientip>".
                   "      <key>".$paymentDbData['clientauthkey']."</key>".
                   "    </authentication>".
                   "    <card>".
                   "      <history action=\"send_email\">".
                   "        <key>telno</key>".
                   "        <key>sendid</key>".
                   "      </history>".
                   $cvvPostData .
                   "    </card>".
                   "    <payment>".
                   "      <amount>".$orderDbData['payment_total']."</amount>".
                   "      <count>".$inputData['payment_class']."</count>".
                   "    </payment>".
                   "    <user>".
                   "      <email>".$orderDbData['order_email']."</email>".
                   "      <telno validation=\"permissive\">".$orderDbData['order_tel01'].$orderDbData['order_tel02'].$orderDbData['order_tel03']."</telno>".
                   "    </user>".
                   "    <uniq_key>".
                   "      <sendid>".$orderDbData['customer_id']."</sendid>".
                   "      <sendpoint></sendpoint>".
                   "    </uniq_key>".
                   "</request>";
        }else{
            return 
                   "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
                   "  <request  service=\"secure_link_3d\" action=\"enroll\">".
                   "    <authentication>".
                   "      <clientip>".$paymentDbData['clientip']."</clientip>".
                   "      <key>".$paymentDbData['clientauthkey']."</key>".
                   "    </authentication>".
                   "    <card>".
                   "      <number>".$inputData['card_no']."</number>".
                   "      <expires>".
                   "        <year>".$inputData['card_year']."</year>".
                   "        <month>".$inputData['card_month']."</month>".
                   "      </expires>".
                   $cvvPostData .
                   "      <name>".$inputData['card_name01'].$inputData['card_name02']."</name>".
                   "    </card>".
                   "    <payment>".
                   "      <amount>".$orderDbData['payment_total']."</amount>".
                   "      <count>".$inputData['payment_class']."</count>".
                   "    </payment>".
                   "    <user>".
                   "      <email>".$orderDbData['order_email']."</email>".
                   "      <telno validation=\"permissive\">".$orderDbData['order_tel01'].$orderDbData['order_tel02'].$orderDbData['order_tel03']."</telno>".
                   "    </user>".
                   "    <uniq_key>".
                   "      <sendid>".$orderDbData['customer_id']."</sendid>".
                   "      <sendpoint></sendpoint>".
                   "    </uniq_key>".
                   "</request>";
        }
    }

    function getZeusPostData3dToAuthReq($md, $pares){
        return 
               "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
               "  <request service=\"secure_link_3d\" action=\"authentication\">".
               "    <xid>".$md."</xid>".
               "    <PaRes>".$pares."</PaRes>".
               "</request>";
    }

    function getZeusPostData3dToPayReq($md){
        return 
               "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
               "  <request service=\"secure_link_3d\" action=\"payment\">".
               "  <xid>".$md."</xid>".
               "</request>";
    }

    function acsPostRedirect($url, $postdata=''){
        $param = '';

        header("Content-Type: text/html; charset=" . CHAR_CODE);
        header("Cache-Control: no-cache, must-revalidate");
        print 
                "<html>\n".
                "<head>\n".
                "<title>3D Secure</title>\n".
                "<SCRIPT LANGUAGE=\"Javascript\">\n".
                "<!--  \n".
                "function OnLoadEvent() {  \n".
                " document.downloadForm.submit(); \n".
                "} \n".
                "//-->  \n".
                "</SCRIPT>  \n".
                "</head>  ".
                "<body onload=\"OnLoadEvent();\">  ".
                "<form name=\"downloadForm\" action=\"".$url."\" method=\"POST\">  ".
                "<noscript>  ".
                "<h3>Please click Submit to continue the processing of your 3-D Secure transaction.</h3><BR>  ".
                "<input type=\"submit\" value=\"処理を続ける\">  ".
                "</div>  ".
                "</noscript>  ".
                "<input type=\"hidden\" name=\"PaReq\"   value=\"".htmlspecialchars($postdata['PaReq'])."\">  ".
                "<input type=\"hidden\" name=\"MD\"      value=\"".htmlspecialchars($postdata['MD'])."\">  ".
                "<input type=\"hidden\" name=\"TermUrl\" value=\"".htmlspecialchars($postdata['TermUrl'])."\">  ".
                "</form>  ".
                "</body>  ".
                "</html>";
    }

    function getQuickChargeUesed() {
        $orderData = $this->objPurchase->getOrderTemp($this->getOrderTempId($_SESSION['order_id']));
        $lastCardOrderData = $this->getLastOrderData($orderData['customer_id']);
        return !( count($lastCardOrderData) == 0 );
    }

    function getLastOrderData($customerId){
        $arrRet = array();
        if ($customerId == 0) return $arrRet;
        $sql = "SELECT ".
               "   dtb_order.order_id,    ".
               "   dtb_order.order_tel01, ".
               "   dtb_order.order_tel02, ".
               "   dtb_order.order_tel03, ".
               "   dtb_order.order_email, ".
               "   dtb_zeus_payment.zeus_response_data  ".
               " FROM dtb_order ".
               "      ,dtb_zeus_payment ".
               " WHERE dtb_order.order_id = dtb_zeus_payment.order_id ".
               "   AND dtb_order.customer_id = ? ORDER BY dtb_order.create_date DESC LIMIT 1 ";
        $arrRet = $this->objQuery->getall($sql, array($customerId));
        return $arrRet[0];
    }


    function orderStatusUpdate($orderId, $orderStatus, $zeusOrderId, $zeusResponse){
        $prefix = $this->getZeusResultData($zeusResponse,"/<prefix>(.*)<\/prefix>/");
        $suffix = $this->getZeusResultData($zeusResponse,"/<suffix>(.*)<\/suffix>/");
        $otherUpdateArray = array( 'note' => 'ZEUS_ORDER_ID:['.$zeusOrderId.'] prefix:['.$prefix.'] suffix:['.$suffix.']' );
        $this->objPurchase->sfUpdateOrderStatus($orderId, $orderStatus, null, null, $otherUpdateArray);
        
    }

    function getZeusResultData($zeusResponse, $pattern){
        preg_match($pattern, $zeusResponse, $matches);
        return ( count($matches) > 1 ) ? $matches[1] : '';
    }
}
?>
