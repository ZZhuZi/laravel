<?php $__env->startSection('title','管理后台批次列表'); ?>


<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 批次列表 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <a class="btn btn-sm btn-danger" href="/admin/batch/add">+ 批次列表</a>
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
                        <th class="col-md-2">文件路径</th>
                        <th>批次类型</th>
                        <th>内容</th>
                        <th>状态</th>
                        <th>备注</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>

                <?php if(!empty($batch_list)): ?>
                    <?php $__currentLoopData = $batch_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($batch->id); ?></td>
                        <td><?php echo e($batch->file_path); ?></td>
                        <td>
                            <?php if($batch->type == 1): ?>
                            发红包
                            <?php elseif($batch->type == 2): ?>
                            发短信
                            <?php else: ?> 
                            发邮件
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($batch->content); ?></td>
                        <td>
                            <?php if($batch->status == 1): ?>
                            未审核
                            <?php elseif($batch->status == 2): ?>
                            待处理
                            <?php else: ?> 
                            已处理
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($batch->note); ?></td>
                        <td>
                            <?php if($batch->status<=2): ?>
                            <a class="btn btn-sm btn-success" href="/admin/batch/do/<?php echo e($batch->id); ?>">执行</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($batch_list->links()); ?>

            </div><!-- table-responsive -->
        </div>
    </div>
    <script src="/js/vue.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>