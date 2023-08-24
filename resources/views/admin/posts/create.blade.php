@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5"><strong>CREA UN NUOVO POST</strong></h1>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-primary">Ritorna alla lista completa</a>
            </div>
            <div class="col-12">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    {{-- Token per rendere sicuro l'inserimento dei dati solo da questo sito e non da codice esterno possibilmente maligno --}}
                    @csrf
                    {{-- Inserimento Titolo --}}
                    <div class="form-group mt-4">
                        <label class="contol-lable">Titolo</label>
                        <input class="form-control @error('title')is-invalid @enderror" type="text" name="title"
                            id="title" placeholder="Titolo" value="{{ old('title') }}">
                        {{-- Gestione errore in fase di inserimento dati --}}
                        @error('title')
                            <div class="text-danger">{{ $messages }}</div>
                        @enderror
                    </div>
                    {{-- Inserimento immagine --}}
                    <div class="form-group mt-4">
                        <label class="contol-lable">Immagine</label>
                        <input class="form-control @error('image')is-invalid @enderror" type="file" name="image"
                            id="image">
                        @error('image')
                            <div class="text-danger">{{ $messages }}</div>
                        @enderror
                    </div>
                    {{-- Inserimento Categoria --}}
                    <div class="form-group mt-4">
                        <label class="contol-lable">Tipologia</label>
                        <select class="form-control @error('type_id') is_invalid @enderror" name="type_id" id="type_id">
                            <option value="">Seleziona Tipologia</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('$type->id')
                            <div class="text-danger">{{ $messages }}</div>
                        @enderror
                    </div>
                    {{-- Inserimento Contenuto --}}
                    <div class="form-group mt-4">
                        <label class="contol-lable">Contenuto</label>
                        <textarea class="form-control @error('content')is-invalid @enderror" name="content" id="content"
                            placeholder="Contenuto" value="{{ old('content') }}"></textarea>
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-sm btn-success" type="submit">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
