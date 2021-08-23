<script>
    $(function() {
        //商品筛选
        var page = 1;
        category_id = {{ $product_category_id  }};

        var  tab_num_arr = {'1':'one','2':'two' ,'3':'three','4':'four','5':'five'};
        $("body").on("click",".screen .category-tab li", function () {
            $(this).addClass("active").siblings("li").removeClass("active");
            category_id = $(this).attr('category_id');
            var type = $(this).attr('type');
            var that = $(this);
            var this_index = $(".screen ul").index($(this).parent());
			showLoading();
            $.ajax({
                url : url,
                data : {'page':page,'product_category_id' : category_id,'search_key':"{{ $search_key }}",'_token':"{!! csrf_token() !!}"},
                type : 'get',
                dataType : "json",
                success : function (data) {
                    var html = data.data.content;
					hideLoading();
                    if(html)
                    {
                        $(".product-list").html(html);
                    }
                    $(".screen ul").each(function(index,el){
                        console.log(index)
                        if(index > this_index)
                        {
                            $(this).fadeOut(200).remove();
                        }
                    });

                    if(type == 'child')
                    {
                        if(data.data.categories.length > 0)
                        {
                            var tab_class =tab_num_arr[this_index+2]+"-tab";
                            var category_tab_html = "<ul class='"+tab_class+" clearfix category-tab '>";
                            //category_tab_html += "<li category_id='"+category_id+"' type='parent' class='active'>全部</li>";
                            $.each(data.data.categories,function (i,item) {
                                if(i == 0)
                                {
                                    category_tab_html += "<li category_id='"+item.id+"' type='child' class='active'>"+item.name+"</li>";
                                }else{
                                    category_tab_html += "<li category_id='"+item.id+"' type='child'>"+item.name+"</li>";
                                }


                            })
                            category_tab_html += '</ul>';
                            that.parent().after(category_tab_html);
                            $('.screen .'+tab_class).fadeIn();
                        }
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