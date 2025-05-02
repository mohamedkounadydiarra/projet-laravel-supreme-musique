<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
    
      <a href="/" class="navbar-brand">Supreme Musique</a>
        <button
        class="navbar-toggler bg-dark"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarNav"
      >
        {{-- <i class="fas fa-bars"></i> --}}
        <span class="navbar-toggler-icon bg-white"></span>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
         @auth
           <li class="nav-item"><a href="/albums" class="nav-link">Albums</a></li>
           <li class="nav-item"><a href="/orders" class="nav-link">Commandes</a></li>
           <li class="nav-item"><a href="/admin" class="nav-link">Admin</a></li>
           <li class="nav-item"><a href="/logout" class="nav-link">
              <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="nav-link" style="display:inline; padding:0; margin:0; border:none; background:none;">
                  Déconnexion
              </button>
            </form></a>
          </li> 
         @else
           <li class="nav-item"><a href="/login" class="nav-link">Connexion</a></li>
           <li class="nav-item"><a href="/register" class="nav-link">S'inscrire</a></li>
         @endauth
        </ul>
        <!-- Left links -->
      </div>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->