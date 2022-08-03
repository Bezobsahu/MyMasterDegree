<?php 

class ArticleManager
{
    public function returnArticle($url)
    {
        return Db::queryOne ('
        SELECT `articles_id`, `title`, `content`, `url`, `description`, `keyWords`
        FROM `articles`
        WHERE `url` = ?         
    ', array($url));
    }

    public function returnAllArticles()
    {
        return Db::queryAll('
            SELECT `articles_id`, `title`, `content`, `url`, `description`, `keyWords`
            FROM `articles`
            ORDER BY `articles_id` DESC
        ');
    }
    

}