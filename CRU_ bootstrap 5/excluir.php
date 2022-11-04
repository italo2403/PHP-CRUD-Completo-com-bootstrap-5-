<?php
include ("conexao.php");

$id = $_GET['id'];
$sql = "DELETE FROM crud WHERE id = $id";
$result = mysqli_query($conn, $sql);
if($result){
	header("Location: index.php?msg=Usuário excluído com sucesso");
}
else{
	echo "Exclusão falhou " . mysqli_error($conn);
}
?>