
@extends('layout')

@section('title','Amanet')

@section('content')



<button class="add-product-modal" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Adauga Produs</button>

<div id="id01" class="modal">
    <form class="modal-content animate" method="POST">
            @csrf
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Inchide">&times;</span>

            </div>
                <div class="container">
                <label for="uname"><b>Nume Produs</b></label>
                <input type="text" placeholder="Nume.." name="name" required>
                {{-- <input type="submit" value="Trimite" class="btn btn-primary" id="submitBtn"> --}}
                <button class="button-modal-submit" type="submit">Adauga</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
            <button class="close-button" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Close</button>
        </div>
    </form>
</div>

@endsection