<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
class FrontendController extends Controller
{
    public function index()
    {
        $room=Room::all();
        return view('frontend.index', compact('room'));
    }
    public function booking()
    {
        if (Auth::check()) {
            return view('frontend.booking');
        } else {
            return redirect('/')->with('error', 'login to continue');
        }
    }
}
