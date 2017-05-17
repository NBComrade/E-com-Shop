<?php
namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\Article;

class ArticleWidget extends Widget
{
    protected $content;
    protected $articlesTemplate;
    const DURATION_CACHE =360;
    const ARTICLE_LIMIT = 4;
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $articles = Yii::$app->cache->get('articles');
        if(!empty($articles)) return $articles;
        $this->content = Article::find()->orderBy('created_at')->limit(self::ARTICLE_LIMIT)->all();
        $this->articlesTemplate = $this->toTemplate($this->content);
        Yii::$app->cache->set('articles', $this->articlesTemplate, self::DURATION_CACHE);
        return $this->articlesTemplate;
    }
    protected function toTemplate($articles){
        ob_start();
        include __DIR__ . '/article_tpl/widget.php';
        return ob_get_clean();
    }
}
