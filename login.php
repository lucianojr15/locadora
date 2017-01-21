<?php
require_once 'conexao.php';
session_start();

if(isset($_POST['login'])){
	$pattern="/[a-zA-Z0-9_]{1,12}/";
	/*
	 * whitelist, verificação se entrada do usuário atende ao padrao de login válido
	 * 
	 */
	if(preg_match($pattern,$_POST['login'],$matches)){
		$login =$matches[0];//passar para verificar apenas o que casa
		$senha=$_POST['senha'];
	}
	
	
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
		/*
		 * $stam->bind_param("i",$var) variavel do tipo integer (i,d,s,b)
		 * s=>string
		 * d=>double
		 * b=>blob
		 */
		if(!($statement->bind_param("s", $login))){
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