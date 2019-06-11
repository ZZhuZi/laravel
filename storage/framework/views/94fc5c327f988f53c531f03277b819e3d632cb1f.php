<?php $__env->startSection('title','管理后台-作者列表'); ?>

<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
	<h2><i class="fa fa-home"></i>作者列表<span>Subtitle goes here ...</span></h2>
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
					<th>作者名字</th>
					<th>作者描述</th>
					<th>操作</th>
				</tr>
				<tbody>
				<?php if(!empty($authors)): ?>
					<?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($author['id']); ?></td>
						<td><?php echo e($author['author_name']); ?></td>
						<td><?php echo e($author['author_desc']); ?></td>
						<td>
						<a href="<?php echo e(route('admin.author.del',['id'=>$author['id'] ])); ?>">删除</a>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				</tbody>
				<?php echo e($authors->links()); ?>

			</table>
		</div>
		
	</div>
	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>