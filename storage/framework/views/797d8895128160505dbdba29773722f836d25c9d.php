<?php $__env->startSection('title','管理后台-广告编辑'); ?>

<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 广告编辑 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('msg')): ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo e(session('msg')); ?>

        </div>
    <?php endif; ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span id="error_msg"></span>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-btns">
                <a href="" class="panel-close">&times;</a>
                <a href="" class="minimize">&minus;</a>
            </div>

            <h4 class="panel-title">广告编辑表单</h4>
        </div>
        <div class="panel-body panel-body-nopadding">

            <form class="form-horizontal form-bordered" action="/admin/ad/doEdit" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="id" value="<?php echo e($info->id); ?>">

                <div class="form-group">
                    <label class="col-sm-3 control-label">广告位置</label>
                    <div class="col-sm-6">
                        <select class="form-control">
                            <?php if(!empty($position)): ?>
                                <?php $__currentLoopData = $position; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($p['id']); ?>" <?php if($info->position_id == $p['id']): ?> selected <?php endif; ?>><?php echo e($p['position_name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">图片地址</label>
                    <div class="col-sm-6">
                        <input type="file" placeholder="上传文件" class="form-control" name="image_url" value="" />
                        <img src="<?php echo e($info->image_url); ?>" style="width: 60px;" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">广告名称</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="广告名称" class="form-control" name="ad_name" value="<?php echo e($info->ad_name); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">链接地址</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="链接地址" class="form-control" name="ad_link" value="<?php echo e($info->ad_link); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">开始时间</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="开始时间" id="start_time" class="form-control" name="start_time" value="<?php echo e($info->start_time); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">结束时间</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="结束时间" class="form-control" id="end_time" name="end_time" value="<?php echo e($info->end_time); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">点击次数</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="点击次数" class="form-control" name="clicks" value="<?php echo e($info->clicks); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">状态</label>
                    <div class="col-sm-6">
                        <div class="radio"><label><input type="radio" name="status" value="1" <?php echo e($info->status == 1 ? 'checked' :''); ?>> 开启</label></div>
                        <div class="radio"><label><input type="radio" name="status" value="2" <?php echo e($info->status == 2 ? 'checked' :''); ?> >关闭</label></div>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button class="btn btn-primary btn-danger" id="btn-save">保存广告</button>&nbsp;
                        </div>
                    </div>
                </div><!-- panel-footer -->
            </form>

        </div><!-- panel-body -->
        <script type="text/javascript" src="/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="/js/datetimepicker/bootstrap-datetimepicker.zh-CN.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/datetimepicker/bootstrap-datetimepicker.min.css">
        <script type="text/javascript">
            $(".alert-danger").hide();
                $("#btn-save").click(function(){
                var image_url = $("input[name=image_url]").val();
                var ad_name = $("input[name=ad_name]").val();
                var ad_link = $("input[name=ad_link]").val();
                var start_time = $("input[name=start_time]").val();
                var end_time = $("input[name=end_time]").val();
                
                if(ad_name == ''){
                    $("#error_msg").text('广告名称不能为空');
                    $(".alert-danger").show();
                    return false;
                }
                if(ad_link == ''){
                    $("#error_msg").text('广告链接不能为空');
                    $(".alert-danger").show();
                    return false;
                }
                if(end_time == '' || start_time==''){
                    $("#error_msg").text('时间不能为空');
                    $(".alert-danger").show();
                    return false;
                }
                if(end_time < start_time){
                    $("#error_msg").text('结束时间不能小于开始时间');
                    $(".alert-danger").show();
                    return false;
                }
            });
            //开始日期
            $("#start_time,#end_time").datetimepicker({
                format: 'yyyy-mm-dd hh:ii:ss',
                autoclose: true,
                minView: 0,
                language:  'zh-CN',
                minuteStep:1
            });
        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>