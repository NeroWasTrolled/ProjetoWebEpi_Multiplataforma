<?php
    include 'conecta.php';
    $funcionario = mysqli_query($conn, "SELECT * FROM multiweb");
    $row = mysqli_num_rows($funcionario);
    
    if($row > 0)
    {
        echo "<table class='table table-striped table-hover'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>MATRICULA</th>";
        echo "<th>NOME</th>";
        echo "<th>EPI</th>";
        echo "<th>DATA DA ENTREGA</th>";
        echo "<th>DATA DE VENCIMENTO</th>";
        echo "<th>AÇÕES</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";        
        while ($registro = $funcionario->fetch_array())
        {
            $data_entrega_formatada = $registro['data_entrega'];
            $data_validade_formatada = $registro['data_vencimento'];
            $matricula = $registro['matricula'];
            $id = $registro['id'];
            echo '<tr>';
            echo '<td>'.$registro['matricula'].'</td>';
            echo '<td>'.$registro['nome'].'</td>';
            echo '<td>'.$registro['epi'].'</td>';
            echo '<td>'.date("d/m/Y", strtotime($data_entrega_formatada)).'</td>';
            echo '<td>'.date("d/m/Y", strtotime($data_validade_formatada)).'</td>';
            echo '<td><a href="editar.php?id='.$id.'"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
            </svg></a> | <a><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="red" class="bi bi-trash3" viewBox="0 0 16 16" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#confirmacaoModal">
            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
            </svg></a></td>';
            echo '</tr>';
        }
        echo '<div class="modal fade" id="confirmacaoModal" tabindex="-1" aria-labelledby="confirmacaoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-image: url(\'https://img.freepik.com/vetores-gratis/design-de-fundo-escuro-abstrato-luxo-linhas-douradas_1017-24789.jpg?size=626&ext=jpg\'); background-size: cover;">
                <div class="modal-header">
                    <h5 style="color: red;" class="modal-title gold-text" id="confirmacaoModalLabel">CONFIRMAÇÃO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="color: gold;" class="gold-text">Continuar com Exclusão?</p>                       
                </div>
                <div class="modal-footer">
                    <form action="excluir.php" method="get">
                        <input type="hidden" name="id" value="'.$id.'">                          
                        <button type="submit" class="btn btn-outline-success gold-text"><b>Continuar</b></button>
                        <button type="button" class="btn btn-outline-danger gold-text" data-bs-dismiss="modal">Cancelar</button>
                    </form>                     
                </div>
            </div>
        </div>
    </div>';
        echo '</tbody>';
        echo '</table>';
        echo 'Total de registros: ', $row;
    }
    else
    {
        echo "<center><svg xmlns='http://www.w3.org/2000/svg' width='64' height='64' fill='red' class='bi bi-hand-thumbs-down' viewBox='0 0 16 16'>
        <path d='M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856s-.036.586-.113.856c-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a10 10 0 0 1-.443-.05 9.36 9.36 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a9 9 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581s-.027-.414-.075-.581c-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.2 2.2 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.9.9 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1'/>
      </svg></center>";
        echo "<br/>";
        echo "<center><h2><b>NÃO EXISTE REGISTROS DE ENTREGA CADASTRADAS</b></h2></center>";
    }
?>  