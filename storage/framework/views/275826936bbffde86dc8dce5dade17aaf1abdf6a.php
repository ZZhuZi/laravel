<?php $__env->startSection('title','管理后台-分类列表'); ?>

<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
	<h2><i class="fa fa-home"></i>分类列表<span>Subtitle goes here ...</span></h2>
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
					<th>分类名字</th>
					<th>操作</th>
				</tr>
				<tbody>
				<?php if(!empty($categorys)): ?>
					<?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($category['id']); ?></td>
						<td><?php echo e($category['c_name']); ?></td>
						<td>
					
						<a href="<?php echo e(route('admin.novel.category.del',['id'=>$category['id'] ])); ?>">删除</a>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				</tbody>
				
			</table>
			<?php echo e($categorys->links()); ?>

		</div>
		
	</div>
	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>