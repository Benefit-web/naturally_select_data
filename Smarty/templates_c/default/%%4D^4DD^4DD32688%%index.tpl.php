<?php /* Smarty version 2.6.26, created on 2014-11-16 00:39:10
         compiled from /var/www/html/naturally_select/html/../../../data/Smarty/templates/default/shopping/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/shopping/index.tpl', 25, false),array('modifier', 'h', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/shopping/index.tpl', 25, false),array('modifier', 'sfGetErrorColor', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/shopping/index.tpl', 39, false),array('modifier', 'sfTrimURL', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/shopping/index.tpl', 64, false),)), $this); ?>

<div id="undercolumn">
    <div id="undercolumn_login">
        <p class="block_name_list"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<span>Login</span></p>
        <form name="member_form" id="member_form" method="post" action="?" onsubmit="return fnCheckLogin('member_form')">
        <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
        <input type="hidden" name="mode" value="login" />

        <div class="login_area">
            <div class="login_box">
            <p style="font-weight: bold; margin-bottom: 15px;">ナチュラリーセレクトのアカウントをお持ちの方</p>
            <div>
                <dl class="formlist clearfix">
                    <?php $this->assign('key', 'login_email'); ?>
                    <dt>メールアドレス&nbsp;：</dt>
                    <dd>
                        <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) >= 1): ?><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><br /><?php endif; ?>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_login_email'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
; ime-mode: disabled;" class="box300" /></br>
                        <span style="font-size: 10px;">※半角英数字 </span>
                    </dd>
                </dl>
                <dl class="formlist clearfix">
                    <dt>
                        <?php $this->assign('key', 'login_pass'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        パスワード&nbsp;：
                    </dt>
                    <dd>
                        <input type="password" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" class="box300" /></br>
                        <span style="font-size: 10px;">※半角英数字　6文字以上～20文字以内 </span>
                    </dd>

                </dl>
                <div class="btn_area">
                    <ul>
                        <li>
                            <input type="image" onmouseover="chgImgImageSubmit('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_login_on.jpg',this)" onmouseout="chgImgImageSubmit('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_login.jpg',this)" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_login.jpg" alt="ログイン" name="log" id="log" />
                        </li>
                    </ul>
                </div>
            </div>
            <p style="font-size: 10px;">
                ※パスワードを忘れた方は<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfTrimURL', true, $_tmp) : SC_Utils_Ex::sfTrimURL($_tmp)); ?>
/forgot/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" onclick="win01('<?php echo ((is_array($_tmp=((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfTrimURL', true, $_tmp) : SC_Utils_Ex::sfTrimURL($_tmp)); ?>
/forgot/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
','forget','600','460'); return false;" target="_blank">こちら</a>からパスワードの再発行を行ってください。<br />
                ※メールアドレスを忘れた方は、お手数ですが、<a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
contact/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">お問い合わせページ</a>からお問い合わせください。
            </p>
            </div>
        </div>
        </form>
        <div class="login_area">
            <div class="login_box">
            <p style="font-weight: bold; margin-bottom: 15px;">ナチュラリーセレクトのアカウントを取得する</p>
            <p class="inputtext">
                 アカウントを取得していただくとログインするだけで、毎回お名前や住所などを入力することなくスムーズにお買い物をお楽しみいただけます。
            </p>
            <div>
                <div class="btn_area">
                    <ul>
                        <li>
                            <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
entry/kiyaku.php" onmouseover="chgImg('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_entry_on.jpg','b_gotoentry');" onmouseout="chgImg('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_entry.jpg','b_gotoentry');">
                            <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_entry.jpg" alt="会員登録をする" border="0" name="b_gotoentry" /></a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
            <div class="login_box" style="margin-top:30px;">
            <p style="font-weight: bold; margin-bottom: 15px;">会員登録をせずに購入手続きへ進む</p>
            <p class="inputtext">会員登録をせずに購入手続きをされたい方は、下記よりお進みください。</p>
            <form name="member_form2" id="member_form2" method="post" action="?">
            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <input type="hidden" name="mode" value="nonmember" />
            <div>
                <div class="btn_area">
                    <ul>
                        <li>
                            <input type="image" onmouseover="chgImgImageSubmit('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_buystep_on.jpg',this)" onmouseout="chgImgImageSubmit('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_buystep.jpg',this)" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_buystep.jpg" alt="購入手続きへ" name="buystep" id="buystep" />
                        </li>
                    </ul>
                </div>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>