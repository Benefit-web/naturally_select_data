<?php
/*
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
 */

// {{{ requires
require_once CLASS_EX_REALDIR . 'page_extends/LC_Page_Ex.php';

/**
 * ご注文完了 のページクラス.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id:LC_Page_Shopping_Complete.php 15532 2007-08-31 14:39:46Z nanasess $
 */
class LC_Page_Shopping_Complete extends LC_Page_Ex {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $this->tpl_title = 'ご注文完了';
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        parent::process();
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    function action() {

//        $this->arrInfo = SC_Helper_DB_Ex::sfGetBasisData();
//        unset($_SESSION['order_id']);
        $this->arrInfo = SC_Helper_DB_Ex::sfGetBasisData();
        $objPurchase = new SC_Helper_Purchase();
        $objFormParam = new SC_FormParam_Ex();
        $arrOrder = $objPurchase->getOrder($_SESSION['order_id']);
        $arrOrderDetail = $objPurchase->getOrderDetail($_SESSION['order_id']);
        $this->arrKuroneko = $arrOrder;
        $this->arrKuronekoDetail = $arrOrderDetail;
        
        // 商品を複数購入した場合
        // 商品名の文字列連結と合計金額の計算
        if(count($this->arrKuronekoDetail) != 1){
            // 商品名初期化
            $itemNames = "";
            // 合計金額初期化
            $price = 0;
            for($i=0; $i < count($this->arrKuronekoDetail); $i++){
                $itemNames .= $this->arrKuronekoDetail[$i]["product_name"]. ", ";
                $price = intval($price) + intval( $this->arrKuronekoDetail[$i]["price"]);
            } 
            // 合計金額に消費税加算
            $price = round($price * 1.05, -1);
            
            // 配列追加
            $this->arrKuronekoDetail["itemNames"] = $itemNames;
            $this->arrKuronekoDetail["totalAmount"] = $price;
            
        }else{    // 商品を単品で購入した場合
        //
           // 配列追加
            $this->arrKuronekoDetail["itemNames"] = $this->arrKuronekoDetail[0]["product_name"];
            $this->arrKuronekoDetail["totalAmount"] = round(intval($this->arrKuronekoDetail[0]["price"]) * 1.05, -1);
        }
        unset($_SESSION["order_id"]);
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::destroy();
    }

    /**
     * 決済モジュールから遷移する場合があるため, トークンチェックしない.
     */
    function doValidToken() {
        // nothing.
    }
}
