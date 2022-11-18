@extends('admin.admin_template')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Categorías</h4> <br><br>

                        <form method="post" id="myForm" action="{{ route('update.category',$category->id) }}" >
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre de la Categoría</label>
                                <div class="form-group col-sm-10">
                                    <input name="category" value="{{ $category->nombre }}" class="form-control" type="text" id="example-text-input">
                                    
                                    @error('category')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Guardar">
                        </form>
        
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    
    </div>
</div>


@endsection