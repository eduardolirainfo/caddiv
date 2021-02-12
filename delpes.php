<?php
require __DIR__.'/vendor/autoload.php';

define('TITLE','Excluir Pessoa');

use \App\Entity\Pesdiv;



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

// Consulta pessoa
$objPesdiv = Pesdiv::getPessoa($_GET['id']);


//valida edição da pessoa
if (!$objPesdiv instanceof Pesdiv){
    header('location: index.php?status=error');
    exit;
}


// valida post form
if(isset($_POST['excluir'])){

    $objPesdiv->deletePessoa();

    header('location: index.php?status=success');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confdel.php';
include __DIR__.'/includes/footer.php';
