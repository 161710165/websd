@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Lihat Berita 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Judul Kategori</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $beritas->kategori->judul }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Konten</label>
						<input type="text" name="title" class="form-control" value="{{ $beritas->konten }}"  readonly>
			  		</div>

			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection