<?php
include_once '../DAO/AgendaDao.php';

$action = "inserir";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <div class="container">
        <form action="../controller/AgendaController.php?<?php echo $action?>"
            method="POST" 
            class="form-control">
            <label for="hora" class="form-label">Selecione um horario para agendar: </label>
            <input type="time" name="hora" id="hora" class="form-control">
            
            <label for="data" class="form-label">Selecione uma data:</label>
            <input type="date" name="data" id="data" class="form-control">

            <br>
            <input class="btn btn-secondary" type="reset" name="b1" value="Limpar">
            <input class="btn btn-secondary" type="submit" id="bt1" value="Agendar">
        </form>
    </div>
    <div class="container">
        <table class="table" >
            <thead>
                <tr>
                    <th>HORA</th>
                    <th>DATA</th>
                </tr>
            </thead>
            <tbody>
                 <?php 
                    $lista = AgendaDao::buscar();
                        foreach($lista as $agenda){
                            echo '<tr>';
                            echo '<td>'.$agenda->getHora().'</td>';
                            echo '<td>'.$agenda->getData().'</td>';
                            echo '<td><a href="../controller/AgendaController.php?excluir&id='.$agenda->getId().'">
                            <button>Desmarcar</button> </a> </td>';
                            echo '</tr>';
                   }
                   ?>

            </tbody>
        </table>

    </div>

</body>
</html>