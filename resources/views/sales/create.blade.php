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
<div class="container w-50 p-3">
    <div class="row justify-content-msm-center">
        <form action="/sales" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="itens" class="form-label">Itens da Venda</label>
                <input type="text" class="form-control" id="itens" name="itens" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Valor Total</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Observações</label>
                <input type="text" class="form-control" name="details" id="details">
            </div>
            <div class="mb-3">
                <label for="">Selecione a Forma de Pagamento</label>
                <select name="payment" id="select" onchange="credito()" class="form-select" required>
                    <option value="Vista">Vista</option>
                    <option value="Pix">Pix</option>
                    <option value="Débito">Débito</option>
                    <option id="Crédito" value="Crédito">Crédito</option>
                </select>
            </div>
            <!-- forma de pagamento -->
            <div id="div-select" style="display: none" class="mb-3">
                <label for="itens" class="form-label">Quantidade de Parcelas</label>
                <select name="parcel" id="select-parcela" onchange="numParcela()" class="form-select" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div id="numero-parcela" class="mb-3">
            </div>
            <input class="btn btn-primary" type="submit" value="Salvar">
        </form>
    </div>
</div>

<script>
    function credito() {
        let select = document.getElementById("select")
        if (select.value === "Crédito") {
            document.getElementById("div-select").style.display = "block";
            document.getElementById("numero-parcela").style.display = "block";
            document.getElementById("numero-parcela").value = 1;
        } else {
            document.getElementById("div-select").style.display = "none";
            document.getElementById("numero-parcela").style.display = "none";
        }
    }

    function numParcela() {
        let numeroParcela = document.getElementById("numero-parcela");
        let price = Number(document.getElementById("price").value);
        let num = document.getElementById('select-parcela').value;
        let date = new Date().toLocaleDateString();
        let valorParcela = "";
        numeroParcela.innerHTML = "";

        if (price) {
            valorParcela = (price / num);
            valorParcela = valorParcela.toFixed(2);

            for (i = 1; i <= num; i++) {
                numeroParcela.innerHTML += `
                <div id="numero-parcela" class="mb-3">
                    <label>${i}. Data</label> <input type="date" name="date" id="date" value="<?php echo date('d-m-YY'); ?>">
                    <label for="">Valor: R$</label> <input type="string" name="price_parcel" id="price_parcel" value="${valorParcela}">
                </div>
            `
            }
        } else {
            alert("Preencha o campo 'Valor Total'")
        }
    }
</script>
@endsection