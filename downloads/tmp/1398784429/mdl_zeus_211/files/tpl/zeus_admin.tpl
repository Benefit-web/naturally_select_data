<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_header.tpl"}-->
<script type="text/javascript">//<![CDATA[
self.moveTo(20,20);
self.resizeTo(620, 650);
self.focus();
//]]>

<!--
var arrTabs = new Array('credit', 'ebank', 'edy', 'cvs');
function select_zeus_admin_tab(target) {
    for (var i = 0; i < arrTabs.length; i++) {
		var contents_id = 'tab_contents_' + arrTabs[i];
		var tab_id = 'tab_' + arrTabs[i];
		if (document.getElementById(contents_id)) {
		    if (arrTabs[i] == target) {
				document.getElementById(contents_id).style.display='block';
		    } else {
				document.getElementById(contents_id).style.display='none';
		    }
		}
		if (document.getElementById(tab_id)) {
		    if (arrTabs[i] == target) {
				document.getElementById(tab_id).className = 'tab_selected';
		    } else {
			document.getElementById(tab_id).className = 'tab_nonselect';
		    }
		}
	}
    document.getElementById('disp_zeus_tab_selected').value = target;
}

function select_zeus_admin_tab_confirm(target) {
    for (var i = 0; i < arrTabs.length; i++) {
		var contents_id = 'tab_contents_' + arrTabs[i];
		if (document.getElementById(contents_id)) {
		    if (arrTabs[i] == target) {
				document.getElementById(contents_id).style.display='block';
		    } else {
				document.getElementById(contents_id).style.display='none';
		    }
		}
    }
	document.getElementById('disp_zeus_tab_selected').value = target;
}
// -->
</script>

<style type="text/css">
    .close {
      border-style: solid;
      border-width: 1px; 
      border-color: #000;
      background-color: #d0d0d0;
      margin:0;
      padding: 0.5em;
      white-space: nowrap;
    }
    .open {
      border-style: solid;
      border-width: 1px; 
      border-color: #000 #000 #fff #000;
      background-color: white;
      margin:0;
      padding: 0.5em;
      white-space: nowrap;
    }

    .tab_menu {height:26px;}
    .tab_selected  {
          float:left;
          display:block;
          background-color:#444757;
          width:136px;
          height:30px;
          margin-right:3px;
          text-align:center;
         }
    .tab_nonselect {
          float:left;
          display:block;
          background-color:#f5f5f5;
          width:136px;
          height:30px;
          margin-right:3px;
          text-align:center;
         }

    .tab_selected a         {
                   text-decoration:none;
                   display:block;
                   margin-top:5px;
                  }
    .tab_confirm_selected         {
                   text-decoration:underline;
                   display:block;
                   color:#ffffff;

                   float:left;
                   display:block;
                   background-color:#444757;
                   width:136px;
                   height:30px;
                   margin-top:5px;
                   text-align:center;
                  }
    .tab_confirm_selected span         {
                   text-decoration:none;
                   display:block;
                   margin-top:5px;
                  }
    .tab_selected a:link    {color:#ffffff;}
    .tab_selected a:visited {color:#ffffff;}
    .tab_selected a:hover   {color:#ffffff;}

    .tab_nonselect a         {
                    text-decoration:underline;
                    display:block;
                    margin-top:5px;
                   }
    .tab_nonselect a:link    {color:#000000;}
    .tab_nonselect a:visited {color:#000000;}
    .tab_nonselect a:hover   {color:#ff0000;}

    .tab_contents
        {
         clear:both;
         border-top:solid 10px #444757;
        }
    .tab_ul  {margin:0px;nowrap;}
</style>

<div class="tab_menu">
<ul class="tab_ul">

<!--{if $isFormCheck == true && $onloadSelectTab == 'ebank' && $checkError == false}-->
  <li id="tab_ebank"    class="tab_confirm_selected"><span><!--{$smarty.const.MDL_ZEUS_EBANK_MODULE_TITLE}--></span></li>
  <li></li>
<!--{elseif $isFormCheck == true && $onloadSelectTab == 'edy' && $checkError == false}-->
  <li id="tab_edy"    class="tab_confirm_selected"><span><!--{$smarty.const.MDL_ZEUS_EDY_MODULE_TITLE}--></span></li>
  <li></li>
<!--{elseif $isFormCheck == true && $onloadSelectTab == 'cvs' && $checkError == false}-->
  <li id="tab_cvs"    class="tab_confirm_selected"><span><!--{$smarty.const.MDL_ZEUS_CVS_MODULE_TITLE}--></span></li>
  <li></li>
<!--{elseif $isFormCheck == true && $onloadSelectTab == 'credit' && $checkError == false}-->
  <li id="tab_credit" class="tab_confirm_selected"><span><!--{$smarty.const.MDL_ZEUS_MODULE_TITLE}--></span></li>
  <li></li>
<!--{else}-->
  <li id="tab_credit" class="tab_selected"><a href="javascript:select_zeus_admin_tab('credit')" ><!--{$smarty.const.MDL_ZEUS_MODULE_TITLE}--></a></li>
  <li id="tab_cvs"    class="tab_nonselect"><a href="javascript:select_zeus_admin_tab('cvs')" ><!--{$smarty.const.MDL_ZEUS_CVS_MODULE_TITLE}--></a></li>
  <li id="tab_edy"    class="tab_nonselect"><a href="javascript:select_zeus_admin_tab('edy')" ><!--{$smarty.const.MDL_ZEUS_EDY_MODULE_TITLE}--></a></li>
  <li id="tab_ebank"    class="tab_nonselect"><a href="javascript:select_zeus_admin_tab('ebank')" ><!--{$smarty.const.MDL_ZEUS_EBANK_MODULE_TITLE}--></a></li>
<!--{/if}-->

</ul>
</div>
<form name="zeus_form" id="zeus_form" method="post" action="<!--{$smarty.server.REQUEST_URI|escape}-->">
<input type="hidden" name="mode" value="edit">
<div id="tab_contents_credit" class="tab_contents">
    <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
    <!--{assign var=key value="quick_charge_flg"}-->
    <input type="hidden" name="<!--{$key}-->"  value="1" >
    <p class="remark"><br/>
    ゼウスクレジット決済モジュールをご利用頂く為には、ユーザ様ご自身で
    株式会社ゼウスとご契約を行っていただく必要があります。 <br/>
    お申し込みにつきましては、下記のページからお申し込みを行って下さい。<br/><br/>
    <a href='http://www.cardservice.co.jp/'  target='_blank'> 株式会社ゼウス</a>

    <!--{assign var=key value="clientip"}-->
    <!--{if $isZeusCheck != true && $arrErr[$key] != ''}-->
        <div>
        <div class="attention"><!--{$arrErr[$key]}--></div>
        詳しくは<span style="color:#0000ff; text-decoration:underline;">sales@cardservice.co.jp</span>
        もしくは03-3498-9030までご連絡下さい。<br/>
        <br/>
        </div>
    <!--{/if}-->

    </p>
    <table class="form">
      <colgroup width="20%"></colgroup>
      <colgroup width="40%"></colgroup>
      <tr>
        <th>加盟店IPコード<br /></th>
        <td>
          <!--{assign var=key value="clientip"}-->
          <!--{if $isZeusCheck == true  && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value}-->" >
            <!--{$arrForm[$key].value}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="ime-mode:disabled;<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value}-->" maxlength="<!--{$arrForm[$key].length}-->" size="13" >
          <!--{/if}-->
        </td>
      </tr>
      <tr>
        <th>加盟店認証コード</th>
        <td>
          <!--{assign var=key value="clientauthkey"}-->
          <div class="attention"><!--{$arrErr[$key]}--></div>
          <!--{if $isZeusCheck == true  && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value}-->" >
            <!--{$arrForm[$key].value}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="ime-mode:disabled;<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value}-->" maxlength="<!--{$arrForm[$key].length}-->" size="50" >
          <!--{/if}-->
        </td>
      </tr>
      <tr>
        <th>ご利用代金の請求名</th>
        <td>
          <!--{$getDetails}-->
        </td>
      </tr>
      <!--{if $isUse3dSecureCheckSystem == '1' &&  $isZeusCheck == true}-->
        <tr>
          <th>3Dセキュア<br><a href="http://www.cardservice.co.jp/service/3d/index.html" target="_blank">->3Dセキュアとは</a></th>
          <!--{assign var=key value="secure3d"}-->
          <input type="hidden" name="<!--{$key}-->" value="3" >
          <td>利用する
          </td>
        </tr>
      <!--{elseif  $isZeusCheck == true && $creditRegist}-->
        <tr>
          <th>3Dセキュア<br><a href="http://www.cardservice.co.jp/service/3d/index.html" target="_blank">->3Dセキュアとは</a></th>
          <!--{assign var=key value="secure3d"}-->
          <input type="hidden" name="<!--{$key}-->" value="1" >
          <td>利用しない　※ご利用希望の際は営業担当までお問い合わせください
          </td>
        </tr>
      <!--{else}-->
        <!--{assign var=err1 value="clientauthkey"}-->
        <!--{assign var=err2 value="clientip"}-->
        <!--{if $arrErr[$err1] ||  $arrErr[$err2] || ($payDbSecure3d == '' && $payDbResisted == false) || $paymentDataFlag === null }-->
          <tr>
            <th>3Dセキュア<br><a href="http://www.cardservice.co.jp/service/3d/index.html" target="_blank">->3Dセキュアとは</a></th>
            <td>-
            </td>
          </tr>
        <!--{elseif $payDbSecure3d == 'secure_3d_on'}-->
          <tr>
            <th>3Dセキュア<br><a href="http://www.cardservice.co.jp/service/3d/index.html" target="_blank">->3Dセキュアとは</a></th>
            <td>利用する
            </td>
          </tr>
        <!--{else}-->
          <tr>
            <th>3Dセキュア<br><a href="http://www.cardservice.co.jp/service/3d/index.html" target="_blank">->3Dセキュアとは</a></th>
            <td>利用しない　※ご利用希望の際は営業担当までお問い合わせください
            </td>
          </tr>
        <!--{/if}-->
      <!--{/if}-->
      <!--{assign var=key value="clientip"}-->
      <!--{if ($cvvUseFlagZeusGetData === true || ( $cvvUseFlagZeusGetData === null && $cvvUseFlag === true && $arrForm[$key].value != '' )) && !$arrErr[$err1] && !$arrErr[$err2]}-->
          <tr>
            <th><!--{$arrErr[$err1]}-->クレジットカード・セキュリティコード<br><a href="http://www.cardservice.co.jp/info/csc/index.html" target="_blank">->セキュリティコードとは</a></th>
            <td>利用する

            </td>
          </tr>
      <!--{elseif ( $cvvUseFlagZeusGetData === null && $cvvUseFlag === null ) || $arrErr[$err1] || $arrErr[$err2] || (!$creditRegist && $cvvUseFlag)}-->
          <tr>
            <th>クレジットカード・セキュリティコード<br><a href="http://www.cardservice.co.jp/info/csc/index.html" target="_blank">->セキュリティコードとは</a></th>
            <td>-
            </td>
          </tr>
      <!--{else}-->
          <tr>
            <th>クレジットカード・セキュリティコード<br><a href="http://www.cardservice.co.jp/info/csc/index.html" target="_blank">->セキュリティコードとは</a></th>
            <td>利用しない　※ご利用希望の際は営業担当までお問い合わせください
            </td>
          </tr>
      <!--{/if}-->

    </table>
    <div class="btn-area">
      <ul>
        <!--{if $isZeusCheck == true && $checkError == false}-->
          <li><a class="btn-action" href="javascript:;" onclick="fnFormModeSubmit('zeus_form', 'edit', '', ''); return false;"><span class="btn-next">登録</span></a></li>&nbsp;&nbsp;&nbsp;
          <li><a class="btn-action" href="javascript:;" onclick="fnFormModeSubmit('zeus_form', '', '', ''); return false;"><span class="btn-next">戻る</span></a></li>
        <!--{else}-->
          <li><a class="btn-action" href="javascript:;" onclick="fnFormModeSubmit('zeus_form', 'zeus_data_get', '', ''); return false;"><span class="btn-next">確認</span></a></li>&nbsp;&nbsp;&nbsp;
          <li><a class="btn-action" href="javascript:;" onClick="window.close(); return false;"><span class="btn-next">閉じる</span></a></li>
        <!--{/if}-->
      </ul>
    </div>
</div>

<div id="tab_contents_cvs" class="tab_contents">
    <p class="remark"><br/>
    ゼウスコンビニ決済モジュールをご利用頂く為には、ユーザ様ご自身で
    株式会社ゼウスとご契約を行っていただく必要があります。 <br/>
    お申し込みにつきましては、下記のページからお申し込みを行って下さい。<br/><br/>
    <a href='http://www.cardservice.co.jp/'  target='_blank'> 株式会社ゼウス</a>

    <!--{assign var=key value="clientip_cvs"}-->
    <!--{if $arrErr[$key] != '' }-->
        <div>
        <div class="attention"><!--{$arrErr[$key]}--></div>
        詳しくは<span style="color:#0000ff; text-decoration:underline;">sales@cardservice.co.jp</span>
        もしくは03-3498-9030までご連絡下さい。<br/>
        <br/>
        </div>
    <!--{/if}-->

    </p>
    <table class="form">
      <colgroup width="40%"></colgroup>
      <colgroup width="60%"></colgroup>
      <tr>
        <th>加盟店IPコード<br /></th>
        <td>
          <!--{assign var=key value="clientip_cvs"}-->
          <!--{if $isFormCheck == true && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
            <!--{$arrForm[$key].value|escape}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="ime-mode:disabled;<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" size="13" >
          <!--{/if}-->
        </td>
      </tr>
      <tr>
        <th>完了ページ戻りURL<br />(PC/スマートフォン用)</th>
        <td>
          <!--{assign var=key value="siteurl"}-->
          <div class="attention"><!--{$arrErr[$key]}--></div>
          <!--{if $isFormCheck == true && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
            <!--{$arrForm[$key].value|escape}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="ime-mode:disabled;<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" size="60" >
          <!--{/if}-->
        </td>
      </tr>
      <tr>
        <th style='padding-right: 4px;'>完了ページ戻りURL文言<br />(PC/スマートフォン用)</th>
        <td>
          <!--{assign var=key value="sitestr"}-->
          <div class="attention"><!--{$arrErr[$key]}--></div>
          <!--{if $isFormCheck == true && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
            <!--{$arrForm[$key].value|escape}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" size="60" >
          <!--{/if}-->
        </td>
      </tr>
    </table>
    <div class="btn-area">
      <ul>
        <!--{if $isFormCheck == true && $checkError == false}-->
          <li><a class="btn-action" href="javascript:;" onclick="fnSetFormSubmit('zeus_form', 'mode', 'edit'); return false;"><span class="btn-next">登録</span></a></li>&nbsp;&nbsp;&nbsp;
          <li><a class="btn-action" href="javascript:;" onclick="fnSetFormSubmit('zeus_form', 'mode', ''); return false;"><span class="btn-next">戻る</span></a></li>
        <!--{else}-->
          <li><a class="btn-action" href="javascript:;" onclick="fnSetFormSubmit('zeus_form', 'mode', 'confirm'); return false;"><span class="btn-next">確認</span></a></li>&nbsp;&nbsp;&nbsp;
          <li><a class="btn-action" href="javascript:;" onClick="window.close(); return false;"><span class="btn-next">閉じる</span></a></li>
        <!--{/if}-->
      </ul>
    </div>
</div>

<div id="tab_contents_edy" class="tab_contents">
    <p class="remark"><br/>
    ゼウス楽天Edy決済モジュールをご利用頂く為には、ユーザ様ご自身で
    株式会社ゼウスとご契約を行っていただく必要があります。 <br/>
    お申し込みにつきましては、下記のページからお申し込みを行って下さい。<br/><br/>
    <a href='http://www.cardservice.co.jp/'  target='_blank'> 株式会社ゼウス</a>

    <!--{assign var=key value="clientip_edy"}-->
    <!--{if $arrErr[$key] != '' }-->
        <div>
        <div class="attention"><!--{$arrErr[$key]}--></div>
        詳しくは<span style="color:#0000ff; text-decoration:underline;">sales@cardservice.co.jp</span>
        もしくは03-3498-9030までご連絡下さい。<br/>
        <br/>
        </div>
    <!--{/if}-->

    </p>
    <table class="form">
      <colgroup width="40%"></colgroup>
      <colgroup width="60%"></colgroup>
      <tr>
        <th>加盟店IPコード<br /></th>
        <td>
          <!--{assign var=key value="clientip_edy"}-->
          <!--{if $isFormCheck == true && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
            <!--{$arrForm[$key].value|escape}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="ime-mode:disabled;<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" size="13" >
          <!--{/if}-->
        </td>
      </tr>
      <tr>
        <th>完了ページ戻りURL<br />(PC/スマートフォン用)</th>
        <td>
          <!--{assign var=key value="success_url"}-->
          <div class="attention"><!--{$arrErr[$key]}--></div>
          <!--{if $isFormCheck == true && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
            <!--{$arrForm[$key].value|escape}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="ime-mode:disabled;<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" size="60" >
          <!--{/if}-->
        </td>
      </tr>
      <tr>
        <th style='padding-right: 4px;'>完了ページ戻りURL文言<br />(PC/スマートフォン用)</th>
        <td>
          <!--{assign var=key value="success_str"}-->
          <div class="attention"><!--{$arrErr[$key]}--></div>
          <!--{if $isFormCheck == true && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
            <!--{$arrForm[$key].value|escape}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" size="60" >
          <!--{/if}-->
        </td>
      </tr>
      <tr>
        <th>失敗ページ戻りURL<br />(PC/スマートフォン用)</th>
        <td>
          <!--{assign var=key value="failure_url"}-->
          <div class="attention"><!--{$arrErr[$key]}--></div>
          <!--{if $isFormCheck == true && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
            <!--{$arrForm[$key].value|escape}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="ime-mode:disabled;<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" size="60" >
          <!--{/if}-->
        </td>
      </tr>
      <tr>
        <th style='padding-right: 4px;'>失敗ページ戻りURL文言<br />(PC/スマートフォン用)</th>
        <td>
          <!--{assign var=key value="failure_str"}-->
          <div class="attention"><!--{$arrErr[$key]}--></div>
          <!--{if $isFormCheck == true && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
            <!--{$arrForm[$key].value|escape}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" size="60" >
          <!--{/if}-->
        </td>
      </tr>
    </table>
    <div class="btn-area">
      <ul>
        <!--{if $isFormCheck == true && $checkError == false}-->
          <li><a class="btn-action" href="javascript:;" onclick="fnSetFormSubmit('zeus_form', 'mode', 'edit'); return false;"><span class="btn-next">登録</span></a></li>&nbsp;&nbsp;&nbsp;
          <li><a class="btn-action" href="javascript:;" onclick="fnSetFormSubmit('zeus_form', 'mode', ''); return false;"><span class="btn-next">戻る</span></a></li>
        <!--{else}-->
          <li><a class="btn-action" href="javascript:;" onclick="fnSetFormSubmit('zeus_form', 'mode', 'confirm'); return false;"><span class="btn-next">確認</span></a></li>&nbsp;&nbsp;&nbsp;
          <li><a class="btn-action" href="javascript:;" onClick="window.close(); return false;"><span class="btn-next">閉じる</span></a></li>
        <!--{/if}-->
      </ul>
    </div>
</div>

<div id="tab_contents_ebank" class="tab_contents">
    <p class="remark"><br/>
    ゼウス入金おまかせ（銀行振込）決済モジュールをご利用頂く為には、ユーザ様ご自身で
    株式会社ゼウスとご契約を行っていただく必要があります。 <br/>
    お申し込みにつきましては、下記のページからお申し込みを行って下さい。<br/><br/>
    <a href='http://www.cardservice.co.jp/'  target='_blank'> 株式会社ゼウス</a>

    <!--{assign var=key value="clientip_ebank"}-->
    <!--{if $arrErr[$key] != '' }-->
        <div>
        <div class="attention"><!--{$arrErr[$key]}--></div>
        詳しくは<span style="color:#0000ff; text-decoration:underline;">sales@cardservice.co.jp</span>
        もしくは03-3498-9030までご連絡下さい。<br/>
        <br/>
        </div>
    <!--{/if}-->

    </p>
    <table class="form">
      <colgroup width="40%"></colgroup>
      <colgroup width="60%"></colgroup>
      <tr>
        <th>加盟店IPコード<br /></th>
        <td>
          <!--{assign var=key value="clientip_ebank"}-->
          <!--{if $isFormCheck == true && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
            <!--{$arrForm[$key].value|escape}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="ime-mode:disabled;<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" size="13" >
          <!--{/if}-->
        </td>
      </tr>
      <tr>
        <th>完了ページ戻りURL<br />(PC/スマートフォン用)</th>
        <td>
          <!--{assign var=key value="ebank_siteurl"}-->
          <div class="attention"><!--{$arrErr[$key]}--></div>
          <!--{if $isFormCheck == true && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
            <!--{$arrForm[$key].value|escape}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="ime-mode:disabled;<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" size="60" >
          <!--{/if}-->
        </td>
      </tr>
      <tr>
        <th style='padding-right: 4px;'>完了ページ戻りURL文言<br />(PC/スマートフォン用)</th>
        <td>
          <!--{assign var=key value="ebank_sitestr"}-->
          <div class="attention"><!--{$arrErr[$key]}--></div>
          <!--{if $isFormCheck == true && $checkError == false}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" >
            <!--{$arrForm[$key].value|escape}-->
          <!--{else}-->
            <input type="text" name="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" size="60" >
          <!--{/if}-->
        </td>
      </tr>
    </table>
    <div class="btn-area">
      <ul>
        <!--{if $isFormCheck == true && $checkError == false}-->
          <li><a class="btn-action" href="javascript:;" onclick="fnSetFormSubmit('zeus_form', 'mode', 'edit'); return false;"><span class="btn-next">登録</span></a></li>&nbsp;&nbsp;&nbsp;
          <li><a class="btn-action" href="javascript:;" onclick="fnSetFormSubmit('zeus_form', 'mode', ''); return false;"><span class="btn-next">戻る</span></a></li>
        <!--{else}-->
          <li><a class="btn-action" href="javascript:;" onclick="fnSetFormSubmit('zeus_form', 'mode', 'confirm'); return false;"><span class="btn-next">確認</span></a></li>&nbsp;&nbsp;&nbsp;
          <li><a class="btn-action" href="javascript:;" onClick="window.close(); return false;"><span class="btn-next">閉じる</span></a></li>
        <!--{/if}-->
      </ul>
    </div>
</div>


<input type="hidden" id="disp_zeus_tab_selected" name="disp_zeus_tab_selected" value="" >
</form>


<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_footer.tpl"}-->