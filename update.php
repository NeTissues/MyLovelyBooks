<?php 
	
	require 'banco.php';

	$id = null;
	if ( !empty($_GET['id'])) 
            {
		$id = $_REQUEST['id'];
            }
	
	if ( null==$id ) 
            {
		header("Location: index.php");
            }
	
	if ( !empty($_POST)) 
            {
		
		$titleErro = null;
		$authorErro = null;
		$synopsisErro = null;
                $publisherErro = null;
                $volumesErro = null;
		
		$title = $_POST['title'];
		$author = $_POST['author'];
		$synopsis = $_POST['synopsis'];
                $publisher = $_POST['publisher'];
                $volumes = $_POST['volumes'];
		
		//Validação
		$validacao = true;
		if (empty($title)) 
                {
                    $titleErro = 'Por favor digite o title!';
                    $validacao = false;
                }
		
		if (empty($publisher)) 
                {
                    $publisherErro = 'Por favor digite o publisher!';
                    $validacao = false;
		} 
                else if ( !filter_var($publisher,FILTER_VALIDATE_publisher) ) 
                {
                    $publisherErro = 'Por favor digite um publisher válido!';
                    $validacao = false;
		}
		
		if (empty($author)) 
                {
                    $author = 'Por favor digite o endereço!';
                    $validacao = false;
		}
                
                if (empty($synopsis)) 
                {
                    $synopsis = 'Por favor digite o synopsis!';
                    $validacao = false;
		}
                
                if (empty($author)) 
                {
                    $author = 'Por favor preenche o campo!';
                    $validacao = false;
		}
		
		// update data
		if ($validacao) 
                {
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE tb_book set title = ?, author = ?, synopsis = ?, publisher = ?, volumes = ? WHERE bookid = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($title,$author,$synopsis,$publisher,$volumes,$id));
                    Banco::desconectar();
                    header("Location: index.php");
		}
	} 
        else 
            {
                $pdo = Banco::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM tb_book WHERE bookid = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$title = $data['title'];
                $author = $data['author'];
                $synopsis = $data['synopsis'];
		$publisher = $data['publisher'];
		$volumes = $data['volumes'];
		Banco::desconectar();
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
		<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"></link>

</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3 class="well"> Atualizar Contato </h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                        
                      <div class="control-group <?php echo !empty($titleErro)?'error':'';?>">
                        <label class="control-label">title</label>
                        <div class="controls">
                            <input name="title" size="50" type="text"  placeholder="title" value="<?php echo !empty($title)?$title:'';?>">
                            <?php if (!empty($titleErro)): ?>
                                <span class="help-inline"><?php echo $titleErro;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        
                       <div class="control-group <?php echo !empty($authorErro)?'error':'';?>">
                        <label class="control-label">Endereço</label>
                        <div class="controls">
                            <input name="author" size="80" type="text"  placeholder="Endereço" value="<?php echo !empty($author)?$author:'';?>">
                            <?php if (!empty($authorErro)): ?>
                                <span class="help-inline"><?php echo $authorErro;?></span>
                            <?php endif; ?>
                        </div>
                       </div>
                        
                       <div class="control-group <?php echo !empty($synopsisErro)?'error':'';?>">
                        <label class="control-label">synopsis</label>
                        <div class="controls">
                            <input name="synopsis" size="30" type="text"  placeholder="synopsis" value="<?php echo !empty($synopsis)?$synopsis:'';?>">
                            <?php if (!empty($synopsisErro)): ?>
                                <span class="help-inline"><?php echo $synopsisErro;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        
                        <div class="control-group <?php echo !empty($publisher)?'error':'';?>">
                        <label class="control-label">publisher</label>
                        <div class="controls">
                            <input name="publisher" size="40" type="text"  placeholder="publisher" value="<?php echo !empty($publisher)?$publisher:'';?>">
                            <?php if (!empty($publisherErro)): ?>
                                <span class="help-inline"><?php echo $publisherErro;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        
                        <div class="control-group <?php echo !empty($volumesErro)?'error':'';?>">
                        <label class="control-label">volumes</label>
                        <div class="controls">
                            <input name="volumes" size="1" type="text"  placeholder="volumes" value="<?php echo !empty($volumes)?$volumes:'';?>">
                            <?php if (!empty($volumesErro)): ?>
                                <span class="help-inline"><?php echo $volumesErro;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      
                        <br/>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Atualizar</button>
                          <a href="lista.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                    </form>
                </div>                 
    </div> 
  </body>
</html>

