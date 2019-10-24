<?php
if($_SESSION['user_level'] != 1){

    echo "Usuário não está logado. Direcionando para a página de login.";
    header('Location: index.php');

}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">

        .grupo:before, .grupo:after {
            content: " ";
            display: table;
        }

        .grupo:after {
            clear: both;
        }

        .campo {
            margin-bottom: 1em;
        }

        .campo label {
            margin-bottom: 0.2em;
            color: #666;
            display: block;
        }

        fieldset.grupo .campo {
            float:  left;
            margin-right: 1em;
        }

        .campo input[type="text"],
        .campo input[type="email"],
        .campo input[type="url"],
        .campo input[type="tel"],
        .campo input[type="password"],
        .campo input[type="number"],
        .campo select,
        .campo textarea {
            padding: 0.2em;
            border: 1px solid #CCC;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            display: block;
        }

        .campo select option {
            padding-right: 1em;
        }

        .campo input:focus, .campo select:focus, .campo textarea:focus {
            background: #FFC;
        }

        .campo label.checkbox {
            color: #000;
            display: inline-block;
            margin-right: 1em;
        }

        .botao {
            font-size: 1.5em;
            background: #F90;
            border: 0;
            margin-bottom: 1em;
            color: #FFF;
            padding: 0.2em 0.6em;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
        }

        .botao:hover {
            background: #FB0;
            box-shadow: inset 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: none;
        }

        .botao, select, label.checkbox {
            cursor: pointer;
        }
    </style>
    <meta charset="UTF-8">
</head>
<body>
    <form action="userSignup.php" method="POST">
        <fieldset>
            <fieldset class="grupo">
                <div class="campo">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" style="width: 10em" value="">
                </div>
                <div class="campo">
                    <label for="lastName">Sobrenome</label>
                    <input type="text" id="lastName" name="lastName" style="width: 10em" value="">
                </div>
            </fieldset>
            <div class="campo">
                <label>Sexo</label>
                <label>
                    <input type="radio" name="gender" value="masculino"> Masculino
                </label>
                <label>
                    <input type="radio" name="gender" value="feminino"> Feminino
                </label>
            </div>
            <div class="campo">
                <label for="telephone">Telefone</label>
                <input type="Tel" id="telephone" name="telephone" style="width: 10em" value="">
            </div>

            <fieldset class="grupo">
                <!--<div class="campo">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" style="width: 10em" value="">
                </div>-->
                <div class="campo">
                    <label for="level">Nível de acesso</label>
                    <input type="number" name="level" min="1" max="2">
                </div>
            </fieldset>

            <div class="campo">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" style="width: 20em" value="">
            </div>

            <div class="campo">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" style="width: 10em" value="">
            </div>


                <!--<div class="campo">
                    <label>Newsletter</label>
                    <label>
                        <input type="checkbox" name="newsletter" value="1"> Gostaria de receber a Newsletter da empresa
                    </label>
                </div>-->
                <button type="submit" name="submit">Enviar</button>
            </fieldset>
        </form>
    </body>
    </html>
