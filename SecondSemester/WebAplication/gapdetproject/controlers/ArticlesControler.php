<?php
class ArticlesControler extends Controler
{
    public function process ($parameters)
    {
        //vytvoření nové instance (případu) modelu, který umožnuje práci s články
        $articleManager = new ArticleManager();     
        
        if(!empty($parameters[0]))
        {
            //získání článku podle url
            $article = $articleManager->returnArticle($parameters[0]);
            if (!$article)
                $this->redirect('error');
            
            //hlavička stránky
            $this->headerN=array(
                'title' => $article['title'],
                'keyWords' => $article['keyWords'],
                'description' => $article['description'],

            );


            // Naplnění proměnných pro šablonu
            $this->data['title'] = $article['title'];
            $this->data['content'] = $article['content'];

            $this->viewName = 'article';
        }
        else
        {
            $articles=$articleManager->returnAllArticles();
            $this->data['articles']=$articles;
            $this->viewName = 'articles';
        }
    }
}