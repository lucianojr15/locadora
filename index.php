<?php




?>
<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="jquery-easyui-1.5/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="jquery-easyui-1.5/themes/icon.css">
<script type="text/javascript" src="jquery-easyui-1.5/jquery.min.js"></script>
<script type="text/javascript" src="jquery-easyui-1.5/jquery.easyui.min.js"></script>


<script type="text/javascript">

	$('#win').window('open');
</script>
<title> Locadora de Veiculos</title>
</head>

<body>

    <div id="win" class="easyui-window" title="My Window" style="width:600px;height:400px"
    data-options="iconCls:'icon-save',modal:true">
    <h1>Para acessar aplicação faça login</h1>
    <form id=login_form >
    <label>Login:</label>
    <input id="login" type="text"  class="easyui-validatebox" data-options="required:true"/>
    
    <label>Senha:</label>
    <input id="senha" type="password" class="easyui-validatebox" data-options="required:true"/>	
    
    </form>
    </div>

</body>
</html>