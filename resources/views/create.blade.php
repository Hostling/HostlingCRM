@extends('layout')

@section('content')

<H3>Создать домен</H3>
<div class="container">
				{!! Form::open(['method' => 'POST', 'route' => 'create']) !!}
			<div class="form-group row">
				<label class="col-sm-2">Адрес: </label>
				<div class="col-sm-5">
				<input class="form-control" type="text" name="name" placeholder="Адрес">
			</div></div><div class="form-group row">
				<label class="col-sm-2">Домен проплачен до..: </label>
				<div class="col-sm-5">
				<input class="form-control" type="date" name="domenDate" placeholder="Домен проплачен до..">
			</div></div><div class="form-group row">
				<label class="col-sm-2">Хостинг проплачен до..: </label>
				<div class="col-sm-5">
				<input class="form-control" type="date" name="hostDate" placeholder="Хостинг проплачен до..">
			</div></div><div class="form-group row">
				<label class="col-sm-2">Комментарий: </label>
				<div class="col-sm-5">
				<input class="form-control" type="text" name="comment" placeholder="Комментарий">
			</div></div><div class="form-group row">
				<label class="col-sm-2">Цена домена: </label>
				<div class="col-sm-5">
				<input class="form-control" type="text" name="domenPrice" placeholder="Цена домена">
			</div></div><div class="form-group row">
				<label class="col-sm-2">Цена хостинга: </label>
				<div class="col-sm-5">
				<input class="form-control" type="text" name="hostPrice" placeholder="Цена хостинга">
			</div></div><div class="form-group row">
				<button class="btn btn-success">Создать</button>
				{!! Form::close() !!}
			</div>
	</div>

@endsection