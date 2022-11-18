@extends('admin.admin_template')

@section('admin')

 <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Todas los Proveedores</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
                        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Lista de Proveedores</h4>
                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>RUC</th>  
                                <th>Proveedor</th>  
                                <th>Dirección</th>  
                                <th>Nombre del contacto</th>  
                                <th>Teléfono del contacto</th>  
                                <th>Correo del contacto</th>  
                                <th>Fecha Creación</th>
                                <th>Fecha Actualización</th>
                                <th>Acciones</th>
                                
                            </thead>


                            <tbody>
                                
                                @foreach($dataProvider as $key => $item)
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item->ruc_prov }} </td> 
                                        <td> {{ $item->nom_prov }} </td> 
                                        <td> {{ $item->dir_prov }} </td> 
                                        <td> {{ $item->nom_cont }} </td> 
                                        <td> {{ $item->tel_cont }} </td> 
                                        <td> {{ $item->email_cont }} </td> 
                                        <td> {{ $item->created_at }} </td>
                                        <td> {{ $item->updated_at }} </td>
                                        
                                        <td>
                                            <a href="#" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

                                            <a href="#" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                                        </td>
                                    
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
            
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    
                      
    </div> <!-- container-fluid -->
</div>
 

@endsection