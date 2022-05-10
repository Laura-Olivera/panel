@extends('layouts.app')

@section('styles')
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{ URL::asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
@endsection

@section('content')
>
@endsection

@section('scripts')
<!--begin::Page Vendors(used by this page)-->
<script src="{{ URL::asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ URL::asset('assets/js/pages/widgets.js')}}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection