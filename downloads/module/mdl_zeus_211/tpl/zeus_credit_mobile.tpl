<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<title>ZeusCredit</title>
</head>
<body>

<center>クレジットカード決済申し込み</center>

<hr>
<!--{if $isUseQuickChargeCheckSystem === true && ( $initDisp === true || $arrErrCount > 0 ) }-->
	<form name="form1" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
	<input type="hidden" name="mode" value="quick_charge_mobile">
	<input type="hidden" name="act" value="mobilequick">
	<input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->">
	前回利用したカード情報を利用するかたはこちら<br>
	<input type="submit" name="register" value="利用する">
	<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
	</form>
<!--{/if}-->

<!--{if $arrErrCount > 0 || $other_tpl_error != '' }-->
	<font color="#ff0000">入力項目に不足がございます。</font><br/>
<!--{/if}-->
<!--{if $other_tpl_error != '' }-->
	<font color="red"><!--{$other_tpl_error}--></font><br>
<!--{/if}-->
<!--{assign var=errorVal value="payment_class"}-->
	<font color="#ff0000"><!--{$arrErr[$errorVal]}--></font>
<!--{assign var=errorVal value="card_no"}-->
	<font color="#ff0000"><!--{$arrErr[$errorVal]}--></font>
<!--{assign var=errorVal value="card_month"}-->
	<font color="#ff0000"><!--{$arrErr[$errorVal]}--></font>
<!--{assign var=errorVal value="card_year"}-->
	<font color="#ff0000"><!--{$arrErr[$errorVal]}--></font>
<!--{assign var=errorVal value="card_name01"}-->
	<font color="#ff0000"><!--{$arrErr[$errorVal]}--></font>
<!--{assign var=errorVal value="card_name02"}-->
	<font color="#ff0000"><!--{$arrErr[$errorVal]}--></font>
<!--{assign var=errorVal value="cvv_data"}-->
	<font color="#ff0000"><!--{$arrErr[$errorVal]}--></font>
<!--{assign var=errorVal value="cvv_data_quick"}-->
	<font color="#ff0000"><!--{$arrErr[$errorVal]}--></font>

<!--{* 決済時のエラーを表示 *}-->
<!--{if $tpl_error != ""}-->
	<font color="red"><!--{$tpl_error}--></font><br>
	詳しくは<a href="mailto:support@cardservice.co.jp">support@cardservice.co.jp </a>
	もしくは<a href="tel:0570023939">0570-02-3939</a>（つながらないときは<a href="tel:0343340500">03-4334-0500</a>）までご連絡下さい。
<!--{/if}-->

<form name="form1" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
<input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />

<!--{if $getDetails != ''}-->
	■ご利用代金の請求名<br>
	<!--{$getDetails|escape}--><br>
	<br>
<!--{/if}-->

■ご利用金額<br>
<!--{$paymentTotal|escape}-->円<br>
<br>

<!--{if $initDisp === true || $arrErrCount > 0 }-->
		■お支払い回数<br>
		<font size="2"><font color="#ff6600">一部分割・リボ払いに対応していないカードブランドもございます。</font></font><br>
		<!--{assign var=key1 value="payment_class"}-->
		<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
		<select name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" >
		<!--{html_options options=$arrPaymentClass selected=$arrForm[$key1].value}-->
		</select>
		<br><br>
		■E-Mailアドレス<br>
		<!--{$paymentEmail|escape}--><br>
		<br>
		■電話番号<br>
		<!--{$paymentTel|escape}--><br>
		<br>
		■カード番号<br>
		<font size="2"><font color="#ff6600">ご本人名義のカードをご使用ください。</font></font><br>
		半角数字入力（例：1234567890123456）</font><br>
		<!--{assign var=key1 value="card_no"}-->
		<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
		<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" size="20" istyle="4">
		<br><br>

		■有効期限<br>
		<!--{assign var=key1 value="card_month"}-->
		<!--{assign var=key2 value="card_year"}-->
		<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
		<font color="#ff0000"><!--{$arrErr[$key2]}--></font>
		<select name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->">
		<option value="">--</option>
		<!--{html_options options=$arrMonth selected=$arrForm[$key1].value}-->
		</select>月/
		<select name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->">
		<option value="">--</option>
		<!--{html_options options=$arrYear selected=$arrForm[$key2].value}-->
		</select>年
		<br><br>

		■氏名<br>
		<font size="2">半角英字入力（例：TARO YAMADA）</font><br>
		<!--{assign var=key1 value="card_name01"}-->
		<!--{assign var=key2 value="card_name02"}-->
		<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
		<font color="#ff0000"><!--{$arrErr[$key2]}--></font>
		名<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" istyle="3" size="15"><br>
		姓<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" istyle="3" size="15">
		<br><br>

		<!--{if $paymentDataCvv === "cvv_on" || $paymentDataCvv === "cvv_first_use"  || $paymentDataCvv === "cvv_first_on_quick_opt" || $paymentDataCvv === "cvv_first_opt_quick_opt" }-->
		■クレジットカード・セキュリティコード<br>
		<a href="https://linkpt.cardservice.co.jp/ssldoc/csc_howto_m.html">セキュリティコードとは</a><br>
		<font size="2">半角数字入力</font><br>
		<!--{assign var=key1 value="cvv_data"}-->
		<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
		<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="4" size="4" istyle="4">
		<br><br>
		<!--{/if}-->
		<br>
		<input type="hidden" name="mode" value="config">
		<center><input type="submit" name="register" value="確認する"></center>
		</form>
		<form name="form1" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
		<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
		<input type="hidden" name="mode" id="mode" value="rollback">
		<center><input type="submit" name="register" value="戻る"></center>
<!--{else}-->
		■お支払い回数<br>
		<!--{assign var=key1 value="payment_class"}-->
		<!--{if $arrForm[$key1].value === "99" }-->
			ﾘﾎﾞ払い
		<!--{elseif  $arrForm[$key1].value === "01" }-->
			一括払い
		<!--{else}-->
		<!--{$arrForm[$key1].value|ltrim:0|escape}-->回払い
		<!--{/if}-->
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
		<br><br>
		■E-Mailアドレス<br>
		<!--{$paymentEmail|escape}--><br>
		<br>
		■電話番号<br>
		<!--{$paymentTel|escape}--><br>
		<br>
		■カード番号<br>
		<!--{assign var=key1 value="card_no"}-->
		<!--{$arrForm[$key1].value|escape}-->
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >

		<br><br>

		■有効期限<br>
		<!--{assign var=key1 value="card_month"}-->
		<!--{assign var=key2 value="card_year"}-->
		<!--{$arrForm[$key1].value|escape}-->月/<!--{$arrForm[$key2].value|escape}-->年
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
		<input type="hidden" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" >
		<br><br>

		■氏名<br>
		<!--{assign var=key1 value="card_name01"}-->
		<!--{assign var=key2 value="card_name02"}-->
		<!--{$arrForm[$key1].value|escape}-->&nbsp;<!--{$arrForm[$key2].value|escape}-->

		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
		<input type="hidden" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" >

		<br><br>

		<!--{if $paymentDataCvv === "cvv_on" || $paymentDataCvv === "cvv_first_use"  || $paymentDataCvv === "cvv_first_on_quick_opt" || $paymentDataCvv === "cvv_first_opt_quick_opt" }-->
		■クレジットカード・セキュリティコード<br>
		<!--{assign var=key1 value="cvv_data"}-->
		<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
		<!--{$arrForm[$key1].value|escape}-->
		<br><br>
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->">
		<!--{/if}-->
		<br>
		<input type="hidden" name="mode" value="next">
		<center><input type="submit" name="register" value="送信する"></center>

	</form>
	<form name="form1" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
		<input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->">
		<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />

		<!--{assign var=key1 value="payment_class"}-->
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
		<!--{assign var=key1 value="card_no"}-->
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
		<!--{assign var=key1 value="card_month"}-->
		<!--{assign var=key2 value="card_year"}-->
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
		<input type="hidden" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" >
		<!--{assign var=key1 value="card_name01"}-->
		<!--{assign var=key2 value="card_name02"}-->
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
		<input type="hidden" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" >
		<!--{if $paymentDataCvv === "cvv_on" || $paymentDataCvv === "cvv_first_use"  || $paymentDataCvv === "cvv_first_on_quick_opt" || $paymentDataCvv === "cvv_first_opt_quick_opt" }-->
		<!--{assign var=key1 value="cvv_data"}-->
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->">
		<!--{/if}-->
		<input type="hidden" name="mode" id="mode" value="return">
		<center><input type="submit" name="register" value="入力画面へ戻る"></center>
<!--{/if}-->

</form>

<br>
<hr>
お問合せ<br>
<a href="http://www.cardservice.co.jp/" target="_blank">株式会社ゼウス</a><br>〒150-0002 東京都渋谷区渋谷2-1-1 青山ファーストビル
<br>
カスタマーサポート（24時間365日）<br>
Tel：<a href="tel:0570023939">0570-02-3939</a><br>（つながらないときは<a href="tel:0343340500">03-4334-0500</a>）<br>
E-mail：<a href="mailto:support@cardservice.co.jp">support@cardservice.co.jp </a><br>
<hr>

<a href="<!--{$smarty.const.MOBILE_TOP_URLPATH}-->" accesskey="0"><!--{0|numeric_emoji}-->TOPページへ</a><br>

<br>
</body>
</html>