<div class="text-center mt-3">
    <h2 class="d-inline pr-5 mr-5">Welcome to the <a class="font-weight-bold" href="/">CartEye</a></h5>
    <h6 class="d-inline pl-5 ml-5" hr>
        New member?
        <a href="/register">Register</a>  here.
    </h6>
</div>
<div class="container custom-logIn">
    <div class="row justify-content-center">
        <div class="col-sm-4 pl-3 pr-3">
            <form action="login" method="POST">
                <div class="form-group">
                    @csrf
                    <label for="Email1">Email address</label>
                    <input type="email" name="email" class="form-control"  aria-describedby="emailHelp" placeholder="Please Enter Your Email">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Minimum 5 charecters">
                </div>
                <button type="submit" class="btn btn-primary">Log In</button>
            </form>
        </div>
    </div>
</div>