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
                        <li class="breadcrumb-item "><a href="{{ url('/admin/m-authors') }}">{{ __('messages.author') }}</a></li>
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
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('m-authors.update', $mAuthor->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('m-author.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>