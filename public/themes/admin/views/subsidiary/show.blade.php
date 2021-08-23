<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('subsidiary/'.$subsidiary->id)}}" method="POST" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">上级 *</label>
                        <div class="layui-input-inline">
                            <input type="text" name="parent_id" id="subsidiary_tree" lay-verify="tree" autocomplete="off" placeholder="请选择分类(加载中)" class="layui-input" value="{{ $subsidiary->parent_id }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('subsidiary.label.name') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入{{ trans('subsidiary.label.name') }}" class="layui-input" value="{{ $subsidiary->name }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('app.image') }}<br>(240 X 60)</label>
                        {!! $subsidiary->files('image')
                        ->url($subsidiary->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('subsidiary.label.url') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="url" placeholder="请输入{{ trans('subsidiary.label.url') }}" autocomplete="off" class="layui-input" value="{{ $subsidiary->url }}">
                        </div>
                        <div class="layui-form-mid layui-word-aux">必须含https://或http://</div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">{{ trans('app.content') }}</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="height:240px;">{!! $subsidiary->content !!}</script>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input"  lay-verify="number"  value="{{ $subsidiary->order }}">
                        </div>
                    </div>
                    <div class="layui-form-item button-group"><div class="layui-input-block"><button class="layui-btn layui-btn-normal layui-btn-lg" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button></div></div>
                    {!!Form::token()!!}
                    <input type="hidden" name="_method" value="PUT">
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
            elem: '#subsidiary_tree',
            data: '/subsidiary_tree',
            headers: {},
            type: 'get',
            // 占位符
            placeholder: "{!! $subsidiary->parent_name !!}",
            //多选
            showCheckbox: false,
            //连线
            showLine: true,
            //选中节点(依赖于 showCheckbox 以及 key 参数)。
            //checked: [11, 12],
            //展开节点(依赖于 key 参数)
            spread: [{{ $subsidiary->parent_id }}],
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
