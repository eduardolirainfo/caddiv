<?php
    require __DIR__.'/vendor/autoload.php';

    define('TITLE','Editar Pessoa');

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
    if(isset($_POST['tipopes'])){

        $objPesdiv->nome_pes = $_POST['namepes'];
        $original = array(".", "/", "-");
        $subistituir = array("","","");
        $objPesdiv->document_pes = str_replace($original, $subistituir ,$_POST['cpfcnpj']);
        $dtNasc = strtr($_POST['dtNasc'], '/', '-');
        $objPesdiv->nasc_pes = date("Y-m-d",strtotime($dtNasc));
        $price = floatval(filter_var($_POST['nValor'], FILTER_SANITIZE_NUMBER_FLOAT)/ 100);
        $objPesdiv->val_div = number_format($price, 2);
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


        $objPesdiv->updatePessoa();

        header('location: index.php?status=success');
        exit;

    }


    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/form.php';
    include __DIR__.'/includes/footer.php';
