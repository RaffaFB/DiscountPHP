<?php
// Receba os dados do formulário
$monthlyRate = floatval($_POST['monthlyRate']);
$principalValue = floatval($_POST['principalValue']);
$time = floatval($_POST['time']);
$entryValue = floatval($_POST['entryValue']);
$finalValue = floatval($_POST['finalValue']);
$otherValue = $_POST['otherValue'];

// Realize os cálculos ou processamento de dados na função tabelaPrice
$tabelaPrice = tabelaPrice($principalValue, $time, $monthlyRate, $entryValue, $finalValue);

// Envie uma resposta de volta para o JavaScript
$response = array(
    'success' => true,
    'tabelaPrice' => $tabelaPrice
);

echo json_encode($response);

// Função tabelaPrice para calcular a tabela de preços
function tabelaPrice($principalValue, $time, $monthlyRate, $entryValue, $finalValue) {
    $tabelaPrice = array();

    $outstandingBalance = $principalValue - $entryValue;
    for ($i = 1; $i <= $time; $i++) {
        $interestValue = $outstandingBalance * $monthlyRate / 100;
        $amortization = $installmentValue - $interestValue;
        $outstandingBalance = $outstandingBalance - $amortization;

        $tabelaPrice[] = array(
            'installmentNumber' => $i,
            'installmentValue' => $installmentValue,
            'interestValue' => $interestValue,
            'amortization' => $amortization,
            'outstandingBalance' => $outstandingBalance
        );
    }

    return $tabelaPrice;
}
?>
