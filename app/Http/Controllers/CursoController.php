<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $cursos=Curso::orderBy('id','desc')->paginate(10);
        return view('cursos.index',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('cursos.create',compact('category'));
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
            'nombre'=>['string','min:3','required','unique:cursos,nombre'],
            'descripcion'=>['string','min:10','required'],
            'activo'=>['required'],
            'imagen'=>['image','required','max:2048'],
            'category_id'=>['required']
        ]);

        Curso::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'activo'=>$request->activo,
            'imagen'=>$request->imagen->store('cursos'),
            'category_id'=>$request->category_id
        ]);

        return redirect()->route('cursos.index')->with('info','Curso creado con éxito');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        $category=Category::all();
        return view('cursos.show',compact('curso','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        $category=Category::all();
        $activo=['SI','NO'];
        return view('cursos.update',compact('curso','category','activo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
                'nombre'=>['string','min:3','required','unique:cursos,nombre,'.$curso->id],
                'descripcion'=>['string','min:10','required'],
                'activo'=>['required'],
                'imagen'=>['nullable','image','max:2048'],
                'category_id'=>['required']

        ]);
        //una vez validamos vemos si la imagen es la misma o no
        //si es la misma seguimos como si nada
        //si no lo es, tenemos que borrar la antigua y poner la nueva en su ruta

        //si ha llegado con el request el campo imagen
        //significa que hay nueva, asi que borramos la antigua

        //hacemos la variable de la ruta de la imagen
        //para trabajr con ella y modificarla mas facilmente
        //diferenciamos la ruta de la img actual, esta no lleva request
        $urlimage=$curso->imagen;

        if($request->imagen){

            Storage::delete($curso->imagen);
            //ruta de la imagen nueva
            //fijarse que esta lleva el request, la anterior no
            $urlimage=$request->imagen->store('cursos');

        }

        $curso->update([
            'nombre'=>$request->nombre,
                'descripcion'=>$request->descripcion,
                'activo'=>$request->activo,
                'imagen'=>$urlimage,
                'category_id'=>$request->category_id
        ]);

        return redirect()->route('cursos.index')->with('info','Curso actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('info','Curso Borrado con éxito');
    }


    public function cambiarActivo(Curso $curso){
        $activo = $curso->activo;
        if($curso->activo =='Si'){
            $activo = 2;
        }

        else if($curso->activo == 'No'){
            $activo = 1;
        }

        $curso->update([
            'activo'=>$activo
        ]);

        return redirect()->route('cursos.index')->with('info', 'Estado actualizado');
    }
}
