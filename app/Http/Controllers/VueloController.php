<?php

namespace App\Http\Controllers;

use App\Vuelo;
use App\User;
use App\Estudiante;
use App\Instructor;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$query = 'id is not null';
			$id_estudiante = null;
			$id_instructor = null;
			$vuelo_desde = null;
			$vuelo_hasta = null;
			$avion = null;
		if(!is_null($request->get('opt'))){
			if(!is_null($request->get('id_estudiante')))
				$query .= " and id_estudiante = ".$request->get('id_estudiante');
			$id_estudiante = $request->get('id_estudiante');
			if(!is_null($request->get('id_instructor')))
				$query .= " and id_instructor = ".$request->get('id_instructor');
			$id_instructor = $request->get('id_instructor');
			$vuelo_desde = $request->get('indate');
			$vuelo_hasta = $request->get('endDate');
			if(is_null($vuelo_desde) && !is_null($vuelo_hasta)){
				$vuelo_desde = $vuelo_hasta;
			}
			if(!is_null($vuelo_desde) && is_null($vuelo_hasta)){
				$vuelo_hasta = $vuelo_desde;
			}
			if(!is_null($vuelo_hasta) && !is_null($vuelo_desde))
				$query .= str_replace('-','/'," and fecha_vuelo between '".$vuelo_desde."' and '".$vuelo_hasta."'");
			
			if(!is_null($request->get('avion')))
				$query .= " and avion ilike '%".$request->get('avion')."%'";
			$avion = $request->get('avion');
		}
		  
      $vuelos = Vuelo::whereraw($query)->orderBy('fecha_vuelo', 'ASC')->paginate();
      $vuelosAll = Vuelo::all();

      return view('vuelos.index', compact('vuelos', 'vuelosAll', ['id_estudiante',
      'id_instructor', 'vuelo_desde', 'vuelo_hasta', 'avion']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
        $estudiantes = Estudiante::get();
        $instructors = Instructor::get();

        return view('vuelos.create', compact('estudiantes', 'instructors'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $array = $request->all();
      $array2 = explode(" ", $array['fecha_vuelo']);
      $array['fecha_vuelo'] = $array2[0];

      $objeto_DateTime = strtotime($array['fecha_vuelo']);
      $array['fecha_vuelo'] = date('Y-m-d', $objeto_DateTime);

      $request->merge($array);
      //dd($array);

      $vuelo = Vuelo::create($array);

      return redirect()->route('vuelos.edit', $vuelo->id)
      ->with('info', 'Vuelo guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function show(Vuelo $vuelo)
    {
      $estudiante = Estudiante::find($vuelo->id_estudiante);
      $instructor = Instructor::find($vuelo->id_instructor);

      return view('vuelos.show', compact('vuelo', 'estudiante', 'instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
     public function edit(Vuelo $vuelo)
     {
       $roles = Role::get();

       $estudiantes = Estudiante::get();
       $instructors = Instructor::get();

       return view('vuelos.edit', compact('vuelo', 'estudiantes', 'instructors'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vuelo $vuelo)
    {
      //ojo solo se tomarán en cuenta los campos que esten en vuelo.php fillable
        $vuelo->update($request->all());

        return redirect()->route('vuelos.edit', $vuelo->id)
        ->with('info', 'Vuelo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vuelo $vuelo)
    {
      $vuelo->delete();

      return back()->with('info', 'Eliminado correctamente');
    }
}
