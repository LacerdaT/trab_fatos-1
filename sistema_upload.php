<?php
$mens = ' ';

session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: pg_login.html');
    exit();
}

if (isset($_POST['submit'])) {
    print_r($_POST['arquivo']);
    print_r($_POST['descricao']);
}





/*

include_once('confg.php');
    $image_path = mysqli_real_escape_string($conexao, $_POST['image_path']);
    $upload_time = mysqli_real_escape_string($conexao, $_POST['upload_time']);
    $desc_img = mysqli_real_escape_string($conexao, $_POST['desc_img']);
    $ID = mysqli_real_escape_string($conexao, $_POST['ID']);
*/

// Definindo o fuso horário, se necessário


date_default_timezone_set('America/Sao_Paulo');

// Obtendo a hora atual
$horaAtual = date('H');

// Verificando a faixa de horas e definindo a saudação
if ($horaAtual >= 0 && $horaAtual < 12) {
    $mens = "Bom Dia!";
} elseif ($horaAtual >= 12 && $horaAtual < 18) {
    $mens = "Boa tarde!";
} else {
    $mens = "Boa noite!";
}

// Definindo as variáveis de estilo que podem ser editadas
$corTexto = "blue";
$tamanhoFonte = "2vw";
$fonteTexto = "Arial";
$posicao = "absolute"; // Para controle de posição
$top = "30%";
$left = "50%";
$transform = "translate(-50%, -50%)"; // Para centralizar o texto

// Criando uma variável que contém todo o estilo em uma string
$estilo = "color: $corTexto; font-size: $tamanhoFonte; font-family: $fonteTexto;
           position: $posicao; top: $top; left: $left; transform: $transform;";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema up_load</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="up">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="imagem/lentecmr.png" alt="" width="80" height="60" class="d-inline-block align-text-top">
                <h3>MySelf.PICS</h3>
            </a>
            <!-- Botão de colapso -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sair.php"><strong>SAIR</strong></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn bg-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php echo "<h3 style='$estilo'>$mens</h3>"; ?>
    <br>
    <br>
    <div class="container mt-5">
        <h1 id="h1abertura_sistema">Faça o upload da sua Imagem.</h1>
        <br><br><br>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <br>



                <form action="upload.php" method="post" enctype="multipart/form-data">

                    <label for="arquivo">Arquivo:</label>
                    <br>
                    <input type="file" name="arquivo" id="arquivo" />

                    <br />
                    <br />

                    <input type="submit" value="Enviar" />

                </form>
                <hr>
                <?php
	include_once('conexao.php');
	//criando o objeto mysql e conectando ao banco de dados
	$mysql = new BancodeDados();
	$mysql->conecta();
	
	$sqlstring = 'select * from imagens order by arquivo';
	$query = @mysqli_query($mysql->con, $sqlstring);
	while ($dados = @mysqli_fetch_array($query)){
		echo "<img src='arquivos/".$dados['arquivo']."' width='100px' heigth='100px'>";
		echo "<a href='apagar.php?id=".$dados['id']."'><img src='delete.png'></a>";
	}
	$mysql->fechar();	
?>
            </div>
</body>

</html>