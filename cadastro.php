<?php
    require_once '../Classes/usuario.php';
    $usuario = new Usuario();



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Estácio</title>
</head>
<body>
    <h2>CADASTRO DE USÚARIO</h2>
    <form action="" method="Post">
        <input type="text" name="nome" placeholder="Digite Seu Nome."><br>
        <input type="email" name="email" placeholder="Digite Seu Email."><br>
        <input type="tel" name="telefone" placeholder="Digite Seu Telefone."><br>
        <input type="pasword" name="password" placeholder="Digite Sua Senha."><br>
        <input type="pasword" name="confpassword" placeholder="Confirme sua Senha."><br>

        <input type="submit" value="Cadastrar"><br>
        <p>
            Já é cadastrado? Clique 
            <a href="login.php">Aqui</a> para acessar.
        </p>

        
    </form>

    <?php
        if(isset($_POST['nome']))
        {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            $confSenha = addslashes($_POST['confSenha']);

            //verificar se todos os campos foram preenchidos
            if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha))
            {
                $usuario->conctar("cadastrousuario", "localhost", "root", "");
                if($usuario->msgErro == "")
                {
                    if($confSenha == $senha)
                    {
                        if($usuario->cadastrarUsuario($nome, $email, $telefone, $senha))
                        {
                            ?>
                            <div class="msg=erro">
                                                         

                            </div>

                            <?php
                        }
                    }
                }
            }
            else
            {
                ?>

                    <div class="msg=erro">
                        <p>Preencha todos os Campos.</p>
                    </div>

                <?php
            }
        }
    ?>
    
</body>
</html>