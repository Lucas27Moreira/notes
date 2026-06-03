
@extends('layout.main_layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">
            @include('top_bar')

           {{-- label and cancel --}}
           <div class="row">
               <div class="col">
                   <p class="display-6 mb-0">EDIT NOTE</p>
               </div>
               <div class="col text-end">
                   <a href="{{ route('home') }}" class="btn btn-outline-danger">
                    <i class="fa-solid fa-xmark"></i>
                   </a>
               </div>
           </div>

           {{-- form --}}
           <form action="{{ route('editNoteSubmit') }}" method="POST">
            @csrf

            <div class="row mt-3">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label">Note Title</label>
                        <input type="text" name="text_title" class="form-control bg-primary text-white" placeholder="Title" value="{{ old('text_title', $note->title) }}" required>
                        {{--show error--}}
                                @error('text_title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Note Text</label>
                        <textarea name="text_note" class="form-control bg-primary text-white" rows="10" placeholder="Content" required>{{ old('text_note', $note->content) }}</textarea>
                        {{--show error--}}
                                @error('text_note')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                    </div>
                </div>
                   
            </div>
            <div class="row mt-3">
                <div class="col text-end">
                   <a href="{{ route('home') }}" class="btn btn-primary px-5">
                    <i class="fa-solid fa-xmark"></i> Cancel
                     </a>
                </div>
                <div class="col text-start">
                    <button type="submit" class="btn btn-success px-5">
                        <i class="fa-solid fa-check"></i> Update
                    </button>
                </div>

           </form>
            </div>
        </div>
    </div>
@endsection