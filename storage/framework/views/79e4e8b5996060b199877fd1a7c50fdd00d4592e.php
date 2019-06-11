<?php $__env->startSection('title','管理后台红包列表'); ?>


<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 红包列表 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <a class="btn btn-sm btn-danger" href="/admin/bonus/add">+ 添加红包</a>
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
                        <th>红包名字</th>
                        <th >红包金额</th>
                        <th>使用条件</th>
                        <th>有效天数</th>
                        <th>发送开始日期</th>
                        <th>发送结束日期</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php if(!empty($bonus_list)): ?>
                 <?php $__currentLoopData = $bonus_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bonus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($bonus->id); ?></td>
                        <td><?php echo e($bonus->bonus_name); ?></td>
                        <td><?php echo e($bonus->money); ?></td>
                        <td>满<?php echo e($bonus->min_money); ?>元可用</td>
                        <td><?php echo e($bonus->expires); ?></td>
                        <td><?php echo e($bonus->send_start_date); ?></td>
                        <td><?php echo e($bonus->send_end_date); ?></td>
                        <td><?php echo e($bonus->status == 1 ?'可用':'不可用'); ?></td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="/admin/bonus/send/<?php echo e($bonus->id); ?>">发红包</a>
                            <!-- <a class="btn btn-sm btn-success" href="/admin/ad/edit">编辑</a> -->
                            <a class="btn btn-sm btn-danger">删除</a>
                        </td>
                    </tr>
                    <?php echo e($bonus_list->links()); ?>

                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                    </tbody>
                </table>
            </div><!-- table-responsive -->
        </div>
    </div>
    <script src="/js/vue.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>