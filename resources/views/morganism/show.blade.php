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
                        <li class="breadcrumb-item "><a href="{{ url('admin/morganisms') }}">{{ __('messages.microorganisms') }}</a></li>
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
                            <span class="card-title">{{ __('messages.view') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('morganisms.index') }}"> {{ __('messages.back') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <strong>{{ __('messages.micro_parent_categories') }}:</strong>
                            {{ $morganism->microParentCategory->title }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('messages.title') }}:</strong>
                            {{ $morganism->title }}
                        </div>
                        <div class="form-group">
                            <strong>Counter:</strong>
                            {{ $morganism->counter }}
                        </div>
                        <div class="form-group">
                            <strong>Strain In Collection:</strong>
                            {{ $morganism->strain_in_collection }}
                        </div>
                        <div class="form-group">
                            <strong>Date Of Isolation:</strong>
                            {{ $morganism->date_of_isolation }}
                        </div>
                        <div class="form-group">
                            <strong>Date Of Receipt:</strong>
                            {{ $morganism->date_of_receipt }}
                        </div>
                        <div class="form-group">
                            <strong>Halophility:</strong>
                            {{ $morganism->halophility }}
                        </div>
                        <div class="form-group">
                            <strong>Acidophility:</strong>
                            {{ $morganism->acidophility }}
                        </div>
                        <div class="form-group">
                            <strong>Alcaliphility:</strong>
                            {{ $morganism->alcaliphility }}
                        </div>
                        <div class="form-group">
                            <strong>Thermophility:</strong>
                            {{ $morganism->thermophility }}
                        </div>
                        <div class="form-group">
                            <strong>Source Location Isolation:</strong>
                            {{ $morganism->sourceLocationIsolation->title }}
                        </div>
                        <div class="form-group">
                            <strong>Identified By:</strong>
                            {{ $morganism->identified->title }}
                        </div>
                        <div class="form-group">
                            <strong>Deposited By:</strong>
                            {{ $morganism->deposited->title }}
                        </div>
                        <div class="form-group">
                            <strong>Conditions Preservation:</strong>
                            {{ $morganism->conditionPreservation->title }}
                        </div>
                        <div class="form-group">
                            <strong>Conditions Growth:</strong>
                            {{ $morganism->conditionsGrowth->title }}
                        </div>
                        <div class="form-group">
                            <strong>Growth Salt Presence:</strong>
                            {{ $morganism->growthSaltPresence->title}}
                        </div>
                        <div class="form-group">
                            <strong>Growth Ph Lt 7:</strong>
                            {{ $morganism->growthPhLt7->title}}
                        </div>
                        <div class="form-group">
                            <strong>Growth Ph Mt 7:</strong>
                            {{ $morganism->growthPhMt7->title }}
                        </div>
                        <div class="form-group">
                            <strong>Growth Higher T:</strong>
                            {{ $morganism->growthHigherT->title }}
                        </div>
                        <div class="form-group">
                            <strong>Biotechnological Features:</strong>
                            {{ $morganism->biotechnologicalFeature->title }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('messages.status') }}:</strong>
                            {!! ($morganism->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>