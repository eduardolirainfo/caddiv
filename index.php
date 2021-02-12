<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Pesdiv;

$pessoas = Pesdiv::getPessoas();


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/datasheet.php';
include __DIR__.'/includes/footer.php';
