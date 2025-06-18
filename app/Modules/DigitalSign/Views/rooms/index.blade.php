@extends('Base::layouts.base')

@section('title')
{{ $title }}
@endsection

@section('extra-css')
@if (isset($use_datatable) && $use_datatable)
    <link href="{{ asset('myunnes/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
@endif
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
        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        {!! $add_header_left !!}
                        @if ($use_filter && sizeof($form_filter) > 0)
                            {{ Form::model($filters, ['route' => $base_route.'.filter.read', 'class' => 'd-flex flex-wrap my-1 align-items-center'] ) }}
                                @foreach ($form_filter as $c => $f)
                                    <div class="col-auto">
                                        <label for="{{ $f[1][0] }}" class="me-2">{{ $f[1][0] }}</label>
                                        <div class="me-sm-3">
                                            @if (is_array($f[1][1]))
                                            {!! forward_static_call_array($f[1][1][0], $f[1][1][1]) !!}
                                            @else
                                            {!! $f[1][1] !!}
                                            @endif
                                            @if ($errors->has($c))
                                                <div class="invalid-feedback">{{ implode(' | ', $errors->get($c)) }}</div>
                                                <script>(function() { document.getElementById('{{ $c }}').classList.add('is-invalid')})();</script>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-1 mt-2 pt-1">
                                    {!! (new BApp)->btnSubmit('<span class="bi bi-search"></span>', 'info', '', '', false, false) !!}
                                </div>
                            {{ Form::close() }}
                        @endif
                    </div>
                    <div class="col-auto">
                        <div class="text-lg-end my-1">
                            {!! $add_header_right !!}
                            @if (config('myunnes.akses')['a_create'] == 1)
                                <a href="{{ route($base_route.'.create', $route_params) }}" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i> {{ __('Base::misc.add_txt').' '.$title }}</a>
                            @endif
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div>
        </div> <!-- end card -->
    </div> <!-- end col-->
</div>
<!-- end row-->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{ __('Base::misc.list_txt').' '.$title }} {!! $add_title !!}</h4>
                <p class="sub-header font-13 mb-0 pb-0">
                    {{ $subtitle }}
                </p>

                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0 {{ (isset($use_datatable) && $use_datatable ? 'datatable' : '') }}">
                        <thead  class="">
                            <tr>
                                @if($add_action && sizeof($add_action) > 0)
                                    <th width="15%">{{ __('Base::misc.extra_txt') }}</th>
                                @endif
                                @foreach ($table_columns as $tb_col)
                                    <th>{{ $tb_col }}</th>
                                @endforeach
                                <th width="16%">{{ __('Base::utils.str_action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (sizeof($data) > 0)
                                @foreach ($data as $r)
                                    <tr>
                                        @if ($add_action && sizeof($add_action) > 0)
                                            <td>
                                                @if (sizeof($add_action) == 1)
                                                {!! $app->customBtnAkses($add_action[0][0], [ $add_action[0][1][0] => $r->{$add_action[0][1][1]}], $add_action[0][2], 'btn-sm') !!}
                                                @else
                                                {!! $app->dropdownAkses($add_action, __('Base::misc.action_txt'), 'soft-info btn-sm', $r) !!}
                                                @endif
                                            </td>
                                        @endif
                                        @foreach ($table_columns as $db_col => $tb_col)
                                            <td>
                                                @if (in_array($db_col, $boolean_column))
                                                    {!! $help->strBoolean($r->{$db_col}, '', $boolean_key) !!}
                                                @elseif(in_array($db_col, $currency_column))
                                                    {!! $help->formatNumber($r->{$db_col}) !!}
                                                @elseif(in_array($db_col, $code_column))
                                                    <code>{{ $r->{$db_col} }}</code>
                                                @elseif(in_array($db_col, $date_column))
                                                    {{ $help->parseDate($r->{$db_col}) }}
                                                @elseif(in_array($db_col, $datetime_column))
                                                    {{ $help->parseDateTime($r->{$db_col}) }}
                                                @elseif($db_col == $queue_column)
                                                    {!! $help->processInfo($r->{$db_col}) !!}
                                                @elseif(str($db_col)->contains('.'))
                                                    @php $rels = explode('.',$db_col) @endphp
                                                    {{ $r->{$rels[0]}->{$rels[1]} }}
                                                @else
                                                    {{ $r->{$db_col} }}
                                                @endif
                                            </td>
                                        @endforeach
                                        <td>
                                            {!! $app->btnAkses($base_route, $r->{$model->getKeyName()}, (!$use_validate ? ['validate'] : []), 'btn-sm') !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="{{ (sizeof($table_columns) + ($add_action && sizeof($add_action) > 0 ? 2 : 1) ) }}" class="text-center"><i>{{ __('Base::utils.data_empty') }}</i></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-1">
                        <nav>
                            @if ($use_pagination)
                                {{ $data->links('Base::vendor.pagination.bootstrap-5') }}
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
@if (isset($use_datatable) && $use_datatable)
    <script src="{{ asset('myunnes/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('myunnes/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    {{-- <script src="{{ asset('myunnes/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script> --}}

    <script>
        $(".datatable").DataTable({
            language: {
                paginate: {
                    previous: "<i class='bi bi-chevron-double-left'>",
                    next: "<i class='bi bi-chevron-double-right'>"
                }
            },
            "aaSorting": []
        });
    </script>
@endif
@endsection
