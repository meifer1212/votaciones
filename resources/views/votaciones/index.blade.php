@extends('layouts.app')
@section('title', 'Votaciones')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
@section('body')
    <header class="container__herosection">
        <div class="herosection">
            <div class="herosection__text">
                <p>Sistema de Votaciónes.</p>
            </div>
            <div class="herosection__illustration"></div>
        </div>
    </header>
    <main role="main">
        <div class="container__encuesta">
            <form class="encuesta" method="POST" action="{{ route('home.store') }}">
                @csrf
{{--
                <div class="pregunta">
                    <label for="identificacion">identificacion</label>
                    <input type="text" id="identificacion" required name="user_identificacion" placeholder="tu # identificacion..">
                </div> --}}
                <div class="documento">
                    <label for="identificacion">Número de documento</label>
                    <input
                      type="number"
                      name="user_identificacion"
                      id="identificacion"
                      placeholder="Digite aquí su documento" required
                    />
                  </div>
                @foreach ($preguntas as $pregunta)
                    <div class="pregunta">
                        <div class="pregunta__text">
                            <h2>{{ $loop->iteration }}-</h2>
                            <p>
                                {{ $pregunta->pregunta }}
                            </p>
                        </div>
                        @foreach ($pregunta->respuestas as $respuesta)
                            <div class="opcion">
                                <input type="radio" required name="{{$pregunta->id}}" value="{{ $respuesta->id}}" id="opcion{{$respuesta->id}}-pregunta{{$pregunta->id}}" />
                                <div class="estilo__radio">
                                    <div class="estilo__radio__seleccionado"></div>
                                </div>
                                <label for="opcion{{$respuesta->id}}-pregunta{{$pregunta->id}}">
                                    <p>{{ $respuesta->respuesta }}</p>
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <button type="submit" class="boton-enviar">Enviar</button>
            </form>
        </div>
    </main>
@endsection
@section('scripts')
    {{-- <script>
    alert('yes');
</script> --}}
@endsection
