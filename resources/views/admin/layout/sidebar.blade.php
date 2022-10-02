<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Role and Permission</li>
                    <li>
                        <a href="" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboards">Dashboard</span>
                        </a>
                    </li>
                
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa-solid fa-building"></i>
                            <span key="t-bank">Role</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{ route('admin.role.index') }}" key="t-products">Manage Role</a>
                                </li>
                               
                           
                                
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa-solid fa-building"></i>
                            <span key="t-bank">User</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{ route('admin.user.index') }}" key="t-products">Manage User</a>
                                </li>
                               
                           
                                
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa-solid fa-gears"></i>
                            <span key="t-bank">Post</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            {{-- <li><a href="" key="t-products">About us</a></li> --}}
                        </ul>
                    </li>

                 
            </ul>
        </div>
    </div>
</div>
