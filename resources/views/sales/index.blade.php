@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/create">Cadastrar Nova Venda</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul> -->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
<div class="container">
    <div class="row justify-content-md-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Itens</th>
                    <th scope="col">Valor Total</th>
                    <th scope="col">Forma de Pagamento</th>
                    <th scope="col">Número de Parcelas</th>
                    <th scope="col">Data da Última Parcela</th>
                    <th scope="col">valor da Parcela</th>
                    <th scope="col">Observações</th>
                </tr>
            </thead>
            <tbody>
                @if(!$sales)
                <td>Nenhuma venda cadastrada</td>
                @endif

                @foreach($sales as $sale)
                <tr>
                    <th scope="row">{{ $sale->id }}</th>
                    <td>{{ $sale->name }}</td>
                    <td>{{ $sale->itens }}</td>
                    <td>{{ $sale->price }}</td>
                    <td>{{ $sale->payment }}</td>
                    <td>{{ $sale->parcel }}</td>
                    <td>{{ $sale->date }}</td>
                    <td>{{ $sale->price_parcel }}</td>
                    <td>{{ $sale->details }}</td>
                    <td class="edit">
                        <a href="/sales/edit/{{ $sale->id }}" class="btn btn-info edit-btn">
                            Editar
                        </a>
                    </td>
                    <td>
                        <form action="/sales/{{ $sale->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn">
                                Deletar
                            </button>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-seccess" href="/baixarPdf">
                            Baixar PDF
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection