@extends('admin.admin_template')

@section('admin')

 <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Todas las órdenes de compra</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
                        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Lista de Ordenes</h4>
                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                <th>N° órden</th>
                                <th>Producto</th>  
                                <th>Categoría</th>  
                                <th>Cantidad</th>  
                                <th>Precio Uni.</th>  
                                <th>Total</th>  
                                <th>Fecha Creación</th>
                                <th>Fecha Actualización</th>
                                <th>Acciones</th>
                                
                            </thead>


                            <tbody>
                                
                               
                            
                            </tbody>
                        </table>
            
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    
                      
    </div> <!-- container-fluid -->
</div>
 

@endsection