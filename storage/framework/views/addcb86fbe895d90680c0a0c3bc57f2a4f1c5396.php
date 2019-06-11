<?php $__env->startSection('title','管理后台会员列表'); ?>


<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 会员列表 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row" id="goods_list">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary  mb30">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>头像</th>
                        <th>手机号</th>
                        <th>用户名</th>
                        <th>账户积分</th>
                        <th>账户余额</th>
                        <th>用户状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php if(!empty($members)): ?>
                  <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($mem->id); ?></td>
                        <td><img  style="width:60px;" src="<?php echo e($mem->image_url!="" ? $mem->image_url : '/images/photos/media2.png'); ?>"></td>
                        <td><?php echo e($mem->phone); ?></td>
                        <td><?php echo e($mem->username); ?></td>
                        <td><?php echo e($mem->score); ?></td>
                        <td><?php echo e($mem->balance); ?></td>
                        <td><?php echo e($mem->status ==1 ? "未激活" : "正常"); ?></td>
                        <td>
                            <a class="btn btn-sm btn-success" href="/admin/member/detail/<?php echo e($mem->id); ?>">查看详情
                            </a>
                        </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($members->links()); ?>

            </div><!-- table-responsive -->
        </div>
    </div>
    <script src="/js/vue.js"></script>
    <script type="text/javascript">
        var goods_list = new Vue({
            el: "#goods_list",
            delimiters: ['{','}'],
            data: {
                goods_list: [],
            },
            //构造函数
            created:function(){
            },
            methods: {
                //商品列表
                getGoodsList: function(){
                    var that = this;
                    $.ajax({
                        url: "/goods/get/data",
                        type: "post",
                        data: {_token: $("input[name=_token"]).val()},
                        dataType:"json",
                        success: function(res){
                        }
                    })
                },
                //修改商品属性
                changeAttr: function(id,key,val){
                    var that = this;
                    $.ajax({
                        url: "/goods/change/attr",
                        type: "post",
                        data: {_token: $("input[name=_token"]).val()},
                        dataType:"json",
                        success: function(res){
                        }
                    })
                },
                //执行删除的操作
                goodsDel:function(id){
                    var that = this;
                    $.ajax({
                        url: "/goods/del/"+id,
                        type: "post",
                        data: {_token: $("input[name=_token"]).val()},
                        dataType:"json",
                        success: function(res){
                        }
                    })
                }
            }
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>