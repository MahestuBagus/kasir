<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\category;
use App\Models\item;


class itemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = item::all();
        $category = category::all();
        return view('item', compact('items', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('/item', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        item::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        Session::flash('tambah', "Berhasil Menambahkan", $request->name);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = item::find($id);
        $category = category::all();
        return view('/item', compact('items', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $item = item::find($id);
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->save();
        Session::flash('ty', 'Item Berhasil Diupdate');
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = item::find($id)->delete();
        Session::flash('success', 'Data Berhasil Dihapus');
        return Redirect('/home');
    }
    public function hapus($id)
    {
        $item = item::find($id);
        $item->delete();
        Session::flash('hapus', 'Item Berhasil Dihapus');
        return Redirect('home');
    }
}
