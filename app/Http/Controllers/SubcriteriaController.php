<?php

namespace App\Http\Controllers;


use App\Models\Criteria;
use App\Models\Subcriteria;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\This;
use Doctrine\Inflector\Rules\Substitution;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests\StoreSubcriteriaRequest;
use App\Http\Requests\UpdateSubcriteriaRequest;

class SubcriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $subcriteria = Subcriteria::all();
        return view('subcriteria.index', compact('subcriteria'), [
            "aktif" => "subcriteria",
            "judul" => "Data Subkriteria",
            "title" => "Subkriteria",
            "criterias" => Criteria::orderBy('kode', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('subcriteria.create', [
            "aktif" => "subcriteria",
            "judul" => "Data Subkriteria",
            "title" => "tambah Subkriteria",
            "subcriterias" => Subcriteria::all(),
            "criterias" => Criteria::all(),


        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubcriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public  function store(Request $request)
    {
        $data = $request->validate(
            [

                "nama_subcriteria" => "required",
                "nilai_subcriteria" => "required|numeric",
                "criteria_id" => "required|numeric"

            ],
            [
                "nama_subcriteria.required" => "Nama Subkriteria tidak boleh kosong",
                "nilai_subcriteria.required" => "Nilai Subkriteria tidak boleh kosong",
                "criteria_id.required" => "Kriteria tidak boleh kosong",
                "criteria_id.numeric" => "Kriteria tidak boleh kosong",

            ]

        );
        Subcriteria::create($data);
        Toastr::success("Anda berhasil menambahkan $request->nama_subcriteria");


        return redirect()->route('subcriteria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcriteria  $subcriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Subcriteria $subcriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcriteria  $subcriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcriteria = Subcriteria::find($id);
        return view('subcriteria.edit', compact('subcriteria'), [
            "aktif" => "subcriteria",
            "judul" => "Ubah Subkriteria",
            "title" => "Ubah Subkriteria",
            "criterias" => Criteria::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubcriteriaRequest  $request
     * @param  \App\Models\Subcriteria  $subcriteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubcriteriaRequest $request, Subcriteria $subcriteria, $id)
    {
        $subcriteria = Subcriteria::find($id);
        $data       = $request->validate([
            "nama_subcriteria" => "required",
            "nilai_subcriteria" => "required",

        ]);

        $subcriteria->update([
            "nama_subcriteria" => $request->nama_subcriteria,
            "nilai_subcriteria" => $request->nilai_subcriteria,

        ]);
        Toastr::success("Anda berhasil mengubah $subcriteria->nama_subcriteria");
        return redirect()->route('subcriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcriteria  $subcriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcriteria $subcriteria, $id)
    {
        $subcriteria = Subcriteria::find($id);
        $subcriteria->delete();

        return redirect()->route('subcriteria.index');
    }
}
