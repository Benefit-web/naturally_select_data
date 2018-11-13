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

<script type="text/javascript">//<![CDATA[
    $(function(){
        $('#category_area li.level1:last').css('border-bottom', 'none');
    });
//]]></script>
<div class="block_outer">
    <div id="category_area">
        <div class="block_body">
            <div class="custom_block_name">カテゴリからさがす</div>
            <!--{strip}-->
                <ul id="categorytree">
                    <!--{assign var=preLev value=1}-->
                    <!--{assign var=firstdone value=0}-->
                    <!--{section name=cnt loop=$arrTree}-->
                        <!--{* 表示フラグがTRUEなら表示 *}-->
                        <!--{if $arrTree[cnt].display == 1}-->
                            <!--{assign var=level value=`$arrTree[cnt].level`}-->
                            <!--{assign var=levdiff value=`$level-$preLev`}-->
                                <!--{if $levdiff > 0}-->
                                    <ul>
                                <!--{elseif $levdiff == 0 && $firstdone == 1}-->
                                    </li>
                                <!--{elseif $levdiff < 0}-->
                                    <!--{section name=d loop=`$levdiff*-1`}-->
                                            </li>
                                        </ul>
                                    <!--{/section}-->
                                    </li>
                                <!--{/if}-->
                            <li class="level<!--{$level}--><!--{if in_array($arrTree[cnt].category_id, $tpl_category_id)}--> onmark<!--{/if}-->">
                                <!--{if $arrTree[cnt].category_id == 18}-->
                                    <img src="<!--{$TPL_URLPATH}-->img/category/category_1.gif" alt="カテゴリ_ペーパーウォレット" />
                                <!--{elseif $arrTree[cnt].category_id == 19}-->
                                    <img src="<!--{$TPL_URLPATH}-->img/category/category_2.gif" alt="カテゴリ_ベビー服" />
                                <!--{elseif $arrTree[cnt].category_id == 20}-->
                                    <img src="<!--{$TPL_URLPATH}-->img/category/category_3.gif" alt="カテゴリ_アンダーウェア" />
                                <!--{elseif $arrTree[cnt].category_id == 25}-->
                                    <img src="<!--{$TPL_URLPATH}-->img/category/category_4.gif" alt="カテゴリ_カードホルダー" />
				<!--{elseif $arrTree[cnt].category_id == 26}-->
                                    <img src="<!--{$TPL_URLPATH}-->img/category/category_5.gif" alt="カテゴリ_ロングクラッチ" />
				<!--{elseif $arrTree[cnt].category_id == 27}-->
                                    <img src="<!--{$TPL_URLPATH}-->img/category/category_6.gif" alt="カテゴリ_エコバッグ" />
				<!--{/if}-->
                                <!--{if $arrTree[cnt].category_id == 21 || $arrTree[cnt].category_id == 22}-->
                                    <p style="padding-top:10px;font-size: 12px; text-align: left; word-wrap:break-word; width:90%;">
                                        <a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$arrTree[cnt].category_id}-->"<!--{if in_array($arrTree[cnt].category_id, $tpl_category_id)}--> class="onlink"<!--{/if}-->><!--{$arrTree[cnt].category_name|h}--></a>
                                    </p>
                                <!--{else}-->
                                    <p style="float:right; padding-top:10px; font-size: 8px; text-align: left; word-wrap:break-word; width:55%;">
                                        <a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$arrTree[cnt].category_id}-->"<!--{if in_array($arrTree[cnt].category_id, $tpl_category_id)}--> class="onlink"<!--{/if}-->><!--{$arrTree[cnt].category_name|h}--></a>
                                    </p>
                                <!--{/if}-->
                            <!--{if $firstdone == 0}--><!--{assign var=firstdone value=1}--><!--{/if}-->
                            <!--{assign var=preLev value=`$level`}-->
                        <!--{/if}-->
                        <!--{* セクションの最後に閉じタグを追加 *}-->
                        <!--{if $smarty.section.cnt.last}-->
                            <!--{if $preLev-1 > 0}-->
                                <!--{section name=d loop=`$preLev-1`}-->
                                    </li>
                                </ul>
                                <!--{/section}-->
                                </li>
                            <!--{else}-->
                                </li>
                            <!--{/if}-->
                        <!--{/if}-->
                    <!--{/section}-->
                </ul>
            <!--{/strip}-->
        </div>
    </div>
</div>
