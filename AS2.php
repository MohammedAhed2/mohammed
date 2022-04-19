<?php 
if ($_SERVER['REQUEST_METHOD']=="POST")


{
    if(!$conecte_databez=new mysqli("localhost","root" ,"","assignmentt")){
        die('no connecct');
    }
    $info="";
    $name=NULL;
    $email=NULL;
    $age=NULL;
    $gender=NULL;
    


    if(!preg_match('/[\?\$\#\@\;\:\/\=\"\<\>\%\{\}\|\^\~\[\`\*\+0-9]+/',$_POST['name']) and !empty($_POST['name'])){
        $name=$_POST['name']; 
    }
    if(!empty($_POST['age']) and $_POST['age']>=10 and $_POST['age']<=30){
        $age=$_POST['age'];
    }
    if(!empty($_POST['gender'])){
        $gender=$_POST['gender'];
    }
    if(!empty($_POST['email']) and preg_match('/[\W\_]*@[a-zA-Z]*\.[a-zA-Z]*/',$_POST['email'])){
        $email=$_POST['email'];
    }
    if($name!=NULL and $age !=NULL and $gender !=NULL and $email !=NULL){
        if($conecte_databez->query("INSERT INTO stydant (name, age, gender, email) VALUES ('$name' , '$age' , '$gender' , '$email')") === TRUE){
            $info = "done!";
        }else{
            echo " erorr";  
        }
    }else{
        echo "Invalid data";
    }
}
?>
<form action="" method="post">
              
    <label>
        NAME :  
        <input type="text" placeholder="enter the name" name="name">
    </label>
    <label>
        AGE :
        <input type="text" placeholder="enter the age" name="age">
    </label>
    <label>
         EMAIL :
        <input type="text" placeholder="enter the email" name="email">
    </label>
    <p class ="prgraf">enter the ender</p>
    <label>
        <input type="radio" class="input_gender" name="gender" value="female">
        female
        </label><br>
    <label>
        <input type="radio" class="input_gender" name="gender" value="male">
        male
    </label><br>
    <input type="submit" value="check">
</form>


