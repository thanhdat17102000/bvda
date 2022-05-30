<!-- Vendor js -->
<script src=" {{ asset('admin/assets/js/vendor.min.js') }}"></script>

{{-- Another JS --}}
@stack('scripts')

<!-- App js -->
<script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
