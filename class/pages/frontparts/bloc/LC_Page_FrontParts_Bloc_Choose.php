<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2011 LOCKON CO.,LTD. All Rights Reserved.
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
require_once CLASS_REALDIR . 'pages/frontparts/bloc/LC_Page_FrontParts_Bloc.php';

/**
 * New_Products のページクラス.
 *
 * @package Page
 */
class LC_Page_FrontParts_Bloc_Choose extends LC_Page_FrontParts_Bloc {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    function action() {

        // 基本情報を渡す
        $objSiteInfo = SC_Helper_DB_Ex::sfGetBasisData();
        $this->arrInfo = $objSiteInfo->data;
        
        // ペーパーウォレットのカテゴリIDを設定
        $this->catPaperWallet = "18,25,26,27";
        $this->arrCatPaperWallet = array(18,25,26,27);

        // ペーパーウォレットの商品情報を取得
        $this->arrPaperWalletProducts = $this->getPaperWallets($this->catPaperWallet);
        
        // 取得した商品情報を整形する
        $this->adjustPaperWalletProducts = $this->adjustPaperWallets($this->arrPaperWalletProducts, $this->arrCatPaperWallet);
//
//       print "<pre>";
//var_dump($this->adjustPaperWalletProducts);

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
     * ペーパーウォレットの商品情報を取得
     *
     * @param $category_ids ペーパーウォレットのカテゴリID
     * @return array ペーパーウォレットの商品情報
     */
    function getPaperWallets($category_ids){
        $objQuery   =& SC_Query_Ex::getSingletonInstance();
        $col = <<< __EOS__
                p.product_id,
                p.name,
                p.main_list_image,
                pca.category_id,
                MIN(pc.price02) AS price02_min,
                MAX(pc.price02) AS price02_max
__EOS__;
        $from = <<< __EOS__
                dtb_products as p
           LEFT JOIN dtb_products_class as pc
             ON p.product_id = pc.product_id
           LEFT JOIN dtb_product_categories as pca
             ON p.product_id = pca.product_id
__EOS__;
        $where = "p.del_flg = 0 AND p.status = 1 AND pca.category_id IN (".$category_ids.")";
        $groupby = "p.product_id, p.name, p.main_list_image, p.update_date, pca.category_id";
        $objQuery->setGroupBy($groupby);
        $objQuery->setOrder('p.update_date DESC');

        return $objQuery->select($col, $from, $where);
    }
    
   /**
     * 商品情報を整形する
     *
     * @param $products ペーパーウォレットの商品情報
     * @return array ペーパーウォレットの商品情報
     */
    function adjustPaperWallets($products, $category_ids){
      
        $arrAdjustProduct = array();
        if(!empty($products) && !empty($category_ids)){
            foreach($category_ids AS $row){
                
                foreach($products AS $key => $val){
                    if(count($arrAdjustProduct[$row]) >= 4) break;
                    if($row == $val['category_id']){
                        $arrAdjustProduct[$row][] = $val;
                    } 
                }
            }   
        }

        return $arrAdjustProduct;
    }
}

?>