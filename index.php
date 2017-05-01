<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 30/04/2017
 * Time: 21:39
 */
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="frameworks/bootstrap/css/bootstrap.min.css">
    <script src="frameworks/jquery/jquery.min.js"></script>
    <script src="frameworks/bootstrap/js/bootstrap.min.js"></script>
    <style>
        body{
            background: whitesmoke;
        }
        div#logo{
            height: 20vh;
            width: calc(20vh * 1.6849315068493150684931506849315);
            margin-left: auto;
            margin-right: auto;
            margin-top: 5vh;
        }
        div#logo img{
            height: 100%;
            border-radius: 10%;
        }
        div#coruja{
            text-align: center;
            margin-top: 2.5vh;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 30px;
        }
        div#login{
            width: 20vw;
            margin-left: auto;
            margin-right: auto;
            margin-top: 7.5vh;
            background: white;
            padding: 30px 30px 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 30px 5px rgba(50, 50, 50, 0.75);
        }
        div.form-group{
            width: 75%;
            margin-left: auto;
            margin-right: auto;
        }
        div#login input.submit{
            width: 50%;
            margin-left: 25%;
            margin-right: auto;
        }
        a#para-esqueci-senha{
            margin-top: 5px;
            float: right;
        }
        a#para-principal{
            margin-top: 5px;
            float: right;
        }
    </style>
</head>
<body>
<header>
<div id="logo">
    <img src="logo.png">
</div>
<div id="coruja">
    Coruja
</div>
</header>
<div id="login">
    <legend>Login</legend>
    <div id="principal">
        <form action="Controller/Dispatcher.php?classe=Pedagogo&acao=logar" method="post">
            <div class="input-group margin-bottom-sm form-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input name="Usuario" type="text" placeholder="Email ou Usuário" class="form-control">
            </div>
            <div class="input-group form-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input name="Senha" type="password" placeholder="Senha" class="form-control login-field">
            </div>
            <input href="#" type="submit" class="btn btn-success modal-login-btn submit" value="Login"/>
        </form>
        <br/>
        <a href="#" id="para-esqueci-senha">Esqueceu sua senha?</a>
    </div>
    <div id="esqueci-senha">
        <form action="Controller/Dispatcher.php?classe=Pedagogo&acao=trocarSenha" method="post">
        <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            <input name="Email" type="email" placeholder="Email" class="form-control login-field">
        </div>
            <input href="#" type="submit" class="btn btn-success modal-login-btn submit" value="Enviar"/>
        </form>
        <br/>
        <a href="#" id="para-principal">Login</a>
    </div>
</div>

<script type="text/javascript">

    $(function(){

        $("#esqueci-senha").hide();

        //Abrindo Esqueci minha Senha
        $("#para-esqueci-senha").click(function(){
            $("#principal").fadeOut(250, function(){
                $("#esqueci-senha").fadeIn(250)
            });
            $("legend").text('Esqueci minha Senha');
            return false;
        });
        //Voltando para o Principal
        $("#para-principal").click(function(){
            $("#esqueci-senha").fadeOut(250, function () {
                $("#principal").fadeIn(250);
            });
            $("legend").text('Login');
            return false;
        });

    })
</script> <!-- Java-script Menu -->
</body>
</html>