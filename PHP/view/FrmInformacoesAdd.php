<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Informações Adicionais</title>
</head>
<body>
    <div class="container">
        <form action="" class="form-action">
            <label for="">Horário Agendado </label>
            <h2>15:30</h2>

            <label for="cpfTutor" class="form-label">Pesquise o CPF:</label>
            <input type="text" name="cpfTutor" id="cpfTutor" class="form-control" placeholder=" cpf tutor">
            <input type="button" class="btn btn-secondary" id="btSearch" value="buscar"><br>

            <label for="selePet" class="form-label">Selecione o Pet</label>
            <select class="form-select" name="selePet" id="selePet">
                <option selected>Selecione seu pet</option>
                <option value="Bob">Bob</option>
                <option value="Lobo">Lobo</option>
                <option value="Rex">Rex</option>
            </select>

            <label for="senhaCliente" class="form-label">Digite sua senha: </label>
            <input type="password" class="form-control" name="senhaCliente" id="senhaCliente">

            <input type="submit" class="btn btn-secondary" name="bt1" value="Agendar">

        </form>
    </div>
</body>
</html>