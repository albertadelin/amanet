@extends('layout')

@section('title','Contract')

@section('content')

<div class="main-content">
        <div class="contract-form">
            <form class="contract-form" method="POST">
                    @csrf

                <label class="label-name">Nume si Prenume</label><br>
                <input type="text" id="input-name" name="full_name" placeholder="Nume si Prenume..."><br>
                
                <label class="label-cnp">CNP</label><br>
                <input type="text" id="input-cnp" name="cnp" placeholder="CNP..."><br>

                <label class="label-telephone">Telefon</label><br>
                <input type="text" id="input-telephone" name="telephone" placeholder="Telefon..."><br>
            
                <label class="label-city">Localitate</label><br>
                <input type="text" id="input-city" name="city" placeholder="Localitate..."><br>

                <label class="label-address-details">Detalii adresa</label><br>
                <input type="text" id="input-address-details" name="address-details" placeholder="Detalii adresa..."><br>

                <label class="label-date">Data intocmirii contractului</label><br>
                <input type="datetime-local" id="input-date" name="date"><br>

            
                <label class="label-product">Produs</label><br>
                <select id="products" name="products"><br>
                        @foreach($products as $product)
                            <option value="{{ $product->product_id }}">{{ $product->product_name }}</option><br>
                        @endforeach;
                </select>

                <label class="label-amount">Suma imprumutata</label><br>
                <input type="number" step="0.01" id="input-amount" name="amount" placeholder="Suma imprumutata..."><br>
                
                <input type="submit" value="Trimite"><br>
            </form>
        </div>
    </div>

@endsection