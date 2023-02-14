<br>
<body style="font-family: sans-serif" onload="window.print()">    
<br>
    <center><b>TANDA BUKTI PENDAFTARAN</b></center>
    <center><b>SMK Blue Lock TP. 2023-2024</b></center>
    <br>
    <table width="50%" border="0" style="margin-left:3%;margin-right:2%;float:left">
        <tr>
            <td colspan="3" style="padding: 10px 0;"></td>
        </tr>
        <tr>
            <td colspan="3" style="background-color: lightgray"><b>I. BIODATA CALON PESERTA DIDIK</b></td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 8px 0;"></td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NOMOR SELEKSI</b></td>
            <td width="3%">:</td>
            <td>01</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NAMA LENGKAP</b></td>
            <td width="3%">:</td>
            <td>{{$validateData['name']}}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NISN</b></td>
            <td width="3%">:</td>
            <td>{{$validateData['nisn']}}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>ASAL SEKOLAH</b></td>
            <td width="3%">:</td>
            <td>{{$validateData['asal_sekolah']}}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NO HP</b></td>
            <td width="3%">:</td>
            <td>{{$validateData['phone_me']}}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>EMAIL</b></td>
            <td width="3%">:</td>
            <td>{{$validateData['email']}}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NO HP Ayah</b></td>
            <td width="3%">:</td>
            <td>{{$validateData['phone_dad']}}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NO HP Ibu</b></td>
            <td width="3%">:</td>
            <td>{{$validateData['phone_mom']}}</td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 10px 0;"></td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 8px 0;"></td>
        </tr>
        <tr>
            <td colspan="3"><b>A. Akun Anda</b></td>
        </tr>
        <tr>
            <td colspan="3">Username : {{$validateData['email']}}</td>
        </tr>
        <tr>
      
            <td colspan="3">Password : {{$password}}</td>
        </tr>
        <tr>
            <td colspan="3">Akun ini digunakan untuk mengecek status pendaftaran pada SMK Blue Lock.</td>
        </tr>
        <tr>
            <td colspan="3"><a href="{{route('login')}}">Silahkan Login</a></td>
        </tr>
    </table>
</body>