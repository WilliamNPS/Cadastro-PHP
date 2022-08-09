<?php
session_start();

/* URL DO MEU SITE HOSPEDADO NO CASO  */
$site = ""; //

/* DOIS MODOS POSSÍVEIS */
$modo = 'local'; 

// MODO LOCAL O SITE NÃO PRECISAR ESTA HOSPEDADO POREM TEM SUAS LIMITAÇÕES
if($modo =='local'){
    $servidor ="localhost";
    $usuario = "root";
    $senha = "";
    $banco = "clientes";
}

//MODO PRODUCAO USANDO EM PARA HOSPEDAR O BANCO DE DADOS NO SITE 
if($modo =='producao'){
    $servidor ="";
    $usuario = "";
    $senha = "";
    $banco = "";
}

   //CONEXÃO COM BANCO DE DADOS
try{
   $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   //echo "ok ,banco conectado";
}catch(PDOException $erro){
    echo "Falha ao se conectar com o banco! ";
}

//FUNÇÃO PARA LIMPAR O POST
function limparPost($dados){
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
}

//FUNÇÃO PARA AUTENTICAÇÃO DO USUARIO 
function auth($tokenSessao){
    global $pdo;
    //VERIFICAR SE TEM AUTORIZAÇÃO O USUARIO 
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE token=? LIMIT 1");
    $sql->execute(array($tokenSessao));
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    //SE NÃO ENCONTRAR O USUÁRIO
    if(!$usuario){
        return false;
    }else{
       return $usuario;
    }
}
