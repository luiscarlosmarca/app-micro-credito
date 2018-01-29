@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                 {{--    <pre>
                        @foreach($personas as $persona)

                        <li>{{$persona->nombre}}</li>
                                
                                @foreach($persona->carteras as $cartera)

                                    <li>{{$cartera->nombre}}</li>
                                      
                                @endforeach  

                         @endforeach   

                    </pre> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
