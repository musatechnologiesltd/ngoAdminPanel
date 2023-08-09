 @php
     $usr = Auth::guard('admin')->user();
 @endphp

 <header class="main-nav">
    <div class="sidebar-user text-center">
        @if ($usr->can('profile.edit'))
        <a class="setting-primary" href="{{ route('setting.index') }}"><i data-feather="settings"></i>
        </a>
        @else
        <a class="setting-primary" href="#"><i data-feather="settings"></i>
        </a>
        @endif

        @if(empty(Auth::guard('admin')->user()->admin_image))

        <img class="img-90 rounded-circle" src="{{asset('/')}}public/admin/user.png" alt="">
        @else

        <img class="img-90 rounded-circle" src="{{asset('/')}}{{ Auth::guard('admin')->user()->admin_image }}" alt="">

        @endif





        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        @if ($usr->can('profile.view'))
        <a href="{{ route('profile.index') }}">
            <h6 class="mt-3 f-14 f-w-600">{{ Auth::guard('admin')->user()->admin_name }}</h6>
        </a>
        @else
        <a href="#">
            <h6 class="mt-3 f-14 f-w-600">{{ Auth::guard('admin')->user()->admin_name }}</h6>
        </a>
        @endif


            <?php
                 $designationName = DB::table('designation_lists')
                 ->where('id',Auth::guard('admin')->user()->designation_list_id)
                 ->value('designation_name');

                 $branchName = DB::table('branches')
                 ->where('id',Auth::guard('admin')->user()->branch_id)
                 ->value('branch_name');

            ?>
        <p class="mb-0 font-roboto">{{ $designationName  }}</p>
        <p class="mb-0 font-roboto">{{ $branchName  }}</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>পেছনে</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>সাধারণ</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i data-feather="home"></i>
                            <span>ড্যাশবোর্ড</span>
                        </a>
                    </li>

                    @if ($usr->can('register_list_add') || $usr->can('register_list_view') || $usr->can('register_list_delete') || $usr->can('register_list_update'))
                    @if (Route::is('newRegistrationList') ||  Route::is('revisionRegistrationList') || Route::is('alreadyRegistrationList') || Route::is('registrationView'))

                    <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>এনজিও নিবন্ধন </span></a>
                        <ul class="nav-submenu menu-content" style="display: block;">
                            <li><a href="{{ route('newRegistrationList') }}"  class="{{ Route::is('newRegistrationList')  ? 'active' : '' }}">নিবন্ধন আবেদন </a></li>
                            <li><a href="{{ route('revisionRegistrationList') }}" class="{{ Route::is('revisionRegistrationList')  ? 'active' : '' }}">নিবন্ধন পুনর্বিবেচনা </a></li>
                            <li><a href="{{ route('alreadyRegistrationList') }}" class="{{ Route::is('alreadyRegistrationList')  ? 'active' : '' }}">নিবন্ধন </a></li>
                        </ul>
                    </li>
@else
<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>এনজিও নিবন্ধন </span></a>
    <ul class="nav-submenu menu-content">
        <li><a href="{{ route('newRegistrationList') }}"  class="{{ Route::is('newRegistrationList')  ? 'active' : '' }}">নিবন্ধন আবেদন  </a></li>
        <li><a href="{{ route('revisionRegistrationList') }}" class="{{ Route::is('revisionRegistrationList')  ? 'active' : '' }}">নিবন্ধন পুনর্বিবেচনা </a></li>
        <li><a href="{{ route('alreadyRegistrationList') }}" class="{{ Route::is('alreadyRegistrationList')  ? 'active' : '' }}">নিবন্ধন </a></li>
    </ul>
</li>

@endif
@endif



@if ($usr->can('name_change_add') || $usr->can('name_change_view') || $usr->can('name_change_delete') || $usr->can('name_change_update'))
@if (Route::is('newNameChangeList') ||  Route::is('revisionNameChangeList') || Route::is('alreadNameChangeList') || Route::is('nameChangeView'))

<li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>এনজিও'র নাম পরিবর্তন </span></a>
    <ul class="nav-submenu menu-content" style="display: block;">
        <li><a href="{{ route('newNameChangeList') }}"  class="{{ Route::is('newNameChangeList')  ? 'active' : '' }}"> নাম পরিবর্তনের আবেদন</a></li>
        <li><a href="{{ route('revisionNameChangeList') }}" class="{{ Route::is('revisionNameChangeList')  ? 'active' : '' }}"> নাম পরিবর্তন পুনর্বিবেচনা </a></li>
        <li><a href="{{ route('alreadNameChangeList') }}" class="{{ Route::is('alreadNameChangeList')  ? 'active' : '' }}">নাম পরিবর্তন  </a></li>
    </ul>
</li>
@else
<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>এনজিও'র নাম পরিবর্তন </span></a>
<ul class="nav-submenu menu-content">
<li><a href="{{ route('newNameChangeList') }}"  class="{{ Route::is('newNameChangeList')  ? 'active' : '' }}"> নাম পরিবর্তনের আবেদন</a></li>
<li><a href="{{ route('revisionNameChangeList') }}" class="{{ Route::is('revisionNameChangeList')  ? 'active' : '' }}">  নাম পরিবর্তন পুনর্বিবেচনা  </a></li>
<li><a href="{{ route('alreadNameChangeList') }}" class="{{ Route::is('alreadNameChangeList')  ? 'active' : '' }}">নাম পরিবর্তন </a></li>
</ul>
</li>

@endif
@endif
@if ($usr->can('renew_add') || $usr->can('renew_view') || $usr->can('renew_delete') || $usr->can('renew_update'))
@if (Route::is('newRenewList') ||  Route::is('revisionRenewList') || Route::is('alreadyRenewList') || Route::is('renewView'))

<li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>এনজিও নিবন্ধন নবায়ন</span></a>
    <ul class="nav-submenu menu-content" style="display: block;">
        <li><a href="{{ route('newRenewList') }}"  class="{{ Route::is('newRenewList')  ? 'active' : '' }}">নিবন্ধন নবায়ন আবেদন </a></li>
        <li><a href="{{ route('revisionRenewList') }}" class="{{ Route::is('revisionRenewList')  ? 'active' : '' }}">নিবন্ধন নবায়ন পুনর্বিবেচনা</a></li>
        <li><a href="{{ route('alreadyRenewList') }}" class="{{ Route::is('alreadyRenewList')  ? 'active' : '' }}">নিবন্ধন নবায়ন</a></li>
    </ul>
</li>
@else
<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>এনজিও নিবন্ধন নবায়ন</span></a>
<ul class="nav-submenu menu-content">
<li><a href="{{ route('newRenewList') }}"  class="{{ Route::is('newRenewList')  ? 'active' : '' }}">নিবন্ধন নবায়ন আবেদন </a></li>
<li><a href="{{ route('revisionRenewList') }}" class="{{ Route::is('revisionRenewList')  ? 'active' : '' }}">নিবন্ধন নবায়ন পুনর্বিবেচনা</a></li>
<li><a href="{{ route('alreadyRenewList') }}" class="{{ Route::is('alreadyRenewList')  ? 'active' : '' }}">নিবন্ধন নবায়ন</a></li>
</ul>
</li>

@endif
@endif

@if ($usr->can('fd9FormAdd') || $usr->can('fd9FormView') || $usr->can('fd9FormDelete') || $usr->can('fd9FormUpdate'))
<li class="dropdown">
    <a class="nav-link menu-title link-nav {{ Route::is('fd9Form.index') || Route::is('fd9Form.show') ? 'active' : '' }}" href="{{ route('fd9Form.index') }}">
        <i data-feather="airplay"></i>
        <span>এফডি৯ (এন-ভিসা)</span>
    </a>
</li>
@endif
@if ($usr->can('fd9OneFormAdd') || $usr->can('fd9OneFormView') || $usr->can('fd9OneFormDelete') || $usr->can('fd9OneFormUpdate'))
<li class="dropdown">
    <a class="nav-link menu-title link-nav {{ Route::is('fd9OneForm.index') || Route::is('fd9OneForm.show') ? 'active' : '' }}" href="{{ route('fd9OneForm.index') }}">
        <i data-feather="airplay"></i>
        <span>এফডি৯.১ (ওয়ার্ক পারমিট)</span>
    </a>
</li>
@endif
@if ($usr->can('employeeEndDate.view') || $usr->can('employeeEndDate.edit') || $usr->can('assignedEmployee.view') || $usr->can('assignedEmployee.edit') || $usr->can('userAdd') || $usr->can('userView') || $usr->can('userDelete') || $usr->can('userUpdate')|| $usr->can('designationAdd') || $usr->can('designationView') ||  $usr->can('designationDelete') ||  $usr->can('designationUpdate') || $usr->can('branchAdd') || $usr->can('branchView') ||  $usr->can('branchDelete') ||  $usr->can('branchUpdate'))
<li class="sidebar-main-title">
    <div>
      <h6>কর্মকর্তারদের তথ্য</h6>
    </div>
  </li>
<!--empoyee info --->
@if (Route::is('employeeEndDate') || Route::is('branchList.index') || Route::is('designationList.index') ||  Route::is('user.index') || Route::is('user.create') || Route::is('user.edit')   || Route::is('assignedEmployee.index'))

<li class="dropdown">
  <a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="users"></i><span>কর্মকর্তাদের তালিকা</span></a>
  <ul class="nav-submenu menu-content" style="display: block;">


    @if ($usr->can('branchAdd') || $usr->can('branchView') ||  $usr->can('branchDelete') ||  $usr->can('branchUpdate'))
<li >
<a href="{{ route('branchList.index') }}" class="{{ Route::is('branchList.index')  ? 'active' : '' }}"><span>শাখার তালিকা</span> </a>
</li>
@endif

@if ($usr->can('designationAdd') || $usr->can('designationView') ||  $usr->can('designationDelete') ||  $usr->can('designationUpdate'))
<li >
<a href="{{ route('designationList.index') }}" class="{{ Route::is('designationList.index')  ? 'active' : '' }}"><span>পদবীর তালিকা</span> </a>
</li>
@endif




      @if ($usr->can('userAdd') || $usr->can('userView') || $usr->can('userDelete') || $usr->can('userUpdate'))
      <li class="">
          <a href="{{ route('user.index') }}" class="{{ Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? 'active' : '' }}" data-key="t-one-page">কর্মকর্তার তথ্য যোগ করুন </a>
      </li>
      @endif

@if ($usr->can('assignedEmployee.view') || $usr->can('assignedEmployee.edit'))
<li >
<a href="{{ route('assignedEmployee.index') }}" class="{{ Route::is('assignedEmployee.index')  ? 'active' : '' }}"><span>কর্মকর্তাদের নিয়োগ দিন</span> </a>
</li>
@endif

 @if ($usr->can('employeeEndDate.view') || $usr->can('employeeEndDate.edit'))
          <li class="">
              <a href="{{ route('employeeEndDate') }}" class="{{ Route::is('employeeEndDate') ? 'active' : '' }}" data-key="t-one-page">কর্মকর্তাদের শেষ কর্মদিবস </a>
          </li>
          @endif








  </ul>
</li>
@else
<li class="dropdown">
<a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="users"></i><span>কর্মকর্তাদের তালিকা</span></a>
<ul class="nav-submenu menu-content">


    @if ($usr->can('branchAdd') || $usr->can('branchView') ||  $usr->can('branchDelete') ||  $usr->can('branchUpdate'))
    <li >
    <a href="{{ route('branchList.index') }}" class="{{ Route::is('branchList.index')  ? 'active' : '' }}"><span>শাখার তালিকা</span> </a>
    </li>
    @endif

    @if ($usr->can('designationAdd') || $usr->can('designationView') ||  $usr->can('designationDelete') ||  $usr->can('designationUpdate'))
    <li >
    <a href="{{ route('designationList.index') }}" class="{{ Route::is('designationList.index')  ? 'active' : '' }}"><span>পদবীর তালিকা</span> </a>
    </li>
    @endif




          @if ($usr->can('userAdd') || $usr->can('userView') || $usr->can('userDelete') || $usr->can('userUpdate'))
          <li class="">
              <a href="{{ route('user.index') }}" class="{{ Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? 'active' : '' }}" data-key="t-one-page">কর্মকর্তার তথ্য যোগ করুন </a>
          </li>
          @endif

          @if ($usr->can('assignedEmployee.view') || $usr->can('assignedEmployee.edit'))
          <li >
          <a href="{{ route('assignedEmployee.index') }}" class="{{ Route::is('assignedEmployee.index')  ? 'active' : '' }}"><span>কর্মকর্তাদের নিয়োগ দিন</span> </a>
          </li>
          @endif

   @if ($usr->can('employeeEndDate.view') || $usr->can('employeeEndDate.edit'))
          <li class="">
              <a href="{{ route('employeeEndDate') }}" class="{{ Route::is('employeeEndDate') ? 'active' : '' }}" data-key="t-one-page">কর্মকর্তাদের শেষ কর্মদিবস </a>
          </li>
          @endif


</ul>
</li>

@endif
@endif
<!-- employee info --->

@if ($usr->can('countryAdd') || $usr->can('countryView') ||  $usr->can('countryDelete') ||  $usr->can('countryUpdate') || $usr->can('permissionAdd') || $usr->can('permissionView') || $usr->can('permissionDelete') || $usr->can('permissionUpdate') || $usr->can('roleAdd') || $usr->can('roleView') || $usr->can('roleDelete') || $usr->can('roleUpdate') || $usr->can('systemInformationAdd') || $usr->can('systemInformationView') || $usr->can('systemInformationDelete') || $usr->can('systemInformationUpdate'))

                    <li class="sidebar-main-title">
                        <div>
                          <h6>অন্যান্য তথ্য</h6>
                        </div>
                      </li>

                      @if (Route::is('admin.civil_info') || Route::is('country.index') || Route::is('systemInformation.index') ||  Route::is('user.index') || Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('permission.index'))

                      <li class="dropdown">
                        <a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="settings"></i><span>সেটিং </span></a>
                        <ul class="nav-submenu menu-content" style="display: block;">

                            @if ($usr->can('systemInformationAdd') || $usr->can('systemInformationView') || $usr->can('systemInformationDelete') || $usr->can('systemInformationUpdate'))
                            <li class="">
                                <a href="{{ route('systemInformation.index') }}" class="{{ Route::is('systemInformation.index') ? 'active' : '' }}" data-key="t-calendar">জেনারেল সেটিং</a>
                            </li>
                            @endif

                            @if ($usr->can('roleAdd') || $usr->can('roleView') || $usr->can('roleDelete') || $usr->can('roleUpdate'))
                            <li class="">
                                <a href="{{ route('role.index') }}" class="{{ Route::is('role.index') || Route::is('role.edit') || Route::is('role.create') ? 'active' : '' }}" data-key="t-nft-landing">রোল</a>
                            </li>
                            @endif
                            @if ($usr->can('permissionAdd') || $usr->can('permissionView') || $usr->can('permissionDelete') || $usr->can('permissionUpdate'))
                            <li class="">
                                <a href="{{ route('permission.index') }}" class="{{ Route::is('permission.index') ? 'active' : '' }}"><span data-key="t-job">পারমিশন</span>
                            </a>
                            </li>
                            @endif




@if ($usr->can('countryAdd') || $usr->can('countryView') ||  $usr->can('countryDelete') ||  $usr->can('countryUpdate'))
<li >
       <a href="{{ route('country.index') }}" class="{{ Route::is('country.index')  ? 'active' : '' }}"><span>দেশের তালিকা</span> </a>
   </li>
@endif




                        </ul>
                    </li>
@else
<li class="dropdown">
    <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="settings"></i><span>সেটিং </span></a>
    <ul class="nav-submenu menu-content">


        @if ($usr->can('systemInformationAdd') || $usr->can('systemInformationView') || $usr->can('systemInformationDelete') || $usr->can('systemInformationUpdate'))
        <li class="">
            <a href="{{ route('systemInformation.index') }}" class="{{ Route::is('systemInformation.index') ? 'active' : '' }}" data-key="t-calendar">জেনারেল সেটিং</a>
        </li>
        @endif

        @if ($usr->can('roleAdd') || $usr->can('roleView') || $usr->can('roleDelete') || $usr->can('roleUpdate'))
        <li class="">
            <a href="{{ route('role.index') }}" class="{{ Route::is('role.index') || Route::is('role.edit') || Route::is('role.create') ? 'active' : '' }}" data-key="t-nft-landing">রোল</a>
        </li>
        @endif
        @if ($usr->can('permissionAdd') || $usr->can('permissionView') || $usr->can('permissionDelete') || $usr->can('permissionUpdate'))
        <li class="">
            <a href="{{ route('permission.index') }}" class="{{ Route::is('permission.index') ? 'active' : '' }}"><span data-key="t-job">পারমিশন</span>
        </a>
        </li>
        @endif
        @if ($usr->can('countryAdd') || $usr->can('countryView') ||  $usr->can('countryDelete') ||  $usr->can('countryUpdate'))
<li >
       <a href="{{ route('country.index') }}" class="{{ Route::is('country.index')  ? 'active' : '' }}"><span>দেশের তালিকা</span> </a>
   </li>
@endif


    </ul>
</li>

@endif
@endif

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>


