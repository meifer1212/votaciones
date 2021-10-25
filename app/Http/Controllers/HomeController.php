<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\RespuestaUser;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // preguntas
        // respuestas
        $preguntas = Pregunta::all();
        return view('votaciones.index', compact('preguntas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request)) {
            // consultamos si el usuari o votante existe o no existe.
            $user = User::where('identificacion', $request->user_identificacion)->count();

            // si el usuario o votante no existe, se crea.
            if ($user == 0) {
                $user = new User();
                $user->identificacion = $request->user_identificacion;
                $user->save();
            }
            // gurdamos los votos
            for ($i = 1; $i < 6; $i++) {
                $respuesta_user = new RespuestaUser();
                $respuesta_user->user_identificacion = $request->user_identificacion;
                $respuesta_user->pregunta_id = $i;
                $respuesta_user->respuesta_id = $request->$i;
                $respuesta_user->save();
            }
            return redirect(route('home.show', $request->user_identificacion));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($identificacion)
    {
        $cant_respuestas = RespuestaUser::count();
        $users_votantes = $cant_respuestas / 5;
        $preguntas = Pregunta::all();
        return view('votaciones.show', compact('users_votantes', 'identificacion', 'preguntas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function api_grafico(Pregunta $pregunta_id)
    {
        $cant_respuestas = RespuestaUser::count();
        $users_votantes = $cant_respuestas / 5;
        $respuestas = $pregunta_id->respuestas;
        $api_respuestas = [];
        $cant_votantes = [];
        foreach ($respuestas as $respuesta){
            $api_respuestas[]=$respuesta->respuesta;
            $cant_votantes[] = RespuestaUser::where('respuesta_id',$respuesta->id)->count();
        }
        $data = [
            'votantes' => $users_votantes,
            'labels' => $api_respuestas,
            'data' => $cant_votantes,
        ];
        return $data;
    }
}
