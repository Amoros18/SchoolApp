<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <link rel="icon" href="{{asset('icon.png')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" crossorigin="anonymous"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('base.css')}}">
    <script defer src="{{asset('modal.js')}}"></script>
    <script defer src="{{asset('base.js')}}"></script>
</head>
<header>
    <nav id="1" class="navbar navbar-expand-md">
        <div class="container-fluid">
            <div class="site-logo">
                <a href="/" rel="home">
                    <img src="{{asset('pharmacie.jpg')}}" alt="LOGO" width="50" height="50" class="header image is-logo-image lazy loaded">
                </a>
            </div>
            <div class="navbar-collapse">
                <div class="navbar-nav ms-auto">
                    @auth
                        <button class="btn btn-medium">{{Auth::user()->name}}</button>
                        <form class="nav-item" action="{{route('auth.logout')}}" method="POST">
                            @method("delete")
                            @csrf
                            <button class="btn btn-black">se deconnecter</button>
                        </form>
                    @endauth
                    @guest
                        <div class="nav-item">
                            <a href="{{route('auth.login')}}">se connecter</a>
                        </div>
                    @endguest
                </div>
            </div>  
        </div>
    </nav>
</header>

<body>
<div class="container">
    <aside>
        <section class="sidebar" style="height: auto;">
            <!-- Sidebar user panel -->
            <div class="user-panel">
            <div class="pull-left image-panel">
                <img src="{{asset('photo.png')}}" class="image-profil" alt="User Image">
            </div>
                <div class="pull-left info-panel">
                    <p id="nomPre">@auth {{Auth::user()->name}} @endauth @guest Mon nom @endguest</p>            
                </div>
            </div>
        <nav>
            <ul class="sidebar-menu" id="menu">
                <li><a href="{{route('user.list')}}">User</a></li>
                <li><a href="{{route('eleve.accueil')}}">Gestion des eleves</a></li>
                <li><a href="{{route('enseignant.accueil')}}">Gestion des Enseignants</a></li>
                <li><a href="{{route('matiere.accueil')}}">Gestion des Matieres</a></li>
            </ul>
        </nav>
        </section>
    </aside>

    <main>
        <div class="box">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @yield('content')
        </div>
    </main>
</div>
    
</body>
</html>