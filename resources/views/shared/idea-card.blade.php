<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">


                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImgUrl()}}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('user.show', $idea->user->id) }}"> {{ strtoupper($idea->user->name) }}
                        </a></h5>
                </div>
            </div>
            <div class="flex col-1 ">
                <a class="mt-2 btn btn-dark" href="{{ route('idea.show', $idea->id) }}">View</a>

                @if (auth()->id() === $idea->user_id)
                    
          
                <a class="mt-2 btn btn-warning" href="{{ route('idea.edit', $idea->id) }}">Edit</a>

                <form class="mt-2 text-center" action="{{ route('idea.destroy', $idea->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">X</button>
                </form>
                @endif


            </div>
        </div>
    </div>




    <div class="card-body">

        @if ($editing ?? false)
            <form action="{{ route('idea.update', $idea->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="idea" rows="3">{{ old('content', $idea->content) }}</textarea>

                </div>
                <div class="">
                    <button class="btn btn-dark"> Share </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif


        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }} </span>
            </div>
        </div>
        @include('shared.comment-box')
    </div>


</div>
