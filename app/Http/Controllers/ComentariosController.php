<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Comentarios::all();


        return view("comentarios.list", ["dados" => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comentarios.form");
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
            'usuario' => "required|max:100",
            'email' => "required|max:100",
            'comentario' => "nullable"
        ], [
            'usuario.required' => "O :attribute é obrigatório",
            'usuario.max' => "Só é permitido 100 caracteres",
            'email.required' => "O :attribute é obrigatório",
            'email.max' => "Só é permitido 100 caracteres",
        ]);

        Comentarios::create(
            [
                'usuario' => $request->usuario,
                'email' => $request->email,
                'comentario' => $request->comentario,
            ]
        );
        return redirect('comentarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show(Comentarios $comentarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $dado = Comentarios::findOrFail($id);


        return view("comentarios.form", [
            'dado' => $dado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentarios $comentarios)
    {
        $request->validate([
            'usuario' => "required|max:100",
            'email' => "required|max:100",
            'comentario' => "nullable"
        ], [
            'usuario.required' => "O :attribute é obrigatório",
            'usuario.max' => "Só é permitido 100 caracteres",
            'email.required' => "O :attribute é obrigatório",
            'email.max' => "Só é permitido 100 caracteres",
        ]);

        Comentarios::updateOrCreate(
            ['id'=>$request->id],
            [
                'usuario' => $request->usuario,
                'email' => $request->email,
                'comentario' => $request->comentario,
            ]
        );
        return redirect('comentarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dado = Comentarios::findOrFail($id);
        $dado->delete();
        return redirect('comentarios');
    }

    public function search(Request $request)
    {
        if (!empty($request->usuario)) {
            $dados = Comentarios::where(
                "usuario",
                "like",
                "%" . $request->usuario . "%"
            )->get();
        } else {
            $dados = Comentarios::all();
        }
        // dd($dados);

        return view("comentarios.list", ["dados" => $dados]);
    }
}
