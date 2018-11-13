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
require_once CLASS_REALDIR . 'pages/shopping/LC_Page_Shopping_Confirm.php';

/**
 * 入力内容確認 のページクラス(拡張).
 *
 * LC_Page_Shopping_Confirm をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Shopping_Confirm_Ex.php 22206 2013-01-07 09:10:12Z kim $
 */
class LC_Page_Shopping_Confirm_Ex extends LC_Page_Shopping_Confirm {

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
        parent::process();
    }
    
    /**
     * Page のアクション.
     *
     * @return void
     */
    function action() {

        $objCartSess = new SC_CartSession_Ex();
        $objSiteSess = new SC_SiteSession_Ex();
        $objCustomer = new SC_Customer_Ex();
        $objPurchase = new SC_Helper_Purchase_Ex();
        $objHelperMail = new SC_Helper_Mail_Ex();

        $this->is_multiple = $objPurchase->isMultiple();

        // 前のページで正しく登録手続きが行われた記録があるか判定
        if (!$objSiteSess->isPrePage()) {
            SC_Utils_Ex::sfDispSiteError(PAGE_ERROR, $objSiteSess);
        }

        // ユーザユニークIDの取得と購入状態の正当性をチェック
        $this->tpl_uniqid = $objSiteSess->getUniqId();
        $objPurchase->verifyChangeCart($this->tpl_uniqid, $objCartSess);

        $this->cartKey = $objCartSess->getKey();

        // カート内商品のチェック
        $this->tpl_message = $objCartSess->checkProducts($this->cartKey);
        if (!SC_Utils_Ex::isBlank($this->tpl_message)) {

            SC_Response_Ex::sendRedirect(CART_URLPATH);
            SC_Response_Ex::actionExit();
        }

        // カートの商品を取得
        $this->arrShipping = $objPurchase->getShippingTemp($this->is_multiple);
        $this->arrCartItems = $objCartSess->getCartList($this->cartKey);
        
        // カートに入った商品の口数を取得
        $order_quantity = 0;
        foreach($this->arrCartItems as $key => $val){
            $order_quantity += intval($val['quantity']);
        }
        // 合計金額
        $this->tpl_total_inctax[$this->cartKey] = $objCartSess->getAllProductsTotal($this->cartKey);
        // 税額
        $this->tpl_total_tax[$this->cartKey] = $objCartSess->getAllProductsTax($this->cartKey);
        // ポイント合計
        $this->tpl_total_point[$this->cartKey] = $objCartSess->getAllProductsPoint($this->cartKey);

        // 一時受注テーブルの読込
        $arrOrderTemp = $objPurchase->getOrderTemp($this->tpl_uniqid);
        
        // ギフト梱包希望の場合 梱包代\1,080 追加
        if($arrOrderTemp['gift_check'] == "1"){
            $select_packing = true;
        }
        // カート集計を元に最終計算
        $arrCalcResults = $objCartSess->calculate($this->cartKey, $objCustomer,
                                                  $arrOrderTemp['use_point'],
                                                  $objPurchase->getShippingPref($this->is_multiple),
                                                  $arrOrderTemp['charge'],
                                                  $arrOrderTemp['discount'],
                                                  $arrOrderTemp['deliv_id'],
                                                  $order_quantity,
                                                  $select_packing);
        $this->arrForm = array_merge($arrOrderTemp, $arrCalcResults);
        // 会員ログインチェック
        if ($objCustomer->isLoginSuccess(true)) {
            $this->tpl_login = '1';
            $this->tpl_user_point = $objCustomer->getValue('point');
        }

        // 決済モジュールを使用するかどうか
        $this->use_module = SC_Helper_Payment_Ex::useModule($this->arrForm['payment_id']);

        switch ($this->getMode()) {
            // 前のページに戻る
            case 'return':
                // 正常な推移であることを記録しておく
                $objSiteSess->setRegistFlag();


                SC_Response_Ex::sendRedirect(SHOPPING_PAYMENT_URLPATH);
                SC_Response_Ex::actionExit();
                break;
            case 'confirm':
                /*
                 * 決済モジュールで必要なため, 受注番号を取得
                 */
                $this->arrForm['order_id'] = $objPurchase->getNextOrderID();
                $_SESSION['order_id'] = $this->arrForm['order_id'];

                // 集計結果を受注一時テーブルに反映
                $objPurchase->saveOrderTemp($this->tpl_uniqid, $this->arrForm,
                                            $objCustomer);

                // 正常に登録されたことを記録しておく
                $objSiteSess->setRegistFlag();

                // 決済モジュールを使用する場合
                if ($this->use_module) {
                    $objPurchase->completeOrder(ORDER_PENDING);


                    SC_Response_Ex::sendRedirect(SHOPPING_MODULE_URLPATH);
                }
                // 購入完了ページ
                else {
                    $objPurchase->completeOrder(ORDER_NEW);
                    $template_id = SC_Display_Ex::detectDevice() == DEVICE_TYPE_MOBILE ? 2 : 1;
                    $objHelperMail->sfSendOrderMail(
                            $this->arrForm['order_id'],
                            $template_id);

                    SC_Response_Ex::sendRedirect(SHOPPING_COMPLETE_URLPATH);
                }
                SC_Response_Ex::actionExit();
                break;
            default:
                break;
        }

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
