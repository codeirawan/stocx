@extends('layouts.app')

@section('title')
    {{ __('Request') }} {{ __('Time off') }} | {{ config('app.name') }}
@endsection

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span><a href="{{ route('unpaid-leave.index') }}"
        class="kt-subheader__breadcrumbs-link">{{ __('Time off') }}</a>
    <span class="kt-subheader__breadcrumbs-separator"></span><a href="{{ route('unpaid-leave.create') }}"
        class="kt-subheader__breadcrumbs-link">{{ __('Request') }} {{ __('Time off') }}</a>
@endsection

@section('content')
    <form class="kt-form" id="kt_form_1" action="{{ route('unpaid-leave.store') }}" method="POST">
        @csrf

        <div class="kt-portlet" id="kt_page_portlet">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">{{ __('Request') }} {{ __('Time off') }}</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ route('unpaid-leave.index') }}" class="btn btn-secondary kt-margin-r-10">
                        <i class="la la-arrow-left"></i>
                        <span class="kt-hidden-mobile">{{ __('Back') }}</span>
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check"></i>
                        <span class="kt-hidden-mobile">{{ __('Save') }}</span>
                    </button>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                    <div class="kt-section__body">
                        @include('layouts.inc.alert')
                        <input type="hidden" name="by" id="by" value="{{ auth()->user()->id }}">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="request_name">{{ __('Request Name') }}</label>
                                <input id="request_name" name="request_name" type="text"
                                    class="form-control @error('request_name') is-invalid @enderror" required
                                    value="{{ old('request_name', auth()->user()->name) }}" readonly>

                                @error('request_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="date_range">Date Range</label>
                                <div class="input-group" id='kt_daterangepicker_3'>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="date_range" id="date_range"
                                        placeholder="{{ __('Choose') }} {{ __('Start Date') }} & {{ __('End Date') }}"
                                        required readonly>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="note">{{ __('Note') }}</label>
                                <textarea id="note" name="note" class="form-control @error('note') is-invalid @enderror">{{ old('note') }}</textarea>

                                @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ asset(mix('js/form/validation.js')) }}"></script>
    <script>
        $('#kt_daterangepicker_3').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            minDate: moment().startOf('day'),
        }, function(start, end, label) {
            $('#kt_daterangepicker_3 .form-control').val(start.format('DD/MM/YYYY') + ' - ' + end.format(
                'DD/MM/YYYY'));
        });
    </script>
@endsection
