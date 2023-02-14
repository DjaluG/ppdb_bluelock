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
							<a href="{{route('dashboard')}}">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item active">
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
						@if(Auth::user()->role == 'user')
                        <h4 class="page-title">Pembayaran</h4>
						<h5 class="page-title">Silahkan Upload Bukti Pembayaran</h5>
                        @endif
						@if(Auth::user()->role == 'admin')
                        <h4 class="page-title">Verifikasi</h4>
						<h5 class="page-title">Silahkan Verifikasi Data</h5>
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
						@if(Auth::user()->role == 'user')
						@if (!isset($data))
						<div class="py-4 container">
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						  @endif
							<div class="row">
							  <div class="col-md-20">
								<div class="card1 mt-3 p-3 g-2">
								 <div class="card-header text-warning">
								  <b>Form Pembayaran</b>
									 </div>
								 <div class="card-body mt-3">
								  <form action="{{ route('dashboardPembayaran') }}" method="POST" class="form-profile" enctype="multipart/form-data">
									@csrf
								  <div class="row">
									<div class="form-group col-sm-4">
									  <label class="form-label text-white">Nama Bank</label>
									  <select name="nama_bank">
										<option value="">Bank</option>
										<option value="bank_BCA">Bank BCA</option>
										<option value="bank_ABC">Bank ABC</option>
									  </select>
								  </div>
									<div class="form-group col-sm-4">
									  <label for="name" class="form-label text-white">Nama Pemilik Rekening</label>
									  <input type="text" class="form-control" name="pemilik" placeholder="Nama Pemilik Rekening">
									</div>
									<div class="form-group col-sm-4">
									  <label for="nominal" class="form-label text-white">Nominal</label>
									  <input type="text" id="rupiah" class="form-control" name="nominal" id="rupiah" placeholder="Masukkan Nominal">
									</div>
									{{-- <div class="mb-3" id="other-div" style="display:none;">
									  <label for="bank" class="form-label text-white">Nama Bank atau Dompet Digital</label>
									  <input id="other-inputs" type="text" class="form-control" name="bank" placeholder="Nama Bank atau Dompet Digital">
								  </div> --}}
									<div class="form-group col-sm-20">
									  <label for="payment_image" class="form-label text-white">Bukti Transfer</label>
									  <input type="hidden" name="oldImage" value="">
									  <input type="file" name="bukti" class="form-control">
									</div>
									<div class="row  align-items-start">
									  <div class="col-md-4">
										  <input type="submit" value="Upload Bukti Pembayaran" class="btn btn-success">
									  </div>
								  </div>
									</div>
								 </div>
								</div>
							</div>
							</div>
							</div>
							<script>
								var dengan_rupiah = document.getElementById('rupiah');
								dengan_rupiah.addEventListener('keyup', function(e)
								{
									dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
								});
								function formatRupiah(angka, prefix)
							{
								var number_string = angka.replace(/[^,\d]/g, '').toString(),
									split    = number_string.split(','),
									sisa     = split[0].length % 3,
									rupiah     = split[0].substr(0, sisa),
									ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
									
								if (ribuan) {
									separator = sisa ? '.' : '';
									rupiah += separator + ribuan.join('.');
								}
								
								rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
								return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
							}
							  </script>
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
						  @elseif($data->status == 2)
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
						<div class="row">
							<div class="col-md-20">
							  <div class="card1 mt-3 p-3 g-2">
							   <div class="card-header text-warning">
								<b>Form Update Pembayaran</b>
								   </div>
							   <div class="card-body mt-3">
								<form action="{{ route('update', $data['id']) }}" method="POST" class="form-profile" enctype="multipart/form-data">
								  @csrf
								  @method('PATCH')
								<div class="row">
								  <div class="form-group col-sm-4">
									<label class="form-label text-white">Nama Bank</label>
									<select name="nama_bank" id="bank" onchange="tampilLainnya()">
									  <option value="">Bank</option>
									  <option value="bank_BCA">Bank BCA</option>
									  <option value="bank_ABC">Bank ABC</option>
									  <option value="another">Bank Lain</option>
									</select>
								</div>
								<div class="inputfield"id="banklainnya"style="display: none">
									<label>Bank Lain</label>
									<input type="text" name="nama_bank_lain"  class="input" >
								 </div>  
								 <script>
								  function tampilLainnya() {
									  var sekolah = document.getElementById("bank").value;
									  var sekolahLainnya = document.getElementById("banklainnya");
									  if (sekolah == "another") {
										  sekolahLainnya.style.display = "";
									  }else {
										  sekolahLainnya.style.display = "none";
									  }
								  }
							  </script>
								  <div class="form-group col-sm-4">
									<label for="name" class="form-label text-white">Nama Pemilik Rekening</label>
									<input type="text" class="form-control" name="pemilik" placeholder="Nama Pemilik Rekening">
								  </div>
								  <div class="form-group col-sm-4">
									<label for="nominal" class="form-label text-white">Nominal</label>
									<input type="text" id="rupiah" class="form-control" name="nominal" id="rupiah" placeholder="Masukkan Nominal">
								  </div>
								  {{-- <div class="mb-3" id="other-div" style="display:none;">
									<label for="bank" class="form-label text-white">Nama Bank atau Dompet Digital</label>
									<input id="other-inputs" type="text" class="form-control" name="bank" placeholder="Nama Bank atau Dompet Digital">
								</div> --}}
								  <div class="form-group col-sm-20">
									<label for="payment_image" class="form-label text-white">Bukti Transfer</label>
									<input type="hidden" name="oldImage" value="">
									<input type="file" name="bukti" class="form-control">
								  </div>
								  <div class="row  align-items-start">
									<div class="col-md-4">
										<input type="submit" value="Upload Bukti Pembayaran" class="btn btn-success">
									</div>
								</div>
								  </div>
							   </div>
							  </div>
						  </div>
						  </div>
						  </div>
						  <script>
							  var dengan_rupiah = document.getElementById('rupiah');
							  dengan_rupiah.addEventListener('keyup', function(e)
							  {
								  dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
							  });
							  function formatRupiah(angka, prefix)
						  {
							  var number_string = angka.replace(/[^,\d]/g, '').toString(),
								  split    = number_string.split(','),
								  sisa     = split[0].length % 3,
								  rupiah     = split[0].substr(0, sisa),
								  ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
								  
							  if (ribuan) {
								  separator = sisa ? '.' : '';
								  rupiah += separator + ribuan.join('.');
							  }
							  
							  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
							  return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
						  }
							</script>
						@endif
						@endif




						@if(Auth::user()->role == 'admin')
						<div class="row"style="align-items: center; justify-content: center;">
							<div class="col-md-11" >
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Table</h4>
										<p class="card-category">List Students ({{ $biodatas->total() }})</p>
									</div>
									<div class="card-body">
										<table class="table table-head-bg-success table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">No</th>
													<th scope="col">Name</th>
													<th scope="col">Bukti</th>
													<th scope="col">Detail</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($biodatas as $biodata)
												<tr>
													<td>{{ $biodata->id }}</td>
													<td>{{ $biodata->pemilik  }}</td>
													<td><a href="/dashboard/bukti/{{$biodata['id']}}">Lihat</a></td>
													<td><a href="/dashboard/detail/{{$biodata['id']}}">Detail</a></td>

													
													<td>
														@if($biodata['status'] == 0)
                                                        
														<div style="display: flex">
															<form action="/terima/{{$biodata['id']}}" method="POST">
																@csrf
																@method('PATCH')
															<button class="btn btn-success" type="submit">Verifikasi</button> 
															</form>
															<form action="/tolak/{{$biodata['id']}}" method="POST">
																@csrf
																@method('PATCH')
															<button class="btn btn-danger" type="submit">Tolak</button>
															</form>
															</div>
                                                        @elseif($biodata['status'] == 1)
                                                        <p style="color: green">Di Terima</p>
                                                        @else
														<p style="color: red">Ditolak</p>
													</td>
													@endif
												</tr>
												@endforeach
											</tbody>
										</table>
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