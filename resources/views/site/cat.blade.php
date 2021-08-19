@extends('layouts.app')

@section('template_title')
    {{$morganism->title}}
@endsection

@section('content')
    <section class="firstBlock">
        <div class="wrap">
            @if (Auth::check())
                @if(Auth::user()->getRoleNames()[0]=='SuperAdmin')
                    <h2>{{$morganism->microParentCategory->title }}</h2>
                    <div class="imagesContent" style="justify-content: center;">
                        @if($morganism->count()>0)
                            <div data-aos="fade-down" data-aos-duration="1500" class="image leftSide" style="width: 100%;">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <strong>{{ __('messages.micro_parent_categories') }}:</strong>

                                            <a href="/parent/{{$parent_id}}">{{ $morganism->microParentCategory->title }}</a>
                                        </div>
                                        <div class="form-group">
                                            <strong>{{ __('messages.title') }}:</strong>
                                            {{ $morganism->title }}
                                        </div>
                                        <div class="form-group">
                                            <strong>{{ __('messages.strain_label') }}:</strong>
                                            {{ $morganism->strain_label}}
                                        </div>
                                        <div class="form-group">
                                            <strong>{{ __('messages.enzymatic_activity_extreme_conditions_protein') }}:</strong>
                                            {{ $morganism->enzymatic_activity_extreme_conditions_protein}}
                                        </div>
                                        @if($morganism->characteristics_produced_compounds)
                                            <div class="form-group">
                                                <strong>{{ __('messages.characteristics_produced_compounds') }}:</strong>
                                                {{ $morganism->characteristics_produced_compounds}}
                                            </div>
                                        @endif

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
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @elseif($morganism->role->name==Auth::user()->getRoleNames()[0])
                    <h2>{{$morganism->microParentCategory->title }}</h2>
                    <div class="imagesContent" style="justify-content: center;">
                        @if($morganism->count()>0)
                            <div data-aos="fade-down" data-aos-duration="1500" class="image leftSide" style="width: 100%;">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <strong>{{ __('messages.micro_parent_categories') }}:</strong>

                                            <a href="/parent/{{$parent_id}}">{{ $morganism->microParentCategory->title }}</a>
                                        </div>
                                        <div class="form-group">
                                            <strong>{{ __('messages.title') }}:</strong>
                                            {{ $morganism->title }}
                                        </div>
                                        <div class="form-group">
                                            <strong>{{ __('messages.strain_label') }}:</strong>
                                            {{ $morganism->strain_label}}
                                        </div>
                                        <div class="form-group">
                                            <strong>{{ __('messages.enzymatic_activity_extreme_conditions_protein') }}:</strong>
                                            {{ $morganism->enzymatic_activity_extreme_conditions_protein}}
                                        </div>
                                        @if($morganism->characteristics_produced_compounds)
                                            <div class="form-group">
                                                <strong>{{ __('messages.characteristics_produced_compounds') }}:</strong>
                                                {{ $morganism->characteristics_produced_compounds}}
                                            </div>
                                        @endif

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
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            @endif


        </div>
    </section>
@endsection