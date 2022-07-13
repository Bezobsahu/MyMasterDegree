# Forum
Clasic forum for learning new stuff

# Class diagram 

```plantUML

class User
{
    - username: string
    - name: string
    - surname: string
    - email: email
    - birtdate: date
    - passwod
    + getUsername()
    + getUserInformation()
    + getAge()
}

User o--"*" Thread: > createTread()
User --"*" Thread: > rateTread()
User "1"--"*" Comment: > createComent()

AdminUser -|> User
AdminUser "1"--"*" Section: > createSection()

class AdminUser
{

}

class Features
{
    - author: User
    - name: string
    - content: string
    - date: date
    - rating: Rating
}
Features <|-- Thread
class Thread
{   
    - section: Section
    + getName()
}
Features <|-- Comment
class Comment
{
    - author: User
    - thread: Thread
    - modified
    + modifyContent ()

}
Thread o-"*" Comment: > contain
Section o--"*" Thread: > contain
Section o-"*" Section: > contain

class Rating
{
    - positiveRating: int
    - negativeRating: int
    + getRating()
    + addRatingVote()
}



class Section
{
    - name
    - description
    
}

```