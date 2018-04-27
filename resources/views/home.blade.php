
@extends('layouts.app')

@section('content')

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<p>Welcome on the page</p>



@endsection