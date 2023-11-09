<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>DataTables</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {

            $.fn.dataTable.ext.errMode = 'none';

            $('#tabela').DataTable({
                "responsive": true,
                "processing": true,
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
                "language": {"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"}
            });
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ms-3" href="#">DataTables</a>
    </nav>

    <div class="container mt-5">
        <table id="tabela" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Cidade</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <footer class="footer mt-auto py-3 bg-light fixed-bottom">
        <div class="container">
            <span class="text-muted">
                <p>Mari05liM</p>
            </span>
        </div>
    </footer>
</body>

</html>