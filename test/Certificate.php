<?php 
require_once $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";

header("Content-Type: image/jpeg");

$cert = new \Certificate\App($_SERVER["DOCUMENT_ROOT"]."/test/img.jpeg");

$name  = "Gabriel Oliveira";
$cpf = "000.000.000-00";
$course = "Curso de PHP.";

$cert->createImage([
        ['Certificado', 32, 330, 150,"#333", __DIR__."/fonts/Bevan/Bevan-Regular.ttf", 0],
        ['
        Certificamos que '.$name.', inscrito(a) no CPF sob o nº 
        '.$cpf.', concluiu com sucesso o curso de '.$course, 20, 70, 300, "#333", __DIR__."/fonts/Playball/Playball-Regular.ttf", 0],
    ]);
$cert->QRCode('https://github.com/xxggabriel', 150, 650, 450);
echo $cert->run(__DIR__);

