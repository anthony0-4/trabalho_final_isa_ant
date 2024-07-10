<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Venda::all();

        return view("venda.list", ["dados" => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("venda.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => "required|max:100",
            'vendedor' => "required|max:100",
            'valor' => "required|max:100"
        ], [
            'titulo.required' => "O :attribute é obrigatório",
            'titulo.max' => "Só é permitido 100 caracteres",
            'vendedor.required' => "O :attribute é obrigatório",
            'vendedor.max' => "Só é permitido 100 caracteres",
            'valor.required' => "O :attribute é obrigatório",
            'valor.max' => "Só é permitido 100 caracteres",
        ]);

        Venda::create(
            [
                'titulo' => $request->titulo,
                'vendedor' => $request->vendedor,
                'valor' => $request->valor,
            ]
        );
        return redirect('venda');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NomeModel  $nomeModel
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NomeModel  $nomeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $dado = Venda::findOrFail($id);


        return view("venda.form", [
            'dado' => $dado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NomeModel  $nomeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venda $venda)
    {
        $request->validate([
            'titulo' => "required|max:100",
            'vendedor' => "required|max:100",
            'valor' => "required|max:100"
        ], [
            'titulo.required' => "O :attribute é obrigatório",
            'titulo.max' => "Só é permitido 100 caracteres",
            'vendedor.required' => "O :attribute é obrigatório",
            'vendedor.max' => "Só é permitido 100 caracteres",
            'valor.required' => "O :attribute é obrigatório",
            'valor.max' => "Só é permitido 100 caracteres",
        ]);

        Venda::updateOrCreate(
            ['id'=>$request->id],
            [
                'titulo' => $request->titulo,
                'valor' => $request->valor,
                'vendedor' => $request->vendedor,
            ]
        );
        return redirect('venda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NomeModel  $nomeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dado = Venda::findOrFail($id);
        $dado->delete();
        return redirect('venda');
    }

    public function search(Request $request)
    {
        if (!empty($request->titulo)) {
            $dados = Venda::where(
                "titulo",
                "like",
                "%" . $request->titulo . "%"
            )->get();
        } else {
            $dados = Venda::all();
        }
        // dd($dados);

        return view("venda.list", ["dados" => $dados]);
    }

}
