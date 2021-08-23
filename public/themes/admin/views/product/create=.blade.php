<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('product')}}" method="POST" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item">
                        <label class="layui-form-label">* 选择分类</label>
                        <div class="layui-input-inline">
                            <div id="product_category" class="demo-tree demo-tree-box" style="min-width: 200px;"></div>
                            <input type="text" name="product_category_id" id="category_tree"lay-verify="tree" autocomplete="off" placeholder="请选择分类(加载中)" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">{!! trans('app.title')!!}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入{!! trans('app.title')!!}" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{!! trans('product.label.vid')!!}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="vid" placeholder="请输入{!! trans('product.label.vid')!!}" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('product.label.images') }}</label>
                        {!! $product->files('images')
                        ->url($product->getUploadURL('images'))
                        ->uploaders()!!}
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{!! trans('product.label.parameters')!!}</label>
                        <div class="layui-input-block parameters" >
                            @for($i=0;$i<10;$i++)
                            <div class="parameters_group">
                            <input type="text" name="parameters_name[]" autocomplete="off" placeholder="参数名" class="layui-input" >:
                            <input type="text" name="parameters_value[]" autocomplete="off" placeholder="参数值" class="layui-input" >
                            </div>
                            @endfor
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{!! trans('product.label.instruction_title')!!}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="instruction_title" autocomplete="off" placeholder="请输入{!! trans('product.label.instruction_title') !!}" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('product.label.instruction') }}</label>
                        {!! $product->files('instruction')
                        ->url($product->getFileURL('instruction'))
                        ->exts('pdf')
                        ->uploaderFile()!!}
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">{{ trans('app.description') }}</label>
                        <div class="layui-input-block">
                            <textarea name="description" placeholder="请输入{{ trans('app.description') }}" class="layui-textarea">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">{{ trans('app.content') }}</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="height:240px;">

                            </script>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input" lay-verify="number"  value="0">
                        </div>
                    </div>
                    <div class="layui-form-item button-group"><div class="layui-input-block"><button class="layui-btn layui-btn-normal layui-btn-lg" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button></div></div>
                    {!!Form::token()!!}
                </form>
            </div>

        </div>
    </div>
</div>
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var ue = getUe();

    layui.use(['form','jquery'], function(){
        var form = layui.form;
        form.render();
        var $ = layui.$;
    });

</script>
<script>
    var sizes = {};
    layui.use(['treeSelect', 'form', 'layer'], function () {
        var treeSelect= layui.treeSelect,
                form = layui.form,
                $ = layui.jquery,
                layer = layui.layer;

        treeSelect.render({
            elem: '#category_tree',
            data: '/product_categories_tree',
            headers: {},
            type: 'get',
            // 占位符
            placeholder: '请选择分类',
            //多选
            showCheckbox: true,
            //连线
            showLine: true,
            //选中节点(依赖于 showCheckbox 以及 key 参数)。
            //checked: [11, 12],
            //展开节点(依赖于 key 参数)
            spread: true,
            // 点击回调
            click: function(obj){

            },
            // 加载完成后的回调函数
            success: function (d) {
                console.log(d);
            }
        });
    });
</script>
