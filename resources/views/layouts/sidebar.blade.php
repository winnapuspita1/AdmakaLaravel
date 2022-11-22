<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            @if (auth()->user()->role === 'superadmin')
                {{ 'Super Admin' }}
            @elseif (auth()->user()->role === 'admin')
                {{ 'Admin' }}
            @elseif (auth()->user()->role === 'mahasiswa')
                {{ 'Mahasiswa' }}
            @endif
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <h3><i class="bi bi-person-circle"></i></h3>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!--sidebar-->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!--Super Admin -->
                @if (auth()->user()->role === 'superadmin')
                    <li class="nav-header">SUPER ADMIN</li>
                    <li class="nav-item">
                        <a href="{{ url('manajemen-akun') }}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-rolodex nav-icon" viewBox="0 0 16 16">
                                <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path
                                    d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z" />
                            </svg>
                            <p>
                                Manajemen Akun
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('register') }}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-plus-fill nav-icon" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                            <p>
                                Tambah Akun Baru
                            </p>
                        </a>
                    </li>
                @endif
                <!-- End of Super Admin -->

                @if (auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin')
                    <!-- Admin -->
                    <li class="nav-header">ADMIN</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Pengajuan Surat
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/aktif_kuliah" class="nav-link">
                                    <i id="aktif_kuliah"></i>
                                    <p>S.Aktif Kuliah</p>
                                    
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/permohonan_kp" class="nav-link">
                                    <i id="kp"></i>
                                    <p> S.Permohonan KP</p>
                                    
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/permohonan_magang" class="nav-link">
                                    <i id="magang"></i>
                                    <p>S.Permohonan Magang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pengambilan_data" class="nav-link">
                                    <i id="pengambilanData"></i>
                                    <p>S.Permohonan Pengambilan Data Penelitian</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/transkrip_nilai" class="nav-link">
                                    <i id="transkrip"></i>
                                    <p>Transkrip Nilai Sementara</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/surat_rekomendasi" class="nav-link">
                                    <i id="rekomendasi"></i>
                                    <p>S.Rekomendasi</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-file nav-icon"></i>
                            <p>
                                Draft Surat
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/draft_aktif_kuliah" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>S.Aktif Kuliah</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/draft_permohonan_kp" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>S.Permohonan KP</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/draft_permohonan_magang" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>S.Permohonan Magang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/draft_pengambilan_data" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>S.Permohonan Pengambilan Data Penelitian</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/draft_transkrip_nilai" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Transkrip Nilai Sementara</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/draft_surat_rekomendasi" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>S.Rekomendasi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/kritik_saran_admin" class="nav-link">
                            <i class="nav-icon fas fa-paper-plane"></i>
                            <p>
                                Kritik & Saran
                            </p>
                        </a>
                    </li>
                    <!-- End of Admin -->
                @endif
                @if (auth()->user()->role === 'mahasiswa')
                    <!-- Mahasiswa -->
                    <li class="nav-header">MAHASISWA</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Pelayanan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/aktif_kuliah_mahasiswa" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>S.Aktif Kuliah</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/permohonan_kp_mahasiswa" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>S.Permohonan KP</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/permohonan_magang_mahasiswa" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>S.Permohonan Magang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pengambilan_data_mahasiswa" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>S.Permohonan Pengambilan Data Penelitian</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/transkrip_nilai_mahasiswa" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Transkrip Nilai Sementara</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/surat_rekomendasi_mahasiswa" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>S.Rekomendasi</p>
                                </a>
                            </li>
                        </ul>
                    <li class="nav-item">
                        <a href="/status_surat_mahasiswa" class="nav-link">
                            <i class="nav-icon fas fa-clock"></i>
                            <p>
                                Status Surat
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/template_surat_mahasiswa" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Template Surat
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kritik_saran_mahasiswa" class="nav-link">
                            <i class="nav-icon fas fa-paper-plane"></i>
                            <p>
                                Kritik & Saran
                            </p>
                        </a>
                    </li>
                    <!-- End of Mahasiswa -->
                @endif


                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();this.closest('form').submit();" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>


                            <p>Keluar</p>

                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

</aside>

    <script>
         window.addEventListener("load", getData); 
    async function getData()
    {
        var formdata = new FormData();
                var requestOptions = {
                method: 'GET',
                redirect: 'follow'
                };

                var response = await fetch('{{url('sidebar-status')}}', requestOptions);
                var result =  await response.json();  
                if (result.aktifKuliah>0) {
                    document.getElementById("aktif_kuliah").classList.add("bi");
                    document.getElementById("aktif_kuliah").classList.add("bi-exclamation-circle");
                    document.getElementById("aktif_kuliah").classList.add("mx-1");
                } else
                {
                    document.getElementById("aktif_kuliah").classList.add("far");
                    document.getElementById("aktif_kuliah").classList.add("fa-circle");
                    document.getElementById("aktif_kuliah").classList.add("nav-icon");
                }
                if (result.kp>0) {
                    document.getElementById("kp").classList.add("bi");
                    document.getElementById("kp").classList.add("bi-exclamation-circle");
                    document.getElementById("kp").classList.add("mx-1");
                } else
                {
                    document.getElementById("kp").classList.add("far");
                    document.getElementById("kp").classList.add("fa-circle");
                    document.getElementById("kp").classList.add("nav-icon");
                }
                if (result.magang>0) {
                    document.getElementById("magang").classList.add("bi");
                    document.getElementById("magang").classList.add("bi-exclamation-circle");
                    document.getElementById("magang").classList.add("mx-1");
                } else
                {
                    document.getElementById("magang").classList.add("far");
                    document.getElementById("magang").classList.add("fa-circle");
                    document.getElementById("magang").classList.add("nav-icon");
                }
                if (result.pengambilanData>0) {
                    document.getElementById("pengambilanData").classList.add("bi");
                    document.getElementById("pengambilanData").classList.add("bi-exclamation-circle");
                    document.getElementById("pengambilanData").classList.add("mx-1");
                } else
                {
                    document.getElementById("pengambilanData").classList.add("far");
                    document.getElementById("pengambilanData").classList.add("fa-circle");
                    document.getElementById("pengambilanData").classList.add("nav-icon");
                }
                if (result.transkrip>0) {
                    document.getElementById("transkrip").classList.add("bi");
                    document.getElementById("transkrip").classList.add("bi-exclamation-circle");
                    document.getElementById("transkrip").classList.add("mx-1");
                } else
                {
                    document.getElementById("transkrip").classList.add("far");
                    document.getElementById("transkrip").classList.add("fa-circle");
                    document.getElementById("transkrip").classList.add("nav-icon");
                }
                if (result.rekomendasi>0) {
                    document.getElementById("rekomendasi").classList.add("bi");
                    document.getElementById("rekomendasi").classList.add("bi-exclamation-circle");
                    document.getElementById("rekomendasi").classList.add("mx-1");
                } else
                {
                    document.getElementById("rekomendasi").classList.add("far");
                    document.getElementById("rekomendasi").classList.add("fa-circle");
                    document.getElementById("rekomendasi").classList.add("nav-icon");
                }
                
    }
    </script>
