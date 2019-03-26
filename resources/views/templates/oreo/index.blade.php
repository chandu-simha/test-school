<!doctype html>
<html class="no-js " lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>:: School :: - @yield('title')
</title>
<link rel="icon" href="{{env('TML_URL')}}/favicon.ico" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{env('TML_URL')}}/assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{env('TML_URL')}}/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<link rel="stylesheet" href="{{env('TML_URL')}}/assets/plugins/morrisjs/morris.min.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{env('TML_URL')}}/assets/css/main.css">
<link rel="stylesheet" href="{{env('TML_URL')}}/assets/css/color_skins.css">
</head>
<body class="theme-green">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{env('TML_URL')}}/assets/images/logo.svg" width="48" height="48" alt="School"></div>
        <p>Please wait...</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li class="hidden-sm-down">
            <div class="input-group" style='display: none;'>                
                <input type="text" class="form-control" placeholder="Search..." >
                <span class="input-group-addon">
                    <i class="zmdi zmdi-search"></i>
                </span>
            </div>
        </li>        
        <li>
            <div class="navbar-header" style='padding-top: 13px;'>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{env('TML_URL')}}/index.html"><img src="{{env('TML_URL')}}/assets/images/logo.svg" width="30" alt="School"><span class="m-l-10">School</span></a>
            </div>
        </li>        
        <li class="float-right">
            <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true"><i class="zmdi zmdi-fullscreen"></i></a>
            <!--  -->
            <a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>
            @guest
            <a  href="{{ route('login') }}" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a>
            @else

            @if (Route::has('register') && Auth::user()->fk_role_id ==  1)
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            <a  class="mega-menu" data-close="true" href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="zmdi zmdi-power"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest
        </li>
    </ul>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
   <!--  <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="{{env('TML_URL')}}/#dashboard"><i class="zmdi zmdi-home m-r-5"></i>School</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{env('TML_URL')}}/#user"><i class="zmdi zmdi-account m-r-5"></i>User</a></li>
    </ul> -->
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="{{env('TML_URL')}}/profile.html"><img src="{{env('TML_URL')}}/assets/images/profile_av.jpg" alt="User"></a></div>
                            <div class="detail">
                                <h4>Michael</h4><!-- 
                                <small>UI UX Designer</small>    -->                     
                            </div>
                           <!--  <a title="facebook" href="{{env('TML_URL')}}/#"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="twitter" href="{{env('TML_URL')}}/#"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="instagram" href="{{env('TML_URL')}}/#"><i class="zmdi zmdi-instagram"></i></a>       -->                      
                        </div>
                    </li>
                    <li class="header">MAIN</li>
                    @if (auth()->user()->fk_role_id != 1)
                    <li class="active open"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
                        <ul class="ml-menu">
                            <li class="active"><a href="{{env('TML_URL')}}/index.html">Main</a> </li>
                            <li><a href="{{env('TML_URL')}}/dashboard-rtl.html">RTL</a></li>
                            <li><a href="{{env('TML_URL')}}/index2.html">Horizontal</a></li>
                            <li><a href="{{env('TML_URL')}}/ec-dashboard.html">Ecommerce</a></li>
                            <li><a href="{{env('TML_URL')}}/blog-dashboard.html">Blog</a></li>
                        </ul>
                    </li>
                    @endif
                    <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>App</span> </a>
                        <ul class="ml-menu">
                            <li><a href="{{env('TML_URL')}}/mail-inbox.html">Inbox</a></li>
                            <li><a href="{{env('TML_URL')}}/chat.html">Chat</a></li>
                            <li><a href="{{env('TML_URL')}}/events.html">Calendar</a></li>
                            <li><a href="{{env('TML_URL')}}/file-dashboard.html">File Manager</a></li>
                            <li><a href="{{env('TML_URL')}}/contact.html">Contact list</a></li>
                            <li><a href="{{env('TML_URL')}}/blog-dashboard.html">Blog</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Ecommerce</span> </a>
                        <ul class="ml-menu">
                            <li> <a href="{{env('TML_URL')}}/ec-dashboard.html">Dashboard</a></li>
                            <li> <a href="{{env('TML_URL')}}/ec-product.html">Product</a></li>
                            <li> <a href="{{env('TML_URL')}}/ec-product-List.html">Product List</a></li>
                            <li> <a href="{{env('TML_URL')}}/ec-product-detail.html">Product detail</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>User Interface (UI)</span> </a>
                        <ul class="ml-menu">
                            <li> <a href="{{env('TML_URL')}}/ui_kit.html">UI KIT</a> </li>                    
                            <li> <a href="{{env('TML_URL')}}/alerts.html">Alerts</a> </li>                    
                            <li> <a href="{{env('TML_URL')}}/collapse.html">Collapse</a> </li>
                            <li> <a href="{{env('TML_URL')}}/colors.html">Colors</a> </li>
                            <li> <a href="{{env('TML_URL')}}/dialogs.html">Dialogs</a> </li>
                            <li> <a href="{{env('TML_URL')}}/icons.html">Icons</a> </li>                    
                            <li> <a href="{{env('TML_URL')}}/list-group.html">List Group</a> </li>
                            <li> <a href="{{env('TML_URL')}}/media-object.html">Media Object</a> </li>
                            <li> <a href="{{env('TML_URL')}}/modals.html">Modals</a> </li>
                            <li> <a href="{{env('TML_URL')}}/notifications.html">Notifications</a></li>                    
                            <li> <a href="{{env('TML_URL')}}/progressbars.html">Progress Bars</a></li>
                            <li> <a href="{{env('TML_URL')}}/range-sliders.html">Range Sliders</a></li>
                            <li> <a href="{{env('TML_URL')}}/sortable-nestable.html">Sortable & Nestable</a></li>
                            <li> <a href="{{env('TML_URL')}}/tabs.html">Tabs</a></li>
                            <li> <a href="{{env('TML_URL')}}/waves.html">Waves</a></li>
                        </ul>
                    </li>
                    <li class="header">FORMS, CHARTS, TABLES</li>
                    <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Forms</span> </a>
                        <ul class="ml-menu">
                            <li><a href="{{env('TML_URL')}}/basic-form-elements.html">Basic Elements</a> </li>
                            <li><a href="{{env('TML_URL')}}/advanced-form-elements.html">Advanced Elements</a> </li>
                            <li><a href="{{env('TML_URL')}}/form-examples.html">Form Examples</a> </li>
                            <li><a href="{{env('TML_URL')}}/form-validation.html">Form Validation</a> </li>
                            <li><a href="{{env('TML_URL')}}/form-wizard.html">Form Wizard</a> </li>
                            <li><a href="{{env('TML_URL')}}/form-editors.html">Editors</a> </li>
                            <li><a href="{{env('TML_URL')}}/form-upload.html">File Upload</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-grid"></i><span>Tables</span> </a>
                        <ul class="ml-menu">                        
                            <li> <a href="{{env('TML_URL')}}/normal-tables.html">Normal Tables</a> </li>
                            <li> <a href="{{env('TML_URL')}}/jquery-datatable.html">Jquery Datatables</a> </li>
                            <li> <a href="{{env('TML_URL')}}/editable-table.html">Editable Tables</a> </li>
                            <li> <a href="{{env('TML_URL')}}/footable.html">Foo Tables</a> </li>
                            <li> <a href="{{env('TML_URL')}}/table-color.html">Tables Color</a> </li>
                        </ul>
                    </li>            
                    <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>Charts</span> </a>
                        <ul class="ml-menu">
                            <li> <a href="{{env('TML_URL')}}/morris.html">Morris</a> </li>
                            <li> <a href="{{env('TML_URL')}}/flot.html">Flot</a> </li>
                            <li> <a href="{{env('TML_URL')}}/chartjs.html">ChartJS</a> </li>
                            <li> <a href="{{env('TML_URL')}}/sparkline.html">Sparkline</a> </li>
                            <li> <a href="{{env('TML_URL')}}/jquery-knob.html">Jquery Knob</a> </li>
                        </ul>
                    </li>
                    <li class="header">EXTRA COMPONENTS</li>                    
                    <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Widgets</span> </a>
                        <ul class="ml-menu">
                            <li><a href="{{env('TML_URL')}}/widgets-app.html">Apps Widgetse</a></li>
                            <li><a href="{{env('TML_URL')}}/widgets-data.html">Data Widgetse</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-lock"></i><span>Authentication</span> </a>
                        <ul class="ml-menu">
                            <li><a href="{{env('TML_URL')}}/sign-in.html">Sign In</a> </li>
                            <li><a href="{{env('TML_URL')}}/sign-up.html">Sign Up</a> </li>
                            <li><a href="{{env('TML_URL')}}/forgot-password.html">Forgot Password</a> </li>
                            <li><a href="{{env('TML_URL')}}/404.html">Page 404</a> </li>
                            <li><a href="{{env('TML_URL')}}/500.html">Page 500</a> </li>
                            <li><a href="{{env('TML_URL')}}/page-offline.html">Page Offline</a> </li>
                            <li><a href="{{env('TML_URL')}}/locked.html">Locked Screen</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Sample Pages</span> </a>
                        <ul class="ml-menu">
                            <li><a href="{{env('TML_URL')}}/blank.html">Blank Page</a> </li>
                            <li> <a href="{{env('TML_URL')}}/image-gallery.html">Image Gallery</a> </li>
                            <li><a href="{{env('TML_URL')}}/profile.html">Profile</a></li>
                            <li><a href="{{env('TML_URL')}}/timeline.html">Timeline</a></li>
                            <li><a href="{{env('TML_URL')}}/pricing.html">Pricing</a></li>
                            <li><a href="{{env('TML_URL')}}/invoices.html">Invoices</a></li>
                            <li><a href="{{env('TML_URL')}}/search-results.html">Search Results</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-map"></i><span>Maps</span> </a>
                        <ul class="ml-menu">
                            <li> <a href="{{env('TML_URL')}}/google.html">Google Map</a> </li>
                            <li> <a href="{{env('TML_URL')}}/yandex.html">YandexMap</a> </li>
                            <li> <a href="{{env('TML_URL')}}/jvectormap.html">jVectorMap</a> </li>
                        </ul>
                    </li>
                    <li class="header">Extra</li>
                    <li>
                        <div class="progress-container progress-primary m-t-10">
                            <span class="progress-badge">Traffic this Month</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;">
                                    <span class="progress-value">67%</span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-container progress-info">
                            <span class="progress-badge">Server Load</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                                    <span class="progress-value">86%</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-pane stretchLeft" id="user">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info m-b-20 p-b-15">
                            <div class="image"><a href="{{env('TML_URL')}}/profile.html"><img src="{{env('TML_URL')}}/assets/images/profile_av.jpg" alt="User"></a></div>
                            <div class="detail">
                                <h4>Michael</h4>
                                <small>UI UX Designer</small>                        
                            </div>
                            <a title="facebook" href="{{env('TML_URL')}}/#"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="twitter" href="{{env('TML_URL')}}/#"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="instagram" href="{{env('TML_URL')}}/#"><i class="zmdi zmdi-instagram"></i></a>
                            <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                            <div class="row">
                                <div class="col-4">
                                    <h5 class="m-b-5">852</h5>
                                    <small>Following</small>
                                </div>
                                <div class="col-4">
                                    <h5 class="m-b-5">13k</h5>
                                    <small>Followers</small>
                                </div>
                                <div class="col-4">
                                    <h5 class="m-b-5">234</h5>
                                    <small>Post</small>
                                </div>                            
                            </div>
                        </div>
                    </li>
                    <li>
                        <small class="text-muted">Email address: </small>
                        <p>michael@gmail.com</p>
                        <hr>
                        <small class="text-muted">Phone: </small>
                        <p>+ 202-555-0191</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li>
                                <div>Photoshop</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%"> <span class="sr-only">62% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Wordpress</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-green " role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%"> <span class="sr-only">87% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>HTML 5</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">32% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Angular</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blush" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%"> <span class="sr-only">56% Complete</span> </div>
                                </div>
                            </li>
                        </ul>                        
                    </li>
                </ul>
            </div>
        </div>
    </div>    
</aside>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="{{env('TML_URL')}}/#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{env('TML_URL')}}/#chat"><i class="zmdi zmdi-comments"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{env('TML_URL')}}/#activity">Activity</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane slideRight active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <div class="checkbox">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1">Report Panel Usage</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox2" type="checkbox" checked="">
                                <label for="checkbox2">Email Redirect</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox3" type="checkbox" checked="">
                                <label for="checkbox3">Notifications</label>
                            </div>                        
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox4" type="checkbox" checked="">
                                <label for="checkbox4">Auto Updates</label>
                            </div>
                        </li>
                    </ul>
                </div>                
                <div class="card">
                    <h6>Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple" class="active">
                            <div class="purple"></div>
                        </li>                   
                        <li data-theme="blue">
                            <div class="blue"></div>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>                    
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div>                    
                        </li>
                    </ul>                    
                </div>
                <div class="card">
                    <h6>Account Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <div class="checkbox">
                                <input id="checkbox5" type="checkbox" checked="">
                                <label for="checkbox5">Offline</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox6" type="checkbox" checked="">
                                <label for="checkbox6">Location Permission</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card theme-light-dark">
                    <h6>Left Menu</h6>
                    <button class="t-light btn btn-default btn-simple btn-round btn-block">Light</button>
                    <button class="t-dark btn btn-default btn-round btn-block">Dark</button>
					<button class="m_img_btn btn btn-primary btn-round btn-block">Sidebar Image</button>                    
                </div>                
                <div class="card">
                    <h6>Information Summary</h6>
                    <div class="row m-b-20">
                        <div class="col-7">                            
                            <small class="displayblock">MEMORY USAGE</small>
                            <h5 class="m-b-0 h6">512</h5>
                        </div>
                        <div class="col-5">
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="5" data-bar-Spacing="3" data-bar-Color="#00ced1">8,7,9,5,6,4,6,8</div>
                        </div>
                    </div>
                    <div class="row m-b-20">
                        <div class="col-7">                            
                            <small class="displayblock">CPU USAGE</small>
                            <h5 class="m-b-0 h6">90%</h5>
                        </div>
                        <div class="col-5">
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="5" data-bar-Spacing="3" data-bar-Color="#F15F79">6,5,8,2,6,4,6,4</div>
                        </div>
                    </div>
                    <div class="row m-b-20">
                        <div class="col-7">                            
                            <small class="displayblock">DAILY TRAFFIC</small>
                            <h5 class="m-b-0 h6">25 142</h5>
                        </div>
                        <div class="col-5">
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="5" data-bar-Spacing="3" data-bar-Color="#78b83e">7,5,8,7,4,2,6,5</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">                            
                            <small class="displayblock">DISK USAGE</small>
                            <h5 class="m-b-0 h6">60.10%</h5>
                        </div>
                        <div class="col-5">
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="5" data-bar-Spacing="3" data-bar-Color="#457fca">7,5,2,5,6,7,6,4</div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>       
        <div class="tab-pane right_chat stretchLeft" id="chat">
            <div class="slim_scroll">
                <div class="card">
                    <div class="search">                        
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Recent</h6>
                    <ul class="list-unstyled">
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Sophia</span>
                                        <span class="message">There are many variations of passages of Lorem Ipsum available</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Grayson</span>
                                        <span class="message">All the Lorem Ipsum generators on the</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Isabella</span>
                                        <span class="message">Contrary to popular belief, Lorem Ipsum</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="me">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">John</span>
                                        <span class="message">It is a long established fact that a reader</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Alexander</span>
                                        <span class="message">Richard McClintock, a Latin professor</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>                        
                    </ul>
                </div>
                <div class="card">
                    <h6>Contacts</h6>
                    <ul class="list-unstyled">
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar10.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar6.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar7.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar8.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar9.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{env('TML_URL')}}/assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane slideLeft" id="activity">
            <div class="slim_scroll">
                <div class="card user_activity">
                    <h6>Recent Activity</h6>
                    <div class="streamline b-accent">
                        <div class="sl-item">
                            <img class="user rounded-circle" src="{{env('TML_URL')}}/assets/images/xs/avatar4.jpg" alt="">
                            <div class="sl-content">
                                <h5 class="m-b-0">Admin Birthday</h5>
                                <small>Jan 21 <a href="javascript:void(0);" class="text-info">Sophia</a>.</small>
                            </div>
                        </div>
                        <div class="sl-item">
                            <img class="user rounded-circle" src="{{env('TML_URL')}}/assets/images/xs/avatar5.jpg" alt="">
                            <div class="sl-content">
                                <h5 class="m-b-0">Add New Contact</h5>
                                <small>30min ago <a href="javascript:void(0);">Alexander</a>.</small>
                                <small><strong>P:</strong> +264-625-2323</small>
                                <small><strong>E:</strong> maryamamiri@gmail.com</small>
                            </div>
                        </div>
                        <div class="sl-item">
                            <img class="user rounded-circle" src="{{env('TML_URL')}}/assets/images/xs/avatar6.jpg" alt="">
                            <div class="sl-content">
                                <h5 class="m-b-0">Code Change</h5>
                                <small>Today <a href="javascript:void(0);">Grayson</a>.</small>
                                <small>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</small>
                            </div>
                        </div>
                        <div class="sl-item">
                            <img class="user rounded-circle" src="{{env('TML_URL')}}/assets/images/xs/avatar7.jpg" alt="">
                            <div class="sl-content">
                                <h5 class="m-b-0">New Email</h5>
                                <small>45min ago <a href="javascript:void(0);" class="text-info">Fidel Tonn</a>.</small>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="card">
                    <h6>Recent Attachments</h6>
                    <ul class="list-unstyled activity">
                        <li>
                            <a href="{{env('TML_URL')}}/javascript:void(0)">
                                <i class="zmdi zmdi-collection-pdf l-blush"></i>                    
                                <div class="info">
                                    <h4>info_258.pdf</h4>                    
                                    <small>2MB</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{env('TML_URL')}}/javascript:void(0)">
                                <i class="zmdi zmdi-collection-text l-amber"></i>                    
                                <div class="info">
                                    <h4>newdoc_214.doc</h4>                    
                                    <small>900KB</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{env('TML_URL')}}/javascript:void(0)">
                                <i class="zmdi zmdi-image l-parpl"></i>                    
                                <div class="info">
                                    <h4>MG_4145.jpg</h4>                    
                                    <small>5.6MB</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{env('TML_URL')}}/javascript:void(0)">
                                <i class="zmdi zmdi-image l-parpl"></i>                    
                                <div class="info">
                                    <h4>MG_4100.jpg</h4>                    
                                    <small>5MB</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{env('TML_URL')}}/javascript:void(0)">
                                <i class="zmdi zmdi-collection-text l-amber"></i>                    
                                <div class="info">
                                    <h4>Reports_end.doc</h4>                    
                                    <small>780KB</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{env('TML_URL')}}/javascript:void(0)">
                                <i class="zmdi zmdi-videocam l-turquoise"></i>                    
                                <div class="info">
                                    <h4>movie2018.MKV</h4>                    
                                    <small>750MB</small>
                                </div>
                            </a>
                        </li>                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- Main Content -->
<section class="content home">
    @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
    @yield('content')
</section>
<!-- Jquery Core Js --> 
<script src="{{env('TML_URL')}}/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{env('TML_URL')}}/assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{env('TML_URL')}}/assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="{{env('TML_URL')}}/assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="{{env('TML_URL')}}/assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob, Count To, Sparkline Js -->

<script src="{{env('TML_URL')}}/assets/bundles/mainscripts.bundle.js"></script>
<script src="{{env('TML_URL')}}/assets/js/pages/index.js"></script>
</body>
</html>