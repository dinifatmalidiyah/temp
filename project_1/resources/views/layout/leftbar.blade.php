<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="/" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="/assets/images/logosipus.png" alt="" height="105" >
        </span>
    </a>

    <!-- LOGO -->
    <a href="/" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="/assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="/assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-item">
                <a  href="/" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <br><i class="uil-home-alt" href="/"></i>
                    <span class="badge bg-success float-end" href="/"></span>
                    <span> Dashboards </span>
                    
                </a>
                {{-- <div class="collapse" id="sidebarDashboards">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="dashboard-analytics.html">Analytics</a>
                        </li>
                        <li>
                            <a href="dashboard-crm.html">CRM</a>
                        </li>
                        <li>
                            <a href="index.html">Ecommerce</a>
                        </li>
                        <li>
                            <a href="dashboard-projects.html">Projects</a>
                        </li>
                    </ul>
                </div> --}}
            </li>

            <li class="side-nav-title side-nav-item">Data</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Data User </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        
                        @if(auth()->user()->level=='Admin')
                        <li>
                            <a href="/dataanggota">Data Anggota</a>
                        </li>
                        <li>
                            <a href="/datapetugas">Data Petugas</a>
                        </li>
                        @else
                        <li>
                            <a href="/dataanggota">Data Anggota</a>
                        </li>
                        @endif

                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-briefcase"></i>
                    <span>Data Buku </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/datakategori">Kategori Buku</a>
                        </li>
                        <li>
                            <a href="/databuku">Kumpulan Buku</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title side-nav-item">Manajemen Buku</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Data Transaksi </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/transaksipeminjaman">Data Peminjaman</a>
                        </li>
                        <li>
                            <a href="/pengembalian">Data Pengembalian</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="/laporan" class="side-nav-link">
                    <i class="uil-folder-plus"></i>
                    <span> Laporan </span>
                </a>
            </li>

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>