<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Our Store</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Home</a>
        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
        @guest
            <a class="nav-link" href="{{ route('login') }}">Login</a>
            <a class="nav-link" href="{{ route('register') }}">Register</a>
        @endguest
        @auth
            <a class="nav-link" href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </nav>

    <div class="container mt-4">
        <h1>Welcome to Our Store</h1>
        <div class="row">
            @foreach($featuredProducts as $product)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="footer bg-light mt-4 py-3">
        <div class="container text-center">
            <span class="text-muted">© 2024 Our Store. All rights reserved.</span>
        </div>
    </footer>
</body>
</html>
