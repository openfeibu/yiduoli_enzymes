<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('question/'.$question->id)}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('question.label.question') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="question" lay-verify="required" autocomplete="off" placeholder="请输入{{ trans('question.label.question') }}" class="layui-input" value="{{ $question->question }}">
                        </div>
                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">{{ trans('question.label.answer') }}</label>
                        <div class="layui-input-block">
                            <textarea name="answer" class="layui-textarea">{{ $question->answer }}</textarea>
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


