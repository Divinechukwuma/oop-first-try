<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<form action="" method="POST" class="parent">
    <fieldset><h1>Sign up </h1>
    <label for="name"> Name</label>
    <input type="text" placeholder="Yourname" name="name">
    <label for="Password">Password</label>
    <input type="password" placeholder="Your password" name="password">
    <label for="Confirm-Password">Confirm Password</label>
    <input type="password" placeholder="Confirm password" name="confirmPassword">
    <a href="#">Login</a>
    <a href="#">Sign Up</a>
    <button name="submit">submit</button>
</fieldset>
</form>

<?php

include  "config/data.php";

//usage 

$database = new Database('localhost', 'divine-store', 'CHUKS989', 'divine-store');
$database->connect();


//class 

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match!";
        exit;
    }
    
class User{

    //properties
    public $name;
    public $password;
    public $confirmPassword;

    //Constructor
    function __construct($name,$password,$confirmPassword)
    {
        $this->name = $name;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }



    //method
    function set_name($name){
        $this->name = $name;
    }

    function get_name(){
        return $this->name;
    }

    function set_password($password){
        $this->password = $password;
    }

    function get_password(){
        return $this->password;
    }

    function set_confirmPassword($confirmPassword){
        $this->confirmPassword = $confirmPassword;
    }

    function get_confirmPassword(){
        return $this->confirmPassword;
    }

 
}

 //initiate a user object giving values from outside the class
 // Generate password hash
 $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
 $hashedConfirmPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
 //use this to get the data from the class
 $user = new user($name,$password,$confirmPassword);

 //this 1 is overwiting the form input
//  $name = new user();
//  $password = new user();
//  $confirmPassword = new user();

//  $name->set_name($name);
//  $password->set_password($password);
//  $confirmPassword->set_confirmPassword($confirmPassword);
 
//  echo $user->get_name();
//  echo "<br>";
//  echo $user->get_password();
//  echo "<br>";
//  echo $user->get_confirmPassword();
$sql = "INSERT INTO tbl_signup  (name,password,confirmPassword) Values(?, ?, ?)";
// Execute prepared statement with parameters
$database->executePreparedStatement($sql, [$name, $hashedPassword, $hashedConfirmPassword]);

// Close connection
$database->closeConnection();

}

?>
    
</body>
</html>