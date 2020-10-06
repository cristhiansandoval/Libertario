
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Partido Libertario">
    <meta name="author" content="https://www.partidolibertario.com.ar">

    <title>Partido Libertario | Argentina Libre</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"  type="text/css">

	<!-- Owl Carousel Assets -->
    <link href="{{asset('owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('owl-carousel/owl.theme.css')}}" rel="stylesheet">

	<!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

	<!-- Custom Fonts -->
    <link rel="stylesheet" href="{{asset('font-awesome-4.4.0/css/font-awesome.min.css')}}"  type="text/css">

	<!-- Core JavaScript Files -->
    <script src="{{asset('js/jquery-2.2.2.min.js')}}"></script>
    <script src="{{asset('js/jquery.browser.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>

<body>
<header>

	<!--Navigation-->
    <nav id="menu" class="navbar container">
		<div class="navbar-header">
			<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
			<a class="navbar-brand" href="https://www.partidolibertario.com.ar">
				<div class="logo"><span style="color: #fff;"><img src="images/Logo.png"></span></div>
			</a>
		</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="{{url('/')}}">VOLVER AL INICIO</a></li>
			</ul>
			<ul class="list-inline navbar-right top-social">
				<li><a href="https://www.facebook.com/partidolibertarioarg"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://www.twitter.com/plibertarioarg"><i class="fa fa-twitter"></i></a></li>
				<li><a href="https://www.instagram.com/partidolibertarioarg"><i class="fa fa-instagram"></i></a></li>
				<li><a href="https://www.youtube.com/channel/UCgAVLgnuoKpAxHJL9Wt3Slg"><i class="fa fa-youtube"></i></a></li>
			</ul>
		</div>
	</nav>
</header>
	<div class="featured container">
    <div class="content">
      <h6>COMPLETÁ TUS DATOS Y FORMÁ PARTE DE UNA ARGENTINA LIBRE</h6>
      <b>Los campos con asterisco son obligatorios</b>
      @if (session('alert'))
      <div class="alert alert-danger">
          {{ session('alert') }}
      </div>
     @endif
     @if (session('message'))
     <div class="alert alert-success">
         {{ session('message') }}
     </div>
    @endif
    </div>
    <form action="{{ url('createAfiliado') }}" method="post">
              {!! csrf_field() !!}
              <div class="form-group has-feedback {{ $errors->has('nombre') ? 'has-error' : '' }}">
                  <input type="text" name="nombre" class="form-control"
                         placeholder="{{'Nombres*'}}">
                  @if ($errors->has('nombre'))
                      <span class="help-block">
                          <strong>{{ $errors->first('nombre') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('apellido') ? 'has-error' : '' }}">
                  <input type="text" name="apellido" class="form-control"
                         placeholder="{{'Apellidos*'}}">
                  @if ($errors->has('apellido'))
                      <span class="help-block">
                          <strong>{{ $errors->first('apellido') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('dni') ? 'has-error' : '' }}">
                    <input type="text" name="dni" class="form-control"
                           placeholder="{{'Documento*'}}">
                    @if ($errors->has('dni'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dni') }}</strong>
                        </span>
                    @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('sexo') ? 'has-error' : '' }}">
                  <select name="sexo" placeholder="Seleccioná tu sexo*">
                    <option default value="">Seleccioná tu sexo*</option>
                    <option value="{{'MASCULINO'}}"> {{ 'MASCULINO' }} </option>
                    <option value="{{'FEMENINO'}}"> {{ 'FEMENINO' }} </option>
                  </select>
                  @if ($errors->has('sexo'))
                      <span class="help-block">
                          <strong>{{ $errors->first('sexo') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('nombre_padre') ? 'has-error' : '' }}">
                  <input type="text" name="nombre_padre" class="form-control"
                         placeholder="{{'Nombre del padre*'}}">
                  @if ($errors->has('nombre_padre'))
                      <span class="help-block">
                          <strong>{{ $errors->first('nombre_padre') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('nombre_madre') ? 'has-error' : '' }}">
                  <input type="text" name="nombre_madre" class="form-control"
                         placeholder="{{'Nombre de la madre*'}}">
                  @if ($errors->has('nombre_madre'))
                      <span class="help-block">
                          <strong>{{ $errors->first('nombre_madre') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('provincia') ? 'has-error' : '' }}">
                  <select name="provincia_id" placeholder="Seleccione su provincia de origen">
                    <option default value="">Seleccioná tu provincia de origen*</option>
                    @foreach(DB::table('provincias')->get() as $prov)
                    <option value="{{$prov->id}}"> {{ $prov->descripcion }} </option>
                    @endforeach
                  </select>
                  @if ($errors->has('provincia'))
                      <span class="help-block">
                          <strong>{{ $errors->first('provincia') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('ciudad') ? 'has-error' : '' }}">
                  <select name="ciudad_id" placeholder="Seleccione su ciudad de origen">
                    <option default value="">Seleccioná tu ciudad de origen*</option>
                    @foreach(DB::table('ciudades')->get() as $data)
                    <option value="{{$data->id}}"> {{ $data->descripcion }} </option>
                    @endforeach
                  </select>
                  @if ($errors->has('ciudad'))
                      <span class="help-block">
                          <strong>{{ $errors->first('ciudad') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('fecha_nacimiento') ? 'has-error' : '' }}">
                  <input type="date" name="fecha_nacimiento" class="form-control"
                         placeholder="{{ 'Fecha de nacimiento*' }}">
                  @if ($errors->has('fecha_nacimiento'))
                      <span class="help-block">
                          <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('domicilio') ? 'has-error' : '' }}">
                  <input type="text" name="domicilio" class="form-control"
                         placeholder="{{'Domicilio*'}}">
                  @if ($errors->has('domicilio'))
                      <span class="help-block">
                          <strong>{{ $errors->first('domicilio') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('cod_postal') ? 'has-error' : '' }}">
                  <input type="text" name="cod_postal" class="form-control"
                         placeholder="{{'Código postal*'}}">
                  @if ($errors->has('cod_postal'))
                      <span class="help-block">
                          <strong>{{ $errors->first('cod_postal') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                         placeholder="{{ 'Email' }}">
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group">
                  <input type="text" name="facebook" class="form-control"
                         placeholder="{{'Facebook'}}">
              </div>
              <div class="form-group">
                  <input type="text" name="instagram" class="form-control"
                         placeholder="{{'Instagram'}}">
              </div>
              <div class="form-group">
                  <input type="text" name="twitter" class="form-control"
                         placeholder="{{'Twitter'}}">
              </div>
              <div class="form-group has-feedback {{ $errors->has('telefono') ? 'has-error' : '' }}">
                  <input type="text" name="telefono" class="form-control"
                         placeholder="{{'Telefono'}}">
                  @if ($errors->has('telefono'))
                      <span class="help-block">
                          <strong>{{ $errors->first('telefono') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('celular') ? 'has-error' : '' }}">
                  <input type="text" name="celular" class="form-control"
                         placeholder="{{'Celular'}}">
                  @if ($errors->has('celular'))
                      <span class="help-block">
                          <strong>{{ $errors->first('celular') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group">
                  <input type="text" name="comentarios" class="form-control"
                         placeholder="{{'Si querés, podés comentarnos algo acá'}}">
              </div>
              <div class="form-group has-feedback">
                  <select name="actividad_id" placeholder="Elegí que querés hacer*">
                    <option default value="1">{{'¿Qué te guataría hacer?'}}</option>
                    @foreach(DB::table('actividades')->get() as $act)
                    <option value="{{$act->id}}"> {{ $act->descripcion }} </option>
                    @endforeach
                  </select>
              </div>
              <button align="left" type="submit"
                      class="btn btn-primary btn-block btn-flat"
              >{{'QUIERO SUMARME'}}</button>
          </form>
      </div>
      <!-- /.form-box -->
  </div>
	<footer>
		<div class="wrap-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-footer footer-1">
						<div class="footer-heading"><h3><span style="color: #fff;">CONSULTAS</span></h3></div>
						<div class="content">
							<h6><a href="mailto:info@partidolibertario.com.ar?Subject=Contacto Web Sumate" target="_top">info@partidolibertario.com.ar</a></h6>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-2">
					</div>
					<div class="col-md-4 col-footer footer-3">
  						<div class="footer-heading"><h3><span style="color: #fff;">CONTACTO DE PRENSA</span></h3></div>
  						<div class="content">
  							<h6><a href="mailto:prensa@partidolibertario.com.ar?Subject=Contacto Web Sumate" target="_top">prensa@partidolibertario.com.ar</a></h6>
  					  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="copy-right">
			<p>Copyright 2019 - Partido Libertario</p>
		</div>
	</footer>
	<!-- Footer -->

	<!-- JS -->
	<script src="{{asset('owl-carousel/owl.carousel.js')}}"></script>
    <script>
    $(document).ready(function() {
      $("#owl-demo-1").owlCarousel({
        autoPlay: 3000,
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [400,1]
      });
	  $("#owl-demo-2").owlCarousel({
        autoPlay: 3000,
        items : 3,

      });
    });
    </script>
    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 5,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4]
      });

    });
    </script>
</body>
</html>
