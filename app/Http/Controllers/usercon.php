<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kajian;

class usercon extends Controller
{

    public function vw_kajian()
    {
        $latestKajians = Kajian::orderBy('created_at', 'desc')->take(5)->get(); // Ambil 5 kajian terbaru
        return view('user.kajian', compact('latestKajians'));
    }

    public function vw_about()
    {
        return view('user.about');
    }

    public function showLatestKajians()
    {
        
    }
    
    
}
