@extends('layouts.app')

@section('template_title')
    {{ $userProfile->name ?? 'Show User Profile' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User Profile</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('user-profiles.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Phone Number:</strong>
                            {{ $userProfile->phone_number }}
                        </div>
                        <div class="form-group">
                            <strong>Pnf Code:</strong>
                            {{ $userProfile->pnf_code }}
                        </div>
                        <div class="form-group">
                            <strong>Passport Seria Number:</strong>
                            {{ $userProfile->passport_seria_number }}
                        </div>
                        <div class="form-group">
                            <strong>Passport Copy:</strong>
                            {{ $userProfile->passport_copy }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $userProfile->image }}
                        </div>
                        <div class="form-group">
                            <strong>Date Of Birth:</strong>
                            {{ $userProfile->date_of_birth }}
                        </div>
                        <div class="form-group">
                            <strong>Kursi:</strong>
                            {{ $userProfile->kursi }}
                        </div>
                        <div class="form-group">
                            <strong>Klassi:</strong>
                            {{ $userProfile->klassi }}
                        </div>
                        <div class="form-group">
                            <strong>Raqami:</strong>
                            {{ $userProfile->raqami }}
                        </div>
                        <div class="form-group">
                            <strong>Qr Code:</strong>
                            {{ $userProfile->qr_code }}
                        </div>
                        <div class="form-group">
                            <strong>Faculty Id:</strong>
                            {{ $userProfile->faculty_id }}
                        </div>
                        <div class="form-group">
                            <strong>Direction Id:</strong>
                            {{ $userProfile->direction_id }}
                        </div>
                        <div class="form-group">
                            <strong>Gender Id:</strong>
                            {{ $userProfile->gender_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $userProfile->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Type Id:</strong>
                            {{ $userProfile->user_type_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
