<script type="text/javascript">//<![CDATA[
var send = true;

function fnCheckSubmit() {
    if(send) {
        send = false;
        return true;
    } else {
        alert("只今、処理中です。しばらくお待ち下さい。");
        return false;
    }
}

//]]>
</script>
<noscript>
    <p>JavaScript を有効にしてご利用下さい.</p>
</noscript>
<a name="top" id="top"></a>

<form name="zeus_form" id="zeus_form" method="post" action="./load_payment_module.php" autocomplete="off">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
<h2 class="block_name_list">クレジットカード決済</h2>
<!--{if $initDisp === true || $arrErrCount > 0 }-->
<p class="flow_area"><img src="<!--{$TPL_URLPATH}-->img/common/order_flow_5_cre.jpg" alt="クレジットカード決済お支払い手続き" /></p>
<!--{else}-->
<p class="flow_area"><img src="<!--{$TPL_URLPATH}-->img/common/order_flow_6.jpg" alt="クレジットカード決済お支払い手続き" /></p>
<!--{/if}-->
<!--{if $tpl_error != ""}-->
    <font color="#CC0000" size="2"><span class="attention"><!--{$tpl_error}--></span></font><br />
	詳しくは<span style="color:#0000ff; text-decoration:underline;">support@cardservice.co.jp</span>
	もしくは0570-02-3939(つながらないときは 03-4334-0500)までご連絡下さい。
	<br/>
	<br/>
<!--{/if}-->
<!--{if $initDisp === true || $arrErrCount > 0 }-->
※お申し込みになる場合は、以下の項目をご入力いただき「確認する」ボタンを押してください。<br />
	<span class="attention">
まだご注文手続きが完了しておりません。<br/>
「確認する」以外のボタン、リンクを押しますと、クレジットカード決済手続きが<br/>
終了してしまいますので、ご注意ください。<br/>
	</span> 
<!--{else}-->
※お申し込みになる場合は、以下の項目をご入力いただき「送信する」ボタンを押してください。<br />
	<span class="attention">
まだご注文手続きが完了しておりません。<br/>
「送信する」「入力画面へ戻る」以外のボタン、リンクを押しますと、<br/>
クレジットカード決済手続きが終了してしまいますので、ご注意ください。<br/>
	</span> 
<!--{/if}-->
<!--{if $arrErrCount > 0 || $other_tpl_error != '' }-->
	<br/><font color="#ff0000">入力項目に不足がございます。</font><br/>
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

<br />
<table>
	<tr >
		<th colspan="2" >ご利用内容</th>
	</tr>
	<!--{if $getDetails != ''}-->
		<tr>
			<th width="141" >ご利用代金の請求名</th>
			<td width="608" align="left"><!--{$getDetails|escape}--></td>
		</tr>
	<!--{/if}-->
	<tr>
		<th width="141" >ご利用金額</th>
		<td width="608" align="left"><!--{$paymentTotal|escape}-->円<br /></td>
	</tr>
	<tr>
		<th width="141" >E-Mailアドレス</th>
		<td width="608" align="left"><!--{$paymentEmail|escape}--><br /></td>
	</tr>
	<tr>
		<th width="141" >電話番号</th>
		<td width="608" align="left"><!--{$paymentTel|escape}--></td>
	</tr>
</table>

<!--{if $isUse3dSecureCheckSystem === true}-->
	<!--{assign var=key value="secure_3d_use"}-->
	<input type="hidden" name="<!--{$key}-->" value="1" >
<!--{/if}-->
<!--{if $initDisp === true || $arrErrCount > 0 }-->
	<!--{if $isUseQuickChargeCheckSystem === true }-->
		<table>
			<tr>
				<td align="left" width=784>&nbsp;&nbsp;
					<!--{assign var=key value="quick_charge_use"}-->
					<input type="checkbox" id="quick" onclick="var state=( document.getElementById('quick').checked == true )?'none':'block';document.getElementById('normalCard').style.display=state;var state=( document.getElementById('quick').checked != true )?'none':'block';document.getElementById('quickCard').style.display=state;" name="<!--{$key}-->" <!--{if $arrForm[$key].value == '1'}-->checked<!--{/if}--> value="1" >
					<strong>前回利用したカード情報を利用する。</strong>
						<!--{if $isUseQuickChargeCvv === true }-->
							<span class="attention">※セキュリティコードのみ必須入力となります。</span>
						<!--{/if}-->
				</td>
			</tr>
		</table>
	<!--{/if}-->
	<table>
		<tr >
			<th colspan="2" >支払回数</th>
		</tr>
		<tr>
			<th width="141" >支払回数</th>
			<td width="608" align="left">
				<!--{assign var=key1 value="payment_class"}-->
				<span class="attention"><!--{$arrErr[$key1]}--></span>
				<select name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" >
				<!--{html_options options=$arrPaymentClass selected=$arrForm[$key1].value}-->
				</select>
				<span class="attention">※一部分割・リボ払いに対応していないカードブランドもございます。</span>
			</td>
		</tr>
	</table>
	<div id="normalCard">
	<table>
		<tr >
			<!--{if $isUseQuickChargeCheckSystem === true }-->
				<th colspan="3"  width="766">前回とは別のクレジットカードを利用する場合</th>
			<!--{else}-->
				<th colspan="3"  width="766">クレジットカード情報</th>
			<!--{/if}-->
		</tr>
		<tr>
			<th width="141" >氏名<br />(Name)<br /></th>
			<td width="385" align="left">
				<!--{assign var=key1 value="card_name01"}-->
				<!--{assign var=key2 value="card_name02"}-->
				<span class="attention"><!--{$arrErr[$key1]}--></span>
				<span class="attention"><!--{$arrErr[$key2]}--></span>
				名<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" class="box100">
				姓<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->" style="<!--{$arrErr[$key2]|sfGetErrorColor}-->" class="box100">
				<br /><span class="attention">【半角英字】</span> 
			</td>
			<td width="206" >例）TARO YAMADA<br /><span class="attention">※カード上の名前と申込者名が一致しない場合、クレジットカード使用停止などの処分が課せられる場合があります。</span><br /><br /></td>
		</tr>
		<tr>
			<th width="141" ><br />カード番号<br />(Card Number)<br /><br />&nbsp;</th>
			<td width="385" align="left" nowrap>
				<!--{assign var=key1 value="card_no"}-->
				<span class="attention"><!--{$arrErr[$key1]}--></span>
				<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key1]|sfGetErrorColor}-->" class="box150" >
				<br /><span class="attention">【半角数字】</span><br /></td>
			<td width="206" >例）<br />450123456789 0123</td>
		</tr>
		<tr>
			<th width="141" >カード有効期限<br />(EXP)</th>
			<td width="385" align="left">
				<!--{assign var=key1 value="card_month"}-->
				<!--{assign var=key2 value="card_year"}-->
				<span class="attention"><!--{$arrErr[$key1]}--></span>
				<span class="attention"><!--{$arrErr[$key2]}--></span>
				<select name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" >
				<option value="">--</option>
				<!--{html_options options=$arrMonth selected=$arrForm[$key1].value}-->
				</select>月/
				<select name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->" style="<!--{$arrErr[$key2]|sfGetErrorColor}-->" >
				<option value="">--</option>
				<!--{html_options options=$arrYear selected=$arrForm[$key2].value}-->
				</select>年
			</td>
			<td width="206" >例）12月　2012年</td>
		</tr>
		<!--{if $paymentDataCvv === "cvv_on" || $paymentDataCvv === "cvv_first_use" || $paymentDataCvv === "cvv_first_on_quick_opt" || $paymentDataCvv === "cvv_first_opt_quick_opt" }-->
		<tr>
			<th width="141" >クレジットカード・セキュリティコード<br /></th>
			<td width="385" align="left">
				<!--{assign var=key1 value="cvv_data"}-->
				<span class="attention"><!--{$arrErr[$key1]}--></span>
				<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="4" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" size="4" class="box60">
				<br /><span class="attention">【半角数字】</span><br />
			</td>
			<td width="206" >例）999 <br /><a href="http://www.cardservice.co.jp/info/csc/index.html" target="_blank">セキュリティコードとは</a><br /></td>
		</tr>
		<!--{/if}-->
	</table>
	</div>
	<!--{if $isUseQuickChargeCheckSystem === true }-->
		<br />
		<div id="quickCard" style="display:none">
			<table>
				<!--{if $paymentDataCvv === "cvv_on" || $paymentDataCvv === "cvv_first_on_quick_opt" || $paymentDataCvv === "cvv_first_opt_quick_opt" }-->
				<tr >
					<th colspan="3" >前回のカード情報を利用する場合</th>
				</tr>
				<tr>
					<th width="141" >クレジットカード・セキュリティコード<br /></th>
					<td width="385" align="left">
						<!--{assign var=key1 value="cvv_data_quick"}-->
						<span class="attention"><!--{$arrErr[$key1]}--></span>
						<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="4" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" size="4" class="box60">
						<br /><span class="attention">【半角数字】</span><br />
					</td>
					<td width="206" >例）999 <br /><a href="http://www.cardservice.co.jp/info/csc/index.html" target="_blank">セキュリティコードとは</a></td>
				</tr>
				<!--{/if}-->
			</table>
		</div>
	<!--{/if}-->
<!--{else}-->
	<!--{if $isUseQuickChargeCheckSystem === true }-->
		<!--{assign var=key value="quick_charge_use"}-->
		<input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
	<!--{/if}-->
	<table>
		<tr>
			<th colspan="2" >支払回数</th>
		</tr>
		<tr>
			<th width="141" >支払回数</th>
			<td width="608" align="left">
				<!--{assign var=key1 value="payment_class"}-->
				<span class="attention"><!--{$arrErr[$key1]}--></span>
				<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->">
				<!--{if $arrForm[$key1].value === "99" }-->
					ﾘﾎﾞ払い
				<!--{elseif  $arrForm[$key1].value === "01" }-->
					一括払い
				<!--{else}-->
				<!--{$arrForm[$key1].value|ltrim:0|escape}-->回払い
				<!--{/if}-->
			</td>
		</tr>
	</table>

	<!--{if $isUseQuickChargeCheckSystem === true }-->
		<!--{assign var=key value="quick_charge_use"}-->
		<!--{if $arrForm[$key].value !== '1'}-->
			<div id="normalCard">
			<table>
				<tr >
					<th colspan="2" >前回とは別のクレジットカードを利用する場合</th>
				</tr>
				<tr>
					<th width="141" >氏名<br />(Name)<br /></th>
					<td width="608" align="left">
						<!--{assign var=key1 value="card_name01"}-->
						<!--{assign var=key2 value="card_name02"}-->
						<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
						<input type="hidden" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" >
						<!--{$arrForm[$key1].value|escape}-->&nbsp;
						<!--{$arrForm[$key2].value|escape}-->
						<br />
					</td>
				</tr>
				<tr>
					<th width="141" >カード番号<br />(Card Number)<br /></th>
					<td width="608" align="left">
						<!--{assign var=key1 value="card_no"}-->
						<span class="attention"><!--{$arrErr[$key1]}--></span>
						<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
						<!--{$arrForm[$key1].value|escape}-->
				</tr>
				<tr>
					<th width="141" >カード有効期限<br />(EXP)<br /></th>
					<td width="608" align="left">
						<!--{assign var=key1 value="card_month"}-->
						<!--{assign var=key2 value="card_year"}-->
						<span class="attention"><!--{$arrErr[$key1]}--></span>
						<span class="attention"><!--{$arrErr[$key2]}--></span>
						<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
						<input type="hidden" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" >
						<!--{$arrForm[$key1].value|escape}-->月/<!--{$arrForm[$key2].value|escape}-->年
					</td>
				</tr>
				<!--{if $paymentDataCvv === "cvv_on" || $paymentDataCvv === "cvv_first_use" || $paymentDataCvv === "cvv_first_on_quick_opt" || $paymentDataCvv === "cvv_first_opt_quick_opt" }-->
				<tr>
					<th width="141" >クレジットカード・セキュリティコード<br /></th>
					<td width="608" align="left">
						<!--{assign var=key1 value="cvv_data"}-->
						<span class="attention"><!--{$arrErr[$key1]}--></span>
						<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
						<!--{$arrForm[$key1].value|escape}-->
					</td>
				</tr>
				<!--{/if}-->
			</table>
			</div>

			<br />
		<!--{else}-->
			<div>
				<table>
					<!--{if $paymentDataCvv === "cvv_on" || $paymentDataCvv === "cvv_first_on_quick_opt" || $paymentDataCvv === "cvv_first_opt_quick_opt" }-->
					<tr >
						<th colspan="2" >前回のカード情報を利用する場合</th>
					</tr>
					<tr>
						<th width="141" >クレジットカード・セキュリティコード<br /></th>
						<td width="608" align="left">
							<!--{assign var=key1 value="cvv_data_quick"}-->
							<span class="attention"><!--{$arrErr[$key1]}--></span>
							<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->">
							<!--{$arrForm[$key1].value|escape}-->
						</td>
					</tr>
					<!--{/if}-->
				</table>
			</div>
		<!--{/if}-->
	<!--{else}-->
		<div id="normalCard">
		<table>
			<tr >
				<th colspan="2"  width="466">クレジットカード情報</th>
			</tr>
			<tr>
				<th width="141" >氏名<br />(Name)<br /></th>
				<td width="608" align="left">
					<!--{assign var=key1 value="card_name01"}-->
					<!--{assign var=key2 value="card_name02"}-->
					<span class="attention"><!--{$arrErr[$key1]}--></span>
					<span class="attention"><!--{$arrErr[$key2]}--></span>
					<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
					<input type="hidden" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" >
					<!--{$arrForm[$key1].value|escape}-->&nbsp;
					<!--{$arrForm[$key2].value|escape}-->
				</td>
			</tr>
			<tr>
				<th width="141" >カード番号<br />(Card Number)</th>
				<td width="608" align="left">
					<!--{assign var=key1 value="card_no"}-->
					<span class="attention"><!--{$arrErr[$key1]}--></span>
					<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
					<!--{$arrForm[$key1].value|escape}-->
				</td>
			</tr>
			<tr>
				<th width="141" >カード有効期限<br />(EXP)<br /></th>
				<td width="608" align="left">
					<!--{assign var=key1 value="card_month"}-->
					<!--{assign var=key2 value="card_year"}-->
					<span class="attention"><!--{$arrErr[$key1]}--></span>
					<span class="attention"><!--{$arrErr[$key2]}--></span>
					<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" >
					<input type="hidden" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" >
					<!--{$arrForm[$key1].value|escape}-->月/<!--{$arrForm[$key2].value|escape}-->年
				</td>
			</tr>
			<!--{if $paymentDataCvv === "cvv_on" || $paymentDataCvv === "cvv_first_use" || $paymentDataCvv === "cvv_first_on_quick_opt" || $paymentDataCvv === "cvv_first_opt_quick_opt" }-->
			<tr>
				<th width="141" >クレジットカード・セキュリティコード<br /></th>
				<td width="608" align="left">
					<!--{assign var=key1 value="cvv_data"}-->
					<span class="attention"><!--{$arrErr[$key1]}--></span>
					<input type="hidden" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->">
					<!--{$arrForm[$key1].value|escape}-->
				</td>
			</tr>
			<!--{/if}-->
		</table>
		</div>
	<!--{/if}-->
<!--{/if}-->

	<br />
	<div align="center">
	<!--{if $initDisp === true || $arrErrCount > 0 }-->
		<input type="hidden" name="mode" value="config">
		<input type="submit" value="戻る" onclick="document.zeus_form.mode.value='rollback';return fnCheckSubmit();" />
		<input type="submit" value="確認する" onclick="return fnCheckSubmit();" />
	<!--{else}-->
		<input type="hidden" value="return" name="mode" id="mode">
		<input type="submit" value="入力画面へ戻る" onclick="return fnCheckSubmit();" />&nbsp;
		<input type="submit" value="送信する"       onclick="document.zeus_form.mode.value='next';document.getElementById('mode').value='next';return fnCheckSubmit();"/>
	<!--{/if}-->
	</div>
	
</form>
<br />
<table>
	<tr>
		<td width="766">
			<strong>【お問い合わせ】</strong><br />
			株式会社ゼウス<br />
			〒150-0002 東京都渋谷区渋谷2-1-1 青山ファーストビル<br />
			カスタマーサポート（24時間365日）<br />

			電話番号: 0570-02-3939（つながらないときは 03-4334-0500）<br />
			E-mail: <span style="color:#0000ff; text-decoration:underline;">support@cardservice.co.jp</span>
		</td>
	</tr>
</table>
