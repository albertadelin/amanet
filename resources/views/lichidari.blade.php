@extends('layout')

@section('title','Lichidari')

@section('content')



<div class="table">
    <table id="lichidari_table" class="display">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nume si Prenume</th>
                <th>CNP</th>
                <th>Telefon</th>
                <th>Oras</th>
                <th>Adresa</th>
                <th>Data contractului</th>
                <th>Data lichidarii</th>
                <th>Produs</th>
                <th>Suma</th>
                <th>Genereaza PDF</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>



<script>
    $(document).ready( function () {
        var table = $('#lichidari_table').DataTable({

            'ajax': '/lichidari/show',

            "columns": [

                { "data": "lichidare_id" },
                { "data": "full_name" },
                { "data": "cnp" },
                { "data": "telephone" },
                { "data": "city" },
                { "data": "address_details" },
                { "data": "contract_date" },
                { "data": "created_at" },
                { "data": "product_name" },
                { "data": "amount" },
                { "data" : "lichidare_id",
                    "render": function ( data, type, row, meta ) {
                        return '<a href="/lichidari/pdf/'+data+'" class="genric-btn primary circle" data-id="'+ data +'">PDF</a>';
                    },
                }
            ],

            "lengthMenu": [[10, 25, -1], [10, 25, "All"]]

            });
    } );

</script>

@endsection