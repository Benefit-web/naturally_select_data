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

<!--{if $initDisp === true || $arrErrCount > 0 }-->

		<form name="form1" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
		<input type="hidden" name="quick_charge_use" value="1">
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

		■お支払い回数<br>
		<font size="2"><font color="#ff6600">一部分割・リボ払いに対応していないカードブランドもございます。	</font></font><br>
		<!--{assign var=key1 value="payment_class"}-->
		<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
		<select name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" >
		<!--{html_options options=$arrPaymentClass selected=$arrForm[$key1].value}-->
		</select><br>
		<br>
		<!--{if $paymentDataCvv === "cvv_on" || $paymentDataCvv === "cvv_first_on_quick_opt" || $paymentDataCvv === "cvv_first_opt_quick_opt" }-->
		■クレジットカード・セキュリティコード<br>
		<a href="https://linkpt.cardservice.co.jp/ssldoc/csc_howto_m.html">セキュリティコードとは</a><br>
		<font size="2">半角数字入力</font><br>
		<!--{assign var=key1 value="cvv_data_quick"}-->
		<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
		<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="4" size="4" istyle="4">
		<br><br>
		<!--{/if}-->
		<br>
		<input type="hidden" name="mode" value="config">
		<center><input type="submit" name="register" value="確認する"></center>
<!--{else}-->

		<form name="form1" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
		<input type="hidden" name="quick_charge_use" value="1">
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

		■お支払い回数<br>
		<!--{assign var=key1 value="payment_class"}-->
		<!--{if $arrForm[$key1].value === "99" }-->
			ﾘﾎﾞ払い
		<!--{elseif  $arrForm[$key1].value === "01" }-->
			一括払い
		<!--{else}-->
		<!--{$arrForm[$key1].value|ltrim:0|escape}-->回払い
		<!--{/if}-->
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" ><br>
		<br>
		<!--{if $paymentDataCvv === "cvv_on" || $paymentDataCvv === "cvv_first_on_quick_opt" || $paymentDataCvv === "cvv_first_opt_quick_opt" }-->
		■クレジットカード・セキュリティコード<br>
		<!--{assign var=key1 value="cvv_data_quick"}-->
		<!--{$arrForm[$key1].value|escape}-->
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->">
		<br><br>
		<!--{/if}-->
		<input type="hidden" name="mode" value="next">
		<center><input type="submit" name="register" value="送信する"></center>

	</form>
	<form name="form1" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
		<input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->">
		<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
		<input type="hidden" name="mode" value="quick_charge_mobile">
		<input type="hidden" name="act" value="mobilequick">

		<!--{assign var=key1 value="payment_class"}-->
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
		<!--{if $paymentDataCvv === "cvv_on" || $paymentDataCvv === "cvv_first_on_quick_opt" || $paymentDataCvv === "cvv_first_opt_quick_opt" }-->
		<!--{assign var=key1 value="cvv_data_quick"}-->
		<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->">
		<!--{/if}-->
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