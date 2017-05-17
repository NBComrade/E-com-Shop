<?php

namespace app\components;

use yii\base\Widget;
use app\models\Category;
use Yii;

class CategoryWidget extends Widget
{
    protected $content;
    protected $categoryTemplate;
    const DURATION_CACHE = 360;
    const CATEGORY_LIMIT = 7;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $categories = Yii::$app->cache->get('category');
        if(!empty($categories)) return $categories;
        $this->content = Category::find()->where('parent_id > 1')->limit(self::CATEGORY_LIMIT)->all();
        $this->categoryTemplate = $this->toTemplate($this->content);
        Yii::$app->cache->set('category', $this->categoryTemplate, self::DURATION_CACHE);
        return $this->categoryTemplate;
    }
    protected function toTemplate($content){
        ob_start();
        include __DIR__ . '/category_tpl/category.php';
        return ob_get_clean();
    }
}