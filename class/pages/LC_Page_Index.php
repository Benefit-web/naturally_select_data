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
 * Index のページクラス.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Index.php 22206 2013-01-07 09:10:12Z kim $
 */
class LC_Page_Index extends LC_Page_Ex {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
//sleep(10);
/*$ip = '133.111.0.10';
$url = 'http://api.docodoco.jp/v4/search?key1=3wCeKt3SDRwHZ8ZvXBglcsmS7AfM7BsA4kvnEx6vwdguNckoPM2b5uJaAjvBvW0I&key2=6e82223591737ffa3613f7bbc6ff665e820c9dd8&format=json&charset=utf8&ipadr='.$ip;
$jsonStr = @file_get_contents($url, false);
print '<pre>';
print_r(json_decode($jsonStr));*/
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
        $this->tpl_title = '';
        $objCustomer = new SC_Customer_Ex();
        $this->isLogin = $objCustomer->isLoginSuccess(true);
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::destroy();
    }
}
