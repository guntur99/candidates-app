<!--sidebar Begins-->
<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        <img class="admin-brand-logo" src="{{ asset('atmos/light/assets/img/logo.png') }}" width="40" alt="">
        <!-- end sidebar branding-->
        <div class="ml-auto">
            <!-- sidebar pin-->
            {{-- <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a> --}}
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar"></a>
        </div>
    </div>
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">

            <!-- Role for Admin -->
                <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                            <span class="menu-name">Candidates
                                <span class="menu-arrow"></span>
                            </span>
                        </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-ballot "></i>
                        </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">

                        <li class="menu-item ">
                            <a href="{{ route('create.candidate') }}" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">Create New</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder  mdi mdi-playlist-plus "></i>
                                </span>
                            </a>
                        </li>

                        <li class="menu-item ">
                            <a href="{{ route('index.candidates') }}" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">All Candidate</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder  mdi mdi-format-list-bulleted-type "></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
        </ul>

    </div>

</aside>
<!--sidebar Ends-->
