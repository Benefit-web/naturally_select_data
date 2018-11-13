<?php /* Smarty version 2.6.26, created on 2014-11-15 19:52:50
         compiled from /var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/choose.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/choose.tpl', 1, false),array('modifier', 'u', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/choose.tpl', 10, false),array('modifier', 'sfNoImageMainList', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/choose.tpl', 11, false),array('modifier', 'h', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/choose.tpl', 11, false),)), $this); ?>
<a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
products/list.php?category_id=18">
    <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/banner/paperwallet_sale.jpg" alt="ペーパーウォレット セール" style="margin-bottom: 15px;"/>
</a>
<p class="custom_block_name_center">You choose which design?</p>
<div id="mi-slider" class="mi-slider">
    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['adjustPaperWalletProducts'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['products']):
?>
    <ul>
        <?php $_from = ((is_array($_tmp=$this->_tpl_vars['products'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <li>
            <a href="<?php echo ((is_array($_tmp=@P_DETAIL_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('u', true, $_tmp) : smarty_modifier_u($_tmp)); ?>
">
                <img src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
resize_image.php?image=<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&amp;width=200&amp;height=200" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" /></a>
            </a>
            <h4><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</h4>
        </li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
    <?php endforeach; endif; unset($_from); ?>
    <nav>
        <a href="#">ウォレット</a>
        <a href="#">カードホルダー</a>
        <a href="#">クラッチ</a>
        <a href="#">トートバッグ</a>
    </nav>
</div>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/modernizr.custom.63321.js"></script>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/jquery.catslider.js"></script>
<script>
$(function() {
    $( '#mi-slider' ).catslider();
});
</script>