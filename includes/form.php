<div class="container">

    <div class="left-align">
        <h2>Cadastrar Devedor</h2>
        <a href="index.php"><button class="btn btn-largewaves-effect waves-light green accent-4" type="submit" name="action">Voltar
                <i class="material-icons right">arrow_back</i>
            </button></a>
    </div>
    <br><br>

    <div class="row">
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s5">
                    <i class="material-icons prefix">perm_identity</i>
                    <input placeholder="digite o nome aqui" id="first_name" required="required" type="text" class="validate">
                    <label for="first_name">Nome:</label>
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix">portrait</i>
                    <input placeholder="Pessoa Física ou Jurídica" id="cpfcnpj" type="text" required="required" class="validate">
                    <label for="cpfcnpj">CPF/CNPJ: </label>

                </div>
                <div class="input-field col s3">
                    <i class="material-icons prefix">date_range</i>
                    <input id="dtNasc" placeholder="data de nascimento" class="validate datepicker" required="required" name='picker' type="text">
                    <label for="dtNasc">Data Nasc:</label>
                </div>
            </div>
             <div class="row">
                 <div class="input-field col s2">
                     <i class="material-icons prefix">location_on</i>
                     <input placeholder="00000-000" name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                            onblur="pesquisacep(this.value);" required="required" type="text" class="validate">
                     <label id="lcep" for="">CEP:</label>
                 </div>
                <div class="input-field col s4">
                <input name="rua" type="text" id="rua" size="60" required="required" class="validate">
                    <label id="lrua"  for="">Rua:</label>
                </div>
                 <div class="input-field col s2">
                    <input placeholder="n°" name="numedr" type="text" id="numedr" size="40" required="required" class="validate">
                     <label id="lnumedr" for="numedr">Número:</label>
                 </div>
                 <div class="input-field col s4">
                     <input name="complemento" placeholder="apto, casa, fundos, outros" type="text" id="complemento" size="40" >
                     <label id="lComplemento" for="bairro">Complemento:</label>
                 </div>
             </div>
            <div class="row">

                <div class="input-field col s3">
                    <input name="bairro" type="text" id="bairro" size="40" required="required" class="validate" >
                    <label id="lbairro" for="bairro">Bairro:</label>
                </div>
                <div class="input-field col s3">
                    <input name="cidade" type="text" id="cidade" size="40" required="required" class="validate">
                    <label id="lcidade" for="cidade" >Cidade:</label>
                </div>
                <div class="input-field col s3">
                    <input name="uf" type="text" id="uf" size="2" required="required" class="validate">
                    <label id="luf" for="uf" >Estado:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="textarea2" class="materialize-textarea" data-length="120" required="required" class="validate"></textarea>
                    <label for="textarea2">Descrição do Título</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <i class="material-icons prefix">attach_money</i>
                    <input id="nValor" placeholder="valor do título" class="validate" required="required" name='nValor' type="number">
                    <label for="nValor">Valor:</label>
                </div>

                <div class="input-field col s3">
                    <i class="material-icons prefix">today</i>
                    <input id="dtVenc" placeholder="Vencimento do título" class="validate datepickerTwo" required="required" name='dtVenc' type="text">
                    <label for="dtVenc">Vencimento:</label>
                </div>
            </div>
        </form>
        <p class="center-align">
            <button class="waves-effect waves-light btn" type="submit"><i class="material-icons right">send</i>salvar</button>
        </p>
    </div>

</div>

