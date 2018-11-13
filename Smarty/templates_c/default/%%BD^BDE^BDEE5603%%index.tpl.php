<?php /* Smarty version 2.6.26, created on 2014-11-17 15:58:05
         compiled from /var/www/html/naturally_select/html/../../../data/Smarty/templates/default/user_data/catalog/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/naturally_select/html/../../../data/Smarty/templates/default/user_data/catalog/index.tpl', 23, false),)), $this); ?>

<script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/jquery.media.js"></script>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/jquery.metadata.js"></script>
<script type="text/javascript">
    $(function() {
        $('a.media').media({width:780, height:550});
    });
</script>
<div class="catalog_viewer">
    <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/banner/catalog/catalog_banner.jpg" />
    <a class="media" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
pdf/catalog/pact_catalog.pdf" alt="" /><span style="font-size: 6px;"></a>
    <div class="catalog_comment">
       <br />■カタログ掲載商品のご注文について<br />
       当ウェブサイトに掲載されている商品情報以外ででカタログに気になる商品がございましたら<br />
       品番・サイズ・カラーをご入力の上<a href="/contact">お問い合わせフォーム</a>よりお問い合わせ下さい。  
    </div>
</div>