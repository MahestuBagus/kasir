<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use App\Models\category;
use App\Models\item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view ('Category');
        $categories = category::all();
        return view('category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // item::create([
        //     'category_id' => $request->id_category,
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'stock' => $request->stock
        // ]);

        // Session::flash('success', $request->nama_produk, "Sebanyak", $request->stok);
        // return redirect('/home');

        category::create([
            'id' => $request->id_category,
            'name' => $request->name
        ]);

        Session::flash('catetam', "Kategori Berhasil Ditambahkan ");
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $items = item::find($id);
        $category = category::find($id);
        return view('editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category = category::find($id);
        $category->name = $request->nama;
        $category->save();
        Session::flash('cateup', 'Kategori Berhasil Diupdate');
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function hapus($id){
        $category = category::find($id);
        $category->delete();
        Session::flash('hapus', 'Item Berhasil Dihapus');
        return Redirect('home');
    }
}
