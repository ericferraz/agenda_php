<?php
require '../../utilidades/autoLoad.php';

if(isset($_GET['acao']) && $_GET['acao']=='deletar'){

	if(isset($_GET['id'])){
		$id = intval($_GET['id']);
		$instancia = ContatoFacade::getInstance();
		try{
			$instancia->excluir($id);
		}catch (Exception $e){
			echo "Falha ao excluir ".$e->getMessage();
		}
		if (isset($_GET['ajax']) && $_GET['ajax'] == '1') {
			exit('1');
		}
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DataTable com Jquery</title>
<script type="text/javascript" src="data_table/media/js/jquery.js"></script>

<script type="text/javascript"
	src="data_table/media/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
/*quando o documento html for carregado, executa uma função*/
$(document).ready(function() {
/*Essa função pega o elemento com id = tabela e o transforma numa dataTable*/
  $('#tabela').dataTable();  
});
</script>

<script type="text/javascript">
function excluirContato(id, linha) {
	  if (confirm("Deseja realmente excluir este contato?")) {

	$.get("agenda.php?acao=deletar&id="+id+"&acaoo=excluir&ajax=1").done(function(){
				var objLinha = $("#linha" + linha);
				objLinha.hide({
					effect: "fade",
					complete: function() {
						oTable1.fnDeleteRow(oTable1.fnGetPosition(this));
					}
				});
			}).fail(function() {
				$(".page-content:eq(0)").prepend('<div class="alert alert-danger">Ocorreu um erro.</div>');
			});
	     }
			return false;
		}

</script>

<link rel="stylesheet" type="text/css"
	href="data_table/media/css/demo_page.css">
<link rel="stylesheet" type="text/css"
	href="data_table/media/css/demo_table.css">

<style type="text/css">
body {
	margin: 0 auto;
	padding: 0 auto;
	text-align: center;
	background-image:url(img/wooden-background.jpg);
}

#tabela {
	background: #E1E1E1;
}

table {
	border-collapse: collapse;
}

table,td,th {
	border: 1px solid black;
	padding: 5px;
}

.editar,.apagar {
	padding: 2px;
	text-align: center;
	width: 80px;
	text-decoration: none;
}

.apagar {
	background: #CB8381;
	border-radius: 2px;
}

.editar {
	background: #A7C2CD;
}

.apagar:hover {
	background: #ED0307;
}

.editar:hover {
	background: #22C9CC;
}

div#corpo {
	margin: 0 auto;
	padding: 0 auto;
	width: 960px;
	text-align: left;
	background: #E9F8F5;
}

div#corpo #conteudo {
	margin: 2px;
	padding: 1px;
	width: 960px;
	background: #E9F8F5;
}

#corpo #conteudo label,#btn_cad {
	padding: 3px;
	margin: 8px;
	display: block;
}

#corpo #conteudo input[type="text"] {
	width: 340px;
	height: 30px;
}

#corpo #conteudo textarea {
	width: 340px;
	height: 100px;
}

#corpo #conteudo #btn_cad {
	width: 100px;
	height: 30px;
	border-radius: 4px;
	background: #B2D0D1;
}

#corpo #conteudo #btn_cad:hover {
	background: #1E8AD8;
	cursor: pointer;
}
</style>
</head>

<body>

	<div id="corpo">
		<div id="conteudo">
		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$instancia = ContatoFacade::getInstance();
			$id		   = intval($_GET['id']);
			$retorno   = $instancia->buscarPorCodigo($id);

			if($retorno==null){
				echo "Esse contato não existe";
			}else{
				$po = new ContatoPO();
				$po->setId($retorno[0]['id']);
				$po->setCodigo($retorno[0]['codigo']);
				$po->setNome($retorno[0]['nome']);
				$po->setSobreNome($retorno[0]['sobrenome']);
				$po->setDataNascimento($retorno[0]['data_nascimento']);
				$po->setEmail($retorno[0]['email']);
				$po->setObservacao($retorno[0]['observacao']);
				?>
				<?php 
				 if(isset($_GET['sucesso']) && $_GET['sucesso']==1 ){
				 	
				 	echo "<script>alert('alterado com sucesso!')</script>";
				 }
				?>
			<form method="post" enctype="multipart/form-data">

				<label>Código:</label> 
				<input type="text" name="codigo" value="<?php echo $po->getCodigo(); ?>"> 
				<label>Nome:</label>
				<input type="text" name="nome" value="<?php echo $po->getNome(); ?>"> 
				<label>Sobre nome:</label>
				 <input type="text" name="sobrenome" value="<?php echo $po->getSobreNome(); ?>"> 
				 <label>Data nascimento: </label> 
		   <input type="text" name="data_nascimento" value="<?php echo $po->getDataNascimento(); ?>">
		   
			 <label>E-mail:</label> 
			 <input type="text" name="email" value="<?php echo $po->getEmail(); ?>"> 
			 <label>Observação:
				</label>
				<textarea name="observacao"><?php echo $po->getObservacao(); ?></textarea>
				<input type="hidden" name="editar" value="<?php echo $po->getId();?>">
				<button id="btn_cad">Atualizar</button>
				<a href="agenda.php">Voltar</a>
			</form>
			<?php } }else{ ?>
			<form method="post" enctype="multipart/form-data">

				<label>Código:</label> <input type="text" name="codigo"> <label>Nome:</label>
				<input type="text" name="nome"> <label>Sobre nome:</label> <input
					type="text" name="sobrenome">
                     <label>Data nascimento: </label> 
                    <input type="text" name="data_nascimento" >
					
				 <label>E-mail:</label> <input type="text" name="email"> <label>Observação:
				</label>
				<textarea name="observacao"></textarea>
				<button name="cadastrar" id="btn_cad">Cadastrar</button>
			</form>
			<?php }?>
		</div>

	</div>


	<h4>Listagem</h4>
	<table id="tabela" class="display">
		<!--cabeçalho-->
		<thead>
			<tr>
				<th id="campo_menor">Id:</th>
				<th id="campo_menor">Cód:</th>
				<th id="campo_medio">Nome:</th>
				<th id="campo_medio">Sobrenome:</th>
				<th id="campo_medio">Data nascimento:</th>
				<th id="campo_medio">E-mail:</th>
				<th id="campo_maior">Observação:</th>
				<th id="campo_medio">Ação:</th>
			</tr>
		</thead>

		<!--corpo-->
		<tbody>
		<?php
		//realiza a listagem
		$instancia = ContatoFacade::getInstance();
		$retorno = $instancia->buscarTodos();

		if($retorno==null){
			echo 'Nenhum registro foi encontrado';
		}else{
			$po = new ContatoPO();
			$numLinha = 0;
			for($i=0;$i<count($retorno);$i++){
				$po->setId($retorno[$i]['id']);
				$po->setCodigo($retorno[$i]['codigo']);
				$po->setNome($retorno[$i]['nome']);
				$po->setSobreNome($retorno[$i]['sobrenome']);
				$po->setDataNascimento($retorno[$i]['data_nascimento']);
				$po->setEmail($retorno[$i]['email']);
				$po->setObservacao($retorno[$i]['observacao']);
				?>
			<tr id="linha<?php echo $numLinha;?>">
				<td><?php echo $po->getId(); ?></td>
				<td><?php echo $po->getCodigo(); ?></td>
				<td><?php echo $po->getNome(); ?>
				</td>
				<td><?php echo $po->getSobreNome(); ?></td>
				<td><?php echo $po->getDataNascimento(); ?></td>
				<td><?php echo $po->getEmail(); ?></td>
				<td><?php echo $po->getObservacao(); ?></td>
				<td><a class="editar"
					href="agenda.php?acao=editar&id=<?php echo $po->getId(); ?>">Editar</a>
					| <a class="apagar"
					href="agenda.php?acao=deletar&id=<?php echo $po->getId(); ?>"
					onClick="return excluirContato(<?php echo $po->getId(), ', ', $numLinha ?>);">Apagar</a>
				</td>
			</tr>
			<?php
			$numLinha++;
			}
		}
		?>
		</tbody>

	</table>
</body>
</html>
		<?php
		if(isset($_POST['cadastrar'])){

			$cod = $_POST['codigo'];
			$nome = $_POST['nome'];
			$sobreNome = $_POST['sobrenome'];
			$data      = $_POST['data_nascimento'];
			$email = $_POST['email'];
			$observacao = $_POST['observacao'];


			try {
				$instancia= ContatoFacade::getInstance()->inserir($cod,$nome,$sobreNome, $data, $email, $observacao);
				echo "Inserido com sucesso ";
			}catch (Exception $e){
				echo "Falha ao inserir ".$e->getMessage();
			}

		}
		
		if(isset($_POST['editar'])){
			$id  = $_POST['editar'];
			$cod = $_POST['codigo'];
			$nome = $_POST['nome'];
			$sobreNome = $_POST['sobrenome'];
			$data      = $_POST['data_nascimento'];
			$email = $_POST['email'];
			$observacao = $_POST['observacao'];
			
			if($id>0){
				try{
				$instancia=ContatoFacade::getInstance();
				$instancia->alterar($id,$cod,$nome,$sobreNome,$data, $email,$observacao);
				}catch(Exception $e){
				echo "Falha ao alterar ".$e->getMessage();
				}
			}
		}
		?>
