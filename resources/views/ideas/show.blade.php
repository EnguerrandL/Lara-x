@extends('layout.layout')
@section('title', 'Net-X')


@section('content')

    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.left-side-bar')
            </div>
            <div class="col-6">


                @include('shared.success-message')



             
                <hr>

                <div class="mt-3">

                    @include('ideas.shared.idea-card')

                </div>


            </div>
            <div class="col-3">
                @include('shared.search')
                @include('shared.follow')
            </div>
        </div>
    </div>

@endsection
