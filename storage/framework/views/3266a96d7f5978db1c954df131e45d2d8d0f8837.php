<?php $__env->startSection('title','管理后台-小说列表'); ?>

<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
      <h2><i class="fa fa-home"></i> 小说列表 <span>Subtitle goes here...</span></h2>
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
                        <th>分类</th>
                         <th>作者</th>
                         <th>封面</th>
                        <th>小说名字</th>
                         <th>状态</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($novels)): ?>
                        <?php $__currentLoopData = $novels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $novel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                          <td><?php echo e($novel['id']); ?></td>
                          <td><?php echo e($novel['c_name']); ?></td>
                          <td><?php echo e($novel['author_name']); ?></td>
                          <td><img src="<?php echo e($novel['image_url']); ?>" style="width: 60px;"></td>
                          <td><?php echo e($novel['name']); ?></td>
                          <td><?php echo e($novel['status'] == 1 ? "连载": "完结"); ?></td>
                          <td>
                             <a href="<?php echo e(route('admin.novel.edit',['id'=>$novel['id']])); ?>" class="btn btn-sm btn-primary">编辑</a>&nbsp;&nbsp;
                              <a href="<?php echo e(route('admin.novel.chapter.create',['id'=>$novel['id']])); ?>" class="btn btn-sm btn-success">章节添加</a>&nbsp;&nbsp;
                               <a href="<?php echo e(route('admin.novel.chapter.list',['id'=>$novel['id']])); ?>" class="btn btn-sm btn-success">章节查看</a>&nbsp;&nbsp;
                            <a href="<?php echo e(route('admin.novel.del',['id'=>$novel['id']])); ?>" class="btn btn-sm btn-danger">删除</a>
                          </td>
                         </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <?php endif; ?>
                      
                    </tbody>
                </table>
                <?php echo e($novels->links()); ?>

            </div><!-- table-responsive -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>