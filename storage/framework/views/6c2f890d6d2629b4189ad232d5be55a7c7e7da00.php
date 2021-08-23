<div class="fixed-nav">
    <div class="fixed-nav-item">
        <div class="fixed-nav-item-search">

        </div>
    </div>
    <div class="fixed-nav-item">
        <div class="fixed-nav-item-code">
            <div class="code-img"><img src="/image/original/<?php echo e(setting('wechat_qr_code')); ?>" alt=""></div>
        </div>
    </div>
    <div class="fixed-nav-item">
        <div class="fixed-nav-item-contact">
            <a href="/customer_service/contact_us"></a>
        </div>
    </div>
    <div class="fixed-nav-item scrollT">
        <div class="fixed-nav-item-top">

        </div>
    </div>
</div>
<?php if(Route::currentRouteName() == 'pc.news.index' || Route::currentRouteName() == 'pc.news.show'): ?>
    <div class="fixed-search">
        <div class="fixed-search-close"></div>
        <div class="fixed-search-form">
            <form action="<?php echo e(route('pc.news.index')); ?>" method="get">
                <div class="fixed-search-form-input"><input type="text" placeholder="请输入搜索的内容" name="search_key"></div>
                <div class="fixed-search-form-submit"><button type="submit">搜索</button></div>
            </form>
        </div>
    </div>
<?php else: ?>
<div class="fixed-search">
    <div class="fixed-search-close"></div>
    <div class="fixed-search-form">
        <form action="<?php echo e(route('pc.product.index')); ?>" method="get">
            <div class="fixed-search-form-input"><input type="text" placeholder="请输入搜索的内容" name="search_key"></div>
            <div class="fixed-search-form-submit"><button type="submit">搜索</button></div>
        </form>
    </div>
</div>
<?php endif; ?>
