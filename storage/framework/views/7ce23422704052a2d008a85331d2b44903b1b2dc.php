<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>应用程序名称-<?php echo $__env->yieldContent('title'); ?></title>
	<link rel="stylesheet" type="text/css" href="/css/app.css" >
	<script type="text/javascript" src="/js/app.js" ></script>
</head>

<body>
	<?php $__env->startSection('sidebar'); ?>
		<!-- 这是组布局的侧边栏。 -->
	<?php echo $__env->yieldSection(); ?>
	<div class="container"> 
		<?php echo $__env->yieldContent('content'); ?>
	</div>
</body>
</html>