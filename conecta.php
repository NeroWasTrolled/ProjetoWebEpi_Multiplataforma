<?php
    $conn = mysqli_connect("sql.freedb.tech","freedb_Bellingham","Bjy6P%Yr3p9??rm","freedb_Cristiano_Ronaldo");
    mysqli_set_charset($conn, "utf8");
    if (!$conn)
    {
        echo "Erro: ".mysqli_connect_error().PHP_EOL;
    }
?>