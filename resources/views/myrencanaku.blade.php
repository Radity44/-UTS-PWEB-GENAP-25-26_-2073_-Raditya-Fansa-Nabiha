@extends('layouts.app')

@section('title', 'MyRencanaKu | MyRencana')

@section('content')
<div class="section-header">
    <h1 class="fw-bold text-primary mb-3">MyRencanaKu</h1>
</div>

<div class="section-content">
    <form action="{{ route('rencana.add') }}" method="POST" class="mb-4">
        @csrf
        <div class="row g-3 align-items-center">
            <div class="col-md-6">
                <input type="text" name="judul" class="form-control" placeholder="Tulis kegiatanmu di sini..." required>
            </div>
            <div class="col-md-4">
                <select name="kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="PribadiGwej">PribadiGwej</option>
                    <option value="TeamGwej">TeamGwej</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100 fw-semibold">Tambah</button>
            </div>
        </div>
    </form>

    @php
        $rencana = session('rencana', []);
        $pribadi = collect($rencana)->where('kategori', 'PribadiGwej');
        $team = collect($rencana)->where('kategori', 'TeamGwej');
    @endphp

    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0 p-3">
                <h5 class="fw-bold text-primary mb-3">👥 TeamGwej</h5>

                @if ($team->isEmpty())
                    <p class="text-muted">Belum ada tugas tim.</p>
                @else
                    @foreach ($team as $index => $item)
                        <div class="d-flex justify-content-between align-items-center mb-2 task-item p-2 rounded" style="background:#f8f9fa;">
                            <form action="{{ route('rencana.toggle', $index) }}" method="POST">
                                @csrf
                                <input type="checkbox" onchange="this.form.submit()" {{ $item['status'] == 'selesai' ? 'checked' : '' }}>
                                <span class="{{ $item['status'] == 'selesai' ? 'text-decoration-line-through text-muted' : '' }} ms-2">
                                    {{ $item['judul'] }}
                                </span>
                            </form>

                            
                            <button type="button" class="btn btn-sm text-danger fw-bold" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $index }}" style="border:none; background:transparent;">×</button>

                            
                            <div class="modal fade" id="hapusModal{{ $index }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $index }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title">Hapus Kegiatan?</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Apakah kamu yakin ingin menghapus kegiatan <strong>"{{ $item['judul'] }}"</strong>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <form action="{{ route('rencana.delete', $index) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0 p-3">
                <h5 class="fw-bold text-info mb-3">🧍‍♂️ PribadiGwej</h5>

                @if ($pribadi->isEmpty())
                    <p class="text-muted">Belum ada tugas pribadi.</p>
                @else
                    @foreach ($pribadi as $index => $item)
                        <div class="d-flex justify-content-between align-items-center mb-2 task-item p-2 rounded" style="background:#f8f9fa;">
                            <form action="{{ route('rencana.toggle', $index) }}" method="POST">
                                @csrf
                                <input type="checkbox" onchange="this.form.submit()" {{ $item['status'] == 'selesai' ? 'checked' : '' }}>
                                <span class="{{ $item['status'] == 'selesai' ? 'text-decoration-line-through text-muted' : '' }} ms-2">
                                    {{ $item['judul'] }}
                                </span>
                            </form>

                            
                            <button type="button" class="btn btn-sm text-danger fw-bold" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $loop->iteration }}_p" style="border:none; background:transparent;">×</button>

                            
                            <div class="modal fade" id="hapusModal{{ $loop->iteration }}_p" tabindex="-1" aria-labelledby="hapusModalLabel{{ $loop->iteration }}_p" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title">Hapus Kegiatan?</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Apakah kamu yakin ingin menghapus kegiatan <strong>"{{ $item['judul'] }}"</strong>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <form action="{{ route('rencana.delete', $index) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
