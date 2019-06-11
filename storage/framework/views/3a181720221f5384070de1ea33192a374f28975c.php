<?php $__env->startSection('title','管理后台地区列表'); ?>


<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 地区列表 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <a class="btn btn-sm btn-danger" href="/admin/region/list">返回顶级</a>
            <a class="btn btn-sm btn-danger" href="/admin/region/add">+ 添加地区</a>

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
                        <th>地区名称</th>
                        <th>级别</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($region_list)): ?>
                    <?php $__currentLoopData = $region_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($region['id']); ?></td>
                        <td><?php echo e($region['region_name']); ?></td>
                        <td><?php echo e($region['level']); ?></td>
         
                        <td>
                            <a class="btn btn-sm btn-primary" href="/admin/region/list/<?php echo e($region['id']); ?>">查看子级</a>
                            <a class="btn btn-sm btn-success" href="/admin/region/edit">编辑</a>
                            <a class="btn btn-sm btn-danger" href="/admin/region/del/<?php echo e($region['id']); ?>">删除</a>
                        </td>
                    </tr>
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