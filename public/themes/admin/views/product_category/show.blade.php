<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('product_category/'.$product_category->id)}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">上级</label>

                        <div class="layui-input-block">
                            <p class="input-p">{{ $product_category->parent_names ?? '顶级' }}</p>
                        </div>

                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">* {{ trans('product_category.label.name') }}</label>

                        <div class="layui-input-block">
                            <input type="text" name="name" lay-verify="required" autocomplete="off" class="layui-input" value="{{$product_category->name}}">
                        </div>

                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">{{ trans('product_category.label.en_name') }}</label>

                        <div class="layui-input-block">
                            <input type="text" name="en_name" lay-verify="required" autocomplete="off" class="layui-input" value="{{$product_category->en_name}}">
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.image') }} <br>(343 X 252)</label>
                        {!! $product_category->files('image')
                        ->url($product_category->getUploadUrl('image'))
                        ->uploader()!!}

                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">{{ trans('app.description') }}</label>
                        <div class="layui-input-block">
                            <textarea name="description" placeholder="" class="layui-textarea">{!!  $product_category->description !!}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input" lay-verify="number"  value="{{$product_category->order}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"> {{ trans('product_category.label.total_order') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="total_order" autocomplete="off" placeholder="" class="layui-input" lay-verify="number" value="{{$product_category->total_order}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-submit" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>
<script>

</script>