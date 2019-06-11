<?php $__env->startSection('title','管理后台-权限列表'); ?>

<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
	<h2><i class="fa fa-home"></i>权限列表<span>Subtitle goes here ...</span></h2>
	<div class="breadcrumb-wrapper"></div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php echo e(csrf_field()); ?>

<div class="row" id="list">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-primary mb30">
				<tr>
					<th>ID</th>
					<th>权限名字</th>
					<th>URL地址</th>
					<th>是否显示</th>
					<th>排序</th>
					<th>操作</th>
				</tr>
				<tbody>
				
				
				<?php if(!empty($list)): ?>
	           		 <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                      <tr>
		                      <td><?php echo e($value['id']); ?></td>
		                      <td><?php echo e($value['name']); ?></td>
		                      <td><?php echo e($value['url']); ?></td>
		                      <td><?php echo e($value['is_menu'] ==1 ? '是' : '否'); ?></td>
		                      <td><?php echo e($value['sort']); ?></td>

		                      <td>  </td>
		                     </tr>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            	<?php endif; ?>

				</tbody>
			</table>
		</div>
		<!-- <ul class="pagination">
		            上一页
		            <li v-if="page==1" class="disabled"><span>«</span></li>
		            <li v-else v-on:click="prevPage"><span>«</span></li>
		
		            <li v-for="num in total_page" v-on:click="currentPage(num)">
		                <span v-if="page == num" style="color:#ff0000;">{num}</span>
		                <span v-else >{num}</span>
		            </li>
		        
		            <li v-for v-if="page==num" ><a href="" class="active">{num}</a></li> 
		            <li  v-for="num in total_page" v-if="page!=num"><a href="">{num}</a></li> 
		            
		                   
		             下一页
		            <li v-if="page==total_page" class="disabled"><span>»</span></li>
		            <li v-else v-on:click="nextPage"><span>»</span></li>                         
		            
		        </ul> -->
		
	</div>
	
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>