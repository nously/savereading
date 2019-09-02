@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <form action="/file" class="" method="POST">
                    @csrf
                    <h4>Add a new file~</h4>
                    <div class="row align-baseline">
                        <div class="form-group col-5">
                            <input type="title" class="form-control" id="title" placeholder="Enter title" name="title">
                            @error('title')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group col-5">
                            <input type="url" class="form-control" id="url" placeholder="Enter url" name="url">
                            @error('url')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>

            <hr>

            <div class="card {{ ($user->home->item_color === "bg-light" ||
                                $user->home->item_color === "bg-warning") ? "": "text-white" }}
                                {{ $user->home->item_color }} mb-3">
                <div class="card-header d-flex align-items-baseline justify-content-between">
                    <span> Your files </span>
                    <div>
                        <color-button home="{{ $user->home->id }}" item_color={{ $user->home->item_color }}></color-button> 
                    </div>
                </div>
                
                <div class="list-groupcard">
                    @foreach ($user->files()->orderBy('created_at', 'DESC')->get() as $file)
                        <a 
                            target="_blank" 
                            href="{{ $file->url }}" 
                            class="list-group-item {{ $user->home->item_color }}
                                {{ ($user->home->item_color === "bg-light" ||
                                    $user->home->item_color === "bg-warning")? "": "text-white" }}">
                            {{ $file->title ?? $file->url }}
                        </a>    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
