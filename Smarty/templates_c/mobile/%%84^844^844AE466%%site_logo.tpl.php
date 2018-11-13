<?php /* Smarty version 2.6.26, created on 2014-09-21 09:14:33
         compiled from /var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/frontparts/bloc/site_logo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/frontparts/bloc/site_logo.tpl', 1, false),array('modifier', 'h', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/frontparts/bloc/site_logo.tpl', 1, false),)), $this); ?>
<center><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/header/logo.gif" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"></center>
<br>