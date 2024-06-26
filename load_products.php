<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=padaria', 'root', '');

// Recebe o dia da semana
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
$stmt = $pdo->query("SELECT * FROM $table");

// Retorna os resultados como JSON
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
