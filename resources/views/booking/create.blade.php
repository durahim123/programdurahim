@extends('layouts.default')
@section('title', __( 'Tambah Booking' ))
@section('content')
<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        @include('layouts.partials.notification')
                    </div>
                </div>
                <div class="card card-bordered card-preview" style="padding:30px;">
                    <div class="card-inner">
                        
                        <h4 class="title nk-block-title">Tambah Booking</h4>
                        <div class="preview-block">
                            <form method="POST" action="{{ URL::to('/do-add-booking') }}">
                                @csrf
                                <div class="row gy-4">
                                    @if(session('auth_user')['role'] == 'admin')
                                    @php $col = 6; @endphp
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Pasien</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" name="pasien_id" required>
                                                    <option value="" selected disabled>--  Pilih Pasien --</option>
                                                    @foreach($pasien as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->nama_pasien }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <input type="hidden" name="pasien_id" value="{{ session('auth_user')['pasien_id'] }}">
                                    @php $col = 12; @endphp
                                    @endif
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Tanggal Booking</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control" name="tgl_booking" placeholder="Input Harga" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Jam Booking</label>
                                            <div class="form-control-wrap">
                                                <input type="time" class="form-control" name="jam_booking" placeholder="Input Harga" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-{{ $col }}">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Dokter</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" name="dokter_id" id="dokter" data-dokter-ids="{{ $dokter->pluck('id')->implode(',') }}" required>
                                                    <option value="" selected disabled>--  Pilih Dokter --</option>
                                                    @foreach($dokter as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->nama_dokter }}</option>
                                                    @endforeach
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Metode Pembayaran</label>
                                            <div class="form-control-wrap">
                                                <select name="metode" id="" class="form-control">
                                                    <option value="" selected disabled>-- Pilih Metode Pembayaran --</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Transfer Bank">Transfer Bank</option>
                                                    <option value="QRIS">QRIS</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Layanan</label>
                                            <table class="table" id="dynamic_field">
                                                <tr>
                                                    <th>
                                                        <select class="form-control" name="layanan_id[]" required>
                                                            <option value="" selected disabled>--  Pilih Layanan --</option>
                                                            @foreach($layanan as $keys => $values)
                                                            <option value="{{ $values->id }}">{{ $values->layanan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </th>
                                                    <th>
                                                        <button type="button" class="btn btn-primary theme-button" onclick="moreLayanan()">Tambah Layanan</button>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 15px;">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function moreLayanan() {
        const table = document.getElementById("dynamic_field");

        // Cari tombol "Tambah Layanan" yang ada dan hapus dari baris sebelumnya
        const existingAddButtons = table.querySelectorAll(".theme-button[onclick='moreLayanan()']");
        if (existingAddButtons.length > 0) {
            existingAddButtons[existingAddButtons.length - 1].remove();
        }

        // Buat elemen <tr> baru untuk layanan tambahan
        const newRow = document.createElement("tr");

        // Kolom select untuk memilih layanan
        const layananCol = document.createElement("th");
        layananCol.innerHTML = `
            <select class="form-control" name="layanan_id[]" required>
                <option value="" selected disabled>-- Pilih Layanan --</option>
                @foreach($layanan as $keys => $values)
                <option value="{{ $values->id }}">{{ $values->layanan }}</option>
                @endforeach
            </select>
        `;
        newRow.appendChild(layananCol);

        // Kolom untuk tombol tambah dan hapus di baris terakhir
        const actionCol = document.createElement("th");
        actionCol.innerHTML = `
            <button type="button" class="theme-button btn btn-primary" onclick="moreLayanan()">Tambah Layanan</button>
            <button type="button" class="theme-button btn btn-danger btn_remove" onclick="removeLayanan(this)">Hapus</button>
        `;
        newRow.appendChild(actionCol);

        // Menambahkan gaya CSS langsung pada tombol
        const buttons = newRow.querySelectorAll(".theme-button");
        buttons.forEach(button => {
            button.style.display = "inline-block";  // Pastikan tombol tampil
            button.style.padding = "10px";
            button.style.backgroundColor = "#111111";
            button.style.color = "white";
            button.style.border = "none";
            button.style.borderRadius = "5px";
            button.style.cursor = "pointer";
            button.style.margin = "5px";
        });

        // Tambahkan baris baru ke dalam tabel
        table.appendChild(newRow);
    }

    function removeLayanan(button) {
        const row = button.closest("tr");
        row.remove();

        // Setelah menghapus, pastikan tombol "Tambah Layanan" tetap ada di baris terakhir
        const table = document.getElementById("dynamic_field");
        const rows = table.getElementsByTagName("tr");

        if (rows.length > 0) {
            const lastRow = rows[rows.length - 1];
            const lastCell = lastRow.getElementsByTagName("th")[1];

            // Cek apakah baris terakhir sudah memiliki tombol "Tambah Layanan"
            const existingAddButton = lastCell.querySelector(".theme-button[onclick='moreLayanan()']");
            if (!existingAddButton) {
                const addButton = document.createElement("button");
                addButton.type = "button";
                addButton.className = "theme-button btn btn-primary";
                addButton.onclick = moreLayanan;
                addButton.innerText = "Tambah Layanan";

                // Menambahkan gaya CSS langsung pada tombol "Tambah Layanan"
                addButton.style.display = "inline-block";
                addButton.style.padding = "10px";
                addButton.style.backgroundColor = "#111111";
                addButton.style.color = "white";
                addButton.style.border = "none";
                addButton.style.borderRadius = "5px";
                addButton.style.cursor = "pointer";
                addButton.style.margin = "5px";

                lastCell.prepend(addButton); // Tambahkan di sebelah tombol "Hapus"
            }
        }
    }

</script>
<script>
    document.getElementById('dokter').addEventListener('change', function() {
        // Periksa apakah "Lainnya" yang dipilih
        if (this.value === 'lainnya') {
            // Ambil daftar ID dokter dari atribut data
            const dokterIds = this.getAttribute('data-dokter-ids').split(',');
            
            // Pilih ID secara acak dari daftar dokter
            const randomId = dokterIds[Math.floor(Math.random() * dokterIds.length)];
            
            // Ubah nilai elemen select menjadi ID acak
            this.value = randomId;
        }
    });
</script>
@endsection