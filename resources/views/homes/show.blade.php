@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            {{-- Form add file --}}
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

                        <input type="hidden" name="home" value="{{ $home->id }}">

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>

            <hr>

            {{-- Slider --}}
            <div id="carouselExampleFade" class="row carousel slide carousel-fade" data-ride="carousel"  data-interval="false">
                <div class="carousel-inner col-10 offset-1 pt-3">
                    <div class="carousel-item active">
                        <div class="colored card {{ ($home->item_color === "bg-light" ||
                                $home->item_color === "bg-warning") ? "": "text-white" }}
                                {{ $home->item_color }} mb-3">
                            <div class="card-header d-flex align-items-baseline justify-content-between">
                                <span> Jurnal Skripsiku </span>
                                <div>
                                    {{-- <a class="text-dark" id="change-color"><i class="fas fa-palette"></i></a> --}}
                                    <color-button home="{{ $home->id }}" item_color={{ $home->item_color }}></color-button>
                                </div>
                            </div>

                            <div class="list-groupcard">
                                @foreach ($home->files()->orderBy('created_at', 'DESC')->get() as $file)
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
                </div>
                
                <a class="carousel-control-prev col-1" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next col-1" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

    </div>
    <div>
        <h3 data-toggle="modal" data-target="#exampleModal"><a href="#" class="text-dark"><i class="fas fa-book"></i></a></h3>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a new home!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/home/" class="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-12">
                            <input type="string" class="form-control" id="name" placeholder="Your home's name" name="name">
                            @error('name')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <input type="string" class="form-control" id="caption" placeholder="Your sweet caption" name="caption">
                            @error('caption')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="col-12">Pick your favorite color</div>
                        <div class="d-flex pb-3">
                            <initial-color-button item_color="bg-primary" class="pl-4 mx-auto btn btn-outline-primary"></initial-color-button>
                            <initial-color-button item_color="bg-secondary" class="pl-4 mx-auto btn btn-outline-secondary"></initial-color-button>
                            <initial-color-button item_color="bg-success" class="pl-4 mx-auto btn btn-outline-success"></initial-color-button>
                            <initial-color-button item_color="bg-danger" class="pl-4 mx-auto btn btn-outline-danger"></initial-color-button>
                            <initial-color-button item_color="bg-warning" class="pl-4 mx-auto btn btn-outline-warning"></initial-color-button>
                            <initial-color-button item_color="bg-info" class="pl-4 mx-auto btn btn-outline-info"></initial-color-button>
                            <initial-color-button item_color="bg-light" class="pl-4 mx-auto btn btn-outline-light" style="border: 2px dashed black"></initial-color-button>
                            <initial-color-button item_color="bg-dark" class="pl-4 mx-auto btn btn-outline-dark"></initial-color-button>
                        </div>

                        <input type="hidden" value="" name="item_color" id="item_color_input">

                        <div class="form-group col-12">
                            <label for="background" class="col-form-label text-md-right">{{ __('Background') }}</label>

                            <div class="">
                                <input id="background" type="file" name="background">

                                @error('background')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary float-right">Tinker!</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
