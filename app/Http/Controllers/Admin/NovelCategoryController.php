<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NovelCategory;
class NovelCategoryController extends Controller
{
    //
	//分类列表
    public function list()
    {
    	$category = new NovelCategory();
    	$assgin['categorys'] = $category->getLists();
    	return view('admin.novel.categoryList',$assgin);
    }
    //小说分类添加页面
    public function create()
    {
    	return view('admin.novel.categoryCreate');
    }
    //保存分类
    public function store(Request $request)
    {
    	$params = $request->all();
    	$data = [
    		'c_name' => $params['c_name'] ?? "",
    	];
    	$category = new NovelCategory();
    	$res = $category->addRecord($data);
    	if(!$res){
    		return redirect()->back();
    	}
    	return redirect('/admin/novel/category/list');
    }
    //删除分类
    public function del($id)
    {
    	$category = new NovelCategory();
    	$category->delRecord($id);
    	return redirect('/admin/novel/category/list');
    }
}