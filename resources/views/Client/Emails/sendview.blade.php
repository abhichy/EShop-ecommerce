<div class='container email-container'>
  <div class='email-preheader'>
    <img src="http://gadgetoy.com/ecommerce/public/client/assets/images/logo.png" width="300px" height="100px">
  </div>
  <div class='email-header'>
    <div class='content text-dark'>
      <h4 class='title'>
        THANK YOU FOR JOINING US
      </h4>
      <p class='text'>
        SAVE TIME-TO-TIME.
      </p>
      <p class='text'>
        YOUR SWEEPING COSTS WITH THE GADGETOY
      </p>
      <h2 class="text-dark">Click
        <a href="{{route('sendemaildone',["email"=> $Client->email,"varify_token"=> $Client->varify_token])}}">
        here</a> and verify your account
        </h2>
    </div>
    <img>
  </div>


  <div class='email-footer'>
    <div class='link'>
      <a href="#" class='title'>Unsubscribe |</a>
      <a href="http://gadgetoy.com/ecommerce/contact-us" class='title'>Contact Us |</a>
      <a href="#" class='title'>General Terms of use |</a>
      <a href="#" class='title'>Privacy Policy |</a>
    </div>
    <div class='email'>
      <p>This email was sent to: name@gmail.com</p>
    </div>
    <div class='copywrite'>
      <p>© 2020 ABHI CHOWDHURY. All Rights Reserved.</p>
    </div>
    <div class='address'>
      <p class='name'>Bahundhara D Block Dhaka, Bangladesh</p>
    </div>
  </div>
</div>


