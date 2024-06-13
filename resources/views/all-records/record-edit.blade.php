@extends('template.main')
@section('title', 'Edit All Records')
@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">@yield('title')</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="/all-records">All Records</a></li>
						<li class="breadcrumb-item active">@yield('title')</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="text-right">
								<a href="/all-records" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
									Back
								</a>
							</div>
						</div>
						<form class="needs-validation" novalidate action="/all-records/{{ $getRecord->id }}" method="POST">
							@csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="title">Title*</label>
											<input type="text" name="title" title="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title" value="{{old('title', $getRecord->title)}}" required>
											<input type="hidden" name="created_by" value="{{ auth()->user()->id_user }}">
											@error('title')
											<span class="invalid-feedback text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="status">Status*</label>
											<select name="status" class="form-control @error('status') is-invalid @enderror" id="status" required>
												<option value="">--status--</option>
												<option value="1" {{ ($getRecord->status == "active") ? 'selected' : '' }}>Active</option>
												<option value="2" {{ ($getRecord->status == "deactive") ? 'selected' : '' }}>De-Active</option>
											</select>
											@error('status')
											<span class="invalid-feedback text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>
								
								<div class="row">
									
									<div class="col-lg-12">
										<div class="form-group">
											<label for="description">Description</label>
											<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="10" rows="5" placeholder="description">{{old('description', $getRecord->description)}}</textarea>
											@error('description')
											<span class="invalid-feedback text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer text-right">
								<button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
									Reset</button>
								<button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
									Save</button>
							</div>
						</form>
					</div>
				</div>
				<!-- /.content -->
			</div>
		</div>
	</div>
</div>

@endsection