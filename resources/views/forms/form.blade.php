<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BlueLock</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}"  type='image/x-icon'>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/forms.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- =======================================================
  * Template Name: Gp - v4.10.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
@include('sweetalert::alert')
<div class="wrapper">
    <div class="title">
      Registration Form
    </div>
    <form action="{{route('inputForm')}}" method="POST">
      @csrf
    <div class="form">
       <div class="inputfield">
          <label>Name</label>
          <input type="text" name="name" class="input">
       </div>  
        <div class="inputfield">
          <label>NISN</label>
          <input type="number" name="nisn" class="input">
       </div>  
       <div class="inputfield">
        <label>Jenis Kelamin</label>
        <div class="custom_select">
          <select name="jenis_kelamin">
            <option value="">Jenis Kelamin</option>
            <option value="laki-laki">Laki-Laki</option>
            <option value="perempuan">Perempuan</option>
          </select>
        </div>
     </div>  

        <div class="inputfield">
          <label>Asal Sekolah</label>
          <div class="custom_select">
            <select name="asal_sekolah" id="sekolah" onchange="tampilLainnya()">
              <option value="">Select</option>
              <option value="Smp_Kesana">SMP Kesana</option>
              <option value="Smp_Kesini">SMP Kesini</option>
              <option value="Smp_Cigombong">SMP Cigombong</option>
              <option value="Smp_1">SMP 1</option>
              <option value="Smp_2">SMP 2</option>
              <option value="Smp_3">SMP 3</option>
              <option value="another">Lainnya</option>
            </select>
          </div>

       </div>    
       <div class="inputfield"id="sekolahlainnya"style="display: none">
            <label>Asal Sekolah Lain</label>
            <input type="text" name="asal_sekolah_lain"  class="input" >
         </div>  
         <script>
          function tampilLainnya() {
              var sekolah = document.getElementById("sekolah").value;
              var sekolahLainnya = document.getElementById("sekolahlainnya");
              if (sekolah == "another") {
                  sekolahLainnya.style.display = "";
              }else {
                  sekolahLainnya.style.display = "none";
              }
          }
      </script>
        <div class="inputfield">
          <label>Email Address</label>
          <input type="text" name="email" class="input">
       </div> 
      <div class="inputfield">
          <label>Phone Number</label>
          <input type="text" name="phone_me"  class="input">
       </div> 
       <div class="inputfield">
        <label>Phone Dad</label>
        <input type="text" name="phone_dad" class="input">
     </div> 
     <div class="inputfield">
      <label>Phone Mom</label>
      <input type="text" name="phone_mom" class="input">
   </div> 
      <div class="inputfield">
        <input style="border-radius: 12px" type="submit" value="Register" class="btn">
      </div>
    </form>
    </div>
</div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>