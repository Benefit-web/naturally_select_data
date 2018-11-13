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

<script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/products.js"></script>
<script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/slides.jquery.js"></script>
<script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/jquery.facebox/facebox.js"></script>
<link rel="stylesheet" href="<!--{$TPL_URLPATH}-->css/slides.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="<!--{$smarty.const.ROOT_URLPATH}-->js/jquery.facebox/facebox.css" media="screen" />

<script type="text/javascript">//<![CDATA[
    // 規格2に選択肢を割り当てる。
    function fnSetClassCategories(form, classcat_id2_selected) {
        var $form = $(form);
        var product_id = $form.find('input[name=product_id]').val();
        var $sele1 = $form.find('select[name=classcategory_id1]');
        var $sele2 = $form.find('select[name=classcategory_id2]');
        setClassCategories($form, product_id, $sele1, $sele2, classcat_id2_selected);
    }
    $(function(){
            $('#products').slides({
                    preload: true,
                    preloadImage: '<!--{$TPL_URLPATH}-->img/common/loading.gif',
                    effect: 'slide, fade',
                    crossfade: true,
                    slideSpeed: 350,
                    fadeSpeed: 500,
                    generateNextPrev: false,
                    generatePagination: false
            });
    });
    /*
    $(document).ready(function() {
        $('a.expansion').facebox({
            loadingImage : '<!--{$smarty.const.ROOT_URLPATH}-->js/jquery.facebox/loading.gif',
            closeImage   : '<!--{$smarty.const.ROOT_URLPATH}-->js/jquery.facebox/closelabel.png'
        });
    });
    */
//]]></script>
<!--
<div style="margin: 10px 0 10px 0;">
    <img src="<!--{$TPL_URLPATH}-->img/banner/bnr_top_main/sale_band.jpg" alt="セールバナー" width="770px"/>
</div>
-->
<!--
<!--{$arrFile|@var_dump}-->
<!--{$smarty.const.PRODUCTSUB_MAX|@var_dump}-->
-->
<div id="undercolumn" style="margin-top:10px;">
    <form name="form1" id="form1" method="post" action="?">
    <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
    <div id="detailarea" class="clearfix">
        <div id="detailphotobloc">
            <div class="photo">
                <!--{assign var=key value="main_image"}-->

                <!--{if $arrProduct.main_large_image|strlen >= 1}-->
                    <div id="products">
                    <div class="slides_container">
                    <a href="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct.main_large_image|h}-->" class="expansion" target="_blank" >
                        <!--<img src="<!--{$arrFile[$key].filepath|h}-->" width="<!--{$arrFile[$key].width}-->" height="<!--{$arrFile[$key].height}-->" alt="<!--{$arrProduct.name|h}-->_1" class="picture" />-->
                        <img src="<!--{$arrFile[$key].filepath|h}-->" width="300" alt="<!--{$arrProduct.name|h}-->_1" class="picture" />
                    </a>
                    <!--{section name=cnt loop=10}-->
                    <!--{assign var=ikey value="sub_image`$smarty.section.cnt.index+1`"}-->
                    <!--{assign var=lkey value="sub_large_image`$smarty.section.cnt.index+1`"}-->
                        <a href="<!--{$arrFile[$ikey].filepath}-->" class="expansion" target="_blank" >
                            <img src="<!--{$arrFile[$ikey].filepath}-->" alt="" width="300" />
                        </a>
                    <!--{/section}-->
                    </div>
                    <ul class="pagination">
                        <li><a href="#"><img src="<!--{$arrFile[$key].filepath|h}-->" width="100%" alt="<!--{$arrProduct.name|h}-->_1"/></a></li>
                        <!--{section name=cnt loop=10}-->
                        <!--{assign var=ikey value="sub_image`$smarty.section.cnt.index+1`"}-->
                        <!--{assign var=lkey value="sub_large_image`$smarty.section.cnt.index+1`"}-->
                            <li><a href="#"><img src="<!--{$arrFile[$ikey].filepath}-->" alt="" width="100%" /></a></li>
                        <!--{/section}-->
                    </ul>
                    </div>
                <!--{/if}-->
            </div>            
        </div>

        <div id="detailrightbloc">
            <!--▼商品ステータス-->
            <div class="detail_brand_banner">
                <img src="<!--{$TPL_URLPATH}-->img/brand/<!--{$arrProduct.maker_id|h}-->.gif" alt="<!--{$arrProduct.maker_name|h}-->"/>
            </div>
            <!--{assign var=ps value=$productStatus[$tpl_product_id]}-->
            <!--{if count($ps) > 0}-->
                <ul class="status_icon clearfix">
                    <!--{foreach from=$ps item=status}-->
                    <li>
                        <img src="<!--{$TPL_URLPATH}--><!--{$arrSTATUS_IMAGE[$status]}-->" height="35" alt="<!--{$arrSTATUS[$status]}-->" id="icon<!--{$status}-->" />
                    </li>
                    <!--{/foreach}-->
                </ul>
            <!--{/if}-->
            <!--▲商品ステータス-->

            <!--★商品コード★-->
            <dl class="product_code">
                <dt>商品コード：</dt>
                <dd>
                    <span id="product_code_default">
                        <!--{if $arrProduct.product_code_min == $arrProduct.product_code_max}-->
                            <!--{$arrProduct.product_code_min|h}-->
                        <!--{else}-->
                            <!--{$arrProduct.product_code_min|h}-->～<!--{$arrProduct.product_code_max|h}-->
                        <!--{/if}-->
                    </span><span id="product_code_dynamic"></span>
                </dd>
            </dl>

            <!--★商品名★-->
            <h2><!--{$arrProduct.name|h}--></h2>

            <!--★通常価格★-->
            <!--{if $arrProduct.price01_min_inctax > 0}-->
                <dl class="normal_price">
                    <dt><!--{$smarty.const.NORMAL_PRICE_TITLE}-->(税込)：</dt>
                    <dd class="price">
                        <span id="price01_default"><!--{strip}-->
                            <!--{if $arrProduct.price01_min_inctax == $arrProduct.price01_max_inctax}-->
                                <!--{$arrProduct.price01_min_inctax|number_format}-->
                            <!--{else}-->
                                <!--{$arrProduct.price01_min_inctax|number_format}-->～<!--{$arrProduct.price01_max_inctax|number_format}-->
                            <!--{/if}-->
                        </span><span id="price01_dynamic"></span><!--{/strip}-->
                        円
                    </dd>
                </dl>
            <!--{/if}-->

            <!--★販売価格★-->
            <dl class="sale_price">
                <dt><!--{$smarty.const.SALE_PRICE_TITLE}-->(税込)：</dt>
                <dd class="price">
                    <span id="price02_default"><!--{strip}-->
                        <!--{if $arrProduct.price02_min_inctax == $arrProduct.price02_max_inctax}-->
                            <!--{$arrProduct.price02_min_inctax|number_format}-->
                        <!--{else}-->
                            <!--{$arrProduct.price02_min_inctax|number_format}-->～<!--{$arrProduct.price02_max_inctax|number_format}-->
                        <!--{/if}-->
                    </span><span id="price02_dynamic"></span><!--{/strip}-->
                    円
                </dd>
            </dl>

            <!--★ポイント★-->
            <!--{if $smarty.const.USE_POINT !== false}-->
                <div class="point">ポイント：
                    <span id="point_default"><!--{strip}-->
                        <!--{if $arrProduct.price02_min == $arrProduct.price02_max}-->
                            <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate|number_format}-->
                        <!--{else}-->
                            <!--{if $arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate == $arrProduct.price02_max|sfPrePoint:$arrProduct.point_rate}-->
                                <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate|number_format}-->
                            <!--{else}-->
                                <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate|number_format}-->～<!--{$arrProduct.price02_max|sfPrePoint:$arrProduct.point_rate|number_format}-->
                            <!--{/if}-->
                        <!--{/if}-->
                    </span><span id="point_dynamic"></span><!--{/strip}-->
                    Pt
                </div>
            <!--{/if}-->

            <!--{* ▼メーカー *}-->
            <!--{if $arrProduct.maker_name|strlen >= 1}-->
                <dl class="maker">
                    <dt>メーカー：</dt>
                    <dd><!--{$arrProduct.maker_name|h}--></dd>
                </dl>
            <!--{/if}-->
            <!--{* ▲メーカー *}-->

            <!--▼メーカーURL-->
            <!--{if $arrProduct.comment1|strlen >= 1}-->
                <dl class="comment1">
                    <dt>メーカーURL：</dt>
                    <dd><a href="<!--{$arrProduct.comment1|h}-->"><!--{$arrProduct.comment1|h}--></a></dd>
                </dl>
            <!--{/if}-->
            <!--▼メーカーURL-->

            <!--★関連カテゴリ★-->
            <dl class="relative_cat">
                <dt>関連カテゴリ：</dt>
                <!--{section name=r loop=$arrRelativeCat}-->
                    <dd>
                        <!--{section name=s loop=$arrRelativeCat[r]}-->
                            <a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$arrRelativeCat[r][s].category_id}-->"><!--{$arrRelativeCat[r][s].category_name}--></a>
                            <!--{if !$smarty.section.s.last}--><!--{$smarty.const.SEPA_CATNAVI}--><!--{/if}-->
                        <!--{/section}-->
                    </dd>
                <!--{/section}-->
            </dl>

            <!--★詳細メインコメント★-->
            <div class="main_comment"><!--{$arrProduct.main_comment|nl2br_html}--></div>
            <!--▼買い物かご-->
            <!--{if $smarty.const.DISPLAY_IN_CART == true}-->
            <div class="cart_area clearfix">
            <input type="hidden" name="mode" value="cart" />
            <input type="hidden" name="product_id" value="<!--{$tpl_product_id}-->" />
            <input type="hidden" name="product_class_id" value="<!--{$tpl_product_class_id}-->" id="product_class_id" />
            <input type="hidden" name="favorite_product_id" value="" />

            <!--{if $tpl_stock_find}-->
                <!--{if $tpl_classcat_find1}-->
                    <div class="classlist">
                        <!--▼規格1-->
                        <ul class="clearfix">
                            <li><!--{$tpl_class_name1|h}-->：</li>
                            <li>
                                <select name="classcategory_id1" style="<!--{$arrErr.classcategory_id1|sfGetErrorColor}-->">
                                <!--{html_options options=$arrClassCat1 selected=$arrForm.classcategory_id1.value}-->
                                </select>
                                <!--{if $arrErr.classcategory_id1 != ""}-->
                                <br /><span class="attention">※ <!--{$tpl_class_name1}-->を入力して下さい。</span>
                                <!--{/if}-->
                            </li>
                        </ul>
                        <!--▲規格1-->
                        <!--{if $tpl_classcat_find2}-->
                        <!--▼規格2-->
                        <ul class="clearfix">
                            <li><!--{$tpl_class_name2|h}-->：</li>
                            <li>
                                <select name="classcategory_id2" style="<!--{$arrErr.classcategory_id2|sfGetErrorColor}-->">
                                </select>
                                <!--{if $arrErr.classcategory_id2 != ""}-->
                                <br /><span class="attention">※ <!--{$tpl_class_name2}-->を入力して下さい。</span>
                                <!--{/if}-->
                            </li>
                        </ul>
                        <!--▲規格2-->
                        <!--{/if}-->
                    </div>
                <!--{/if}-->

                <!--★数量★-->
                <ul class="quantity">
                    <li style="padding-top:10px;">数量：</li>
                    <li style="padding-top:10px;">
                        <input type="text" class="box60" name="quantity" value="<!--{$arrForm.quantity.value|default:1|h}-->" maxlength="<!--{$smarty.const.INT_LEN}-->" style="<!--{$arrErr.quantity|sfGetErrorColor}-->" />
                        <!--{if $arrErr.quantity != ""}-->
                            <br /><span class="attention"><!--{$arrErr.quantity}--></span>
                        <!--{/if}-->
                    </li>
                    <li style="padding:10px 0 0 20px;">
                        <!--★カゴに入れる★-->
                            <a href="javascript:void(document.form1.submit())" onmouseover="chgImg('<!--{$TPL_URLPATH}-->img/button/btn_cartin_on.jpg','cart');" onmouseout="chgImg('<!--{$TPL_URLPATH}-->img/button/btn_cartin.jpg','cart');">
                                <img src="<!--{$TPL_URLPATH}-->img/button/btn_cartin.jpg" alt="カゴに入れる" name="cart" id="cart" />
                            </a>
                    </li>
                </ul>   
                <div class="attention" id="cartbtn_dynamic"></div>
            <!--{else}-->
                <div class="attention">申し訳ございませんが、只今品切れ中です。</div>
            <!--{/if}-->

            <!--★お気に入り登録★-->
            <!--{if $smarty.const.OPTION_FAVORITE_PRODUCT == 1 && $tpl_login === true}-->
                <div class="favorite_btn">
                    <!--{assign var=add_favorite value="add_favorite`$product_id`"}-->
                    <!--{if $arrErr[$add_favorite]}-->
                        <div class="attention"><!--{$arrErr[$add_favorite]}--></div>
                    <!--{/if}-->
                    <!--{if !$is_favorite}-->
                        <a href="javascript:fnChangeAction('?product_id=<!--{$arrProduct.product_id|h}-->'); fnModeSubmit('add_favorite','favorite_product_id','<!--{$arrProduct.product_id|h}-->');" onmouseover="chgImg('<!--{$TPL_URLPATH}-->img/button/btn_add_favorite_on.jpg','add_favorite_product');" onmouseout="chgImg('<!--{$TPL_URLPATH}-->img/button/btn_add_favorite.jpg','add_favorite_product');"><img src="<!--{$TPL_URLPATH}-->img/button/btn_add_favorite.jpg" alt="お気に入りに追加" name="add_favorite_product" id="add_favorite_product" /></a>
                    <!--{else}-->
                        <img src="<!--{$TPL_URLPATH}-->img/button/btn_add_favorite_on.jpg" alt="お気に入り登録済" name="add_favorite_product" id="add_favorite_product" />
                        <script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/jquery.tipsy.js"></script>
                        <script type="text/javascript">
                            var favoriteButton = $("#add_favorite_product");
                            favoriteButton.tipsy({gravity: $.fn.tipsy.autoNS, fallback: "お気に入りに登録済み", fade: true });

                            <!--{if $just_added_favorite == true}-->
                            favoriteButton.load(function(){$(this).tipsy("show")});
                            $(function(){
                                var tid = setTimeout('favoriteButton.tipsy("hide")',5000);
                            });
                            <!--{/if}-->
                        </script>
                    <!--{/if}-->
                </div>
            <!--{/if}-->
        </div>
    <!--{/if}-->
    </div>

    <!--▲買い物かご-->
</div>
</form>
    <!--▼関連商品-->
    <!--{if $arrRecommend}-->
        <div id="whobought_area">
            <p class="block_name_list">おすすめアイテム</p>
            <!--{foreach from=$arrRecommend item=arrItem name="arrRecommend"}-->
                <div class="product_item">
                    <div class="productImage">
                        <a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrItem.product_id|u}-->">
                            <img src="<!--{$smarty.const.ROOT_URLPATH}-->resize_image.php?image=<!--{$arrItem.main_list_image|sfNoImageMainList|h}-->&amp;width=65&amp;height=65" alt="<!--{$arrItem.name|h}-->" /></a>
                    </div>
                    <!--{assign var=price02_min value=`$arrItem.price02_min_inctax`}-->
                    <!--{assign var=price02_max value=`$arrItem.price02_max_inctax`}-->
                    <div class="productContents">
                        <h3><a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrItem.product_id|u}-->"><!--{$arrItem.name|h}--></a></h3>
                        <p class="sale_price"><!--{$smarty.const.SALE_PRICE_TITLE}-->(税込)：<span class="price">
                            <!--{if $price02_min == $price02_max}-->
                                <!--{$price02_min|number_format}-->
                            <!--{else}-->
                                <!--{$price02_min|number_format}-->～<!--{$price02_max|number_format}-->
                            <!--{/if}-->円</span></p>
                        <p class="mini"><!--{$arrItem.comment|h|nl2br}--></p>
                    </div>
                </div><!--{* /.item *}-->
                <!--{if $smarty.foreach.arrRecommend.iteration % 2 === 0}-->
                    <div class="clear"></div>
                <!--{/if}-->
            <!--{/foreach}-->
        </div>
    <!--{/if}-->
    <!--▲関連商品-->

</div>
