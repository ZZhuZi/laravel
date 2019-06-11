<?php $__env->startSection('title','管理后台广告列表'); ?>


<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 广告列表 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <a class="btn btn-sm btn-danger" href="/admin/ad/add">+ 添加广告</a>
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
                        <th>广告图片</th>
                        <th>广告位</th>
                        <th>广告名字</th>
                        <th>广告地址</th>
                        <th>开始时间</th>
                        <th>结束时间</th>
                        <th>点击数</th>
                        <th>是否可用</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($list)): ?>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($value->id); ?></td>
                        <td><img src="<?php echo e($value->image_url); ?>" style="width:50px;"></td>
                        <td><?php echo e($value->position_name); ?></td>
                        <td><?php echo e($value->ad_name); ?></td>
                        <td><?php echo e($value->ad_link); ?></td>
                        <td><?php echo e($value->start_time); ?></td>
                        <td><?php echo e($value->end_time); ?></td>
                        <td><?php echo e($value->clicks); ?></td>
                        <td><?php echo e($value->status == 1 ? "开启" : "关闭"); ?></td>
                        <td>
                            <a class="btn btn-sm btn-success" href="/admin/ad/edit/<?php echo e($value->id); ?>">编辑</a>
                            <a class="btn btn-sm btn-danger"  href="/admin/ad/del/<?php echo e($value->id); ?>">删除</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($list->links()); ?>

            </div><!-- table-responsive -->
        </div>
    </div>
    <script src="/js/vue.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>