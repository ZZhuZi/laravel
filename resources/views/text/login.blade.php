<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
</head>
<body>
	<div id="login">
	   <form action="/admin/text/index" type="post">
		{{csrf_field()}}

			用户名：<input type="text" name="name"><br>
			密&nbsp;&nbsp;码: <input type="text" name="password"><br>
			<button @click="login">登录</button>
		</form>
	</div>
	<script type="text/javascript" src="/js/vue.js"></script>
	<script type="text/javascript">
		var login = new Vue({
			el : "#login",
			delimiters:['{','}'],
			create:function(){
				this.check_token();
			},
			methods:{
				login:function(){
					var name = $("input[name=name]").val();
					var password = $("input[name=password]").val();
					var token = $("input[name=_token]").val();
					var that = this;
					if(name == "" || password =""){
						alter "用户名密码均不能为空";
						return flase;
					}
					$.ajax({
						url:"http://http://www.laravel.com/admin/text/doLogin",
						type:"post",
						data:{name:name,password:password,_token:token},
						dataType:'json',
						success:function(res){
							if(res.code == 2000){
								that.token = res.data;
								alter(res.data);
								window.localStorage.setItem('token',res.data);
								window.localtion.href="/admin/text/index";
							}else{
								that.error_msg = res,msg;
								alter(res.data);
								return false; 
							}
						},
						error:function(res){

						}
					});
				},
				check_token:function(){
					var token = window.localStorage.getItem('token');
					$.ajax({
						url:"http://www.laravel.com/admin/text/checkedToken",
						type:"post",
						data:{token:token},
						dataType:"json",
						success:function(res){
							if(res.code == 2000){
								window.localtion.href = "/admin/text/index"
							}else{
								return false;
							}
						}
					})
				},
			}


		});
	</script>

</body>
</html>