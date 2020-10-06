@extends('adminlte::page')

@section('title', 'Administrar actividades')


@section('content_header')
    <h1>Administrar actividades</h1>

@section('content')
    <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <div class="row">
                                <div class="col-xs-4">
                                  <span><i class="fa fa-table"></i></span>
                                  <h3 class="box-title">Tabla de Actividades</h3>
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
                        <div class="box-body">
                            <table id="example1" class="table table-responsive table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <th>Número</th>
                                      <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actividades as $data)
                                    <tr>
								      <td>{{ $data->id }} </td>
                                      <td>{{ $data->descripcion }} </td>
                                      <td>
                                      <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$data->id}}" data-title="" data-body="">
                                        <i class="fa fa-pencil"></i>
                                      </a>
								      <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$data->id}}" data-title="" data-body="">
										<i class="fa fa-trash"></i>
									  </a>
									  </td>
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
			<div class="form-group">
				<label class="control-label col-sm-2"for="title">Descripción:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba el nombre de la actividad">
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
</div></div>
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
				<form class="form-horizontal" role="modal">
					<div class="form-group">
						<label class="control-label col-sm-2"for="id">ID:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="fid" disabled>
							</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2"for="title">Descripción:</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" id="descripcion_2" name="descripcion_2" placeholder="Escriba el nuevo nombre de la actividad">
							</div>
					</div>
					<div align="center" style="visibility:hidden">_</div>
				</form>
			</div>
			{{-- Form Delete Post --}}
			<div class="deleteContent"> <span class="title">¿Está seguro de eliminar esta actividad?</span><span class="hidden did"></span>
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
    $('.modal-title').text('Añadir Actividad');
  });
  $("#add").click(function() {
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});
    $.ajax({
      type: 'post',
      url: '/createActividad',
      data: {
        '_token': '{!! csrf_token() !!}',
        'descripcion': $("#descripcion").val()
      },
      success: function(data) {
		  location.reload(true);
      },
      error: function( jqXHR, textStatus, errorThrown ) {
		  alert('Error al cargar. Complete todos los datos correctamente');
		  location.href = '/actividades';
      },
    });
  });

// function Edit POST
$(document).ready(function() {
  $(document).on('click', '.edit-modal', function() {
        $('.modal-title').text('Actualizar actividad');
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
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('.modal-title').text('Eliminar actividad');
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
            url: '/editActividad',
            data: {
				'_token': '{!! csrf_token() !!}',
				'id': $("#fid").val(),
                'descripcion': $("#descripcion_2").val()
            },
            success: function(data) {
				location.reload(true);
            }
        });
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteActividad',
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
