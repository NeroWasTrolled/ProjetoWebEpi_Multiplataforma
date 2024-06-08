<?php
    include 'conecta.php';
    $timezone = new DateTimeZone('America/Sao_Paulo');
    $id = $_GET['id'];
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $epi = $_POST['epi'];    
    $data_entrega = new DateTime();
    
    // Converte a data de validade para formato de data
    $data_validade = DateTime::createFromFormat('Y-m-d', $_POST['validade']);
    
    // Calcula a diferença de dias entre a data de entrega e a data de validade
    $diferenca = $data_entrega->diff($data_validade);
    
    // Obtém o número de dias da diferença
    $dias = $diferenca->days;
    
    // Adiciona os dias à data de entrega para obter a data de vencimento
    $data_vencimento = clone $data_entrega;
    $data_vencimento->add(new DateInterval("P{$dias}D"));
    
    $data_entrega_formatada = $data_entrega->format("Y-m-d");
    $data_validade_formatada = $data_vencimento->format("Y-m-d");
    
    $sql = "UPDATE multiweb SET matricula='$matricula',nome='$nome',epi='$epi',data_entrega='$data_entrega_formatada',data_vencimento='$data_validade_formatada' WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script language= 'javascript' type='text/javascript'>
                window.location.href='index.php';
                </script>";
    } else {
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>
