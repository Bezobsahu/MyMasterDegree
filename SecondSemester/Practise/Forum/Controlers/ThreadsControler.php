<?php 

class ThreadsControler extends Controler
{
    public function process ($parameters)
    {
        
        $threadManager = new ThreadManager ();
        $userManager = new UserManager();
        $sectionManager = new SectionManager();
        $reactionManager = new ReactionManager();
       

        if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' && $_SESSION["login"]=== true)
        {
            if (isset($_POST["commentSub"]))
            {
            $commentManager = new CommentManager ();
            $commentManager->add($_SESSION["id"],$parameters[0],$_POST["comment-content"]);
            }
            elseif(isset($_POST["reactionSub"]))
            {
                $a=$reactionManager->getAll();
                $b=count($a);
            for($i=1;$i<=$b;$i++)
            {
              
                if (isset($_POST["reactionSub"][$i]))
                {
                    $commentId=$_POST["reactionSub"][$i];
                    $userToCommentReactingManager = new UserToCommentReactingManager;
                    $userToCommentReacting=$userToCommentReactingManager->getByUserComment($_SESSION["id"],$commentId);

                    if (is_null($userToCommentReacting))
                    {
                        $userToCommentReactingManager->add($_SESSION["id"],$commentId,$i);
                   
                    }
                    elseif($userToCommentReactingManager->getByUserCommentReaction($_SESSION["id"],$commentId,$i))
                    {
                        $userToCommentReactingManager->delete($_SESSION["id"],$commentId);
                     
                       
                    }
                    else
                    {
                        $userToCommentReactingManager->delete($_SESSION["id"],$commentId,$i);
                        $userToCommentReactingManager->add($_SESSION["id"],$commentId,$i);
                       
                    }
                    

                }
            }
            }
            

        }
        elseif (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' && $_SESSION["login"]=== false)
        {
        echo '<script>alert("Přidávat komentáře a reagovat mohou jen přihlášení uživatelé")</script>';
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
            $this->data['reactions']=$reactionManager->getAll();

                
            
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