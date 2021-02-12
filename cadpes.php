<?php
require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Pessoa');

use \App\Entity\Pesdiv;
$objPesdiv = new Pesdiv;


// valida post form
if(isset($_POST['tipopes'])){

    $objPesdiv->nome_pes = $_POST['namepes'];
    $original = array(".", "/", "-");
    $subistituir = array("","","");
    $objPesdiv->document_pes = str_replace($original, $subistituir ,$_POST['cpfcnpj']);
    $dtNasc = strtr($_POST['dtNasc'], '/', '-');
    $objPesdiv->nasc_pes = date("Y-m-d",strtotime($dtNasc));
    $objPesdiv->val_div = $_POST['nValor'];
    $objPesdiv->tippes = $_POST['tipopes'];
    $objPesdiv->desc_title_div = $_POST['desctitlediv'];
    $dtVenc = strtr($_POST['dtVenc'], '/', '-');
    $objPesdiv->data_venc_div = date("Y-m-d",strtotime($dtVenc));
    $objPesdiv->endr_pes .= $_POST['rua'];
    $objPesdiv->endr_pes .= ", ".$_POST['numedr'];
    $objPesdiv->endr_pes .= !empty($_POST['complemento']) ? ", ".$_POST['complemento'] : "" ;
    $objPesdiv->endr_pes .= " . CEP: ".$_POST['cep'];
    $objPesdiv->endr_pes .= " - ".$_POST['bairro'];
    $objPesdiv->endr_pes .= ", ".$_POST['cidade'];
    $objPesdiv->endr_pes .= "/".$_POST['uf'];
    $objPesdiv->update_div = date('Y-mm-dd H:i:s');

    $objPesdiv->cadastrarPessoa();

    header('location: index.php?status=success');

    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formcad.php';
include __DIR__.'/includes/footer.php';
