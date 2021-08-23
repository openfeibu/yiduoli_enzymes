<div class="footer clearfix">
    <div class="footer-vision">
        <div class="container w1400">
            <div class="vision-left col-lg-10 col-md-10 col-sm-12 col-xs-12  wow fadeInUp animated" data-wow-duration="1s" data-wow-delay=".3s">
                <div class="vision-tip"><span>TO BE THE WORLD'S LEADING BIOTECH COMPANY</span></div>
                <div class="vision-span">成为世界领先的生物技术企业</div>
            </div>
            <div class="vision-right col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="code wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                    <img src="/image/original/<?php echo e(setting('wechat_qr_code')); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="footer-con clearfix">
        <div class="container w1400">
            <div class="footer-con-left col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                <div class="footer-logo"><img  src="<?php echo e('/image/original'.setting('logo')); ?>" alt=""></div>
                <div class="footer-info">
                    地址：<?php echo e(setting('address')); ?>   <br>
                    电子邮箱： <?php echo e(setting('email')); ?><br>
                    电话总机：<?php echo e(setting('tel')); ?>  <br>
                    传真：<?php echo e(setting('fax')); ?>  <br>
                    营销服务中心：传真 <?php echo e(setting('marketing_center_fax')); ?>

                </div>
            </div>
            <div class="footer-con-right col-lg-8 col-md-8 col-sm-12 col-xs-12  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">
                <?php $navListPresenter = app('App\Repositories\Presenter\NavListPresenter'); ?>
                <?php echo $navListPresenter->footer_navs('web_top'); ?>

            </div>

        </div>
        <div class="container w1400">
            <div class="footer-copy clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="pull-left"><?php echo setting('right'); ?> </div>
                <div class="pull-right">技术支持：<a target="_blank" href="http://www.feibu.info">飞步科技</a></div>
            </div>
        </div>
    </div>
	
</div>
<div class="fb-loading">
	<div class="loader-inner ball-clip-rotate-pulse">
			<div></div>
			<div></div>
	</div>
</div>
<script src="https://player.polyv.net/script/player.js"></script>
<script src="http://player.polyv.net/script/polyvplayer.min.js"></script>
<script src="https://player.polyv.net/script/polyvplayer.min.js"></script>
