<?php /* Smarty version 2.6.26, created on 2014-11-05 03:46:02
         compiled from /var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/guide/kiyaku.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/guide/kiyaku.tpl', 27, false),array('modifier', 'h', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/guide/kiyaku.tpl', 27, false),array('modifier', 'numeric_emoji', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/guide/kiyaku.tpl', 35, false),)), $this); ?>

<?php echo '<!-- ▼本文 ここから -->'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_kiyaku_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo '<br><br>'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_kiyaku_text'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo '<br><!-- ▲本文 ここまで -->'; ?><?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_kiyaku_is_first'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) || ! ((is_array($_tmp=$this->_tpl_vars['tpl_kiyaku_is_last'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<br>'; ?><?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_kiyaku_is_first'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<a href="kiyaku.php?page='; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_kiyaku_index']-1)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" accesskey="1">'; ?><?php echo ((is_array($_tmp=1)) ? $this->_run_mod_handler('numeric_emoji', true, $_tmp) : smarty_modifier_numeric_emoji($_tmp)); ?><?php echo '戻る</a><br>'; ?><?php endif; ?><?php echo ''; ?><?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_kiyaku_is_last'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<a href="kiyaku.php?page='; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_kiyaku_index']+1)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" accesskey="2">'; ?><?php echo ((is_array($_tmp=2)) ? $this->_run_mod_handler('numeric_emoji', true, $_tmp) : smarty_modifier_numeric_emoji($_tmp)); ?><?php echo '進む</a>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
