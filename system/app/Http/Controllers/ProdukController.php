<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $data['list_produk'] = produk::all();
        return view('admin.produk.index', $data);
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $kategori = New produk;
        $kategori->nama_produk = request('nama_produk');
        $kategori->save();

        return redirect('produk');
    }

    public function show($id)
    {
        return view('admin.produk.show');
    }

    public function edit($id)
    {
        $data['produk'] = produk::find($id);
        return view('admin.produk.edit', $data);
    }

    public function update(produk $produk, $id)
    {
        $produk->nama_produk= request('nama_produk');
        $produk->save();

        return redirect('produk');
    }

    public function destroy($produk)
    {
        produk::destroy($produk);

        return back();
    }
}