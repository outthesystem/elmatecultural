@extends('layouts.appfront') @section('contentapp')

<div class="row">

  <div class="col-sm-12" >
    <center>
      <form class="" action="{{route('front.index')}}" method="get">
        <div class="form-group" style="margin-top:0px;">
            <label class="label-control">Selecciona una fecha</label>
            <input type="text" name="search" class="form-control datetimepicker" value="{{Carbon\Carbon::now()}}"/>
            <input type="submit" class="btn btn-success" value="Buscar">

        </div>

      </form>
    </center>
  </div>

  @forelse ($posts as $p)
  <div class="col-sm-6">
      <div class="rotating-card-container manual-flip">
        <div class="card card-rotate">
          <div class="front front-background" style="background-image: url('{{$p->image}}');">
            <div class="card-content">
              <h6 class="category text-info" >{{$p->category->name}}</h6>
              <a href="#pablo">
                <h3 class="card-title">{{$p->title}}</h3>
              </a>
              <p class="card-description">
                {{$p->description}}
              </p>

              <div class="footer text-center">
                <button type="button" name="button" class="btn btn-danger btn-fill btn-round btn-rotate">
    														<i class="material-icons">add</i> Ver mas
    													<div class="ripple-container"></div></button>
              </div>
            </div>
          </div>

          <div class="back back-background" style="background-image: url('{{$p->image}}'); ">
            <div class="card-content">
              <h5 class="card-title">
    													Lugar: {{$p->place}} | Fecha: {{date('d-m-Y', strtotime($p->date_init))}}
    												</h5>
              <p class="card-description">{{$p->description}}</p>
              <div class="footer text-center">
                <a href="#pablo" class="btn btn-info btn-just-icon btn-fill btn-round">
    														<i class="material-icons">monetization_on</i> {{$p->price}}
    													</a>
                <a href="#pablo" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd">
    														<i class="material-icons">mode_edit</i> {{$p->entrytype}}
    													</a>
              </div>
              <br>
              <div class="footer text-center">
                <button type="button" name="button" class="btn btn-success btn-fill btn-round btn-rotate">
    														<i class="material-icons">refresh</i> Volver
    													<div class="ripple-container"></div></button>
              </div>
            </div>
          </div>
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
