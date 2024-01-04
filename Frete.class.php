<?php

class CalculadoraFrete
{
    private $peso;
    private $estadoDestino;

    /**
    * Tabela de preços padrões por estado.
    *
    * Os valores são definidos para algumas unidades monetárias fictícias.
    * Pode ser ajustado conforme necessário para refletir a realidade logística.
    *
    * @var array
    */

    // Tabela de preços padrões por estado DADO FICTICIOS
    private static $tabelaPrecos = [
        'AC' => 25.00,
        'AL' => 22.00,
        'AP' => 20.00,
        'AM' => 30.00,
        'BA' => 18.00,
        'CE' => 21.00,
        'DF' => 60.00,
        'ES' => 20.00,
        'GO' => 17.00,
        'MA' => 23.00,
        'MT' => 25.00,
        'MS' => 23.00,
        'MG' => 18.00,
        'PA' => 28.00,
        'PB' => 22.00,
        'PR' => 12.00,
        'PE' => 23.00,
        'PI' => 24.00,
        'RJ' => 20.00,
        'RN' => 22.00,
        'RS' => 15.00,
        'RO' => 28.00,
        'RR' => 30.00,
        'SC' => 14.00,
        'SP' => 15.00,
        'SE' => 25.00,
        'TO' => 27.00,
    ];

    private static $tabelaPrecosCaixas = [
        'CE-01' => 8.05,
        'CE-02' => 8.90,
        'CE-03' => 11.75,
        'CE-04' => 17.50,
        'CE-05' => 28.65,
        'CE-06' => 23.25,
        'RPC 7B' => 11.50,
        '4B' => 13.75,
        '5B' => 27.75,
        '6B' => 28.15,
        'RPC 1B' => 6.65,
        'RPC 2B' => 8.15,
        'RPC 3B' => 11.00,
    ];

    /**
    * Calcula o frete com base no peso e no estado de destino.
    *
    * @param float $peso Peso do produto em quilogramas.
    * @param string $estadoDestino Sigla do estado de destino.
    *
    * @return float|string O custo do frete ou uma mensagem de erro.
    */

    public static function calcularFrete($peso, $estadoDestino, $caixa)
    {
        // Verifica se o estado de destino está na tabela de preços
        if (isset(self::$tabelaPrecos[$estadoDestino])) {
            $precoPadrao = self::$tabelaPrecos[$estadoDestino];
            $precoCaixa = self::$tabelaPrecosCaixas[$caixa];

            // Adicione lógica adicional, como cálculo baseado no peso, descontos, etc.
            $freteFinal = $precoPadrao + ($peso * 2 + $precoCaixa); // Exemplo de cálculo baseado no peso

            return $freteFinal;
        } else {
            // Estado de destino não encontrado na tabela
            return "Estado de destino não suportado.";
        }
    }
}