@if (session('alert'))
    @php
        $alertTypes = [
            'success' => 'alert-success',
            'error' => 'alert-danger',
            'warning' => 'alert-warning',
            'info' => 'alert-info',
        ];

        $alertType = session('alert_type', 'info');
        $alertClass = $alertTypes[$alertType] ?? 'alert-info';
    @endphp

    <div class="alert {{ $alertClass }} alert-dismissible fade show container mt-4" role="alert">
        {{ session('alert') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
