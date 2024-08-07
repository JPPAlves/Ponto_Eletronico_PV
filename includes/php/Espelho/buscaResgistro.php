<?php

// Incluir o arquivo conexao.php
include(__DIR__ . '/../ValidasSessao/conexaodb.php');

// Incluir o arquivo proteção.php
include(__DIR__ . '/../ValidasSessao/protect.php');


$id_usuario = $_SESSION['id'];
$selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : '';


// Se o mês não for especificado, usar o mês atual
if (!$selectedMonth) {
    $selectedMonth = date('Y-m');
}

$sql = "SELECT data, hora, tipo, justificativa 
        FROM db_pontoeletronico.tbl_registros_ponto 
        WHERE id_usuario = $id_usuario
        AND DATE_FORMAT(STR_TO_DATE(data, '%Y-%m-%d'), '%Y-%m') = '$selectedMonth'
        ORDER BY data, hora";

$query = mysqli_query($conn, $sql);

$registros = array();
// Dentro do loop que processa os registros
while ($result = mysqli_fetch_assoc($query)) {
    $data = $result['data'];
    $tipo = $result['tipo'];
    $hora = $result['hora'];
    $justificativa = $result['justificativa'];

    // Converter a data para o formato brasileiro
    $dataFormatada = DateTime::createFromFormat('Y-m-d', $data)->format('d/m/Y');

    if (!isset($registros[$dataFormatada])) {
        $registros[$dataFormatada] = array(
            'data' => $dataFormatada,
            'entradas' => array(),
            'saidas' => array(),
            'temJustificativa' => false
        );
    }

    if ($tipo == 'ENTRADA') {
        $registros[$dataFormatada]['entradas'][] = array(
            'hora' => $hora,
            'justificativa' => $justificativa
        );
    } elseif ($tipo == 'SAIDA') {
        $registros[$dataFormatada]['saidas'][] = array(
            'hora' => $hora,
            'justificativa' => $justificativa
        );
    }

    if (!empty($justificativa)) {
        $registros[$dataFormatada]['temJustificativa'] = true;
    }
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleBusca.css">
    <title>Tabela de Registros de Ponto</title>
</head>
<body>
   
    <table>
        <tr>
            <th>Data</th>
            <th>Entrada(s)</th>
            <th>Saída(s)</th>
        </tr>
        <?php foreach ($registros as $data => $registro): ?>
        <tr <?php if ($registro['temJustificativa']): ?>class="has-justificativa"<?php endif; ?>>
            <td><?php echo $data; ?></td>
            <td>
                <?php foreach ($registro['entradas'] as $entrada): ?>
                    <?php if (!empty($entrada['justificativa'])): ?>
                        <?php echo $entrada['hora'] . ' (' . $entrada['justificativa'] . ')<br>'; ?>
                    <?php else: ?>
                        <?php echo $entrada['hora'] . '<br>'; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($registro['saidas'] as $saida): ?>
                    <?php if (!empty($saida['justificativa'])): ?>
                        <?php echo $saida['hora'] . ' (' . $saida['justificativa'] . ')<br>'; ?>
                    <?php else: ?>
                        <?php echo $saida['hora'] . '<br>'; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
