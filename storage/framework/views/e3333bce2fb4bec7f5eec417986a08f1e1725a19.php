<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>竞猜列表页面</title>
</head>
<body>
	<div>
		<table style="width: 600px;" border="1">
        <thead><tr><th>球队</th><th>操作</th></tr></thead>
        <tbody style="text-align: center;">
            <?php if(!empty($list)): ?>
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="height: 35px;line-height: 35px;">
                <td><?php echo e($value['team_a']); ?> VS <?php echo e($value['team_b']); ?> <?php echo e(strtotime($value['end_at'])); ?>  - <?php echo e(time()); ?></td>
                <td>
                    <?php if(strtotime($value['end_at']) > time()): ?>
                        <a href="/study/guess/guess?id=<?php echo e($value['id']); ?>&user_id=<?php echo e($user_id); ?>">竞猜</a>
                    <?php else: ?>
                        <a href="/study/guess/result?id=<?php echo e($value['id']); ?>&user_id=<?php echo e($user_id); ?>">查看结果</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </tbody>
        
    </table>
	</div>
</body>
</html>