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
            $list = $zbContent->field("content_id, title, img_icon, content, name, page_type, take_num")->where('disabled', 'false')->order('p_order ' . SORT_ASC)->paginate($this->pageSize);
        } else {
            $list = $zbContent->field("content_id, title, img_icon, content, name, page_type, take_num")->where('disabled', 'false')->where('cat_id', $catId)->order('p_order ' . SORT_ASC)->paginate($this->pageSize);
        }
        $list->each(function ($item) use ($img_url) {
            $item->img_icon = $img_url . $item->img_icon;
        });

        return json(['data' => ['list' => $list->getCollection(), 'page' => $list->currentPage(), 'total' => $list->total()], 'code' => 200]);
    }

    public function getTestedList(Request $req)
    {
        $img_url = Config::get("img_host");
        $testedList = $req->param('testedList');
        $testedListArr = json_decode($testedList, true);

        $zbContent = new ZbContent();
        $list = $zbContent->field("content_id, title, img_icon, content, name, page_type, take_num")->whereIn('content_id', $testedListArr)->order('take_num ' . SORT_ASC)->select();
        $list->each(function ($item) use ($img_url) {
            $item->img_icon = $img_url . $item->img_icon;
        });

        return json(['data' => ['list' => $list], 'code' => 200]);
    }

    public function getRecommendList()
    {
        $img_url = Config::get("img_host");

        $zbContent = new ZbContent();
        $list = $zbContent->field("content_id, title, img_icon, content, name, page_type, take_num")->where('disabled', 'false')->where('is_recommend', 1)->order('take_num ' . SORT_ASC)->limit(3)->select();
        $list->each(function ($item) use ($img_url) {
            $item->img_icon = $img_url . $item->img_icon;
        });

        return json(['data' => ['list' => $list], 'code' => 200]);
    }

    public function getContentDetail(Request $req)
    {
        $img_url = Config::get("img_host");
        $contentId = $req->param("contentId", 0);

        $zbContent = new ZbContent();
        $detail = $zbContent->field("content_id, title, name, img_icon, img_example, content, page_type, input_list, img_bg")->where('content_id', $contentId)->find();
        $detail['img_icon'] = $img_url . $detail['img_icon'];
        $detail['img_example'] = !empty($detail['img_example']) ? $img_url . $detail['img_example'] : '';
        $detail['img_bg'] = !empty($detail['img_bg']) ? $img_url . $detail['img_bg'] : '';

        return json(['data' => ['detail' => $detail], 'code' => 200]);
    }
}
