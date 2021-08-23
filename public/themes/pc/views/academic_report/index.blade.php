<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab')->render() !!}
    </div>
    <div class="screen wow fadeInUp animated " style="box-shadow: none;" data-wow-duration=".6s" data-wow-delay=".5s" id="category_html">
        @include('product.category_html')
    </div>

    <div class="main product-list">
        @include('academic_report.list')

    </div>
</div>

<script>
    var url = "{{ route('pc.academic_report') }}"
    var category_id;
</script>

@include('common.product_ajax')

<script>
    $(function() {
        $("body").on("click", ".page a", function () {
            var ajax_href= $(this).attr('ajax_href');
            if(!ajax_href || ajax_href == 'javascript' || ajax_href == '#')
            {
                return ;
            }
            showLoading();
            $.ajax({
                url : ajax_href,
                data : {'product_category_id' : category_id,'_token':"{!! csrf_token() !!}"},
                type : 'get',
                dataType : "json",
                success : function (data) {
                    hideLoading();
                    var html = data.data.content;
                    console.log(html);
                    if(html)
                    {
                        $(".product-list").html(html);
                    }

                },
                error : function (jqXHR, textStatus, errorThrown) {
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                }
            });
        })
    })

</script>