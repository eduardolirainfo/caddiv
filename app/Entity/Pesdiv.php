<?php


namespace App\Entity;


use App\Db\Database;
use \PDO;

class Pesdiv
{

    /**
     * código da dívida
     * @var integer
     */
    public $id_div;

    /**
     * documento da pessoa
     * @var string
     */
    public $document_pes;

    /**
     * valor da dívida
     * @var float
     */
    public $val_div;

    /**
     * atualização da dívida
     * @var date
     */
    public $update_div;

    /**
     * data de vencimento da dívida
     * @var date
     */
    public $data_venc_div;

    /**
     * descrição do título da dívida
     * @var string
     */
    public $desc_title_div;

    /**
     * tipo de pessoa
     * @var String(f/j)
     */
    public $tippes;

    /*
     * nome da pessoa física
     * @var string
     */
    public $nome_pes;
    /*
     * endereço da pessoa física
     * @var string
     */
    public $endr_pes;
    /*
     * nascimento da pessoa física
     * @var date
     */
    public $nasc_pes;


    /**
     * Responsável pelo cadastro de pessoas
     * @return boolean
     */
    public function cadastrarPessoa(){

        $obDatabase = new Database('pesdiv');
        $this->id_div = $obDatabase->insert([
                                                'nome_pes' => $this->nome_pes,
                                                'nasc_pes' => $this->nasc_pes,
                                                'endr_pes' => $this->endr_pes,
                                                'document_pes' => $this->document_pes,
                                                'val_div' => $this->val_div,
                                                'data_venc_div' => $this->data_venc_div,
                                                'desc_title_div' => $this->desc_title_div,
                                                'tippes' => $this->tippes,
                                                'update_div' => $this->update_div
                                            ]);

        //retorno OK
        return true;


    }

    /**
     * Atualizar pessoa no banco de dados
     *@return boolean
     */
    public function updatePessoa(){
        return (new Database('pesdiv'))->update(' id_div = '.$this->id_div, [
                                                                                        'nome_pes' => $this->nome_pes,
                                                                                        'nasc_pes' => $this->nasc_pes,
                                                                                        'endr_pes' => $this->endr_pes,
                                                                                        'document_pes' => $this->document_pes,
                                                                                        'val_div' => $this->val_div,
                                                                                        'data_venc_div' => $this->data_venc_div,
                                                                                        'desc_title_div' => $this->desc_title_div,
                                                                                        'tippes' => $this->tippes,
                                                                                        'update_div' => $this->update_div
        ]);
    }

    /**
     * Excluir pessoa no banco de dados
     *@return boolean
     */
    public function deletePessoa(){
        return (new Database('pesdiv'))->delete(' id_div = '.$this->id_div);
    }

    /**
     * Responsável pela extração de pessoas no banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getPessoas($where = null, $order = null, $limit = null){
        return (new Database('pesdiv'))->select($where,$order,$limit)
            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    /**
     * Responsável por pegar a pessoa pelo cod_div
     * @param integer $id
     * @return pessoa
     */
    public static function getPessoa($id){
        return (new Database('pesdiv'))->select(' id_div = '.$id)
            ->fetchObject(self::class);
    }

}