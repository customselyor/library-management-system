@extends('layouts.app')

@section('template_title')
    Update Conditions Growths Translation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Conditions Growths Translation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('conditions-growths-translations.update', $conditionsGrowthsTranslation->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('conditions-growths-translation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
