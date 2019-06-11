<?php $__env->startSection('title','管理后台商品类型'); ?>


<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 商品类型 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <a class="btn btn-sm btn-danger" href="/admin/goods/type/add">+ 商品类型</a>
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
                        <th>属性名称</th>
                        <th>状态</th>
                        <th class="col-md-3">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($list)): ?>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($type['id']); ?></td>
                        <td><?php echo e($type['type_name']); ?></td>
                        <td ><?php echo e($type['status'] == 1 ? '可用' : '禁用'); ?></td>
                        <td class="col-md-3">
                            <a class="btn btn-sm btn-success"  href="/admin/goods/attr/list/<?php echo e($type['id']); ?>" >查看属性</a>&nbsp;
                            <a class="btn btn-sm btn-warning" href="/admin/goods/type/edit/<?php echo e($type['id']); ?>">编辑</a>&nbsp;
                            <a class="btn btn-sm btn-danger" href="/admin/goods/type/del/<?php echo e($type['id']); ?>">删除</a>&nbsp;
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div><!-- table
            -responsive -->
        </div>
    </div>
    <script src="/js/vue.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>