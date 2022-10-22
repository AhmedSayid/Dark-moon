<aside id="sidebar" class="sidebar app-sidebar rounded">
    <!-- <div class="sidebar-header" style="height: 156px;">
        <a  href="{{route('admin.home.index')}}">
            <img src="{{ url('assets/img/Icons/logo.png') }}" style="width:10rem; height:4rem;" class="header-brand-img" >
        </a>
    </div> -->
    <ul class="list-unstyled components">

        <li>
            <a href="{{ route('admin.home.index') }}">
                <div class="d-flex align-items-center m-2">
                    <div class="p-1" style="width: auto;background-color:white;color:black;border-radius:30%">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                        </svg>
                    </div>

                    <span class="p-0" style="font-weight: bold;letter-spacing:1px;margin:5px;font-size:22px">Home</span>
                </div>
            </a>
        </li>
        <div style="border-bottom: 1px solid #47748b;"></div>
        {{-- <li>
            <a  href="{{route('admin.branches.index')}}"> CONSTANTS</a>
        </li> --}}
        <li>
            <a href="{{route('admin.branches.index')}}">
                <img src="{{ url('assets/imgs/branch.png') }}" class="p-1"  style="width: 30px;background-color:white;border-radius:30%" alt="">
                <span>
                    Branches
                </span>
            </a>
        </li>
        <li>
            <a  href="{{route('admin.services.index')}}">
                <img src="{{ url('assets/imgs/customer-service.png') }}" class="p-1"  style="width: 30px;background-color:white;border-radius:30%" alt="">
                <span>
                    Services
                </span>
            </a>
        </li>
        <li>
            <a  href="{{ route("admin.projects.index") }}">
                <img src="{{ url('assets/imgs/projects.png') }}" class="p-1"  style="width: 30px;background-color:white;border-radius:30%" alt="">
                <span>
                    Projects
                </span>
            </a>
        </li>
        <li>
            <a  href="{{route('admin.queries.index')}}">
                <img src="{{ url('assets/imgs/analytic.png') }}" class="p-1"  style="width: 30px;background-color:white;border-radius:30%" alt="">
                <span>
                    Queries
                </span>
            </a>
        </li>
        <li>
            <a  href="{{route('admin.blogs.index')}}">
                <img src="{{ url('assets/imgs/blogs.png') }}" class="p-1"  style="width: 30px;background-color:white;border-radius:30%" alt="">
                <span>
                    Blogs
                </span>
            </a>
        </li>
        <li>
            <a  href="{{route('admin.teams.index')}}">
                <img src="{{ url('assets/imgs/network.png') }}" class="p-1"  style="width: 30px;background-color:white;border-radius:30%" alt="">
                <span>Teams</span>

            </a>
        </li>
        <li>
            <a  href="{{route('admin.members.index')}}">
                <img src="{{ url('assets/imgs/user.png') }}" class="p-1"  style="width: 30px;background-color:white;border-radius:30%" alt="">
                <span>
                    Members
                </span>
            </a>
        </li>
    </ul>
    <form method="GET" action="{{ route('Logout') }}">
        <div class="w-100 d-flex justify-content-center mt-2">
            <button class="btn btn-primary w-75">{{trans('logout')}}</button>
        </div>
    </form>
    {{-- <ul class="list-unstyled CTAs">
        <li>
            <a class="dropdown-item" href="{{ route('admin.home.index') }}">
                <i class="mdi mdi-logout-variant mr-2"></i>
                <span>{{trans('logout')}}</span>
            </a>
        </li>
        {{-- <li>
            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
        </li> --}}
            {{-- <a class="dropdown-item" href="{{ route('admin.home.index') }}">
                <i class="mdi  mdi-logout-variant mr-2"></i>
                <span>{{trans('logout')}}</span>
            </a> --}}
        {{-- </li>

    </ul> --}}
</aside>

