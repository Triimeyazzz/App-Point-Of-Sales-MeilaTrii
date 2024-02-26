<footer class="main-footer navbar-pink navbar-light">
    <strong>Copyright © {{ now()->year }} All rights reserved</strong>
    <div class="float-right d-none d-sm-inline-block">
        <b>{{ $pengaturan->where('key', 'nama_perusahaan')->first()->value }} v1.0</b>
    </div>
</footer>
