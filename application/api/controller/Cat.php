<?php
namespace app\api\controller;

use app\api\model\ZbCat;
use think\Controller;

class Cat extends Controller
{
    private $pageSize = 8;

    public function getCatList()
    {
        $zbCat = new ZbCat();
        $list = $zbCat->field("cat_id, cat_img, cat_name")->where('disabled', 'false')->order('p_order ' . SORT_ASC)->limit($this->pageSize)->select();

        return json(['data'=> ['list' => $list], 'code'=>200]);
    }
}
