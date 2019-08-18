<?php 

require_once __DIR__."/../vendor/autoload.php";

use Certificate\Certificate;

$cert = new Certificate(__DIR__."/img/img.jpeg");
$cert->createImage([
    ['Certificado', 32, 330, 150,"#333", __DIR__."/fonts/Bevan/Bevan-Regular.ttf", 0],
]);
$cert->QRCode('https://github.com/xxggabriel/certificate', 150, 100, 100);
echo $cert->run(__DIR__."/img");