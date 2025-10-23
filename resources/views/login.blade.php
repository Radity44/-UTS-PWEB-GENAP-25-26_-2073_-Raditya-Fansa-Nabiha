@extends('layouts.plain')

@section('title', 'Login | MyRencana')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card p-4" style="max-width:420px; width:100%;">
    <h3 class="text-center text-primary mb-3">Masuk</h3>

    <form action="{{ route('login.process') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>
  </div>
</div>
@endsection
