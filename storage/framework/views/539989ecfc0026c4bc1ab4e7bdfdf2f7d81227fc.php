<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>竞猜结果</title>
</head>
<body>
	<div>
		 <table style="width: 100%; border: #d4d4d4 1px solid">
            <tr><td style="width: 300px;text-align: center;font-weight: bold;">查看结果</td></tr>
            <tr><td style="width: 300px;text-align: center;">对阵结果: 
             <?php echo e($info['team_a']); ?> 
             <font color="#ff0000"><?php if($info['result'] == 1): ?> 胜 <?php elseif($info['result'] == 2): ?> 平 <?php else: ?> 负 <?php endif; ?> </font>
             <?php echo e($info['team_b']); ?> 
         </td></tr>
            <?php if(!empty($first)): ?>
            <tr><td style="width: 300px;text-align: center;">您的竞猜:
            <?php echo e($info['team_a']); ?> 
             <font color="#ff0000"><?php if($first->g_result == 1): ?> 胜 <?php elseif($first->g_result == 2): ?> 平 <?php else: ?> 负 <?php endif; ?> </font>
             <?php echo e($info['team_b']); ?> 
            </td></tr>
            <tr>
            <td style="width: 300px;text-align: center;">结果:
                <?php if($first->g_result == $info['result']): ?> 恭喜您猜中啦 <?php else: ?> 很抱歉没猜中 <?php endif; ?>
            </td>
            </tr>
            <?php else: ?>
            <tr>
            <td style="width: 300px;text-align: center;">结果: 您没有参与竞猜
            </td>
            </tr>
            <?php endif; ?>
        </table>
	</div>
</body>
</html>