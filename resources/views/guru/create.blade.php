@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Nama Guru 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_guru') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Guru</label>	
			  			<input type="text" name="nama_guru" class="form-control"  required>
			  			@if ($errors->has('nama_guru'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_guru') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('profil_guru') ? ' has-error' : '' }}">
			  			<label class="control-label">Profil Guru</label>	
			  			<input type="file" name="profil_guru" class="form-control"  required>
			  			@if ($errors->has('profil_guru'))
                            <span class="help-block">
                                <strong>{{ $errors->first('profil_guru') }}</strong>
                            </span>
                        @endif
			  		</div>

					  		<div class="form-group {{ $errors->has('nip') ? ' has-error' : '' }}">
			  			<label class="control-label">NIP</label>	
			  			<input type="text" name="nip" class="form-control"  required>
			  			@if ($errors->has('nip'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nip') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jabatan') ? ' has-error' : '' }}">
			  			<label class="control-label">Jabatan</label>	
			  			<input type="text" name="jabatan" class="form-control"  required>
			  			@if ($errors->has('jabatan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jabatan') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection