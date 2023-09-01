<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard*') ? 'active' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('member*') ? 'active' : 'collapsed' }} "
                href="{{ route('member.index') }}">
                <i class="bi bi-person"></i>
                <span>Member</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('event*') ? 'active' : 'collapsed' }}"
                href="{{ route('event.index') }}">
                <i class="bi bi-calendar-event"></i>
                <span>Event</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('transaction*') ? 'active' : 'collapsed' }}" data-bs-target="#forms-nav"
                data-bs-toggle="collapse" href="{{ route('transaction.all') }}">
                <i class="bi bi-credit-card"></i>
                <span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{ request()->is('transaction/all*') ? 'active' : 'collapsed' }}"
                        href="{{ route('transaction.all') }}">
                        <i class="bi bi-cart-dash"></i><span>Semua Transaksi</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->is('transaction/proses*') ? 'active' : 'collapsed' }}"
                        href="{{ route('transaction.proses') }}">
                        <i class="bi bi-cart-dash"></i><span>Transaksi Proses</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->is('transaction/selesai*') ? 'active' : 'collapsed' }}"
                        href="{{ route('transaction.selesai') }}">
                        <i class="bi bi-cart-check"></i><span>Transaksi Selesai</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->is('transaction/checkin*') ? 'active' : 'collapsed' }}"
                        href="{{ route('transaction.checkin') }}">
                        <i class="bi bi-calendar-check"></i><span>Check-in</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->
    </ul>
</aside><!-- End Sidebar-->
