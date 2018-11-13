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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.    See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA    02111-1307, USA.
 *}-->

<!--▼HEADER-->
<script>
/*
$(document).ready(function(){
  $(window).mousemove( function(e) {
    var setCookie = "";
    currentCursorPosition = {
      cx:e.clientX,
      cy:e.clientY,
      sx:e.screenX,
      sy:e.screenY,
      px:e.pageX,
      py:e.pageY
    };

    $.each(currentCursorPosition, function(key, val) {
        setCookie = key + "=" + val + ";";
        document.cookie = setCookie;
    });
  });

  setInterval(function(){
      $('.bxslider').cursorPositioner();
    },3000);
  });
*/
</script>
<div id="header_wrap">
    <div class="header_title">海外ブランド子供服|雑貨[ペーパーウォレット]の通販サイト</div>
    <div class="clear"></div>
    <div id="header" class="clearfix">
        <div id="logo_area">
            <p id="site_description"></p>
            <h1>
                <a href="<!--{$smarty.const.TOP_URLPATH}-->"><img src="<!--{$TPL_URLPATH}-->img/common/logo.gif" width="280px" heght="40px" alt="EC-CUBE ONLINE SHOPPING SITE" /><span><!--{$arrSiteInfo.shop_name|h}-->/<!--{$tpl_title|h}--></span></a>
            </h1>
            <div class="header_search">
                <!--検索フォーム-->
                <form name="search_form" id="search_form" method="get" action="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php">
                <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
                    <input type="text" name="name" class="with_glass" id="keyword_search" maxlength="80" value="検索キーワードを入力" />
                    <span class="search_btn">
                        <!--<input type="submit" value="検索" />-->
                        <input type="submit" id="keyword_search_btn" value="" />
                    </span>
                </form>
            </div>
        </div>
        <div id="header_navi">
            <div class="header_guide">
                <ul>
                    <li><a href="abouts">当サイトについて</a></li>
                    <li><a href="contact">お問い合わせ</a></li>
                </ul>
            </div>
            <div class="header_shipping">
                <span>配送料全国一律(メール便発送):</span><span style="font-size: 20px; font-weight: bold;">500円(税込)</span>
            </div>
            <!--{if $smarty.const.DISPLAY_IN_CART == true}-->
            <ul class = "header_navi_link">
                <li>
                    <a href="<!--{$smarty.const.HTTPS_URL}-->mypage/login.php">マイページ</a>
                </li>
                <li>
                    <a href="<!--{$smarty.const.ROOT_URLPATH}-->entry/kiyaku.php">会員登録</a>
                </li>
                <li>
                    <a href="<!--{$smarty.const.CART_URLPATH}-->">カートを見る</a>
                </li>
            </ul>
            <!--{/if}-->
        <div id="header_utility">
            <div id="headerInternalColumn">
            <!--{* ▼HeaderInternal COLUMN*}-->
            <!--{if $arrPageLayout.HeaderInternalNavi|@count > 0}-->
                <!--{* ▼上ナビ *}-->
                <!--{foreach key=HeaderInternalNaviKey item=HeaderInternalNaviItem from=$arrPageLayout.HeaderInternalNavi}-->
                    <!-- ▼<!--{$HeaderInternalNaviItem.bloc_name}--> -->
                    <!--{if $HeaderInternalNaviItem.php_path != ""}-->
                        <!--{include_php file=$HeaderInternalNaviItem.php_path items=$HeaderInternalNaviItem}-->
                    <!--{else}-->
                        <!--{include file=$HeaderInternalNaviItem.tpl_path items=$HeaderInternalNaviItem}-->
                    <!--{/if}-->
                    <!-- ▲<!--{$HeaderInternalNaviItem.bloc_name}--> -->
                <!--{/foreach}-->
                <!--{* ▲上ナビ *}-->
            <!--{/if}-->
            <!--{* ▲HeaderInternal COLUMN*}-->
            </div>


        </div>
    </div>
</div>
<!--▲HEADER-->
