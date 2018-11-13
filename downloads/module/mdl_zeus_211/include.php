<?php
/**
 * include.php
 *
 * @copyright Copyright (C)  ZEUS CO.,LTD.All Rights Reserved.
 * @version $Id: include.php 22307 2013-09-25 05:03:18Z shimada $
 */

define('MDL_ZEUS_TITLE', 'ゼウスクレジット決済モジュール');
define('MDL_ZEUS_CODE' , 'mdl_zeus_211');
define('MDL_ZEUS_MODULE_TITLE', 'ZEUSクレジット');
define('MDL_ZEUS_CVS_TITLE'        , 'ゼウスコンビニ決済モジュール');
define('MDL_ZEUS_CVS_MODULE_TITLE' , 'ZEUSコンビニ決済');

define('MDL_ZEUS_EDY_TITLE'        , 'ゼウス楽天Edy決済モジュール');
define('MDL_ZEUS_EDY_MODULE_TITLE' , 'ZEUS楽天Edy決済');

define('MDL_ZEUS_EBANK_TITLE'        , 'ゼウス入金おまかせ決済モジュール');
define('MDL_ZEUS_EBANK_MODULE_TITLE' , 'ZEUS銀行振込決済');

define('CVS_LINK_POINT_URL'   , 'https://linkpt.cardservice.co.jp/cgi-bin/cvs.cgi');
define('EDY_LINK_POINT_URL'   , 'https://linkpt.cardservice.co.jp/cgi-bin/edy.cgi');
define('EBANK_LINK_POINT_URL'   , 'https://linkpt.cardservice.co.jp/cgi-bin/ebank.cgi');

define ('SECURE_LINK_URL'   , 'https://linkpt.cardservice.co.jp/cgi-bin/secure/api.cgi');
define ('SECURE_3D_LINK_URL', 'https://linkpt.cardservice.co.jp/cgi-bin/secure/api.cgi');
define ('SECURE_3D_INFORMATION_LINK_URL', 'https://linkpt.cardservice.co.jp/cgi-bin/secure/api.cgi');

// 支払い種別
define('PAY_ZEUS_CREDIT', 1);
define('PAY_ZEUS_BANK', 2);
define('PAY_ZEUS_CVS', 3);
define('PAY_ZEUS_EDY', 4);
define('PAY_ZEUS_EBANK', 5);

// 文字数制限
define ('CLIENTIP_LEN'    , 10);
define ('CLIENTSECURE_LEN', 40);
define ('SEND_LEN'        , 20);
define ('CVV_FLG_LEN'     , 1);
define ('CVV_DATA_LEN'    , 4);
define ('CARD_YEAR_LEN'   , 4);
define ('CARD_MONTH_LEN'  , 2);
define ('SITE_URL_LEN'        , 256);
define ('SITE_URL_STR_LEN'    , 256);
define ('ZEUS_CREDIT_NO_LEN'  , 16);

// 受注ステータス金額不足
//define('ZEUS_ORDER_LACK', 1000);
// 受注ステータス過剰入金
//define('ZEUS_ORDER_EXCESS', 1001);
// 受注ステータス入金失敗
//define('ZEUS_ORDER_ABORT', 1002);

// 認証失敗時のエラーメッセージ
define('ZEUS_AUTH_ERROR_MESSAGE', '認証に失敗しました。お手数ですが入力内容をご確認ください。');
define('ZEUS_ERROR_EXPIRATION_DATE', '※ 有効期限の選択に誤りが有ります。');
define('ZEUS_VALIDATE_ERROR_MESSAGE_01', '加盟店IPコードが不正です。');
define('ZEUS_VALIDATE_ERROR_MESSAGE_02', '文言に、半角記号はご利用できません。');

define('ZEUS_CVS_SITE_TITLE', 'コンビニ決済申し込み');
define('ZEUS_CVS_SITE_TITLE_MOBILE', 'ｺﾝﾋﾞﾆ決済申し込み');
define('ZEUS_CVS_NOT_CREDITED',        '01');    //未入金
define('ZEUS_CVS_PRELIMINARY_DEPOSIT', '04');    //速報済（入金速報時）
define('ZEUS_CVS_SALES_CONFIRMATION',  '05');    //確報済（売上確定時）
define('ZEUS_CVS_CANCEL_PAYMENT',      '06');    //速報取消（入金取消時）

define('ZEUS_EDY_SITE_TITLE', '楽天Edy決済申し込み');
define('ZEUS_EDY_SITE_TITLE_MOBILE', '楽天Edy決済申し込み');
define('ZEUS_EDY_PAID',  '04');    //支払済
define('ZEUS_EDY_FAILED', '05');    //支払失敗

define('ZEUS_EBANK_SITE_TITLE', '銀行振込決済申し込み');
define('ZEUS_EBANK_SITE_TITLE_MOBILE', '銀行振込決済申し込み');
define('ZEUS_EBANK_WAIT',  '01');    //受付中
define('ZEUS_EBANK_NOT_PAID', '02');    //未入金
define('ZEUS_EBANK_PAID', '03');    //入金済
define('ZEUS_EBANK_ERROR', '04');    //エラー
define('ZEUS_EBANK_FAILED', '05');    //入金失敗

define('ZEUS_AUTH_INFORMATION_ERROR_MESSAGE_01', '[ゼウス通信結果] 通信に失敗しました。');
define('ZEUS_AUTH_INFORMATION_ERROR_MESSAGE_02', '[ゼウス通信結果] 加盟店IPコード/認証コードにて認証出来ません。');
define('ZEUS_AUTH_INFORMATION_ERROR_MESSAGE_03', '[ゼウス通信結果] 3Dセキュア認証は未契約となっております。');

define('ZEUS_DUPLICATE_ERROR_MESSAGE', '既に決済は完了しております。');

function getPaymentClass(){
    // クレジット分割回数
    return $arrPaymentClass = array(
        '01' => '一括払い',
        '03' => '3回払い',
        '05' => '5回払い',
        '06' => '6回払い',
        '10' => '10回払い',
        '12' => '12回払い',
        '15' => '15回払い',
        '18' => '18回払い',
        '20' => '20回払い',
        '24' => '24回払い',
        '99' => 'リボ払い'
    );
}

function getAdminErrorMessate($code){
    $errorArray = array(
        '02130114' => 'IP コードが未入力です。',
        '02130117' => 'IP コードの入力に誤りがあります。',
        '02130110' => '無効な IP コードです。',
        '02130118' => '無効な IP コードです。',
        '02130214' => '認証キーが未入力です。',
        '02130217' => '認証キーの入力に誤りがあります。',
        '02130210' => '無効な認証キーです。'
    );
    return $errorArray[$code];
}

function sendPaymentData($module_code, $total) {
    $store_host = preg_replace("@(^https?://)|(/+$)@", '', OSTORE_SSLURL);
    $fp = @fsockopen($store_host, 80, $errno, $errstr, 5);

    if ($fp !== false) {
        $url = OSTORE_SSLURL. 'payment/payment.php';
        $option = array(
            'timeout' => 5, 
            'readTimeout' => array(5, 0)
        );
        $req = new HTTP_Request($url, $option);
        $req->setMethod(HTTP_REQUEST_METHOD_POST);

        $arrPost = array(
            'module_code' => $module_code,
            'site_url' => SITE_URL,
            'total' => $total
        );

        $req->addPostDataArray($arrPost);
        $req->sendRequest();
        $req->clearPostData();
    }
}
function secureSendAction($url, $postData){
    if (version_compare(ECCUBE_VERSION, '2.12.0-dev') < 0) {
        require_once(DATA_REALDIR . 'module/Request.php');
    }
    $httpRequest = new HTTP_Request($url);
    $httpRequest->setMethod(HTTP_REQUEST_METHOD_POST);
    $httpRequest->addHeader('Content-Type', 'application/xml');
    $httpRequest->addRawPostData($postData);
    return $httpRequest;
}
