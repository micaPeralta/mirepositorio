@extends('template.backend_admin')

@section('main')
  
  <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Listado de cuotas impagas vencidas</li>
  </ol>
           
          @include('alerts.operacion_response')
          @if($cuotas->isEmpty())
               <div class="alert alert-warning"> No existen cuotas impagas vencidas hasta el momento </div>
          @else
          <div class="unseen" id="cuotas_impagas">
               
               <div class="table-responsive">
                <TABLE class="table table-striped" summary="Tabla listado de cuotas" >
                <thead>
                  
                  <tr>
                    <th>Num</th> 
                    <th>Mes/Año</th>               
                    <th>Monto</th>
                    <th>Tipo</th>
                    <th>Datos alumno</th>
                   </tr>

                </thead>
                <tbody>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                  @foreach( $cuotas as $cuota )
                     <tr>
                        <td class="td">{{ $cuota->numero}}</td>
                        <td class="td">{{ $cuota->mes}}/{{ $cuota->anio}}</td>
                        <td class="td">{{ $cuota->monto}} </td>
                        <td class="td">{{ $cuota->tipo}} </td>
                        <td class="td">{{ $cuota->nombre}} {{ $cuota->apellido}} {{ $cuota->nroDocumento}} </td>
                      </tr>                    
                 @endforeach

                </tbody>
                  
                     
          </TABLE>
          {{ $cuotas->links()}}
        </div>
       
      </div>
        @endif


@endsection