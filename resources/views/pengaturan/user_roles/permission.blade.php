@extends('layouts.main')
@section('content')
    <div class="portlet">
        <div class="portlet-body">
            @include('layouts/partials/message')
            {!! Form::model($model, ['method' => 'PUT', 'route' => ['pengaturan.user-roles.permission.save', ['id' => $role->id]]]) !!}
                <table class="table table-consoned table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>Hak Akses: {{ $role->role }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $application_id => $application)
                            <tr>
                                <td colspan="2">
                                    {!! Form::checkbox('applications[]', 1, false, ['data-application_id' => $application_id, 'onclick' => 'check_application(\''.$application_id.'\')']) !!}
                                    <b>{{ $application['application'] }}</b>
                                </td>
                            </tr>
                            @foreach ($application['modules'] as $module_id => $module)
                                <tr>
                                    <td colspan="2" style="padding-left: 30px;">
                                        {!! Form::checkbox('modules[]', 1, false, ['data-application_id' => $application_id, 'data-module_id' => $module_id, 'onclick' => 'check_module(\''.$application_id.'\', \''.$module_id.'\')']) !!}
                                        <b>{{ $module['module'] }}</b>
                                    </td>
                                </tr>
                                @foreach ($module['features'] as $feature_id => $feature)
                                    <tr>
                                        <td style="padding-left: 60px;">
                                            {!! Form::checkbox('permissions['.$application['application_id'].']['.$feature['module_feature_id'].']', 1, isset($model['permissions'][$application['application_id']][$feature['module_feature_id']]) ? true: false, ['data-application_id' => $application_id, 'data-module_id' => $module_id, 'onclick' => 'check_parent()']) !!}
                                            {{ $feature['feature']}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a href="{{ route('pengaturan.user-roles') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function() {
            check_parent();
        });

        function check_parent() {
            $.each($('[name="applications[]"]'), function(key, elem) {
                var application_id = $(elem).data('application_id');
                if ($('[name*="permissions"][data-application_id="'+application_id+'"]:checked').length > 0) {
                    $(elem).prop('checked', true);
                } else {
                    $(elem).prop('checked', false);
                }
            });

            $.each($('[name="modules[]"]'), function(key, elem) {
                var application_id = $(elem).data('application_id');
                var module_id = $(elem).data('module_id');
                if ($('[name*="permissions"][data-application_id="'+application_id+'"][data-module_id="'+module_id+'"]:checked').length > 0) {
                    $(elem).prop('checked', true);
                } else {
                    $(elem).prop('checked', false);
                }
            });
        }

        function check_application(application_id) {
            $('[data-application_id="'+application_id+'"]').prop('checked', $('[name="applications[]"][data-application_id="'+application_id+'"]').prop('checked'));
        }

        function check_module(application_id, module_id) {
            $('[data-application_id="'+application_id+'"][data-module_id="'+module_id+'"]').prop('checked', $('[name="modules[]"][data-application_id="'+application_id+'"][data-module_id="'+module_id+'"]').prop('checked'));
        }
    </script>
@endpush
