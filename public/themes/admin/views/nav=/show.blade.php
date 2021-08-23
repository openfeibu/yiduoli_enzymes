<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('nav/nav/'.$nav->id)}}" method="post" lay-filter="fb-form">
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
                    <div class="layui-form-item">
                        <label class="layui-form-label">上级</label>
                        <div class="layui-input-inline">
                            <select name="parent_id" class="layui-select">
                                <option value="0">顶级</option>
                                @foreach($top_navs as $key => $top_navs)
                                    <option value="{{ $top_navs->id }}" @if($nav->parent_id == $top_navs->id) selected @endif>{{ $top_navs->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('nav.label.name') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入{{ trans('nav.label.name') }}" class="layui-input" value="{{$nav->name}}">
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
                        <label class="layui-form-label">{{ trans('nav.label.url') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="url" lay-verify="required" autocomplete="off" placeholder="请输入链接" class="layui-input" value="{{$nav->url}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav.label.image') }}</label>
                        {!! $nav->files('image')
                        ->url($nav->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav_category.name') }}</label>
                        <div class="layui-input-block">
                            @foreach($categories as $key => $category)
                                <input type="radio" name="category_id" value="{{$category['id']}}" title="{{$category['name']}}" @if($category['id'] == $nav->category_id) checked @endif>
                            @endforeach
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.order') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" value="{{ $nav->order }}" lay-verify="title" autocomplete="off" class="layui-input" value="{{$nav['order']}}">
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
