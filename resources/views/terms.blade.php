@extends('layout.layout')




@section('content')
<div class="col-8 mx-auto">
    <div class="row mt-5">
        <div class="col-3">
            @include('shared.left-side-bar')
        </div>
        <div class="col-6">

            <div class="mt-5">
                <h1>Terms</h1>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur qui doloremque perspiciatis ab. Illo
                debitis consectetur sit. Corrupti, dolorem esse ipsam odio maxime iusto voluptates repellendus tempora
                delectus
                placeat voluptatum minima perferendis obcaecati. Vitae rerum fugit natus dignissimos cumque voluptas, amet
            </div>
        </div>
        <div class="col-3">

            @include('shared.search')
            @include('shared.follow')
        </div>
    </div>
</div>
@endsection
