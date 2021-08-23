<div id="wap-nav">
    <div class="nav-box transition500">
        <div class="wap-header">
            <span class="wapNav-close icon_close"></span>
            <img src="<?php echo e('/image/original'.setting('logo')); ?>" alt="Logo" class=" fadeInUp animated"  />
        </div>

        <ul>
            <?php $navListPresenter = app('App\Repositories\Presenter\NavListPresenter'); ?>

            <?php echo $navListPresenter->mobile_navs('web_top'); ?>

        </ul>
    </div>
</div>