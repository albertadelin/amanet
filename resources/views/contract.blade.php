@extends('layout')

@section('title','Contract')

@section('content')

<button class="add-contract-modal" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Contract nou</button>

<div id="id01" class="modal">
            <form class="modal-content animate" method="POST">
                    @csrf
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Inchide">&times;</span>
                    <div>
                        <div class="container">
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
                        </div>
                    </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button class="close-button" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Close</button>
                </div>
            </form>

</div>
</div>
<div class="table">
    <table id="contract-table" class="display">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nume si Prenume</th>
                <th>CNP</th>
                <th>Telefon</th>
                <th>Oras</th>
                <th>Adresa</th>
                <th>Data contractului</th>
                <th>Produs</th>
                <th>Suma</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>


<script>
    $(document).ready( function () {
        var table = $('#contract-table').DataTable({

            'ajax': '/contract/show',

            "columns": [

                { "data": "contract_id" },
                { "data": "full_name" },
                { "data": "cnp" },
                { "data": "telephone" },
                { "data": "city" },
                { "data": "address_details" },
                { "data": "contract_date" },
                { "data": "product_id" },
                { "data": "amount" },
                { "data" : "contract_id",
                    "render": function ( data, type, row, meta ) {
                        return '<button class="btn btn-info update-btn" data-id="'+ data +'">Update</button>';
                    },
                },
                { "data" : "contract_id",
                    "render": function ( data, type, row, meta ) {
                        return '<a href="/contract/'+data+'/delete" class="btn btn-danger delete-btn" data-id="'+ data +'">Delete</a>';
                },
                }
            ],

            "lengthMenu": [[10, 25, -1], [10, 25, "All"]]

            });
    } );
</script>

@endsection