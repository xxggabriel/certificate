<?php 

namespace Certificate;

use chillerlan\QRCode\QRCode as QR;
use chillerlan\QRCode\QROptions;

/** 
 * <b>QRCode: </b>This class generate QR code 
 * @author Gabriel Oliveira
 * */
class QRCode
{
    /** @var object $options = Instantiates QROptions class settings */
    private $options;
    /** @var string $data = Data to be for generating the QR code */
    private $data;

    public function __construct($data)
    {

        $this->options = new QROptions([
            'version'      => 7,
            'outputType'   => QR::OUTPUT_IMAGE_PNG,
            'eccLevel'     => QR::ECC_L,
            'scale'        => 5,
            'imageBase64'  => false,
            'moduleValues' => [
                // finder
                1536 => [0, 0, 0], // dark (true)
                6    => [255, 255, 255], // light (false), white is the transparency color and is enabled by default
                // alignment
                2560 => [0, 0, 0],
                10   => [255, 255, 255],
                // timing
                3072 => [0, 0, 0],
                12   => [255, 255, 255],
                // format
                3584 => [0, 0, 0],
                14   => [255, 255, 255],
                // version
                4096 => [0, 0, 0],
                16   => [255, 255, 255],
                // data
                1024 => [0, 0, 0],
                4    => [255, 255, 255],
                // darkmodule
                512  => [0, 0, 0],
                // separator
                8    => [255, 255, 255],
                // quietzone
                18   => [255, 255, 255],
            ],
        ]);
        $this->data = $data;
        
    }

    /**
     * <b>Create QR code:<b/> With the past data a QR code is generated.
     *  @return string $tempQrCode = Directory where QR code image was saved
     */
    public function create()
    {
        $qr = new QR($this->options);
        $tempQrCode = sys_get_temp_dir().'/'.  md5(uniqid()) . '-' . time() .'QRCode-Certificate-'.rand(0,100).'.png';
        $qr->render($this->data, $tempQrCode);
        return $tempQrCode;
    }

}