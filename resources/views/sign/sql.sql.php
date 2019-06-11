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

============================================================-========== 、
连接数据库
  PHP 数据库  
$con = mysqli_connect('localhost','root','root','sql')  
                         服务器    用户   密码   数据库
设置字符集   mysqli_query($con,"set names utf8");   mysqli_set_charset($con,'utf8');
执行sql      mysqli_query($con,$sql); 
$con = mysql_connect('localhost','root','root')  连接 
mysql_close($con);  关闭

pdo 连接数据库
$db = new PDO('mysql:host=localhost:3306;dbname=mydb',"root",'password');

============================================================-========== 、

mysqld -uroot -p   (连接数据库)    注 mysql的用户在mysql数据库下的user表中

CREATE USER 'username'@'host' IDENTIFIED BY 'password';  创建mysql新用户

grant select,insert,update,delete,create,drop on lianxi.order to lmz@localhost indentified by "123";
select,insert,update,delete,create,drop(权限)  all privileges(所有权限)
lianxi.order (lianxi数据库下的order数据表)  lianxi.*.* (lianxi数据库下的所有数据表)
lmz@localhost (来自localhost的用户lmz)        123 (口令"123")

flush privileges;

drop USER lmz@"%"
============================================================-========== 、

框架  tp5框架 laravel框架  e框架  yum框架

tp3.2       
tp5.0  差别大
            路由定义
            
            request 请求对象 响应对象 response
            数据库 查询构建器 Db()   3.2 M()
            命名空间 无需再加model 后缀
            目录结构完全改变  较3.2 更清晰
            表单验证器 引入composer
laravel 
            web.php  csrf 跨站伪造的防御  tp 手动  laravel 自动
            laravel框架更重路由 tp5 必须有控制器
            新特性 中间件 事件机制 任务调度 消息队列 数据迁移 数据填充
            更符合 PSR 规范 
            hash 单向散列加密  MD5 sha1
            IOC容器 依赖注入 composer 注册服务
            加密不一样 ，md5 加密（tp)  hash加密码(laravel)
============================================================-========== 、
mvc 是一种软件架构（布局）模式，它强制性的
mvvm（小程序，vue） vm viewmodel 将m和v连接一起，渲染视图的布局
  减少对dom的操作，
  视图容器主键 轮播图
  表单组件      
  地图组件
mm  
============================================================-========== 、


设置 默认时区
date_default_timezone_set("PRC")
默认字符集 
header("Content-type:text/html;charset=utf-8");
连接数据库
$con = mysqli_connect('localhost','root','root','数据库') or die('数据库连接失败');
设置字符集
mysqli_query($con,"set names utf8");

currentRouteName 获取当前路由
============================================================-========== 、
数据库
关系型数据库   存储在磁盘中   创表(按照严格要求)
非关系型数据库 存储在内存中   不用创表  
  aof 日志快照 rdb 定期备份  redis可以将数据持久化到硬盘
关系型数据库   mysql 对PHP支持最好
     小型关系型数据库 Microsoft Access ，SQLlist
     中型关系型数据库 sql server(微软) , mysql(oracle)   
     大型关系型数据库 oracle , DB2 
非关系型数据库 
    mongoDB ，redis ，memory ， nosql

   非关系型优势 1、性能nosql 是基于键值对的，主键和值是对应关系，而且不需要经过sql层的解析，性能高。
        2、可扩展性同样也是因为基于键值对，数据之间没有耦合性，所以非常容易水平扩展。
        3、结构灵活 
        4、查询快，在缓存中
   关系型优势    1、复杂查询可以使用sql语句， 单表，多表的数据查询。
         2、事物支持使得对于安全性能很高的数据访问要求得以实现。保持数据的一致性
         3、可以创建库、表， 数据更新的开销小

aof 日志快照  用户的 增删改 操作  进行 追加二级制日志  
rdb 定期备份  异步 fork子进程 当前数据结果  替换临时文件
-----------------------------------------------------------
缓存   雪崩 穿透 击穿
雪崩 ，在某一个时间段，缓存集中过期失效   周期性的压力波峰
  不同商品，缓存不同周期 ，失效时间错开
穿透 ，查询一个数据库一定不存在的数据 ，避开缓存，直接查询数据库，并且不记录 ，可能高并发
     解决 ，将没有的数据也返回，可以设定较短的过期时间
击穿 指一个key非常热点 ，在不停的抗着大开发，大并非集中对这个点进行访问
    key在失效瞬间，持续的大并非就穿破缓存，直接请求数据库，就像在屏障上凿开一个洞
-----------------------------------------------------------
分区

============================================================-========== 、
支付宝 
买家   支付宝   卖家(商户账号) 
平台  ----信息-----> 网关 getway 
 |                    |
 |                    |
 <---返回商家-------支付
 
  配置信息  ：
            appid(商户id)  同步回调地址(支付成功后返回地址(用户))  异步回调地址(处理数据) 
            支付宝公钥    商户的私钥  
  订单信息 ：(订单号 订单金额  备注)
            Pay::alipay($this->config)->verify();  验签
  返回参数 ： 
            状态(status) 交易号 订单号 总金额(total_amount)  实际支付金额(buyer_pay_amount)  签名        

支付宝支付  laravel框架 composer第三方宝 pc 端 yansongda
============================================================-========== 、
购物车 存储位置 cookie redis session(可能不能共享)
登录后才可加入    选择 商品sku 属性   userId  6redis判断 添加或追加（goodsID  sku） 
hash 存储- 适合局部修改
============================================================-========== 、                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      

set get  del  exits decr incr
expire 设置过期时间
setex  给字符串设置过期时间
 队列队栈 
lpush  rpop 
rpush  lpop
============================================================-========== 、

跨域问题 浏览器的同源策略  （域名 端口 协议 必须一样） 浏览器的安全问题 

解决 curl类库
     客户端 jsonp跨域  script中src属性  js回调函数 只能解决get请求
     服务端 ajax 白名单 （header('Access-Control-Allow-Origin:*'); ）
============================================================-========== 、

将数组转化为url地址  $url = http_build_query($arr)
将url地址转化为数组  parse_str($url,$arr);

url_encode()  url_decode()
base64_encode()  base64_decode()

页面静态化  ob缓冲
file_put_contents()
file_get_contents()

============================================================-========== 

composer 
composer require ramsey/uuid
composer require alibabacloud/client   //阿里云短信服务
composer install 

============================================================-========== 

<!-- tp5框架创建控制器  api模块下的SignController控制器 -->
php think make:comtroller app\api\controller\SignController 
php think make:model  app\api\model\SignModel 

============================================================-========== 
<!-- 创建控制器 -->
php artisan make:controller Admin/LoginController  
<!-- 创建模型 -->
php artisan make:model Model/LoginModel
<!-- 创建中间件 -->   
php artisan make:middleware AdminAuth     

<!-- 创建数据迁移命令 --><!-- 在database/migration 下-->
php artisan make:migration create_bs_user_table
php artisan make:migration create_user_table --create=bs_user
php artisan make:migration create_user_table --table=bs_user 修改该表的结构

<!-- 执行数据迁移命令 -->
php artisan migrate

php artisan make:seeder  类名   创建数据填充文件类
php artisan db:seed  --class=要执行的类名    执行数据填充
php artisan db:seed       执行数据填充

<!-- 创建控制台  在app/Console 下--> 
php atisan make:command   

composer dump-autoload   //class does not exist 问题解决
<!-- composer 包依赖 解决第三方之间的依赖关系，自动加载的问题 -->

路由 路由分组 路由别名 路由参数 Route::currentRouteName(), route()

<!-- 试图共享  -->
View::share();

<!-- orm 面向关习型模型  一个model只对应一张表 -->

<!-- csrf 保护 -->
<!-- 防止csrf 跨站攻击 跨站请求伪造-->

git push -u origin laravel

alter table ks_admin_user add index(username,user_id);  -- 给用户名加复合索引
alter table ks_admin_user add unique(token);  -- 给用户名加唯一索引
create unique index kk on `order`(prices);   -- 唯一索引   

<!-- IP地址 转换为数字存储 -->
inet_aton    <!--  地址转数字 -->
inet_ntoa    <!--  数字转地址 -->
int 类型在带负数的情况下 范围 -2^31 --- 2^31-1   非负 0 --- 2^32-1
select inet_aton('255.255.255.255')   -- ip 转int 类型  非负 最大值 4294967295 2^32-1
select inet_ntoa(4294967040)        -- int 转IP 型
insert into `order` (ip) VALUES (inet_aton('255.255.255.0')) 
=================================================================================
配置服务器 成功 而收不到微信公众服务器的消息  csrf跨站请求伪造攻击 
用户关注公众号成功后，发送消息是服务器接受不到消息

用户消息  ----》  微信服务器 (post请求xml)  ---web.php响应失败---》 服务器

原因 ： csrf跨站请求伪造攻击 cookie不能跨域
方案 ：
将接口路由写在api.php中可以解决 
或者将mp.weixin.qq.com 排除在csrf外面


微信公众号二次开发 
    配置服务器的信息 （私服(服务器)）  域名 
       验证是否合法  
           参数 ： sign签名 时间戳  token  回调随机字符串 
             sha1(implode(sort([$token,$timestamp,$nonce])));

  客户                        私服    (自定义)客户

         公众号 post (xml)   

网页授权Js-sdk包  方式  静默授权  主动授权 userinfo

网页授权 ，免注册，减少用户使用的操作


   
=================================================================================

QQ平台   http://connect.qq.com/   

第三方登录 QQ登录
1、 放置一个QQ登录的按钮，引导用户去第三方进行授权登录
获取授权码的地址
https://graph.qq.com/oauth2.0/authorize?response_type=code&
client_id=YOUR_APP_ID&redirect_url=urlencode(YOUR_ENDIRECT_URL)&state=test

2、 用户授权登录以后，跳转到指定的回调地址，并在redirect_url 地址或带上
Authorization Code 和原始的state值

3、 通过Authorization Code 获取Access Token的值 (授权范围)
获取Access_token 值地址
https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&
client_id=YOUR_APP_ID&client_secret=YOUR_APP_KEY&code=返回的code码&
redirect_uri=urlencode(YOUR_ENDIRECT_URL)
如果返回成功，即可在返回包中获取Access_token。 QQ第三方登录
Access_Token值得有效期默认为3个月

4、 通过access_token 来获取用户的openid
获取oppen_id的值地址
https://graph.qq.com/oauth2.0/me?access_token=接受到的access_token
PC网接入是，获取用户OpenID，返回包如下
callback({"client_id":"YOUR_APPID","openid":"YOUR_OPENID"})

oppenid是此网站上唯一对应的身份标识

5、 通过openID来获取用户的openAPI 用户详情接口

6、 成功返回后，即可获取用户数据

微信授权是 3，4连接一起 即 用用户的code码 ，可以获取access_token 和 openId
=================================================================================
strpos 
$A = "abc";
$B = "a";
$pos = strpos($A ,$B);  在值为0 的时候 == 即为false
if($pos === false){ 
    echo "no";
}else{
    echo "yes";
}

例 ：
<p>爱好 ： <input type="checkbox" name="hobby[]" value="游泳"
            <?php
                if(strpos($data['hobby'],"游泳") !== false){
                    echo 'checked = "checked"';
                }
            ?>
        /> 游泳
</p>        
=================================================================================


        $table->string('username',100)->default('')->comment('用户名');
        $table->char('phone',11)->comment('手机号');
        $table->char('password',32)->comment('用户密码');
        $table->string('image_url',200)->default('')->comment('用户头像');
        $table->string('token',32)->comment('token值');
        $table->timestamps('expierd_at',32)->comment('过期时间');
        $table->enum('status',['1','2'])->default('1')->comment('用户状态 1 启用 2 禁用');


      study_lottery_record
        $table->increments('id');
        $table->integer('user_id')->comment('用户id');
        $table->integer('lottery_id')->comment('奖品id');
        $table->timestamp('created_at')->comment('中奖时间');
        $table->timestamps();

    study_lottery_user
        $table->increments('id');
        $table->string('real_name')->comment('用户名');
        $table->char('phone')->comment('手机号');
        $table->timestamps();

    study_lottery
        $table->increments('id');
        $table->string('lottery_name')->comment('奖品名');
        $table->tinyInteger('precent')->comment('中奖概率');
        $table->timestamps(); 