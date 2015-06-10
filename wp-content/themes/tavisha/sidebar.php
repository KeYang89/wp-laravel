<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <div id="widget-area" class="sidebar column col3 col4-sm" role="complementary">
  
<div class="login-box-body" style="background-color:rgba(255,255,255,0.5);padding:10px;">
        <h3>Sign/Register</h3>
        <form role="form" method="POST" action="http://matchday45.com/team/auth/login">
            <input type="hidden" name="_token" value="<?php //echo getToken()?>">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" value="" autocomplete="off" style="cursor: auto;">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" name="remember" checked="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> Remember Me
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat btn-black">Sign In</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="#">I forgot my password</a><br>
        <a href="http://matchday45.com/team/auth/register" class="text-center">Register a new membership</a>

    </div>
      <?php dynamic_sidebar( 'sidebar-1' ); ?>
<div class="team">
                             <div class="team-header">
                             
                                My Fantasy Teams
                                
                             </div>
                             <div class="teambox">
                             <a href="#"><div class="btn1">
                             
                                Join League
                                
                             </div></a>
                             <a href="#"><div class="btn2">
                             
                                Create League
                                
                             </div></a>
                             
                             </div>
                         
                         </div>
  </div><!-- .widget-area -->

<?php endif; ?>
<?php
// function getToken()
// {
//     $ch = curl_init();

//     curl_setopt($ch,CURLOPT_URL, 'http://matchday45.com/team/api/v1/getToken');
//     curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
// //  curl_setopt($ch,CURLOPT_HEADER, false);

//     $output=curl_exec($ch);

//     curl_close($ch);
//     unset($ch);
//     return $output;
// }
?>