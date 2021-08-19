<x-admin-layout>
    <div class="content-header" >
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.view') }}</h1>
                </div>
                {{--<!-- /.col -->--}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/book-types') }}">{{ __('messages.book_types') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.view') }}</li>
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
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('messages.book_types') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('book-types.index') }}"> {{ __('messages.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>{{ __('messages.name') }}:</strong>
                            {{ $bookType->name }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('messages.code') }}:</strong>
                            {{ $bookType->code }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('messages.status') }}:</strong>
                            {!! ($bookType->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
