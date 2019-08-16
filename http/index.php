<?php
require 'helpers/session.hp.php';
if(isset($_SESSION['a_USER'])) {
    Session::logOut();
}

include_once 'sections/header.php';?>



            <div class="login_main container ">

                <div class="loginBody">
                    <div >

                            <h2>Nethouse</h2>

                          <form action="inc/login.php" method="POST" >
                            <div class="form-group">

                                <input type="text" class="form-control" name="login_username" id="login_username" placeholder="Username or Email">
                            </div>
                            <div class="form-group">

                                <input type="password" class="form-control" name="login_pwd" id="login_pwd" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-success">Login</button>
                            <a href="#" title="Registration" class="">or Register</a>
                        </form>
                        <span class="login_Error <?php echo $_GET['status']?'invalid':'valid'; ?>">Invalid login. Please try again</span>

                    </div>
                </div>
            </div>






