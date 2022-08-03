# Forum
Clasic forum for learning new stuff

# Class diagram 

```plantUML

class User
{
    -id
    - username: string
    - name: string
    - surname: string
    - email: email
    - birtdate: date
    - passwod
    - thread: Thread []
    - comments: Comment []
    + getUsername()
    + getUserInformation()
    + getAge()
    + getTreadList()
    + getComentList()
}





AdminUser -|> User
AdminUser "1"--"*" Section: > createSection()

class AdminUser
{

}
/'
interface RatebleEntity
{
    - author: User
    - content: string
    - date: date
    - reactions: Reactions []
    + rateEntity()

}

    RatebleEntity <-- Thread
    RatebleEntity <-- Comment
    RatebleEntity <|-- ConcreateBehaver

'/


    class Thread
    {   
        - id
        - author: User_id
        - content: string
        - date: date
        - name: string
        - section: Section
        + getName()
    }





User "1"--"*" Thread

 /'
        (User,Thread) .. UserToThread
        class UserToThread 
        {
            - user_id: int
            - thread_id: int
            
            
        }

'/

class Comment
{
    - id
    - author: User_id
    - content: string
    - date: date
    - reactions: Reaction []
    - thread_id: int
    - modified: boolean
    + modifyContent ()
    + addReaction()
}
User "1"--"*" Comment
(User,Comment) .. UserToCommentReacting
class UserToCommentReacting
{
    - user_id: int
    - comment_id: int
    - reaction_id: int
    
}


Thread o-"*" Comment: > contain

Section o--"*" Thread: > contain
Section o-"*" Section: > contain


UserToCommentReacting "*"--"*" Reaction

class Reaction 
{
    - id: int
    - name: string
    - emoji: string
    + getId()

}





class Section
{
    - name
    - description
    
}

```