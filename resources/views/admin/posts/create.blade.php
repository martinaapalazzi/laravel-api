@extends('layouts.app')

@section('page-title', 'Create a new post:')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Create a new post
                    </h1>

                    <div class="mb-4">
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                            Go back to Posts Page
                        </a>
                    </div>
        
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ( $errors->all() as $error )
                            <li>{{ $error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
        
                        <div class="mb-3">
                            <label for="title" class="form-label"> Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="enter the title..." maxlength="64" required value="{{ old ('title')}}">
                        </div>

                        <div class="mb-3">
                            <label for="type_id" class="form-label">Type</label>
                            <select name="type_id" id="type_id" class="form-select">
                                <option
                                    value="{{ old('type_id') == null ? 'selected' : '' }}"
                                    {{ old('type_id') == null ? 'selected' : '' }}>
                                    Select a type...
                                </option>
                                @foreach ($types as $type)
                                    <option
                                        value="{{ $type->id }}"
                                        {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="type_id" class="form-label">Technology</label>
                            @foreach ($technologies as $technology)
                                <div class="form-check form-check-inline">
                                    <input
                                        {{--  Qua ci metto checked solo se l'id di questa technology su cui sto ciclando ora è presente nell'arrat --}}
                                        @if (old('technologies') != null && in_array($technology->id, old('technologies')))
                                        {{-- 
                                            OPPURE:
                                            @if(in_array($technology->id, old('technologies'.[])))
                                        --}}
                                            checked
                                        @endif
                                        {{-- {{ old('technologies') != null && in_array($technology->id, old('technologies')) ? 'checked' : '' }} --}}
                                        {{-- {{ in_array($technology->id, old('technologies'.[])) ? 'checked' : '' }} --}}
                                        class="form-check-input"
                                        type="checkbox"
                                        id="technology-{{ $technology->id }}"
                                        name="technologies[]" {{-- perche noi lo abbiamo validato come array --}}
                                        value="{{ $technology->id }}">
                                    <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology ->title }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <label for="cover_img" class="form-label">Cover image</label>
                            <input class="form-control" type="file" id="cover_img" name="cover_img">
                        </div>
        
                        <div class="mb-3">
                            <label for="slug" class="form-label">slug</label>
                            <textarea class="form-control" id="slug" name="slug" rows="3" placeholder="enter the slug..."></textarea value="{{ old ('slug')}}">
                        </div>
        
                        <div class="mb-3">
                            <label for="content" class="form-label">content</label>
                            <textarea class="form-control" id="content" name="content" rows="3" placeholder="enter the content..."></textarea value="{{ old ('content')}}">
                        </div>
        
                        <div>
                            <button type="submit" class="btn btn-success w-100">
                                    Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
