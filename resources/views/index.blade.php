@extends('layout')

@section('content')

<H3>Таблица с пользователями</H3>

<table class="table table-striped">
				<thead>
					<th>Адрес</th>
					<th>Домен проплачен до..</th>
					<th>Хостинг проплачен до..</th>
					<th>Комментарий</th>
					<th>Цена домена</th>
					<th>Цена хостинга</th>
					<th>Редактировать</th>
					<th>Удалить</th>
				</thead>
				<tbody>
					@foreach($Domens as $domen)
						<tr>
							<td>{{ $domen->name }}</td>
							<td <?php if($domen->checkDomenDate()){echo 'style="background:yellow;"';} ?>>{{ $domen->domenDate }}</td>
							<td <?php if($domen->checkHostDate()){echo 'style="background:yellow;"';} ?>>{{ $domen->hostDate }}</td>
							<td>{{ $domen->comment }}</td>
							<td>{{ $domen->domenPrice }}</td>
							<td>{{ $domen->hostPrice }}</td>
							<td>
								<a href="/edit/{{ $domen->id }}">Редактировать</a>
							</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['delete', $domen->id]]) !!}
								<button>Удалить</button>
								{!! Form::close() !!}
							</td>

						</tr>
					@endforeach
				</tbody>
			</table>
<a href="create" class='btn btn-success'>Создать</a>
@endsection
