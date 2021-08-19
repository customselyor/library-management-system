@extends('layouts.app')

@section('template_title')
    Update Microorganisms Translation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Microorganisms Translation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('microorganisms-translations.update', $microorganismsTranslation->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('microorganisms-translation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
