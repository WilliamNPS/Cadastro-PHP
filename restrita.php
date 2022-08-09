<?php
require('config/conexao.php');


/*
//VERIFICAR SE TEM AUTORIZAÇÃO ESSA PARTE FOI COLOCADA NA PARTE DA CONEXAO PHP CASO DE MERDA VC COLOCA 


$sql = $pdo->prepare("SELECT * FROM usuarios WHERE token=? LIMIT 1");
$sql->execute(array($_SESSION['TOKEN']));
$usuario = $sql->fetch(PDO::FETCH_ASSOC);
//SE NÃO ENCONTRAR O USUÁRIO
 if(!$usuario){
     header('location: index.php');
 }else{
     echo "<h1> SEJA BEM-VINDO <b style='color:red'>".$usuario['nome']."!</b></h1>";
     echo "<br><br><a style='background:green; color:white; text-decoration:none; padding:20px; border-radius:5px;' href='logout.php'>Sair do sistema</a>";
 }*/


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restrita 1</title>
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        h1{
            font-size:80px;
            color:black;
            margin:auto ;
            background-color:3px solid red;
        }

        a{
            background-color:black;
            color:white ;
            font-size :20px;
            margin-left: 20px ;
            width : 150px;
            height: 90px;
            text-align : center;
            padding-top:30px ;
            border-radius : 30px;
        }
    </style>
</head>
<body>
<?php
$sql = $pdo->prepare("SELECT * FROM usuarios WHERE token=? LIMIT 1");
$sql->execute(array($_SESSION['TOKEN']));
$usuario = $sql->fetch(PDO::FETCH_ASSOC);
//SE NÃO ENCONTRAR O USUÁRIO
 if(!$usuario){
     header('location: index.php');
 }else{
     echo "<h1> SEJA BEM-VINDO <b style='color:red'><br>".$usuario['nome']."!</b></h1>";
     echo "<br><br><a  href='logout.php'>Sair do sistema</a>";
 }

?>
<a href="restrita2.php">   Restrita 2 </a>
    
</body>
</html>


 