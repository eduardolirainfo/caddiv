
<?php

    function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++)
     {
         if($mask[$i] == '#')
         {
             if(isset($val[$k]))
                 $maskared .= $val[$k++];
         }
         else
         {
             if(isset($mask[$i]))
                 $maskared .= $mask[$i];
         }
     }
     return $maskared;
    }

    $result ='';
    $document_pes ='';
    foreach ($pessoas as $pessoa){
        if($pessoa->tippes === "F"){
            $document_pes = mask($pessoa->document_pes, '###.###.###-##');
        }else{
            $document_pes =  mask($pessoa->document_pes, '##.###.###/####-##');
        }

        $result .= '<tr>
                       <td>'.$pessoa->nome_pes.'</td>
                       <td>'.$document_pes.'</td>
                       <td>'.date('d/m/Y', strtotime($pessoa->nasc_pes)).'</td>
                       <td>'.$pessoa->endr_pes.'</td>
                       <td>'.$pessoa->desc_title_div.'</td>
                       <td>'.date('d/m/Y', strtotime($pessoa->data_venc_div)).'</td>
                       <td>'.$pessoa->val_div.'</td>
                       <td>'.date('d/m/Y à\s H:i:s', strtotime($pessoa->update_div)).'</td>
                       <td>                    
                        <a href="editpes.php?id='.$pessoa->id_div.'" class="btn btn-floating waves-effect waves-light modal-trigger green" >
                            <i class="material-icons">edit</i>
                        </a>                        
                        <a href="delpes.php?id='.$pessoa->id_div.'" class="btn btn-floating waves-effect waves-light modal-trigger red" >
                            <i class="material-icons">delete</i>
                        </a>
                       </td>
                    </tr>';
    }
    $result = strlen($result) ? $result : '<tr>
                                                           <td colspan="9" class="center-align">
                                                                  Nenhuma pessoa encontrada
                                                           </td>
                                                        </tr>';

    $msg = '';
    if(isset($_GET['status'])){
          switch ($_GET['status']) {
            case 'success':
                $msg = '<div id="alert_box" class="card-content green-text text-darken-4 green accent-2 ">Ação executada com sucesso!<i class="material-icons icon_style" id="alert_close" aria-hidden="true">close</i></div>';
                break;
            case 'error':
                $msg = '<div id="alert_box" class="card-content red-text text-lighten-4  red accent-4">Ação não executada!<i class="material-icons icon_style" id="alert_close" aria-hidden="true">close</i></div>';
                break;
        }
    }
?>

<div class="container">
            <div class="left-align">
                <div class="card z-depth-0">
                    <?=$msg?>
                  </div>
                <h2>Devedores</h2>
                <a href="cadpes.php"><button class="btn btn-largewaves-effect waves-light green accent-4" type="submit" name="action">Novo Cadastro
                        <i class="material-icons right">person_add</i>
                    </button></a>
            </div>
            <br><br>


            <table class="table striped highlight responsive-table">
                <thead class="">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Título</th>
                    <th scope="col">Vencimento</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Atualização</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>

                <tbody>
                    <?=$result?>
                </tbody>
            </table>
</div>



