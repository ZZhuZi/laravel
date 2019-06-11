<?php $__env->startSection('title','管理后台-广告位编辑'); ?>

<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 广告位编辑 <span>Subtitle goes here...</span></h2>
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

            <h4 class="panel-title">广告位编辑表单</h4>
        </div>
        <div class="panel-body panel-body-nopadding">

            <form class="form-horizontal form-bordered" action="/admin/position/doEdit" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="<?php echo e($info->id); ?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label">广告位名称</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="广告名称" class="form-control" name="position_name" value="<?php echo e($info->position_name); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">广告位描述</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="3" name="position_desc"><?php echo e($info->position_desc); ?></textarea>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button class="btn btn-primary btn-danger" id="btn-save">保存广告位</button>&nbsp;
                        </div>
                    </div>
                </div><!-- panel-footer -->
            </form>

        </div><!-- panel-body -->
        <script type="text/javascript">

            $(".alert-danger").hide();

            $("#btn-save").click(function(){

                var position_name = $("input[name=position_name]").val();

                if(position_name == ''){
                    $("#error_msg").text('广告位名称不能为空');
                    $(".alert-danger").show();
                    return false;
                }

            });
        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>