<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutorial";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Houve um  Erro". mysqli_connect_error());
}
//echo "Conexão Bem sucedida";