@extends('layout.master')

@section('judul', 'Edit Book')

@section('content')
    <h2>Update New Book</h2>
    <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST">
        @method('PATCH')

        @csrf
        <div class="row">
            <<div class="col-md-6 mb-3">
                <label for="judul">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul"
                    value="{{ old('judul') }}">
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="halaman">Halaman</label>
                    <input type="number" class="form-control @error('halaman') is-invalid @enderror" name="halaman" id="halaman"
                        min="1" max="999" value="{{ old('halaman') }}">
                    @error('halaman')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                    id="kategori" value="{{ old('kategori') }}">
                @error('kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="penerbit">Penerbit</label>
            <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit"
                id="penerbit" value="{{ old('penerbit') }}">
            @error('penerbit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
    </form>
@endsection
