@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a href="{{url('/posts')}}" class="btn btn-info"> Volver</a>
    </div>
  </ol>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Editar publicacion
          </div>
          <div class="card-block">
            <form class="" action="{{url('post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
                  <div class="form-group">
                    <label for="name">Titulo:</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}" autofocus>
                  </div>
                  <div class="form-group">
        							<label for="category_id">Selecciona una categoria</label>
        							<select class="form-control" name="category_id" title="Selecciona una categoria">
        							  @foreach ($categories as $c)
        									<option value="{{$c->id}}">{{$c->name}}</option>
        							  @endforeach
        							</select>
        					</div>
                  <div class="form-group">
                    <label for="description">Descripcion:</label>
                    <textarea name="description" id="editor">{{$post->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="date_init">Fecha de inicio:</label>
                    <input type="date" name="date_init" class="form-control" value="{{$post->date_init}}">
                  </div>
                  <div class="form-group">
                    <label for="hour">Hora:</label>
                    <input type="text" name="hour" class="form-control" value="{{$post->hour}}">
                  </div>
                  <div class="form-group">
                    <label for="place">Lugar:</label>
                    <input type="text" name="place" class="form-control" value="{{$post->place}}">
                  </div>
                  <div class="form-group">
                    <label for="entrytype">Tipo de entrada:</label>
                    <input type="text" name="entrytype" class="form-control" value="{{$post->entrytype}}">
                  </div>
                  <div class="form-group">
                    <label for="price">Precio:</label>
                    <input type="number" name="price" class="form-control" value="{{$post->price}}">
                  </div>
                  <div class="form-group">
                    <label for="webfacebook">Web/Facebook:</label>
                    <input type="text" name="webfacebook" class="form-control" value="{{$post->webfacebook}}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{$post->email}}">
                  </div>
                  <div class="form-group">
                    <label for="image">Imagen:</label>
                    <input type="text" name="image" class="form-control" value="{{$post->image}}">
                    <img src="{{$post->image}}" alt="">
                  </div>
                  <div class="form-check">
                    <label for="approved">Aprobado:</label>
                    @if ($post->approved == 1)
                      <input type="checkbox" name="approved" id="approved" value="0" checked/>
                      @else
                        <input type="checkbox" name="approved" id="approved" value="1"/>
                    @endif
                  </div>
                  <div class="form-check">
                    <label for="name">Destacado:</label>
                    @if ($post->sticky == 1)
                      <input type="checkbox" name="sticky" id="sticky" value="0" checked/>
                      @else
                        <input type="checkbox" name="sticky" id="sticky" value="1"/>

                    @endif
                  </div>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </form>

                </div>
                <div class="card-footer">
                </div>
          </div>
        </div>
      </div>
  </div>

  <script>
  			ClassicEditor
  				.create( document.querySelector( '#editor' ) )
  				.then( editor => {
  					console.log( editor );
  				} )
  				.catch( error => {
  					console.error( error );
  				} );
  		</script>
@endsection
