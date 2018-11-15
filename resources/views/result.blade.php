@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Страница результатов</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Страница результатов:

                        <div class="alert alert-success">
                            <ul>
                                <li>{{ $contact->id }}</li>
                                <li>{{ $contact->firstname }}</li>
                                <li>{{ $contact->lastname }}</li>
                                <li>{{ $contact->tel }}</li>
                                <li>{{ $contact->home }}</li>
                            </ul>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
