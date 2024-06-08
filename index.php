<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-language" content="pt-br">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MULTIPLATAFORMA - WEB</title>
        <link rel="icon" type="image/x-icon" href="icone.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
    // Função para calcular e exibir a mensagem dinâmica
    function exibirMensagemValidade() {
        // Obter a data de validade do input
        var dataValidade = new Date(document.getElementById('validade').value);
        // Obter a data atual
        var dataAtual = new Date();

        // Calcular a diferença em milissegundos
        var diferenca = dataValidade.getTime() - dataAtual.getTime();

        // Calcular o número de dias
        var dias = Math.ceil(diferenca / (1000 * 3600 * 24));

        // Selecionar o elemento do label da mensagem
        var labelMensagem = document.getElementById('mensagem-validade');

        // Verificar se a validade está dentro do período de alerta (3 dias)
        if (dias >= 0 && dias <= 3) {
            // Exibir a mensagem dinâmica
            labelMensagem.textContent = "Daqui " + dias + " dia(s), a EPI irá vencer.";
            // Adicionar classe CSS para destacar a mensagem
            labelMensagem.classList.add('golden-label');
        } else {
            // Limpar o conteúdo do label
            labelMensagem.textContent = "";
            // Remover a classe CSS para destacar a mensagem
            labelMensagem.classList.remove('golden-label');
        }
    }

    // Adicionar um evento para chamar a função quando a data de validade for alterada
    document.getElementById('validade').addEventListener('change', exibirMensagemValidade);
</script>
        <style>
            body {
                background-image: url('https://img.freepik.com/vetores-premium/fundo-de-luxo-dourado-gradiente_23-2149052326.jpg');
                background-size: cover;
                background-position: center;
                z-index: -1;
                background-color: #B0C4DE;
            }
        </style>
        <style>
        .modal-with-bg {
            background-image: url('https://img.freepik.com/vetores-premium/fundo-de-luxo-dourado-gradiente_23-2149052326.jpg');
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(10px);
        }
        .golden-label {
            color: gold;
        }
        </style>
    </head>
    <body>
         <center>
         <h1 style="color: gold;"><b>ENTREGA DE EPI</b></h1>
        </center>
        <hr/>
        <br/>
        <center>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar Entrega</button>
            <a class="btn btn-outline-warning" href="epiVencidas.php" role="button">EPI's Vencidas</a>
        </center>
        <br/>
        <main>
            <div class="container">
                <div class="row row-cols-2 row-cols-md-4 md-4 text-center">
                    <div class="col-md-12">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#FFD700" class="bi bi-person-circle gold-icon" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>&nbsp;&nbsp;<b>ENTREGAS</b></h4>
                            </div>
                            <div class="card-body">
                                <?php
                                include 'funcionarios.php';
                                ?>                                
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </main>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-with-bg">
                    <div class="modal-header">
                        <h5 style="color: red;" class="modal-title" id="exampleModalLabel">CADASTROS DAS ENTREGAS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <form action="funcionariov2.php" method="post">
                            <label class="golden-label">MATRICULA</label>
                            <input type="number" class="form-control" name="matricula" placeholder="Digite matrícula do Funcionário" required/>
                            <label class="golden-label">NOME</label>
                            <input type="text" class="form-control" name="nome" placeholder="Digite nome do Funcionário" required/>
                            <label class="golden-label">EPI</label>
                            <input type="text" class="form-control" name="epi" placeholder="Digite nome da EPI" required/>
                            <label class="golden-label">DATA DE VALIDADE</label>
                            <input type="date" class="form-control" name="validade" id="validade" placeholder="Digite a validade da EPI" required/>
                            <br/>
                            <label id="mensagem-validade"></label>
                            <br/>
                            <button type="submit" class="btn btn-outline-light"><b>CADASTRAR</b></button>
                            </form>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>