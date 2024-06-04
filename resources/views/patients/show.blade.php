<div class="col-md-10 mt-3">
    <div class="card">
        <div class="card-header  d-flex align-items-center">
            {{ $patient->number ? $patient->number . ' - ' : '' }}{{ $patient->name }}
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col-md-3">
                    <label for="">{{ __('patients.full_name') }}:</label>
                    <p>{{ $patient->full_name }}</p>
                </div>
                <div class="col-md-2">
                    <label for="">{{ __('patients.dni') }}:</label>
                    <p>{{ $patient->dni }}</p>
                </div>
                <div class="col-md-2">
                    <label for="">{{ __('patients.birth_date') }}:</label>
                    <p>{{ $patient->birth_date->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4">
                    <label for="">{{ __('patients.address') }}:</label>
                    <p>{{ $patient->address }}</p>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-md-2 ">
                    <label for="">{{ __('patients.entry_date') }}:</label>
                    <p>{{ $patient->entry_date }}</p>
                </div>
                <div class="col-md-2 ">
                    <label for="">{{ __('patients.exit_date') }}:</label>
                    <p>{{ $patient->exit_date }}</p>
                </div>
                <div class="col-md-2">
                    <label for="">{{ __('patients.visit_code') }}:</label>
                    <p>{{ $patient->visit_code }}</p>
                </div>
                <div class="col-md-4">
                    <label for="">{{ __('patients.belongings') }}:</label>
                    <p>{{ $patient->belongings }}</p>
                </div>
                <div class="col-md-2">
                    <label for="">{{ __('patients.phone_number') }}:</label>
                    <p>{{ $patient->phone_number }}</p>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="">{{ __('patients.authorized_visitors') }}:</label>
                    <ul>
                        @forelse ($patient->visitors as $visitor)
                            <li>{{ $visitor->name }}</li>
                        @empty
                            <span class="visitors info-span">{{ __('patients.noAuthPersons') }}</span>
                        @endforelse
                    </ul>
                </div>
                <div class="col-md-6 ">
                    <label for="">{{ __('patients.abuse_substances') }}:</label>
                    <p>{{ $patient->abuse_substances }}</p>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-md-12 ">
                    <label for="">{{ __('patients.extra_info') }}:</label>
                    <p>{{ $patient->extra_info }}</p>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
