<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>签到页面</title>
	<link rel="stylesheet" href="/css/app.css">
	<script type="text/javascript" src="/js/app.js" ></script>
</head>
<body>
<div id="app">
	<button v-on:click="doSign">今日签到</button><span v-if="show">今日签到获取积分</span>
	<br><br>
	<table cellspacing="0" width="500" border="1">
		<tr>
			<th>总计签到</th>
			<th>最近连续签到</th>
			<th>获取积分</th>
		</tr>
		@foreach($list as $k =>$v)
		<tr>
			<td>{{$v->total_days}}</td>
			<td>{{$v->c_days}}</td>
			<td>{{$v->total_score}}</td>
		</tr>
		@endforeach
	</table>
	
</div>	
<script type="text/javascript">
	var app = new Vue({
		
	})
	
</script>
</body>
</html>