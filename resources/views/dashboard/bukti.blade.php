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
							<a style="transition: 0.5s;" class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="assets/img/profile.jpg" alt="user-img" width="36" class="img-circle"><span >Hizrian</span></span> </a>
							<ul style="transition: 0.5s;" class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="assets/img/profile.jpg" alt="user"></div>
										<div class="u-text">
											<h4>Hizrian</h4>
											<p class="text-muted">hello@themekita.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"></i> My Balance</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a>
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
						<li class="nav-item">
							<a href="index.html">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item active">
							<a href="components.html">
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
						@if(Auth::user()->role == 'admin')
                        <h4 class="page-title">Bukti</h4>
                        @endif
						{{-- <div class="row">
							<div class="col-md-12">
								<div class="card" style="height: 440px;">
									<div class="card-header">
										<h4 class="card-title">World Map</h4>
										<p class="card-category">
										Map of the distribution of users around the world</p>
									</div>
									<div class="card-body" style="text-align: center;">

									</div>
								</div>
							</div>
						</div> --}}
						@if(Auth::user()->role == 'admin')
						<div class="row"style="align-items: center; justify-content: center;">
							<div class="col-md-11" >
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Bukti</h4>
									</div>
									<div class="card-body">
										<img width="300"  src="{{asset('assets/img/error.png')}}" alt=""><br><br>
                                        <p>
                                            Nama Bank : {{$bukti->nama_bank}}<br>
                                            Nama Pemilik Rekening : {{$bukti->pemilik}}<br>
                                            Nominal : {{$bukti->nominal}}<br>
                                        </p>
                                       <a href="{{route('dashboardFunction')}}"><button class="btn btn-primary mt-3" style="margin-right: 10px;">Go Back</button></a>
									</div>
								</div>
							</div>
						</div>
                        @endif

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection