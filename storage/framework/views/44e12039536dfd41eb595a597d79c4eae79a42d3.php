
<!-- 内容 -->
<div class="main">
    <div class="container w1400">

        <?php echo Theme::widget('WebBreadcrumb')->render(); ?>

        <?php echo Theme::widget('NavTab')->render(); ?>


        <div class="text-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <?php echo $page->content; ?>

        </div>

    </div>
</div>