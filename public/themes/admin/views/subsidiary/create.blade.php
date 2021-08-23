<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('subsidiary')}}" method="POST" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">* 上级</label>

                        <div class="layui-input-block">
                            <select name="parent_id" id="parent_id" lay-filter="parent_id">
                                <option value="0">顶级</option>
                                @foreach($subsidiaries as $key => $subsidiary_item)
                                    <option value="{{ $subsidiary_item['id'] }}">{!! $subsidiary_item['name'] !!}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('subsidiary.label.name') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入{{ trans('subsidiary.label.name') }}" class="layui-input" >
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
                            <input type="text" name="url" placeholder="请输入{{ trans('subsidiary.label.url') }}" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">必须含https://或http://</div>
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
                            <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input" value="0" lay-verify="number">
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
        var $ = layui.$;
        $(document).ready(function(){
            $("#parent_id").val("{{ $parent_id }}");
            form.render('select','parent_id');
        })
    });

</script>

