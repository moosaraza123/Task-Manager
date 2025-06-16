<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Task Manager</title>
  <link rel="shortcut icon" href="{{ asset('assets/img/logo-circle.png') }}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background: linear-gradient(135deg, #e3eaf6, #f9f9f9);
      font-family: 'Poppins', sans-serif;
    }

    .card {
      animation: fadeInUp 0.8s ease;
      border: none;
      border-radius: 1.25rem;
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
    }

    .card-header {
      background-color: transparent;
      text-align: center;
      padding-top: 2rem;
    }

    .card-header img {
      max-width: 200px;
      filter: grayscale(100%) brightness(120%);
    }

    .card-body {
      padding: 2rem;
    }

    .form-label {
      font-weight: 500;
      color: #495057;
    }

    .form-control {
      border-radius: 0.75rem;
      padding: 0.75rem;
      transition: all 0.3s;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.25rem rgba(73, 80, 87, 0.25);
    }

    .btn-primary {
      background-color: #495057;
      border: none;
      border-radius: 0.75rem;
      padding: 0.75rem;
      transition: all 0.3s;
    }

    .btn-primary:hover {
      background-color: #343a40;
      transform: translateY(-2px);
    }

    .form-check-label {
      font-weight: 500;
    }

    .text-danger {
      font-size: 0.875rem;
    }

    .card-footer {
      background-color: transparent;
      font-size: 0.9rem;
      color: #6c757d;
    }

    .card-footer a:hover {
      text-decoration: underline;
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(40px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          <img src="{{ asset('assets/img/logo-horizontal.png') }}" alt="task manager logo" class="img-fluid">
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="admin@example.com" required autofocus>
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
              @error('password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" name="remember" id="remember" class="form-check-input">
              <label for="remember" class="form-check-label">Remember Me</label>
            </div>
            <div class="d-grid mb-4">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
        <div class="card-footer text-center">
          <p>Developed by: <a class="text-decoration-none" href="https://github.com/moosaraza123" target="_blank">Moosa</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
