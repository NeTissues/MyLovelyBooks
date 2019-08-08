<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">		
		<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"></link>
    </head>
    
    <body>
        <div class="jumbotron">
        <div class="container">
            <div class="row">
                <h1> Lista de livros</h1>
            </div>
            </br>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Adicionar</a>
                </p>
                <form class="filteroption" action="" method="post">
                  <select class="select" name="select">
                    <option value ="all_records" selected="selected">Lendo</option>
                    <option value ="surname_desc" selected="selected">Já lido</option>
                    <option value ="firstname_asc" selected="selected">Pretendo ler</option>
                  </select>
                    <input  class="" type="submit" name="submit" value="submit">
                </form>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>author</th>
                            <th>synopsis</th>
                            <th>publisher</th>
                            <th>volumes</th>
                            <th>chapters</th>
                            <th>pages</th>
                            <th>score</th>
                            <th>id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();

                        if(isset($_POST['submit'])) {
                          if($_POST['select']=='Lendo') {
                            $sql = "SELECT tb_book.* FROM tb_book, user_book WHERE tb_book.bookId = user_book.bookId AND user_book.bookStatus = '1'";
                          }
                          elseif($_POST['select']=='Já lido') {
                            $sql = "SELECT tb_book.* FROM tb_book, user_book WHERE tb_book.bookId = user_book.bookId AND user_book.bookStatus = '2'";
                          }
                          else {
                            $sql = "SELECT tb_book.* FROM tb_book, user_book WHERE tb_book.bookId = user_book.bookId AND user_book.bookStatus = '3'";
                          }
                       //PDO::query ($sql, 
                        }

                        //$sql = 'SELECT * FROM tb_book ORDER BY bookid DESC';
                        
                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
                            echo '<td>'. $row['title'] . '</td>';
                            echo '<td>'. $row['author'] . '</td>';
                            echo '<td>'. $row['synopsis'] . '</td>';
                            echo '<td>'. $row['publisher'] . '</td>';
                            echo '<td>'. $row['volumes'] . '</td>';
                            echo '<td>'. $row['chapters'] . '</td>';
                            echo '<td>'. $row['pages'] . '</td>';
                            echo '<td>'. $row['score'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="read.php?id='.$row['bookId'].'">Listar</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="update.php?id='.$row['bookId'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['bookId'].'">Excluir</a>';
                            echo '</td>';
                            echo '<tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>                   
                </table>               
            </div>
        </div>
        </div>
    </body>
</html>

