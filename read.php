<?php
    require 'banco.php';
    $id = null;
    if(!empty($_GET['id']))
    {
        $id = $_REQUEST['id'];
    }
    
    if(null==$id)
    {
        header("Location: index.php");
    }
    else 
    {
       $pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM tb_book where bookId = ?";
       $q = $pdo->prepare($sql);
       $q->execute(array($id));
       $data = $q->fetch(PDO::FETCH_ASSOC);
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
                    <h3 class="well"> Listar Livros </h3>
                </div>
                
                <div class="form-horizontal">                   
                    <div class="control-group">
                        <label class="control-label">title</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['title'];?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">author</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['author'];?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">synopsis</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['synopsis'];?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">publisher</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['publisher'];?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">volumes</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['volumes'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">chapters</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['chapters'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">pages</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['pages'];?>
                            </label>
                        </div>
                    </div>
                    <br/>
                    <div class="form-actions">
                        <a href="lista.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>

