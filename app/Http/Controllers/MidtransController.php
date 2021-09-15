<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Midtrans\Config;
use App\Http\Controllers\Midtrans\Transaction;
use App\Http\Controllers\Midtrans\ApiRequestor;
use App\Http\Controllers\Midtrans\SnapApiRequestor;
use App\Http\Controllers\Midtrans\Notification;
use App\Http\Controllers\Midtrans\CoreApi;
use App\Http\Controllers\Midtrans\Snap;
use App\Http\Controllers\Midtrans\Sanitizer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MidtransController extends Controller
{
    public function getSnapToken($nama){

        $item_list = array();
        $amount = 0;
        Config::$serverKey = 'Mid-server-kzRdgMfVbPQvSu1Gu9j0ekYV';
        if (!isset(Config::$serverKey)) {
            return "Please set your payment server key";
        }
        Config::$isSanitized = true;
        Config::$isProduction = true;
        Config::$is3ds = true;
        
        // Required

         $item_list[] = [
                'id' => "111",
                'price' => 1000,
                'quantity' => 1,
                'name' => 'Vote '.$nama.' x1'
        ];

        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 1000, // no decimal allowed for creditcard
        );

        // Optional
        $item_details = $item_list;

        // Fill transaction details
        $transaction = array(
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
        );
        // return $transaction;
        try {
            $snapToken = Snap::getSnapToken($transaction);
            return response()->json($snapToken);
            // return ['code' => 1 , 'message' => 'success' , 'result' => $snapToken];
        } catch (Exception $e) {
            dd($e);
            return ['code' => 0 , 'message' => 'failed'];
        }
    }
}