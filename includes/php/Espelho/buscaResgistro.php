<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('/xampp1/htdocs/Projeto/PontoEletronicoPV/includes/php/ValidasSessao/conexaodb.php');

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
while ($result = mysqli_fetch_assoc($query)) {
    // Agrupar os registros pela data
    $data = $result['data'];
    $tipo = $result['tipo'];
    $hora = $result['hora'];
    $justificativa = $result['justificativa'];

    if (!isset($registros[$data])) {
        $registros[$data] = array(
            'data' => $data,
            'entradas' => array(),
            'saidas' => array(),
            'temJustificativa' => false
        );
    }

    // Adicionar entrada ou saída ao registro correspondente
    if ($tipo == 'ENTRADA') {
        $registros[$data]['entradas'][] = array(
            'hora' => $hora,
            'justificativa' => $justificativa
        );
    } elseif ($tipo == 'SAIDA') {
        $registros[$data]['saidas'][] = array(
            'hora' => $hora,
            'justificativa' => $justificativa
        );
    }

    // Verificar se há justificativa para essa data
    if (!empty($justificativa)) {
        $registros[$data]['temJustificativa'] = true;
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
