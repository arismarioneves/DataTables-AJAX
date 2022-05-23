<?php
    //Customizar a exibição de dados
    $row['nome'] = '<a href="javascript:void(0);" onclick="editar(' . $row['id'] . ')">' . $row['nome'] . '</a>';
