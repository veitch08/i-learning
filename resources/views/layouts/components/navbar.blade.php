<nav class="navbar layout-navbar container-xxl navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar" style="z-index: 1; position:sticky; top:0;" >
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div> 

  <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> <!-- HESOYAM --> 

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <!-- Judul -->
      <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
         <p class="my-3">E-learning Teori Kejuruan</p>
        </div>
      </div>
      <!-- /Judul -->

      <ul class="navbar-nav flex-row align-items-center ms-auto">

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <!-- <div class="avatar avatar-online">
                @if (Auth::user()->role->slug === 'admin')
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                @elseif (Auth::user()->role->slug === 'guru')
                    <img src="{{ asset('assets/img/guru/otak2.png' . auth()->user()->guru->foto) }}" alt class="w-px-40 h-px-40 rounded-circle" />
                @else
                    <img src="{{ asset('assets/img/siswa/otak2.png' . auth()->user()->siswa->foto) }}" alt class="w-px-40 h-px-40 rounded-circle" />
                @endif
            </div> -->
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <!-- <div class="avatar avatar-online">
                        @if (Auth::user()->role->slug === 'admin')
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                        @elseif (Auth::user()->role->slug === 'guru')
                            <img src="{{ asset('assets/img/guru/otak2.png' . auth()->user()->guru->foto) }}" alt class="w-px-40 h-px-40 rounded-circle" />
                        @else
                            <img src="{{ asset('assets/img/siswa/otak2.png' . auth()->user()->siswa->foto) }}" alt class="w-px-40 h-px-40 rounded-circle" />
                        @endif
                    </div> -->
                  </div>
                  @php
                      if (Auth::user()->role->slug === 'admin') {
                        $status = 'Admin';
                      }elseif (Auth::user()->role->slug === 'guru') {
                        $status = 'Guru';
                      }else {
                        $status = 'Siswa';
                      }
                  @endphp
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                    <small class="text-muted">{{ $status }}</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="bx bx-user me-2"></i>
                    @if (Auth::user()->role->slug === 'admin')
                        <span>Admin E-learning</span>
                    @elseif (Auth::user()->role->slug === 'guru')
                        <span class="align-middle">{{ auth()->user()->guru->kelas->jurusan->nama_jurusan }}</span>
                    @else
                        <span class="align-middle">{{ auth()->user()->siswa->kelas->jurusan->nama_jurusan }}</span>
                    @endif
                </a>
              </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">Keluar</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>
  </nav>
