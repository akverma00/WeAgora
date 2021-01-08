
<!-- Modal -->
<div class="modal fade top " id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-top " role="document">
    <div class="modal-content">
      <!--
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup to WeAgora</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      -->
      <div class="modal-body">
        <!-- Material form register -->
        <div class="card">

        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Sign up to WeAgora</strong>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="text-center" style="color: #757575;" action="partials/_handleSignup.php" method="POST">

                <div class="form-row">
                    <div class="col">
                        <!-- Name -->
                        <div class="md-form">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name">Name</label>
                        </div>
                    </div>
                </div>

                <!-- E-mail -->
                <div class="md-form mt-0">
                    <input type="email" id="Email" name="email" class="form-control">
                    <label for="Email">E-mail</label>
                </div>

                <!-- Password -->
                <div class="md-form">
                    <input type="password" id="Password" name="password" class="form-control" aria-describedby="PasswordHelpBlock">
                    <label for="Password">Password</label>
                    <small id="PasswordHelpBlock" class="form-text text-muted mb-4">
                        At least 8 characters and 1 digit
                    </small>
                </div>
                <!--Copy Password -->
                <div class="md-form">
                    <input type="password" id="cPassword" name="cpassword" class="form-control" aria-describedby="PasswordHelpBlock">
                    <label for="Password">Password</label>
                    <small id="PasswordHelpBlock" class="form-text text-muted mb-4">
                        Password must match
                    </small>
                </div>

                <!-- Phone number -->
                <div class="md-form">
                    <input type="phone" id="phone" name="phone" class="form-control" aria-describedby="PhoneHelpBlock">
                    <label for="phone">Phone number</label>
                </div>

                <!-- Newsletter -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="Newsletter" name="subs" value="1    ">
                    <label class="form-check-label" for="Newsletter">Subscribe to our newsletter</label>
                </div>

                <!-- Sign up button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign up</button>

                <!-- Social register -->
                <!--
                <p>or sign up with:</p>
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

                <hr>

                <!-- Terms of service -->
                <p>By clicking
                    <em>Sign up</em> you agree to our
                    <a href="" target="_blank">terms of service</a>

            </form>
            <!-- Form -->

        </div>

        </div>
        <!-- Material form register -->
      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      -->
    </div>
  </div>
</div>
<!-- Modal -->