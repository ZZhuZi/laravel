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
		<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($v->total_days); ?></td>
			<td><?php echo e($v->c_days); ?></td>
			<td><?php echo e($v->total_score); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
	
</div>	
<script type="text/javascript">
	var app = new Vue({
		
	})
	
</script>
</body>
</html>