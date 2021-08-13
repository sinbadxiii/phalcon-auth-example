<div class="page-header">
    <h1>Registration</h1>
</div>

<form action="{{ url(['for': "register"]) }}" method="post">
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">email</label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">name</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">username</label>
        <div class="col-md-6">
            <input id="username" type="text" class="form-control" name="username" value="" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">password</label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Register
            </button>
        </div>
    </div>
</form>