<?php

namespace Certificate;


/**
 * <b>App: </b>This class aims to create certificate
 * @author Gabriel Oliveira
 *  */
class App
{
    /** 
     * @var string Certificate Background Image Directory
     * */
    private $background;
    /** 
     * Esse array recebe instancias da função imagecreatefromjpeg().
     * @var array Array of imagecreatefromjpeg() objects 
     * */
    private $img = [];
    
    public function __construct($background)
    {
        $this->setBackground($background);
    }

    /**
     * <b>Create the certificate:</b> Receive the certificate data, and create the certificate image
     * @param array $data = Receive an array, with the certificate data.
     * @return void
     */
    public function createImage($data){
        
        $this->img['certificate'] = imagecreatefromjpeg($this->getBackground());
        foreach ($data as $key) {
            $colorHex = $this->hex2RGB($key[4]);
            $colorImg = imagecolorset($this->img['certificate'], 0,$colorHex[0], $colorHex[1], $colorHex[2]);
            imagettftext($this->img['certificate'], $key[1], $key[6],$key[2], $key[3], $colorImg, $key[5],$key[0]);
        }       
    }

    /** 
     * <b>Generate QR Code: <b/> Generate QR code and add in certificate
     * @var string $data = Data to be generated in Qr code
     * @var string $size = QR code pixel size
     * @var string $x = QR code position X
     * @var string $y = QR code position Y
     * @return void
     */
    public function QRCode($data, $size, $x = 0, $y = 0)
    {
        $qr = new QRCode($data);
            
        $this->img['QRcode'] = imagecreatefrompng($qr->create());
        
        imagecopyresampled($this->img['certificate'], 
                        $this->img['QRcode'], 
                        $x,
                        $y,
                        0,
                        0, 
                        $size,
                        $size,
                        imagesx($this->img['QRcode']), 
                        imagesy($this->img['QRcode']));
    }

    /**
     * <b>Validate Image: <b/> Valid image type
     * @var string $image = Image to be validated
     * @return void
     */
    public function validetionImage($image)
    {
        $type = exif_imagetype($image);
        
        if($type > 3 || $type  < 1) {
            throw new \Exception("Type erro!", 1);    
        }
    }

    /**
     * <b>Convert Hexadecimal: <b/> Convert Hexadecimal to RGB with 3 positions in R, G and B array
     * @var string $hex = Get a hex value
     * @return array $rgb
     */
    function hex2RGB($hex) {
        $hex = str_replace("#", "", $hex);
        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        return $rgb;
    }


    public function run($dir = null)
    {
        
        $dirname = $dir == null ? null : $dir.'/certificate-' . md5(uniqid()) . '-' . time() .'.jpeg';
        
        imagejpeg($this->img['certificate'], $dirname , 100); 
        
        if($dir != null){
            return $dirname;
        }     
        imagedestroy($this->img['certificate']);
    }


    /**
     * Get certificate Background Image Directory
     *
     * @return  string
     */ 
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set certificate Background Image Directory
     *
     * @param  string  $background  Certificate Background Image Directory
     *
     * @return  void
     */ 
    public function setBackground(string $background)
    {
        if(!is_file($background)){
            throw new \Exception("File not found.", 1);
        }

        $this->validetionImage($background);

        $this->background = $background;
    }
}