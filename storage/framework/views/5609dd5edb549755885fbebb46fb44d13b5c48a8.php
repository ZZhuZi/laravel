<?php $__env->startSection('title','管理后台-用户编辑'); ?>

<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
	<h2><i class="fa fa-home"></i>用户编辑<span>Subtitle goes here ...</span></h2>
	<div class="breadcrumb-wrapper"></div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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

          <h4 class="panel-title">用户编辑</h4>
        </div>
        <div class="panel-body panel-body-nopadding">

          <form class="form-horizontal form-bordered" action="<?php echo e(route('admin.user.doEdit')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name='id' value="<?php echo e($user->id); ?>">

            <div class="form-group">
              <label class="col-sm-3 control-label">用户角色</label>
              <div class="col-sm-6">
              <select name="user_id" class="form-control" id="">
                <?php if(!empty($roles)): ?>
                  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($role['id']); ?>" <?php if($role_id == $role['id']): ?> selected <?php endif; ?>><?php echo e($role['role_name']); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </select>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-3 control-label">用户名</label>
              <div class="col-sm-6">
                <input type="text" placeholder=" 用户名" class="form-control" name="username" value="<?php echo e($user->username); ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">用户头像</label>
              <div class="col-sm-6">
                <input type="file" placeholder=" 用户头像" class="form-control" name="image_url" /><img src="<?php echo e($user->image_url); ?>" style="width :50px;" alt="">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-3 control-label" >是否超管</label>
              <div class="col-sm-6">
              <div class="radio"><label for=""><input type="radio" name="is_super" value="1" <?php if($user->is_super == 1): ?> checked <?php endif; ?>> 否</label></div>
              <div class="radio"><label for=""><input type="radio" name="is_super" value="2" <?php if($user->is_super == 2): ?>  <?php endif; ?>> 是</label></div>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label" >用户状态</label>
              <div class="col-sm-6">
              <div class="radio"><label for=""><input type="radio" name="status" value="1" <?php if($user->is_super == 1): ?> checked <?php endif; ?>> 正常</label></div>
              <div class="radio"><label for=""><input type="radio" name="status" value="2" <?php if($user->is_super == 2): ?>  <?php endif; ?>> 禁用</label></div>
              </div>
            </div>
           
            <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				  <button class="btn btn-primary btn-danger" id="btn-save">修改用户</button>&nbsp;
				</div>
			 </div>
		  </div><!-- panel-footer -->
          </form>
          
        </div><!-- panel-body -->
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>