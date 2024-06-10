<?php

namespace App\Http\Controllers;

use App\Models\ChiTietThuePhong;
use App\Models\GiaoDich;
use App\Models\HoaDon;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Mockery\Expectation;

class GiaoDichController extends Controller
{
    public function index()
    {
        $client = new Client();
        $payload = [
            "USERNAME"      => "THANHTRUONG2311",
            "PASSWORD"      => "Lethanhtruong2311@@",
            "DAY_BEGIN"     => Carbon::today()->format('d/m/Y'),
            "DAY_END"       => Carbon::today()->format('d/m/Y'),
            "NUMBER_MB"     => "1910061030119"
        ];

        try {
            $response = $client->post('http://103.137.185.71:2603/mb', [
                'json' => $payload
            ]);

            $data   = json_decode($response->getBody(), true);
            $duLieu = $data['data'];
            foreach ($duLieu as $key => $value) {
                // Chúng ta chỉ tạo mới khi $value['refNo'] chưa có ở table giao_dichs
                $check = GiaoDich::where('refNo', $value['refNo'])->first();
                if(!$check) {
                    GiaoDich::create([
                        'creditAmount'  => $value['creditAmount'],
                        'description'   => $value['description'],
                        'refNo'         => $value['refNo'],
                    ]);
                    $string = $value['description'];
                    $pattern = '/TTDP2/';
                    if (preg_match($pattern, $string, $matches)) {
                        $string = $matches[0];
                        $pattern = '/\d/';
                        if (preg_match($pattern, $string, $matches)) {
                            $id_hoa_don = $matches[0];
                            $hoaDon = HoaDon::where('id', $id_hoa_don)->first();
                            if($value['creditAmount'] >= $hoaDon->tong_tien) {
                                HoaDon::where('id', $id_hoa_don)->update([
                                    'is_thanh_toan' => 1
                                ]);
                                ChiTietThuePhong::where('id_hoa_don', $id_hoa_don)->update([
                                    'tinh_trang'    =>  3
                                ]);
                            }
                        }
                    }
                }
                echo $value['description'] . " --- " . $value['creditAmount'];
            }

        } catch(Exception $e) {
            echo $e;
        }
    }
}
