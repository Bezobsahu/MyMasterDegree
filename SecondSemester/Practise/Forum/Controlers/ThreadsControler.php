<?php 

class ThreadsControler extends Controler
{
    public function process ($parameters)
    {
        
        $threadManager = new ThreadManager ();
        $userManager = new UserManager();
        $sectionManager = new SectionManager();
       

        if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' && $_SESSION["login"]=== true)
        {
            if ($_POST["comment-content"])
            {
            $commentManager = new CommentManager ();
            $commentManager->add($_SESSION["id"],$parameters[0],$_POST["comment-content"]);}
            

        }

        if(!empty($parameters[0]))
        {
           

            $thread = $threadManager->getById($parameters[0]);
                if (!$thread){
                    $this->redirect('error');
                    }

            $threadId = $thread->getId();

            $commentManager = new CommentManager ();
            $comments = $commentManager->getAllByThread($threadId);
            
            $this->headerN=array(
                'title' => $thread->getName(),
                'keyWords' => "some thread",
                'description' => "see content to know more");

            $user = $userManager->getUserWithId($thread->getUser_id());
            
            $this->data['name'] = $thread->getName();
            $this->data['author']= $user->getUsername();
            $this->data['author_id']= $user->getId();
            $this->data['content']= $thread->getContent();
            $this->data['section']=$sectionManager->getById($thread->getSection());
            $this->data['comments']=$comments;

                
            
            $this->viewName = 'thread';
        
        }

        else 
        {
            $threads= $threadManager->getAllDateOrder();
            
            $this->data['threads']=$threads;
            
            $this->viewName = 'threads';
        }

        
    }
    
}