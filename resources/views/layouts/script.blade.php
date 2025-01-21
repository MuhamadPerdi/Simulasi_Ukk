  <!-- bundle -->
  <script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/app.min.js')}}"></script>

  {{-- <!-- third party js -->
  <script src="{{asset('backend/assets/js/vendor/apexcharts.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
  <!-- third party js ends -->
 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

  <!-- Datatables js -->
  <script src="{{asset('backend/assets/js/vendor/dataTables.select.min.js')}}"></script>
<script src="{{asset('backend/assets/js/vendor/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('backend/assets/js/vendor/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>

<!-- Datatable Init js -->

  @stack('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    @stack('dom-scripts')
  });
</script>
 