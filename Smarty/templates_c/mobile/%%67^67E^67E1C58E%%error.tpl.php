<?php /* Smarty version 2.6.26, created on 2015-08-19 02:32:31
         compiled from error.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'error.tpl', 26, false),array('modifier', 'numeric_emoji', 'error.tpl', 31, false),)), $this); ?>

<?php echo '<!--★エラーメッセージ-->'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo ''; ?><?php if (((is_array($_tmp=$this->_tpl_vars['return_top'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<br><br><a href="'; ?><?php echo ((is_array($_tmp=@MOBILE_TOP_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" accesskey="0">'; ?><?php echo ((is_array($_tmp=0)) ? $this->_run_mod_handler('numeric_emoji', true, $_tmp) : smarty_modifier_numeric_emoji($_tmp)); ?><?php echo 'TOPページへ</a>'; ?><?php endif; ?><?php echo ''; ?>
