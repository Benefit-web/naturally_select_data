<?php /* Smarty version 2.6.26, created on 2014-11-15 19:40:46
         compiled from /var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/catalog.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/catalog.tpl', 33, false),)), $this); ?>

<script type="text/javascript">//<![CDATA[
    $(function(){
        $('#category_area li.level1:last').css('border-bottom', 'none');
    });
//]]></script>
<div class="block_outer">
    <div id="category_area">
        <div class="block_body">
            <div class="custom_block_name">カタログ</div>
                <div class="catalog_area">
                    <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
user_data/catalog/index.php">
                        <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/banner/catalog/pact_catalog.gif" alt="" />
                    </a>
                </div>
        </div>
    </div>
</div>