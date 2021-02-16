<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Pesdiv;

//pesquisa
$search = filter_input(INPUT_GET,'search', FILTER_SANITIZE_STRING);

//filtrando o tipo de pessoa
$filterTipoPes = filter_input(INPUT_GET,'tipo', FILTER_SANITIZE_STRING);
$filterTipoPes = in_array($filterTipoPes, ['F','J']) ? $filterTipoPes : '';


//condição de pesquisa
$conditions = [
    strlen($search) ? '(desc_title_div LIKE "%'.str_replace(' ','%', $search).'%"
     OR nome_pes LIKE "%'.str_replace(' ','%', $search).'%"
     OR document_pes LIKE "%'.str_replace(' ','%', $search).'%"
     OR endr_pes LIKE "%'.str_replace(' ','%', $search).'%")'  : null,
    strlen($filterTipoPes) ? 'tippes = "'.$filterTipoPes.'"' : null
];

// pega um, outro ou os dois
$conditions = array_filter($conditions);


// a condição real com where
$where = implode(' AND ',$conditions);

$pessoas = Pesdiv::getPessoas($where);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/datasheet.php';
include __DIR__.'/includes/footer.php';
