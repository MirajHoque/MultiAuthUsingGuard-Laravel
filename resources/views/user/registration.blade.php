<div class="container custom-logIn">
    <div class="row justify-content-center">
        <div class="col-sm-4 pl-3 pr-3">
            <form action="registration" method="POST">
                @csrf
                <div class="form-group">
                    <label for="userName">User Name</label>
                    <input type="text" name="userName" class="form-control" aria-describedby="userName" placeholder="Please Enter Your User Name" required>
                </div>
                <div class="form-group">
                    <label for="Email1">Email address</label>
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Please Enter Your Email" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Minimum 5 charecters" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>