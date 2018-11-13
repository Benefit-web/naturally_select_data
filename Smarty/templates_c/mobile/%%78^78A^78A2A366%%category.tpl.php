<?php /* Smarty version 2.6.26, created on 2014-09-21 09:14:33
         compiled from /var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/frontparts/bloc/category.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'numeric_emoji', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/frontparts/bloc/category.tpl', 26, false),array('modifier', 'script_escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/frontparts/bloc/category.tpl', 27, false),array('modifier', 'sfCutString', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/frontparts/bloc/category.tpl', 34, false),array('modifier', 'h', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/frontparts/bloc/category.tpl', 34, false),array('function', 'cycle', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/mobile/frontparts/bloc/category.tpl', 34, false),)), $this); ?>

<?php echo ''; ?><?php echo ((is_array($_tmp=1)) ? $this->_run_mod_handler('numeric_emoji', true, $_tmp) : smarty_modifier_numeric_emoji($_tmp)); ?><?php echo '商品カテゴリ<br>'; ?><?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrCat'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['show'] = true;
$this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['step'] = 1;
$this->_sections['cnt']['start'] = $this->_sections['cnt']['step'] > 0 ? 0 : $this->_sections['cnt']['loop']-1;
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = $this->_sections['cnt']['loop'];
    if ($this->_sections['cnt']['total'] == 0)
        $this->_sections['cnt']['show'] = false;
} else
    $this->_sections['cnt']['total'] = 0;
if ($this->_sections['cnt']['show']):

            for ($this->_sections['cnt']['index'] = $this->_sections['cnt']['start'], $this->_sections['cnt']['iteration'] = 1;
                 $this->_sections['cnt']['iteration'] <= $this->_sections['cnt']['total'];
                 $this->_sections['cnt']['index'] += $this->_sections['cnt']['step'], $this->_sections['cnt']['iteration']++):
$this->_sections['cnt']['rownum'] = $this->_sections['cnt']['iteration'];
$this->_sections['cnt']['index_prev'] = $this->_sections['cnt']['index'] - $this->_sections['cnt']['step'];
$this->_sections['cnt']['index_next'] = $this->_sections['cnt']['index'] + $this->_sections['cnt']['step'];
$this->_sections['cnt']['first']      = ($this->_sections['cnt']['iteration'] == 1);
$this->_sections['cnt']['last']       = ($this->_sections['cnt']['iteration'] == $this->_sections['cnt']['total']);
?><?php echo ''; ?><?php $this->assign('disp_name', ($this->_tpl_vars['arrCat'][$this->_sections['cnt']['index']]['category_name'])); ?><?php echo ''; ?><?php if (((is_array($_tmp=$this->_tpl_vars['arrCat'][$this->_sections['cnt']['index']]['has_children'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ''; ?><?php $this->assign('path', (@ROOT_URLPATH)."products/category_list.php"); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $this->assign('path', (@ROOT_URLPATH)."products/list.php"); ?><?php echo ''; ?><?php endif; ?><?php echo '　<font color="'; ?><?php echo smarty_function_cycle(array('values' => "#000000,#880000,#8888ff,#88ff88,#ff0000"), $this);?><?php echo '">■</font><a href="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '?category_id='; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['arrCat'][$this->_sections['cnt']['index']]['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '">'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['disp_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfCutString', true, $_tmp, 10, false) : SC_Utils_Ex::sfCutString($_tmp, 10, false)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo '</a><br>'; ?><?php endfor; endif; ?><?php echo ''; ?>
