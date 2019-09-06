<!-- notify.blade.php -->
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
        <!-- Trans label pie charts strats here-->
        <div class="lightbluebg no-radius">
            <div class="panel-body squarebox square_boxs">
                <div class="col-xs-12 pull-left nopadmar">
                    <div class="row">
                        <div class="square_box col-xs-7 pull-left">
                            <span>Live Activities</span>
                            <div class="number">0</div>
                        </div>
                        <i class="livicon  pull-right" data-name="list" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#"><small class="stat-label text-white" style="color: #fff">Details</small></a>
                            <h4>Out of: 0</h4>
                        </div>
                        <div class="col-xs-6 text-right">
                            <small class="stat-label"><a href="#" style="color: #fff">Add New</a></small>
                            <h4>Total: 0</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
        <!-- Trans label pie charts strats here-->
        <div class="redbg no-radius">
            <div class="panel-body squarebox square_boxs">
                <div class="col-xs-12 pull-left nopadmar">
                    <div class="row">
                        <div class="square_box col-xs-7 pull-left">
                            <span>Disease Cases</span>
                            <div class="number">0</div>
                        </div>
                        <i class="livicon pull-right" data-name="user-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#"><small class="stat-label text-white" style="color: white;">Details</small></a>
                            <h4>Out of: {{ App\Models\DiseaseCase::where('status', strtolower('active'))->get()->count() }}</h4>
                        </div>
                        <div class="col-xs-6 text-right">
                            <small class="stat-label"><a href="#" style="color: #fff">Add New</a></small>
                            <h4>Total: {{ App\Models\DiseaseCase::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
        <!-- Trans label pie charts strats here-->
        <div class="goldbg no-radius">
            <div class="panel-body squarebox square_boxs">
                <div class="col-xs-12 pull-left nopadmar">
                    <div class="row">
                        <div class="square_box col-xs-7 pull-left">
                            <span> Nurses </span>
                            <div class="number">{{ App\User::where('role','nurse')->count() }}</div>
                        </div>
                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#"><small class="stat-label text-white" style="color: white;">Details</small></a>
                            <h4>Out of: {{ App\User::all()->count() }}</h4>
                        </div>
                        <div class="col-xs-6 text-right">
                            <small class="stat-label"><a href="#" style="color: #fff">View All</a></small>
                            <h4>Total: {{ App\User::where('role','nurse')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
        <!-- Trans label pie charts strats here-->
        <div class="palebluecolorbg no-radius">
            <div class="panel-body squarebox square_boxs">
                <div class="col-xs-12 pull-left nopadmar">
                    <div class="row">
                        <div class="square_box col-xs-7 pull-left">
                            <span> Clients </span>
                            <div class="number">{{ App\User::all()->count() }}</div>
                        </div>
                        <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ route('users.index') }}"><small class="stat-label text-white" style="color: white;">Details</small></a>
                            <h4>Out of: {{ App\User::where('role','client')->count() }}</h4>
                        </div>
                        <div class="col-xs-6 text-right">
                            <small class="stat-label"><a href="{{ route('users.create') }}" style="color: #fff">Add New</a></small>
                            <h4">Total: {{ App\User::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>