<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Curso;

class PagesController extends Controller
{
   
    public function fnRegistrarCurso(Request $request){
    

        //return $request->all();         //Prueba de "token" y datos recibidos

        $request ->validate([
            'denCur' => 'required',
            'hrsCur' => 'required',
            'creCur' => 'required',
            'plaCur' => 'required',
            'tipCur' => 'required',
            'estCur' => 'required'
            
        ]);

        $nuevoCurso = new Curso;
        $nuevoCurso->denCur = $request->denCur;
        $nuevoCurso->hrsCur = $request->hrsCur;
        $nuevoCurso->creCur = $request->creCur;
        $nuevoCurso->plaCur = $request->plaCur;
        $nuevoCurso->tipCur = $request->tipCur;
        $nuevoCurso->estCur = $request->estCur;
        
        $nuevoCurso->save();
        
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

    public function  fnListaCurso() {
        $xCursos = Curso::paginate(4);
        return view('pagListaCurso', compact('xCursos'));
    }

    public function  fnDetalleCurso($id) {
        $xDetCursos= Curso::findOrFail($id);
        return view('Curso.pagDetalleCurso', compact('xDetCursos'));
    }

    public function  fnActualizarCurso($id) {
        $xActCursos = Curso::findOrFail($id);
        return view('Curso.pagActualizarCurso', compact('xActCursos'));
    }

    public function  fnEliminarCurso($id) {
        $deleteCurso = Curso::findOrFail($id);
        $deleteCurso->delete();

        return back()->with('msj','Se elimino con éxito...');
    }
   
   
   
   
    public function  fnIndex () {
        return view('welcome');
    }

    public function fnRegistrar(Request $request){

        //return $request->all();         //Prueba de "token" y datos recibidos

        $request ->validate([
            'codEst' => 'required',
            'nomEst' => 'required',
            'apeEst' => 'required',
            'fnaEst' => 'required',
            'turMat' => 'required',
            'semMat' => 'required',
            'estMat' => 'required'
        ]);

        $nuevoEstudiante = new Estudiante;
        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;
        
        $nuevoEstudiante->save();
        
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

    public function  fnLista() {
        $xAlumnos = Estudiante::paginate(4);
        return view('pagLista', compact('xAlumnos'));
    }

    public function  fnEstDetalle($id) {
        $xDetAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function  fnEstActualizar($id) {
        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function  fnEliminar($id) {
        $deleteAlumno = Estudiante::findOrFail($id);
        $deleteAlumno->delete();

        return back()->with('msj','Se elimino con éxito...');
    }

    public function  fnGaleria  ($numero=0) {
        $valor = $numero;
        $otro  = 25;
        //return view('foto de Codigo');
        return view('pagGaleria',compact('valor', 'otro'));
    }



}
