<?php


namespace App\Entity;


class Pesjur
{

    /*
     * código da pessoa jurídica
     * @var integer
     */
    public $cod_pesjur;
    /*
     * documento CNPJ da pessoa jurídica
     * @var string
     */
    public $document_pes;
    /*
     * Razão social da pessoa jurídica
     * * @var string
     */
    public $nome_pesjur;
    /*
     * nascimento da pessoa jurídica
     * * @var date
     */
    public $nasc_pesjur;
    /*
     * endereço da pessoa jurídica
     * * @var string
     */
    public $endr_pesjur;
    /*
     * data de atualização da pessoa jurídica
     * * @var date
     */
    public $update_pesjur;

}