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
                @include('ideas.shared.submit-idea')
                <hr>


                @forelse ($ideas as $idea)
                    <div class="mt-3">
                        @include('ideas.shared.idea-card')
                    </div>
                @empty
                    <h3>No ideas found </h3>
                @endforelse



                <div class="mt-3"> {{ $ideas->withQueryString()->links() }}</div>
            </div>
            <div class="col-3">

                @include('shared.search')
                @include('shared.follow')
            </div>
        </div>
    </div>

@endsection
