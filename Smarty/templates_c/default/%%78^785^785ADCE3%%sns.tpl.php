<?php /* Smarty version 2.6.26, created on 2014-11-09 23:38:45
         compiled from /var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/sns.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/sns.tpl', 34, false),)), $this); ?>

<script type="text/javascript">//<![CDATA[
    $(function(){
        $('#category_area li.level1:last').css('border-bottom', 'none');
    });
//]]></script>
<div class="block_outer">
    <div id="category_area">
        <div class="block_body">
            <div class="custom_block_name">SNS</div>
                <div>
                    <a href="https://www.facebook.com/itv.clothing.peace">
                        <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/common/facebook.jpg" alt="ナチュラリーセレクト　Facebook" style="width:160px; margin-top:10px;"/>
                    </a>
                </div>
        </div>
    </div>
</div>