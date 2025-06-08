<!DOCTYPE html>
<html>
<head>
	<title>Surat Rujukan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
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
        <h4>Rujukan Puskesmas / Dokter Keluarga</h4>
    </center>
    <div class="box">
        <center>
            <p><u>Surat Rujukan Peserta</u></p>
        </center>
        <div style="border:1px solid black; padding: 10px;">
            <table class='table table-bordered'>
                <tr>
                    <td>No Rujukan</td>
                    <td>:</td>
                    <td >{{ $suratRujukan->nomor_rujukan }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Puskesmas/Dokter Keluarga</td>
                    <td>:</td>
                    <td>{{ $suratRujukan->puskesmas }}</td>
                    <td style="padding-left: 300px;">Kode</td>
                    <td>:</td>
                    <td>{{ $suratRujukan->kode1 }}</td>
                </tr>
                <tr>
                    <td>Kabupaten/Kota</td>
                    <td>:</td>
                    <td>{{ $suratRujukan->kab_kot }}</td>
                    <td style="padding-left: 300px;">Kode</td>
                    <td>:</td>
                    <td>{{ $suratRujukan->kode2 }}</td>
                </tr>
            </table>
            
        </div>
        <div style="padding: 10px;">
            <table>
                <tr>
                    <td>Kepada Yth. TS dr.Poli</td>
                    <td>:</td>
                    <td>{{ $suratRujukan->poli }}</td>
                    <td style="padding-left: 100px;">Umur</td>
                    <td>:</td>
                    <td>{{ $suratRujukan->umur }} Tahun</td>
                </tr>
                <tr>
                    <td>Di RSUP</td>
                    <td>:</td>
                    <td>{{ $suratRujukan->rs_rujukan }}</td>
                    <td style="padding-left: 100px;">Status</td>
                    <td>:</td>
                    <td>
                        <span style="border:solid 1px black;padding: 5px;">{{ $suratRujukan->status }}</span> Utama/Tanggungan &nbsp;&nbsp;&nbsp;&nbsp;
                        <span style="border:solid 1px black;padding: 5px;">{{ $suratRujukan->jenis_kelamin }}</span> (L / P)
                    </td>
                </tr>
            </table>
            <p>Mohon pemeriksaan dan penanganan lebih lanjut penderita :</p>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $suratRujukan->nama_pasien }}</td>
                </tr>
                <tr>
                    <td>No. Kartu BPJS</td>
                    <td>:</td>
                    <td>{{ $suratRujukan->no_bpjs }}</td>
                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>:</td>
                    <td>{{ $suratRujukan->diagnosa1 }}</td>
                </tr>
                <tr>
                    <td>Telah diberikan </td>
                    <td>:</td>
                    <td>{{ $suratRujukan->penanganan1 }}</td>
                </tr>
            </table>
            <p>Demikian atas bantuannya, diucapkan banyak terimakasih</p>
            <table>
                @php
                $old_date = $suratRujukan->created_at;
                $old_date_timestamp = strtotime($old_date);
                $new_date = date('Y-m-d', $old_date_timestamp); 
                @endphp
                <tr>
                    <td style="padding-left: 450px;">Salam Sejawat, {{ tgl_indo($new_date) }}</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left: 475px;">{{ $suratRujukan->nama_dokter }}</td>
                </tr>
                
            </table>
        </div>
    </div>
    @if(!empty($suratRujukanBalik))
	<div class="box">
        <center>
            <p><u>Surat Rujukan Balik</u></p>
        </center>
        <div style="padding: 10px;">
            <p>Teman sejawat Yth. <br> Mohon kontrol selanjutnya penderita : </p>
            <table class='table table-bordered' style="padding-left:50px;">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td >{{ $suratRujukan->nama_pasien }}</td>
                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>:</td>
                    <td>{{ $suratRujukanBalik->diagnosa2 }}</td>
                </tr>
                <tr>
                    <td>Terapi</td>
                    <td>:</td>
                    <td>{{ $suratRujukanBalik->terapi }}</td>
                </tr>
            </table>
            <p>Tindak lanjut yang dianjurkan</p>
            <table>
                <tr>
                    <td>
                        @if(!empty($suratRujukanBalik->pengobatan))
                        <input type="checkbox" name="" checked>
                        @else
                            <input type="checkbox" name="">
                        @endif
                        <label>Pengobatan dengan obat-obatan :</label>
                    </td>
                </tr>
                <tr>
                    <td><span style="padding-left:20px;">{{ $suratRujukanBalik->pengobatan }}</span></td>
                </tr>
                <tr>
                    <td>
                        @if(!empty($suratRujukanBalik->tanggal2))
                        <input type="checkbox" name="" checked>
                        @else
                            <input type="checkbox" name="">
                        @endif
                        Kontrol Kembali ke RS tanggal : 
                        {{ tgl_indo($suratRujukanBalik->tanggal2) }}

                    </td>
                </tr>
                <tr>
                    <td>
                        @if($suratRujukanBalik->rawat_inap == 1)
                        <input type="checkbox" name="" checked>
                            <label>Perlu Rawat Inap</label>
                        @else
                            <input type="checkbox" name="" checked>
                            <label>Boleh Pulang</label>
                        @endif
                    </td>
                </tr>
            </table>


            <table>
                @php
                $old_date = $suratRujukanBalik->created_at;
                $old_date_timestamp = strtotime($old_date);
                $new_date = date('Y-m-d', $old_date_timestamp); 
                @endphp
                <tr>
                    <td style="padding-left: 450px;">Makasar, tgl {{ tgl_indo($new_date) }}</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left: 475px;">{{ $suratRujukan->nama_dokter }}</td>
                </tr>
                
            </table>
        </div>
    </div>
    @endif
</body>
</html>