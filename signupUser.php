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
</head>
<body>
    <form action="#" method="post">
        <fieldset>
            <fieldset class="grupo">
                <div class="campo">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" style="width: 10em" value="">
                </div>
                <div class="campo">
                    <label for="snome">Sobrenome</label>
                    <input type="text" id="snome" name="snome" style="width: 10em" value="">
                </div>
            </fieldset>
            <div class="campo">
                <label>Sexo</label>
                <label>
                    <input type="radio" name="sexo" value="masculino"> Masculino
                </label>
                <label>
                    <input type="radio" name="sexo" value="feminino"> Feminino
                </label>
            </div>
            <div class="campo">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" style="width: 20em" value="">
            </div>
            <div class="campo">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" style="width: 10em" value="">
            </div>

            <fieldset class="grupo">
                    <!--<div class="campo">
                        <label for="cidade">Cidade</label>
                        <input type="text" id="cidade" name="cidade" style="width: 10em" value="">
                    </div>-->
                    <div class="campo">
                        <label for="estado">Nível de acesso</label>
                        <select name="nivel" id="nivel">
                            <option value="">--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </fieldset>

                <div class="campo">
                    <label for="telefone">Senha</label>
                    <input type="password" id="password" name="password" style="width: 10em" value="">
                </div>

                <!--<div class="campo">
                    <label for="mensagem">Mensagem</label>
                    <textarea rows="6" style="width: 20em" id="mensagem" name="mensagem"></textarea>
                </div>

                <div class="campo">
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
