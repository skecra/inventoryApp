@extends('layouts.main')

@section('page_title', 'Edit equipment')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Edit Equipment
                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <form action="/equipment/{{$equipment->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4">
                                <label for="name">Name</label>
                                <input value="{{$equipment->name}}" type="text" name="name" id="name_input" class="form-control @error('name') is-invalid @endif">
                                <div class="invalid-feedback">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="email">Category</label>
                                <select name="equipment_category_id" class="form-control @error('equipment_category_id') is-invalid @endif" id="">
                                    <option disabled value="">--choose category--</option>
                                    @foreach ($categories as $c)

                                        <option @if($c->id == $equipment->equipment_category_id) selected @endif value="{{$c->id}}">{{$c->name}}</option>
                                        
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('equipment_category_id')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="name">Quantity</label>
                                <input type="text" name="quantity" value="{{$equipment->quantity}}" class="form-control @error('quantity') is-invalid @endif">
                                <div class="invalid-feedback">
                                    @error('quantity')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="department">Description</label>
                                <textarea class="form-control @error('description') is-invalid @endif" name="description" id="" cols="10" rows="2">{{$equipment->description}}</textarea>
                                <div class="invalid-feedback">
                                    @error('description')
                                    {{ $message }}
                                    @enderror
                                </div>
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


