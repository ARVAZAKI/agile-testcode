<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Makanan Nusantara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="text-center mb-4">Makanan Indonesia</h1>
      @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmakanan">
        Tambah makanan
      </button>      
      <ul class="list-group mt-3">
        @if ($makanan->isEmpty())
          <li class="list-group-item text-center">
            Belum ada data makanan.
          </li>
        @else
          @foreach ($makanan as $m)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              {{ $m->nama_makanan }}
              <div>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detail-{{ $m->id }}">
                  Detail
                </button> 
                <a href="{{route('delete-makanan', $m->id)}}" class="btn btn-sm btn-danger">Hapus</a>
              </div>
            </li>
            <div class="modal fade" id="detail-{{ $m->id }}" tabindex="-1" aria-labelledby="detail-{{ $m->id }}-label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detail-{{ $m->id }}-label">Detail {{ $m->nama_makanan }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    @if($m->gambar)
                      <div class="text-center mb-3">
                        <img src="{{ asset('images/'.$m->gambar) }}" alt="{{ $m->nama_makanan }}" class="img-fluid" style="max-height: 200px;">
                      </div>
                    @endif
                    <h5>{{ $m->nama_makanan }}</h5>
                    <p>{{ $m->detail->detail }}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </ul>
    </div>

    <div class="modal fade" id="addmakanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan makanan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{route('create-makanan')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <label for="gambar">Foto makanan</label>
              <input type="file" class="form-control mt-1" name="gambar">
              <label for="nama_makanan">Nama makanan</label>
              <input type="text" class="form-control mt-1" placeholder="Nama makanan" id="nama_makanan" name="nama_makanan">
              <label for="detail">Detail</label>
              <textarea name="detail" class="form-control" cols="30" rows="10"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>