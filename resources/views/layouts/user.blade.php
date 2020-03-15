<!doctype html>
<html class="no-js" lang="en" dir="@lang('home.dir')">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('/css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/calendar/fullcalendar.print.min.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="{{asset('/ajax/libs/jquery/1.7.1/jquery.min.js')}}"></script>

    <style>
        @media only screen and (min-width: 1100px) {

            .num{
                background: red;
                padding: 7px;
                color: white;
                border-radius: 50%;
                font-family: fantasy;
                }
                .header-top-area
                {
                  @lang('home.left'): 200px;
                  @lang('home.right'): 0;
                }
                .header-right-info .navbar-nav
                {
                  float: @lang('home.right');
                }
                .col-lg-1,.col-lg-5,.col-lg-6,.col-lg-3
                {
                  float: @lang('home.left');
                }
              .all-content-wrapper {
            margin-@lang('home.left'): 200px;
            margin-@lang('home.right'): 0px;
            }
            .mini-navbar .all-content-wrapper {
            margin-@lang('home.left'): 80px;
            margin-@lang('home.right'): 0px;
            transition: all 0.3s;
        }
        .mini-navbar .header-top-area{
            @lang('home.left'): 80px;
          @lang('home.right'): 0px;
          }
          body
          {
            font-family: cursive;
          }
          th {
            text-align:@lang('home.left');
            }
            }
            .add-product a {
                @lang('home.right'):35px;
            }
    </style>
        <link rel="stylesheet" href="{{asset('/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('/css/maine.css')}}">

</head>

<body>
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="#"><img class="main-logo" src="{{asset('/img/logo/logo.png')}}" alt="" /></a>
                <strong><a href="#"><img src="{{asset('/img/logo/logosn.png')}}" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        @if(auth()->user()->role=='admin')
                        <li>
                            <a class="Landing Page" href="/setting" aria-expanded="false">@lang('home.setting')</a>
                        </li>
                        <li>
                            <a title="@lang('home.parentgroups')" href="/parentgroup" aria-expanded="false"><span class="mini-click-non">@lang('home.parentgroups')</span></a>
                        </li>
                        <li>
                            <a title="@lang('home.groups')" href="/group" aria-expanded="false"><span class="mini-click-non">@lang('home.groups')</span></a>
                        </li>
                        <li>
                            <a title="@lang('home.sectiongroup')" href="/sectiongroup" aria-expanded="false"><span class="mini-click-non">@lang('home.sectiongroup')</span></a>
                        </li>
                        <li>
                            <a title="@lang('home.students')" href="/student" aria-expanded="false"><span class="mini-click-non"> @lang('home.students')</span></a>
                        </li>
                        <li>
                            <a title="@lang('home.teachers')" href="/teacher" aria-expanded="false"><span class="mini-click-non"> @lang('home.teachers')</span></a>
                        </li>
                        <li>
                            <a title="@lang('home.teacherassistants')" href="/teacherassistant" aria-expanded="false"><span class="mini-click-non"> @lang('home.teacherassistants')</span></a>
                        </li>
                        <li>
                            <a title="@lang('home.subjects')" href="/subject" aria-expanded="false"><span class="mini-click-non"> @lang('home.subjects')</span></a>
                        </li>
                        <li>
                            <a title="@lang('home.sections')" href="/section" aria-expanded="false"><span class="mini-click-non"> @lang('home.sections')</span></a>
                        </li>
                        @endif
                        @if(auth()->user()->role=='teacher')
                        <li>
                            <a title="@lang('home.exams')" href="/exam" aria-expanded="false"> @lang('home.exams')</a>
                        </li>
                        <li>
                             <a title="@lang('home.results')" href="/resultexams" aria-expanded="false"> @lang('home.results')</a>
                        </li>
                        <li>
                             <a title="@lang('home.mytable')" href="/mysubjecttable" aria-expanded="false"> @lang('home.mytable')</a>
                        </li>
                        <li>
                              <a title="@lang('home.contents')" href="/content" aria-expanded="false"> @lang('home.contents')</a>
                        </li>
                        @endif
                        @if(auth()->user()->role=='teacherassistant')
                        <li>
                            <a title="@lang('home.exams')" href="/sectionexam" aria-expanded="false"> @lang('home.exams')</a>
                        </li>
                        <li>
                             <a title="@lang('home.results')" href="/resultsectionexams" aria-expanded="false"> @lang('home.results')</a>
                        </li>
                        <li>
                             <a title="@lang('home.mytable')" href="/mysectiontable" aria-expanded="false"> @lang('home.mytable')</a>
                        </li>
                        <li>
                              <a title="@lang('home.sectioncontents')" href="/sectioncontent" aria-expanded="false"> @lang('home.sectioncontents')</a>
                        </li>
                        @endif
                        @if(auth()->user()->role=='student')
                        <li>
                            <a title="@lang('home.exams')" href="/exams" aria-expanded="false"> @lang('home.exams')</a>
                        </li>
                        <li>
                            <a title="@lang('home.sectionexams')" href="/sectionexams" aria-expanded="false"> @lang('home.sectionexams')</a>
                        </li>
                        <li>
                             <a title="@lang('home.myresults')" href="/results" aria-expanded="false"> @lang('home.myresults')</a>
                        </li>
                        <li>
                            <a title="@lang('home.mysectionresults')" href="/sectionresults" aria-expanded="false"> @lang('home.mysectionresults')</a>
                       </li>
                        <li>
                             <a title="@lang('home.mytable')" href="/mytable" aria-expanded="false"> @lang('home.mytable')</a>

                        </li>
                        <li class="">
                                <a class="has-arrow" href="/" aria-expanded="false">
                                       <span class="mini-click-non">@lang('home.contents')</span>
                                    </a>
                                <ul class="submenu-angle collapse" aria-expanded="true" style="height: 0px;">
                                    @foreach (auth()->user()->group->subject as $subject)
                                        <li style="text-align: center;"><a title="" href="/mysubjectcontent/{{$subject->id}}"><span class="mini-sub-pro">{{$subject->name}}</span></a></li>
                                    @endforeach
                              </ul>
                         </li>
                         <li class="">
                            <a class="has-arrow" href="/" aria-expanded="false">
                                   <span class="mini-click-non">@lang('home.sectioncontents')</span>
                                </a>
                            <ul class="submenu-angle collapse" aria-expanded="true" style="height: 0px;">
                                @foreach (auth()->user()->group->subject as $subject)
                                    <li style="text-align: center;"><a title="" href="/mysectioncontent/{{$subject->id}}"><span class="mini-sub-pro">{{$subject->name}}</span></a></li>
                                @endforeach
                            </ul>
                         </li>
                        @endif
                        <li>
                            <a title="@lang('home.myinformation')" href="/myinformation" aria-expanded="false"> @lang('home.myinformation')</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="#"><img class="main-logo" src="{{asset('/img/logo/logo.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<img src="{{auth()->user()->imagepass()}}" alt="" style="height:35px; width:40px;"/>
															<span class="admin-name">{{auth()->user()->name}}</span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                      document.getElementById('logout-form').submit();">
                                                        <span class="edu-icon edu-locked author-log-ic"></span> {{ __('Logout') }}
                                                     </a></li>

                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                         @csrf
                                                     </form>

                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    @if (app()->getlocale()=='en')
                                                    <a href="/lang/ar">عربي</a>
                                                    @endif
                                                    @if (app()->getlocale()=='ar')
                                                    <a href="/lang/en">English</a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        @if(auth()->user()->role=='admin')
                                        <li>
                                            <a class="Landing Page" href="/setting" aria-expanded="false">@lang('home.setting')</a>
                                        </li>
                                        <li>
                                            <a title="@lang('home.parentgroups')" href="/parentgroup" aria-expanded="false"><span class="mini-click-non">@lang('home.parentgroups')</span></a>
                                        </li>
                                        <li>
                                            <a title="@lang('home.groups')" href="/group" aria-expanded="false"><span class="mini-click-non">@lang('home.groups')</span></a>
                                        </li>
                                        <li>
                                            <a title="@lang('home.sectiongroup')" href="/sectiongroup" aria-expanded="false"><span class="mini-click-non">@lang('home.sectiongroup')</span></a>
                                        </li>
                                        <li>
                                            <a title="@lang('home.students')" href="/student" aria-expanded="false"><span class="mini-click-non"> @lang('home.students')</span></a>
                                        </li>
                                        <li>
                                            <a title="@lang('home.teachers')" href="/teacher" aria-expanded="false"><span class="mini-click-non"> @lang('home.teachers')</span></a>
                                        </li>
                                        <li>
                                            <a title="@lang('home.teacherassistants')" href="/teacherassistant" aria-expanded="false"><span class="mini-click-non"> @lang('home.teacherassistants')</span></a>
                                        </li>
                                        <li>
                                            <a title="@lang('home.subjects')" href="/subject" aria-expanded="false"><span class="mini-click-non"> @lang('home.subjects')</span></a>
                                        </li>
                                        <li>
                                            <a title="@lang('home.sections')" href="/section" aria-expanded="false"><span class="mini-click-non"> @lang('home.sections')</span></a>
                                        </li>
                                        @endif
                                        @if(auth()->user()->role=='teacher')
                                        <li>
                                            <a title="@lang('home.exams')" href="/exam" aria-expanded="false"> @lang('home.exams')</a>
                                        </li>
                                        <li>
                                             <a title="@lang('home.results')" href="/resultexams" aria-expanded="false"> @lang('home.results')</a>
                                        </li>
                                        <li>
                                             <a title="@lang('home.mytable')" href="/mysubjecttable" aria-expanded="false"> @lang('home.mytable')</a>
                                        </li>
                                        <li>
                                              <a title="@lang('home.contents')" href="/content" aria-expanded="false"> @lang('home.contents')</a>
                                        </li>
                                        @endif
                                        @if(auth()->user()->role=='teacherassistant')
                                        <li>
                                            <a title="@lang('home.exams')" href="/sectionexam" aria-expanded="false"> @lang('home.exams')</a>
                                        </li>
                                        <li>
                                             <a title="@lang('home.results')" href="/resultsectionexams" aria-expanded="false"> @lang('home.results')</a>
                                        </li>
                                        <li>
                                             <a title="@lang('home.mytable')" href="/mysectiontable" aria-expanded="false"> @lang('home.mytable')</a>
                                        </li>
                                        <li>
                                              <a title="@lang('home.sectioncontents')" href="/sectioncontent" aria-expanded="false"> @lang('home.sectioncontents')</a>
                                        </li>
                                        @endif
                                        @if(auth()->user()->role=='student')
                                        <li>
                                            <a title="@lang('home.exams')" href="/exams" aria-expanded="false"> @lang('home.exams')</a>
                                        </li>
                                        <li>
                                            <a title="@lang('home.sectionexams')" href="/sectionexams" aria-expanded="false"> @lang('home.sectionexams')</a>
                                        </li>
                                        <li>
                                             <a title="@lang('home.myresults')" href="/results" aria-expanded="false"> @lang('home.myresults')</a>
                                        </li>
                                        <li>
                                             <a title="@lang('home.mytable')" href="/mytable" aria-expanded="false"> @lang('home.mytable')</a>

                                        </li>
                                        <li class="">
                                                <a class="has-arrow" href="/" aria-expanded="false">
                                                       <span class="mini-click-non">@lang('home.contents')</span>
                                                    </a>
                                                <ul class="submenu-angle collapse" aria-expanded="true" style="height: 0px;">
                                                    @php
                                                      $name=__('home.nametr');
                                                    @endphp
                                                    @foreach (auth()->user()->group->subject as $subject)
                                                      <li style="text-align: center;"><a title="" href="/mysubjectcontent/{{$subject->id}}"><span class="mini-sub-pro">{{$subject->name}}</span></a></li>
                                                    @endforeach
                                                </ul>
                                         </li>
                                         <li class="">
                                            <a class="has-arrow" href="/" aria-expanded="false">
                                                   <span class="mini-click-non">@lang('home.sectioncontents')</span>
                                                </a>
                                            <ul class="submenu-angle collapse" aria-expanded="true" style="height: 0px;">
                                                @foreach (auth()->user()->group->subject as $subject)
                                                    <li style="text-align: center;"><a title="" href="/mysectioncontent/{{$subject->id}}"><span class="mini-sub-pro">{{$subject->name}}</span></a></li>
                                                @endforeach
                                            </ul>
                                         </li>
                                        @endif
                                        <li>
                                            <a title="@lang('home.myinformation')" href="/myinformation" aria-expanded="false"> @lang('home.myinformation')</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#"></a> <span class="bread-slash"></span>
                                            </li>
                                            <li><span class="bread-blod"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contacts-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- jquery
		============================================ -->
    <script src="{{asset('/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('/js/wow.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8">
    </script>

    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{asset('/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('/js/jquery.scrollUp.min.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('/js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{asset('/js/sparkline/sparkline-active.js')}}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{asset('/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('/js/calendar/fullcalendar-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('/js/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('/js/main.js')}}"></script>
    <!-- tawk chat JS
		============================================ -->
</body>

</html>
