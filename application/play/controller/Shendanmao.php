<?php
/**
 * 爱情成绩单
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Shendanmao
{
    /**
     * 入口页
     */
    public function index()
    {
       // $this->redirect($this->baseUrl.'/vchris/src/home/');
        $url = $this->baseUrl.'/vchris/src/home/';

        echo '<script>location.href="'.$url.'"</script>';
        die;
    }
}