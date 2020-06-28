<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> Tahfidz Online</title> 
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  @include('part.part_welcome.css')
  
</head>

<body>

  <!-- ======= Header ======= -->
  @include('part.part_welcome.header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @include('part.part_welcome.hero')
  <!-- End Hero -->
  <main id="main">

    <!-- ======== Information Section-->
    @include('part.part_welcome.information')
    <!-- ======== Information Section-->
    <div class="row" style="width: 100%;">
      {{-- <div class="col-md-1"></div> --}}
      <div class="col-md-7">
        @include('part.part_welcome.about')
      </div>
      <div class="col-md-5">
      @include('part.part_welcome.portfolio')
      </div>
    </div>

    <!-- ======= Counts Section ======= -->
    @include('part.part_welcome.counts')
    <!-- End Counts Section --> 

     

    <!-- ======= Frequently Asked Questions Section ======= -->
    @include('part.part_welcome.faq')
    <!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->
  @if ($fiturIklan[0]['status'] == 'checked')
  @include('part.part_welcome.iklan')
  @else
  
  @endif
   <!-- ======= Footer ======= -->
   <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <p>
          Sistem Ini Dikembangkan Bersama DEYAGISIT Dan Bersifat GRATIS. <br>
          Untuk Donasi Silahkan Transfer Ke Rekening Kami MANDIRI 
          <a href="#" style="text-decoration: none">1110011151491</a> a.n. Rahmad Perkasa <br>
          Jika Anda Ingin Memakai Sistem Ini Silahkan Hubungi TIM DEYAGISIT
        </p>
      </div>
    </div>
    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>E-Tahfidz</span></strong>. Belajar Dengan Gembira
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
          {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  @include('part.part_welcome.js')
  <script>
    $('#exampleModal').modal('show');
  </script>
</body>

</html>