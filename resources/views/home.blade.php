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

            {{-- Slider --}}
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel"  data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="colored card {{ ($home->item_color === "bg-light" ||
                                $home->item_color === "bg-warning") ? "": "text-white" }}
                                {{ $home->item_color }} mb-3">
                            <div class="card-header d-flex align-items-baseline justify-content-between">
                                <span> Your files </span>
                                <div>
                                    {{-- <a class="text-dark" id="change-color"><i class="fas fa-palette"></i></a> --}}
                                    <color-button home="{{ $home->id }}" item_color={{ $home->item_color }}></color-button>
                                </div>
                            </div>

                            <div class="list-groupcard">
                                @foreach ($user->files()->orderBy('created_at', 'DESC')->get() as $file)
                                    <a 
                                        target="_blank" 
                                        href="{{ $file->url }}" 
                                        class="colored list-group-item {{ $home->item_color }}
                                            {{ ($home->item_color === "bg-light" ||
                                                $home->item_color === "bg-warning")? "": "text-white" }}">
                                        {{ $file->title ?? $file->url }}
                                    </a>    
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/storage/backgrounds/default.jpg" alt="Second slide">
                    </div>
                </div>
                
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
