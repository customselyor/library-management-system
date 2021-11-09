<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.olber') }}</h1>
                </div>
                {{-- <!-- /.col --> --}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.olber') }}</li>
                    </ol>
                </div>
                {{-- <!-- /.col --> --}}
            </div>
            {{-- <!-- /.row --> --}}
        </div>
        {{-- <!-- /.container-fluid --> --}}
    </div>
    {{-- <!-- /.content-header --> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('messages.olber') }}
                            </span>

                            <div class="float-right">
                                {{-- <a href="{{ route('olber.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('messages.create') }}
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Kitobxon</th>
                                        <th>Book</th>
                                        <th>Status</th>
                                        <th>Olgan Vaqti</th>
                                        <th>Nechchi Kun</th>
                                        <th>Qaytarish Vaqti</th>
                                        <th>Qaytargan Vaqti</th>
                                        <th>Fakultet</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($olbers as $olber)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $olber->kitobxon->name }}</td>
                                            <td>{{ $olber->book->title }}</td>
                                            <td>{{ $olber::getStatusText($olber->status) }}</td>
                                            <td>{{ $olber->olgan_vaqti }}</td>
                                            <td>{{ $olber->nechchi_kun }}</td>
                                            <td>{{ $olber->qaytarish_vaqti }}</td>

                                            <td>{{ $olber->qaytargan_vaqti }}</td>
                                            <td>{{ $olber->faculty->name }}</td>

                                            <td>

                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('olber.show', $olber->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> Show</a>


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $olbers->links() !!}
            </div>
        </div>
    </div>
</x-admin-layout>
