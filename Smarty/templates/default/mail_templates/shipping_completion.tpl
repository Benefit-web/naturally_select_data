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
<!--{$arrOrder.order_name01}--> <!--{$arrOrder.order_name02}--> 様

<!--{$tpl_header}-->


************************************************
　ご注文商品明細
************************************************

<!--{section name=cnt loop=$arrOrderDetail}-->
商品コード: <!--{$arrOrderDetail[cnt].product_code}-->
商品名: <!--{$arrOrderDetail[cnt].product_name}--> <!--{$arrOrderDetail[cnt].classcategory_name1}--> <!--{$arrOrderDetail[cnt].classcategory_name2}-->
数量：<!--{$arrOrderDetail[cnt].quantity}-->

<!--{/section}-->

************************************************

<!--{$tpl_footer}-->