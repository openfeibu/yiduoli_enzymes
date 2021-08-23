
<div class="layui-input-block">
    <div id="upload_file_content_<?php echo $field; ?>">
        <button type="button" class="layui-btn layui-btn-normal" id="uploadFile_<?php echo $field; ?>">选择文件</button>
        <button type="button" class="layui-btn" id="uploadFile_action_<?php echo $field; ?>">开始上传</button>
        <?php if($files): ?>
            <a type="button" class="layui-btn" href="<?php echo url("/image/download".$files['path']); ?>" id="file_<?php echo $field; ?>"><?php echo e(trans('app.download')); ?></a>
        <?php else: ?>
            <a type="button" class="layui-btn" href="" style="display: none" id="file_<?php echo $field; ?>"><?php echo e(trans('app.download')); ?></a>
        <?php endif; ?>

    </div>
    <?php if(isset($exts) && $exts): ?>
        <div class="layui-form-mid layui-word-aux">格式要求：<?php echo e($exts); ?></div>
    <?php endif; ?>
</div>

<input type="hidden" name="<?php echo $field; ?>" id="path_<?php echo $field; ?>" value="<?php if($files): ?><?php echo e($files['path']); ?><?php endif; ?>"/>
<script>
    layui.use(['jquery','element','form','table','upload'], function(){
        var $ = layui.$;
        var form = layui.form;
        var upload = layui.upload;
        upload.render({
            elem: '#uploadFile_<?php echo $field; ?>'
            ,accept:'file'
            <?php if(isset($exts) && $exts): ?>,exts:'<?php echo e($exts); ?>' <?php endif; ?>
            ,url: '<?php echo $url; ?>'
            ,auto: false
            ,bindAction: '#uploadFile_action_<?php echo $field; ?>'
            ,data: {
                '_token':$('meta[name="csrf-token"]').attr('content')
            }
            ,before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。
                layer.load(); //上传loading
            }
            ,done: function(res, index, upload){
                console.log(res)
                layer.msg(res.message);
                layer.closeAll('loading'); //关闭loading
                if(res.code == 0)
                {
                    $("#path_<?php echo $field; ?>").val(res.data.path);
                    $('#file_<?php echo $field; ?>').show().attr('href', res.data.url);
                }
            }
            ,error: function(index, upload){
                layer.closeAll('loading'); //关闭loading
            }
        });
    });
</script>