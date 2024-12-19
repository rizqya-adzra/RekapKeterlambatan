<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pernyataan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1,
        h2 {
            text-align: center;
            margin: 0;
            font-size: 20px;
            line-height: 1.5;
        }

        .content {
            margin-top: 20px;
            font-size: 14px;
        }

        .details {
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .details table {
            width: 100%;
            font-size: 14px;
        }

        .details td {
            padding: 4px 0;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .signature {
            width: 45%;
            text-align: center;
            font-size: 14px;
        }

        .signature p {
            margin: 0;
            line-height: 1.5;
        }

        .signature span {
            display: block;
            margin-top: 40px;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>SURAT PERNYATAAN</h1>
        <h2>TIDAK AKAN DATANG TERLAMBAT KE SEKOLAH</h2>
        <div class="content">
            <p>Yang bertanda tangan di bawah ini :</p>
            <div class="details">
                <table>
                    <tr>
                        <td>NIS</td>
                        <td>: {{ $lates->student->nis }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: {{ $lates->student->name }}</td>
                    </tr>
                    <tr>
                        <td>Rombel</td>
                        <td>: {{ $lates->student->rombel->rombel }}</td>
                    </tr>
                    <tr>
                        <td>Rayon</td>
                        <td>: {{ $lates->student->rayon->rayon }}</td>
                    </tr>
                </table>
            </div>
            <p>
                Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang
                ke sekolah sebanyak <b>{{ $lates->count('id') }} kali</b>
                yang mana hal tersebut termasuk ke dalam pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat
                datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah lagi saya siap diberikan sanksi yang
                sesuai dengan peraturan sekolah.
            </p>
            <p>
                Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.
            </p>
        </div>
        <div class="footer1">
            <div class="signature">
                <p>{{ \Carbon\Carbon::parse($lates->created_at)->translatedFormat('d F Y, H:i') }}</p>
                <p>&nbsp;</p>
                <p>Peserta Didik,</p>
                <p>&nbsp;</p>
                <span>( {{ $lates->student->name }} )</span>
            </div>
            <div class="signature">
                <p>&nbsp;</p>
                <p>Orang Tua/Wali Peserta Didik,</p>
                <p>&nbsp;</p>
                <span>(...........................)</span>
            </div>
        </div>
        <div class="footer2">
            <div class="signature">
                <p>&nbsp;</p>
                <p>Pembimbing Siswa,</p>
                <p>&nbsp;</p>
                <span>( {{ $lates->student->rayon->user->name }} )</span>
            </div>
            <div class="signature">
                <p>&nbsp;</p>
                <p>Kesiswaan,</p>
                <p>&nbsp;</p>
                <span>(...........................)</span>
            </div>
        </div>
    </div>
</body>

</html>
