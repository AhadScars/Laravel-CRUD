@include('CRUD.content.header')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">User Login</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="/login">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                value="{{ old('email') }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-dark">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>