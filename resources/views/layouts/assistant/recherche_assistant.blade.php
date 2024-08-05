<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASSISTANT | DASHBOARD</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
      />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

  <body>
    <div class="sidebar">
      <div class="logo-details">
        <!--<i class="bx bxl-c-plus-plus"></i>-->
        <img class="logo" src="{{ asset('images/logo.jpg') }}" alt="">
        <span class="logo_name">Assistant</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="/assistant" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Gestion des demandes</span>
          </a>
        </li>
        <li>
            <a href="/assistant/list_renewer" class="active">
              <i class="bx bx-grid-alt"></i>
              <span class="links_name">Liste des renouvellements</span>
            </a>
          </li>
        <li>
            <a href="/assistant/control" class="active">
              <i class="bx bx-grid-alt"></i>
              <span class="links_name">Fiche controle</span>
            </a>
        </li>

        <li class="log_out">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; width: 100%; padding: 0;">
                <i class="bx bx-log-out"></i>
                <span class="links_name" style="color: #fff">Déconnexion</span>
              </button>
            </form>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <<div class="search-box">
            <form action="{{ route('recherche_matricule_assistant') }}" method="GET">
          <input type="text" name="matricule" placeholder="Recherche..." />
          <button type="submit"><i class="bx bx-search"></i></button>
            </form>
        </div>
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          @auth
          <span class="admin_name">Bienvenue, {{ Auth::guard('assistant')->user()->nom }}</span>
          @endauth
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>

      <div class="home-content">

        @yield('content')


      </div>

    </section>




    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
  </body>
</html>
