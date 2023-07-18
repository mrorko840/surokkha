<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">ইউজার মেনু</div>
                <a class="nav-link" href="{{route('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open text-warning"></i></div>
                    ফাইল লিস্ট
                </a>
                <a class="nav-link" href="{{route('new.card')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file-circle-plus text-success"></i></div>
                    ক্রিয়েট নতুন কার্ড
                </a>
                <a class="nav-link" href="{{route('recharge')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-sack-dollar text-danger"></i></div>
                    রিচার্জ
                </a>
                <a class="nav-link" href="{{route('pass_change')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-key text-info"></i></div>
                    পাসওয়ার্ড পরিবর্তন
                </a>

                @if (auth()->user()->isAdmin)
                    <div class="sb-sidenav-menu-heading">এডমিন মেনু</div>
                    <a class="nav-link" href="{{route('all.cards')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-id-card text-primary"></i></div>
                        সব কার্ড
                    </a>
                    <a class="nav-link" href="{{route('control')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-gear text-success"></i></div>
                        কন্ট্রোল পেনেল
                    </a>
                    <a class="nav-link" href="{{route('pending.recharge')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-clock-rotate-left text-warning"></i></div>
                        পেন্ডিং রিচার্জ <span class="badge text-bg-danger mx-2 pendingCount">{{@$rechargeCount}}</span>
                    </a>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users text-info"></i></div>
                        ইউজার
                    </a>
                @endif

                <div class="sb-sidenav-menu-heading">হেল্প</div>
                <a class="nav-link" href="{{@$control->support_link}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-headset"></i></div>
                    সাপোর্ট সেন্টার
                </a>
                <a class="nav-link" href="{{route('logout')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                    লগ-আউট
                </a>
                <a class="nav-link" href="javascript:void(0)">

                </a>
            </div>
        </div>
    </nav>
</div>
