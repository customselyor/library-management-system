@extends('layouts.app')

@section('template_title')
    Create Micro Parent Category Translation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Micro Parent Category Translation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('micro-parent-category-translations.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('micro-parent-category-translation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
