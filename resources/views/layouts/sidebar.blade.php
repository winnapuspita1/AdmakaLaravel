<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Winna Puspita</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!--sidebar-->
      <!-- Sidebar Menu -->
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
           <!-- Admin -->
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
                  <i class="far fa-circle nav-icon"></i>
                  <p>S.Aktif Kuliah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/permohonan_kp" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>S.Permohonan KP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/permohonan_magang" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>S.Permohonan Magang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pengambilan_data" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>S.Permohonan Pengambilan Data Penelitian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="transkrip_nilai" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transkrip Nilai Sementara</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="surat_rekomendasi" class="nav-link">
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
            <a href="/kritik_saran_mahasiswa" class="nav-link">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Kritik & Saran
              </p>
            </a>
          </li>
          <!-- End of Mahasiswa -->

          <!-- Dekan -->
          <li class="nav-header">DEKAN</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Daftar Surat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/surat_selesai_dekan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Selesai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/surat_tandatangan_dekan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Tandatangan</p>
                </a>
              </li>
            </ul>
            <!-- End of Dekan -->

            <!-- Koordinator Akademik -->
          <li class="nav-header">KOOR AKADEMIK</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Daftar Surat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/aktif_kuliah_koorakademik" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>S.Aktif Kuliah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/permohonan_kp_koorakademik" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>S.Permohonan KP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/permohonan_magang_koorakademik" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>S.Permohonan Magang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pengambilan_data_koorakademik" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>S.Permohonan Pengambilan Data Penelitian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/transkrip_nilai_koorakademik" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transkrip Nilai Sementara</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/surat_rekomendasi_koorakademik" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>S.Rekomendasi</p>
                </a>
              </li>
            </ul>
            
            <!-- End of Koordinator Akademik -->

          <li class="nav-item">
            <a href="../kanban.html" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
      
  </aside>