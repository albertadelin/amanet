@extends('layout')

@section('title','Modifica Produs')

@section('content')

<div class = "container">

{{-- {{ dd($contracts[0]->full_name) }} --}}
  

    <form class="update-product-form" method="POST" action="/produs/{{$product->product_id}}/update" >
        @csrf

        <div>
            <div class="container">
                <label class="label-name">Nume produs</label><br>
                <input type="text" id="input-name" name="product_name" value="{{ $product->product_name }}"><br>

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