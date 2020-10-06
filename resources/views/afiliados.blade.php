@extends('adminlte::page')

@section('title', 'Administrar afiliados')


@section('content_header')
    <h1>Administrar afiliados</h1>

@section('content')
    <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <div class="row">
                                <div class="col-xs-4">
                                  <span><i class="fa fa-table"></i></span>
                                  <h3 class="box-title">Tabla de afiliados</h3>
                                </div>
                                <div class="col-xs-2"></div>
                                <div class="col-xs-2"></div>
                                <div class="col-xs-2"></div>
                                <div class="col-xs-2">
                                    <a href="#" class="create-modal btn btn-success btn-sm" data-title="" data-body=""><i class="fa fa-plus"></i></a>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pre-scrollable">
                            <table id="example1" class="table table-responsive table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <th></th>
                                      <th>ID</th>
                                      <th>Nombres</th>
                                      <th>Apellidos</th>
                                      <th>DNI</th>
                                      <th>Sexo</th>
                                      <th>Padre</th>
                                      <th>Madre</th>
                                      <th>Provincia</th>
                                      <th>Ciudad</th>
                                      <th>Nacimiento</th>
                                      <th>Domicilio</th>
                                      <th>Código Postal</th>
                                      <th>Email</th>
                                      <th>Facebook</th>
                                      <th>Instagram</th>
                                      <th>Twitter</th>
                                      <th>Telefono</th>
                                      <th>Celular</th>
                                      <th>Comentarios</th>
                                      <th>Actividad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach (DB::table('afiliados')->get() as $data)
                                   <tr>
                                     <td>
                   <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$data->id}}" data-title="" data-body="">
                                        <i class="fa fa-pencil"></i>
                                        </a>
                       <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$data->id}}" data-title="" data-body="">
                       <i class="fa fa-trash"></i>
                       </a>
                                      </td>
                                     <td>{{$data->id}}</td>
                                     <td>{{$data->nombre}}</td>
                                     <td>{{$data->apellido}}</td>
                                     <td>{{$data->dni}}</td>
                                     <td>{{$data->sexo}}</td>
                                     <td>{{$data->nombre_padre}}</td>
                                     <td>{{$data->nombre_madre}}</td>
                                     <td>{{ substr(substr(DB::table('provincias')->select(DB::raw('descripcion'))->where('id', substr(substr(DB::table('ciudades')->select(DB::raw('provincia_id'))->where('id', $data->ciudad_id)->get(),17,191),0,-2))->get(),17,191), 0,-3) }} </td>
                                     <td>{{ substr(substr(DB::table('ciudades')->select(DB::raw('descripcion'))->where('id', $data->ciudad_id)->get(),17,191), 0,-3) }} </td>
                                     <td>{{date("d/m/Y", strtotime($data->fecha_nacimiento))}}</td>
                                     <td>{{$data->domicilio}}</td>
                                     <td>{{$data->cod_postal}}</th>
                                     <td>{{$data->email}}</td>
                                     <td>{{$data->facebook}}</td>
                                     <td>{{$data->instagram}}</td>
                                     <td>{{$data->twitter}}</td>
                                     <td>{{$data->telefono}}</td>
                                     <td>{{$data->celular}}</td>
                                     <td>{{$data->comentarios}}</td>
                                     <td>{{ substr(substr(DB::table('actividades')->select(DB::raw('descripcion'))->where('id', $data->actividad_id)->get(),17,191), 0,-3) }} </td>
                                   </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
             </div>
              <!-- /.row -->
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"></h4>
		<div align="center" style="visibility:hidden">_</div>
		<div class="modal-label" align="center">Todos los campos son obligatorios</div>
      </div>
      <div class="modal-body">
        <form class="form-create" role="form">
			<div class="form-group pre-scrollable">
				  <div class="form-group">
						<label class="control-label col-sm-2"for="title">Nombre:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nombre" name="nombre" value="">
							</div>
					</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Apellidos:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="apellido" name="apellido" value="">
							</div>
					</div>
          <div class="form-group">
  						<label class="control-label col-sm-2"for="title">DNI:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="dni" name="dni" value="">
  							</div>
  				</div>
          <div class="form-group">
  						<label class="control-label col-sm-2"for="title">Sexo:</label>
  							<div class="col-sm-10">
                  <select name="sexo" class="form-control" id="sexo">
                    <option default value="">SELECCIONÁ TU SEXO</option>
                    <option value="{{'MASCULINO'}}"> {{ 'MASCULINO' }} </option>
                    <option value="{{'FEMENINO'}}"> {{ 'FEMENINO' }} </option>
                  </select>
  							</div>
  				</div>
          <div class="form-group">
  						<label class="control-label col-sm-2"for="title">Padre:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="nombre_padre" name="nombre_padre" value="">
  							</div>
  				</div>
          <div class="form-group">
  						<label class="control-label col-sm-2"for="title">Madre:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="nombre_madre" name="nombre_madre" value="">
  							</div>
  				</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Provincia:</label>
								<div class="col-sm-10">
								<select name="provincia_id" class="form-control" id="provincia_id">
									<option default value="">SELECCIONÁ UNA PROVINCIA</option>
									@foreach(DB::table('provincias')->get() as $provincias)
									<option value="{{$provincias->id}}"> {{ $provincias->descripcion }} </option>
									@endforeach
								</select>
								</div>
					</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Ciudad:</label>
								<div class="col-sm-10">
								<select name="ciudad_id" class="form-control" id="ciudad_id">
									<option default value="">SELECCIONÁ UNA CIUDAD</option>
									@foreach(DB::table('ciudades')->get() as $ciudades)
									<option value="{{$ciudades->id}}"> {{ $ciudades->descripcion }} </option>
									@endforeach
								</select>
								</div>
					</div>
          <div class="form-group">
  						<label class="control-label col-sm-2"for="title">Nacimiento:</label>
  							<div class="col-sm-10">
  								<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="">
  							</div>
  				</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Domicilio:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="domicilio" name="domicilio" value="">
							</div>
					</div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="title">Código Postal:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="cod_postal" name="cod_postal" value="">
              </div>
          </div>
          <div align="center" style="visibility:hidden">_</div>
					<div class="form-group">
						<label class="control-label col-sm-2"for="title">Email:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="email" name="email" value="">
							</div>
					</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Facebook:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="facebook" name="facebook" value="">
							</div>
					</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Instagram:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="instagram" name="instagram" value="">
							</div>
					</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Twitter:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="twitter" name="twitter" value="">
							</div>
					</div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="title">Teléfono:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="telefono" name="telefono" value="">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="title">Celular:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="celular" name="celular" value="">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="title">Comentarios:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="comentarios" name="comentarios" value="">
              </div>
          </div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Actividad:</label>
								<div class="col-sm-10">
								<select name="ciudad_id" class="form-control" id="actividad_id">
									<option default value="">SELECCIONÁ UNA ACTIVIDAD</option>
									@foreach(DB::table('actividades')->get() as $actividades)
									<option value="{{$actividades->id}}"> {{ $actividades->descripcion }} </option>
									@endforeach
								</select>
								</div>
					</div>
			</div>
			<div align="center" style="visibility:hidden">_</div>
      </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span> Guardar
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Cerrar
            </button>
          </div>
      </div>
    </div>
  </div>
 {{-- Modal Form Edit and Delete Post --}}
	<div id="myModal"class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"></h4>
						<div align="center" style="visibility:hidden">_</div>
						<div class="modal-label" align="center">Modifique correctamente todos los campos. Los mismos son obligatorios</div>
					</div>
				<div class="modal-body">
				<form class="form-horizontal pre-scrollable" role="modal">
					<div class="form-group">
						<label class="control-label col-sm-2"for="id">ID:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="fid" disabled>
							</div>
					</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Nombre:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nombre2" name="nombre" value="">
							</div>
					</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Apellidos:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="apellido2" name="apellido" value="">
							</div>
					</div>
          <div class="form-group">
  						<label class="control-label col-sm-2"for="title">DNI:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="dni2" name="dni" value="">
  							</div>
  				</div>
          <div class="form-group">
  						<label class="control-label col-sm-2"for="title">Sexo:</label>
  							<div class="col-sm-10">
                  <select name="sexo" class="form-control" id="sexo2">
                    <option default value="">SELECCIONÁ TU SEXO</option>
                    <option value="{{'MASCULINO'}}"> {{ 'MASCULINO' }} </option>
                    <option value="{{'FEMENINO'}}"> {{ 'FEMENINO' }} </option>
                  </select>
  							</div>
  				</div>
          <div class="form-group">
  						<label class="control-label col-sm-2"for="title">Padre:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="nombre_padre2" name="nombre_padre" value="">
  							</div>
  				</div>
          <div class="form-group">
  						<label class="control-label col-sm-2"for="title">Madre:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="nombre_madre2" name="nombre_madre" value="">
  							</div>
  				</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Provincia:</label>
								<div class="col-sm-10">
								<select name="provincia_id" class="form-control" id="provincia_id2">
									<option default value="">SELECCIONÁ UNA PROVINCIA</option>
									@foreach(DB::table('provincias')->get() as $provincias)
									<option value="{{$provincias->id}}"> {{ $provincias->descripcion }} </option>
									@endforeach
								</select>
								</div>
					</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Ciudad:</label>
								<div class="col-sm-10">
								<select name="ciudad_id" class="form-control" id="ciudad_id2">
									<option default value="">SELECCIONÁ UNA CIUDAD</option>
									@foreach(DB::table('ciudades')->get() as $ciudades)
									<option value="{{$ciudades->id}}"> {{ $ciudades->descripcion }} </option>
									@endforeach
								</select>
								</div>
					</div>
          <div class="form-group">
  						<label class="control-label col-sm-2"for="title">Nacimiento:</label>
  							<div class="col-sm-10">
  								<input type="date" class="form-control" id="fecha_nacimiento2" name="fecha_nacimiento" value="">
  							</div>
  				</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Domicilio:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="domicilio2" name="domicilio" value="">
							</div>
					</div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="title">Código Postal:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="cod_postal2" name="cod_postal" value="">
              </div>
          </div>
          <div align="center" style="visibility:hidden">_</div>
					<div class="form-group">
						<label class="control-label col-sm-2"for="title">Email:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="email2" name="email" value="">
							</div>
					</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Facebook:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="facebook2" name="facebook" value="">
							</div>
					</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Instagram:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="instagram2" name="instagram" value="">
							</div>
					</div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Twitter:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="twitter2" name="twitter" value="">
							</div>
					</div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="title">Teléfono:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="telefono2" name="telefono" value="">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="title">Celular:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="celular2" name="celular" value="">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="title">Comentarios:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="comentarios2" name="comentarios" value="">
              </div>
          </div>
          <div class="form-group">
						<label class="control-label col-sm-2"for="title">Actividad:</label>
								<div class="col-sm-10">
								<select name="ciudad_id" class="form-control" id="actividad_id2">
									<option default value="">SELECCIONÁ UNA ACTIVIDAD</option>
									@foreach(DB::table('actividades')->get() as $actividades)
									<option value="{{$actividades->id}}"> {{ $actividades->descripcion }} </option>
									@endforeach
								</select>
								</div>
					</div>
					<div align="center" style="visibility:hidden">_</div>
				</form>
			</div>
			{{-- Form Delete Post --}}
			<div class="deleteContent"> <span class="title">¿Está seguro de eliminar a este afiliado?</span><span class="hidden did"></span>
			</div>
				<div class="modal-footer">
				<button type="button" class="btn actionBtn" data-dismiss="modal">
				<span id="footer_action_button" class="glyphicon"></span>
				</button>
				<button type="button" class="btn btn-warning" data-dismiss="modal">
				<span class="glyphicon glyphicon"></span>Cerrar
				</button>
			</div>
		</div>
	</div>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!-- Scripts -->
<script src="js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
	{{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-create').show();
    $('.modal-title').text('Añadir afiliado');
  });
  $("#add").click(function() {
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});
    $.ajax({
      type: 'post',
      url: '/storeAfiliado',
      data: {
        '_token': '{!! csrf_token() !!}',
        'nombre': $("#nombre").val(),
        'apellido': $("#apellido").val(),
        'dni': $("#dni").val(),
        'sexo': $("#sexo").val(),
        'nombre_padre': $("#nombre_padre").val(),
        'nombre_madre': $("#nombre_madre").val(),
        'provincia_id': $("#provincia_id").val(),
        'ciudad_id': $("#ciudad_id").val(),
        'fecha_nacimiento': $("#fecha_nacimiento").val(),
        'domicilio': $("#domicilio").val(),
        'cod_postal': $("#cod_postal").val(),
        'email': $("#email").val(),
        'facebook': $("#facebook").val(),
        'instagram': $("#instagram").val(),
        'twitter': $("#twitter").val(),
        'telefono': $("#telefono").val(),
        'celular': $("#celular").val(),
        'comentarios': $("#comentarios").val(),
        'actividad_id': $("#actividad_id").val()
      },
      success: function(data) {
		  location.reload(true);
      },
      error: function( jqXHR, textStatus, errorThrown ) {
		  location.href = '/afiliados';
      },
    });
  });

// function Edit POST
$(document).ready(function() {
  $(document).on('click', '.edit-modal', function() {
        $('.modal-title').text('Actualizar afiliado');
        $('.deleteContent').hide();
        $('.form-create').hide();
		$('.modal-body').show();
        $('.form-horizontal').show();
        $('#footer_action_button').text(" Actualizar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        nombre = $(this).parent().parent().children("td:eq(2)").text();
        apellido = $(this).parent().parent().children("td:eq(3)").text();
        dni = $(this).parent().parent().children("td:eq(4)").text();
        sexo = $(this).parent().parent().children("td:eq(5)").text();
        nombre_padre = $(this).parent().parent().children("td:eq(6)").text();
        nombre_madre = $(this).parent().parent().children("td:eq(7)").text();
        provincia_id = $(this).parent().parent().children("td:eq(8)").text();
        ciudad_id = $(this).parent().parent().children("td:eq(9)").text();
        fecha_nacimiento = $(this).parent().parent().children("td:eq(10)").text();
        domicilio = $(this).parent().parent().children("td:eq(11)").text();
        cod_postal = $(this).parent().parent().children("td:eq(12)").text();
        email = $(this).parent().parent().children("td:eq(13)").text();
        facebook = $(this).parent().parent().children("td:eq(14)").text();
        instagram = $(this).parent().parent().children("td:eq(15)").text();
        twitter = $(this).parent().parent().children("td:eq(16)").text();
        telefono = $(this).parent().parent().children("td:eq(17)").text();
        celular = $(this).parent().parent().children("td:eq(18)").text();
        comentarios = $(this).parent().parent().children("td:eq(19)").text();
        actividad_id = $(this).parent().parent().children("td:eq(20)").text();
        $("#nombre2").val(nombre),
        $("#apellido2").val(apellido),
        $("#dni2").val(dni),
        $("#sexo2").val(sexo),
        $("#nombre_padre2").val(nombre_padre),
        $("#nombre_madre2").val(nombre_madre),
        $("#provincia_id2").val(provincia_id),
        $("#ciudad_id2").val(ciudad_id),
        $("#fecha_nacimiento2").val(fecha_nacimiento),
        $("#domicilio2").val(domicilio),
        $("#cod_postal2").val(cod_postal),
        $("#email2").val(email),
        $("#facebook2").val(facebook),
        $("#instagram2").val(instagram),
        $("#twitter2").val(twitter),
        $("#telefono2").val(telefono),
        $("#celular2").val(celular),
        $("#comentarios2").val(comentarios),
        $("#actividad_id2").val(actividad_id)
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('.modal-title').text('Eliminar afiliado');
        $('.modal-label').text('');
        $('.modal-body').hide();
        $('.form-create').hide();
        $('#footer_action_button').text(" Eliminar");
		$('#footer_action_button').removeClass('glyphicon-check');
		$('#footer_action_button').addClass('glyphicon-trash');
		$('.actionBtn').removeClass('btn-success');
		$('.actionBtn').addClass('btn-danger');
		$('.actionBtn').addClass('delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('#myModal').modal('show');
    });


    $('.modal-footer').on('click', '.edit', function() {
		$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
        $.ajax({
            type: 'post',
            url: '/editAfiliado',
            data: {
				    '_token': '{!! csrf_token() !!}',
				    'id': $("#fid").val(),
            'nombre': $("#nombre2").val(),
            'apellido': $("#apellido2").val(),
            'dni': $("#dni2").val(),
            'sexo': $("#sexo2").val(),
            'nombre_padre': $("#nombre_padre2").val(),
            'nombre_madre': $("#nombre_madre2").val(),
            'provincia_id': $("#provincia_id2").val(),
            'ciudad_id': $("#ciudad_id2").val(),
            'fecha_nacimiento': $("#fecha_nacimiento2").val(),
            'domicilio': $("#domicilio2").val(),
            'cod_postal': $("#cod_postal2").val(),
            'email': $("#email2").val(),
            'facebook': $("#facebook2").val(),
            'instagram': $("#instagram2").val(),
            'twitter': $("#twitter2").val(),
            'telefono': $("#telefono2").val(),
            'celular': $("#celular2").val(),
            'comentarios': $("#comentarios2").val(),
            'actividad_id': $("#actividad_id2").val()
            },
            success: function(data) {
				location.reload(true);
            }
        });
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteAfiliado',
            data: {
                '_token': '{!! csrf_token() !!}',
                'id': $('.did').text()
            },
            success: function(data) {
				location.reload(true);
            }
        });
    });
});
</script>
@stop
@stop
