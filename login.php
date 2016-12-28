<?php
require_once 'conexao.php';
session_start();

if(isset($_POST['login'])){
	$login=$_POST['login'];
	$senha=$_POST['senha'];
	if((trim($login)=="") || (trim($senha)=="")){
		$mensagem= array('status'=>false,
				'msg'=>'Login/Senha devem ser preenchidos'
		);
	}else{
		$sql= "select login,senha from usuario where login = '$login'";
		$result =mysql_query($sql,$conn);
		if($row = mysql_fetch_assoc($result)){
			if($row['senha']==$senha){
				//Login realizado com sucesso,salvamos sessao
				$_SESSION['login']=$login;
				$mensagem =array('status'=>true,
						'msg'=>''
				);
			}else $mensagem=array('status'=>false,
				'msg'=>'Senha incorreta'
		);	
		 }else array('status'=>false,
				'msg'=>'Login incorreto'
		);
		
    }
}

echo json_encode($mensagem);
?>