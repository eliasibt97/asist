@extends('layout')

@section('main')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teéfono celular</th>
                <th scope="col">Correo</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($responsables as $responsable)
            <tr>
                <th scope="row">{{$responsable->id}}</th>
                <td>{{$responsable->name}}</td>
                <td>{{$responsable->cellphone}}</td>
                <td>{{$responsable->email}}</td>
                <td><a href="responsable/{{$responsable->id}}">Ver detalles</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection