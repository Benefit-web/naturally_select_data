<!--{*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2013 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *}-->

<div id="undercolumn">
    <div id="undercolumn_shopping">
        <p class="block_name_list"><!--{$tpl_title|h}--><span>Order Complete</span></p>
        <p class="flow_area">
            <img src="<!--{$TPL_URLPATH}-->img/common/order_flow_7.jpg" alt="購入手続き完了" />
        </p>
        <!-- ▼その他決済情報を表示する場合は表示 -->
        <!--{if $arrOther.title.value}-->
            <p><span class="attention">■<!--{$arrOther.title.name}-->情報</span><br />
                <!--{foreach key=key item=item from=$arrOther}-->
                    <!--{if $key != "title"}-->
                        <!--{if $item.name != ""}-->
                            <!--{$item.name}-->：
                        <!--{/if}-->
                            <!--{$item.value|nl2br}--><br />
                    <!--{/if}-->
                <!--{/foreach}-->
            </p>
        <!--{/if}-->
        <!-- ▲コンビに決済の場合には表示 -->
        <div id="complete_area">
            <!--{if $orderInfo.payment_id|h == 5}-->
            <p class="message">
                <!--{$arrInfo.shop_name|h}-->の商品のご注文誠にありがとうございます。</br>
                ただいま、ご注文の確認メールをお送りさせていただきました。
            </p>
            <p>お手数をおかけして大変申し訳ございませんが、下記<span style="color:red">「クレジットカード支払手続きへ」ボタン</span>にてお支払いの手続きを行って下さい。<br />
                万一、ご確認メールが届かない場合は、トラブルの可能性もありますので大変お手数ではございますがもう一度お問い合わせいただくか、お電話にてお問い合わせくださいませ。<br />
                今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>
            <!------------クロネコｗｅｂコレクトへのリンク（テスト環境接続用）------------->
            <FORM NAME="UserForm" ACTION="https://ptwebcollect.jp/test_gateway/settleSelectAction.gw" METHOD="post" target="_blank" accept-charset="Shift_JIS">
                <INPUT TYPE="hidden" NAME="TRS_MAP" VALUE="V_W02">
                <INPUT TYPE="hidden" NAME="trader_code" VALUE="633307101">
                <INPUT TYPE="hidden" NAME="order_no" VALUE="<!--{$arrKuroneko.order_id}-->">
                <INPUT TYPE="hidden" NAME="goods_name" VALUE="<!--{$arrKuronekoDetail.itemNames}-->">
                <INPUT TYPE="hidden" NAME="settle_price" VALUE="<!--{$arrKuronekoDetail.totalAmount}-->">
                <INPUT TYPE="hidden" NAME="buyer_name_kanji" VALUE="<!--{$arrKuroneko.order_name01}--><!--{$arrKuroneko.order_name02}-->">
                <INPUT TYPE="hidden" NAME="buyer_name_kana" VALUE="<!--{$arrKuroneko.order_kana01}--><!--{$arrKuroneko.order_kana02}-->">
                <INPUT TYPE="hidden" NAME="buyer_tel" VALUE="<!--{$arrKuroneko.order_tel01}-->-<!--{$arrKuroneko.order_tel02}-->-<!--{$arrKuroneko.order_tel03}-->">
                <INPUT TYPE="hidden" NAME="buyer_email" VALUE="<!--{$arrKuroneko.order_email}-->">
                <INPUT TYPE="hidden" NAME="return_url" VALUE="https://www.xxxxx.jp/shop/xxxxx?shopid=2">
                <div class="credit_btn_area">
                   <INPUT TYPE="submit" VALUE="" id="credit_payment_btn">
                   <p>
                       クレジットカードでのお支払いは
                       <a style="color: #D00C1A; font-weight: bold;" href="http://www.yamatofinancial.jp/logobr/pay_popup_cc.html" target="_blank" onclick="window.open(this.href, 'mywindow6', 'width=434, height=440, menubar=yes, toolbar=no, location=no, scrollbars=yes, resizable=yes'); return false;">
                       クロネコwebコレクト</a>でお手続きを行って下さい。
                   </p>
                </div>
            </FORM>
            <!--{else}-->
            <p class="message"><!--{$arrInfo.shop_name|h}-->の商品をご購入いただき、ありがとうございました。</p>
            <p>ただいま、ご注文の確認メールをお送りさせていただきました。<br />
                万一、ご確認メールが届かない場合は、トラブルの可能性もありますので大変お手数ではございますがもう一度お問い合わせいただくか、お電話にてお問い合わせくださいませ。<br />
                今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>
            <!--{/if}-->
            <div class="shop_information">
                <p class="name"><!--{$arrInfo.shop_name|h}--></p>
                <p>TEL：<!--{$arrInfo.tel01}-->-<!--{$arrInfo.tel02}-->-<!--{$arrInfo.tel03}--> <!--{if $arrInfo.business_hour != ""}-->（受付時間/<!--{$arrInfo.business_hour}-->）<!--{/if}--><br />
                E-mail：<a href="mailto:<!--{$arrInfo.email02|escape:'hex'}-->"><!--{$arrInfo.email02|escape:'hexentity'}--></a>
                </p>
            </div>
        </div>

        <div class="btn_area">
            <ul>
                <li>
                    <a href="<!--{$smarty.const.TOP_URLPATH}-->" onmouseover="chgImg('<!--{$TPL_URLPATH}-->img/button/btn_toppage_on.jpg','b_toppage');" onmouseout="chgImg('<!--{$TPL_URLPATH}-->img/button/btn_toppage.jpg','b_toppage');">
                        <img src="<!--{$TPL_URLPATH}-->img/button/btn_toppage.jpg" alt="トップページへ" border="0" name="b_toppage" /></a>
                </li>
            </ul>
        </div>

    </div>
</div>
