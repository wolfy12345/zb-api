<?php
namespace app\api\controller;

use app\api\model\ZbAd;
use think\Controller;
use think\facade\Config;

class Ad extends Controller
{
    private $pageSize = 3;

    public function getAdList()
    {

        $zbCat = new ZbAd();
        $list = $zbCat->field("ad_id, title, logo, link")->where('disabled', 'false')->order('p_order ' . SORT_ASC)->limit($this->pageSize)->select();

        $img_url = Config::get("img_host");
        $list->each(function($item, $key) use ($img_url) {
            $item->logo = $img_url . $item->logo;
        });

        return json(['data'=> ['list' => $list], 'code'=>200]);
    }
}
