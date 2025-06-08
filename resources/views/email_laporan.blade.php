<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    
</head>
<body>
    <p>Berikut laporan data transaksi klinik marvel dental </p>  
    
    <table class="datatable-init table" id="myTable" border="1">
        <thead>
            <tr>
                <th style="width: 10px;">No</th>
                <th>Pasien</th>
                <th>Layanan</th>
                <th>Dokter</th>
                <th>Perawat</th>
                <th>Tangal Booking</th>
                <th>Jam Booking</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($booking AS $key => $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if(!empty($value->nama_pasien))
                        {{ $value->nama_pasien }}
                        @else 
                        {{ $value->pasien_id }}
                        @endif
                    </td>
                    <td>
                        @php
                            $layanan = $value->layananNya;
                            $jumlah = count($layanan);
                            $output = ''; // Inisialisasi variabel output

                            if ($jumlah > 1) {
                                $output = implode(', ', array_slice($layanan, 0, $jumlah - 1)) . ' dan ' . end($layanan);
                            } else {
                                $output = $layanan[0];
                            }
                        @endphp

                        {{ $output }}
                    </td>
                    <td>{{ $value->nama_dokter }}</td>
                    <td>{{ $value->nama_perawat }}</td>
                    <td>{{ tgl_indo($value->tgl_booking) }}</td>
                    <td>{{ $value->jam_booking }} WIB</td>
                    <td>{{ number_format($value->total_harga) }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
