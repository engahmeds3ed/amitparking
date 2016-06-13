@extends('layouts.master')

@section('content')

<h1>User Data List</h1>
<p class="lead">Here's a list of all your user data. <a class="btn btn-info" href="{{ route('User.create') }}">Add a new one?</a></p>
<hr />

<table class="table table-bordered table-striped">
	<tr>
		<th>ID</th>
		<th>langtitude</th>
		<th>latitude</th>
		<th>userNumber</th>
		<th>address</th>
		<th>userFK</th>
		<th>Actions</th>
	</tr>

	@foreach($userdata as $udata)
	<tr>
		<th>{{ $udata->id }}</th>
		<th>{{ $udata->langtitude }}</th>
		<th>{{ $udata->latitude }}</th>
		<th>{{ $udata->userNumber }}</th>
		<th>{{ $udata->address }}</th>
		<th>{{ $udata->userFK }}</th>
		<td>
			<a href="{{ route('User.edit', $udata->id) }}" class="btn btn-info">Edit</a>
	        <a href="{{ route('User.delete', $udata->id) }}" class="btn btn-danger">Delete</a>
		</td>
	</tr>
	@endforeach
</table>

@stop