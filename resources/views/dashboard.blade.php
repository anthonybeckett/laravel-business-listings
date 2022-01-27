@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header align-middle">
                {{ __('Dashboard') }}
                <span class="float-right"><a href="/listings/create" class="btn btn-success btn-sm">Add Listing</a></span>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h3>Your Listings</h3>

                @if(count($listings))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listings as $listing)
                                <tr>
                                    <td>{{$listing->name}}</td>
                                    <td>
                                        {!! Form::open(['action' => ['App\Http\Controllers\ListingsController@destroy', $listing->id], 'method' => 'POST'], ['onSubmit' => 'return confirm("Are you sure?")']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::bsSubmit('Delete', ['class' => 'btn btn-danger float-right ml-2']) !!}
                                        {!! Form::close() !!}
                                        <a href="/listings/{{$listing->id}}/edit" class="btn btn-primary float-right">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
