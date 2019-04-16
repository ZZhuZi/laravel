<?php 

abs()    //求绝对值
ceil()    //进一取整
floor()   //舍去法取整
fmod()    浮点数取整
round()   四舍五入
max()    求最大值

min()    求最小值
mt_rand() 随机数
rand()     
pi()     圆周率
trim()   删除空格 或其他预定义字符
dirname()   返回路径中的目录部分
str_pad() 充填为指定长度




学函数
 
1.abs(): 求绝对值
 
$abs = abs(-4.2); //4.2 数字绝对值数字
 
2.ceil(): 进一法取整
 
echo ceil(9.999); // 10 浮点数进一取整
 
3.floor(): 舍去法取整
 
    echo floor(9.999); // 9 浮点数直接舍去小数部分
 
4.fmod(): 浮点数取余
$x = 5.7;$y = 1.3; // 两个浮点数,x>y 浮点余数$r = fmod($x, $y);// $r equals 0.5, because 4 * 1.3 + 0.5 = 5.7 

5.pow(): 返回数的n次方
 
    echo pow(-1, 20); // 1 基础数|n次方乘方值
 
6.round(): 浮点数四舍五入
 
    echo round(1.95583, 2); // 1.96, 一个数值|保留小数点后多少位,默认为0 舍入后的结果
 
7.sqrt(): 求平方根
 
    echo sqrt(9); //3 被开方的数平方根
 
8.max(): 求最大值
 
    echo max(1, 3, 5, 6, 7); // 7
 
多个数字或数组 返回其中的最大值
 
    echo max(array(2, 4, 5)); // 5
 
9.min(): 求最小值
 
输入: 多个数字或数组
 
输出: 返回其中的最小值
 
10.mt_rand(): 更好的随机数
 
输入: 最小|最大, 输出: 随机数随机返回范围内的值
 
    echo mt_rand(0,9);//n
11.rand(): 随机数 输入: 最小|最大, 输出: 随机数随机返回范围内的值
 
12.pi(): 获取圆周率值
 
去空格或或其他字符:
 
13.trim(): 删除字符串两端的空格或其他预定义字符
 

$str = "\r\nHello World!\r\n";echo trim($str); 

输入: 目标字符串 返回值: 清除后的字符串
 
14.rtrim(): 删除字符串右边的空格或其他预定义字符
 
$str = "Hello World!\n\n";echo rtrim($str); 

15.chop(): rtrim()的别名
 
16.ltrim(): 删除字符串左边的空格或其他预定义字符

$str = "\r\nHello World!";echo ltrim($str); 

17.dirname(): 返回路径中的目录部分
 
    echo dirname("c:/testweb/home.php");  //c:/testweb
 输入: 一个包含路径的字符串 返回值: 返回文件路径的目录部分
 
字符串生成与转化：　　
 
18.str_pad(): 把字符串填充为指定的长度
 
$str = "Hello World";echo str_pad($str,20,"."); 

输入: 要填充的字符串|新字符串的长度|供填充使用的字符串, 默认是空白
 
输出: 完成后的字符串
 
19.str_repeat(): 重复使用指定字符串
 
    echo str_repeat(".",13); // 要重复的字符串|字符串将被重复的次数13个点
 20.str_split(): 把字符串分割到数组中
 
print_r(str_split("Hello"));
 输入: 要分割的字符串|每个数组元素的长度，默认1
 
输出: 拆分后的字符串数组
 
21.strrev(): 反转字符串
 
    echo strrev("Hello World!"); // !dlroW olleH
 输出: 目标字符串颠倒顺序后的字符串
 
22.wordwrap(): 按照指定长度对字符串进行折行处理
 
$str = "An example on a long word is:Supercalifragulistic";echo wordwrap($str,15); 

输入: 目标字符串|最大宽数
 
输出: 折行后的新字符串
 
23.str_shuffle(): 随机地打乱字符串中所有字符
 
    echo str_shuffle("Hello World");
 输入: 目标字符串顺序 输出: 打乱后的字符串
 
24.parse_str(): 将字符串解析成变量
 

输入: 要解析的字符串|存储变量的数组名称
 
输出: 返回Array( [id] => 23 [name] => John Adams)
 
25.number_format(): 通过千位分组来格式化数字 输入: 要格式化的数字|规定多少个小数|规定用作小数点的字符 串|规定用作千位分隔符的字符串
 
输出: 1,000,000 1,000,000.00 1.000.000,00
 
大小写转换：
 
26.strtolower(): 字符串转为小写
 
    echo strtolower("Hello WORLD!");
 目标字符串 小写字符串
 
27.strtoupper(): 字符串转为大写
 
    echo strtoupper("Hello WORLD!");
 输出: 大写字符串
 
28.ucfirst(): 字符串首字母大写
 
    echo ucfirst("hello world"); //　Hello world
 29.ucwords(): 字符串每个单词首字符转为大写
 
    echo ucwords("hello world"); //　Hello World
 html标签关联:
 
30.htmlentities(): 把字符转为HTML实体
 
$str = "John & 'Adams'";echo htmlentities($str, ENT_COMPAT); // John & 'Adams' 

31.htmlspecialchars(): 预定义字符转html编码
 
32.nl2br(): \n转义为<br>标签
 
    echo nl2br("One line.\nAnother line.");
 输出: 处理后的字符串
 
33.strip_tags(): 剥去 HTML、XML 以及 PHP 的标签
 
    echo strip_tags("Hello <b>world!</b>"); 　
 34.addcslashes():在指定的字符前添加反斜线转义字符串中字符

$str = "Hello, my name is John Adams.";echo $str;echo addcslashes($str,'m'); 

输入: 目标字符串|指定的特定字符或字符范围
 
35.stripcslashes(): 删除由addcslashes()添加的反斜线
 
    echo stripcslashes("Hello, \my na\me is Kai Ji\m.");
     // 目标字符串 Hello, my name is Kai Jim.
 36.addslashes(): 指定预定义字符前添加反斜线
 
    $str = "Who's John Adams?";
 echo addslashes($str);
 输出: 把目标串中的' " \和null进行转义处理
 
'37.stripslashes(): 删除由addslashes()添加的转义字符
 
    echo stripslashes("Who\'s John Adams?"); // 清除转义符号Who's John Adams?
 38.quotemeta(): 在字符串中某些预定义的字符前添加反斜线
 
$str = "Hello world. (can you hear me?)";echo quotemeta($str); //　Hello world\. \(can you hear me\?\) 

39.chr(): 从指定的 ASCII 值返回字符
 
    echo chr(052); // ASCII 值返回对应的字符
 40.ord(): 返回字符串第一个字符的ASCII值
 
    echo ord("hello"); 字符串第一个字符的 ASCII 值
 字符串比较：
 
41.strcasecmp(): 不区分大小写比较两字符串
 
    echo strcasecmp("Hello world!","HELLO WORLD!");
 输入: 两个目标字符串 输出: 大1|等0|小 -1
 
42.strcmp(): 区分大小写比较两字符串
 
43.strncmp(): 比较字符串前n个字符,区分大小写
 
调用: int strncmp ( string $str1 , string $str2 , int $len) 　
 
 44.strncasecmp(): 比较字符串前n个字符,不区分大小写
 
调用: int strncasecmp ( string $str1 , string $str2 , int $len )
 
45.strnatcmp(): 自然顺序法比较字符串长度,区分大小写
 
调用: int strnatcmp ( string $str1 , string $str2 )
 
输入: 目标字符串　
 
46.strnatcasecmp(): 自然顺序法比较字符串长度, 不区分大小写
 
调用: int strnatcasecmp ( string $str1 , string $str2 )
 
字符串切割与拼接：
 
47.chunk_split()：将字符串分成小块
 
调用: str chunk_split(str $body[,int $len[,str $end]])
 
输入: $body目标字串, $len长度, $str插入结束符 输出: 分割后的字符串
 
48.strtok(): 切开字符串
 
调用: str strtok(str $str,str $token)
 
目标字符串$str，以$token为标志切割返回切割后的字符串
 
49.explode(): 使用一个字符串为标志分割另一个字符串
 
调用: array explode(str $sep,str $str[,int $limit])
 
输入: $sep为分割符,$str目标字符串,$limit返回数组最多包含元素数 输出: 字符串被分割后形成的数组
 
50.implode(): 同join,将数组值用预订字符连接成字符串
 
调用: string implode ( string $glue , array $pieces )
 
$glue默认, 用''则直接相连
 
51.substr(): 截取字符串
 
调用: string substr ( string $string , int $start [, int $length ] )
 
字符串查找替换：
 
52.str_replace(): 字符串替换操作,区分大小写
 
调用mix str_replace(mix $search,mix $replace, mix $subject[,int &$num])
 
输入: $search查找的字符串,$replace替换的字符串,$subject被查找字串, &$num 输出: 返回替换后的结果
 
53.str_ireplace() 字符串替换操作,不区分大小写
 
调用: mix str_ireplace ( mix $search , mix $replace , mix $subject [, int &$count ] )
 
输入: $search查找的字符串,$replace替换的字符串,$subject被查找字串,&$num 输出: 返回替换后的结果
 
54.substr_count(): 统计一个字符串,在另一个字符串中出现次数
 
调用: int substr_count ( string $haystack , string $needle[, int $offset = 0 [, int $length ]] )
 
55.substr_replace(): 替换字符串中某串为另一个字符串
 
调用: mixed substr_replace ( mixed $string, string $replacement,int $start [, int $length ] )
 
56.similar_text(): 返回两字符串相同字符的数量
 
调用: int similar_text(str $str1,str $str2)
 输入: 两个比较的字符串
 
输出: 整形,相同字符数量
 
57.strrchr(): 返回一个字符串在另一个字符串中最后一次出现位置开始到末尾的字符串
 
调用: string strrchr ( string $haystack , mixed $needle )
 
58.strstr(): 返回一个字符串在另一个字符串中开始位置到结束的字符串
 
调用: string strstr ( string $str, string $needle , bool $before_needle ) 　　
 
 59.strchr(): strstr()的别名,返回一个字符串在另一个字符串中首次出现的位置开始到末尾的字符串
 
调用: string strstr ( string $haystack , mixed $needle [, bool $before_needle = false ] ) 　　
 
60.stristr(): 返回一个字符串在另一个字符串中开始位置到结束的字符串，不区分大小写
 
调用:string stristr ( string $haystack , mixed $needle [, bool $before_needle = false ] )
 
61.strtr(): 转换字符串中的某些字符
 
调用: string strtr ( string $str , string $from , string $to )
 
62.strpos(): 寻找字符串中某字符最先出现的位置
 
调用: int strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
 
63.stripos(): 寻找字符串中某字符最先出现的位置,不区分大小写 调用: int stripos ( string $haystack , string $needle [, int $offset ] )
 
64.strrpos(): 寻找某字符串中某字符最后出现的位置
 
调用: int strrpos ( string $haystack , string $needle [, int $offset = 0 ] )
 
65.strripos(): 寻找某字符串中某字符最后出现的位置,不区分大小写
 
调用: int strripos ( string $haystack , string $needle [, int $offset ] )
 
66.strspn(): 返回字符串中首次符合mask的子字符串长度 调用: int strspn ( string $str1 , string $str2 [, int $start [, int $length ]] )
 
67.strcspn(): 返回字符串中不符合mask的字符串的长度
 
调用: int strcspn ( string $str1 , string $str2 [, int $start [, int $length ]] )
 
输入: $str1被查询,$str2查询字符串，$start开始查询的字符，$length是查询长度 输出: 返回从开始到第几个字符
 
字符串统计：
 
68.str_word_count(): 统计字符串含有的单词数
 
调用: mix str_word_count(str $str,[])
 
输入: 目标字符串 输出: 统计处的数量
 
69.strlen(): 统计字符串长度int strlen(str $str)
 
输入: 目标字符串 输出:整型长度
 
70.count_chars(): 统计字符串中所有字母出现次数(0..255) 调用: mixed count_chars ( string $string [, int $mode ] )
 
字符串编码：
 
71.md5(): 字符串md5编码
  
$str = "Hello";echo md5($str); 

数组函数
 
数组创建：
 
72.array(): 生成一个数组

$a=array("Dog","Cat","Horse");print_r($a); 

数组值或,键=>值一个数组型变量
 
73.array_combine(): 生成一个数组,用一个数组的值 作为键名,另一个数组值作为值
 
    $a1=array("a","b","c","d");
     $a2=array("Cat","Dog","Horse","Cow");
     print_r(array_combine($a1,$a2));
 $a1为提供键,$a2提供值合成后的数组
 
74.range(): 创建并返回一个包含指定范围的元素的数组。
 
    $number = range(0,50,10);
     print_r ($number);
 输入: 0是最小值,50是最大值,10是步长 输出: 合成后的数组
 
75.compact(): 创建一个由参数所带变量组成的数组
 
$firstname = "Peter";$lastname = "Griffin";$age = "38";$result = compact("firstname", "lastname","age");print_r($result); 

变量或数组
 
返回由变量名为键,变量值为值的数组,变量也可以为多维数组.会递归处理 
76.array_fill(): 用给定的填充(值生成)数组
  

$a=array_fill(2,3,"Dog");print_r($a); 

2是键,3是填充的数量,'Dog'为填充内容返回完成的数组
 
数组合并和拆分：　　　　
 
77.array_chunk(): 把一个数组分割为新的数组块

$a=array("a"=>"Cat","b"=>"Dog","c"=>"Horse","d"=>"Cow");print_r(array_chunk($a,2)); 

一个数组分割后的多维数组，规定每个新数组包含2个元素
 
78.array_merge(): 把两个或多个数组合并为一个数组。
 
$a1=array("a"=>"Horse","b"=>"Dog");$a2=array("c"=>"Cow","b"=>"Cat");print_r(array_merge($a1,$a2)); 

输入: 两个数组 输出: 返回完成后的数组
 
79.array_slice(): 在数组中根据条件取出一段值，并返回。

$a=array(0=>"Dog",1=>"Cat",2=>"Horse",3=>"Bird");print_r(array_slice($a,1,2)); 

输入: 一个数组 输出: 1为从'Cat'开始，2为返回两个元素
 
数组比较：
 
80.array_diff(): 返回两个数组的差集数组
 
$a1=array(0=>"Cat",1=>"Dog",2=>"Horse");$a2=array(3=>"Horse",4=>"Dog",5=>"Fish"); print_r(array_diff($a1,$a2)); //返回'Cat' 

输入: 两个或多个数组 输出: $a1与$a2的不同之处
 
81.array_intersect(): 返回两个或多个数组的交集数组 输出: 返回'Dog'和'Horse',$a1与$a2的相同之处
 
数组查找替换： 　　　　
 
82.array_search(): 在数组中查找一个值，返回一个键，没有返回返回假

$a=array("a"=>"Dog","b"=>"Cat","c"=>"Horse");echo array_search("Dog",$a); 

输入: 一个数组 输出: 成功返回键名,失败返回false
 
83.array_splice(): 把数组中一部分删除用其他值替代
 
$a1=array(0=>"Dog",1=>"Cat",2=>"Horse",3=>"Bird");$a2=array(0=>"Tiger",1=>"Lion");array_splice($a1,0,2,$a2);print_r($a1); 

输入: 一个或多个数组 输出: $a1被移除的部分由$a2补全
 
84.array_sum(): 返回数组中所有值的总和
 
$a=array(0=>"5",1=>"15",2=>"25");echo array_sum($a); 

输入: 一个数组 输出: 返回和
 
85.in_array(): 在数组中搜索给定的值,区分大小写
 

$people = array("Peter", "Joe", "Glenn", "Cleveland");if (in_array("Glenn",$people) {echo "Match found";}else{echo "Match not found";} 

输入: 需要搜索的值|数组 输出: true/false
 
86.array_key_exists(): 判断某个数组中是否存在指定的 key
 
输入: 需要搜索的键名|数组
 
数组指针操作：
 
87.key(): 返回数组内部指针当前指向元素的键名 　　　
 
88.current(): 返回数组中的当前元素(单元). 　　　
 
89.next(): 把指向当前元素的指针移动到下一个元素的位置,并返回当前元素的值 　　　
 
90.prev(): 把指向当前元素的指针移动到上一个元素的位置,并返回当前元素的值 　　　
 
91.end(): 将数组内部指针指向最后一个元素，并返回该元素的值(如果成功) 　　　 

92.reset(): 把数组的内部指针指向第一个元素，并返回这个元素的值 　　　 

93.list(): 用数组中的元素为一组变量赋值
 
$my_array=array("Dog","Cat","Horse");list($a, $b, $c) = $my_array; 


输入: $a, $b, $c为需要赋值的变量 输出: 变量分别匹配数组中的值
 
94.array_shift(): 删除数组中的第一个元素，并返回被删除元素的值

$a=array("a"=>"Dog","b"=>"Cat","c"=>"Horse");echo array_shift($a);print_r ($a); 

95.array_unshift(): 在数组开头插入一个或多个元素
 
$a=array("a"=>"Cat","b"=>"Dog");array_unshift($a,"Horse");print_r($a); 

96.array_push(): 向数组最后压入一个或多个元素
 
$a=array("Dog","Cat");array_push($a,"Horse","Bird");print_r($a); 

输入: 目标数组|需要压入的值 返回值: 返回新的数组
 
97.array_pop(): 取得（删除）数组中的最后一个元素
 
$a=array("Dog","Cat","Horse");array_pop($a);print_r($a); 

输入: $a为目标数组 输出: 返回数组剩余元素
 
数组键值操作: 　　　　
 
98.shuffle(): 将数组打乱,保留键名

$my_array = array("a" => "Dog", "b" => "Cat");shuffle($my_array);print_r($my_array); 

输入: 一个或多个数组 输出: 顺序打乱后的数组
 
99.count(): 计算数组中的单元数目或对象中的属性个数
 
$people = array("Peter", "Joe", "Glenn","Cleveland");$result = count($people);echo $result; 


输入: 数组 输出: 输出元素个数
 
100.array_flip(): 返回一个键值反转后的数组
 

$a=array(0=>"Dog",1=>"Cat",2=>"Horse");print_r(array_flip($a)); 


输出: 返回完成后的数组 
101.array_keys(): 返回数组所有的键,组成一个数组
 
$a=array("a"=>"Horse","b"=>"Cat","c"=>"Dog");print_r(array_keys($a)); 

输出: 返回由键名组成的数组
 
102.array_values(): 返回数组中所有值，组成一个数组
 
输出: 返回由键值组成的数组
 
103.array_reverse(): 返回一个元素顺序相反的数组 元素顺序相反的一个数组，键名和键值依然匹配
 
104.array_count_values(): 统计数组中所有的值出现的次数
 

$a=array("Cat","Dog","Horse","Dog");print_r(array_count_values($a)); 

输出: 返回数组原键值为新键名，次数为新键值
 
105.array_rand(): 从数组中随机抽取一个或多个元素,注意是键名!!!
 
$a=array("a"=>"Dog","b"=>"Cat","c"=>"Horse");print_r(array_rand($a,1)); 

$a为目标数组, 1为抽取第几个元素的键名返回第1个元素的键名b
 
106.each(): 返回数组中当前的键／值对并将数组指针向前移动一步 调用array each ( array &$array )
 
在执行 each() 之后，数组指针将停留在数组中的下一个单元或者当碰到数组结尾时停留在最后一个单元。如果要再用 each 遍历数组，必须使用 reset()。
 
返回值: 数组中当前指针位置的键／值对并向前移动数组指针。键值对被返回为四个单元的数组，键名为0，1，key和 value。单元 0 和 key 包含有数组单元的键名，1 和 value 包含有数据。 如果内部指针越过了数组的末端，则 each() 返回 FALSE。
 
107.array_unique(): 删除重复值，返回剩余数组

$a=array("a"=>"Cat","b"=>"Dog","c"=>"Cat");print_r(array_unique($a)); 

输入: 数组 输入: 返回无重复值数组，键名不变
 
数组排序: 　　
 
108.sort(): 按升序对给定数组的值排序,不保留键名
 

$my_array = array("a" => "Dog", "b" => "Cat","c" => "Horse");sort($my_array);print_r($my_array); 

输出: true/false 　 
109.rsort(): 对数组逆向排序,不保留键名　　 
110.asort(): 对数组排序,保持索引关系　　　 
111.arsort(): 对数组逆向排序,保持索引关　 
112.ksort(): 系按键名对数组排序　 
113.krsort(): 将数组按照键逆向排序 
114.natsort(): 用自然顺序算法对数组中的元素排序 　　　 
115.natcasesort(): 自然排序,不区分大小写　　　 　　
 
文件系统函数
 
116.fopen(): 打开文件或者 URL
 
    $handle = fopen("ftp://user:password@example.com/somefile.txt", "w");
 调用: resource fopen ( string filename, string mode [, bool use_include_path [, resource zcontext]] )
 
返回值: 如果打开失败，本函数返回 FALSE
 
117.fclose(): 关闭一个已打开的文件指针
 
$handle = fopen('somefile.txt', 'r');fclose($handle);bool fclose(resource handle) 


输出: 如果成功则返回 TRUE，失败则返回 FALSE
 
文件属性
 
118.file_exists(): 检查文件或目录是否存在
 
$filename = '/path/to/foo.txt';if (file_exists($filename)) {echo "exists";} else {echo "does not exist";} 

调用: bool file_exists ( string filename ) 输入: 指定的文件或目录 输出: 存在则返回 TRUE，否则返回 FALSE
 
119.filesize(): 取得文件大小
 
$filename = 'somefile.txt';echo $filename . ': ' . filesize($filename) .'bytes'; 

调用: int filesize ( string $filename )
 
输出: 返回文件大小的字节数，如果出错返回 FALSE 并生成一条 E_WARNING 级的错误
 
120.is_readable(): 判断给定文件是否可读

$filename = 'test.txt';if (is_readable($filename)) {echo '可读';} else {echo '不可读';} 

调用: bool is_readable ( string $filename ) 输出: 如果由 filename指定的文件或目录存在并且可读则返回 TRUE
 
121.is_writable(): 判断给定文件是否可写
 

$filename = 'test.txt';if (is_writable($filename)) {echo '可写';} else {echo '不可写';} 

调用: bool is_writable ( string $filename ) filename 参数 可以是一个允许进行是否可写检查的目录名
 
输出: 如果文件存在并且可写则返回 TRUE。
 
122.is_executable(): 判断给定文件是否可执行
 

$file = 'setup.exe';if (is_executable($file)) {echo '可执行';} else {echo '不可执行';} 

调用: bool is_executable ( string $filename ) 输出: 如果文件存在且可执行则返回 TRUE
 
123.filectime(): 获取文件的创建时间
 
$filename = 'somefile.txt';echo filectime($filename); 

调用: int filectime ( string $filename ) 输出: 时间以 Unix 时间戳的方式返回，如果出错则返回FALSE
 
124.filemtime(): 获取文件的修改时间
 
$filename = 'somefile.txt';echo filemtime($filename); 

    int filemtime ( string $filename )
 输出: 返回文件上次被修改的时间，出错时返回 FALSE。时间以 Unix时间戳的方式返回
 
125.fileatime(): 获取文件的上次访问时间


$filename = 'somefile.txt';echo fileatime($filename); 

调用: int fileatime (string $filename)
 
输出: 返回文件上次被访问的时间, 如果出错则返回FALSE. 时间以Unix时间戳的方式返回.
 
126.stat(): 获取文件大部分属性值
 
$filename = 'somefile.txt';var_dump(fileatime($filename)); 

调用: array stat (string $filename 输出: 返回由 filename 指定的文件的统计信息
 
文件操作
 
127.fwrite(): 写入文件
 
$filename = 'test.txt';$somecontent = "添加这些文字到文件\n";$handle = fopen($filename, 'a');fwrite($handle, $somecontent);fclose($handle); 

调用: int fwrite ( resource handle, string string [, int length] )
 
输出: 把 string 的内容写入 文件指针 handle 处。如果指定了 length,当写入了length个字节或者写完了string以后，写入就会停止, 视乎先碰到哪种情况
 
128.fputs(): 同上　 　　 

129.fread(): 读取文件
 
$filename = "/usr/local/something.txt";$handle = fopen($filename, "r");$contents = fread($handle, filesize($filename)); fclose($handle); 

调用: string fread ( int handle, int length ) 从文件指针handle，读取最多 length 个字节
 
130.feof(): 检测文件指针是否到了文件结束的位置
 
$file = @fopen("no_such_file", "r");while (!feof($file)) {}fclose($file); 

调用: bool feof ( resource handle ) 输出: 如果文件指针到了 EOF 或者出错时则返回TRUE，否则返回一个错误（包括 socket 超时），其它情况则返回 FALSE
 
131.fgets(): 从文件指针中读取一行
 
$handle = @fopen("/tmp/inputfile.txt", "r");if ($handle) {while (!feof($handle)) {$buffer = fgets($handle, 4096);echo $buffer;}fclose($handle);} 

调用: string fgets ( int handle [, int length] ) 输出: 从handle指向的文件中读取一行并返回长度最多为length-1字节的字符串.碰到换行符（包括在返回值中）、EOF 或者已经读取了length -1字节后停止(看先碰到那一种情况). 如果没有指定 length,则默认为1K, 或者说 1024 字节.
 
132.fgetc(): 从文件指针中读取字符
 
$fp = fopen('somefile.txt', 'r');if (!$fp) {echo 'Could not open file somefile.txt';}while (false !== ($char = fgetc($fp))) {echo "$char\n";} 

输入: string fgetc ( resource $handle ) 输出: 返回一个包含有一个字符的字符串，该字符从 handle指向的文件中得到. 碰到 EOF 则返回 FALSE.
 
133.file(): 把整个文件读入一个数组中
 
$lines = file('http://www.example.com/');// 在数组中循环，显示 HTML 的源文件并加上行号。  foreach ($lines as $line_num => $line) { echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n"; }// 另一个例子将 web 页面读入字符串。参见 file_get_contents()。  $html = implode('', file('http://www.example.com/')); 

调用: array file ( string $filename [, int $use_include_path [, resource $context ]] )
 
输出: 数组中的每个单元都是文件中相应的一行，包括换行符在内。如果失败 file() 返回 FALSE
 
134.readfile(): 输出一个文件　 调用: int readfile ( string $filename [, bool $use_include_path [, resource $context ]] )
 
输出: 读入一个文件并写入到输出缓冲。返回从文件中读入的字节数。如果出错返回 FALSE
 
135.file_get_contents(): 将整个文件读入一个字符串
 
    echo file_get_contents('http://www.baidu.com');
 调用: string file_get_contents ( string $filename [, bool $use_include_path [, resource $context [, int $offset [, int $maxlen ]]]] ) 　 136.file_put_contents():将一个字符串写入文件
 
    file_put_contents('1.txt','aa');
 调用: int file_put_contents ( string $filename , string $data [, int $flags [, resource $context ]] )
 
输出: 该函数将返回写入到文件内数据的字节数
 
137.ftell(): 返回文件指针读/写的位置
 
$fp=fopen('tx.txt','r');fseek($fp,10);echo ftell($fp);fread($fp,4);echo ftell($fp); 

调用: int ftell ( resource $handle ) 输出: 返回由 handle 指定的文件指针的位置，也就是文件流中的偏移量
 
138.fseek(): 在文件指针中定位
 
$fp=fopen('tx.txt','r');fseek($fp,10);echo ftell($fp);fread($fp,4);echo ftell($fp); 

调用: int fseek ( resource $handle , int $offset [, int $whence ] ) 输出: 成功则返回 0；否则返回 -1
 
139.rewind(): 倒回文件指针的位置
 
$fp=fopen('tx.txt','r');fseek($fp,3);echo ftell($fp);fread($fp,4);rewind($fp);echo ftell($fp); 

调用: bool rewind ( resource $handle ) 返回值: 如果成功则返回 TRUE，失败则返回 FALSE
 
140.flock(): 轻便的执行文件锁定
 
$fp=fopen('tx.txt','r');flock($fp, LOCK_SH);//共享锁//flock($fp, LOCK_EX);//独立锁，写文件时用它打开//flock($fp, LOCK_NB);//附加锁flock($fp, LOCK_UN);//释放锁fclose($fp); 

调用: bool flock ( int $handle , int $operation [, int &$wouldblock ] ) 输出: 如果成功则返回 TRUE，失败则返回 FALSE
 
目录
 
141.basename(): 返回路径中的文件名部分

path = "/home/httpd/html/index.php";$file = basename($path);$file = basename($path,".php"); 

调用: string basename ( string $path [, string $suffix ]) 输出: 给出一个包含有指向一个文件的全路径的字符串，本函数返回基本的文件名。如果文件名是以 suffix 结 束的，那这一部分也会被去掉
 
142.dirname(): 返回路径中的目录部分

$path = "/etc/passwd";$file = dirname($path); 

调用: string dirname ( string $path ) 输出: 给出一个包含有指向一个文件的全路径的字符串，本函数返回去掉文件名后的目录名
 
143.pathinfo(): 返回文件路径的信息
 
echo '<pre>';print_r(pathinfo("/www/htdocs/index.html"));echo '</pre>'; 

调用: mixed pathinfo ( string $path [, int $options ] ) 返回一个关联数组包含有 path 的信息
 
144.opendir(): 打开目录句柄
 
$fp=opendir('E:/xampp/htdocs/php/study/19');echo readdir($fp);closedir($fp); 

调用: resource opendir ( string $path [, resource $context ] ) 返回值: 如果成功则返回目录句柄的 resource，失败则返回FALSE
 
145.readdir(): 从目录句柄中读取条目

$fp=opendir('E:/xampp/htdocs/php/study/19');echo readdir($fp);closedir($fp); 

调用: string readdir ( resource $dir_handle ) 返回值: 返回目录中下一个文件的文件名。文件名以在文件系统中的排序返回
 
146.closedir(): 关闭目录句柄

$fp=opendir('E:/xampp/htdocs/php/study/19');echo readdir($fp);closedir($fp); 

调用: void closedir ( resource $dir_handle ) 关闭由 dir_handle 指定的目录流。流必须之前被opendir() 所打开 147.rewinddir() : 倒回目录句柄
 
$fp=opendir('E:/xampp/htdocs/php/study/19');echo readdir($fp).'<br />';echo readdir($fp).'<br />';echo readdir($fp).'<br />';rewinddir($fp);echo readdir($fp).'<br />';closedir($fp); 

调用: void rewinddir ( resource $dir_handle ) 输出: 将 dir_handle 指定的目录流重置到目录的开头 148.mkdir(): 新建目录
 
    mkdir('123');
 调用: bool mkdir ( string $pathname [, int $mode [, bool $recursive [, resource $context ]]] ) 输出: 尝试新建一个由 pathname 指定的目录
 
149.rmdir(): 删除目录
 
    rmdir('123');
 调用: bool rmdir ( string $dirname ) 输出: 尝试删除 dirname 所指定的目录。目录必须是空的，而且要有相应的权限。如果成功则返回TRUE，失败则返回 FALSE
 
150.unlink(): 删除文件
 
unlink('123/1.txt');rmdir('123'); 

调用: bool unlink ( string $filename ) 输出: 删除 filename 。和 Unix C 的 unlink() 函数相似。如果成功则返回 TRUE，失败则返回 FALSE
 
151.copy(): 拷贝文件
 
    copy('index.php','index.php.bak');
 调用: bool copy ( string $source , string $dest ) 输出: 将文件从 source 拷贝到 dest. 如果成功则返回TRUE，失败则返回 FALSE
 
152.rename(): 重命名一个文件或目录
 
    rename('tx.txt','txt.txt');
 调用: bool rename ( string $oldname , string $newname [, resource $context ] ) 输出: 如果成功则返回 TRUE，失败则返回 FALSE
 
文件的上传与下载
 
153.is_uploaded_file():判断文件是否是通过 HTTP POST上传的

if(is_uploaded_file($_FILES['bus']['tmp_name'])){if( move_uploaded_file($_FILES['bus']['tmp_name'],$NewPath) ){echo '上传成功<br /><img src="'.$NewPath.'">';}else{exit('失败');}}else{exit('不是上传文件');} 

调用: bool is_uploaded_file ( string $filename ) 　
 
154.move_uploaded_file(): 将上传的文件移动到新位置
 
if(is_uploaded_file($_FILES['bus']['tmp_name'])){if( move_uploaded_file($_FILES['bus']['tmp_name'],$NewPath) ){echo '上传成功<br /><img src="'.$NewPath.'">';}else{exit('失败');}}else{exit('不是上传文件');} 

调用: bool move_uploaded_file ( string $filename , string
 
时间函数
 
155.time(): 返回当前的 Unix 时间戳time(); 调用: int time ( void ) 输出: 返回自从 Unix 纪元（格林威治时间 1970 年 1 月 1 日 00:00:00）到当前时间的秒数
 
156.mktime(): 取得一个日期的 Unix 时间戳
 
    mktime(0, 0, 0, 4, 25, 2012);
 调用: int mktime ([ int $hour [, int $minute [, int $second [, int $month [, int $day [, int $year [, int $is_dst ]]]]]]] ) 　 156.date(): 格式化一个本地时间／日期
 
date('Y年m月d日 H:i:s');
 调用: string date ( string $format [, int $timestamp ] )
 
输出: 2016年09月10日 20:45:54
 
157.checkdate(): 验证一个格里高里日期 调用: bool checkdate ( int $month , int $day , int $year) 输出: 如果给出的日期有效则返回 TRUE，否则返回 FALSE

if(checkdate(6,31,2012)){echo '成立';}else{echo '不成立';} 

158.date_default_timezone_set(): 设定用于一个脚本中所有日期时间函数的默认时区
 
    date_default_timezone_set('PRC');
 调用: bool date_default_timezone_set ( string $timezone_identifier)
 
返回值: 如果 timezone_identifier 参数无效则返回 FALSE，否则返回 TRUE。
 
159.getdate(): 取得日期／时间信息 调用: array getdate ([ int $timestamp ] )
 
输出: 返回一个根据timestamp得出的包含有日期信息的关联数组。如果没有给出时间戳则认为是当前本地时间
 
$t=getdate();var_dump($t); 

160.strtotime(): 将任何英文文本的日期时间描述解析为 Unix 时间戳

echo strtotime("now");int strtotime ( string $time [, int $now ] ) 　echo strtotime("10 September 2000");echo strtotime("+1 day");echo strtotime("+1 week");echo strtotime("+1 week 2 days 4 hours 2 seconds");echo strtotime("next Thursday");echo strtotime("last Monday"); 

161.microtime(): 返回当前 Unix 时间戳和微秒数 调用: mixed microtime ([ bool $get_as_float ] )
 
$start=microtime(true);sleep(3);$stop=microtime(true);echo $stop-$start; 

其他常用:
 
162.intval(): 获取变量的整数值 调用: int intval ( mixed $var [, int $base = 10 ] ) 通过使用指定的进制 base 转换（默认是十进制），返回变量 var 的 integer 数值。 intval() 不能用于 object，否则会产生 E_NOTICE 错误并返回 1。
 
var: 要转换成 integer 的数量值
 
base: 转化所使用的进制
 
返回值: 成功时返回 var 的 integer 值，失败时返回 0。 空的 array 返回 0，非空的 array 返回 1。
 
PDO类的相关函数 prepare() execute() fetch()
 
1234567891011121314151617181920212223242526272829 


<?php$driver = 'mysql';$database = "dbname=CODINGGROUND";$dsn = "$driver:host=localhost;unix_socket=/home/cg/mysql/mysql.sock;$database"; $username = 'root';$password = 'root'; try { $conn = new PDO($dsn, $username, $password); echo "<h2>Database CODINGGROUND Connected<h2>";}catch(PDOException $e){ echo "<h1>" . $e->getMessage() . "</h1>";}$sql = 'SELECT * FROM users';$stmt = $conn->prepare($sql);$stmt->execute(); echo "<table style='width:100%'>";while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ echo "<tr>"; foreach($row as $value) { echo sprintf("<td>%s</td>", $value); } echo "</tr>";}echo "</table>";?> 

正则表达式-元字符
 
元字符及其匹配范围
 
\d 匹配任意一个十进制数字,等价于: [0-9] \D 匹配除十进制数字以外的任意数字,等价于: [^0-9] \s:匹配空白字符,等价于: [\n\f\r\t\v] \S: 匹配除空白字符以外的任意一个字符, 等价于[^\n\f\r\t\v]
 
\w 匹配任意一个数字、字母和下划线,等价于: [0-9a-zA-Z_] \W 匹配除字母、数字和下划线以外的任意字符, 等价于: [^0-9a-zA-Z_] [] 1)用来表示范围。2)匹配任意一个中括号中定义的原子 　 [^]: 中括号里面的^(抑扬符)：表示匹配任意一个除中括号里面定义的原子
 
限定次数
 
* 匹配0次、1次或多次其前的原子, 等价于: {0,} + 匹配1次或多次其前的原子, 等价于: {1,} ? 匹配0次或1次其前的原子, 等价于: {0,1} {n} 表示其前的原子正好出现n次, 等价于: {n,} 表示其前的原子至少出现n次，最多不限制 　 {m,n} 表示其前的原子最少出现m次，最多出现n次 　
 
其它
 
. 匹配除换行符(\n)以外的任意字符【windows下还匹配\f\r】　 | 两个或多个分支选择【优先级最低】 ^ 匹配输入字符的开始位置　 $ 匹配输入字符的结束位置　 \b 匹配词边界　 \B 匹配非词边界　 () 1)模式单元，把多个小原子组成一个大原子。2)可以改变优先级

 ?>
