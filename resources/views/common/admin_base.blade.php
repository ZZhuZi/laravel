<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/RBAC/images/favicon.png" type="image/png">

  <title>@yield('title')</title>

  <link href="/RBAC/css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/RBAC/js/html5shiv.js"></script>
  <script src="/RBAC/js/respond.min.js"></script>
  <![endif]-->

  <!-- js文件 -->
  <script src="/RBAC/js/jquery-1.11.1.min.js"></script>
  <script src="/RBAC/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="/RBAC/js/jquery-ui-1.10.3.min.js"></script>
  <script src="/RBAC/js/bootstrap.min.js"></script>
  <script src="/RBAC/js/modernizr.min.js"></script>
  <script src="/RBAC/js/jquery.sparkline.min.js"></script>
  <script src="/RBAC/js/toggles.min.js"></script>
  <script src="/RBAC/js/retina.min.js"></script>
  <script src="/RBAC/js/jquery.cookies.js"></script>

  <script src="/RBAC/js/flot/jquery.flot.min.js"></script>
  <script src="/RBAC/js/flot/jquery.flot.resize.min.js"></script>
  <script src="/RBAC/js/flot/jquery.flot.spline.min.js"></script>
  <script src="/RBAC/js/morris.min.js"></script>
  <script src="/RBAC/js/raphael-2.1.0.min.js"></script>

  <script src="/RBAC/js/custom.js"></script>
  <script src="/RBAC/js/dashboard.js"></script>
  <!-- <script src="/js/app.js" ></script> -->

</head>

<body>

<section>

  <div class="leftpanel">

    <div class="logopanel">
      <h1><span>[</span> 管理后台 <span>]</span></h1>
    </div><!-- logopanel -->

    <div class="leftpanelinner">

      <!-- This is only visible to small devices -->
      <div class="visible-xs hidden-sm hidden-md hidden-lg">
        <div class="media userlogged">
          <img alt="" src="/RBAC/images/photos/loggeduser.png" class="media-object">
          <div class="media-body">
            <h4>John Doe</h4>
            <span>"Life is so..."</span>
          </div>
        </div>

        <h5 class="sidebartitle actitle">Account</h5>
        <ul class="nav nav-pills nav-stacked nav-bracket mb30">
          <li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
          <li><a href=""><i class="fa fa-cog"></i> <span>Account Settings</span></a></li>
          <li><a href=""><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
          <li><a href="signout.html"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
        </ul>
      </div>

      <h5 class="sidebartitle">Navigation</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket" id="left_menus">
      @if(!empty($menus))
        @foreach($menus as $menu)
          @if(isset($menu['son']))
          <li class="nav-parent"><a href="{{ \Route::has($menu['url']) ? route($menu['url']) : '#'}}">
          <i class="fa fa-edit"></i> <span>{{$menu['name']}}</span></a>
            <ul class="children">
              @foreach($menu['son'] as $m)
              <li @if(\Route::currentRouteName() ==$m['url']) class="son active" @endif>
                <a href="{{ \Route::has($m['url']) ? route($m['url']) : '#'}}">
                <i class="fa fa-caret-right"></i>{{$m['name']}}</a>
              </li>
              @endforeach
            </ul>
          </li>
          @else
         <li @if(\Route::currentRouteName() == $menu['url']) class="active" @endif><a href="{{ \Route::has($menu['url']) ? route($menu['url']) : '#'}}"><i class="fa fa-home"></i> <span>{{$menu['name']}}</span></a></li>

          @endif
        @endforeach
      @endif
      <!--   <li class="active"><a href="首页.html"><i class="fa fa-home"></i> <span>首页</span></a></li>
        <li class="nav-parent"><a href=""><i class="fa fa-edit"></i> <span>表单</span></a>
          <ul class="children">
            <li><a href="表单页面.html"><i class="fa fa-caret-right"></i> 添加/编辑表单</a></li>
          </ul>
        </li>
        <li class="nav-parent"><a href=""><i class="fa fa-edit"></i> <span>列表</span></a>
          <ul class="children">
            <li><a href="列表模板.html"><i class="fa fa-caret-right"></i> 列表页面</a></li>
          </ul>
        </li> -->


      </ul>

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  
  <div class="mainpanel">

    <div class="headerbar">

      <a class="menutoggle"><i class="fa fa-bars"></i></a>

      <form class="searchform" action="index.html" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
      </form>

      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="/RBAC/images/photos/loggeduser.png" alt="" />
                John Doe
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <li><a href="/admin/user/edit">{{$user_id}}<i class="glyphicon glyphicon-cog"></i> 账户设置</a></li>
                <li><a href="/admin/user/password"><i class="glyphicon glyphicon-question-sign"></i> 修改密码</a></li>
                <li><a href="/admin/loginout"><i class="glyphicon glyphicon-log-out"></i> 退出登录</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div><!-- header-right -->

    </div><!-- headerbar -->
    
    <div class="pageheader">
    @yield('pageHeader')
    </div>
    
    <div class="contentpanel">
    @yield('content')
    </div><!-- contentpanel -->
    
 <script type="text/javascript">
  $("#left_menus li ul .son").each(function(){
    if($(this).hasClass('active')){
      $(this).parent('ul').css('display','block');
      $(this).parent('ul').parent('li').addClass('nav-active');
    }
  });
</script>



</body>
</html>

<script>
    (function(window,document,undefined){
var hearts = [];
window.requestAnimationFrame = (function(){
return window.requestAnimationFrame ||
window.webkitRequestAnimationFrame ||
window.mozRequestAnimationFrame ||
window.oRequestAnimationFrame ||
window.msRequestAnimationFrame ||
function (callback){
setTimeout(callback,1000/60);
}
})();
init();
function init(){
css(".heart{width: 10px;height: 10px;position: fixed;background: #f00;transform: rotate(45deg);-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);}.heart:after,.heart:before{content: '';width: inherit;height: inherit;background: inherit;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;position: absolute;}.heart:after{top: -5px;}.heart:before{left: -5px;}");
attachEvent();
gameloop();
}
function gameloop(){
for(var i=0;i<hearts.length;i++){
if(hearts[i].alpha <=0){
document.body.removeChild(hearts[i].el);
hearts.splice(i,1);
continue;
}
hearts[i].y--;
hearts[i].scale += 0.004;
hearts[i].alpha -= 0.013;
hearts[i].el.style.cssText = "left:"+hearts[i].x+"px;top:"+hearts[i].y+"px;opacity:"+hearts[i].alpha+";transform:scale("+hearts[i].scale+","+hearts[i].scale+") rotate(45deg);background:"+hearts[i].color;
}
requestAnimationFrame(gameloop);
}
function attachEvent(){
var old = typeof window.onclick==="function" && window.onclick;
window.onclick = function(event){
old && old();
createHeart(event);
}
}
function createHeart(event){
var d = document.createElement("div");
d.className = "heart";
hearts.push({
el : d,
x : event.clientX - 5,
y : event.clientY - 5,
scale : 1,
alpha : 1,
color : randomColor()
});
document.body.appendChild(d);
}
function css(css){
var style = document.createElement("style");
style.type="text/css";
try{
style.appendChild(document.createTextNode(css));
}catch(ex){
style.styleSheet.cssText = css;
}
document.getElementsByTagName('head')[0].appendChild(style);
}
function randomColor(){
return "rgb("+(~~(Math.random()*255))+","+(~~(Math.random()*255))+","+(~~(Math.random()*255))+")";
}
})(window,document);
</script>
