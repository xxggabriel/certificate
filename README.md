# Gerador de certificado

Certificate, é uma biblioteca para gerar certificado automaticamente com o PHP, e tambem pode criar QR code nos certificados.

## Requisitos do servidor
* ext-gd
* etx-curl

## Composer Install

```
composer require xxggabriel/certificate:2.0.x-dev
```

## Gerar Certificado
```
<?php 
require_once "vendor/autoload.php";

header("Content-Type: image/jpeg");
use Certificate\App;

$cert = new App('img/background.jpg');

$cert->createImage([
        ['Certificado', 32, 330, 150,"#333", "/fonts/Bevan/Bevan-Regular.ttf", 0],
        // ['Texto', tamanho da fonte, posição X, posição Y, 
        // Cor da font em hexadecimal, arquivo da font, Angulo do texto],
    ]);
    
$cert->QRCode('https://github.com/xxggabriel', 150, 650, 450);
// $cert->QRCode( Informação para o QR code(como link, codigo ou texto), 
// Tamanho em pixel, Posição X, Posição Y);

$cert->run();
```
![Certificado Gerado](https://user-images.githubusercontent.com/38543235/63228576-5af46a00-c1cb-11e9-953e-41863456df80.jpeg)

## Salvar Certificado
```
$cert->run(__DIR__);
```
## Dependência
Foi utilizado a API do [Goqr](http://goqr.me/api/), para gerar os QR code.


## Licença
A biblioteca Certificate é um software de código aberto licenciado sob a licença MIT.
