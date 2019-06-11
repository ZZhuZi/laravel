<?php $__env->startSection('title','管理后台-用户添加'); ?>

<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
      <h2><i class="fa fa-home"></i> 用户添加 <span>Subtitle goes here...</span></h2>
      <div class="breadcrumb-wrapper">
      </div>
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

          <h4 class="panel-title">用户添加表单</h4>
        </div>
        <div class="panel-body panel-body-nopadding">

          <form class="form-horizontal form-bordered" action="<?php echo e(route('admin.user.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <div class="form-group">
              <label class="col-sm-3 control-label">用户角色</label>
              <div class="col-sm-6">
              	<select name="role_id" class="form-control" id="">
              	<?php if(!empty($roles)): ?>
              		<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              		<option value="<?php echo e($role['id']); ?>"><?php echo e($role['role_name']); ?></option>
              		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          	   	<?php endif; ?>
              </select>
              </div>
            </div> 
         
            <div class="form-group">
              <label class="col-sm-3 control-label">用户名</label>
              <div class="col-sm-6">
                <input type="text" placeholder="用户名" class="form-control" name="username" />
              </div>
            </div> 
            <div class="form-group">
              <label class="col-sm-3 control-label">用户密码</label>
              <div class="col-sm-6">
                <input type="text" placeholder="用户密码" class="form-control" name="password" />
              </div>
            </div> 
            <div class="form-group">
              <label class="col-sm-3 control-label">用户头像</label>
              <div class="col-sm-6">
                <input type="file" placeholder="用户头像" class="form-control" name="image_url" />
              </div>
            </div> 
            <div class="form-group">
              <label class="col-sm-3 control-label">是否超管</label>
              <div class="col-sm-6">
              <div class="radio"><label for=""><input type="radio" name="is_super" value="1" checked>否</label></div>
              <div class="radio"><label for=""><input type="radio" name="is_super" value="2" >是</label></div>

              </div>
            </div> 
            <div class="form-group">
              <label class="col-sm-3 control-label">用户状态</label>
              <div class="col-sm-6">
              <div class="radio"><label for=""><input type="radio" name="status" value="1" checked>正常</label></div>
              <div class="radio"><label for=""><input type="radio" name="status" value="2" >禁用</label></div>
              </div>
            </div> 
         
            <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				  <button class="btn btn-primary btn-danger" id="btn-save">添加用户</button>&nbsp;
				</div>
			 </div>
		  </div><!-- panel-footer -->
          </form>
          
        </div><!-- panel-body -->

        <script type="text/javascript">

        	$(".alert-danger").hide();

        	$("#btn-save").click(function(){

        		var name = $("input[name=name]").val();

        		var url = $("input[name=url]").val();

        		if(name == '' || url == ''){
        			$("#error_msg").text('名字或url地址不能为空');
        			$(".alert-danger").toggle();
        			return false;
        		}

        	});

        </script>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>