<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Models\item;
use App\Models\category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = item::all();
        $category = category::all();
        return view('home', compact('items', 'category'));
    }

    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        item::create([
            'name' => $request->nama,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        // Session::flash('success', 'Data Berhasil Di Simpan');
        return redirect('home');
    }

    public function destroy($id){
        // $item = item::find($id)->delete();
        // Session::flash('success', 'Data Berhasil Dihapus');
        // return redirect('home');
    }
}
