<?php

namespace App\Http\Controllers;
use App\Models\Penerbit;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BukuController extends Controller
{
    public $buku;
    public function __construct()
    {
        $this->buku = new Buku();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->get('search');

       

       
        $data = DB::table('buku')->simplePaginate();

        // cara cari data 
        $data = DB::table('buku')
        ->where('nama_buku', 'LIKE', "%$cari%")
        // sintak ini dipake kalau nyari data lebih dari 1 field table
        // ->orWhere('jumlah', 'LIKE', "%$cari%")
        ->paginate();

        // ini kalau pake query builder
        // kalau masih pake format array maka ganti dengan object (->)
        // $data = DB::table('kategori')->Paginate(5);

      
    
        // bikin angkanya sesuao dan berurutan
        // buat ngetes
        // $tes = $data->currentPage();

        return view('buku.index', compact('data','cari'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        return view("buku.create", compact("penerbit"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            // format penulisan untuk field yang unik = unique:nama_table,field_table
            'kode' => 'required|max:20|min:3',
            'nama_buku' => 'required',
        ];

        // Pesan error validasi
        $messages = [
            //  custom pesan error validasi
            // max:ukuran_file(KB)
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute ukuran/jumlah tidak sesuai',
            'min' => ':attribute terlalu pendek',


        ];

        $this->validate($request, $rules, $messages);
        //pasangkan ke field tabelnya dengan kiriman user
        $this->buku->kode = $request->kode;
        $this->buku->kategori = $request->kategori;
        $this->buku->nama_buku = $request->nama_buku;
        $this->buku->harga = $request->harga;
        $this->buku->stok = $request->stok;
        $this->buku->penerbit_id = $request->penerbit;

        //lalu simpan ke database
        $this->buku->save();
       
        //redirect
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
     
        return back()->with('status', 'Data Berhasil Dihapus!');
    }
}
