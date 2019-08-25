@extends('layouts.welc')

@section('title') Welcome @endsection
@section('content')
    <div class="title m-b-md">
        <b>Employee Tracking &amp; Monitoring HRMS</b>
    </div>

    <div class="links" style="font-weight: bold;">
        <a href="" style="color: #fff; text-shadow: 2px 2px black;" title="User Access Control &amp; Management">Users</a>
        <a href="" style="color: #fff; text-shadow: 2px 2px black;" title="Manage Disease Cases">Cases</a>
        <a href="" style="color: #fff; text-shadow: 2px 2px black;" title="Manage Client Referrals to Hospitals">Referrals</a>
        <a href="" style="color: #fff; text-shadow: 2px 2px black;" title="Track Clients' Drug Intake">Tracker</a>
        <a href="{{ route('terms') }}" style="color: #fff; text-shadow: 2px 2px black;" title="View System Terms and Conditions.">Terms &amp; Conditions</a>
    </div>
@endsection