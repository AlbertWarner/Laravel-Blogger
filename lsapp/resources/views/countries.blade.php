@extends('layouts.app')
@section('content')

<div class="container">

	<h2 class="text-center">Laravel 5.5 Countries Lists</h2>


	@if($countries->count())

		@foreach($countries as $country)

			<span style="padding: 5px;"> {!! $country->flag['flag-icon'] !!} {!! $country->name->common !!} </span> 

		@endforeach

	@endif

</div>
@endsection