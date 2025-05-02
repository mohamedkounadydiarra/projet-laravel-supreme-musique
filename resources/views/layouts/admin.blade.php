<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'supreme musique') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
        integrity="sha512-Z1+R2OfJ0a9kp/21IZNhJ5YEOCVRQh/nYktwmhkPF0FoDQH0Ov2wOOwDrlylzJckX6wSJ5VivCURL+JFfLf/xA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- MDB -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
        integrity="sha512-0RxGTiFXp36+bSbJM+/QSTl1LDQ4pHdDZ8Ua9ZXl454qKSsYu228AOLHYfzx/rm4Dm6I+176ETRF55DpvrHTgw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-light border-end p-3 " style="height: 100vh; width: 250px;">
            <div class="p-3">
                <h4 class="text-center mb-4">  🎼Admin<h4>
                    <ul class="list-group" style="list-style: none">
                        <li >
                            <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">
                                🎸 Tableau de bord
                            </a>
                        </li>
                        <li >
                            <a href="{{ route('admin.albums') }}" class="list-group-item list-group-item-action">
                                🎹 Gérer Albums 
                            </a>
                        </li>
                        <li >
                            <a href="{{ route('songs.index') }}" class="list-group-item list-group-item-action">
                                🎺Gérer Chansons
                            </a>
                        </li>
                        <li >
                            <a href="{{ route('admin.orders') }}" class="list-group-item list-group-item-action">
                               🕋 Commandes
                            </a>
                        </li>
                    </ul>
            </div>
        </div>

        {{-- contenu principal --}}
        <div class="" style="flex:1">
            <nav class="navbar navbar-light bg-white shadow-sm">
                <div class="container-fluid">
                    <span class="navbar-brand">Panneau d'administration</span>
                    <a href="{{route('logout')}}" class="btn btn-outline-danger">Se déconnecter</a>
                </div>
            </nav>

            <div class="p-4">
                @yield('content')
            </div>
        </div>
        
    </div>

</body>

</html>
