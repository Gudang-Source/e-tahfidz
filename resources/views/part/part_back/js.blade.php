<!-- Javascript -->
<script src="/assets_back/vendor/jquery/jquery.min.js"></script>
<script src="/assets_back/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets_back/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/assets_back/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="/assets_back/vendor/chartist/js/chartist.min.js"></script>
<script src="/assets_back/scripts/klorofil-common.js"></script>
<script src="/assets_back/select2.min.js"></script>
<script>
   $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
<script>
   let grds = document.querySelectorAll('.btn-grad');
   grds.forEach(grd => {
      grd.addEventListener('click', function() {
         grd.style.color="white";
      })
   });
</script>
<script>
   let inps = document.querySelectorAll('.form-control');
   inps.forEach(inp => {
      inp.autocomplete="off";
   });
</script>