@extends('layout')

@section('title','Contract')

@section('content')

<div class="main-content">
        <div class="contract-form">
            <form class="contract-form" action="">
                <label class="label-name">Nume si Prenume</label><br>
                <input type="text" id="input-name" name="name" placeholder="Nume si Prenume..."><br>
            
                <label class="label-city">Localitatea</label><br>
                <input type="text" id="input-city" name="city" placeholder="Localitatea..."><br>
            
                <label class="label-product">Produs</label><br>
                <select id="country" name="country"><br>
                        @foreach($products as $product)
                            <option value="australia">{{ $product->name }}</option><br>
                        @endforeach;
                </select>
                
                <input type="submit" value="Submit"><br>
            </form>
        </div>
    </div>

@endsection