@extends('layout')

@section('title','Adauga Produs')

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
                <input type="text" placeholder="Nume.." name="name">
                <input type="submit" value="Adauga" class="btn btn-primary" id="submitBtn">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- <button class="button-modal-submit" type="submit">Adauga</button> --}}
            </div>

            <div class="container" style="background-color:#f1f1f1">
            <button class="close-button" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Close</button>
        </div>
    </form>
</div>

<div class="table">
        <table id="products-table" class="display">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nume produs</th>
                    <th>Modifica</th>
                    <th>Sterge</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
</div>
    
    
    <script>
        $(document).ready( function () {
            var table = $('#products-table').DataTable({
    
                'ajax': '/produse/show',
    
                "columns": [
    
                    { "data": "product_id" },
                    { "data": "product_name" },
                    { "data" : "product_id",
                        "render": function ( data, type, row, meta ) {
                            return '<a href="/produs/'+data+'/update/form" class="genric-btn info circle" data-id="'+ data +'">Modifica</a>';
                        },
                    },
                    { "data" : "product_id",
                        "render": function ( data, type, row, meta ) {
                            return '<a href="/produs/'+data+'/delete" class="genric-btn danger circle" onclick="return confirm(\'Sigur vrei sa stergi produsul?\')" data-id="'+ data +'">Sterge</a>';
                    },
                    }
                ],
                "lengthMenu": [[10, 25, -1], [10, 25, "All"]]
                });
        } );
    </script>

@endsection