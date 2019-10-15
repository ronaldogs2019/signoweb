<?php 
include("conexao.class.php");

$cadastro = new formulario();
$cadastro->insert($_POST["Nome"], $_POST["Email"], $_POST["Telefone"], $_POST["Data_de_Nascimento"], $_POST["Endereco"]);

class formulario{

    function insert($nome, $email, $tel, $endereco, $data_nasc)
    {
        if( !empty(trim($nome)) && !empty(trim($email)) && !empty(trim($tel)) && !empty(trim($endereco)) && !empty(trim($data_nasc)) )
        {        
            $conn = Database::init();

            $dados = array(
                'Nome' => $nome,
                'Email' => $email,
                'Telefone' => $tel,
                'Data_de_Nascimento' => $data_nasc,
                'Endereco' => $endereco
            );

            try{
                $conn->prepare("INSERT INTO cadastro (Nome, Email, Telefone, Data_de_Nascimento, Endereco) VALUES (:Nome, :Email, :Telefone, :Data_de_Nascimento, :Endereco)")->execute($dados);
                unset($conn);
                header('Location: Sucess.php');            
            }catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }else{
            header('Location: Fail.php');   
        }
    }
}

?>