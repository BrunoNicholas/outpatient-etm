@extends('layouts.site')

@section('title') Disease Case Records @endsection
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/buttons.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/colReorder.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/rowReorder.bootstrap.c') }}ss">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/buttons.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/scroller.bootstrap.css') }}" />
@endsection
@section('location')
	<h1>The Diseases Stored In The System</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Home
            </a>
        </li>
        <li class="{{ route('diseases.index') }}">
            <a href="#">
                <i class="livicon" data-name="bug" data-size="14" data-color="#333" data-hovercolor="#333"></i> Disease Records
            </a>
        </li>
        <li class="{{ route('cases.index') }}">
            <a href="#">
                <i class="livicon" data-name="bug" data-size="14" data-color="#333" data-hovercolor="#333"></i> Disease Cases
            </a>
        </li>
        <li class="active">
            <a href="javascript:void(0)">
                <i class="livicon" data-name="bug" data-size="14" data-color="#333" data-hovercolor="#333"></i> Case Record Details
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row ">
        <div class="col-md-9 col-sm-8">
            <div class="panel panel-danger filterable">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <i class="livicon" data-name="bug" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Disease Cases Records
                    </h3>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Validity/Reference</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Validity/Reference</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i=0; ?>
                            @if($case->case_name)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b>Disease Case Name: </b></td>
                                    <td>{{ $case->case_name }}</td>
                                    <td class="text-center">Required for identity</td>
                                </tr>
                            @endif
                            @if($case->case_id)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b>Disease Case ID: </b></td>
                                    <td>{{ $case->case_id }}</td>
                                    <td class="text-center">Required for identity</td>
                                </tr>
                            @endif
                            @if($case->disease_id)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b>Disease Reference: </b></td>
                                    <td>{{ App\Models\Disease::where('id',$case->disease_id)->first()->disease_name }}</td>
                                    <td class="text-center"><a href="{{ route('diseases.show',$case->disease_id) }}"><button class="btn btn-danger btn-xs">Go to Record</button></a></td>
                                </tr>
                            @endif
                            @if($case->treatment_plan)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b> Treatment Plan: </b></td>
                                    <td>{{ $case->treatment_plan }}</td>
                                    <td class="text-center">Required for study</td>
                                </tr>
                            @endif
                            @if($case->description)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b> Case Description: </b></td>
                                    <td><textarea class="form-control" rows="5" disabled style="border: none; background-color: #fff;">{{ $case->description }}</textarea></td>
                                    <td class="text-center">Required for clarity</td>
                                </tr>
                            @endif
                            @if($case->status)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b> Case Status: </b></td>
                                    <td>{{ $case->status }}</td>
                                    <td class="text-center">Required for identity</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-body">
                    <h4 class="card-title text-center"> Operations | {{ config('app.name') }} </h4>
                    <h6 class="card-subtitle"></h6>
                    @role(['super-admin','admin'])
                        <hr />
                        <a href="{{ route('cases.edit', $case->id) }}" class="btn btn-info btn-block">Edit Record</a>
                    @endrole
                    <div class="row text-center">
                        <hr>
                        @role(['super-admin','admin'])
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('cases.index') }}" class="btn btn-primary btn-rounded btn-block"> Back </a>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('cases.destroy', $case->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="tools">
                                        <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                            onclick="return confirm('You are about to delete this case record!\nThis is not reversible!')" title="Delete disea record completely"> Delete </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endrole
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
	<script type="text/javascript" src="{{ asset('app/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/jeditable/js/jquery.jeditable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.colReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.rowReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/buttons.colVis.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/buttons.html5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/buttons.print.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/buttons.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/pdfmake.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.scroller.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/js/pages/table-advanced.js') }}"></script>
@endsection