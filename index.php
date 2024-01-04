<?php
    require_once 'Frete.class.php';
    $estadosRegiao = ["AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"];
    $tiposDeCaixas = [
        "CE-01",
        "CE-02",
        "CE-03",
        "CE-04",
        "CE-05",
        "CE-06",
        "RPC 7B",
        "4B",
        "5B",
        "6B",
        "RPC 1B",
        "RPC 2B",
        "RPC 3B",
    ];

    // Lida com os parâmetros do formulário
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
        $caixa = isset($_POST['caixa']) ? $_POST['caixa'] : null;
        $kg = isset($_POST['kg']) ? $_POST['kg'] : null;
    } else {
        // Se não houver dados de formulário, use o intervalo padrão de 7 dias atrás até hoje
        $estado = empty($_POST['estado']) ? 'PR' : $_POST['estado'];
        $caixa = empty($_POST['caixa']) ? 'CE-01' : $_POST['caixa'];
        $kg = empty($_POST['kg']) ? '1' : $_POST['kg'];
    }

    // Exemplo de uso
    $pesoProduto = $kg; // em kg
    $estadoDestino = $estado; // Destino

    $frete = CalculadoraFrete::calcularFrete($pesoProduto, $estadoDestino, $caixa);

    if (is_numeric($frete)) {
        $msg = "O custo do frete é: R$ " . number_format($frete, 2, ',', '.');
    } else {
        $msg = $frete;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-light-gray">
    <h1>Cálculo de preços e prazos de entrega</h1>

    <p>Preencha os campos abaixo para simular o preço de envio e o prazo de entrega das suas encomendas ou correspondências.</p>
    <div class="w3-container">
        <div class="w3-white w3-border w3-round w3-padding">
            <form action="" method="post">
                <div class="w3-row">
                    <div class="w3-third w3-container">
                        <label for="estado">Selecione o Destino:</label>
                        <select class="w3-select" name="estado" required id="estado">
                            <option value="<?= $estado;?>" selected><?= $estado;?></option>
                            <?php
                                foreach ($estadosRegiao as $estado) {
                                    echo '<option value="'.$estado.'">'.$estado.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="w3-third w3-container">
                        <label for="caixa">Selecione a Embalagem:</label>
                        <select class="w3-select" name="caixa" required id="caixa">
                            <option value="<?= $caixa;?>" selected><?= $caixa;?></option>
                            <?php
                                foreach ($tiposDeCaixas as $caixa) {
                                    echo '<option value="'.$caixa.'">'.$caixa.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="w3-third w3-container">
                        <label for="kg">Selecione o Kilogramas(KG):</label>
                        <select class="w3-select" name="kg" required id="kg">
                            <option value="<?= $kg;?>" selected><?= $kg;?></option>
                            <?php
                                for ($kg = 1; $kg <= 30; $kg++) {
                                    echo '<option value="'.$kg.'">'.$kg.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="w3-bar">
                    <button class="w3-bar-item w3-button w3-blue w3-round w3-right w3-margin-top w3-margin-bottom" type="submit">Calcular</button>
                </div>
            </form>
            <hr>
            <div class="w3-center">
                <h2><?=$msg?></h2>
                <span class="w3-opacity w3-small"><b>Atenção:</b> <i>isso é uma estimativa não é um dado real.</i></span>
            </div>
        </div>
    </div>
</body>
</html>