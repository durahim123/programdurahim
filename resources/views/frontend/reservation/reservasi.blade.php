@extends('frontend.layouts.default')
@section('title', __( 'Reservasi' ))
@section('content')

<section class="page-title" style="background-image: url({{ asset('medicoz') }}/images/background/8.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1>Reservasi</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Reservasi</li>
            </ul> 
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Contact Section -->
<section class="contact-section" id="contact">
    <div class="small-container">
        <div class="sec-title text-center">
            <h2>Rerervasi Sekarang !</h2>
            @include('layouts.partials.notification')
        </div>

        <!-- Form box -->
        <div class="form-box">
            <div class="contact-form">
            <form id="contact-form" action="{{ URL::to('/do-add-data-reservasi') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Pasien</label>
                            <div class="form-control-wrap">
                                
                                <input type="text" name="pasien_id" value="" placeholder="Input Nama Pasien">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Tanggal Reservasi</label>
                            <div class="form-control-wrap">
                                <input type="date" class="form-control" name="tgl_booking" placeholder="" id="tgl_booking" min="<?= date('Y-m-d') ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Jam Reservasi</label>
                            <div class="form-control-wrap">
                                <input type="time" class="form-control" name="jam_booking" placeholder="Input Harga" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Dokter</label>
                            <div class="form-control-wrap">
                                <select class="form-control" name="dokter_id" id="dokter" data-dokter-ids="{{ $dokter->pluck('id')->implode(',') }}" required>
                                    <option value="" selected disabled>--  Pilih Dokter --</option>
                                    
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
                    <div class="col-sm-12" id="jadwalTersedia">
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Jam</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
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
                                        <button type="button" class="theme-btn btn-style-one" onclick="moreLayanan()">Tambah Layanan</button>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" id="submit" class="theme-btn btn-style-one"> Kirim Reservasi</button>
                        {{-- <a href="https://wa.me/628561068669" class="theme-btn btn-style-one" target="_blank">Chat Admin</a> --}}
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>
<!--End Contact Section -->
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
            <button type="button" class="theme-button" onclick="moreLayanan()">Tambah Layanan</button>
            <button type="button" class="theme-button btn_remove" onclick="removeLayanan(this)">Hapus</button>
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
                addButton.className = "theme-button";
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tanggalInput = document.getElementById('tgl_booking');
        const dokterDropdown = document.getElementById('dokter');
        const jadwalTersedia = document.querySelector('#jadwalTersedia tbody');

        tanggalInput.addEventListener('change', function () {
            const selectedDate = this.value;

            if (selectedDate) {
                // Clear existing options in the dropdown
                dokterDropdown.innerHTML = '<option value="" selected disabled>-- Pilih Dokter --</option>';

                // AJAX request
                fetch('{{ route("get.dokter") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ tgl_booking: selectedDate })
                })
                .then(response => response.json())
                .then(data => {
                    // Populate the dropdown with new options
                    if (data.length > 0) {
                        data.forEach(dokter => {
                            const option = document.createElement('option');
                            option.value = dokter.id;
                            option.textContent = dokter.nama_dokter;
                            dokterDropdown.appendChild(option);
                        });
                    } else {
                        const option = document.createElement('option');
                        option.value = "";
                        option.disabled = true;
                        option.textContent = "Tidak ada dokter tersedia";
                        dokterDropdown.appendChild(option);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
        dokterDropdown.addEventListener('change', function () {
            const selectedDoctor = this.value;
            const selectedDate = tanggalInput.value;

            if (selectedDoctor && selectedDate) {
                fetch('{{ URL::to("get-jadwal-dokter") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ tgl_booking: selectedDate, dokter_id: selectedDoctor })
                })
                .then(response => response.json())
                .then(jadwal => {
                    jadwalTersedia.innerHTML = '';

                    if (jadwal.length > 0) {
                        jadwal.forEach(item => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${item.jam_booking}</td>
                                <td>${item.status == 0 || item.status == 1 ? '<span style="color: red;">Booked</span>' : '<span style="color: green;">Available</span>'}</td>
                            `;
                            jadwalTersedia.appendChild(row);
                        });
                    } else {
                        jadwalTersedia.innerHTML = '<tr><td colspan="2" class="text-center">Jadwal Masih Kosong</td></tr>';
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
</script>
@endsection