<?php $__env->startSection('title','管理后台-商品属性编辑'); ?>

<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 商品属性编辑 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('msg')): ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo e(session('msg')); ?>

        </div>
    <?php endif; ?>
    <div class="alert alert-danger" id="alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span id="error_msg"></span>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-btns">
                <a href="" class="panel-close">&times;</a>
                <a href="" class="minimize">&minus;</a>
            </div>

            <h4 class="panel-title">商品属性编辑</h4>
        </div>
        <div class="panel-body panel-body-nopadding" id="attr_add">
            <input type="hidden" id="input_type" value="<?php echo e($info->input_type); ?>">
            <form class="form-horizontal form-bordered" action="/admin/goods/attr/doEdit" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="<?php echo e($info->id); ?>">
                 <div class="form-group">
                    <label class="col-sm-3 control-label">属性名称</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="属性名称" class="form-control" name="attr_name" value="<?php echo e($info->attr_name); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">商品类型</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="cate_id">
                           <?php if(!empty($type_list)): ?>
                            <?php $__currentLoopData = $type_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type['id']); ?>" <?php echo e($info->cate_id == $type['id'] ? 'selected' :""); ?> ><?php echo e($type['type_name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">输入方式</label>
                    <div class="col-sm-6">
                        <div class="radio"><label><input @click="changeType" data-id="1" type="radio" name="input_type" value="1" <?php echo e($info->input_type == 1 ? 'checked' :""); ?>> 手动录入</label></div>
                        <div class="radio"><label><input @click="changeType" data-id="2" type="radio" name="input_type" value="2" <?php echo e($info->input_type == 2 ? 'checked' :""); ?> >从列表中选择</label></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">可选值列表</label>
                    <div class="col-sm-6">
                       <textarea class="form-control" rows="5" name="attr_value" v-if="input_type==1" disabled><?php echo e($info->attr_value); ?></textarea>
                        <textarea class="form-control" rows="5" name="attr_value" v-else> <?php echo e($info->attr_value); ?> </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">是否可用</label>
                    <div class="col-sm-6">
                        <div class="radio"><label><input type="radio" name="status" value="1" checked> 可用</label></div>
                        <div class="radio"><label><input type="radio" name="status" value="2" >禁用</label></div>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button class="btn btn-primary btn-danger" id="btn-save">保存分类</button>&nbsp;
                        </div>
                    </div>
                </div><!-- panel-footer -->
            </form>

        </div><!-- panel-body -->

        <script type="text/javascript" src="/js/vue.js"></script>
        <script type="text/javascript">
            //实例化vue
            var attr = new Vue({
                el: "#attr_add",
                delimiters: ['{','}'],
                data: {
                    input_type: 1,
                },
                created: function(){
                    this.input_type=$("#input_type").val();
                },
                methods: {
                    //切换输入方式
                    changeType: function(e){
                        this.input_type = e.target.dataset.id;
                    }
                }
            });
            $("#alert-danger").hide();
            $("#btn-save").click(function(){
                var attr_name = $("input[name=attr_name]").val();
                if(attr_name == ''){
                    $("#error_msg").text('属性名称不能为空');
                    $("#alert-danger").toggle();
                    return false;
                }
            });
        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>