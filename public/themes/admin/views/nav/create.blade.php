<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('nav/nav')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav_category.name') }}</label>
                        <div class="layui-input-block">
                            <?php $i=1;?>
                            @foreach($categories as $key => $category)
                                <input type="radio" name="category_id" value="{{$category['id']}}" title="{{$category['name']}}" @if($i==1) checked @endif>
                                <?php $i++;?>
                            @endforeach
                        </div>
                    </div>
                    <!--
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">* 上级</label>
                        <div class="layui-input-inline">
                            <input type="text" name="parent_id" id="parent_tree" lay-verify="tree" autocomplete="off" placeholder="请选择上级" class="layui-input">
                        </div>
                    </div>
                    -->
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('nav.label.name') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入{{ trans('nav.label.name') }}" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('nav.label.en_name') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="en_name" autocomplete="off" placeholder="请输入{{ trans('nav.label.en_name') }}" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav.label.slug') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="slug" autocomplete="off" placeholder="请输入{{ trans('nav.label.slug') }}" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('nav.label.url') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="url" autocomplete="off" placeholder="请输入{{ trans('nav.label.url') }}" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav.label.image') }}</label>
                        {!! $nav->files('image')
                        ->url($nav->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.order') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" value="0" autocomplete="off" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item button-group"><div class="layui-input-block"><button class="layui-btn layui-btn-normal layui-btn-lg" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button></div></div>
                    {!!Form::token()!!}
                </form>
            </div>

        </div>
    </div>
</div>
