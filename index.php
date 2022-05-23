<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dados</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

        <script>
            $(document).ready(function() {

                $.fn.dataTable.ext.errMode = 'none';

                $('#tabela').DataTable({
                    //"processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "dados.php?tabela=info",
                        "type": "POST"
                    },
                    "columns": [
                        {"data": "nome"},
                        {"data": "email"},
                        {"data": "telefone"},
                        {"data": "cidade"}
                    ],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                    }
                });
            });
        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Dados</a>
        </nav>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <table id="tabela" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Cidade</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">
                    <p>
                        Mari05liM
                    </p>
                </span>
            </div>
        </footer>
    </body>
</html>