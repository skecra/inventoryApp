@extends('layouts.main')

@section('additional_styles')

{{--    <style>--}}
{{--        @if($errors->any()) .modal {display: block} @endif--}}
{{--    </style>--}}

@endsection

@section('page_title', 'Equipment list')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Equipment
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-flat btn-primary" href="/equipment/create">Add new equipment</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Serial numbers</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($equipment as $e)
                            <tr>
                                <td>{{ $e->id }}</td>
                                <td><a href="/equipment/{{$e->id}}">{{ $e->name }}</a> </td>
                                <td>{{$e->equipmentCategory->name}}</td>
                                <td>{{$e->quantity}}</td>
                                <td>


                                    <button type="button" class="btn btn-flat" onclick="fillSerialNumberForm({{$e->quantity}}, {{$e->id}})" data-toggle="modal" data-target="#modalSerialNumbers{{$e->id}}">
                                      Add  <i class="fa fa-barcode"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade @if($errors->any) show @endif"  id="modalSerialNumbers{{$e->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add serial numbers for {{$e->name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="POST" action="/serialNumber/create/new">
                                                        @csrf
                                                        @method('PUT')
                                                        <div id="dynamic-inputs{{$e->id}}">
                                                            <!-- Dinamički inputi će biti dodani ovdje -->
                                                        </div>
                                                        <input type="hidden" name="equipment_id" value="{{$e->id}}">
                                                        <ul>
                                                            @foreach($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-danger btn-sm btn-flat">
                                                            <i class="fa fa-times"></i>
                                                            Save
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <a href="/equipment/{{ $e->id }}/edit" class="btn btn-primary btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                        EDIT
                                    </a>
                                </td>
                                <td>

                                    <button type="button" class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#modalEquipment{{$e->id}}">
                                        <i class="fa fa-times"></i> Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalEquipment{{$e->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete equipment {{$e->name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="/equipment/{{ $e->id }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm btn-flat">
                                                            <i class="fa fa-times"></i>
                                                            DELETE
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>



                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection

@section('additional_scripts')
<script src="{{asset('js/equipment/index.js')}}"></script>
<script>


    function fillSerialNumberForm(kolicina, equipment_id)
    {

        var inputsPerRow = 3;
        var container = $('#dynamic-inputs' + equipment_id);
        var errors = @json($errors->toArray());
        container.html('');
        for (var i = 0; i < kolicina; i++) {
            if (i % inputsPerRow === 0) {
                container.append('<div class="row"></div>');
            }
            var row = container.children('.row').last();
            row.append(
                '<div class="input-group">' +
                '<label for="input' + (i+1) + '">Input ' + (i+1) + '</label>' +
                '<input type="text" name="inputs_' + (i+1) + '" id="input' + (i+1) + '">' +
                (errors['inputs.' + i] ? '<div class="error">' + errors['inputs.' + i][0] + '</div>' : '') +
                    '</div>'
            );
        }
        setTimeout(() => {
            console.log("Main function finished after 2 seconds");
            getSerialNumbers(equipment_id);
        }, 2000); // Kašnjenje od 2 sekunde

    }

    function getSerialNumbers(equipment_id)
    {
        $.ajax({
            url: '/getEquipmentSerialNumber/' + equipment_id,
            type: 'GET',
            success: function(response) {

                response.forEach(item => {
                    let i = 0
                   console.log(document.getElementById('inputs_' + (i+1)))

                    i = i + 1

                });
            },
            error: function(xhr) {
                $('#result').html('Error: ' + xhr.statusText);
            }
        });
    }

</script>
@endsection
