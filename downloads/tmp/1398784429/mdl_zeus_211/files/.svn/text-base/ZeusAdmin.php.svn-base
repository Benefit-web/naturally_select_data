<?php

/**
 * ZeusAdmin.php
 *
 * @copyright Copyright (C)  ZEUS CO.,LTD.All Rights Reserved.
 * @version $Id: ZeusAdmin.php 22307 2013-09-25 05:03:18Z shimada $
 */

require_once(realpath(dirname( __FILE__)) . "/include.php");
require_once(CLASS_EX_REALDIR . "page_extends/admin/LC_Page_Admin_Ex.php");

class ZeusAdmin extends LC_Page_Admin_Ex {

    var $objFormParam;
    var $arrErr;
    var $objQuery;
    var $module_name;
    var $isUse3dSecureCheckSystem;
    var $getCvvPatternFirst;
    var $getCvvPatternQuick;
    var $getDetails;
    var $onloadSelectTab;
    var $payDbResisted;
    var $payDbSecure3d;

    function ZeusAdmin() {
        $this->module_name = MDL_ZEUS_CODE;
        $this->objQuery = new SC_Query();
        $this->objSess = new SC_Session();
        $this->objFormParam = new SC_FormParam();
    }

    function init() {
        parent::init();
        $this->tpl_mainpage = MODULE_REALDIR . $this->module_name. '/tpl/zeus_admin.tpl';
        $this->arrErr = array();
    }

    function process() {
        $objView = new SC_AdminView();
        $this->initParam();
        $this->objFormParam->setParam($_POST);
        $this->onloadSelectTab = $_REQUEST["disp_zeus_tab_selected"];
        if (($this->onloadSelectTab != 'ebank')&&($this->onloadSelectTab != 'edy')&&($this->onloadSelectTab != 'cvs')) {
        	$this->onloadSelectTab = 'credit'; 
        }
        
        switch (isset($_POST['mode']) ? $_POST['mode'] : '') {
        case 'confirm':
        case 'zeus_data_get':
            $this->tpl_onload = 'select_zeus_admin_tab_confirm(\''. $this->onloadSelectTab. '\');' ;
            $this->isFormCheck = true;
            $this->arrErr = $this->getErrorMessage($this->arrErr, $this->getValidateCheckErrorMessage($this->onloadSelectTab));
            if ( count($this->arrErr) === 0 ){
                $this->isZeusCheck = true;
            }
            break;
        case 'edit':
            $this->tpl_onload = 'select_zeus_admin_tab(\''. $this->onloadSelectTab. '\');' ;
            $this->arrErr = $this->getErrorMessage($this->arrErr, $this->getValidateCheckErrorMessage($this->onloadSelectTab));
            if ( count($this->arrErr) === 0 ) {
                $copyRes = false;
                if( $this->onloadSelectTab == 'credit' ){
                	$module_title = MDL_ZEUS_TITLE;
                	$this->setPaymentDBCredit();
                } else if( $this->onloadSelectTab == 'cvs' ){
                	$module_title = MDL_ZEUS_CVS_TITLE;
                    $this->setPaymentDBCvs();
                    $copyRes = copy(MODULE_REALDIR. $this->module_name . "/zeus_cvs_recv.php", USER_REALDIR . "zeus_cvs_recv.php");
                    if (!$copyRes) {
                        $this->tpl_onload = $this->tpl_onload . "alert(\"ファイル書き込みに失敗しました。\\n ". USER_REALDIR . "zeus_cvs_recv.php \");";
                    }
                } else if( $this->onloadSelectTab == 'ebank' ){
                	$module_title = MDL_ZEUS_EBANK_TITLE;
                    $this->setPaymentDBEbank();
                    $copyRes = copy(MODULE_REALDIR. $this->module_name . "/zeus_ebank_recv.php", USER_REALDIR . "zeus_ebank_recv.php");
                    if (!$copyRes) {
                        $this->tpl_onload = $this->tpl_onload . "alert(\"ファイル書き込みに失敗しました。\\n ". USER_REALDIR . "zeus_ebank_recv.php \");";
                    }
                } else if( $this->onloadSelectTab == 'edy' ){
                	$module_title = MDL_ZEUS_EDY_TITLE;
                    $this->setPaymentDBEdy();
                    $copyRes = copy(MODULE_REALDIR. $this->module_name . "/zeus_edy_recv.php", USER_REALDIR . "zeus_edy_recv.php");
                    if (!$copyRes) {
                        $this->tpl_onload = $this->tpl_onload . "alert(\"ファイル書き込みに失敗しました。\\n ". USER_REALDIR . "zeus_edy_recv.php \");";
                    }
                }
                $this->setConfig();
                $this->updateOrderStatus();
                
                $this->tpl_onload = $this->tpl_onload . 'alert("' . $module_title . 'の登録が完了致しました");';
            	break;
            }
        default:
            $this->tpl_onload = 'select_zeus_admin_tab(\''. $this->onloadSelectTab. '\');' ;
            $arrConfig = $this->getConfig();
            $this->objFormParam->setParam($arrConfig);
            break;
        }

        $arrPayment = $this->getPaymentDB(PAY_ZEUS_CREDIT);
        $this->cvvUseFlag = null;
        $this->paymentDataFlag = null;
        if( !empty($arrPayment[0]) ){
            $this->paymentDataFlag = true;
            $this->cvvUseFlag = false;
            $flgData = $arrPayment[0]['memo04'];
            $this->payDbSecure3d = $arrPayment[0]['memo06'];
            $this->payDbResisted = !(empty($arrPayment[0]['module_code']));
            if( $flgData == 'cvv_on' ||
                $flgData == 'cvv_first_use' ||
                $flgData == 'cvv_first_on_quick_opt' ||
                $flgData == 'cvv_first_opt_quick_opt'
            ){
                $this->cvvUseFlag = true;
            }
            if( ($_POST['mode'] !== 'zeus_data_get' && $_POST['mode'] !== 'confirm') ||
                    ( ($_POST['mode'] == 'zeus_data_get' || $_POST['mode'] == 'confirm') && !empty($this->arrErr) ) ){
                $this->getDetails = $arrPayment[0]['memo07'];
            }
        }
        $this->checkError = !empty($this->arrErr);
        if( $this->checkError == true ){
            $this->tpl_onload = 'select_zeus_admin_tab(\''. $this->onloadSelectTab. '\');' ;
        }
        $this->arrForm = $this->objFormParam->getFormParamList();
        $objView->assignobj($this);
        $objView->display($this->tpl_mainpage);
    }

    function destroy() {
        parent::destroy();
    }

    function initParam() {
        $this->objFormParam->addParam('加盟店IPコード'              , 'clientip_cvs'  , CLIENTIP_LEN    , 'KVa', array());
        $this->objFormParam->addParam('サイトバックURL'             , 'siteurl'       , SITE_URL_LEN    , 'KVa', array('MAX_LENGTH_CHECK', 'URL_CHECK'));
        $this->objFormParam->addParam('サイトバックURL文言'         , 'sitestr'       , SITE_URL_STR_LEN, 'KVa', array('MAX_LENGTH_CHECK'));
        $this->objFormParam->addParam('加盟店IPコード'          , 'clientip'     , CLIENTIP_LEN    , 'KVa', array('NUM_CHECK', 'MAX_LENGTH_CHECK', 'SPTAB_CHECK'));
        $this->objFormParam->addParam('加盟店認証キー'          , 'clientauthkey', CLIENTSECURE_LEN, 'KVa', array('MAX_LENGTH_CHECK', 'SPTAB_CHECK'));
        $this->objFormParam->addParam('セキュリティコードの利用', 'cvvflg'       , CVV_FLG_LEN     , 'KVa', array('MAX_LENGTH_CHECK', 'SPTAB_CHECK'));
        $this->objFormParam->addParam('3Dセキュアの利用'        , 'secure3d'     , CVV_FLG_LEN     , 'KVa', array('MAX_LENGTH_CHECK', 'SPTAB_CHECK'));
        $this->objFormParam->addParam('QuickChargeの利用'       , 'quick_charge_flg', CVV_FLG_LEN  , 'KVa', array('MAX_LENGTH_CHECK', 'SPTAB_CHECK'));
        
        $this->objFormParam->addParam('完了ページ戻りURL'             , 'success_url'       , SITE_URL_LEN    , 'KVa', array('MAX_LENGTH_CHECK', 'URL_CHECK'));
        $this->objFormParam->addParam('完了ページ戻りURL文言'         , 'success_str'       , SITE_URL_STR_LEN    , 'KVa', array('MAX_LENGTH_CHECK'));
        $this->objFormParam->addParam('失敗ページ戻りURL'             , 'failure_url'       , SITE_URL_LEN    , 'KVa', array('MAX_LENGTH_CHECK', 'URL_CHECK'));
        $this->objFormParam->addParam('失敗ページ戻りURL文言'         , 'failure_str'       , SITE_URL_STR_LEN    , 'KVa', array('MAX_LENGTH_CHECK'));

        $this->objFormParam->addParam('サイトバックURL(銀行振込)'             , 'ebank_siteurl'       , SITE_URL_LEN    , 'KVa', array('MAX_LENGTH_CHECK', 'URL_CHECK'));
        $this->objFormParam->addParam('サイトバックURL文言(銀行振込)'         , 'ebank_sitestr'       , SITE_URL_STR_LEN, 'KVa', array('MAX_LENGTH_CHECK'));
        
        $this->objFormParam->addParam('加盟店IPコード'              , 'clientip_ebank'  , CLIENTIP_LEN    , 'KVa', array());
        $this->objFormParam->addParam('加盟店IPコード'              , 'clientip_edy'  , CLIENTIP_LEN    , 'KVa', array());
        
        
    }

    function getValidateCheckErrorMessage($tab){
        $arrErr = $this->objFormParam->checkError();
        if ( count($arrErr) !== 0 ) {
            return $arrErr;
        }
    	if ($tab == 'credit') {
            return $this->getErrorMessage($this->getValidateCheckZeusCreditErrorMessage(), $this->getZeusSettingData());
    	} else {
    		$ipcode  = trim($_POST['clientip_'. $tab]);
	        $ipCheckResponse = $this->ipcodeCheck( $ipcode, 'clientip_' . $tab );
	        if( $ipCheckResponse !== false ){
	            return $ipCheckResponse;
	        }
    		
    		if ($tab == 'cvs') {        		
        		$sitestr = trim($_POST['sitestr']);
		        if(preg_match("/[\!-\/:-@\[-`\{-~]/", $sitestr)){
		           return array('sitestr'=> 'サイトバックURLの' . ZEUS_VALIDATE_ERROR_MESSAGE_02);
		        }
        	} else if ($tab == 'edy') {
        		$success_str = trim($_POST['success_str']);
        		$failure_str = trim($_POST['failure_str']);
		        if(preg_match("/[\!-\/:-@\[-`\{-~]/", $success_str)){
		           return array('success_str'=>'完了ページ戻りURLの' . ZEUS_VALIDATE_ERROR_MESSAGE_02);
		        }
		        if(preg_match("/[\!-\/:-@\[-`\{-~]/", $failure_str)){
		           return array('failure_str'=>'失敗ページ戻りURLの' . ZEUS_VALIDATE_ERROR_MESSAGE_02);
		        }
    		} else if ($tab == 'ebank') {
        		$ebank_sitestr = trim($_POST['ebank_sitestr']);
		        if(preg_match("/[\!-\/:-@\[-`\{-~]/", $ebank_sitestr)){
		           return array('ebank_sitestr'=>'完了ページ戻りURLの' . ZEUS_VALIDATE_ERROR_MESSAGE_02);
		        }
    		}
    	}
        return null;
    }

    function getValidateCheckZeusCreditErrorMessage(){
        $ipcode = trim($_POST['clientip']);
        $clientauthkey = trim($_POST['clientauthkey']);
        $ipCheckResponse = $this->ipcodeCheck( $ipcode, 'clientip' );
        if( $ipCheckResponse !== false ){
            return $ipCheckResponse;
        }
        $toApiPostData = $this->getZeusPostDataInformation($ipcode, $clientauthkey);

        $httpRequest = secureSendAction(SECURE_3D_INFORMATION_LINK_URL, $toApiPostData);
        if (!PEAR::isError( $httpRequest->sendRequest() )) {
            $response = $httpRequest->getResponseBody();
            GC_Utils::gfPrintLog('ゼウス応答結果(information)：'.$response);
            if(ereg('<status>invalid</status>', $response)) {
                $errorCode = $this->getZeusResultData($response, "/<code>(.*)<\/code>/");
                return array('clientip'=>ZEUS_AUTH_INFORMATION_ERROR_MESSAGE_02 ."<br/>". getAdminErrorMessate($errorCode));
            }
            if(!ereg('<status>success</status>', $response)) {
                return array('clientip'=>ZEUS_AUTH_INFORMATION_ERROR_MESSAGE_02 ."<br/>". getAdminErrorMessate($errorCode));
            }
            $this->isUse3dSecureCheckSystem = ( $this->getZeusResultData($response, "/<threed>(.*)<\/threed>/") === 'on' );
            $this->getCvvPatternFirst       = $this->getZeusResultData($response, "/<first>(.*)<\/first>/");
            $this->getCvvPatternQuick       = $this->getZeusResultData($response, "/<quick>(.*)<\/quick>/");
            $this->getDetails               = $this->getZeusResultData($response, "/<name>(.*)<\/name>/");
        } else {
            return array('clientip'=>ZEUS_AUTH_INFORMATION_ERROR_MESSAGE_01);
        }

        $httpRequest->clearPostData();

        return null;
    }

    function ipcodeCheck( $ipcode, $checkStr ) {
        if ( empty($ipcode) || !is_numeric($ipcode) ){
            return array($checkStr=>ZEUS_VALIDATE_ERROR_MESSAGE_01);
        }
        if ( strlen($ipcode) != 5 && strlen($ipcode) != 10 ){
            return array($checkStr=>ZEUS_VALIDATE_ERROR_MESSAGE_01);
        }
        return false;
    }

    function setConfig() {
        $sqlval = array();
        $arrConfig = $this->getConfig();
        foreach($this->objFormParam->getHashArray() as $k => $val){
            $arrConfig[$k] = $val;
        }
        $sqlval['sub_data'] = serialize($arrConfig);
        $this->objQuery->update('dtb_module', $sqlval, 'module_code = ?', array($this->module_name));
    }

    function getConfig() {
        $arrRet = $this->objQuery->select('sub_data', 'dtb_module', 'module_code = ?', array($this->module_name));
        $arrConfig = unserialize($arrRet[0]['sub_data']);
        return $arrConfig;
    }

    function getPaymentDB($memo03 = ''){
        $arrRet = array();
        $where = array($this->module_name);
        $sql = 'SELECT  memo10 as module_code, memo03, memo04, memo05, memo06, memo07 FROM dtb_payment WHERE memo10 = ?';
        if ($memo03 != '') {
            $where[] = (string) $memo03;
            $sql .= ' AND memo03 = ?';
        }

        $arrRet = $this->objQuery->getall($sql, $where);
        return $arrRet;
    }

    function setPaymentDBEdy(){
        $arrData = array(PAY_ZEUS_EDY =>
                       array('payment_method' => MDL_ZEUS_EDY_MODULE_TITLE,
                             'fix' => 3,
                             'charge_flg' => 1,
                             'charge' => 0,
                             'module_path' => MODULE_REALDIR . $this->module_name.'/zeus_edy.php',
                             'creator_id'  => $this->objSess->member_id,
                             'create_date' => 'now()',
                             'update_date' => 'now()',
                             'memo01' => (int)$_POST['clientip_edy'],
                             'memo02' => $this->getUniqKey(),       // 復元キー
                             'memo03' => PAY_ZEUS_EDY,
                             'memo04' => $_POST['success_url'],         // 完了ページURL
                             'memo05' => $_POST['success_str'],         // 完了ページURL文言
                             'memo06' => $_POST['failure_url'],         // 失敗ページURL
                             'memo07' => $_POST['failure_str'],         // 失敗ページURL文言
                             'memo10' => $this->module_name,        // 'mdl_zeus_211' ※memo03と合わせてユニーク
                             'del_flg' => '0'));

        foreach ($arrData as $data) {
            $arrPayment = $this->getPaymentDB(PAY_ZEUS_EDY);
            if (count($arrPayment) > 0) {
                unset($data['memo02']);  // 復元キーは更新対象外
                $this->objQuery->update('dtb_payment',
                                        $data,
                                        'memo10 = ? AND memo03 = ?',
                                        array($this->module_name, (string) $data['memo03']));
            } else {
                $max_rank = $this->objQuery->getone('SELECT max(rank) FROM dtb_payment');
                $data['rank'] = $max_rank + 1;
                $data['payment_id'] = $this->objQuery->nextVal('dtb_payment_payment_id');
                $this->objQuery->insert('dtb_payment', $data);
                $this->objQuery->insert('dtb_payment_options', array( 'deliv_id' => '1', 'payment_id' => $data['payment_id'], 'rank' => $data['rank'] ));
            }
        }
    }

    function setPaymentDBEbank(){
        $arrData = array(PAY_ZEUS_EBANK =>
                       array('payment_method' => MDL_ZEUS_EBANK_MODULE_TITLE,
                             'fix' => 3,
                             'charge_flg' => 1,
                             'charge' => 0,
                             'module_path' => MODULE_REALDIR . $this->module_name.'/zeus_ebank.php',
                             'creator_id'  => $this->objSess->member_id,
                             'create_date' => 'now()',
                             'update_date' => 'now()',
                             'memo01' => (int)$_POST['clientip_ebank'],
                             'memo02' => $this->getUniqKey(),       // 復元キー
                             'memo03' => PAY_ZEUS_EBANK,
                             'memo04' => $_POST['ebank_siteurl'],         // 完了ページURL
                             'memo05' => $_POST['ebank_sitestr'],         // 完了ページURL文言
                             'memo10' => $this->module_name,        // 'mdl_zeus_211' ※memo03と合わせてユニーク
                             'del_flg' => '0'));

        foreach ($arrData as $data) {
            $arrPayment = $this->getPaymentDB(PAY_ZEUS_EBANK);
            if (count($arrPayment) > 0) {
                unset($data['memo02']);  // 復元キーは更新対象外
                $this->objQuery->update('dtb_payment',
                                        $data,
                                        'memo10 = ? AND memo03 = ?',
                                        array($this->module_name, (string) $data['memo03']));
            } else {
                $max_rank = $this->objQuery->getone('SELECT max(rank) FROM dtb_payment');
                $data['rank'] = $max_rank + 1;
                $data['payment_id'] = $this->objQuery->nextVal('dtb_payment_payment_id');
                $this->objQuery->insert('dtb_payment', $data);
                $this->objQuery->insert('dtb_payment_options', array( 'deliv_id' => '1', 'payment_id' => $data['payment_id'], 'rank' => $data['rank'] ));
            }
        }
    }
    
    function setPaymentDBCvs(){
        $arrData = array(PAY_ZEUS_CVS =>
                       array('payment_method' => MDL_ZEUS_CVS_MODULE_TITLE,
                             'fix' => 3,
                             'charge_flg' => 1,
                             'charge' => 0,
                             'module_path' => MODULE_REALDIR . $this->module_name.'/zeus_cvs.php',
                             'creator_id'  => $this->objSess->member_id,
                             'create_date' => 'now()',
                             'update_date' => 'now()',
                             'memo01' => (int)$_POST['clientip_cvs'],
                             'memo02' => $this->getUniqKey(),       // 復元キー
                             'memo03' => PAY_ZEUS_CVS,
                             'memo04' => $_POST['siteurl'],         // サイト戻りURL
                             'memo05' => $_POST['sitestr'],         // サイト戻りURL文言
                             'memo10' => $this->module_name,        // 'mdl_zeus_211' ※memo03と合わせてユニーク
                             'del_flg' => '0'));

        foreach ($arrData as $data) {
            $arrPayment = $this->getPaymentDB(PAY_ZEUS_CVS);
            if (count($arrPayment) > 0) {
                unset($data['memo02']);  // 復元キーは更新対象外
                $this->objQuery->update('dtb_payment',
                                        $data,
                                        'memo10 = ? AND memo03 = ?',
                                        array($this->module_name, (string) $data['memo03']));
            } else {
                $max_rank = $this->objQuery->getone('SELECT max(rank) FROM dtb_payment');
                $data['rank'] = $max_rank + 1;
                $data['payment_id'] = $this->objQuery->nextVal('dtb_payment_payment_id');
                $this->objQuery->insert('dtb_payment', $data);
                $this->objQuery->insert('dtb_payment_options', array( 'deliv_id' => '1', 'payment_id' => $data['payment_id'], 'rank' => $data['rank'] ));
            }
        }
    }

    function setPaymentDBCredit(){
        $arrData = array();
        $cvvFlg = '';
        if( $this->getCvvPatternFirst === 'on' && $this->getCvvPatternQuick === 'on' ){
            $cvvFlg = 'cvv_on';
        }elseif( $this->getCvvPatternFirst === 'on' && $this->getCvvPatternQuick === 'off' ){
            $cvvFlg = 'cvv_first_use';
        }elseif( $this->getCvvPatternFirst === 'on' && $this->getCvvPatternQuick === 'optional' ){
            $cvvFlg = 'cvv_first_on_quick_opt';
        }elseif( $this->getCvvPatternFirst === 'optional' && $this->getCvvPatternQuick === 'optional' ){
            $cvvFlg = 'cvv_first_opt_quick_opt';
        }
        $secure3dFlg = ( $_POST['secure3d'] == '3' ) ? 'secure_3d_on' : 
                         (
                           ( $_POST['secure3d'] == '2' ) ? 'secure_3d_select' : '' 
                         );
        $quickChargeFlg = ( $_POST['quick_charge_flg'] == '1' ) ? 'quick_charge_on' : '';
        $arrData = array_merge($arrData,
                               array(PAY_ZEUS_CREDIT =>
                                     array('payment_method' => MDL_ZEUS_MODULE_TITLE,
                                           'fix' => 3,
                                           'charge_flg' => 1,
                                           'charge' => 0,
                                           'module_path' => MODULE_REALDIR . 'mdl_zeus_211/zeus_credit.php',
                                           'creator_id'  => $this->objSess->member_id,
                                           'create_date' => 'now()',
                                           'update_date' => 'now()',
                                           'memo01' => (int)$_POST['clientip'],
                                           'memo02' => $_POST['clientauthkey'],
                                           'memo03' => PAY_ZEUS_CREDIT,
                                           'memo04' => $cvvFlg,            // セキュリティコードの利用
                                           'memo05' => $quickChargeFlg,    // クイックチャージの利用
                                           'memo06' => $secure3dFlg,       // 3Dセキュアの利用
                                           'memo07' => $this->getDetails,  // 明細名の設定
                                           'memo10' => $this->module_name, // 'mdl_zeus_211' ※memo03と合わせてユニーク
                                           'del_flg' => '0')));
        foreach ($arrData as $data) {
            $arrPayment = $this->getPaymentDB($data['memo03']);
            if (count($arrPayment) > 0) {
                $this->objQuery->update('dtb_payment',
                                        $data,
                                        'memo10 = ? AND memo03 = ?',
                                        array($this->module_name, (string) $data['memo03']));
            } else {
                $max_rank = $this->objQuery->getone('SELECT max(rank) FROM dtb_payment');
                $data['rank'] = $max_rank + 1;

                $data['payment_id'] = $this->objQuery->nextVal('dtb_payment_payment_id');
                $this->objQuery->insert('dtb_payment', $data);

                $this->objQuery->insert('dtb_payment_options', array( 'deliv_id' => '1', 'payment_id' => $data['payment_id'], 'rank' => $data['rank'] ));

                if( array_key_exists( 'dtb_zeus_payment', array_flip( $this->objQuery->listTables()) ) ){
                    $dropTableSql = 'DROP TABLE dtb_zeus_payment';
                    $this->objQuery->query($dropTableSql);
                }

                $createTableSql = 'CREATE TABLE dtb_zeus_payment ('
                     . ' order_id       int NOT NULL ,'
                     . ' zeus_order_id  text             ,'
                     . ' zeus_request_data        text             ,'
                     . ' zeus_response_data       text             ,'
                     . ' memo           text             ,'
                     . ' create_date timestamp NOT NULL DEFAULT now(), '
                     . ' PRIMARY KEY  ( order_id ) '
                     . ') ';
                $this->objQuery->query($createTableSql);
            }
        }
    }

    function getUniqKey(){
        return sha1(uniqid(mt_rand(), true));
    }

    function getZeusSettingData(){
        $ipcode = trim($_POST['clientip']);
        $clientauthkey = trim($_POST['clientauthkey']);
        $toApiPostData = $this->getZeusPostDataInformation($ipcode, $clientauthkey);
        $httpRequest = secureSendAction(SECURE_3D_INFORMATION_LINK_URL, $toApiPostData);
        if (!PEAR::isError( $httpRequest->sendRequest() )) {
            $response = $httpRequest->getResponseBody();
            GC_Utils::gfPrintLog('ゼウス応答結果(information)：'.$response);
            if(ereg('<status>invalid</status>', $response)) {
                $errorCode = $this->getZeusResultData($response, "/<code>(.*)<\/code>/");
                return array('clientip'=>ZEUS_AUTH_INFORMATION_ERROR_MESSAGE_02 ."<br/>". getAdminErrorMessate($errorCode));
            }
            if(!ereg('<status>success</status>', $response)) {
                return array('clientip'=>ZEUS_AUTH_INFORMATION_ERROR_MESSAGE_02 ."<br/>". getAdminErrorMessate($errorCode));
            }
            $this->isUse3dSecureCheckSystem = ( $this->getZeusResultData($response, "/<threed>(.*)<\/threed>/") === 'on' );
            $this->isZeusCheck = true;

            $this->getCvvPatternFirst       = $this->getZeusResultData($response, "/<first>(.*)<\/first>/");
            $this->getCvvPatternQuick       = $this->getZeusResultData($response, "/<quick>(.*)<\/quick>/");
            $this->getDetails               = $this->getZeusResultData($response, "/<name>(.*)<\/name>/");
            $this->cvvUseFlagZeusGetData = false;
            if( $this->getCvvPatternFirst === 'on' && $this->getCvvPatternQuick === 'on' ){
                $this->cvvUseFlagZeusGetData = true;
            }elseif( $this->getCvvPatternFirst === 'on' && $this->getCvvPatternQuick === 'off' ){
                $this->cvvUseFlagZeusGetData = true;
            }elseif( $this->getCvvPatternFirst === 'on' && $this->getCvvPatternQuick === 'optional' ){
                $this->cvvUseFlagZeusGetData = true;
            }elseif( $this->getCvvPatternFirst === 'optional' && $this->getCvvPatternQuick === 'optional' ){
                $this->cvvUseFlagZeusGetData = true;
            }
        } else {
            return array('clientip'=>ZEUS_AUTH_INFORMATION_ERROR_MESSAGE_01);
        }
    }

    function getZeusPostDataInformation($ipcode, $key){
        return 
               "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
               "<request service=\"information\" action=\"ec_plugin\">".
               "  <authentication>".
               "    <clientip>" . $ipcode . "</clientip>".
               "    <key>" . $key . "</key>".
               "  </authentication>".
               "</request>";
    }

    function getZeusResultData( $zeusResponse, $pattern){
        preg_match($pattern, $zeusResponse, $matches);
        return ( count($matches) > 1 ) ? $matches[1] : "";
    }

    function updateOrderStatus() {
/*    	注文ステータスを追加しない  
        $objDB = new SC_Helper_DB_Ex();
        if ($objDB->sfDataExists('mtb_order_status', 'id=1000', array()) === false) {
            $rank = $this->objQuery->getone('SELECT max(rank) FROM mtb_order_status');
            $this->objQuery->insert('mtb_order_status', array('id' => ZEUS_ORDER_LACK, 'name' => '金額不足', 'rank' => $rank+1));
        }
        if ($objDB->sfDataExists('mtb_order_status', 'id=1001', array()) === false) {
            $rank = $this->objQuery->getone('SELECT max(rank) FROM mtb_order_status');
            $this->objQuery->insert('mtb_order_status', array('id' => ZEUS_ORDER_EXCESS, 'name' => '過剰入金', 'rank' => $rank+1));
        }
        if ($objDB->sfDataExists('mtb_order_status', 'id=1002', array()) === false) {
            $rank = $this->objQuery->getone('SELECT max(rank) FROM mtb_order_status');
            $this->objQuery->insert('mtb_order_status', array('id' => ZEUS_ORDER_ABORT, 'name' => '入金失敗', 'rank' => $rank+1));
        }
        SC_DB_MasterData_Ex::clearCache('mtb_order_status');
*/        
    }
    function getErrorMessage($message, $addmessage){
        if( empty($addmessage) ){
            return $message;
        }
        return array_merge($message, $addmessage);
    }
}
?>