<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我要竞猜</title>
</head>
<body>
	<div>
		
	    <div style="margin: 0px auto;">
	        <form method="post" action="/study/guess/doGuess">
	            <?php echo e(csrf_field()); ?>

	            <input type="hidden" value="<?php echo e($user_id); ?>" name="user_id">
	            <input type="hidden" value="<?php echo e($info['id']); ?>" name="team_id">
	            <table style="width: 100%; border: #d4d4d4 1px solid">
	            <tr><td style="width: 300px;text-align: center;font-weight: bold;">我要竞猜</td></tr>
	            <tr><td style="width: 300px;text-align: center;"><?php echo e($info['team_a']); ?> VS <?php echo e($info['team_b']); ?> </td></tr>
	            <tr><td style="width: 300px;text-align: center;">
	                <input type="radio" name="g_result" value="1">胜
	                <input type="radio" name="g_result" value="3">负
	                <input type="radio" name="g_result" value="2">平
	            </td></tr>
	            <tr><td style="width: 300px;text-align: center;"><input type="submit" value="竞猜"></td></tr>
	        </table>
	        </form>
	        
	    </div>
	</div>
</body>
</html>
  