@extends('admin.admin_template')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Proveedor</h4> <br><br>

                        <form method="post" id="myForm" action="{{ route('store.provider') }}" >
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">RUC</label>
                                <div class="form-group col-sm-10">
                                    <input name="ruc_proveedor" class="form-control" type="number" id="example-text-input">
                                    
                                    @error('ruc_proveedor')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="form-group col-sm-10">
                                    <input name="proveedor" class="form-control" type="text" id="example-text-input">
                                    
                                    @error('proveedor')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre del Contacto</label>
                                <div class="form-group col-sm-10">
                                    <input name="nombre_contacto" class="form-control" type="text" id="example-text-input">
                                    
                                    @error('nombre_contacto')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Teléfono del Contacto</label>
                                <div class="form-group col-sm-10">
                                    <input name="telefono_contacto" class="form-control" type="number" id="example-text-input">
                                    
                                    @error('telefono_contacto')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Correo del Contacto</label>
                                <div class="form-group col-sm-10">
                                    <input name="email_contacto" class="form-control" type="text" id="example-text-input">
                                    
                                    @error('email_contacto')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Dirección</label>
                                <div class="form-group col-sm-10">
                                    <input name="direccion_proveedor" class="form-control" type="text" id="example-text-input">
                                    
                                    @error('direccion_proveedor')
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