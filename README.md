# Calculadora de Frete em PHP

Esta é uma simples calculadora de frete em PHP que permite calcular o custo de frete com base no peso do produto e no estado de destino.

## Como usar

1. Clone o repositório:

    ```bash
    git clone https://github.com/LuizBrunoST/calculo-de-frete.git
    ```

2. Abra o arquivo `CalculadoraFrete.php` em um editor de código.

3. Ajuste a tabela de preços padrões conforme necessário:

    ```php
    private $tabelaPrecos = [
        'AC' => 25.00,
        'AL' => 22.00,
        // ... (outras entradas)
        'SP' => 15.00,
        'SE' => 25.00,
        'TO' => 27.00,
    ];
    ```

4. Utilize a classe `CalculadoraFrete` em seu projeto:

    ```php
    // Exemplo de uso
    $pesoProduto = 1; // em kg
    $estadoDestino = 'PR'; // Destino
    $caixa = 'RPC 7B'; // Valor da caixa

    $frete = CalculadoraFrete::calcularFrete($pesoProduto, $estadoDestino, $caixa);

    if (is_numeric($frete)) {
        echo "O custo do frete é: R$ " . number_format($frete, 2, ',', '.');
    } else {
        echo $frete;
    }
    ```

## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues, enviar pull requests ou sugerir melhorias.

## Licença

Este projeto é licenciado sob a [Licença MIT](LICENSE).