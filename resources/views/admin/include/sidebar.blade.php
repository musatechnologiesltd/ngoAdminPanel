 @php
     $usr = Auth::guard('admin')->user();
 @endphp

 <header class="main-nav">
    <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a>

        @if(empty(Auth::guard('admin')->user()->image))
        <img class="img-90 rounded-circle" src="{{asset('/')}}public/admin/user.png" alt="">
        @else
        <img class="img-90 rounded-circle" src="{{asset('/')}}{{ Auth::guard('admin')->user()->image }}" alt="">

        @endif





        <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="{{ route('setting.index') }}">
            <h6 class="mt-3 f-14 f-w-600">{{ Auth::guard('admin')->user()->name }}</h6></a>
        <p class="mb-0 font-roboto">{{ Auth::guard('admin')->user()->position }}</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>


                    @if (Route::is('newRegistrationList') ||  Route::is('revisionRegistrationList') || Route::is('alreadyRegistrationList') || Route::is('registrationView'))

                    <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Registration</span></a>
                        <ul class="nav-submenu menu-content" style="display: block;">
                            <li><a href="{{ route('newRegistrationList') }}"  class="{{ Route::is('newRegistrationList')  ? 'active' : '' }}">New Registration</a></li>
                            <li><a href="{{ route('revisionRegistrationList') }}" class="{{ Route::is('revisionRegistrationList')  ? 'active' : '' }}">Revision Registration</a></li>
                            <li><a href="{{ route('alreadyRegistrationList') }}" class="{{ Route::is('alreadyRegistrationList')  ? 'active' : '' }}">Already Registered</a></li>
                        </ul>
                    </li>
@else
<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Registration</span></a>
    <ul class="nav-submenu menu-content">
        <li><a href="{{ route('newRegistrationList') }}"  class="{{ Route::is('newRegistrationList')  ? 'active' : '' }}">New Registration</a></li>
        <li><a href="{{ route('revisionRegistrationList') }}" class="{{ Route::is('revisionRegistrationList')  ? 'active' : '' }}">Revision Registration</a></li>
        <li><a href="{{ route('alreadyRegistrationList') }}" class="{{ Route::is('alreadyRegistrationList')  ? 'active' : '' }}">Already Registered</a></li>
    </ul>
</li>

@endif




@if (Route::is('newNameChangeList') ||  Route::is('revisionNameChangeList') || Route::is('alreadNameChangeList') || Route::is('nameChangeView'))

<li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Name Change</span></a>
    <ul class="nav-submenu menu-content" style="display: block;">
        <li><a href="{{ route('newNameChangeList') }}"  class="{{ Route::is('newNameChangeList')  ? 'active' : '' }}">New name_change</a></li>
        <li><a href="{{ route('revisionNameChangeList') }}" class="{{ Route::is('revisionNameChangeList')  ? 'active' : '' }}">Revision name_change</a></li>
        <li><a href="{{ route('alreadNameChangeList') }}" class="{{ Route::is('alreadNameChangeList')  ? 'active' : '' }}">Already Changed</a></li>
    </ul>
</li>
@else
<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Name Change</span></a>
<ul class="nav-submenu menu-content">
<li><a href="{{ route('newNameChangeList') }}"  class="{{ Route::is('newNameChangeList')  ? 'active' : '' }}">New Name Change</a></li>
<li><a href="{{ route('revisionNameChangeList') }}" class="{{ Route::is('revisionNameChangeList')  ? 'active' : '' }}">Revision Name Change</a></li>
<li><a href="{{ route('alreadNameChangeList') }}" class="{{ Route::is('alreadNameChangeList')  ? 'active' : '' }}">Already Changed</a></li>
</ul>
</li>

@endif

@if (Route::is('newRenewList') ||  Route::is('revisionRenewList') || Route::is('alreadyRenewList') || Route::is('renewView'))

<li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Renew</span></a>
    <ul class="nav-submenu menu-content" style="display: block;">
        <li><a href="{{ route('newRenewList') }}"  class="{{ Route::is('newRenewList')  ? 'active' : '' }}">New Renew</a></li>
        <li><a href="{{ route('revisionRenewList') }}" class="{{ Route::is('revisionRenewList')  ? 'active' : '' }}">Revision Renew</a></li>
        <li><a href="{{ route('alreadyRenewList') }}" class="{{ Route::is('alreadyRenewList')  ? 'active' : '' }}">Already Renewed</a></li>
    </ul>
</li>
@else
<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Renew</span></a>
<ul class="nav-submenu menu-content">
<li><a href="{{ route('newRenewList') }}"  class="{{ Route::is('newRenewList')  ? 'active' : '' }}">New Renew</a></li>
<li><a href="{{ route('revisionRenewList') }}" class="{{ Route::is('revisionRenewList')  ? 'active' : '' }}">Revision Renew</a></li>
<li><a href="{{ route('alreadyRenewList') }}" class="{{ Route::is('alreadyRenewList')  ? 'active' : '' }}">Already Renewed</a></li>
</ul>
</li>

@endif

@if ($usr->can('fd9FormAdd') || $usr->can('fd9FormView') || $usr->can('fd9FormDelete') || $usr->can('fd9FormUpdate'))
<li class="dropdown">
    <a class="nav-link menu-title link-nav {{ Route::is('fd9Form.index') || Route::is('fd9Form.show') ? 'active' : '' }}" href="{{ route('fd9Form.index') }}">
        <i data-feather="airplay"></i>
        <span>Fd9 (N-Visa)</span>
    </a>
</li>
@endif
@if ($usr->can('fd9OneFormAdd') || $usr->can('fd9OneFormView') || $usr->can('fd9OneFormDelete') || $usr->can('fd9OneFormUpdate'))
<li class="dropdown">
    <a class="nav-link menu-title link-nav {{ Route::is('fd9OneForm.index') || Route::is('fd9OneForm.show') ? 'active' : '' }}" href="{{ route('fd9OneForm.index') }}">
        <i data-feather="airplay"></i>
        <span>Fd9.1 (Work Permit)</span>
    </a>
</li>
@endif

                    <li class="sidebar-main-title">
                        <div>
                          <h6>Other</h6>
                        </div>
                      </li>

                      @if (Route::is('admin.civil_info') || Route::is('country.index') || Route::is('systemInformation.index') ||  Route::is('user.index') || Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('permission.index'))

                      <li class="dropdown">
                        <a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="settings"></i><span>Setting</span></a>
                        <ul class="nav-submenu menu-content" style="display: block;">

                            @if ($usr->can('systemInformationAdd') || $usr->can('systemInformationView') || $usr->can('systemInformationDelete') || $usr->can('systemInformationUpdate'))
                            <li class="">
                                <a href="{{ route('systemInformation.index') }}" class="{{ Route::is('systemInformation.index') ? 'active' : '' }}" data-key="t-calendar">System Information</a>
                            </li>
                            @endif
                            @if ($usr->can('userAdd') || $usr->can('userView') || $usr->can('userDelete') || $usr->can('userUpdate'))
                            <li class="">
                                <a href="{{ route('user.index') }}" class="{{ Route::is('user.index') ? 'active' : '' }}" data-key="t-one-page">User</a>
                            </li>
                            @endif
                            @if ($usr->can('roleAdd') || $usr->can('roleView') || $usr->can('roleDelete') || $usr->can('roleUpdate'))
                            <li class="">
                                <a href="{{ route('role.index') }}" class="{{ Route::is('role.index') || Route::is('role.edit') || Route::is('role.create') ? 'active' : '' }}" data-key="t-nft-landing">Role </a>
                            </li>
                            @endif
                            @if ($usr->can('permissionAdd') || $usr->can('permissionView') || $usr->can('permissionDelete') || $usr->can('permissionUpdate'))
                            <li class="">
                                <a href="{{ route('permission.index') }}" class="{{ Route::is('permission.index') ? 'active' : '' }}"><span data-key="t-job">Permission</span>
                            </a>
                            </li>
                            @endif

@if ($usr->can('countryAdd') || $usr->can('countryView') ||  $usr->can('countryDelete') ||  $usr->can('countryUpdate'))
<li >
       <a href="{{ route('country.index') }}" class="{{ Route::is('country.index')  ? 'active' : '' }}"><span>Country</span> </a>
   </li>
@endif




                        </ul>
                    </li>
@else
<li class="dropdown">
    <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="settings"></i><span>Setting</span></a>
    <ul class="nav-submenu menu-content">


        @if ($usr->can('systemInformationAdd') || $usr->can('systemInformationView') || $usr->can('systemInformationDelete') || $usr->can('systemInformationUpdate'))
        <li class="">
            <a href="{{ route('systemInformation.index') }}" class="{{ Route::is('systemInformation.index') ? 'active' : '' }}" data-key="t-calendar">System Information</a>
        </li>
        @endif
        @if ($usr->can('userAdd') || $usr->can('userView') || $usr->can('userDelete') || $usr->can('userUpdate'))
        <li class="">
            <a href="{{ route('user.index') }}" class="{{ Route::is('user.index') ? 'active' : '' }}" data-key="t-one-page">User</a>
        </li>
        @endif
        @if ($usr->can('roleAdd') || $usr->can('roleView') || $usr->can('roleDelete') || $usr->can('roleUpdate'))
        <li class="">
            <a href="{{ route('role.index') }}" class="{{ Route::is('role.index') || Route::is('role.edit') || Route::is('role.create') ? 'active' : '' }}" data-key="t-nft-landing">Role </a>
        </li>
        @endif
        @if ($usr->can('permissionAdd') || $usr->can('permissionView') || $usr->can('permissionDelete') || $usr->can('permissionUpdate'))
        <li class="">
            <a href="{{ route('permission.index') }}" class="{{ Route::is('permission.index') ? 'active' : '' }}"><span data-key="t-job">Permission</span>
        </a>
        </li>
        @endif
        @if ($usr->can('countryAdd') || $usr->can('countryView') ||  $usr->can('countryDelete') ||  $usr->can('countryUpdate'))
<li >
       <a href="{{ route('country.index') }}" class="{{ Route::is('country.index')  ? 'active' : '' }}"><span>Country</span> </a>
   </li>
@endif


    </ul>
</li>

@endif

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>


