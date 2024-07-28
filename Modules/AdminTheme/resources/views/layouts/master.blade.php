<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

@include('admintheme::layouts.header')
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary @yield('class-body')"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        @include('admintheme::layouts.navbar')
        {{-- @include('admintheme::layouts.aside') --}}
        <x-admintheme::layouts.aside/>
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">@yield('title')</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    @yield('title')
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    @yield('main-content')
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
        @include('admintheme::layouts.footer')
    </div>

</body><!--end::Body-->
</html>