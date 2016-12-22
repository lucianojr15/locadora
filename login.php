<?php
require_once 'conexao.php';
session_start();

if(isset($_POST['login'])){
	$login=$_POST['login'];
	$senha=$_POST['senha'];
	if((trim($login)=="") || (trim($senha)=="")){
		$mensagem= "Login/Senha devem ser preenchidos";
	}else{
		$sql= "select login,senha from usuario where login = '$login'";
		$result =mysql_query($sql,$conn);
		if($row = mysql_fetch_assoc($result)){
			if($row['senha']==$senha){
				//Login realizado com sucesso,salvamos sessao
				$_SESSION['login']=$login;
				header("location:veiculoLista.php");
			}else $mensagem="senha incorreta";	
		 }else $mensagem="login incorreto";
		
    }
}

echo $mensagem;
?>