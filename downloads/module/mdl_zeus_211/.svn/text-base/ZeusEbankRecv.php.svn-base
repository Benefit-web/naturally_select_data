<?php

/**
 * ZeusEbankRecv.php
 *
 * @copyright Copyright (C)  ZEUS CO.,LTD.All Rights Reserved.
 * @version $Id: ZeusEbankRecv.php 22307 2013-09-25 05:03:18Z shimada $
 */

require_once CLASS_EX_REALDIR . 'page_extends/LC_Page_Ex.php';
require_once(MODULE_REALDIR . 'mdl_zeus_211/include.php');

class ZeusEbankRecv extends LC_Page_Ex {

    var $objQuery;
    var $objPurchase;
    var $module_name;
    var $pay_code;

    function ZeusEbankRecv() {
        $this->module_name = MDL_ZEUS_CODE;
        $this->pay_code = PAY_ZEUS_EBANK;
    }

    function process() {
        if (version_compare(ECCUBE_VERSION, '2.13.0-dev') >=0) {
            $this->skip_load_page_layout = true;
            $this->tpl_column_num        = 1;
        }
        parent::init();
        $this->objQuery = new SC_Query();
        $this->objPurchase  = new SC_Helper_Purchase_Ex();
        
        GC_Utils::gfPrintLog('[ゼウス銀行振込決済ステータス変更]処理開始');
        //------------------------------------------------------------------------------
        //-- リクエスト情報チェック
        //------------------------------------------------------------------------------
        $zeusResponse = array(
            'status'    => $_REQUEST['status'],
            'order_no'  => $_REQUEST['order_no'],
            'clientip'  => $_REQUEST['clientip'],
            'money'     => $_REQUEST['money'],
            'telno'     => $_REQUEST['telno'],
            'email'     => $_REQUEST['email'],
            'sendid'    => $_REQUEST['sendid'],
            'sendpoint' => $_REQUEST['sendpoint'],
            'tracking_no'   => $_REQUEST['tracking_no'],
            'payment'   => $_REQUEST['payment'],
            'error_message'=> $_REQUEST['error_message']
        );
        $requestData = '';
        foreach($_REQUEST as $k => $val)
            $requestData .= ' ['.$k .']=> '. mb_convert_encoding($val, CHAR_CODE, 'SJIS');

        GC_Utils::gfPrintLog('[ゼウス銀行振込決済ステータス変更] ゼウスリクエストメソッド情報:'. $_SERVER['REQUEST_METHOD']. ' リクエスト情報:'. $requestData);

        //------------------------------------------------------------------------------
        //-- EC-CUBEデータの取得
        //------------------------------------------------------------------------------
        $mtbModuleData = $this->objQuery->select('*', 'dtb_payment', 'memo10 = ? AND memo03 = ?', array($this->module_name, $this->pay_code));
        if(count($mtbModuleData) == 0){
            $this->errorExit('[ゼウス銀行振込決済ステータス変更]管理画面での設定が完了しておりません。');
        }

        //------------------------------------------------------------------------------
        //-- リクエスト情報チェック
        //------------------------------------------------------------------------------
        if(empty($zeusResponse['order_no'])){
            $this->errorExit('[ゼウス銀行振込決済ステータス変更] ゼウスリクエストデータのオーダー番号が不正です。order_no:'. $zeusResponse['order_no']);
        }
        if($mtbModuleData[0]['memo01'] != $zeusResponse['clientip']){
            $this->errorExit('[ゼウス銀行振込決済ステータス変更] ゼウスリクエストデータのIPコードが不正です。clientip:'. $zeusResponse['clientip']);
        }
        if(empty($zeusResponse['sendid'])){
            $this->errorExit('[ゼウス銀行振込決済ステータス変更] ユニークキーが設定されてません。sendid:'. $zeusResponse['sendid']);
        }

        $dtbOrderData =  $this->getDtbOrderData($zeusResponse['sendid']);
        if(count($dtbOrderData) == 0){
            $this->errorExit('[ゼウス銀行振込決済ステータス変更] この注文情報は登録されておりません。注文番号:'.$zeusResponse['sendid']);
        }
        if($dtbOrderData['payment_id'] !== $mtbModuleData[0]['payment_id']){
            $this->errorExit('[ゼウス銀行振込決済ステータス変更] 銀行振込決済データでは御座いません。注文番号:'.$zeusResponse['sendid']);
        }
        if(empty($zeusResponse['sendpoint'])){
            $this->errorExit('[ゼウス銀行振込決済ステータス変更] フリーパラメータが設定されてません。sendpoint:'. $zeusResponse['sendpoint']);
        }
        if($this->sendPointCheck($zeusResponse['sendpoint'], $mtbModuleData[0]['memo02'], $zeusResponse['clientip'], $zeusResponse['sendid'])){  //EC-CUBE order_id
            $this->errorExit('[ゼウス銀行振込決済ステータス変更] フリーパラメータが不正です。sendpoint:'. $zeusResponse['sendpoint']);
        }

        //------------------------------------------------------------------------------
        //-- ステータス更新
        //------------------------------------------------------------------------------
        $updateMemo = "ゼウスオーダー番号：[".$zeusResponse['order_no']."]\n"
                    . "受付番号：[".$zeusResponse['tracking_no']."]\n";
        $this->orderStatusUpdate($zeusResponse['sendid'], $zeusResponse['status'], $zeusResponse['error_message'], $updateMemo);
        GC_Utils::gfPrintLog('[ゼウス銀行振込決済ステータス変更]処理終了');

    }

    function errorExit($message) {
        GC_Utils::gfPrintLog($message);
        GC_Utils::gfPrintLog('[ゼウス銀行振込決済ステータス変更]処理終了_受信データが不正です');
        header('HTTP/1.1 400 Bad Request');
        exit;
    }

    function sendPointCheck($sendpoint, $privateKey, $ipcode, $orderId) {
        $checkUniqKey = sha1($privateKey. $this->numberToStrReplace($ipcode . $orderId));
        return !($sendpoint === $checkUniqKey);
    }

    function numberToStrReplace($val) {
        $search  = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
        $replace = array('D', 'Y', 'Z', 'J', 'W', 'M', 'T', 'S', 'B', 'P');
        return str_replace($search, $replace, $val);
        
    }

    function getDtbOrderData($orderId){
        $arrRet = array();
        $sql = "SELECT ".
               "   dtb_order.order_email,   ".
               "   dtb_order.order_tel01,   ".
               "   dtb_order.order_tel02,   ".
               "   dtb_order.order_tel03,   ".
               "   dtb_order.payment_total, ".
               "   dtb_order.payment_id     ".
               " FROM dtb_order ".
               " WHERE dtb_order.order_id = ? ";
        $arrRet = $this->objQuery->getall($sql, array($orderId));
        return $arrRet[0];
    }

    function orderStatusUpdate($orderId, $zeusResponseStatus, $zeusErrorMessage, $zeusResponseAll) {
        $orderStatus = '';
        switch ($zeusResponseStatus) {
        case ZEUS_EBANK_WAIT:          // 受付中
        case ZEUS_EBANK_NOT_PAID:          // 未入金
            $orderStatus = ORDER_PAY_WAIT;   // ->入金待ち
            break;

        case ZEUS_EBANK_PAID:   // 入金済
            $orderStatus = ORDER_PRE_END;    // ->入金済み
            break;

        case ZEUS_EBANK_ERROR:   // エラー
            return;

        case ZEUS_EBANK_FAILED:          // 未入金
        	$orderStatus = ORDER_CANCEL;     // ->キャンセル
            break;

        default:
            return;
        }

        $otherUpdateArray = array( 'note' => $zeusResponseAll );
        $this->objPurchase->sfUpdateOrderStatus($orderId, $orderStatus, null, null, $otherUpdateArray);
        if (( $orderStatus == ORDER_PRE_END )||( $orderStatus == ZEUS_ORDER_EXCESS)) $this->objPurchase->sendOrderMail( $orderId );
    }
}

?>