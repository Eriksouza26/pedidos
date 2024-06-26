<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=padaria', 'root', '');

// Recebe os dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$unidade = $_POST['unidade'];
$dia_semana = $_POST['dia_semana'];

// Determina a tabela correspondente ao dia da semana
switch ($dia_semana) {
    case 'sexta':
        $table = 'produtos_sexta';
        break;
    case 'sabado':
        $table = 'produtos_sabado';
        break;
    case 'domingo':
        $table = 'produtos_domingo';
        break;
    default:
        die('Dia da semana inválido');
}

// Prepara a consulta SQL
$stmt = $pdo->prepare("UPDATE $table SET nome = :nome, quantidade = :quantidade, unidade = :unidade WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':quantidade', $quantidade);
$stmt->bindParam(':unidade', $unidade);

// Executa a consulta
if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'error';
}
?>
