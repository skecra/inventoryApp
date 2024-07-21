@extends('layouts.main')

@section('page_title', 'Edit category')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Edit category
                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <form action="/equipment_categories/{{$equipmentCategory->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4">
                                <label for="name">Name</label>
                                <input value="{{$equipmentCategory->name}}" type="text" name="name" id="name_input" class="form-control @error('name') is-invalid @endif">
                                <div class="invalid-feedback">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-success mt-4">Save</button>
                            </div>
                        </div>
                    </form>




                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection

