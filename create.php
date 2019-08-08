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
            <div clas="span10 offset1">
                <div class="row">
                    <h3 class="well"> Cadastrar Livro </h3>
                    <form class="form-horizontal" action="create.php" method="post">
                        <div class="row">
							<div class="control-group <?php echo !empty($titleErro)?'error ' : '';?>">
								<label class="control-label">title</label>
								<div class="controls">
									<input size= "50" name="title" type="text" placeholder="title" required="" value="<?php echo !empty($title)?$title: '';?>">
									<?php if(!empty($titleErro)): ?>
										<span class="help-inline"><?php echo $titleErro;?></span>
									<?php endif;?>
								</div>
							</div>
						
                        <div class="control-group <?php echo !empty($authorErro)?'error ': '';?>">
                            <label class="control-label">Author</label>
                            <div class="controls">
                                <input size="80" name="author" type="text" placeholder="Author" required="" value="<?php echo !empty($author)?$author: '';?>">
                                <?php if(!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $authorErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>
						
                        
                        <div class="control-group <?php echo !empty($telefoneErro)?'error ': '';?>">
                            <label class="control-label">Telefone</label>
                            <div class="controls">
                                <input size="35" name="telefone" type="text" placeholder="Telefone" required="" value="<?php echo !empty($telefone)?$telefone: '';?>">
                                <?php if(!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $telefoneErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>
                        
                        <div class="control-group <?php echo !empty($emailErro)?'error ': '';?>">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input size="40" name="email" type="text" placeholder="Email" required="" value="<?php echo !empty($email)?$email: '';?>">
                                <?php if(!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $emailErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>
                        
                        <div class="control-group <?php echo !empty($sexoErro)?'error ': '';?>">
                            <label class="control-label" >Sexo</label>
                            <div class="controls">
                                <input size="1" name="sexo" type="text" placeholder="Sexo" required="" value="<?php echo !empty($sexo)?$sexo: '';?>">
                                <?php if(!empty($sexoErro)): ?>
                                <span class="help-inline"><?php echo $sexoErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>
						</div>
                        <div class="form-actions">
                            <br/>
                
                            <button type="submit" class="btn btn-success">Adicionar</button>
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        
                        </div>
                    </form>
                </div>
        </div>
    </body>
</html>


<?php
    require 'banco.php';
    
    if(!empty($_POST))
    {
        //Acompanha os erros de validação
        $titleErro = null;
        $authorErro = null;
        $telefoneErro = null;
        $emailErro = null;
        $sexoErro = null;
        
        $title = $_POST['title'];
        $author = $_POST['author'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $sexo = $_POST['sexo'];
        
        //Validaçao dos campos:
        $validacao = true;
        if(empty($title))
        {
            $titleErro = 'Por favor digite o seu title!';
            $validacao = false;
        }
        
        if(empty($author))
        {
            $authorErro = 'Por favor digite o seu Author!';
            $validacao = false;
        }
        
        if(empty($telefone))
        {
            $telefoneErro = 'Por favor digite o número do telefone!';
            $validacao = false;
        }
        
        if(empty($email))
        {
            $telefoneErro = 'Por favor digite o Author de email';
            $validacao = false;
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
        {
            $emailError = 'Por favor digite um Author de email válido!';
            $validacao = false;
        }
        
        if(empty($sexo))
        {
            $sexoErro = 'Por favor digite o campo!';
            $validacao = false;
        }
        
        //Inserindo no Banco:
        if($validacao)
        {
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO pessoa (title, author, telefone, email, sexo) VALUES(?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($title,$author,$telefone,$email,$sexo));
            Banco::desconectar();
            header("Location: index.php");
        }
    }
?>
