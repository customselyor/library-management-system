<x-admin-layout>
	<div class="content-header" >
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">{{ __('messages.create') }}</h1>
				</div>
				{{--<!-- /.col -->--}}
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
						<li class="breadcrumb-item"><a href="{{ url('/micro-parent-categories') }}">{{ __('messages.micro_parent_categories') }}</a></li>
						<li class="breadcrumb-item active">{{ __('messages.create') }}</li>
					</ol>
				</div>
				{{--<!-- /.col -->--}}
			</div>
			{{--<!-- /.row -->--}}
		</div>
		{{--<!-- /.container-fluid -->--}}
	</div>
	{{--<!-- /.content-header -->--}}

	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">

				@includeif('partials.errors')

				<div class="card card-default">
					<div class="card-header">
						<span class="card-title">{{ __('messages.create') }}</span>
						<div class="float-right">
                            <a class="btn btn-primary" href="{{ route('micro-parent-categories.index') }}"> {{ __('messages.back') }}</a>
                        </div>
					</div>
					<div class="card-body">
						<form method="POST" action="{{ route('micro-parent-categories.store') }}"  role="form" enctype="multipart/form-data">
							@csrf

							@include('micro-parent-category.form')

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</x-admin-layout>
