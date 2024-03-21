<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up form</title>
</head>
<body>

<form action="" method="POST" class="parent">
    <fieldset><h1>Sign up </h1>
    <label for="name"> Name</label>
    <input type="text" placeholder="Yourname" name="name">
    <label for="Password">Password</label>
    <input type="text" placeholder="Your password" name="password">
    <label for="Confirm-Password">Confirm Password</label>
    <input type="text" placeholder="Confirm password" name="confirmPassword">
    <a href="#">Login</a>
    <a href="#">Sign Up</a>
    <button name="submit">submit</button>
</fieldset>
</form>

<?php

//class 
class User{

    //properties
    public $name;
    public $password;
    public $confirmPassword;

    //method
    function set_name($name){
        $this->name = $name;
    }

    function get_password($password){
        return $this->password = $password;
    }

    function get_confirmPassword($confirmPassword){
        return $this->confirmPassword = $confirmPassword;
    }

    //initiate a user object giving values from outside the class

}
$user = new user("name","password","confirmPassword");


?>
    
</body>
</html>