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

require_once CLASS_REALDIR . 'pages/LC_Page.php';

class LC_Page_Ex extends LC_Page {
    
    /** 注文情報退避領域 */
    var $orderInfo;
    
    
    /** フッター表示用カテゴリ情報 **/
    var $products_category;
    
    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        // 開始時刻を設定する。
        $this->timeStart = microtime(true);

        $this->tpl_authority = $_SESSION['authority'];

        // ディスプレイクラス生成
        $this->objDisplay = new SC_Display_Ex();

        $layout = new SC_Helper_PageLayout_Ex();
        $layout->sfGetPageLayout($this, false, $_SERVER['SCRIPT_NAME'],
                                 $this->objDisplay->detectDevice());

        // スーパーフックポイントを実行.
        $objPlugin = SC_Helper_Plugin_Ex::getSingletonInstance($this->plugin_activate_flg);
        $objPlugin->doAction('LC_Page_preProcess', array($this));

        // 店舗基本情報取得
        $this->arrSiteInfo = SC_Helper_DB_Ex::sfGetBasisData();
        
        $this->footerCategory = SC_Helper_DB_Ex::sfGetCategoryList("", true);

        // トランザクショントークンの検証と生成
        $this->doValidToken();
        $this->setTokenTo();

        // ローカルフックポイントを実行.
        $this->doLocalHookpointBefore($objPlugin);
    }
}
