@include('msg')


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Product CRUD</title>
</head>

<body>

 <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Product</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">

       
        <ul class="navbar-nav mr-auto">
            @auth
                <li class="nav-item">
                    <a class="nav-link text-white" href="/product/users/profile">
                        {{ auth()->user()->name }}
                    </a>
                </li>

                <li class="nav-item">
                   <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link">
                         Logout
                    </button>
                   </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/product/users/register">Register</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/product/users/login">Login</a>
                </li>
            @endauth
        </ul>

        <form class="form-inline my-2 my-lg-0" method="GET" action="/">
            <input
                class="form-control mr-sm-2"
                type="search"
                name="search"
                placeholder="Search product"
            >
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
                Search
            </button>
        </form>

    </div>
</nav>
