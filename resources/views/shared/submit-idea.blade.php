<h4> Share yours ideas </h4>
<div class="row">
    @error('content')
        @include('shared.error-message')
    @enderror
    <form action="{{ route('idea.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="idea" rows="3"></textarea>

        </div>
        <div class="">
            <button class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
