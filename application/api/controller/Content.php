<?php
namespace app\api\controller;

use app\api\model\ZbContent;
use think\Controller;
use think\facade\Config;
use think\Request;

class Content extends Controller
{
    private $pageSize = 10;

    public function getContentList(Request $req)
    {
        $img_url = Config::get("img_host");
        $catId = $req->param("catId", 0);

        $zbContent = new ZbContent();
        if ($catId == 0) {
            $list = $zbContent->field("content_id, title, img_icon, content, name, page_type")->where('disabled', 'false')->order('p_order ' . SORT_ASC)->paginate($this->pageSize);
        } else {
            $list = $zbContent->field("content_id, title, img_icon, content, name, page_type")->where('disabled', 'false')->where('cat_id', $catId)->order('p_order ' . SORT_ASC)->paginate($this->pageSize);
        }
        $list->each(function ($item) use ($img_url) {
            $item->img_icon = $img_url . $item->img_icon;
        });

        return json(['data' => ['list' => $list->getCollection(), 'page' => $list->currentPage(), 'total' => $list->total()], 'code' => 200]);
    }

    public function getContentDetail(Request $req)
    {
        $img_url = Config::get("img_host");
        $contentId = $req->param("contentId", 0);

        $zbContent = new ZbContent();
        $detail = $zbContent->field("content_id, title, name, img_icon, img_example, content, page_type, input_list")->where('content_id', $contentId)->find();
        $detail['img_icon'] = $img_url . $detail['img_icon'];
        $detail['img_example'] = !empty($detail['img_example']) ? $img_url . $detail['img_example'] : '';

        return json(['data' => ['detail' => $detail], 'code' => 200]);
    }
}
