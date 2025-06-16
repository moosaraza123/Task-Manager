<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> @yield('title') | Task Manager </title>
  <link rel="shortcut icon" href="{{ asset('assets/img/logo-circle.png') }}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>

  <style>
    body {
      height: 100vh;
      margin: 0;
      display: flex;
      background-color: #f1f5f9;
      font-family: 'Noto Sans', sans-serif;
      overflow: hidden;
    }

    .sidebar {
      width: 250px;
      background: linear-gradient(135deg, #2c3e50, #34495e);
      color: #fff;
      display: flex;
      flex-direction: column;
      padding: 1.5rem 1rem;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease-in-out;
    }

    .sidebar h4 img {
      transition: transform 0.3s ease;
    }

    .sidebar h4 img:hover {
      transform: scale(1.05);
    }

    .sidebar .nav-link {
      color: #ecf0f1;
      padding: 10px 15px;
      margin-bottom: 5px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      transition: background-color 0.3s ease;
    }

    .sidebar .nav-link .bi {
      margin-right: 12px;
      font-size: 1.1rem;
    }

    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      text-decoration: none;
    }

    .content {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .topnav {
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.04);
      padding: 0.75rem 1.25rem;
      position: sticky;
      top: 0;
      z-index: 1000;
      transition: all 0.3s ease;
    }

    .topnav .navbar-brand {
      font-weight: 600;
      color: #1e293b;
      font-size: 1rem;
    }

    .navbar-nav .nav-link {
      color: #1e293b;
      transition: color 0.2s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #0d6efd;
    }

    .card {
      border: none;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
      border-radius: 12px;
      animation: fadeInUp 0.5s ease;
    }

    footer {
      background-color: #ffffff;
      text-align: center;
      padding: 1rem;
      box-shadow: 0 -1px 10px rgba(0, 0, 0, 0.03);
    }

    main {
      flex-grow: 1;
      overflow-y: auto;
      padding: 1rem 2rem;
      animation: fadeInUp 0.7s ease-in-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(15px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .dropdown-menu {
      animation: dropdownFade 0.3s ease-in-out;
    }

    @keyframes dropdownFade {
      from {
        opacity: 0;
        transform: translateY(-8px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <div class="sidebar">
    <h4 class="text-center mb-4">
      <a href="{{ route('dashboard') }}">
        <img style="filter: invert(100%) brightness(200%);" src="{{ asset('assets/img/logo-circle-horizontal.png') }}" class="img-fluid" alt="Task Manager">
      </a>
    </h4>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <i class="bi bi-house-door"></i> Home
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('projects*') ? 'active' : '' }}" href="{{ route('projects.index') }}">
          <i class="bi bi-folder"></i> Projects
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('tasks*') ? 'active' : '' }}" href="{{ route('projects.index') }}">
          <i class="bi bi-check2-square"></i> Tasks
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('routines*') ? 'active' : '' }}" href="{{ route('routines.index') }}">
          <i class="bi bi-calendar-check"></i> Routines
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('notes*') ? 'active' : '' }}" href="{{ route('notes.index') }}">
          <i class="bi bi-sticky"></i> Notes
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('reminders*') ? 'active' : '' }}" href="{{ route('reminders.index') }}">
          <i class="bi bi-bell"></i> Reminders
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('files*') ? 'active' : '' }}" href="{{ route('files.index') }}">
          <i class="bi bi-file-earmark"></i> Files
        </a>
      </li>
    </ul>
  </div>

  <div class="content">
    <header class="topnav">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('dashboard') }}">
            <span id="currentDateTime" class="fw-medium"></span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                      @csrf
                      <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      @yield('content')
    </main>

    <footer class="mt-auto">
      <div class="container">
        <span class="text-muted small">&copy; {{ date('Y') }} Task Manager | Developed by <a href="https://github.com/moosaraza123" target="_blank">Moosa</a></span>
      </div>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function updateDateTime() {
      const now = new Date();
      const dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
      const day = dayNames[now.getDay()];
      const date = now.toLocaleDateString('en-US', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
      });
      const time = now.toLocaleTimeString();
      document.getElementById('currentDateTime').innerText = `${day}, ${date} ${time}`;
    }

    updateDateTime();
    setInterval(updateDateTime, 1000);
  </script>
</body>
</html>
