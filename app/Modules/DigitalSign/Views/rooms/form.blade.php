@extends('Base::layouts.base')

@section('title')
{{ $title }}
@endsection

@section('pre-css')
<link href="{{ asset('myunnes/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('myunnes/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header-title')
{{ $title }}
@endsection

@section('header-desc')
{!! $subtitle !!}
@endsection

@section('content-header-right')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $nmB => $url)
        <li class="breadcrumb-item"><a href="{{ $url }}">{{ $nmB }}</a></li>
        @endforeach
        <li class="breadcrumb-item"><a href="{{ route($base_route.'.read', $route_params) }}">{{ $title }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form {{ $title }}</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <span class="pull-right">
                        <a href="{{ route($base_route.'.read', $route_params) }}" class="btn btn-soft-secondary me-1 mb-1"><i class="bi bi-arrow-left-circle-fill"></i> {{ __('Base::misc.back_txt') }}</a>
                    </span>
                </div>

                <h3 class="mb-3 text-center">Form {{ $title }} {!! $add_title !!}</h3>
                {{ Form::model($data, ['route' => $form_route, 'class' => 'form-horizontal mt-3', 'enctype' => 'multipart/form-data'] ) }}
                    {{ Form::hidden($model->getKeyName(), null) }}
                    @foreach ($form as $c => $f)
                        <div class="row mb-3">
                            <label for="{{ $c }}" class="col-5 col-xl-4 col-form-label text-end">
                                {!! $f[0] !!}
                                @if (isset($model::validation_data()[$c]) && str_contains($model::validation_data()[$c], 'required') && @$f[1][0][1] != 'hidden' )
                                    <span class="text-danger">*</span>
                                @endif
                            </label>
                            <div class="col-5 col-xl-6">
                                <div class="form-group">
                                    @if (is_array($f[1]))
                                    {!! forward_static_call_array($f[1][0], $f[1][1]) !!}
                                    @else
                                    {!! $f[1] !!}
                                    @endif
                                    @if ($errors->has($c))
                                        <div class="invalid-feedback">{{ implode(' | ', $errors->get($c)) }}</div>
                                        <script>(function() { document.getElementById('{{ $c }}').classList.add('is-invalid')})();</script>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-5 col-xl-4 col-form-label"></div>
                        <div class="col-5 col-xl-6">
                            {!! (new BApp)->btnSubmit(__('Base::misc.save_txt')) !!}
                            <a href="{{ route($base_route.'.read', $route_params) }}" class="btn btn-soft-secondary me-1 mb-1">{{ __('Base::misc.cancel_txt') }}</a>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@include('Base::layouts.components.nominal')
@endsection
@section('extra-js')
<script src="{{ asset('myunnes/libs/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('myunnes/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('myunnes/libs/flatpickr/flatpickr.min.js') }}"></script>
<script>
    // picker
    $(document).ready(function () {
        $('.select2').select2();
        $('.datepicker').flatpickr();
        $('.datetimepicker').flatpickr({
            enableTime: !0,
            dateFormat: "Y-m-d H:i"
        });
        $('.select2-tree').select2({
            templateResult: function(data) {
                // We only really care if there is an element to pull classes from
                if (!data.element) {
                    return data.text;
                }
                var $element = $(data.element);
                var $wrapper = $('<span></span>');
                $wrapper.addClass($element[0].className);
                $wrapper.text(data.text);
                return $wrapper;
            }
        });
        $('form').find('input[type=text],textarea').filter(':visible:first').focus();
    });
    $(document).on('select2:open', function(e) {
        window.setTimeout(function () {
            document.querySelector('input.select2-search__field').focus();
        }, 0);
    });
</script>
@endsection
