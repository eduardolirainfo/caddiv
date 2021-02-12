
<?php

function mask($val, $mask)
{
    $maskared = '';
    $k = 0;
    for ($i = 0; $i <= strlen($mask) - 1; $i++) {
        if ($mask[$i] == '#') {
            if (isset($val[$k]))
                $maskared .= $val[$k++];
        } else {
            if (isset($mask[$i]))
                $maskared .= $mask[$i];
        }
    }
    return $maskared;
}
if($objPesdiv->tippes === "F"){
    $document_pes = mask($objPesdiv->document_pes, '###.###.###-##');
}else{
    $document_pes =  mask($objPesdiv->document_pes, '##.###.###/####-##');
}

?>
<div class="container">

    <div class="left-align">
        <h2>Excluir pessoa</h2>
    </div>
    <br><br>

    <div class="row">
        <form method="post" class="col s12 formulary" >

            <div class="row">
                <div class="input-field col s5">
                    <p>Tem certeza que esta pessoa pagou o que estava devendo?</p>
                    <p>Nome: <?=$objPesdiv->nome_pes;?><?=' ( '.$document_pes.' )'?></p>
                    <p>Título: <?=$objPesdiv->desc_title_div;?>  <strong>( Vencido em: <?=date('d/m/Y', strtotime($objPesdiv->data_venc_div)); ?> )</strong></p>
                    <p>Valor devido: <?=$objPesdiv->val_div;?></p>
                    <a href="index.php"><button class="btn btn-largewaves-effect waves-light green accent-4" type="button" name="action">Cancelar
                            <i class="material-icons right">arrow_back</i>
                        </button></a>
                        <button class="waves-effect waves-light btn red" type="submit" name="excluir" id="send"><i class="material-icons right">send</i>Excluir</button>

                </div>
            </div>

        </form>
    </div>

</div>

