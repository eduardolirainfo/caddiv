// SIDENAV
$(document).ready(function(){

    //sidenav lateral
    $('.sidenav').sidenav();

    $('.tabs').tabs({
        // swipeable : true,
        responsiveThreshold : 1920
    });

    $('#alert_close').click(function(){
        $( "#alert_box" ).fadeOut( "slow", function() {
        });
    });
    $( "#alert_box" ).fadeOut(6000);
    //contador da textarea

    $('textarea#desctitlediv').characterCounter();
    $('#desctitlediv').blur(function()
    {
        if(!$.trim(this.value).length) { // zero-length string AFTER a trim
            $('#desctitlediv').addClass('invalid');
        }else{
            $('#desctitlediv').addClass('valid');
        }
    });

    $( "#desctitlediv" ).keypress(function() {
        $('#desctitlediv').removeClass('valid');
        $('#desctitlediv').removeClass('invalid');
    });


    $("input[name=tipopes]:checked").next().text();


    // //máscara de CPF, CNPJ
    // var options = {
    //     onKeyPress: function (cpf, ev, el, op) {
    //         var masks = ['000.000.000-00'];
    //         $('#cpfcnpj').mask(masks[0], op);
    //     }
    // }
    //
    // $('#cpfcnpj').mask('000.000.000-00', options);


    $('#tippesfis').click(function() {
            //máscara de CPF, CNPJ
            var options = {
                onKeyPress: function (cpf, ev, el, op) {
                    var masks = ['000.000.000-00'];
                    $('#cpfcnpj').mask(masks[0], op);
                }
            }
            $('#cpfcnpj').mask('000.000.000-00', options);
    });

    $('#tippesjur').click(function() {
        if($('#radio_button').is(':checked')) {  }
         //máscara de CPF, CNPJ
        var cpf_cnpj2 = $(this).val();
        var options = {
            onKeyPress: function (cpf, ev, el, op) {
                var masks = ['00.000.000/0000-00'];
                $('#cpfcnpj').mask( masks[0], op);
            }
        }
        $('#cpfcnpj').mask('00.000.000/0000-00', options);

        // Testa a validação e formata se estiver OK
        if ( formata_cpf_cnpj( cpf_cnpj2 ) ) {
            $(this).val( formata_cpf_cnpj( cpf_cnpj2 ) );
        } else {
            $(this).addClass('invalid');
        }
    });


    //datepicker dos campos de data
    $('.datepicker').datepicker({
        defaultDate: new Date(),
        format: 'dd/mm/yyyy',
        container: 'body',
        dateFormat: "yyyy-mm-dd",
        selectYears: 15,
        maxDate: new Date(2005, 1, 24),
        minDate: new Date(1900, 1, 10)
    });

    document.addEventListener('DOMContentLoaded', function () {
        var options = {
            defaultDate: new Date(2018, 1, 3),
            setDefaultDate: true
        };
        var elems = document.querySelector('.datepickerTwo');
        var instance = M.Datepicker.init(elems, options);
        // instance.open();
        instance.setDate(new Date(2018, 2, 8));
    });

    $('.datepickerTwo').datepicker({
        defaultDate: new Date(),
        format: 'dd/mm/yyyy',
        container: 'body',
        selectYears: 15,
        dateFormat: "yyyy-mm-dd",
        maxDate: new Date(Date.now() - 86400000),
           minDate: new Date(1900, 1, 10)
    });

    $('#cep').mask('00000-000'); //CEP
    $('#uf').mask('AA');
    $('#nValor').maskMoney({
        decimal:".",
        thousands:","
    })

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#numedr").val("");
        $("#complemento").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                limpa_formulário_cep();
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro)
                        $("#bairro").val(dados.bairro)
                        $("#cidade").val(dados.localidade)
                        $("#uf").val(dados.uf)
                        $("label#rua").addClass( "active");
                        $("label#bairro").addClass("active");
                        $("label#cidade").addClass("active");
                        $("label#uf").addClass("active");
                        $("label#numedr" ).focus().addClass("active");


                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });


    // ---------------------------------------------------------------------------------------------------------------//

    /*
     verifica_cpf_cnpj

     Verifica se é CPF ou CNPJ

     fonte:
     @see http://www.todoespacoonline.com/w/
    */
    function verifica_cpf_cnpj ( valor ) {

        // Garante que o valor é uma string
        valor = valor.toString();

        // Remove caracteres inválidos do valor
        valor = valor.replace(/[^0-9]/g, '');

        // Verifica CPF
        if ( valor.length === 11 ) {
            if( valor != "00000000000" && valor != "11111111111" &&
                valor != "22222222222" && valor != "33333333333" &&
                valor != "44444444444" && valor != "55555555555" &&
                valor !="66666666666" && valor != "77777777777" &&
                valor != "88888888888" && valor != "99999999999"
            ){
                return 'CPF';
            }

        }

        // Verifica CNPJ
        else if ( valor.length === 14 ) {
            if( valor != "00000000000000" && valor != "11111111111111" &&
                valor != "22222222222222" && valor != "33333333333333" &&
                valor != "44444444444444" && valor != "55555555555555" &&
                valor !="66666666666666" && valor != "77777777777777" &&
                valor != "88888888888888" && valor != "99999999999999"
            ){
                return 'CNPJ';
            }

        }

        // Não retorna nada
        else {
            return false;
        }

    } // verifica_cpf_cnpj

    /*
     calc_digitos_posicoes

     Multiplica dígitos vezes posições

     @param string digitos Os digitos desejados
     @param string posicoes A posição que vai iniciar a regressão
     @param string soma_digitos A soma das multiplicações entre posições e dígitos
     @return string Os dígitos enviados concatenados com o último dígito
    */
    function calc_digitos_posicoes( digitos, posicoes = 10, soma_digitos = 0 ) {

        // Garante que o valor é uma string
        digitos = digitos.toString();

        // Faz a soma dos dígitos com a posição
        // Ex. para 10 posições:
        //   0    2    5    4    6    2    8    8   4
        // x10   x9   x8   x7   x6   x5   x4   x3  x2
        //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
        for ( var i = 0; i < digitos.length; i++  ) {
            // Preenche a soma com o dígito vezes a posição
            soma_digitos = soma_digitos + ( digitos[i] * posicoes );

            // Subtrai 1 da posição
            posicoes--;

            // Parte específica para CNPJ
            // Ex.: 5-4-3-2-9-8-7-6-5-4-3-2
            if ( posicoes < 2 ) {
                // Retorno a posição para 9
                posicoes = 9;
            }
        }

        // Captura o resto da divisão entre soma_digitos dividido por 11
        // Ex.: 196 % 11 = 9
        soma_digitos = soma_digitos % 11;

        // Verifica se soma_digitos é menor que 2
        if ( soma_digitos < 2 ) {
            // soma_digitos agora será zero
            soma_digitos = 0;
        } else {
            // Se for maior que 2, o resultado é 11 menos soma_digitos
            // Ex.: 11 - 9 = 2
            // Nosso dígito procurado é 2
            soma_digitos = 11 - soma_digitos;
        }

        // Concatena mais um dígito aos primeiro nove dígitos
        // Ex.: 025462884 + 2 = 0254628842
        var cpf = digitos + soma_digitos;

        // Retorna
        return cpf;

    } // calc_digitos_posicoes

    /*
     Valida CPF

     Valida se for CPF

     @param  string cpf O CPF com ou sem pontos e traço
     @return bool True para CPF correto - False para CPF incorreto
    */
    function valida_cpf( valor ) {

        // Garante que o valor é uma string
        valor = valor.toString();

        // Remove caracteres inválidos do valor
        valor = valor.replace(/[^0-9]/g, '');


        // Captura os 9 primeiros dígitos do CPF
        // Ex.: 02546288423 = 025462884
        var digitos = valor.substr(0, 9);

        // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
        var novo_cpf = calc_digitos_posicoes( digitos );

        // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
        var novo_cpf = calc_digitos_posicoes( novo_cpf, 11 );

        // Verifica se o novo CPF gerado é idêntico ao CPF enviado
        if ( novo_cpf === valor ) {
            // CPF válido
            return true;
        } else {
            // CPF inválido
            return false;
        }

    } // valida_cpf

    /*
     valida_cnpj

     Valida se for um CNPJ

     @param string cnpj
     @return bool true para CNPJ correto
    */
    function valida_cnpj ( valor ) {

        // Garante que o valor é uma string
        valor = valor.toString();

        // Remove caracteres inválidos do valor
        valor = valor.replace(/[^0-9]/g, '');


        // O valor original
        var cnpj_original = valor;

        // Captura os primeiros 12 números do CNPJ
        var primeiros_numeros_cnpj = valor.substr( 0, 12 );

        // Faz o primeiro cálculo
        var primeiro_calculo = calc_digitos_posicoes( primeiros_numeros_cnpj, 5 );

        // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
        var segundo_calculo = calc_digitos_posicoes( primeiro_calculo, 6 );

        // Concatena o segundo dígito ao CNPJ
        var cnpj = segundo_calculo;

        // Verifica se o CNPJ gerado é idêntico ao enviado
        if ( cnpj === cnpj_original ) {
            return true;
        }

        // Retorna falso por padrão
        return false;

    } // valida_cnpj

    /*
     valida_cpf_cnpj

     Valida o CPF ou CNPJ

     @access public
     @return bool true para válido, false para inválido
    */
    function valida_cpf_cnpj ( valor ) {

        // Verifica se é CPF ou CNPJ
        var valida = verifica_cpf_cnpj( valor );

        // Garante que o valor é uma string
        valor = valor.toString();

        // Remove caracteres inválidos do valor
        valor = valor.replace(/[^0-9]/g, '');


        // Valida CPF
        if ( valida === 'CPF' ) {
            // Retorna true para cpf válido
            return valida_cpf( valor );
        }

        // Valida CNPJ
        else if ( valida === 'CNPJ' ) {
            // Retorna true para CNPJ válido
            return valida_cnpj( valor );
        }

        // Não retorna nada
        else {
            return false;
        }

    } // valida_cpf_cnpj

    /*
     formata_cpf_cnpj

     Formata um CPF ou CNPJ

     @access public
     @return string CPF ou CNPJ formatado
    */
    function formata_cpf_cnpj( valor ) {

        // O valor formatado
        var formatado = false;

        // Verifica se é CPF ou CNPJ
        var valida = verifica_cpf_cnpj( valor );

        // Garante que o valor é uma string
        valor = valor.toString();

        // Remove caracteres inválidos do valor
        valor = valor.replace(/[^0-9]/g, '');


        // Valida CPF
        if ( valida === 'CPF' && $('#tippesfis').is(':checked'))    {

            // Verifica se o CPF é válido
            if ( valida_cpf( valor ) ) {

                // Formata o CPF ###.###.###-##
                formatado  = valor.substr( 0, 3 ) + '.';
                formatado += valor.substr( 3, 3 ) + '.';
                formatado += valor.substr( 6, 3 ) + '-';
                formatado += valor.substr( 9, 2 ) + '';

            }

        }

        // Valida CNPJ
        else if ( valida === 'CNPJ' && $('#tippesjur').is(':checked') ) {

            // Verifica se o CNPJ é válido
            if ( valida_cnpj( valor ) ) {

                // Formata o CNPJ ##.###.###/####-##
                formatado  = valor.substr( 0,  2 ) + '.';
                formatado += valor.substr( 2,  3 ) + '.';
                formatado += valor.substr( 5,  3 ) + '/';
                formatado += valor.substr( 8,  4 ) + '-';
                formatado += valor.substr( 12, 14 ) + '';

            }

        }

        // Retorna o valor
        return formatado;

    } // formata_cpf_cnpj

    // ---------------------------------------------------------------------------------------------------------------//

    // Aciona a validação e formatação ao sair do input
    $('#cpfcnpj').blur(function(){
        // O CPF ou CNPJ
        var cpf_cnpj = $(this).val();

        // Testa a validação e formata se estiver OK
        if ( formata_cpf_cnpj( cpf_cnpj ) ) {
            $(this).val( formata_cpf_cnpj( cpf_cnpj ) );
        } else {
            $('#cpfcnpj').addClass('invalid');
        }

    });
    $('#send').blur(function(){
  if ($("input:empty").length === 0){
      if ($('.formulary').find('invalid')) {
          $('button').prop("disabled", true);
      } else {
          $('button').removeProp("disabled")
          $('button').prop("disabled", false);
      }
  }});














    });
