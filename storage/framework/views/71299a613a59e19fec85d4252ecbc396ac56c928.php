<?php $__env->startSection('title','管理后台商品列表'); ?>


<!--页面顶部信息-->
<?php $__env->startSection('pageHeader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 商品列表 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <a class="btn btn-sm btn-danger" href="/admin/goods/add">+ 添加新商品</a>
             <a class="btn btn-sm btn-success" href="/admin/goods/export">商品导出</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo e(csrf_field()); ?>

    <div class="row" id="goods_list">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary  mb30">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名称</th>
                        <th>货号</th>
                        <th>价格</th>
                        <th>上架</th>
                        <th>推荐</th>
                        <th>热销</th>
                        <th>新品</th>
                        <th>推荐排序</th>
                        <th>库存</th>
                        <th>状态</th>
                        <th class="col-md-2">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="goods in goods_list">
                        <td>{goods.id}</td>
                        <td>{goods.goods_name}</td>
                        <td>{goods.goods_sn}</td>
                        <td>{goods.market_price}</td>
                        <td>
                            <button class="btn btn-sm btn-success" v-if="goods.is_shop ==1" @click="changeAttr(goods.id,'is_shop', 2)">是</button>
                            <button class="btn btn-sm btn-black" v-else  @click="changeAttr(goods.id,'is_shop', 1)">否</button>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-success" v-if="goods.is_recommand==1" @click="changeAttr(goods.id,'is_recommand', 2)">是</button>
                            <button class="btn btn-sm btn-black" v-else @click="changeAttr(goods.id,'is_recommand', 1)">否</button>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-success" v-if="goods.is_hot ==1" @click="changeAttr(goods.id,'is_hot', 2)">是</button>
                            <button class="btn btn-sm btn-black" v-else @click="changeAttr(goods.id,'is_hot', 1)">否</button>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-success" v-if="goods.is_new ==1" @click="changeAttr(goods.id,'is_new', 2)">是</button>
                            <button class="btn btn-sm btn-black" v-else @click="changeAttr(goods.id,'is_new', 1)">否</button>
                        </td>
                        <td>{goods.sort}</td>
                        <td>{goods.goods_num}</td>
                        <td>
                            <button class="btn btn-sm btn-success" v-if="goods.status ==2" @click="changeAttr(goods.id,'status', 1)">已审核</button>
                            <button class="btn btn-sm btn-black" v-else @click="changeAttr(goods.id,'status', 2)">未审核</button>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary" :href="'/admin/goods/sku/edit/'+goods.id">属性</a>
                            <a class="btn btn-sm btn-success" :href="'/admin/goods/edit/'+goods.id">编辑</a>
                            <button class="btn btn-sm btn-danger" @click="goodsDel(goods.id)">删除</button>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <!--分页-->
                <ul class="pagination" v-if="total_page >1">
                    <li v-bind:class="current_page <=1 ? 'disabled' :''" @click="prevPage"><span>«</span></li>
                    <li v-for="num in total_page" :class="current_page == num ? 'active' : ''" @click="currentPage(num)"><span>{num}</span></li>
                    <li v-bind:class="current_page >= total_page ? 'disabled' :''" @click="nextPage"><a href="#" rel="next">»</a></li>
                </ul>
            </div><!-- table-responsive -->
        </div>
    </div>
    <script src="/js/vue.js"></script>
    <script type="text/javascript">
        var goods_list = new Vue({
            el: "#goods_list",
            delimiters: ['{','}'],
            data: {
                goods_list: [],
                current_page: 1,
                total_page: 1,
            },
            //构造函数
            created:function(){
                this.getGoodsList();
            },
            methods: {
                //获取商品列表数据
                getGoodsList: function(){
                    var that = this;
                    $.ajax({
                        url: "/admin/goods/data/list",
                        type: "get",
                        data: {_token: $("input[name=_token]").val(),page: that.current_page},
                        dataType:"json",
                        success: function(res){
                            if(res.code == 2000){
                                that.goods_list = res.data.list;
                                that.current_page = res.data.current_page;
                                that.total_page = res.data.total_page;
                            }
                        }
                    })
                },
                //上一页
                prevPage: function()
                {
                    if(this.current_page <=1){
                        return false;
                    }
                    this.current_page = this.current_page - 1;
                    this.getGoodsList();
                },
                //下一页
                nextPage: function(){
                    if(this.current_page >= this.total_page){
                        return false;
                    }
                    this.current_page = this.current_page + 1;
                    this.getGoodsList();
                },
                //当前页
                currentPage(page){
                    this.current_page = page;
                    this.getGoodsList();
                },
                //修改商品属性
                changeAttr: function(id,key,val){
                    var that = this;
                    $.ajax({
                        url: "/admin/goods/change/attr",
                        type: "post",
                        data: {
                            _token: $("input[name=_token]").val(),
                            id:id,
                            key:key,
                            val:val
                        },
                        dataType:"json",
                        success: function(res){

                            if(res.code == 2000){
                                that.getGoodsList();
                            }
                        }
                    })
                },
                //执行删除的操作
                goodsDel:function(id){
                    var that = this;
                    $.ajax({
                        url: "/admin/goods/del/"+id,
                        type: "get",
                        data: {},
                        dataType:"json",
                        success: function(res){
                            if(res.code == 2000){
                                that.getGoodsList();
                            }
                        }
                    })
                }
            }
        })
    </script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.admin_base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>