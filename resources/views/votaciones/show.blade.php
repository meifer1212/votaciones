@extends('layouts.app')
@section('title', 'hola mundo')
@section('head')

@endsection
@section('body')

    <div>
        <h1>SISTEMA DE VOTACIÓNES</h1>
        <h3>Cuál es el mejor plato de Colombia</h3>
    </div>
    <div>
        <input type="radio" id="html" name="fav_language" value="HTML">
        <label for="html">Bandeja Paisa</label><br>
        <input type="radio" id="css" name="fav_language" value="CSS">
        <label for="css">Changua</label><br>
        <input type="radio" id="javascript" name="fav_language" value="JavaScript">
        <label for="javascript">Levanta Muertos</label>
    </div>
    <button>Enviar</button>
@endsection
@section('scripts')
    <script>
        alert('yes');
    </script>
@endsection
