<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<?php 
session_start();

$USER = 'admin';
$PASS = '123'; // password bebas, misal 123

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == $USER && $password == $PASS){
        $_SESSION['login'] = true;
        header("location:index.php");
    } else {
        echo "Login gagal! Username atau Password salah.";
    }
}
?>

<h1>Login Admin</h1>

<form method="POST" action="">
    Username : <input type="text" name="username"><br><br>
    Password : <input type="password" name="password"><br><br>
    <button type="submit" name="login">Login</button>
</form>
