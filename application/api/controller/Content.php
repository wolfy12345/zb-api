<?php
namespace app\api\controller;

use app\api\model\ZbContent;
use think\Controller;
use think\Request;

class Content extends Controller
{
    private $pageSize = 10;

    public function getContentList(Request $req)
    {
        $catId = $req->param("catId", 0);

        $zbContent = new ZbContent();
        if($catId == 0) {
            $list = $zbContent->field("content_id, title, img_icon")->where('disabled', 'false')->order('p_order ' . SORT_ASC)->paginate($this->pageSize);
        } else {
            $list = $zbContent->field("content_id, title, img_icon")->where('disabled', 'false')->where('cat_id', $catId)->order('p_order ' . SORT_ASC)->paginate($this->pageSize);
        }

        return json(['data'=> ['list' => $list->getCollection(), 'page'=> $list->currentPage(), 'total' => $list->total()], 'code'=>200]);
    }
}
