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
		//prepared statment 
		if(!($statement= $conn->prepare("select login,senha from usuario where login = ?"))){
			echo "Prepared statment failed: (".$conn->errno.")".$conn->error;
		}
		//execucao dividida em bind depois execute
		if(!($statement->bind_param("i", $login))){
			echo "Binding paramters failed:(".$statement->errno.")".$statement->error;
		}
		if(!($statement->execute())){
			echo "Statment execute failed:(".$statement->errno.")".$statement->error;
		}
		if(!($result =$statement->get_result())){
			echo "Erro Obtendo resultados:(".$statement->errno.")".$statement->error;
		}
		
		$statement->close();
		if($row = $result->fetch_assoc()){
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