@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <h3>Contratos por cliente</h3></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <form method="GET" action="home" >
                                @csrf
                                <label for="id">Busqueda por cliente</label>
                                <input type="number" name="id" class="form-control w-25" id="id" min="1" required placeholder="ID Cliente"  />
                                <button type="submit" class="btn btn-primary my-3" class="form-control">Buscar</button>
                    <a href="{{ url('home') }}" class="btn btn-success my-3 ">Ver Todos</a>

                            </form>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"> ID Contrato </th>
                                    <th scope="col">ID Cliente</th>
                                    <th scope="col"> Cliente </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes ?? '' as $cliente)
                                @foreach($contratos ?? '' as $contrato)
                                @if ($contrato->cliente_id === $cliente->id)
                                <tr>
                                    <td>{{$contrato->id}}</td>
                                    <td>{{$contrato->cliente_id}} </td>
                                        <td>{{$cliente->name}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
