<?php /* Smarty version 2.6.26, created on 2014-11-18 00:18:36
         compiled from /var/www/html/naturally_select/html/../../../data/Smarty/templates/default/shopping/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/shopping/complete.tpl', 25, false),array('modifier', 'h', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/shopping/complete.tpl', 25, false),array('modifier', 'nl2br', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/shopping/complete.tpl', 37, false),array('modifier', 'escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/shopping/complete.tpl', 82, false),)), $this); ?>

<div id="undercolumn">
    <div id="undercolumn_shopping">
        <p class="block_name_list"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<span>Order Complete</span></p>
        <p class="flow_area">
            <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/common/order_flow_7.jpg" alt="購入手続き完了" />
        </p>
        <!-- ▼その他決済情報を表示する場合は表示 -->
        <?php if (((is_array($_tmp=$this->_tpl_vars['arrOther']['title']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <p><span class="attention">■<?php echo ((is_array($_tmp=$this->_tpl_vars['arrOther']['title']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
情報</span><br />
                <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrOther'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != 'title'): ?>
                        <?php if (((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                            <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：
                        <?php endif; ?>
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br />
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </p>
        <?php endif; ?>
        <!-- ▲コンビに決済の場合には表示 -->
        <div id="complete_area">
            <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['orderInfo']['payment_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)) == 5): ?>
            <p class="message">
                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
の商品のご注文誠にありがとうございます。</br>
                ただいま、ご注文の確認メールをお送りさせていただきました。
            </p>
            <p>お手数をおかけして大変申し訳ございませんが、下記<span style="color:red">「クレジットカード支払手続きへ」ボタン</span>にてお支払いの手続きを行って下さい。<br />
                万一、ご確認メールが届かない場合は、トラブルの可能性もありますので大変お手数ではございますがもう一度お問い合わせいただくか、お電話にてお問い合わせくださいませ。<br />
                今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>
            <!------------クロネコｗｅｂコレクトへのリンク（テスト環境接続用）------------->
            <FORM NAME="UserForm" ACTION="https://ptwebcollect.jp/test_gateway/settleSelectAction.gw" METHOD="post" target="_blank" accept-charset="Shift_JIS">
                <INPUT TYPE="hidden" NAME="TRS_MAP" VALUE="V_W02">
                <INPUT TYPE="hidden" NAME="trader_code" VALUE="633307101">
                <INPUT TYPE="hidden" NAME="order_no" VALUE="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrKuroneko']['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                <INPUT TYPE="hidden" NAME="goods_name" VALUE="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrKuronekoDetail']['itemNames'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                <INPUT TYPE="hidden" NAME="settle_price" VALUE="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrKuronekoDetail']['totalAmount'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                <INPUT TYPE="hidden" NAME="buyer_name_kanji" VALUE="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrKuroneko']['order_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrKuroneko']['order_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                <INPUT TYPE="hidden" NAME="buyer_name_kana" VALUE="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrKuroneko']['order_kana01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrKuroneko']['order_kana02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                <INPUT TYPE="hidden" NAME="buyer_tel" VALUE="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrKuroneko']['order_tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrKuroneko']['order_tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrKuroneko']['order_tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                <INPUT TYPE="hidden" NAME="buyer_email" VALUE="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrKuroneko']['order_email'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                <INPUT TYPE="hidden" NAME="return_url" VALUE="https://www.xxxxx.jp/shop/xxxxx?shopid=2">
                <div class="credit_btn_area">
                   <INPUT TYPE="submit" VALUE="" id="credit_payment_btn">
                   <p>
                       クレジットカードでのお支払いは
                       <a style="color: #D00C1A; font-weight: bold;" href="http://www.yamatofinancial.jp/logobr/pay_popup_cc.html" target="_blank" onclick="window.open(this.href, 'mywindow6', 'width=434, height=440, menubar=yes, toolbar=no, location=no, scrollbars=yes, resizable=yes'); return false;">
                       クロネコwebコレクト</a>でお手続きを行って下さい。
                   </p>
                </div>
            </FORM>
            <?php else: ?>
            <p class="message"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
の商品をご購入いただき、ありがとうございました。</p>
            <p>ただいま、ご注文の確認メールをお送りさせていただきました。<br />
                万一、ご確認メールが届かない場合は、トラブルの可能性もありますので大変お手数ではございますがもう一度お問い合わせいただくか、お電話にてお問い合わせくださいませ。<br />
                今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>
            <?php endif; ?>
            <div class="shop_information">
                <p class="name"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                <p>TEL：<?php echo ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 <?php if (((is_array($_tmp=$this->_tpl_vars['arrInfo']['business_hour'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>（受付時間/<?php echo ((is_array($_tmp=$this->_tpl_vars['arrInfo']['business_hour'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
）<?php endif; ?><br />
                E-mail：<a href="mailto:<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'hexentity') : smarty_modifier_escape($_tmp, 'hexentity')); ?>
</a>
                </p>
            </div>
        </div>

        <div class="btn_area">
            <ul>
                <li>
                    <a href="<?php echo ((is_array($_tmp=@TOP_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" onmouseover="chgImg('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_toppage_on.jpg','b_toppage');" onmouseout="chgImg('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_toppage.jpg','b_toppage');">
                        <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_toppage.jpg" alt="トップページへ" border="0" name="b_toppage" /></a>
                </li>
            </ul>
        </div>

    </div>
</div>