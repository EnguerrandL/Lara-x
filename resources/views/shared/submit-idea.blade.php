@auth
    

<h4> Share yours ideas </h4>
<div class="row">
    @error('content')
        @include('shared.error-message')
    @enderror
    <form action="{{ route('idea.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="idea" rows="3"></textarea>

            @error('content')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth

@guest
<h4> Login to share yours ideas </h4> 
@endguest