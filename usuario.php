<?php
    class Usuario
    {
        private $pdo;

        public $msgErro="";

        public function conectar($nome, $host, $usuario, $senha)
        {
            global $pdo;
            try{
                $pdo = new PDO("mysql:dbname=".$nome, $usuario, $senha);
            }
            catch(PDOException $erro){
                $msgErro = $erro->getMessage();
            }
        }

        public function cadastrarUsuario($nome, $email, $telefone, $senha)
        {
            global $pdo;

            //verificar se o email já existe ou não
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
            $sql-> bindValue(":e",$email);
            $sql->execute();
            if($sql->rowCount() > 0)
            {
                return false;
            }
            else{
                $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, telefone, senha) VALUES (:n, :e, :t, :s)");
                $sql->bindValue(":n",$nome);
                $sql->bindValue(":e",$email);
                $sql->bindValue(":t",$telefone);
                $sql->bindValue(":s",$senha);
                $sql->execute();
                return true;
            }
        }
    }

?>