<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=padaria', 'root', '');

// Recebe os dados do formulário
$id = $_GET['id'];
$dia_semana = $_GET['dia_semana'];

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
$stmt = $pdo->prepare("DELETE FROM $table WHERE id = :id");
$stmt->bindParam(':id', $id);

// Executa a consulta
if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'error';
}
?>
