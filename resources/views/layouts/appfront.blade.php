<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('frontend/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>El Mate Cultural</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/css/material-kit.css?v=1.2.1')}}" rel="stylesheet"/>
</head>

<body class="blog-posts">

    <div class="page-header header-filter header-small" style="background-color:#E4E4E4;">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h2 class="title">el mate cultural</h1>
						<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-success btn-raised btn-lg">
						<i class="material-icons">add</i> Crea tu evento
					<div class="ripple-container"></div></a>
				</div>
			</div>
		</div>
	</div>

<!-- Navbar will come here -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Crea tu evento</h4>
			</div>
			<div class="modal-body">
				<form class="" action="{{route('front.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group label-floating">
							<label class="control-label">Titulo</label>
				    	<input type="text" value="" name="title" class="form-control" />
					</div>
					<div class="form-group label-floating">
						<label class="control-label">Descripcion</label>
				     <textarea class="form-control" name="description" placeholder="" rows="5"></textarea>
					</div>
					<div class="form-group">
							<label class="control-label">Selecciona una categoria</label>
							<select class="selectpicker" data-style="btn-success" name="category_id" data-live-search="true" title="Selecciona una categoria">
							  @foreach ($categories as $c)
									<option value="{{$c->id}}" data-tokens="{{$c->name}}">{{$c->name}}</option>
							  @endforeach
							</select>
					</div>
					<div class="form-group">
	            <label class="label-control">Selecciona una fecha</label>
	            <input type="text" name="date_init" class="form-control datetimepicker" value="{{Carbon\Carbon::now()}}"/>
	        </div>
					<div class="form-group label-floating">
							<label class="control-label">Hora</label>
				    	<input type="text" value="" name="hour" class="form-control" />
					</div>
					<div class="form-group label-floating">
							<label class="control-label">Lugar</label>
				    	<input type="text" value="" name="place" class="form-control" />
					</div>
					<div class="form-group">
							<label class="control-label">Tipo de entrada</label>
				    	<input type="text" value="" name="entrytype" placeholder="Gratuita, entrada simple, etc..." class="form-control" />
					</div>
					<div class="form-group label-floating">
							<label class="control-label">Precio </label>
				    	<input type="number" value="" placeholder="Precio" name="price" class="form-control" />
					</div>
					<div class="form-group label-floating">
							<label class="control-label">Web / Facebook</label>
				    	<input type="text" value="" placeholder="" name="webfacebook" class="form-control" />
					</div>
					<div class="form-group label-floating">
							<label class="control-label">Email de contacto</label>
				    	<input type="text" value="" placeholder="" name="email" class="form-control" />
					</div>
					<div class="form-group label-floating">
						<div class="fileinput fileinput-new text-center" data-provides="fileinput">
						   <div class="fileinput-new thumbnail img-raised">
							<img src="{{asset('frontend/img/image_placeholder.jpg')}}" alt="...">
						   </div>
						   <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
						   <div>
							<span class="btn btn-raised btn-round btn-default btn-file">
							   <span class="fileinput-new">Selecciona tu imagen</span>
							   <span class="fileinput-exists">Cambiar</span>
							   <input type="file" name="image" />
							</span>
						        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
						        <i class="fa fa-times"></i> Eliminar</a>
						   </div>
						</div>
					</div>
					<input type="submit" name="" value="dale">

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-simple">Nice Button</button>
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- end navbar -->

<div class="main main-raised">
		<div class="container">
      <div class="section">

					@if(session()->has('message'))

							<div class="alert alert-success">
				            <div class="container">
								<div class="alert-icon">
									<i class="material-icons">check</i>
								</div>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="material-icons">clear</i></span>
								</button>
				            	<b>Felicitaciones:</b> {{ session()->get('message') }}

				            </div>
				        </div>
					@endif
        @yield('contentapp')

      </div>
		</div>
	</div>

	<footer class="footer">
			<div class="container">
				<a class="footer-brand" href="#pablo">	Contactanos</a>


				<ul class="pull-center">

					<li>
						<a href="#pablo">

						</a>
					</li>
				</ul>

				<ul class="social-buttons pull-right">
					<li>
						<a href="https://www.facebook.com/compartimoscultura/" target="_blank" class="btn btn-just-icon btn-facebook btn-simple">
							<i class="fa fa-facebook-square"></i>
						</a>
					</li>
				</ul>

			</div>
		</footer>
</body>
	<!--   Core JS Files   -->
	<script src="{{asset('frontend/js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('frontend/js/material.min.js')}}"></script>

	<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
	<script src="{{asset('frontend/js/moment.min.js')}}"></script>
	<script src="{{asset('frontend/js/es-us.js')}}"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
	<script src="{{asset('frontend/js/nouislider.min.js')}}" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
	<script src="{{asset('frontend/js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
	<script src="{{asset('frontend/js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
	<script src="{{asset('frontend/js/bootstrap-tagsinput.js')}}"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
	<script src="{{asset('frontend/js/jasny-bootstrap.min.js')}}"></script>

	<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
	<script src="{{asset('frontend/js/material-kit.js?v=1.2.1')}}" type="text/javascript"></script>

	<script type="text/javascript">
	$('.datetimepicker').datetimepicker({
		inline: true,
		sideBySide: true,
		keepOpen: true,
		format: 'YYYY-MM-DD',
		locale: 'es-us',
		 icons: {
				 time: "fa fa-clock-o",
				 date: "fa fa-calendar",
				 up: "fa fa-chevron-up",
				 down: "fa fa-chevron-down",
				 previous: 'fa fa-chevron-left',
				 next: 'fa fa-chevron-right',
				 today: 'fa fa-screenshot',
				 clear: 'fa fa-trash',
				 close: 'fa fa-remove'
		 }
 });
	</script>
</html>
