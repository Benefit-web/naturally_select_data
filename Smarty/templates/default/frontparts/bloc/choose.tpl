<a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=18">
    <img src="<!--{$TPL_URLPATH}-->img/banner/paperwallet_sale.jpg" alt="ペーパーウォレット セール" style="margin-bottom: 15px;"/>
</a>
<p class="custom_block_name_center">You choose which design?</p>
<div id="mi-slider" class="mi-slider">
    <!--{foreach from=$adjustPaperWalletProducts item=products}-->
    <ul>
        <!--{foreach from=$products item=item}-->
        <li>
            <a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$item.product_id|u}-->">
                <img src="<!--{$smarty.const.ROOT_URLPATH}-->resize_image.php?image=<!--{$item.main_list_image|sfNoImageMainList|h}-->&amp;width=200&amp;height=200" alt="<!--{$item.name}-->" /></a>
            </a>
            <h4><!--{$item.name}--></h4>
        </li>
        <!--{/foreach}-->
    </ul>
    <!--{/foreach}-->
    <nav>
        <a href="#">ウォレット</a>
        <a href="#">カードホルダー</a>
        <a href="#">クラッチ</a>
        <a href="#">トートバッグ</a>
    </nav>
</div>
<script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/modernizr.custom.63321.js"></script>
<script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/jquery.catslider.js"></script>
<script>
$(function() {
    $( '#mi-slider' ).catslider();
});
</script>