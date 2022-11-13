@extends('admin.admin_template')

@section('admin')

 <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Todas las categorías</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
                        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Lista de Categorías</h4>
                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Nombre de Categoría</th>  
                                <th>Fecha Creación</th>
                                <th>Fecha Actualización</th>
                                <th>Acciones</th>
                                
                            </thead>


                            <tbody>
                                
                                @foreach($dataCategory as $key => $item)
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item->nombre }} </td> 
                                        <td> {{ $item->created_at }} </td>
                                        <td> {{ $item->updated_at }} </td>
                                        
                                        <td>
                                            <a href="{{ route('edit.category',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

                                            <a href="{{ route('delete.category',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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