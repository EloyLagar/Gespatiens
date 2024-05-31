<div class="container col-md-6 mt-3">
    <div class="card">
        <div class="card-header">
            {{ $employee->name }}
        </div>
        <div class="card-body">
            <label for="">{{ __('user.name') }}:</label>
            <p>{{ $employee->name }}</p>
            <label for="">{{ __('user.email') }}:</label>
            <p>{{ $employee->email }}</p>
            <label for="">{{ __('user.phone') }}:</label>
            <p>{{ $employee->phone_number }}</p>
            <label for="">{{ __('user.speciality.label') }}:</label>
            <p>{{ $employee->speciality }}</p>
            <label for="">{{ __('user.signature') }}:</label>
            <div class="signature-img d-flex justify-content-center align-items-center">
                <img src="{{ asset('/storage/signatures/' . $employee->signature) }}" alt="{{ __('user.signature') }}">
            </div>
        </div>
    </div>
</div>
