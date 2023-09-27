<?php
    require_once('Conta.php');

    echo "Temos ".Conta::getTotalDeContas()." objeto(s) do tipo Conta em memória.<br>";
    $conta1 = new Conta(1, new Cliente("Dhiovanna", "123.456.789-10"));
    
    $conta1->deposita(3000);

    $conta2 = new Conta(2, new Cliente("Maria Eduarda", "123.456.789-11"));
    $conta2->getTitular()->setNome("Kayllane");
    $conta2->deposita(40000);
    echo "Temos ".Conta::getTotalDeContas()." objeto(s) do tipo Conta em memória.<br>";

    $umCliente = new Cliente("Maria Eduarda Louback", "123.456.789-12");

    $conta3 = new Conta(3, $umCliente);
    $conta3->deposita(40000);
    echo "Temos ".Conta::getTotalDeContas()." objeto(s) do tipo Conta em memória.<br>";

    $conta3 = $conta2;
    echo "Temos ".Conta::getTotalDeContas()." objeto(s) do tipo Conta em memória.<br>";

    $conta1->mostraDados();
    echo "-----------------------------------------<br>";

    unset($conta1);
    echo "Temos ".Conta::getTotalDeContas()." objeto(s) do tipo Conta em memória.<br>";

    $conta2->mostraDados();
    echo "-----------------------------------------<br>";
    $conta3->mostraDados();
?>