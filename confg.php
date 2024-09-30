<?php
$bdHost = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = 'usbw'; 
$dbName = 'bd_cadasdtromyself';

$conexao = new mysqli($bdHost, $dbUsername, $dbPassword, $dbName); 


if ($conexao->connect_error) { 
echo "deu zica maloco ";} 
else {
echo "Ai sim mulecote tu e zica, essa porra de certa";}


?>
