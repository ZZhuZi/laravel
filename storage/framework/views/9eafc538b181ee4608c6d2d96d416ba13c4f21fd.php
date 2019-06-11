<?php $__env->startSection('title','管理后台-小说添加'); ?>

<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
      <h2><i class="fa fa-home"></i> 小说添加 <span>Subtitle goes here...</span></h2>
      <div class="breadcrumb-wrapper">
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span id="error_msg"></span>
    </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>

          <h4 class="panel-title">小说添加表单</h4>
        </div>
        <div class="panel-body panel-body-nopadding">

          <form class="form-horizontal form-bordered" action="<?php echo e(route('admin.novel.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


             <div class="form-group">
              <label class="col-sm-3 control-label">小说分类</label>
              <div class="col-sm-6">
                <select name="c_id" class="form-control">
                  <?php if(!empty($c_list)): ?>
                    <?php $__currentLoopData = $c_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($cate['id']); ?>"><?php echo e($cate['c_name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </select>
              </div>
            </div> 

             <div class="form-group">
              <label class="col-sm-3 control-label">小说作者</label>
              <div class="col-sm-6">
                <select name="a_id" class="form-control">
                  <?php if(!empty($a_list)): ?>
                    <?php $__currentLoopData = $a_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($author['id']); ?>"><?php echo e($author['author_name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </select>
              </div>
            </div> 

            <div class="form-group">
              <label class="col-sm-3 control-label">小说标题</label>
              <div class="col-sm-6">
                <input type="text" placeholder="小说标题" class="form-control" name="name" value="" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">小说封面</label>
              <div class="col-sm-6">
                <input type="file" placeholder="用户头像" class="form-control" name="image_url" />
              </div>
            </div> 

            <div class="form-group">
              <label class="col-sm-3 control-label">小说标签</label>
              <div class="col-sm-6">
                <input type="text" placeholder="小说标签" class="form-control" name="tags" value="" />
              </div>
            </div> 

            <div class="form-group">
              <label class="col-sm-3 control-label">小说状态</label>
              <div class="col-sm-6">
               <div class="radio"><label><input type="radio" name="status" value="1" checked> 连载</label></div>
               <div class="radio"><label><input type="radio" name="status" value="2" >完结</label></div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">小说简介</label>
              <div class="col-sm-8">
                <textarea class="form-control" name="desc" style="border: none;" id="container"></textarea>
              </div>
            </div> 
           
            <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-primary btn-danger" id="btn-save">保存小说</button>&nbsp;
        </div>
       </div>
      </div><!-- panel-footer -->
          </form>
          
        </div><!-- panel-body -->
        <script type="text/javascript" src="/js/ueditor/ueditor.config.js"></script>
        <script type="text/javascript" src="/js/ueditor/ueditor.all.min.js"></script>
        <script type="text/javascript">
          var ue = UE.getEditor('container');
          $(".alert-danger").hide();
          $("#btn-save").click(function(){
            var name = $("input[name=name]").val();
            var url = $("input[name=url]").val();
            if(name == '' || url == ''){
              $("#error_msg").text('名字或url地址不能为空');
              $(".alert-danger").toggle();
              return false;
            }
          });
        </script>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>