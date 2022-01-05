{{-- Sidebar Start --}}
<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Dashboards</li>
                    <li>
                        <a href="{{ route('admin.index') }}" @yield('dash-active')>
                            <i class="metismenu-icon pe-7s-rocket"></i>
                            Main Dashboard
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Manages</li>
                    <li>
                        <a href="{{ route('admin.manage-users.index') }}" @yield('user-active')>
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Manage Users
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-exams.index') }}" @yield('exam-active')>
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Manage Exams
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-questions.index') }}" @yield('question-active')>
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Manage Questions
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-answers.index') }}" @yield('answer-active')>
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Manage Answers
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @yield('content')
</div>
<script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>
</body>

</html>
{{-- Sidebae End --}}
