<?php $__env->startSection('title','管理后台-角色添加'); ?>

<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
      <h2><i class="fa fa-home"></i> 角色添加 <span>Subtitle goes here...</span></h2>
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

          <h4 class="panel-title">角色添加表单</h4>
        </div>
        <div class="panel-body panel-body-nopadding">

          <form class="form-horizontal form-bordered" action="<?php echo e(route('admin.role.store')); ?>" method="post">
            <?php echo e(csrf_field()); ?>


            <div class="form-group">
              <label class="col-sm-3 control-label">角色名字</label>
              <div class="col-sm-6">
                <input type="text" placeholder="角色名字" class="form-control" name="role_name" value="<?php echo e(isset($role->role_name) ? $role->role_name : null); ?>" />
              </div>
            </div> 
            <div class="form-group">
              <label class="col-sm-3 control-label">角色描述</label>
              <div class="col-sm-6">
                <input type="text" placeholder="角色描述" class="form-control" name="role_desc" value="<?php echo e(isset($role->role_desc) ? $role->role_desc : null); ?>"/>
              </div>
            </div> 
           
            <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				  <button class="btn btn-primary btn-danger" id="btn-save">保存角色</button>&nbsp;
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