@extends('layout')

@section('title','Modifica Contract')

@section('content')

<div class = "container">

{{-- {{ dd($contracts[0]->full_name) }} --}}
  

    <form class="update-contract-form" method="POST" action="/contract/{{$contracts[0]->contract_id}}/update" >
        @csrf

        <div>
            <div class="container">
                <label class="label-name">Nume si Prenume</label><br>
                <input type="text" id="input-name" name="full_name" value="{{ $contracts[0]->full_name }}"><br>
                
                <label class="label-cnp">CNP</label><br>
                <input type="text" id="input-cnp" name="cnp" value="{{ $contracts[0]->cnp }}"><br>

                <label class="label-telephone">Telefon</label><br>
                <input type="text" id="input-telephone" name="telephone" value="{{ $contracts[0]->telephone }}"><br>
            
                <label class="label-city">Localitate</label><br>
                <input type="text" id="input-city" name="city" value="{{ $contracts[0]->city }}"><br>

                <label class="label-address-details">Detalii adresa</label><br>
                <input type="text" id="input-address-details" name="address-details" value="{{ $contracts[0]->address_details }}"><br>

                <label class="label-date">Data intocmirii contractului</label><br>
                <input type="datetime-local" id="input-date" name="date" value="{{ $contracts[0]->contract_date }}"><br>

            
                <label class="label-product">Produs</label><br>
                <select id="products" name="products"><br>
                        @foreach($products as $product)
                            <option value="{{ $product->product_id }}">{{ $product->product_name }}</option><br>
                        @endforeach;
                </select>

                <label class="label-amount">Suma imprumutata</label><br>
                <input type="number" step="0.01" id="input-amount" name="amount" value="{{ $contracts[0]->amount }}"><br>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="submit" value="Trimite">
            </div>
        </div>
</form>

</div>

@endsection