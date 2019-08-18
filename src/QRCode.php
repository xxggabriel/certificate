<?php 

namespace Certificate;

/** 
 * <b>QRCode: </b>This class generate QR code 
 * @author Gabriel Oliveira
 * */
class QRCode
{


    /**
     * <b>Create QR code:<b/> With the past data a QR code is generated.
     *  @var string $data = QR code data
     *  @var int $size = Size code data
     *  @return string $tempQrCode = Directory where QR code image was saved
     */
    public static function create(string $data, int $size = 150)
    {
        $qrCodeImage = "https://api.qrserver.com/v1/create-qr-code/?size=".$size."x".$size."&data=".$data;
        $tempQrCode = sys_get_temp_dir().'/'.  md5(uniqid()) . '-' . time() .'QRCode-Certificate-'.rand(0,100).'.png';
        if(!copy($qrCodeImage, $tempQrCode)){
            throw new \Exception("Error creating QR code.", 1);
            
        }
        return $tempQrCode;
    }

}