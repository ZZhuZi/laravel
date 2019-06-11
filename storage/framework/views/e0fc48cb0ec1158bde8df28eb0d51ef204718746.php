<?php $__env->startSection('title','管理后台-小说章节列表'); ?>

<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
      <h2><i class="fa fa-home"></i> 小说章节列表 <span>Subtitle goes here...</span></h2>
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
                        <th>小说名字</th>
                         <th>章节名字</th>
                         <th>排序</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($chapter_list)): ?>
                        <?php $__currentLoopData = $chapter_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                          <td><?php echo e($chapter['id']); ?></td>
                          <td><?php echo e($chapter['name']); ?></td>
                          <td><?php echo e($chapter['title']); ?></td>
                          <td><?php echo e($chapter['sort']); ?></td>
                          <td>
                          	 <a href="<?php echo e(route('admin.novel.chapter.edit',['id'=>$chapter['id']])); ?>" class="btn btn-sm btn-danger">编辑</a>&nbsp;&nbsp;
                             <a href="<?php echo e(route('admin.novel.chapter.del',['id'=>$chapter['id']])); ?>" class="btn btn-sm btn-danger">删除</a>
                          </td>
                         </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <?php endif; ?>
                    	
                    </tbody>
                </table>
                <?php echo e($chapter_list->links()); ?>

            </div><!-- table-responsive -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>