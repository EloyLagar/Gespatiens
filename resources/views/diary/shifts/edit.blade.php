@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="wrapper  d-flex flex-column">
        <div class="container-fluid  pt-3">
            <a href="{{ route('diary.showPage', $shift->date) }}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            {{ __('crud.edit') }} {{ __('diary.shift') }}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('shifts.update', $shift) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="interesting-info">{{ __('diary.interesting_info') }}:</label>
                                    <textarea type="text" class="form-control intervention-text" name="interesting_info">{{ $shift->interesting_info ?? '' }}</textarea>
                                </div>
                                <div class="form-group multiselect-group">
                                    <label for="">{{ __('crud.select') }} {{ __('diary.educators') }}:</label>
                                    <button type="button" class="btn d-flex align-items-center" data-toggle="modal"
                                        data-target="#addEducatorsModal">
                                        <i class='bx bxs-user-plus mr-1'></i>
                                        {{ __('crud.add') }}
                                    </button>
                                    <ul id="selectedEducatorsList" class="list-group mt-3">

                                    </ul>
                                </div>
                                <button type="submit" class="btn mt-2 float-right">{{ __('crud.edit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="addEducatorsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('crud.select') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select id="selectedEducator" class="form-control">
                        @forelse($educators as $educator)
                            <option value="{{ $educator->id }}">{{ $educator->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn" onclick="addEducator()">Añadir</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addEducator() {
            var select = document.getElementById('selectedEducator');
            var selectedItem = select.options[select.selectedIndex];
            var list = document.getElementById('selectedEducatorsList');

            var listItem = document.createElement('li');
            listItem.className = 'list-group-item';
            listItem.textContent = selectedItem.text;

            var removeButton = document.createElement('button');
            removeButton.className = 'btn btn-danger btn-sm float-right';
            removeButton.textContent = 'Quitar';
            removeButton.onclick = function() {
                listItem.remove();
            };
            listItem.appendChild(removeButton);

            list.appendChild(listItem);

            var hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'educators[]';
            hiddenInput.value = selectedItem.value;
            listItem.appendChild(hiddenInput);

            list.appendChild(listItem);

            $('#addEducatorsModal').modal('hide');

            $('#addEducatorsModal').modal('hide');
        }
    </script>
@endsection
