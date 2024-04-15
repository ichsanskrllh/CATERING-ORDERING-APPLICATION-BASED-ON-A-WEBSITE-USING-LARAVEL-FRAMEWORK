<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">{{ Auth::user()->role }}</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                   <a href="{{ route('owner.dashboard.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('owner.feedback.index') }}" class="collapsed" aria-expanded="false">
                        <i class="far fa-envelope"></i>
                        <p>Feedback</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('owner.laporan.index') }}" class="collapsed" aria-expanded="false">
                        <i class="icon-notebook"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a data-toggle="collapse" href="#informasi" class="collapsed" aria-expanded="false">
                        <i class="fas fa-info"></i>
                        <p>Laporan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="informasi">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route("admin.tentang.index") }}">
                                    <span class="sub-item">Tentang Kami</span>
                                </a>
                            <li>
                                <a href="{{ route("admin.cara.index") }}">
                                    <span class="sub-item">Cara Pembelian</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</div>