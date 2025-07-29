<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- link css dan js bootstrap --}}
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  <style>
    .bg-hero {
      position: relative;
      height: 800px;
    }

    .bg-hero::before {
      content: "";
      background-image: url("{{ asset('images/home.png') }}");
      background-size: cover;
      background-position: center;
      position: absolute;
      inset: 0;
      z-index: 1;
    }
    .bg-hero .content {
      position: relative;
      z-index: 2;
    }
  </style>

  <title>Gudang13</title>
</head>
<body>

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid p-2">
      <a class="navbar-brand text-light" href="#">G13</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link text-light" href="#barang">Barang</a>
          <a class="nav-link text-light" href="#tentang">Tentang</a>
          <a class="nav-link text-light" href="#">List Pinjaman</a>
          <a class="nav-link text-light" href="">Akun</a>
        </div>
      </div>
    </div>
  </nav>

  {{-- Home --}}
  <div class="bg-hero d-flex justify-content-center align-items-center">
      <div class="content text-center">
        <h1 class="display-4 fw-bold">WELCOME G13</h1>
        <p class="lead">Gudang SMKN 13 Bandung</p>
      </div>
  </div>

  {{-- Tentang --}}
  <div class="container py-5" id="tentang">
    <h2 class="text-center mb-4">Tentang</h2>
    <div class="bg-success p-4 rounded shadow-sm text-light">
      <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
      </p>
      <br>
      <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
      </p>
    </div>
  </div>

  {{-- Produk --}}
  <div class="container py-5" id="barang">
  <h2 class="text-center mb-4">Daftar Barang</h2>
  <h3 class="mb-4">Status Gudang :
    <span id="status-badge" class="badge bg-{{ $statusGudang == 'buka' ? 'success' : 'danger' }}">
        {{ ucfirst($statusGudang) }}
    </span>
</h3>


<div class="container py-4">
    @if(isset($barang) && $barang->isEmpty())
        <div class="text-center py-5">
            <h4 class="text-muted">Tidak ada data barang</h4>
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($barang as $b)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        @if ($b->gambar_barang)
                            <img src="{{ asset('storage/public/' . $b->gambar_barang) }}" class="card-img-top" alt="{{ $b->nama_barang }}">
                        @else
                            <img src="https://placehold.co/400x300" class="card-img-top" alt="Placeholder">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $b->nama_barang }}</h5>
                            <p class="card-text">
                                Kategori: {{ $b->kategori->nama_kategori ?? 'Tidak diketahui' }}<br>
                                Stok: {{ $b->stok }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>


  {{-- Footer --}}
  <div class="bg-success text-light text-center py-4">
    <p>&copy; 2023 Gudang13. All rights reserved.</p>
    <p>SMKN 13 Bandung</p>
  </div>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    Pusher.logToConsole = true;

    const pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
        cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
    });

    const channel = pusher.subscribe('status-gudang');
    channel.bind('App\\Events\\GudangStatusUpdated', function(data) {
        const badge = document.getElementById('status-badge');
        badge.innerText = data.status.charAt(0).toUpperCase() + data.status.slice(1);
        badge.className = `badge bg-${data.status === 'buka' ? 'success' : 'danger'}`;
    });
</script>

</body>
</html>

