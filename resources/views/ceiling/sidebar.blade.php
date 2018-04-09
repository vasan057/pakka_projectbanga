@php $role_sidebar = Auth::user()->roles_id; @endphp
@if($role_sidebar == 1) @include('layouts.sidebar_admin') @endif
@if($role_sidebar == 2) @include('layouts.sidebar_pakka') @endif
@if($role_sidebar == 3) @include('layouts.sidebar_fecilitator') @endif
@if($role_sidebar == 4) @include('layouts.sidebar_ubp') @endif
