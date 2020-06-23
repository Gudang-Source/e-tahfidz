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

    <!-- ======= About Section ======= -->
   @include('part.part_welcome.about')
    <!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    @include('part.part_welcome.counts')
    <!-- End Counts Section --> 

    <!-- ======= Team Section ======= -->
      {{-- @include('part.part_welcome.team') --}}
    <!-- End Team Section -->

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
    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Tahifd Online</span></strong>. Mengajarkan Dengan Cinta 
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
           <a href="{{route('welcome')}}">Tahidz Online</a>
        </div>
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