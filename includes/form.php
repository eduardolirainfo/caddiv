
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

?><div class="container">

    <div class="left-align">
        <h2><?=TITLE?></h2>
        <a href="index.php"><button class="btn btn-largewaves-effect waves-light green accent-4" type="submit" name="action">Voltar
                <i class="material-icons right">arrow_back</i>
            </button></a>
    </div>
    <br><br>

    <div class="row">
        <form method="post" class="col s12 formulary" >
            <div class="row">
                <div class="input-field col s5">
                <p>
                    <label>
                        <input id="tippesfis" name="tipopes" type="radio" value="F" checked >
                         <span>Física(CPF)</span>
                    </label>
                    <label>
                                      <input type="radio" id="tippesjur"   type="radio" name="tipopes" value="J"  <?=$objPesdiv->tippes == 'J' ? 'checked' : '' ?> >
                        <span>Jurídica(CNPJ)</span>
                    </label>
                </p>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s5">
                    <i class="material-icons prefix">perm_identity</i>
                    <input value="<?=$objPesdiv->nome_pes; ?>" placeholder="digite o nome aqui" name="namepes" id="namepes" required="required" type="text" class="validate">
                    <label for="namepes">Nome:</label>
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix">portrait</i>
                    <input value="<?=$document_pes; ?>"  placeholder="Pessoa Física ou Jurídica" name="cpfcnpj" id="cpfcnpj" type="text" required="required" class="validate">
                    <label for="cpfcnpj">CPF/CNPJ: </label>

                </div>
                <div class="input-field col s3 dtNasc">
                    <i class="material-icons prefix">date_range</i>
                    <input value="<?=date('d/m/Y', strtotime($objPesdiv->nasc_pes)); ?>" id="dtNasc" placeholder="data de nascimento" class="validate datepicker" required="required" name='dtNasc' type="text">
                    <label for="dtNasc">Data Nasc:</label>
                </div>
            </div>
             <div class="row">
                 <div class="input-field col s2">
                     <i class="material-icons prefix">location_on</i>
                     <input placeholder="00000-000" name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" required="required" class="validate">
                     <label  id="cep" for="cep">CEP:</label>
                 </div>
                <div class="input-field col s4">
                <input placeholder="logradouro" name="rua" type="text" id="rua" size="60" required="required" class="validate">
                    <label id="rua"  for="rua">Rua:</label>
                </div>
                 <div class="input-field col s2">
                    <input placeholder="n°" name="numedr" type="text" id="numedr" size="40" required="required" class="validate">
                     <label id="numedr" for="numedr">Número:</label>
                 </div>
                 <div class="input-field col s4">
                     <input name="complemento" placeholder="apto, casa, fundos, outros" type="text" id="complemento" size="40" >
                     <label id="Complemento" for="Complemento">Complemento:</label>
                 </div>
             </div>
            <div class="row">
                <div class="input-field col s3">
                    <input name="bairro" type="text" id="bairro" size="40" required="required" class="validate" >
                    <label id="bairro" for="bairro">Bairro:</label>
                </div>
                <div class="input-field col s3">
                    <input name="cidade" type="text" id="cidade" size="40" required="required" class="validate">
                    <label id="cidade" for="cidade" >Cidade:</label>
                </div>
                <div class="input-field col s3">
                    <input  name="uf" type="text" id="uf" size="2" required="required" class="validate">
                    <label id="uf" for="uf" >Estado:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8">
                    <i class="material-icons prefix">mode_edit</i>
                    <input value="<?=$objPesdiv->desc_title_div; ?>" name="desctitlediv" type="text" id="desctitlediv" size="50" required="required" class="validate">
                    <label for="desctitlediv">Descrição do Título</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <i class="material-icons prefix">attach_money</i>
                    <input value="<?=floatval(filter_var($objPesdiv->val_div, FILTER_SANITIZE_NUMBER_FLOAT)/ 100);?>" id="nValor" placeholder="valor do título" class="validate" required="required" name='nValor' type="text">
                    <label for="nValor">Valor:</label>
                </div>
                <div class="input-field col s3">
                    <i class="material-icons prefix">today</i>
                    <input value="<?=date('d/m/Y', strtotime($objPesdiv->data_venc_div)); ?>" id="dtVenc" placeholder="Vencimento do título" class="validate datepickerTwo" required="required" name='dtVenc' type="text">
                    <label for="dtVenc">Vencimento:</label>
                </div>
            </div>
            <p class="center-align">
                <button class="waves-effect waves-light btn" type="submit" name="enviar" id="send"><i class="material-icons right">send</i>salvar</button>
            </p>
        </form>
    </div>

</div>

