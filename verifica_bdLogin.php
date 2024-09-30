<?php

session_start();


if (isset($_POST['submit']) && !empty($_POST['email'])) {
    
    include_once('confg.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tab_cad_myself WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if ($result->num_rows < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: pg_login.html');
        
        exit();
    }
    else {
        $_SESSION['email']=$email;
        $_SESSION['senha']=$senha;
        header('Location: sistema_upload.php');
       
    }
    
 
}
else {
    echo "deu zica maluco";
}
    
?>