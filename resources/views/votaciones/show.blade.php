@extends('layouts.app')
@section('title', 'Resultados')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="{{asset('js/votaciones.js')}}"></script>
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
            <form class="encuesta">
                <div class="pregunta">
                    <h1>Usuario {{ number_format($identificacion, '0', ',', '.') }} eres el votante #
                        {{ number_format($users_votantes, '0', ',', '.') }}</h1>
                </div>
                @foreach ($preguntas as $pregunta)
                    <div class="pregunta">
                        <div class="pregunta__text">
                            <h2>{{ $loop->iteration }}-</h2>
                            <p>
                                {{ $pregunta->pregunta }}
                            </p>
                        </div>
                        {{-- grafico --}}
                        <canvas id="myChart{{$pregunta->id}}"></canvas>
                        {{-- endgrafico --}}
                    </div>
                @endforeach
                <i type="submit" class="boton-enviar" href="{{route('home.index')}}">Volver</i>
            </form>
        </div>
    </main>
@endsection
@section('scripts')
<script>
    loadChart(@json(route('api.grafico','%%')),@json(count($preguntas)));
</script>
@endsection
