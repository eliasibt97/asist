@extends('layout')

@section('main')
    <div class="main">
        <h3>Responsables</h3>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    
                    @foreach ($responsables as $responsable) 
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$responsable->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                {{$responsable->name}}
                            </button>
                        </h2>
                        <div id="flush-{{$responsable->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p><strong>Teléfono celular:</strong> {{$responsable->cellphone}} </p>
                                <p><strong>Correo Electrónico:</strong> {{$responsable->email ?? 'No disponible'}}  </p>
                                @if(count($responsable->members) > 0)
                                <p><strong>Responsable de:</strong> </p>
                                <ul>
                                    @foreach ($responsable->members as $member)
                                        <li>{{$member->name}} {{$member->surnames}}</li>
                                    @endforeach
                                </ul>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    </div>
                </div>
            <div class="col-sm-6 resposables-data">
                @yield('responsable')
            </div>
        </div>
    </div>
@endsection