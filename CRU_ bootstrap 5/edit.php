<?php
include ("conexao.php");
$id = $_GET['id'];

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $genero = $_POST['genero'];

    $sql = "UPDATE `crud` SET `nome`='$nome',
	`sobrenome`='$sobrenome',`email`='$email',`genero`='$genero' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=Cadastrado Atualizado");
    }
    else{
        echo "Falhou :".mysqli_error($conexao);
    }


}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>CRUD</title>
</head>
<body>
   
<nav class="navbar navbar-ligth justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    PHP CRUD Completo com bootstrap 5
</nav>

<div class="container">
    <div class="text-center mb-4">
        <h3>Editar os dados do Usuário</h3>
        <p class="text-muted">Clique ao lado</p>
    </div>

    <?php
       
        $sql = "SELECT * FROM crud WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>


    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width: 50vw; min-width:300px;">
            <div class="row">
                <div class="col">
                <label class="form-label" for="">Nome</label>
                <input type="text" class="form-control" name="nome"
                value="<?php echo $row['nome']?>">
                </div>

                <div class="col">
                <label class="form-label" for="">Sobrenome</label>
                <input type="text" class="form-control" name="sobrenome"
                value="<?php echo $row['sobrenome']?>">
                </div>
               </div>

               <div class= "mb-3">
               <label class="form-label" for="">Email</label>
                <input type="email" class="form-control" name="email"
                value="<?php echo $row['email']?>">
               </div>

            <div class="form-group mb-3">
                <label>Gênero</label>&nbsp;
                <input type="radio" class="form-check-input" name="genero"
                id="feminino" value="feminino" <?php echo($row['genero']=='feminino')? "checked":"";?>>
                <label for="feminino" class="form-input-label">Feminino</label>
                &nbsp;
                <input type="radio" class="form-check-input" name="genero"
                id="masculino" value="masculino" <?php echo($row['genero']=='masculino')? "checked":"";?>>
                <label for="masculino" class="form-input-label">Masculino</label>
          </div>
          <div>
            <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        
        </div>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>
</body>
</html>