@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Data Book</h3>
    <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-body">

        {{-- FORM SEARCH --}}
        <form method="GET" class="mb-3">
    <div class="row">

        <!-- Input Search -->
        <div class="col-md-3">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control"
                   placeholder="Cari judul buku...">
        </div>

        <!-- Dropdown Kategori -->
        <div class="col-md-3">
            <select name="category_id" class="form-control">
                <option value="">-- Semua Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tombol Filter -->
        <div class="col-md-2">
            <button class="btn btn-success">Filter</button>
        </div>

        <!-- Tombol Reset -->
        <div class="col-md-2">
            <a href="{{ route('books.index') }}" class="btn btn-secondary">
                Reset
            </a>
        </div>

    </div>
</form>

{{-- TOTAL SEMUA BOOK --}}
<div class="mb-3">
    <h5>Total Semua Book: <strong>{{ $totalBooks }}</strong></h5>
</div>

{{-- TOTAL BOOK PER CATEGORY --}}
<div class="mb-3">
    <h6>Total Book per Category:</h6>
    <ul>
        @foreach($categoryCounts as $cat)
            <li>
                {{ $cat->nama }} : {{ $cat->books_count }} buku
            </li>
        @endforeach
    </ul>
</div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $key => $book)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>{{ $book->tahun_terbit }}</td>
                    <td>
                        <span class="badge bg-info">{{ $book->stok }}</span>
                    </td>
                    <td>
                        <a href="{{ route('books.edit',$book->id) }}" 
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('books.destroy',$book->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Data tidak ditemukan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection