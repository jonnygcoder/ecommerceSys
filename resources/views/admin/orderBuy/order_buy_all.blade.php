@extends('admin.admin_template')

@section('admin')

 <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Todas las Órdenes de Compra</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
                        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Lista de Órdenes</h4>
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Cliente</th>  
                                <th>Departamento</th>  
                                <th>Ciudad</th>  
                                <th>Distrito</th>  
                                <th>Calle</th>  
                                <th>Fecha Entrega</th>  
                                <th>Monto Total Pagar</th>
                                <th>Estado</th>
                                <th>Acción</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($dataOrderBuy as $key => $item)
                                <tr>
                                    <td> {{ $key+1}} </td>
                                    <td> {{ $item->id_cliente }} </td> 
                                    <td> {{ $item->departamento }} </td> 
                                    <td> {{ $item->ciudad }} </td> 
                                    <td> {{ $item->distrito }} </td> 
                                    <td> {{ $item->calle }} </td> 
                                    <td> {{ $item->fecha_entrega }} </td> 
                                    <td>S/.  {{ $item->monto_total }} </td> 

                                    @php
                                        if($item->estado == 0){
                                            $estado = 'PENDIENTE';
                                            $estiloMsg = 'warning';
                                            $estiloBtn = '';
                                            $estiloWSP = 'hidden';
                                        }else if($item->estado == 1){
                                            $estado = 'APROBADO';
                                            $estiloMsg = 'success';
                                            $estiloBtn = 'hidden';
                                            $estiloWSP = '';
                                        }else {
                                            $estado = 'CANCELADO';
                                            $estiloMsg = 'danger';
                                            $estiloBtn = 'hidden';
                                            $estiloWSP = 'hidden';
                                        }
                                    @endphp

                                    <!-- <td><div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-15 text-warning align-middle me-2"></i>  </div></td> -->
                                    <td><div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-15 text-{{$estiloMsg}} align-middle me-2"></i> {{$estado}} </div></td>
                                    
                                    <td>
                                        <a {{$estiloBtn}} href=" {{ route('update.order',$item->id) }} " class="btn btn-info sm " title="Aprobar" id="aprobarOrden">  <i class="fas fa-edit"></i> </a>
                                        <a {{$estiloBtn}} href=" {{ route('cancel.order',$item->id) }} " class="btn btn-danger sm " title="Cancelar" id="cancelarOrden">  <i class="fas fa-trash-alt"></i> </a>
                                        <a  {{$estiloWSP}} href=" {{ route('sendMessageWsp') }} " class="btn btn-success sm " title="WSP" id="wsp">  <i class="fab fa-whatsapp"></i> </a>
                                        
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