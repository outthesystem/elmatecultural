@extends('layouts.appfront') @section('contentapp')

<div class="row">

  <div class="col-md-offset-2 col-sm-8" style="margin-top:0px;">
    <center>
      <form class="" action="{{route('front.index')}}" method="get">
        <div class="form-group" style="margin-top:-50px;">
          <h3>Selecciona una fecha para ver los eventos disponibles</h3>
            <input type="text" id="datetimepicker" name="search" class="form-control datetimepicker" required autofocus/>
            <input type="submit" class="btn btn-success" value="Buscar">
        </div>
      </form>
    </center>
    <br><br><br>

  </div>
  @forelse ($posts as $p)
  <div class="col-sm-6">

                  <div class="card card-blog">
	    							<div class="card-image">
	    								<a href="#pablo">
	    									<img class="img" style="height:330px;" src="{{$p->image}}">
	    									<div class="card-title">
	    										{{$p->title}}
	    									</div>
	    								</a>
	    							<div class="colored-shadow" style="background-image: url(&quot;{{$p->image}}&quot;); opacity: 1;"></div><div class="ripple-container"></div></div>

	    							<div class="card-content">
	    								<h6 class="category text-info">{{$p->category->name}}</h6>
	    								<p class="card-description">
                        {!! $p->description !!}
	    								</p>
	    							</div>
	    						</div>
  </div>
@empty
  <div class="col-sm-12">
    <div class="card">
	    <center><div class="card-content content-success">
        <h4 class="card-title">
          <a href="#pablo">No se han encontrado resultados.</a>
        </h4>
        <p class="card-description">
          Vuelve a intentarlo con otra fecha.
        </p>
      </div>
    </div></center>
    </div>
@endforelse

</div>

@endsection
