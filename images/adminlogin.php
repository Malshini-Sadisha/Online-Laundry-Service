<?php
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username=='admin'&&password=='admin'){
        echo"<script>setTimeout(\"location.href='../php/C:\xampp\htdocs\web site\manage inventory.html';\",200);</script>";
    }
    else{
        echo"<script>alert('Login Failed')</script>";
        echo"<script>setTimeout(\"location.href='../html/Land.html';\",500);</script>";

    }

}
?>