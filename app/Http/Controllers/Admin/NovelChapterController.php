<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NovelChapter;
class NovelChapterController extends Controller
{
    //
    //小说章节添加页面
    public function create($id)
    {
        $assign['novel_id'] = $id;
        return view('admin.novel.chapterCreate',$assign);
    }
    //保存章节
    public function store(Request $request)
    {
        $params = $request->all();
        $chapter = new NovelChapter();
        unset($params['_token']);
        $res = $chapter->addRecord($params);
        if(!$res){
            return redirect('/admin/nove/chapter/add/'+$params['novel_id']);
        }
        return redirect('/admin/novel/list');
    }
    //获取章节列表
    public function list($novelId = 0)
    {
        $chapter = new NovelChapter();
        $assign['chapter_list'] = $chapter->getLists($novelId);
        return view('admin.novel.chapterList', $assign);
    }
    //编辑页面
    public function edit($id)
    {
        $chapter = new NovelChapter();
        $assign['chapter'] = $chapter->getChapter($id);
        return view('admin.novel.chapterEdit',$assign);
    }
    //执行编辑
    public function doEdit(Request $request)
    {
        $params = $request->all();
        $chapter = new NovelChapter();
        $id = $params['id'];//获取主键id
        unset($params['_token']);
        $res = $chapter->editRecord($params,$id);
        if(!$res){
            return redirect('/admin/nove/chapter/edit/'+$params['novel_id']);
        }
        return redirect('/admin/novel/chapter/list/'.$params['novel_id']);
    }
    //章节删除
    public function del($id)
    {
        $chapter = new NovelChapter();
        $chapter->delRecord($id);
        return redirect('/admin/novel/chapter/list');
    }
}