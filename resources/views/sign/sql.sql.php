    $table->decimal('total_amount',10,2)->comment('红包总额');
    $table->decimal('left_amount',10,2)->comment('剩余总额');
    $table->integer('total_nums')->default(1)->comment('红包总个数');
    $table->integer('left_nums')->default(0)->comment('红包剩余个数');

    $table->increments('id');
    $table->integer('user_id')->comment('用户id');
    $table->integer('bonus_id')->comment('用户id');
    $table->decimal('money',10,2)->comment('用户抢到金额');
    $table->enum('flag',['1','2'])->default('1')->comment('是否是最佳手气：1否 2是');
    $table->timestamps();
    $table->unique(['user_id'],'[bonus_id]');

<!-- tp5框架创建控制器  api模块下的SignController控制器 -->
php think make:comtroller app\api\controller\SignController 
============================================================-========== 
<!-- 创建控制器 -->
php artisan make:controller Admin/LoginController  
<!-- 创建模型 -->
php artisan make:model Model/LoginModel
<!-- 创建中间件 -->
php artisan make:middleware AdminAuth

<!-- 创建数据迁移命令 -->
php artisan make:migration create_bs_user_table
php artisan make:migration create_user_table --create=bs_user
<!-- 执行数据迁移命令 -->
php artisan migrate

php artisan make:seeder  类名   创建数据填充文件类
php artisan db:seed  --class=要执行的类名    执行数据填充
php artisan db:seed       执行数据填充

composer dump-autoload   //class does not exist 问题解决




            $table->string('username',100)->default('')->comment('用户名');
            $table->char('phone',11)->comment('手机号');
            $table->char('password',32)->comment('用户密码');
            $table->string('image_url',200)->default('')->comment('用户头像');
            $table->string('token',32)->comment('token值');
            $table->timestamps('expierd_at',32)->comment('过期时间');
            $table->enum('status',['1','2'])->default('1')->comment('用户状态 1 启用 2 禁用');
