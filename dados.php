<?php
    ## Conexão com o banco de dados
    include 'conexao.php';

    ## Dados do GET
    $tabela = $_GET['tabela'];

    ## Dados do DataTable
    /* Os valores do $_POST são armazenados em variáveis ​​que são passadas pelo DataTable durante a solicitação AJAX: draw, start, length, order, columnIndex, column name, order, e search. */
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Quantidade de registros por página
    $columnIndex = $_POST['order'][0]['column']; // Índice da coluna
    $columnName = $_POST['columns'][$columnIndex]['data']; // Nome da coluna
    $columnSortOrder = $_POST['order'][0]['dir']; // Ordem de classificação da coluna (asc ou desc)
    $searchValue = mysqli_real_escape_string($con, $_POST['search']['value']); // Valor de pesquisa

    $columns = []; // Array de nome dos campos da tabela
    foreach ($_POST['columns'] as $key => $value) {
        $columns[$key] = $value['data'];
    }

    ## Busca
    $searchQuery = " ";
    if ($searchValue != '') {
        $searchQuery = "";
        foreach ($columns as $campo) {
            $searchQuery .= $campo . " LIKE '%" . $searchValue . "%' OR ";
        }
        $searchQuery = " AND ( ".substr($searchQuery, 0, -4)." ) ";
    }

    ## Número total de registros sem filtro
    $sel = mysqli_query($con, "SELECT count(*) AS total FROM $tabela");
    $records = mysqli_fetch_assoc($sel);
    $totalRecords = $records['total'];

    ## Número total de registros com filtro
    $sel = mysqli_query($con, "SELECT count(*) AS total FROM $tabela WHERE 1 " . $searchQuery);
    $records = mysqli_fetch_assoc($sel);
    $totalRecordwithFilter = $records['total'];

    ## Buscar registros
    $empQuery = "SELECT * FROM $tabela WHERE 1 " . $searchQuery . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT " . $row . "," . $rowperpage;
    $empRecords = mysqli_query($con, $empQuery);
    $data = array();

    while ($row = mysqli_fetch_assoc($empRecords)) {

        //verifica se o arquivo para formata os dados dos campos existe
        if (file_exists($tabela.'-tabelaformata.php')) {
            include $tabela.'-tabelaformata.php';
        }

        //Adicionar linha de dados ao array
        $nome = [];
        foreach ($columns as $campo) {
            $nome[$campo] = $row[$campo];
        }
        $data[] = $nome;
    }

    ## Resposta
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
