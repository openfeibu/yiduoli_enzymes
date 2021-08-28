<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('product_category')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">* 上级</label>

                        <div class="layui-input-block">
                            <select name="parent_id" id="parent_id" lay-filter="parent_id">
                                <option value="0">顶级</option>
                                @inject('productCategoryRepository','App\Repositories\Eloquent\ProductCategoryRepository')
                                @foreach($productCategoryRepository->getCategories() as $key => $cat)
                                    <option value="{{ $cat['id'] }}">{!! $cat['name'] !!}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <!--
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">批量标志</label>

                        <div class="layui-input-block">
                            <input type="checkbox" name="split[/]" title="/" checked>
                        </div>
                        <div class="layui-form-mid layui-word-aux">不勾选该字段，批量换行</div>
                    </div>
                    -->
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">* {{ trans('product_category.label.name') }}</label>
                        <div class="layui-input-block">
                            <textarea name="categories" placeholder="" class="layui-textarea"></textarea>
                        </div>

                        <div class="layui-form-mid layui-word-aux">批量（/或换行）</div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">{{ trans('product_category.label.en_name') }}</label>
                        <div class="layui-input-block">
                            <textarea name="en_categories" placeholder="" class="layui-textarea"></textarea>
                        </div>

                        <div class="layui-form-mid layui-word-aux">批量（/或换行）</div>
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
                            <textarea name="description" placeholder="" class="layui-textarea"></textarea>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input" lay-verify="number"  value="0">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-submit" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    layui.use(['jquery','element'], function() {
        var form = layui.form;
        var $ = layui.$;

        $(document).ready(function(){
            $("#parent_id").val("{{ $parent_id }}");
            form.render('select','parent_id');
        })

    })
</script>