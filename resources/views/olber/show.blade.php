<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.view') }}</h1>
                </div>
                {{-- <!-- /.col --> --}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item "><a
                                href="{{ url('/admin/olber') }}">{{ __('messages.olber') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.view') }}</li>
                    </ol>
                </div>
                {{-- <!-- /.col --> --}}
            </div>
            {{-- <!-- /.row --> --}}
        </div>
        {{-- <!-- /.container-fluid --> --}}
    </div>
    {{-- <!-- /.content-header --> --}}

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('messages.olber') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('olber.index') }}">
                                {{ __('messages.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Kitobxon:</strong>
                            {{ $olber->kitobxon->name }}
                        </div>
                        <div class="form-group">
                            <strong>Book:</strong>
                            {{ $olber->book->title }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $olber::getStatusText($olber->status) }}
                        </div>
                        <div class="form-group">
                            <strong>Olgan Vaqti:</strong>
                            {{ $olber->olgan_vaqti }}
                        </div>

                        <div class="form-group">
                            <strong>Nechchi Kun:</strong>
                            {{ $olber->nechchi_kun }}
                        </div>
                        <div class="form-group">
                            <strong>Qaytarish Vaqti:</strong>
                            {{ $olber->qaytarish_vaqti }}
                        </div>

                        <div class="form-group">
                            <strong>Qaytargan Vaqti:</strong>
                            {{ $olber->qaytargan_vaqti }}
                        </div>

                        <div class="form-group">
                            <strong>Fakultet:</strong>
                            {{ $olber->faculty->name }}
                        </div>
                        {{-- <div class="form-group">
                            <strong>Created:</strong>
                            {{ $olber->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Updated:</strong>
                            {{ $olber->updated_by }}
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
