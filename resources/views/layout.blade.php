<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        /* Sidebar styles */
        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .nav-link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .sidebar.collapsed .nav-link i {
            margin-right: 0;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .logo {
            display: none;
        }

        .sidebar.collapsed .logo-collapsed {
            display: block;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }

        .sidebar.collapsed .logo-collapsed img {
            width: 40px;
        }

        .sidebar.collapsed .logo-collapsed span {
            display: none;
        }

        .sidebar.collapsed img {
            display: none;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            font-size: 16px;
            font-weight: 500;
            padding: 20px 30px;
            color: #444;
            border-bottom: 0.5px solid #eee;
            transition: all 0.3s ease;
            border-radius: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar .nav-link i {
            font-size: 18px;
            margin-right: 10px;
        }

        .sidebar .nav-link:hover {
            color: #000;
            background-color: #f6f6f6;
        }

        .sidebar .nav-link.active {
            color: #fff;
            background-color: #007bff;
        }

        .sidebar .nav-link.active i {
            color: #fff;
        }

        /* Content styles */
        #content {
            margin-left: 250px;
            width: calc(100% - 250px);
            overflow-x: hidden;
            transition: all 0.3s ease;
        }

        #content.collapsed {
            margin-left: 70px;
        }

        .sidebar .nav-link.logout button {
    display: flex;
    align-items: center;
    font-size: 16px;
    font-weight: 500;
    color: #444;
    transition: all 0.3s ease;
    border: none;
    justify-content: flex-start;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    padding: 10px 30px;
    background-color: transparent;
    width: 100%;
    text-align: left;
}

.sidebar .nav-link.logout button i {
    margin-right: 10px;
}

    </style>
</head>
<body>
    <div style="overflow-x: hidden;" class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky pt-3">
                    <img src="{{ asset('images/fbh-logo-color.png') }}" alt="Company Logo" class="img-fluid mb-3">
                    <div class="sidebar-toggle" data-toggle="sidebar-collapse">
                        <i class="fas fa-bars fa-lg"></i>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="far fa-chart-bar"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->routeIs('customers.index') ? ' active' : '' }}" href="{{ route('customers.index') }}">
                                <i class="fas fa-users me-2"></i>
                                <span>Customers</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->routeIs('intersted') ? ' active' : '' }}" href="{{ route('intersted') }}">
                                <i class="fas fa-user-check me-2"></i>
                                <span>Interested</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->routeIs('next_call_date') ? ' active' : '' }}" href="{{ route('next_call_date') }}">
                                <i class="fas fa-calendar-alt me-2"></i>
                                <span>Next Call Date</span>
                            </a>
                        </li>
                        <li class="nav-item logout">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
