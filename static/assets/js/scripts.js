// SIDENAV
$(document).ready(function(){

    //sidenav lateral
    $('.sidenav').sidenav();

    //modo dark
    // Código em : https://stackoverflow.com/a/34254979/751570
    $('.dark-toggle').on('click',function(){
        if ($(this).find('i').text() == 'brightness_4'){
            $(this).find('i').text('brightness_high');
        } else {
            $(this).find('i').text('brightness_4');
        }
    });

    //contador da textarea
    $('input#input_text, textarea#textarea2').characterCounter();



    //datepicker dos campos de data
    $('.datepicker').datepicker({
        defaultDate: new Date(),
        format: 'dd/mm/yyyy',
        container: 'body',
        selectYears: 200,
        maxDate: new Date(Date.now() -  1555200000),
        minDate: new Date(1900, 1, 10)
    });


    $('.datepickerTwo').datepicker({
        defaultDate: new Date(),
        format: 'dd/mm/yyyy',
        container: 'body',
        maxDate: new Date(Date.now() - 86400000),
        selectYears: 200,
        minDate: new Date(1900, 1, 10)
    });


    //máscara de CPF, CNPJ
    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('#cpfcnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('#cpfcnpj').length > 11 ? $('#cpfcnpj').mask('00.000.000/0000-00', options) : $('#cpfcnpj').mask('000.000.000-00#', options);

    $('#txtTelefone').mask('(00) 0000-0000'); //Telefone
    $('#cep').mask('00000-000'); //CEP
    $('#txtValor').mask('000.000.000.000.000,00', {reverse: true}); //Dinheiro


    // pesquisa de cep
    // fonte: https://viacep.com.br/
    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#numedr").val("");
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
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro)
                            $("#bairro").val(dados.bairro)
                            $("#cidade").val(dados.localidade)
                            $("#uf").val(dados.uf).addClass("active");
                            $("#lrua").addClass( "active");
                            $("#lbairro").addClass("active");
                            $("#lcidade").addClass("active");
                            $("#luf").addClass("active");
                            $( "#numedr" ).focus();
                            $( "#lnumedr" ).addClass("active");

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
    });



});
