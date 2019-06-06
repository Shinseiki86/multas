<!DOCTYPE html>
<html lang="es">
	<head>
		<title>UNIAJC - Sistemas de Información</title>
        
        <meta charset="utf-8" />        
       	<link rel="stylesheet" href="assets/css/login.css" />		
        
</head>
<div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div id="logo-container"></div>
      <div class="col-sm-12 col-md-10 col-md-offset-1">
    <form class="form-signin" id="login" name="login" action="#" method="POST">       
      <h2 class="form-signin-heading">Login</h2>
      <input type="text" class="form-control" name="usuario" placeholder="Usuario" required autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required />      
      <label class="checkbox">
        <!--<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me-->
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
	 
</div>
</div>
</div>
</div>

<?php
  $ok = false;
  require_once 'model/login.php';

  if($_GET && isset($_GET["close"])){
    if($_GET["close"])
      session_destroy();
      $usuario = null;
      header('Location: ./');
  }
  
  if (!isset($_SESSION)) { session_start(); }

  if($_POST){
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $_SESSION["login"] = false;
     foreach($this->model->ListaUsuario($usuario) as $r){

      if(($r->nombre != null and $r->password != null) ){
        echo $r->nombre;
         if(strtoupper($r->nombre) == strtoupper($usuario) and $r->password == $password){

      		  $_SESSION["user"] = $usuario;
            $_SESSION["rol"] = $r->tipo_usuario; //0 = admin, 1 = user
            $_SESSION["login"] = true;
            header('Location: ./');

         }else{
			
        }
      }
    }
  }

    if(isset($_SESSION) and isset($usuario) and $_SESSION["login"] == false){
            echo '<div class="alert alert-danger" role="alert">' .
                '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true""></span> ' .
                '<span class="sr-only">Error: </span>' .
                'Datos del usuario '.$usuario.' no válidos!' .
                '</div>';
    }
?>