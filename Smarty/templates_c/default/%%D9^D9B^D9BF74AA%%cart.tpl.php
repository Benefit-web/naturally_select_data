<?php /* Smarty version 2.6.26, created on 2014-11-15 19:40:46
         compiled from /var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/cart.tpl', 30, false),array('modifier', 'number_format', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/cart.tpl', 30, false),array('modifier', 'default', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/frontparts/bloc/cart.tpl', 30, false),)), $this); ?>

<div class="block_outer">
    <div id="cart_area">
    <div class="custom_block_name">
        現在のカートの中
    </div>
        <div class="block_body">
            <div class="information">
                <p class="item" style="font-weight: bold;">合計数量：<span class="attention" style="font-weight: bold;"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['TotalQuantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</span></p>
                <p class="total" style="font-weight: bold;">商品金額：<span class="price" style="font-weight: bold;"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['ProductsTotal'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
円</span></p>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['TotalQuantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0 && ((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['free_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0 && ! ((is_array($_tmp=$this->_tpl_vars['isMultiple'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) && ! ((is_array($_tmp=$this->_tpl_vars['hasDownload'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <p class="postage" style="font-weight: bold;">
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['deliv_free'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                        <span>送料無料まで</span>あと<br /><span class="price" style="font-weight: bold; font-size: 14px;"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['deliv_free'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
円（税込）</span><br />です。
                    <?php else: ?>
                        現在、送料は「<span class="price">無料</span>」です。
                    <?php endif; ?>
                </p>
                <?php endif; ?>
            </div>
            <?php if (((is_array($_tmp=@DISPLAY_IN_CART)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== true): ?>
            <a href="<?php echo ((is_array($_tmp=@CART_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" >
                <div class="check_cart">
                    カートを見る
                </div>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>