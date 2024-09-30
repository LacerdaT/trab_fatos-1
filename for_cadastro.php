<?php
$message = '';

if (isset($_POST['submit'])) {
    include_once('confg.php');

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $apelido = mysqli_real_escape_string($conexao, $_POST['apelido']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $tel = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $sexo = mysqli_real_escape_string($conexao, $_POST['genero']);
    $data_nasc = mysqli_real_escape_string($conexao, $_POST['data_nasc']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);

    // Verificar se o email já existe
    $email_check_query = "SELECT * FROM tab_cad_myself WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conexao, $email_check_query);
    $email_exists = mysqli_fetch_assoc($result);

    if ($email_exists) {
        // Se o email já estiver registrado, exibe uma mensagem de erro
        $message = "<span style='color: red;'>Este email já foi cadastrado. Por favor, use outro.</span>";
    } else {
        // Se o email não existir, faz o cadastro
        $resulte = mysqli_query($conexao, "INSERT INTO tab_cad_myself(nome, apelido, email, senha, telefone, sexo, data_nasc, estado, cidade, endereco) 
        VALUES ('$nome','$apelido', '$email', '$senha', '$tel', '$sexo', '$data_nasc', '$estado', '$cidade', '$endereco')");

        if ($resulte) {
            $message = "<span style='color: white;'>Cadastro realizado com sucesso!</span>";
        } else {
            $message = "<span style='color: red;'>Erro ao realizar o cadastro: " . mysqli_error($conexao) . "</span>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadastroMyself</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="cdt">

    <a href="pg_abertura.html"><button id="bt1" class="btn btn-primary mb-2">Voltar</button></a>

    <div class="container form-container">
        
        <form action="for_cadastro.php" method="POST">
            <h1>MySelf Cadastro</h1><br><br>

            <div class="col-12 col-md-6 text-center" id="messageContainer">
                <?php echo $message; ?><br>
                <button><a href="pg_login.html">Faça seu Login</a></button>
            </div> 
            
            <div class="form-group">
                <label for="nome"><strong>Nome Completo</strong></label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="apelido"><strong>Apelido</strong></label>
                <input type="text" name="apelido" id="apelido" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email"><strong>Email</strong></label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="senha"><strong>Senha</strong></label>
                <input type="password" name="senha" id="senha" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telefone"><strong>Telefone com DDD</strong></label>
                <input type="tel" name="telefone" id="telefone" class="form-control" required>
            </div><br>

            <div class="form-check">
                <label for="sexo"><strong>Sexo</strong></label><br> 
                <input type="radio" id="feminino" name="genero" value="feminino" class="form-check-input" required>
                <label for="feminino" class="form-check-label">Feminino</label>
            </div>
            <div class="form-check">
                <input type="radio" id="masculino" name="genero" value="masculino" class="form-check-input" required>
                <label for="masculino" class="form-check-label">Masculino</label>
            </div>
            <div class="form-check">
                <input type="radio" id="outros" name="genero" value="outros" class="form-check-input" required>
                <label for="outros" class="form-check-label">Outros</label>
            </div><br>

            <div class="form-group">
                <label for="data_nasc"><strong>Data de Nascimento</strong></label>
                <input type="date" name="data_nasc" id="data_nasc" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="estado"><strong>Selecione seu estado</strong></label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="">....</option>
                    <option value="AC">AC - Acre</option>
                    <option value="AL">AL - Alagoas</option>
                    <option value="AP">AP - Amapá</option>
                    <option value="AM">AM - Amazonas</option>
                    <option value="BA">BA - Bahia</option>
                    <option value="CE">CE - Ceará</option>
                    <option value="DF">DF - Distrito Federal</option>
                    <option value="ES">ES - Espírito Santo</option>
                    <option value="GO">GO - Goiás</option>
                    <option value="MA">MA - Maranhão</option>
                    <option value="MT">MT - Mato Grosso</option>
                    <option value="MS">MS - Mato Grosso do Sul</option>
                    <option value="MG">MG - Minas Gerais</option>
                    <option value="PA">PA - Pará</option>
                    <option value="PB">PB - Paraíba</option>
                    <option value="PR">PR - Paraná</option>
                    <option value="PE">PE - Pernambuco</option>
                    <option value="PI">PI - Piauí</option>
                    <option value="RJ">RJ - Rio de Janeiro</option>
                    <option value="RN">RN - Rio Grande do Norte</option>
                    <option value="RS">RS - Rio Grande do Sul</option>
                    <option value="RO">RO - Rondônia</option>
                    <option value="RR">RR - Roraima</option>
                    <option value="SC">SC - Santa Catarina</option>
                    <option value="SP">SP - São Paulo</option>
                    <option value="SE">SE - Sergipe</option>
                    <option value="TO">TO - Tocantins</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cidade"><strong>Cidade</strong></label>
                <input type="text" name="cidade" id="cidade" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="endereco"><strong>Endereço com Número</strong></label>
                <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Av. Abcd, 88" required>
            </div><br><br><br>

            <button type="submit" name="submit" id="submit" class="btn btn-success">Enviar</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var messageContainer = document.getElementById('messageContainer');
            var successButton = document.getElementById('successButton');

            // Verifica se a mensagem contém "Cadastro realizado com sucesso!"
            if (messageContainer.innerHTML.includes('Cadastro realizado com sucesso!')) {
                successButton.style.display = 'inline-block';
            }
        });
    </script>

</body>
</html>
