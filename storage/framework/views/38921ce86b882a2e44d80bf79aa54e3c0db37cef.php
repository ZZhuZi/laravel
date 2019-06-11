<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生表</title>
	<link rel="stylesheet" href="/css/app.css" type="text/css">
	
</head>
<body>
	<table border="1" cellspacing="0" width="500">
	<thead>
		<th>ID</th>
		<th>学号</th>
		<th>姓名</th>
		<th>课程</th>
		<th>分数</th>
	</thead>
	<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($v->id); ?></td>
		<td><?php echo e($v->stu_no); ?></td>
		<td><?php echo e($v->name); ?></td>
		<td><?php echo e($v->course); ?></td>
		<td><?php echo e($v->score); ?></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php echo e($list->links()); ?>

</body>
</html>