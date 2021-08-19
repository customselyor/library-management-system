<x-admin-layout>
    <div class="content-header" >
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.edit') }}</h1>
                </div>
                {{--<!-- /.col -->--}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item "><a href="{{ url('/admin/genders') }}">{{ __('messages.genders') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.edit') }}</li>
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
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('messages.edit') }}</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('genders.index') }}"> {{ __('messages.back') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('genders.update', $gender->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('gender.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
