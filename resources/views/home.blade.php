@extends('layouts.site')

@section('title') Home @endsection
@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" 
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" 
        crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" 
        integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" 
        crossorigin=""></script>
@endsection
@section('location')
    <h1>Welcome to your Dashboard</h1>
    <ol class="breadcrumb">
        <li class="active">
            <a href="#">
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Home
            </a>
        </li>
    </ol>
@endsection
<?php $remove[] = "'"; $remove[] = '"'; $remove[] = "-";?>
@section('content')
    @role(['super-admin','admin','human_resource','hr_admin'])
        @include('layouts.includes.admin_notify')
    @endrole
    <div class="number hidden" id="myTargetElement1"></div>
    <h4 class="hidden" id="myTargetElement1.1"></h4>
    <h4 class="hidden" id="myTargetElement1.2"></h4>
    <div class="number hidden" id="myTargetElement2"></div>
    <h4 class="hidden" id="myTargetElement2.1"></h4>
    <h4 class="hidden" id="myTargetElement2.2"></h4>
    <div class="number hidden" id="myTargetElement3"></div>
    <h4 class="hidden" id="myTargetElement3.1"></h4>
    <h4 class="hidden" id="myTargetElement3.2"></h4>
    <div class="number hidden" id="myTargetElement4"></div>
    <h4 class="hidden" id="myTargetElement4.1"></h4>
    <h4 class="hidden" id="myTargetElement4.2"></h4>
    <div class="row ">
        <div class="col-md-8 col-sm-6">
            <div class="panel panel-border">
                <div class="panel-heading">
                    <h3 class="panel-title visitor">
                        <i class="livicon" data-name="map" data-size="20" data-loop="true" data-c="#F89A14" data-hc="#F89A14"></i>
                        Client Tracking Map | 
                        <small> Find the location of all the registered clients</small>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <i class="livicon" data-name="settings" data-size="16" data-loop="true" data-c="#515763" data-hc="#515763"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a class="panel-collapse collapses" href="#">
                                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                        <span>Collapse</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="panel-config" href="#panel-config" data-toggle="modal">
                                        <i class="fa fa-wrench"></i>
                                        <span>Configurations</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </h3>
                </div>
                <div class="panel-body nopadmar">
                    <div id="map" style="width:100%; height:300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="panel panel-danger">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="livicon" data-name="mail" data-size="18" data-color="white" data-hc="white" data-l="true"></i> Send Message
                    </h4>
                </div>
                <div class="panel-body no-padding">
                    <div class="compose row">
                        <form action="{{ route('chats.store') }}" method="POST">
                            {{ csrf_field() }}

                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <input type="hidden" name="sender_id" value="{{ Auth::user()->id }}">

                            <input type="hidden" name="sen_email" value="{{ Auth::user()->email }}">

                            <input type="hidden" name="sen_name" value="{{ Auth::user()->name }}">

                            <label class="col-md-3 hidden-xs">To:</label>
                            <select name="receiver_id" class="col-md-9 col-xs-9" tabindex="1" style="padding: 5px; margin-bottom: 3px; border-radius: 5px;">
                                @foreach( \App\User::all() as $user)
                                    <option  value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="sending_profile" value="{{ Auth::user()->role }}">
                            <div class="clear"></div>

                            <label class="col-md-3 hidden-xs">Subject:</label>
                            <input type="text" name="topic" class="col-md-9 col-xs-9" tabindex="1" placeholder="Subject" required />

                            <div class="clear"></div>

                            <div class='box-body'>
                                <textarea name="description" class="textarea textarea_home resize_vertical" placeholder="Write message content here" required></textarea>                                
                            </div>

                            <br />
                            <div class="pull-right">
                                <button type="submit" class="btn btn-danger">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        var cities = L.layerGroup();

        regions = {{ str_replace( $remove, "", $gpsponts) }};

        @for ($i = 0; $i<$ptNum; $i++)
        L.marker(regions[{{ $i }}]).bindPopup('Reported Incident.').addTo(cities)@if($i<($ptNum-1)),
@else;
@endif
        @endfor

        var mbAttr = 'Map data &copy; {{ config('app.name') }}, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a> ',
            mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
        var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr}),
            streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});
        var map = L.map('map', {
            center: [1.735574, 32.662354],
            zoom: 5.5,
            layers: [grayscale, cities]
        });
        var baseLayers = {
            "Grayscale": grayscale,
            "Streets": streets
        };
        var overlays = {
            "Cities": cities
        };
        L.control.layers(baseLayers, overlays).addTo(map);

    </script>
@endsection