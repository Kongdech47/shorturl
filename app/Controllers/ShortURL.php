<?php
namespace App\Controllers;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class ShortURL extends BaseController
{
    public function __construct()
    {
        helper(['data']);
        $this->ShortUrlModel = new \App\Models\ShortUrlModel();
    }
    public function index()
    {
        $listData = $this->ShortUrlModel->getData();

        return view('short_url', [
            'listData' => $listData,
            'title' => 'ย่อ URL',
            'menu_active' => 'shorturl'
        ]);
    }

    public function ListAll(){
        $data = $this->ShortUrlModel->getData();

        return $this->response->setJSON([
            'data' => $data
        ]);
    }

    public function save(){
        try {
            $input = $_POST;

            if (!$this->ShortUrlModel->checkDuplicate($input)) {
                return $this->response->setJSON([
                    'error' => "URL ซ้ำ <br>กรุณากรอก URL ใหม่อีกครั้ง"
                ]);
            }else{
                if(empty($input['short_url'])){
                    $chk = false;
                    while(!$chk) {
                        $randText = generateRandomString();
                        $short_url = base_url($randText);

                        if ($this->ShortUrlModel->checkDuplicate([
                            'short_url' => $short_url
                        ], 'short_url')) {
                            $chk = true;
                        }
                    } 

                    $input['short_url'] = $short_url;
                    // Create QR code
                    $writer = new PngWriter();
                    $qrCode = QrCode::create($short_url)
                        ->setEncoding(new Encoding('UTF-8'))
                        ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                        ->setSize(300)
                        ->setMargin(10)
                        ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                        ->setForegroundColor(new Color(0, 0, 0))
                        ->setBackgroundColor(new Color(255, 255, 255));
                    $result = $writer->write($qrCode);
                    $qr_code_base64 = $result->getDataUri();
                    $input['qrcode'] = $qr_code_base64;
                }

                $this->ShortUrlModel->save($input);

                return $this->response->setJSON([
                    'success' => "บันทึกข้อมูลเรียบร้อย"
                ]);
            }
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'error' => $th->getMessage()
            ]);
        }
    }

    public function del(){
        try {
            $input = $_POST;
            $id = $input['id'] ?? "";

            if(!empty($id)){
                $this->ShortUrlModel->delete($id);

                return $this->response->setJSON([
                    'success' => "ลบข้อมูลเรียบร้อย"
                ]);
            }else{
                return $this->response->setJSON([
                    'error' => "ไม่พบรายการข้อมูล"
                ]);
            }
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'error' => $th->getMessage()
            ]);
        }
    }
}
