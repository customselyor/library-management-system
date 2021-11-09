<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Management</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::user()->profile && Auth::user()->profile->image)
                    <img src="{{ asset('/storage/avatar/' . Auth::user()->profile->image) }}"
                        class="img-circle elevation-2">

                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">

                    {{ Auth::user()->name }}

                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item has-treeview {{ \Request::is('admin/book*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ \Request::is('admin/book*') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            {{ __('messages.books') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/book-types') }}"
                                class="nav-link {{ \Request::is('admin/book-types*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                {{ __('messages.book_types') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/book-languages') }}"
                                class="nav-link {{ \Request::is('admin/book-languages*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                {{ __('messages.book_languages') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/book-texts') }}"
                                class="nav-link {{ \Request::is('admin/book-texts*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                {{ __('messages.book_texts') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/book-text-types') }}"
                                class="nav-link {{ \Request::is('admin/book-text-types*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                {{ __('messages.book_text_types') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/books') }}"
                                class="nav-link {{ \Request::is('admin/books*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                {{ __('messages.books') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/books/inventars') }}"
                                class="nav-link {{ \Request::is('admin/books/inventars') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                {{ __('messages.inventars') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/users') }}"
                        class="nav-link {{ \Request::is('admin/users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        {{ __('messages.users') }}
                    </a>
                </li>
               
                <li class="nav-item">
                    <a href="{{ url('admin/user-types') }}"
                        class="nav-link {{ \Request::is('admin/user-types*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        {{ __('messages.user_types') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/olber') }}"
                        class="nav-link {{ \Request::is('admin/olber*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-magnet"></i>
                        {{ __('messages.olber') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/genders') }}"
                        class="nav-link {{ \Request::is('admin/genders*') ? 'active' : '' }}">
                        <i class="fas fa-circle nav-icon"></i>
                        {{ __('messages.genders') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/faculties') }}"
                        class="nav-link {{ \Request::is('admin/faculties*') ? 'active' : '' }}">
                        <i class="far fa-building"></i>
                        {{ __('messages.faculties') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/directions') }}"
                        class="nav-link {{ \Request::is('admin/directions*') ? 'active' : '' }}">
                        <i class="fas fa-archway"></i>
                        {{ __('messages.directions') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/qrcode') }}"
                        class="nav-link {{ \Request::is('admin/qrcode*') ? 'active' : '' }}">
                        <i class="fas fa-qrcode"></i>
                        {{ __('Qr code scanner') }}
                    </a>
                </li>


                {{-- microbiologiya --}}
                {{-- <li class="nav-item has-treeview {{(\Request::is('admin/micro*') || \Request::is('admin/m-authors*')|| \Request::is('admin/source-location-isolations*')|| \Request::is('admin/condition-preservations*')|| \Request::is('admin/conditions-growths*')|| \Request::is('admin/growths*')|| \Request::is('admin/biotechnological-features*')|| \Request::is('admin/morganisms*') )?'menu-open':''}}"> --}}
                {{-- <a href="#" --}}
                {{-- class="nav-link {{(\Request::is('admin/micro*') || \Request::is('admin/m-authors*') || \Request::is('admin/source-location-isolations*')|| \Request::is('admin/condition-preservations*')|| \Request::is('admin/conditions-growths*')|| \Request::is('admin/growths*')|| \Request::is('admin/biotechnological-features*')|| \Request::is('admin/morganisms*') )?'active':''}} "> --}}
                {{-- <i class="nav-icon fas fa-book"></i> --}}
                {{-- <p> --}}
                {{-- {{ __('messages.microbiology') }} --}}
                {{-- <i class="right fas fa-angle-left"></i> --}}
                {{-- </p> --}}
                {{-- </a> --}}
                {{-- <ul class="nav nav-treeview"> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{ url('admin/micro-parent-categories') }}" --}}
                {{-- class="nav-link {{(\Request::is('admin/micro-parent-categories*'))?'active':''}}"> --}}
                {{-- <i class="nav-icon far fa-circle"></i> --}}
                {{-- {{ __('messages.micro_parent_categories') }} --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{ url('admin/m-authors') }}" --}}
                {{-- class="nav-link {{(\Request::is('admin/m-authors*'))?'active':''}}"> --}}
                {{-- <i class="nav-icon far fa-circle"></i> --}}
                {{-- {{ __('messages.author') }} --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{ url('admin/source-location-isolations') }}" --}}
                {{-- class="nav-link {{(\Request::is('admin/source-location-isolations*'))?'active':''}}"> --}}
                {{-- <i class="nav-icon far fa-circle"></i> --}}
                {{-- {{ __('messages.source_location_lsolation') }} --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{ url('admin/condition-preservations') }}" --}}
                {{-- class="nav-link {{(\Request::is('admin/condition-preservations*'))?'active':''}}"> --}}
                {{-- <i class="nav-icon far fa-circle"></i> --}}
                {{-- {{ __('messages.condition_preservation') }} --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{ url('admin/conditions-growths') }}" --}}
                {{-- class="nav-link {{(\Request::is('admin/conditions-growths*'))?'active':''}}"> --}}
                {{-- <i class="nav-icon far fa-circle"></i> --}}
                {{-- {{ __('messages.conditions_growths') }} --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{ url('admin/growths') }}" --}}
                {{-- class="nav-link {{(\Request::is('admin/growths*'))?'active':''}}"> --}}
                {{-- <i class="nav-icon far fa-circle"></i> --}}
                {{-- {{ __('messages.growths') }} --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{ url('admin/biotechnological-features') }}" --}}
                {{-- class="nav-link {{(\Request::is('admin/biotechnological-features*'))?'active':''}}"> --}}
                {{-- <i class="nav-icon far fa-circle"></i> --}}
                {{-- {{ __('messages.biotechnological_features') }} --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{ url('admin/morganisms') }}" --}}
                {{-- class="nav-link {{(\Request::is('admin/morganisms*'))?'active':''}}"> --}}
                {{-- <i class="nav-icon far fa-circle"></i> --}}
                {{-- {{ __('messages.microorganisms') }} --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- </ul> --}}
                {{-- </li> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{ url('admin/language-settings') }}" --}}
                {{-- class="nav-link {{(\Request::is('admin/language-settings*'))?'active':''}}"> --}}
                {{-- <i class="fas fa-language"></i> --}}
                {{-- {{ __('Language Settings') }} --}}
                {{-- </a> --}}
                {{-- </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
