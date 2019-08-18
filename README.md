# Gerador de certificado

Certificate, é uma biblioteca para gerar certificado automaticamente com o PHP, e tambem pode criar QR code nos certificados.


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

## Salvar Certificado
```
$cert->run(__DIR__);
```

## Licença
A biblioteca Certificate é um software de código aberto licenciado sob a licença MIT.
