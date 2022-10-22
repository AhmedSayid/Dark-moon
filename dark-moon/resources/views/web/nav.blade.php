<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto" href="#space">{{ trans('Home.Home') }}</a></li>

        @if(!$services->isEmpty())
           <li><a class="nav-link scrollto" href="#services">{{ trans('Home.Services') }}</a></li>
        @endif

        @if(!$Projects->isEmpty())
            <li><a class="nav-link scrollto " href="#work">{{ trans('Home.Projects') }}</a></li>
        @endif

        @if(!$Members->isEmpty())
            <li><a class="nav-link scrollto" href="#Members">{{ trans('Home.Members') }}</a></li>
        @endif

        @if(!$Blogs->isEmpty())
            <li><a class="nav-link scrollto" href="#blog">{{ trans('Home.Blogs') }}</a></li>
        @endif

        <li><a class="nav-link scrollto" href="#contact">{{ trans('Home.Contact') }}</a></li>
        <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
            </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
        </ul>
        </li> -->

        <li class="p-2">
            <li style="border-left: 2px solid gray;" class="p-2"></li>
            <div class="dropdown">
                <a class="btn dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        {{ $lang }}
                </a>
                <div class="dropdown-menu p-1" aria-labelledby="triggerId">
                    @if($lang != 'en')
                        <a class="dropdown-item text-dark fw-bold" href="{{ route('admin.language',['lang'=>'en']) }}">en</a>
                    @elseif($lang != 'ar')
                        <a class="dropdown-item text-dark fw-bold" href="{{ route('admin.language',['lang'=>'ar']) }}">ar</a>
                    @endif
                </div>
            </div>
        </li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
