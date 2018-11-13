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

<script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/jquery.media.js"></script>
<script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/jquery.metadata.js"></script>
<script type="text/javascript">
    $(function() {
        $('a.media').media({width:780, height:550});
    });
</script>
<div class="catalog_viewer">
    <img src="<!--{$TPL_URLPATH}-->img/banner/catalog/catalog_banner.jpg" />
    <a class="media" href="<!--{$TPL_URLPATH}-->pdf/catalog/pact_catalog.pdf" alt="" /><span style="font-size: 6px;"></a>
    <div class="catalog_comment">
       <br />■カタログ掲載商品のご注文について<br />
       当ウェブサイトに掲載されている商品情報以外ででカタログに気になる商品がございましたら<br />
       品番・サイズ・カラーをご入力の上<a href="/contact">お問い合わせフォーム</a>よりお問い合わせ下さい。  
    </div>
</div>