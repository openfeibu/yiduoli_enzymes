<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('video')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('app.title') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入{{ trans('app.title') }}" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('video.label.vid') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="vid" lay-verify="required" autocomplete="off" placeholder="请输入{{ trans('video.label.vid') }}" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('video.label.image') }}<br>(400 X 230)</label>
                        {!! $video->files('image')
                        ->url($video->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">{{ trans('app.description') }}</label>
                        <div class="layui-input-block">
                            <textarea name="description" placeholder="请输入{{ trans('app.description') }}" class="layui-textarea">{{$video->description}}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.home_recommend') }}</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="home_recommend" lay-filter="home_recommend" lay-skin="switch" lay-text="是|否" id="home_recommend" value="1">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.hot_recommend') }}</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="hot_recommend" lay-filter="hot_recommend" lay-skin="switch" lay-text="是|否" id="hot_recommend" value="1">
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
        var $ = layui.$;

    });

</script>
