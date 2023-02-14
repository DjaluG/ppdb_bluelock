@extends('dashboard.index')
@section('content')
<div class="wrapper">
    <div class="main-header">
        <div class="logo-header">
            <a href="index.html" class="logo">
                Osis Dashboard
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
        </div>
        <nav class="navbar navbar-header navbar-expand-lg">
            <div class="container-fluid">
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-envelope"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    </li>
                    <li class="nav-item dropdown" style="transition: 0.5s;">
                        <a style="transition: 0.5s;" class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="assets/img/profile.jpg" alt="user-img" width="36" class="img-circle"><span >{{ Auth::user()->name }}</span></span> </a>
                        <ul style="transition: 0.5s;" class="dropdown-menu dropdown-user">
                            <li>
                                <div class="user-box">
                                    <div class="u-img"><img src="assets/img/profile.jpg" alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                    </div>
                                </li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
                                <a class="dropdown-item" href="#"></i> My Balance</a>
                                <a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="sidebar">
            <div class="scrollbar-inner sidebar-wrapper">
                <div class="user">
                    <div class="info">
                            <span style="color: black; font-weight: 600; font-size: large;">
                                BlueLock
                            </span>
                        
                        <div class="clearfix"></div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a href="{{route('dashboard')}}">
                            <i class="la la-dashboard"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('dashboardFunction')}}">
                            <i class="la la-table"></i>
                            <p>Pembayaran</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <h4 class="page-title">Hi {{ Auth::user()->name }}</h4>
                    @if(Auth::user()->role == 'admin')
                    <h5 class="page-title">Welcome In Admin Dashboard</h5>
                    <div class="col-md-12">
                        <div class="card card-stats card-warning">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-7 align-items-center">
                                        <div class="text">
                                            <p class="card-category">Silahkan Lihat Data</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Auth::user()->role == 'user')
                    <h5 class="page-title">Welcome In User Dashboard</h5>
                   


                    @if(!isset($data))
                    
                    @elseif($data->status == 0)
                    <div class="col-md-12">
                        <div class="card card-stats card-warning">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-7 align-items-center">
                                        <div class="text">
                                            <p class="card-category">Sedang Di Proses, Silahkan Tunggu</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($data->status == 1)
                        <div class="col-md-12">
                            <div class="card card-stats card-validate" style="background-color: aqua;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 align-items-center">
                                            <div class="text">
                                                <p class="card-category" style="color: white;">Pembayaran Di Verifikasi, Tunggu Inpo Selanjutnya</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-md-12">
                            <div class="card card-stats card-danger">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-7 align-items-center">
                                            <div class="text">
                                                <p class="card-category">Pembayaran Gagal, Ulangi Lagi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endif    
                        @endif    
                          
                {{--        --}}
                    </div>
                </div>
@endsection