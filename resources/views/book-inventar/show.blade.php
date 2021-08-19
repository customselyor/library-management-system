@extends('layouts.app')

@section('template_title')
    {{ $bookInventar->name ?? 'Show Book Inventar' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Book Inventar</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('book-inventars.index') }}"> {{ __('messages.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Faculty Id:</strong>
                            {{ $bookInventar->faculty_id }}
                        </div>
                        <div class="form-group">
                            <strong>Direction Id:</strong>
                            {{ $bookInventar->direction_id }}
                        </div>
                        <div class="form-group">
                            <strong>Arrived Year:</strong>
                            {{ $bookInventar->arrived_year }}
                        </div>
                        <div class="form-group">
                            <strong>Summarka Number:</strong>
                            {{ $bookInventar->summarka_number }}
                        </div>
                        <div class="form-group">
                            <strong>Faculty Code:</strong>
                            {{ $bookInventar->faculty_code }}
                        </div>
                        <div class="form-group">
                            <strong>Copies:</strong>
                            {{ $bookInventar->copies }}
                        </div>
                        <div class="form-group">
                            <strong>Inventar Number Begin:</strong>
                            {{ $bookInventar->inventar_number_begin }}
                        </div>
                        <div class="form-group">
                            <strong>Inventar Number End:</strong>
                            {{ $bookInventar->inventar_number_end }}
                        </div>
                        <div class="form-group">
                            <strong>Qr Code Lists:</strong>
                            {{ $bookInventar->qr_code_lists }}
                        </div>
                        <div class="form-group">
                            <strong>Inventar Number Removed:</strong>
                            {{ $bookInventar->inventar_number_removed }}
                        </div>
                        <div class="form-group">
                            <strong>Book Id:</strong>
                            {{ $bookInventar->book_id }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $bookInventar->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Updated By:</strong>
                            {{ $bookInventar->updated_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
