<?php $__env->startSection('title','管理后台-用户列表'); ?>

<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
      <h2><i class="fa fa-home"></i> 用户列表 <span>Subtitle goes here...</span></h2>
      <div class="breadcrumb-wrapper">
      </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row" id="list">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary  mb30">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>头像</th>
                        <th>用户名</th>
                        <th>是否超管</th>
                        <th>状态</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                      	<td><?php echo e($user->id); ?></td>
                      	<td><image src="<?php echo e($user->image_url); ?>" style="width:60px;border:#d4d4d4 1px solid;"></td>
                        
                      	<td><?php echo e($user->username); ?></td>
                      	<td><?php echo e($user->is_super == 1 ? "否" : "是"); ?></td>
                      	<td><?php echo e($user->status == 1 ? "正常" : "禁用"); ?></td>
                      	<td><a class="btn btn-sm btn-success" href="<?php echo e(route('admin.user.edit',['id'=>$user->id])); ?>">修改</a>&nbsp;&nbsp;
                      	<a class="btn btn-sm btn-danger" href="<?php echo e('/admin/user/del/'.$user->id); ?>">删除</a></td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($list->links()); ?>

            </div><!-- table-responsive -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>