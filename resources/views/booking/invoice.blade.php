<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
            padding: 5px;
		}
        p {
            font-size: 9pt;
        }
        label {
            font-size: 9pt;
        }
        .box {
            border:1px solid black;
            padding: 20px;
        }
        input[type=checkbox] { display: inline; }
	</style>
    <center style="margin-top: -20px;">
        <h4>Invoice</h4>
    </center>
    <div class="box">
        <center>
            <p><u>Data Pasien</u></p>
        </center>
        <div style="border:1px solid black; padding: 10px;">
            <table class='table table-bordered'>
                <tr>
                    <td>Nama Pasien</td>
                    <td>:</td>
                    <td >{{ $pasien->nama_pasien }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ tgl_indo($pasien->tgl_lahir) }}</td>
                    <td style="padding-left: 250px;">Umur</td>
                    <td>:</td>
                    <td>
                        <span >{{ $pasien->umur }}</span> Tahun &nbsp;&nbsp;&nbsp;&nbsp;
                        <span style="border:solid 1px black;padding: 5px;">{{ $pasien->jk }}</span> (L / P)
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td >{{ $pasien->email }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <table class="table">
                
                <tr>
                    <td>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>:</td>
                    <td >{{ $pasien->alamat }}</td>
                </tr>
            </table>
        </div>
        <div style="padding: 10px;">
            <center>
                <p><u>Layanan</u></p>
            </center>
            <table class="table" style="border-spacing: 5px;width: 100%;" border="1" >
                <tr>
                    <th>Dokter</th>
                    <th>Layanan</th>
                    <th>Harga</th>
                </tr>
                @foreach($data as $key => $value)
                <tr>
                    <td>{{ $value->nama_dokter }}</td>
                    <td>
                        @foreach ($value->layananNya as $val)
                        {{ $val['layanan'] }} <br>
                        @endforeach
                    </td>
                    <td>
                    @foreach ($value->layananNya as $val)
                        Rp {{ number_format($val['harga']) }} <br>
                        @endforeach
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="2">Total Harga</th>
                    <td>Rp {{ number_format($booking->total_harga) }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>