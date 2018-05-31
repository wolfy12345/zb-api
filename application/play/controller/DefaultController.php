<?php
/**
 * Created by PhpStorm.
 * User: chenfh
 * Date: 2017/10/25
 * Time: 14:15
 */

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }
}