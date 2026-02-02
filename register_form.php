<!-- OneMobile Registration Interface -->
<div class="wait overlay">
    <div class="loader"></div>
</div>

<style>
    .input-borders {
        border-radius: 30px;
    }
    /* OneMobile Theme Colors */
    .primary-btn {
        background-color: #D10024;
        color: #FFF;
        font-weight: 700;
        border: none;
        padding: 10px 20px;
        border-radius: 30px;
        transition: 0.2s all;
    }
    .primary-btn:hover {
        opacity: 0.9;
        color: #FFF;
    }
    .branding-text {
        color: #D10024;
        font-weight: bold;
    }
    .support-info {
        font-size: 12px;
        color: #777;
        margin-top: 15px;
    }
</style>

<div class="container-fluid">
    <form id="signup_form" onsubmit="return false" class="login100-form">
        <div class="billing-details jumbotron">
            <div class="section-title text-center">
                <h2 class="login100-form-title p-b-49">Join <span class="branding-text">OneMobile</span></h2>
                <p>The best mobile tech in <strong>Kosovo</strong></p>
            </div>
            
            <div class="form-group">
                <input class="input form-control input-borders" type="text" name="f_name" id="f_name" placeholder="First Name">
            </div>
            
            <div class="form-group">
                <input class="input form-control input-borders" type="text" name="l_name" id="l_name" placeholder="Last Name">
            </div>
            
            <div class="form-group">
                <input class="input form-control input-borders" type="email" name="email" placeholder="Email (oneMobile@gmail.com)">
            </div>
            
            <div class="form-group">
                <input class="input form-control input-borders" type="password" name="password" id="password" placeholder="Password">
            </div>
            
            <div class="form-group">
                <input class="input form-control input-borders" type="password" name="repassword" id="repassword" placeholder="Confirm Password">
            </div>
            
            <div class="form-group">
                <!-- Kosovo specific mobile placeholder -->
                <input class="input form-control input-borders" type="text" name="mobile" id="mobile" placeholder="Mobile (e.g. 049 555 123)">
            </div>
            
            <div class="form-group">
                <input class="input form-control input-borders" type="text" name="address1" id="address1" placeholder="Street Address">
            </div>
            
            <div class="form-group">
                <input class="input form-control input-borders" type="text" name="address2" id="address2" placeholder="City (e.g. Pristina)">
            </div>
            
            <div class="form-group">
                <input class="primary-btn btn-block" value="Create OneMobile Account" type="submit" name="signup_button">
            </div>

            <div class="text-pad text-center">
                <a href="" data-toggle="modal" data-target="#Modal_login">Already have a OneMobile Account? Login</a>
                
                <!-- Added Support Info as per instructions -->
                <div class="support-info">
                    <hr>
                    <p>Need help? Contact OneMobile Kosovo Support</p>
                    <p>Email: <strong>oneMobile@gmail.com</strong> | Tel: <strong>+383 44 982 314</strong></p>
                </div>
            </div>
        </div>
    </form>

    <div class="login-marg">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="signup_msg">
                <!-- Alert messages from registration logic appear here -->
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>