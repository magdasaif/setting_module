@extends('admin.layouts.app')

@section('page.title', 'تعديل اعدادات الموقع')
<link rel="stylesheet" href="{{ URL::asset('assets/fontawesome-icon-browser-picker/fontawesome-browser.css') }}">

@section('content')
    <div class="card">
        <header class="card-header">
            <p>
        <span class="icon is-small">
          <i class="fa fa-cogs"></i>
        </span>
                <span>اعدادات الموقع</span>
            </p>
        </header>

        {!! Form::model($setting,['method' => 'PATCH', 'files' => true, 'url' => route('settings.update', $setting->id)]) !!}
        @include('setting::settings._form')
        {!! Form::close() !!}
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="{{ URL::asset('assets/fontawesome-icon-browser-picker/fontawesome-browser.js') }}"></script>
<script>
  $(function($) {
    $.fabrowser();
});
</script>