<?php

namespace App\Http\Controllers;
use App\Models\Penerbit;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->get('search');
        $data = DB::table('buku')->where("nama_buku","like","%$cari%")
        //or where buat nyari data lebih dari 1 field
        // ->orWhere("status","like","%$cari%")
        ->Paginate(5);
        $no = 5 * ($data->currentPage()-1);
        return view('buku.index', compact('data','no'));
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
        //
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
    public function destroy(Buku $buku)
    {
        //
    }
}
