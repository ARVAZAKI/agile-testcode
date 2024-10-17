<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use App\Models\DetailMakanan;

class MakananController extends Controller
{
    public function index(){
        $makanan = Makanan::with('detail')->get();
        return view('makanan', compact('makanan'));
    }
    public function createMakanan(Request $request){

        $validated = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
            'nama_makanan' => 'required|string', 
            'detail' => 'required|string', 
        ]);

        $file = $request->file('gambar');
        $extension = $file->getClientOriginalExtension();
        $photoName = $request->nama_makanan . '.' . $extension; 
        $file->move(public_path('images'), $photoName);  

        $makanan = Makanan::create([
        'gambar' => $photoName,
        'nama_makanan' => $request->nama_makanan
         ]);
        DetailMakanan::create([
            'makanan_id' => $makanan->id,
            'detail' => $request->detail
        ]);
        return redirect()->back()->with('message','berhasil menambah makanan');
    }

    public function delete($id){
        $makanan = Makanan::find($id);
        $makanan->delete();
        return redirect()->back()->with('message','berhasil menghapus makanan');
    }
}
