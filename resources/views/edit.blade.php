@extends('layout')

@section('content')

<H3>Редактировать {{ $domen->name }}</H3>
<div class="container">
			
				{!! Form::open(['route' => ['update', $domen->id]]) !!}
			<div class="form-group row">
				<label class="col-sm-2">Адрес: </label>
				<div class="col-sm-5">
				<input class="form-control" type="text" name="name" placeholder="Адрес" value="{{ $domen->name }}">
			</div></div><div class="form-group row">
				<label class="col-sm-2">Домен проплачен до..: </label>
				<div class="col-sm-5">
				<input class="form-control" type="date" name="domenDate" placeholder="Домен проплачен до.." value="{{ $domen->domenDate }}">
			</div></div><div class="form-group row">
				<label class="col-sm-2">Хостинг проплачен до..: </label>
				<div class="col-sm-5">
				<input class="form-control" type="date" name="hostDate" placeholder="Хостинг проплачен до.." value="{{ $domen->hostDate }}">
			</div></div><div class="form-group row">
				<label class="col-sm-2">Комментарий: </label>
				<div class="col-sm-5">
				<input class="form-control" type="text" name="comment" placeholder="Комментарий" value="{{ $domen->comment }}">
			</div></div><div class="form-group row">
				<label class="col-sm-2">Цена домена: </label>
				<div class="col-sm-5">
				<input class="form-control" type="text" name="domenPrice" placeholder="Цена домена" value="{{ $domen->domenPrice }}">
			</div></div><div class="form-group row">
				<label class="col-sm-2">Цена хостинга: </label>
				<div class="col-sm-5">
				<input class="form-control" type="text" name="hostPrice" placeholder="Цена хостинга" value="{{ $domen->hostPrice }}">
			</div></div><div class="form-group row">
				<button class="btn btn-success">Применить</button>
				{!! Form::close() !!}
			</div>
	</div>

@endsection