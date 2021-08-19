@extends('layouts.app')

@section('template_title')
    User Profile
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User Profile') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('user-profiles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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
                                        
										<th>Phone Number</th>
										<th>Pnf Code</th>
										<th>Passport Seria Number</th>
										<th>Passport Copy</th>
										<th>Image</th>
										<th>Date Of Birth</th>
										<th>Kursi</th>
										<th>Klassi</th>
										<th>Raqami</th>
										<th>Qr Code</th>
										<th>Faculty Id</th>
										<th>Direction Id</th>
										<th>Gender Id</th>
										<th>User Id</th>
										<th>User Type Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userProfiles as $userProfile)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $userProfile->phone_number }}</td>
											<td>{{ $userProfile->pnf_code }}</td>
											<td>{{ $userProfile->passport_seria_number }}</td>
											<td>{{ $userProfile->passport_copy }}</td>
											<td>{{ $userProfile->image }}</td>
											<td>{{ $userProfile->date_of_birth }}</td>
											<td>{{ $userProfile->kursi }}</td>
											<td>{{ $userProfile->klassi }}</td>
											<td>{{ $userProfile->raqami }}</td>
											<td>{{ $userProfile->qr_code }}</td>
											<td>{{ $userProfile->faculty_id }}</td>
											<td>{{ $userProfile->direction_id }}</td>
											<td>{{ $userProfile->gender_id }}</td>
											<td>{{ $userProfile->user_id }}</td>
											<td>{{ $userProfile->user_type_id }}</td>

                                            <td>
                                                <form action="{{ route('user-profiles.destroy',$userProfile->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('user-profiles.show',$userProfile->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('user-profiles.edit',$userProfile->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $userProfiles->links() !!}
            </div>
        </div>
    </div>
@endsection
