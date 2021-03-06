<?php $__env->startSection('title','管理后台-权限列表'); ?>

<?php $__env->startSection('pageHeader'); ?>
<div class="pageheader">
	<h2><i class="fa fa-home"></i>权限列表<span>Subtitle goes here ...</span></h2>
	<div class="breadcrumb-wrapper"></div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php echo e(csrf_field()); ?>

<div class="row" id="list">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-primary mb30">
				<tr>
					<th>ID</th>
					<th>权限名字</th>
					<th>URL地址</th>
					<th>是否显示</th>
					<th>排序</th>
					<th>操作</th>
				</tr>
				<tbody>
					<tr v-for="permission in permission_list">
						<td>{permission.id}</td>
						<td>{permission.name}</td>
						<td>{permission.url}</td>
						<td>{permission.is_menu==1 ? '是' : '否'}</td>
						<td>{permission.sort}</td>
						<td>
							<button class="btn btn-sm btn-danger" v-on:click="getPermissionList(permission.id)">查看子集</button>
							<button class="btn btn-sm btn-danger" v-if="permission.fid>0" v-on:click="getPermissionList()">返回</button>
							<button class="btn btn-sm btn-danger" v-on:click="delRecord(permission.id)">删除</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
	
</div>

<script type="text/javascript" src="/RBAC/js/vue.js"></script>
<script type="text/javascript" >
	var list = new Vue({
		el:"#list",
		delimiters:['{','}'],
		data:{permission_list:[]},
		created:function(){
			this.getPermissionList();
		},
		methods:{
			//获取权限列表
			getPermissionList:function(fid = 0){
				var that = this;
				var token = $("input[name=_token]").val();
				$.ajax({
					url:'/admin/get/permission/list/'+fid,
					type:'post',
					data:{_token:token},
					dataType:'json',
					success:function(res){
						if(res.code == 2000){
							that.permission_list = res.data;
						}
					},
					error:function(res){

					}
				})
			},
			delRecord:function(id){
				var that = this;
				$.ajax({
					url:'/admin/permission/del'+id,
					type:'get',
					data:{},
					dataType:'json',
					success:function(res){
						if(res.code == 2000){
							that.getPermissionList();
						}
					},
					error:function(res){

					}
				})
			}
		}

	})
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>