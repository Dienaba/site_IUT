<?php
$login = $_POST['login'];
$mdp = $_POST['password'];
if ($login == '') {
	header('location: error.php?erreur=1');
}elseif ($mdp == ''){
	header('location: error.php?erreur=2');
}else{
	setCookie('login', $login, time() + 1*24*60*60);
	setCookie('password', $mdp, time() + 1*24*60*60);
}
require_once('connexion.php');
$req = "SELECT * FROM admin WHERE login = '$login' AND password = '$mdp'";
$result = mysql_query($req) or die ('Erreur SQL !<br>'.$req.'<br>'.mysql_error);

if ($user=mysql_fetch_assoc($result)) {
    session_start();
    $_COOKIE['login'] = $user['login'];
    header("location:bienvenue.php");
    
}else{
    setcookie ("login", $login, time() - 3600); 
    setcookie ("password", $mdp, time() - 3600);
    header("location:index.php");
}
 
?>