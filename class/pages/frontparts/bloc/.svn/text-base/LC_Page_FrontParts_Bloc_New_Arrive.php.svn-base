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
class LC_Page_FrontParts_Bloc_New_Arrive extends LC_Page_FrontParts_Bloc {

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

        // 新着商品のステータスIDを設定（デフォルトでは NEW=1）
        $new_product_id = 1;

        //表示する商品の件数
        $limit = 4;

        // 新着商品取得
        $this->arrNewProducts = $this->getNewProducts($new_product_id, $limit);

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
     * 新着商品取得.
     *
     * @param int 新着商品のステータスID
     * @return array 新着商品配列
     */
    function getNewProducts($new_product_id, $limit){
        $objQuery   =& SC_Query_Ex::getSingletonInstance();
        $col = <<< __EOS__
                p.product_id,
                p.name,
                p.main_list_image,
                p.main_list_comment AS comment,
                MIN(pc.price02) AS price02_min,
                MAX(pc.price02) AS price02_max
__EOS__;
        $from = <<< __EOS__
                dtb_products as p
           LEFT JOIN dtb_products_class as pc
             ON p.product_id = pc.product_id
           LEFT JOIN dtb_product_status as ps
             ON p.product_id = ps.product_id
__EOS__;
        $where = "p.del_flg = 0 AND p.status = 1 AND ps.product_status_id = ?";
        $groupby = "p.product_id, p.name, p.main_list_image, p.main_list_comment, ps.product_id, p.update_date";
        $objQuery->setGroupBy($groupby);
        $objQuery->setOrder('p.update_date DESC');
        $objQuery->setLimit($limit);

        return $objQuery->select($col, $from, $where, array($new_product_id));
    }
}

?>