<?php $__env->startSection('title','管理后台-角色列表'); ?>

<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
	<h2><i class="fa fa-home"></i>角色列表<span>Subtitle goes here ...</span></h2>
	<div class="breadcrumb-wrapper"></div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row" id="list">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-primary mb30">
				<tr>
					<th>ID</th>
					<th>角色名字</th>
					<th>角色描述</th>
					<th>操作</th>
				</tr>
				<tbody>
				<?php if(!empty($role_list)): ?>
					<?php $__currentLoopData = $role_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($role['id']); ?></td>
						<td><?php echo e($role['role_name']); ?></td>
						<td><?php echo e($role['role_desc']); ?></td>
						<td><a href="<?php echo e(route('admin.role.edit',['id'=>$role['id'] ])); ?>">修改</a>
						<a href="<?php echo e(route('admin.role.permission',['id'=>$role['id'] ])); ?>">权限</a>
						<a href="<?php echo e(route('admin.role.del',['id'=>$role['id'] ])); ?>">删除</a>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
		
	</div>
	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>