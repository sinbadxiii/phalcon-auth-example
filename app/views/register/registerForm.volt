<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://raw.githubusercontent.com/sinbadxiii/images/master/cphalcon-auth/logo.png"
                     class="img-fluid" alt="Sample image" width="60%">
            </div>
            <?=$this->flashSession->output();?>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="{{ url(['for': "register"]) }}" method="post">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Email</label>
                        <input type="email" id="form3Example3" class="form-control form-control-lg"
                               placeholder="Enter a valid email address" name="email" />

                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Name</label>
                        <input type="text" id="form3Example3" class="form-control form-control-lg"
                               placeholder="Enter name" name="name" />

                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Username</label>
                        <input type="text" id="form3Example3" class="form-control form-control-lg"
                               placeholder="Enter username" name="username" />

                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">Password</label>
                        <input type="password" id="form3Example4" class="form-control form-control-lg"
                               placeholder="Enter password" name="password" />

                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>

                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/login"
                                                                                          class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>