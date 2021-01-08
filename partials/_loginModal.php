
<!-- Modal -->

<div class="modal fade top" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-top" role="document">
        <div class="modal-content">
            <!--
            <div class="modal-header">
            </div>
            -->
            <div class="modal-body">
            <!-- Material form login -->
                <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Sign in to WeAgora</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="partials/_handleLogin.php" method="POST">

                    <!-- Email -->
                    <div class="md-form">
                    <input type="email" id="Email" name="email" class="form-control">
                    <label for="Email">E-mail</label>
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                    <input type="password" id="Password" name="password" class="form-control">
                    <label for="Password">Password</label>
                    </div>

                    <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="Remember" name="remember">
                        <label class="form-check-label" for="Remember">Remember me</label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="#!">Forgot password?</a>
                    </div>
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

                    <!-- Register -->
                    <p>Not a member?
                    <a href="" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Register</a>
                    </p>

                    <!-- Social login -->
                    <!--
                    <p>or sign in with:</p>
                    -->
                    <a type="button" class="btn-floating btn-fb btn-sm">
                    <i class="fab fa-facebook-f"></i>
                    </a>
                    <a type="button" class="btn-floating btn-tw btn-sm">
                    <i class="fab fa-twitter"></i>
                    </a>
                    <a type="button" class="btn-floating btn-li btn-sm">
                    <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a type="button" class="btn-floating btn-git btn-sm">
                    <i class="fab fa-github"></i>
                    </a>

                </form>
                <!-- Form -->

                </div>

            </div>
            <!-- Material form login -->
        </div>
        <!--
      <div class="modal-footer">
      </div>
      -->
    </div>
  </div>
</div>
<!-- Modal -->