<?php 

class ThreadsControler extends Controler
{
    public function process ($parameters)
    {
        
        $threadManager = new ThreadManager ();
       
       
        
        if(!empty($parameters[0]))
        {
           

            $thread = $threadManager->getThreadByIdWithAuthor($parameters[0]);
                if (!$thread){
                    $this->redirect('error');
                    echo "hi there";}

            $commentmanager = new CommentManager ();    
            $comments = $commentmanager->getAllByThreadWithAuthors("5");

            $this->headerN=array(
                'title' => $thread['name'],
                'keyWords' => "some thread",
                'description' => "see content to know more");

            $this->data['name'] = $thread['name'];
            $this->data['author']= $thread['username'];
            $this->data['content']= $thread['content'];
            $this->data['comments']=$comments;

                
            
            $this->viewName = 'thread';
        }
        else 
        {
            $threads= $threadManager->getAllByDateWithAuthors();
            
            $this->data['threads']=$threads;
            
            $this->viewName = 'threads';
        }

        
    }
    
}