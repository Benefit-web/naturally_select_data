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
<!--{if count($arrNewProducts) > 0}-->
<div class="bloc_outer clearfix">
    <div id="recommend_area">
        <p class="custom_block_name_center">新着アイテム</p>
        <!--{section name=cnt loop=$arrNewProducts step=2}-->
        <div class="bloc_body clearfix">
            <div class="product_item clearfix">
                <div class="productImage">
                    <a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrNewProducts[cnt].product_id|u}-->">
                        <img src="<!--{$smarty.const.ROOT_URLPATH}-->resize_image.php?image=<!--{$arrNewProducts[cnt].main_list_image|sfNoImageMainList|h}-->&amp;width=80&amp;height=80" alt="<!--{$arrNewProducts[cnt].name|h}-->" /></a>
                </div>
                <div class="productContents">
                    <h3>
                        <a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrNewProducts[cnt].product_id|u}-->"><!--{$arrNewProducts[cnt].name|h}--></a>
                    </h3>
                    <!--{assign var=price01 value=`$arrNewProducts[cnt].price01_min`}-->
                    <!--{assign var=price02 value=`$arrNewProducts[cnt].price02_min`}-->
                    <p class="sale_price"><!--{$smarty.const.SALE_PRICE_TITLE}-->(税込)：
                        <span class="price"><!--{$price02|sfCalcIncTax:$arrInfo.tax:$arrInfo.tax_rule|number_format}--> 円</span>
                    </p>
                    <p class="mini comment"><!--{$arrNewProducts[cnt].comment|h|nl2br}--></p>
                </div>
            </div>

            <div class="product_item clearfix">
                <div class="productImage">
                    <!--{assign var=cnt2 value=`$smarty.section.cnt.iteration*$smarty.section.cnt.step-1`}-->
                    <!--{if $arrNewProducts[$cnt2]|count > 0}-->

                    <a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrNewProducts[$cnt2].product_id|u}-->">
                    <img src="<!--{$smarty.const.ROOT_URLPATH}-->resize_image.php?image=<!--{$arrNewProducts[$cnt2].main_list_image|sfNoImageMainList|h}-->&amp;width=80&amp;height=80" alt="<!--{$arrNewProducts[$cnt2].name|h}-->" /></a>
                </div>
                <div class="productContents">
                    <h3>
                        <a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrNewProducts[$cnt2].product_id|u}-->"><!--{$arrNewProducts[$cnt2].name|h}--></a>
                    </h3>

                    <!--{assign var=price01 value=`$arrNewProducts[$cnt2].price01_min`}-->
                    <!--{assign var=price02 value=`$arrNewProducts[$cnt2].price02_min`}-->

                    <p class="sale_price"><!--{$smarty.const.SALE_PRICE_TITLE}-->(税込)：
                        <span class="price"><!--{$price02|sfCalcIncTax:$arrInfo.tax:$arrInfo.tax_rule|number_format}--> 円</span>
                    </p>
                    <p class="mini comment"><!--{$arrNewProducts[$cnt2].comment|h|nl2br}--></p>
                    <!--{/if}-->
                </div>
            </div>

        </div>
        <!--{/section}-->
    </div>
</div>
<!--{/if}-->
