<!DOCTYPE html>
<html lang="ar">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="locale" content="{{ config('app.locale') }}">
  <title>تم | @yield('page.title')</title>
  <link href="/admin/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="wrapper" id="app">
    <div class="pageloader is-active"><span class="title">Tam</span></div>
    @include('admin.partials.alerts')
    @include('admin.includes.header')
    <main class="main-content">
      <div class="columns is-gapless">
        <div class="column is-2" id="aside-container">
            @if(auth()->check() && auth()->user()->type == 'admin')
                @include('admin.includes.aside')
            @elseif(auth()->check() && auth()->user()->type == 'entry')
                @include('admin.includes.data_entry')
            @elseif(auth()->check() && auth()->user()->type == 'clients_supervisor')
                @include('admin.includes.clients_supervisor')
            @elseif(auth()->check() && auth()->user()->type == 'merchants_supervisor')
                @include('admin.includes.merchants_supervisor')
            @elseif(auth()->check() && auth()->user()->type == 'merchant')
                @include('admin.includes.merchant')
            @endif
        </div>
        <div class="column is-10" id="main-container">
          <div class="page-container">
            <div class="page-header">
              <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                  @if(Route::current()->getName() != 'admin.dashboard')
                  <li class="is-active">
                    <a href="#">
                      <span>@yield('page.title')</span>
                    </a>
                  </li>
                  @endif
                </ul>
              </nav>
            </div>
            <div class="page-content">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <!-- Scripts -->
  <script src="/admin/js/app.js"></script>
  @yield('scripts')
<style>
  .modal{
    max-width: unset!important;
    width: unset!important;
    top: 0!important;
    -webkit-transform: unset!important;
    -moz-transform: unset!important;
    -ms-transform: unset!important;
    -o-transform: unset!important;
    transform: unset!important;
  }
</style>
</body>
</html>


