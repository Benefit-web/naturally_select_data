<?php /* Smarty version 2.6.26, created on 2016-01-14 17:05:50
         compiled from /var/www/html/naturally_select/html/../../../data/Smarty/templates/default/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/header.tpl', 57, false),array('modifier', 'h', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/header.tpl', 57, false),array('modifier', 'count', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/header.tpl', 97, false),)), $this); ?>

<!--▼HEADER-->
<script>
/*
$(document).ready(function(){
  $(window).mousemove( function(e) {
    var setCookie = "";
    currentCursorPosition = {
      cx:e.clientX,
      cy:e.clientY,
      sx:e.screenX,
      sy:e.screenY,
      px:e.pageX,
      py:e.pageY
    };

    $.each(currentCursorPosition, function(key, val) {
        setCookie = key + "=" + val + ";";
        document.cookie = setCookie;
    });
  });

  setInterval(function(){
      $('.bxslider').cursorPositioner();
    },3000);
  });
*/
</script>
<div id="header_wrap">
    <div class="header_title">海外ブランド子供服|雑貨[ペーパーウォレット]の通販サイト</div>
    <div class="clear"></div>
    <div id="header" class="clearfix">
        <div id="logo_area">
            <p id="site_description"></p>
            <h1>
                <a href="<?php echo ((is_array($_tmp=@TOP_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/common/logo.gif" width="280px" heght="40px" alt="EC-CUBE ONLINE SHOPPING SITE" /><span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
/<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span></a>
            </h1>
            <div class="header_search">
                <!--検索フォーム-->
                <form name="search_form" id="search_form" method="get" action="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
products/list.php">
                <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                    <input type="text" name="name" class="with_glass" id="keyword_search" maxlength="80" value="検索キーワードを入力" />
                    <span class="search_btn">
                        <!--<input type="submit" value="検索" />-->
                        <input type="submit" id="keyword_search_btn" value="" />
                    </span>
                </form>
            </div>
        </div>
        <div id="header_navi">
            <div class="header_guide">
                <ul>
                    <li><a href="abouts">当サイトについて</a></li>
                    <li><a href="contact">お問い合わせ</a></li>
                </ul>
            </div>
            <div class="header_shipping">
                <span>配送料全国一律(メール便発送):</span><span style="font-size: 20px; font-weight: bold;">500円(税込)</span>
            </div>
            <?php if (((is_array($_tmp=@DISPLAY_IN_CART)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == true): ?>
            <ul class = "header_navi_link">
                <li>
                    <a href="<?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/login.php">マイページ</a>
                </li>
                <li>
                    <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
entry/kiyaku.php">会員登録</a>
                </li>
                <li>
                    <a href="<?php echo ((is_array($_tmp=@CART_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">カートを見る</a>
                </li>
            </ul>
            <?php endif; ?>
        <div id="header_utility">
            <div id="headerInternalColumn">
                        <?php if (count(((is_array($_tmp=$this->_tpl_vars['arrPageLayout']['HeaderInternalNavi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) > 0): ?>
                                <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrPageLayout']['HeaderInternalNavi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['HeaderInternalNaviKey'] => $this->_tpl_vars['HeaderInternalNaviItem']):
?>
                    <!-- ▼<?php echo ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem']['bloc_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 -->
                    <?php if (((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem']['php_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                        <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem']['php_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array('items' => ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))), $this); ?>

                    <?php else: ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem']['tpl_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array('items' => ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endif; ?>
                    <!-- ▲<?php echo ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem']['bloc_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 -->
                <?php endforeach; endif; unset($_from); ?>
                            <?php endif; ?>
                        </div>


        </div>
    </div>
</div>
<!--▲HEADER-->