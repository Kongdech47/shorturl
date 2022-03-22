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

class Home extends BaseController
{
    public function __construct()
    {
        helper(['data']);
        $this->ShortUrlModel = new \App\Models\ShortUrlModel();
        $this->StatisticsUrlModel = new \App\Models\StatisticsUrlModel();
        // $this->actual_link = ENVIRONMENT == 'production' ? "https://yorurl.herokuapp.com/" : base_url().'/';
        $this->actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
    }

    public function index($short_url="")
    {
        if(!empty($short_url)){
            $data = $this->ShortUrlModel->getData([
                'filter' => [
                    'short_url' => getCurrentURL()
                    ]
            ]);
            $data = $data[0] ?? [];
            if(!empty($data['id']) && !empty($data['url'])){
                try {
                    if(!empty($data['id'])){
                        $this->StatisticsUrlModel->insert([
                            'shorturl_id' => $data['id']
                        ]);
                    }
                } catch (\Throwable $th) {
                    
                }

                return redirect()->to($data['url']); 
            }
        }
        
        $listDataStatistics = $this->StatisticsUrlModel->getData([
            'limit' => 10
        ]);
        $listDataShorturl = $this->ShortUrlModel->getData([
            'limit' => 10
        ]);

        return view('home', [
            'listStatistics' => $listDataStatistics,
            'listDataShorturl' => $listDataShorturl
        ]);
    }

    public function ListAllStatisticsUrl(){
        $data = $this->StatisticsUrlModel->getData([
            'limit' => 10
        ]);

        return $this->response->setJSON([
            'data' => $data
        ]);
    }

    public function ListAllShortUrl(){
        $data = $this->ShortUrlModel->getData([
            'limit' => 10
        ]);

        return $this->response->setJSON([
            'data' => $data
        ]);
    }

    public function addShortURL(){
        try {
            $input = $_POST;
            $url = $input['url'] ?? "";
            $expect = trim($input['expect'] ?? "");

            if(!empty($url)){
                $chkData = $this->ShortUrlModel->getData([
                    'filter' => [
                        'url' => $url
                    ],
                    'limit' => 1
                ]);
                $short_url = $chkData[0]['short_url'] ?? [];
                $qrcode = $chkData[0]['qrcode'] ?? [];

                if(empty($short_url)){
                    $chk = false;

                    if(!empty($expect)){
                        $expect = explode(',', $expect);
                        if(!empty($expect)){
                            foreach ($expect as $value) {
                                $string = trim($value);
                                $string_length = strlen($string);
                                if (!preg_match('/[^A-Za-z0-9]/', $string) && $string_length >= 5 && $string_length <= 20){
                                    $randText = $string;
                                    $short_url = $this->actual_link.$randText;

                                    if ($this->ShortUrlModel->checkDuplicate([
                                        'short_url' => $short_url
                                    ], 'short_url')) {
                                        $chk = true;
                                        break;
                                    }
                                }
                            }
                            if(!$chk){
                                return $this->response->setJSON([
                                    'error' => "ไม่สามารถใช้รูปแบบ URL ที่ต้องการได้ รูปแบบที่กรอกอาจจะเคยถูกใช้งานไปแล้ว หรือรูปแบบที่กรอกอาจจะไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง"
                                ]);
                            }
                        }
                    }

                    if(!$chk){
                        while(!$chk) {
                            $randText = generateRandomString();
                            $short_url = $this->actual_link.$randText;
    
                            if ($this->ShortUrlModel->checkDuplicate([
                                'short_url' => $short_url
                            ], 'short_url')) {
                                $chk = true;
                            }
                        } 
                    }

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
                    $qrcode = $qr_code_base64;

                    $this->ShortUrlModel->save([
                        'url' => $url,
                        'short_url' => $short_url,
                        'qrcode' => $qrcode
                    ]);

                    return $this->response->setJSON([
                        'success' => "ย่อ URL เรียบร้อย",
                        'data' => [
                            'short_url' => $short_url,
                            'qrcode' => $qrcode,
                            'type' => 'new'
                        ]
                    ]);
                }else{
                    return $this->response->setJSON([
                        'success' => "ย่อ URL เรียบร้อย",
                        'data' => [
                            'short_url' => $short_url,
                            'qrcode' => $qrcode,
                            'type' => 'old'
                        ]
                    ]);
                }
            }else{
                return $this->response->setJSON([
                    'error' => "กรุณากรอก URL"
                ]);
            }
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'error' => $th->getMessage()
            ]);
        }
    }
}
