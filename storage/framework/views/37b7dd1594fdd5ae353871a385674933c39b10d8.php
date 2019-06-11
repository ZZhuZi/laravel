<?php $__env->startSection('title','管理后台红包发送记录'); ?>


<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 红包发送记录 <span>Subtitle goes here...</span></h2>
        
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
                        <th>用户名</th>
                        <th >用户手机</th>
                        <th>红包名称</th>
                        <th>红包发送时间</th>
                        <th>使用截至时间</th>
                        <th>状态</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php if(!empty($user_bonus)): ?>
                 <?php $__currentLoopData = $user_bonus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bonus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($bonus->id); ?></td>
                        <td><?php echo e($bonus->username); ?></td>
                        <td><?php echo e($bonus->phone); ?></td>
                        <td><?php echo e($bonus->bonus_name); ?></td>
                        <td><?php echo e($bonus->start_time); ?></td>
                        <td><?php echo e($bonus->end_time); ?></td>
                        <td>
                            <?php if($bonus->status == 1): ?> 
                            未使用
                            <?php elseif($bonus->status == 2): ?> 
                             已使用 
                            <?php else: ?> 
                             已过期 
                            <?php endif; ?>
                        </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($user_bonus->links()); ?>

            </div><!-- table-responsive -->
        </div>
    </div>
    <script src="/js/vue.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>