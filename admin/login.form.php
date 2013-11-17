<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Login - &Aacute;rea Administrativa</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

        <style>
            body {
                background-color: #eee;
            }
            .mensagem {
                font-family: Verdana, Geneva, sans-serif;
                font-size: 12px;
                color: #cc0000;
                margin-left: 10px;
            }
            .caixalogin {
                width: 250px;
                margin: auto;
                margin-bottom: 5px;
                margin-top: 5px;
            }
            input {
                margin-bottom: 10px;
            }
            #titulo {
                color:#207ebf;
                margin-left: 10px;
                font-size: 1.1em;
            }
        </style>
    </head>
    <body>
        <div class="caixalogin">
        <div id="titulo">Login Área Administrativa</div>
        <br/>
        <form name="form1" id="form1" method="post" action="./"
              class="forms">
            <fieldset>
                <label for="email">Email:</label>
                <input name="email" type="text" id="email"
                       value="" size="20"  maxlength="20">
                <br/>
                <label for="senha">Senha:</label>
                <input name="senha" type="password" id="senha"
                       value="" size="20"
                       maxlength="20">
                <br/>
                <input type="submit" name="btnOk" id="btnOk"
                       value="OK">
            </fieldset>
        </form>
        <div class="mensagem">
            <?php
            if (isset($_GET['erro'])) {
                echo "Login ou senha inválido! Tente novamente!";
            }
            ?>
        </div>
        </div>
    </body>
</html>
