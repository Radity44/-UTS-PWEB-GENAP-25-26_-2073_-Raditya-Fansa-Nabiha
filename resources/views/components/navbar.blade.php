<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-white" href="/dashboard">MyRencana</a>
    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        {{-- MyDashboardKu --}}
        <li class="nav-item">
          <a class="nav-link text-white fw-semibold {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
            MyDashboardKu
          </a>
        </li>

        <li class="nav-item">
        <a class="nav-link text-white fw-semibold {{ request()->is('myrencanaku') ? 'active' : '' }}" href="/myrencanaku">
            MyRencanaKu
        </a>
        </li>



        <li class="nav-item">
            <a class="nav-link text-white fw-semibold {{ request()->is('profil') ? 'active' : '' }}" href="/profil">
                Profil
            </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white fw-semibold {{ request()->is('login') ? 'active' : '' }}" href="/login">
            Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
