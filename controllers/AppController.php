<?php
namespace app\controllers;
use yii\base\Controller;

class AppController extends Controller
{
    public function setMeta($title = null, $keywords = null, $desc = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$desc"]);
    }
}