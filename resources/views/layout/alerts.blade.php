<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    @if (session()->has('s_alert_success'))
    Swal.fire(
        'Success',
        '{{ session()->get('s_alert_success') }}',
        'success'
    );
    @php session()->forget('s_alert_success'); @endphp
    @php session()->remove('s_alert_success'); @endphp
    @endif


    @if (session()->has('s_alert_error'))
    Swal.fire(
        'Error',
        '{{ session()->get('s_alert_error') }}',
        'error'
    );
    @php session()->forget('s_alert_error'); @endphp
    @php session()->remove('s_alert_error'); @endphp
    @endif
</script>
