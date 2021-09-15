<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RoomController extends Controller
{
    
    public function room()
    {
        $room = DB::table('room')->where('aktif', 1)->get();
        return view('room', ['room' => $room]);
    }
    
    public function detail()
    {
        $kan_row = DB::table('kandidat')->where('id_room', '72a1e04')->count();
        $vote = DB::table('kandidat')->where('id_room', '72a1e04')->sum('suara');
        $room = DB::table('room')->where('aktif', 1)->get();
        $kandidat = DB::table('kandidat')->where('id_room', '72a1e04')->get();
        return view('welcome', ['room' => $room, 'kandidat' => $kandidat, 'kandidat_count' => $kan_row, 'vote' => $vote]);
    }
    
    public function vote($id){
        $kandidat = DB::table('kandidat')->select('suara')->where('id', $id)->get();
        $suara = $kandidat[0]->suara + 1;
        
        try {
            $data = DB::table('kandidat')->where('id', $id)->update(['suara'=> $suara]);
        } catch (\Illuminate\Database\QueryException $e) {
            $data = $e;
        }
        
        return $data;
    }
}