<?php
include 'conecta.php';

$timezone = new DateTimeZone('America/Sao_Paulo'); 

$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
$epi = $_POST['epi'];
$validade = $_POST['validade'];

$data_entrega = new DateTime();
$data_validade = new DateTime($validade);

 if ($data_validade < $data_entrega) {
    echo "<script language='javascript' type='text/javascript'>
          alert('A data de validade não pode ser anterior à data de entrega!');
          window.location.href='index.php';
          </script>";
    exit();
}

$hoje = new DateTime();
$diferenca = $hoje->diff($data_validade);
$dias_para_vencer = $diferenca->days;

$data_validade_formatada = $data_validade->format("Y-m-d");

$query = $conn->query("SELECT * FROM multiweb WHERE nome='$nome' AND epi='$epi'");
if (mysqli_num_rows($query) > 0) {
    echo "<script language='javascript' type='text/javascript'>
          alert('Funcionário já existe em nossa base de dados!');
          window.location.href='index.php';
          </script>";
    exit();
} else {
    $sql = "INSERT INTO multiweb (matricula, nome, epi, data_entrega, data_vencimento) 
            VALUES ('$matricula', '$nome', '$epi', CURRENT_DATE, '$data_validade_formatada')";
    if (mysqli_query($conn, $sql)) {
        if ($dias_para_vencer <= 3) {
            echo "<script language='javascript' type='text/javascript'>
                  alert('Atenção! O EPI irá vencer em breve!');
                  </script>"; 
        }
        echo "<script language='javascript' type='text/javascript'>
              window.location.href='index.php';
              </script>"; 
    } else {
        echo "Erro ao inserir os dados: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
