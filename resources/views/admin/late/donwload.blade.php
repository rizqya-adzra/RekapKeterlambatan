<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pernyataan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            margin: 0;
        }

        h2 {
            margin-bottom: 20px;
        }

        .details table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        .details td {
            padding: 5px 10px;
        }

        .content p {
            text-align: justify;
        }

        .footer-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .footer-table td {
            text-align: center;
            padding: 50px;
            vertical-align: top;
        }

        .signature span {
            display: inline-block;
            margin-top: 50px;
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
                        <td><strong>NIS</strong></td>
                        <td>: {{ $lates->student->nis }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td>: {{ $lates->student->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Rombel</strong></td>
                        <td>: {{ $lates->student->rombel->rombel }}</td>
                    </tr>
                    <tr>
                        <td><strong>Rayon</strong></td>
                        <td>: {{ $lates->student->rayon->rayon }}</td>
                    </tr>
                </table>
            </div>
            <p>
                Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang
                ke sekolah sebanyak <b>{{ $lates->where('student_id', $lates->student->id)->count() }} kali</b>,
                yang mana hal tersebut termasuk ke dalam pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat
                datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah lagi, saya siap diberikan sanksi yang
                sesuai dengan peraturan sekolah.
            </p>
            <p>
                Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.
            </p>
        </div>
        <p>{{ \Carbon\Carbon::parse($lates->created_at)->translatedFormat('d F Y') }}</p>
        <table class="footer-table">
            <tr>
                <td class="signature">
                    <p>Peserta Didik</p>
                    <span>({{ $lates->student->name }})</span>
                </td>
                <td class="signature">
                    <p>Pembimbing Siswa</p>
                    <span>({{ $lates->student->rayon->user->name }})</span>
                </td>
            </tr>
            <tr>
                <td class="signature">
                    <p>Orang Tua/Wali Peserta Didik</p>
                    <span>...........................</span>
                </td>
                <td class="signature">
                    <p>Kesiswaan</p>
                    <span>...........................</span>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
