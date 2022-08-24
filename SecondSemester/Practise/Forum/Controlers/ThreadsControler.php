<?php 

class ThreadsControler extends Controler
{
    public function process ($parameters)
    {
        
        $threadManager = new ThreadManager ();
        $userManager = new UserManager();
       
       
        
        if(!empty($parameters[0]))
        {
           

            $thread = $threadManager->getById($parameters[0]);
                if (!$thread){
                    $this->redirect('error');
                    }

            $threadId = $thread->getId();

            $commentmanager = new CommentManager ();    
            $comments = $commentmanager->getAllByThread($threadId);
            var_dump($threadId);
            $this->headerN=array(
                'title' => $thread->getName(),
                'keyWords' => "some thread",
                'description' => "see content to know more");

            $user = $userManager->getUserWithId($thread->getUser_id());
            
            $this->data['name'] = $thread->getName();
            $this->data['author']= $user->getUsername();
            $this->data['content']= $thread->getContent();
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