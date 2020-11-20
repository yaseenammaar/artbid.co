<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="img/heart.svg">
  <title>Artbid - Edit</title>
    <link href="css/style.css" rel="stylesheet">
<style type="text/css">
  hr.sep-3::after {
  content: '§';
  display: inline-block;
  position: absolute;
  left: 50%;
  transform: translate(-50%, -50%) rotate(60deg);
  transform-origin: 50% 50%;
  padding: 1rem;
  background-color: white;
}

 input {
   display: block;
   margin: 2em auto;
   border: none;
   padding: 0;
   width: 40%;
   background: repeating-linear-gradient(90deg, dimgrey 0, dimgrey 1ch, transparent 0, transparent 1.5ch) 0 100%/ 8.5ch 2px no-repeat;
   font: 5ch droid sans mono, consolas, monospace;
   letter-spacing: 0.5ch;
}
 input:focus {
   outline: none;
   color: dodgerblue;
}
.form-group{
  width: 70%;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
#displaypic {
      border-radius: 50%;
          box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);


    }
</style>


</head>
<body>

<div class="topbar">
    <span id="main-img" onclick="goto('index.html')"></span>
    <span id="right-icons">
      <span id="bid-icon" onclick="goto('activebids.html')"></span>
      <span id="profile-icon" onclick="checkauth()"></span>
    </span>

        <hr class="sep-3"/>

    <div>
      <center>
            <div id="register-form-container">

      <h1>Edit Profile</h1>

        <img id="displaypic" width="100px" height="100px" src="img/ph.svg" onclick="$('#profilechange').click()">
        <br><br><br>
        <input id="profilechange" type="file" accept="image/*" name="images" onchange="readURL(this);" style="display: none;">
        <button class="box" style="width: 20%;margin-bottom: 30px">Update Profile Picture</button>

        <div id="phone-input-div">
        <div class="form-group" id="phone-input">
          <span>+91</span>
              <input class="form-field" type="number" placeholder="Phone" id="phoneNumber" disabled>
          </div>
          <div class="form-group" id="phone-input">
          <span>@</span>
              <input class="form-field" type="Email" placeholder="Email" id="email">
          </div>
          <div class="form-group" id="phone-input">
              <input class="form-field" type="text" placeholder="Username" id="username">
          </div>
          <div class="form-group" id="phone-input">
              <input class="form-field" type="text" placeholder="Bio" id="bio">
          </div>
          <br>
          <br>
           <button class="box" onclick="showupdated()" id="phone-submit-btn" >Update</button>
           <br><br>
           </div>
           <center>
            
      </div>
      <br><br><br>

      <div id="register-form-container">

      <h1>Address</h1>

        <div id="phone-input-div">
          <div class="form-group" id="phone-input">
          <span>@</span>
              <input class="form-field" type="text" placeholder="Full Name" id="fullname">
          </div>


          <div class="form-group" id="phone-input">
          <span>#</span>
              <input class="form-field" type="number" placeholder="Pin Code" id="pincode">
          </div>

          <div class="form-group" id="phone-input">
          <span>@</span>
              <input class="form-field" type="text" placeholder="Line 1" id="line1">
          </div>

          <div class="form-group" id="phone-input">
          <span>@</span>
              <input class="form-field" type="text" placeholder="Line 2" id="line2">
          </div>



          <div class="form-group" id="phone-input">
              <input class="form-field" type="text" placeholder="Landmark" id="landmark">
          </div>


          <div class="form-group" id="phone-input">
              <input class="form-field" type="text" placeholder="Town/City" id="towncity">
          </div>

          
          <select name="state" id="state" required>
            <option value="label" disabled selected>State</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
            <option value="Daman and Diu">Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
          </select>
          <br>
          <br>
           <button class="box" onclick="showupdated()">Update</button>
           <br><br>
           </div>
           <center>
            
      </div>
              <br><br><br>

      <div id="register-form-container">



      <h1>Bank Account Details</h1>

        <div id="phone-input-div">
          <div class="form-group" id="phone-input">
          <span>@</span>
              <input class="form-field" type="text" placeholder="Account Holder Name" id="ahname">
          </div>


          <div class="form-group" id="phone-input">
          <span>#</span>
              <input class="form-field" type="number" placeholder="Bank name" id="pincode">
          </div>

          <div class="form-group" id="phone-input">
          <span>@</span>
              <input class="form-field" type="text" placeholder="Account number" id="accno">
          </div>

          <div class="form-group" id="phone-input">
          <span>@</span>
              <input class="form-field" type="text" placeholder="IFSC Code" id="line2">
          </div>
          <br>
          <br>
           <button class="box" onclick="showupdated()">Update</button>
           <br><br>
           </div>
           <center>
            
      </div>


      </center>
    </div>
      <div id="recaptcha-container"></div>
      <br>
          <hr class="sep-3"/>
<center>
  <h6 onclick="showiconalert()" style="cursor: pointer;">Icons</h6>
            <h6>Terms and Conditions | Contact Us | <a href="policy.html">Policy</a> | <a href="about.html">About</a></h6>
  <h6>Stwpd Makes</h6>
</center>


    <script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-database.js"></script>

    <script type="text/javascript" src="js/firebase.js"></script>
  
<script type="text/javascript">
      $('#phone-input-div').hide();
      $('#code-input-div').hide();

      $('#gender').hide();

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#displaypic')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
      function showupdated(){
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: 'Updated successfully'
      })
      }

      function getdropdownchange(){
        if($( "#acc_for option:selected" ).text()=="Individual"){
          $('#gender').show()
        }else{
          $('#gender').hide();
        }
      }

      function validate(){
        var phoneNumber = document.getElementById("phoneNumber").value;
          var emailid = document.getElementById("email").value;
          var username = document.getElementById("username").value;

          username = username.toLowerCase();
          var phonefound = 0;
          var emailfound = 0;
          var usernamefound = 0;

          var count = 0;
          var counte = 0;
          var countu = 0;
          var format = /[ `!@#$%^&*()+\-=\[\]{};':"\\|,<>\/?~]/;
          var dbref = firebase.database().ref('user');
          if(email != "" && phoneNumber != "" && username != "")
          {

          if(phoneNumber.length==10){
            if(emailid.includes("@")){
                        var spl = emailid.split('@');
                        if(spl[1].includes('.')){
                          dbref.on("value", function(snap){
                          snap.forEach(function(snapshot){
                            if(phoneNumber==snapshot.val().phone){
                              phonefound = 1;
                            }
                            count++;
                            if(count==snap.numChildren())
                            {
                              if(phonefound==1){
                                Swal.fire(
                                  'Phone number already in use',
                                  '',
                                  'error',
                                )
                                }else{
                                  emailid = document.getElementById("email").value;
                                  if(emailid.includes("@")){
                                    var spl = emailid.split('@');
                                    if(spl[1].includes('.')){
                                      snap.forEach(function(emailsnapshot){
                                        if(emailid==emailsnapshot.val().email){
                                          emailfound = 1;
                                        }
                                        counte++;
                                        if(counte==snap.numChildren()){
                                          if(emailfound==1){
                                            Swal.fire(
                                              'Email already in use',
                                              '',
                                              'error',
                                            )
                                          }else{
                                            if(username.length<5 || username.length>15){
                                              Swal.fire(
                                                'Username characters must be between 5 to 15.',
                                                '',
                                                'error',
                                              )
                                            }else{
                                              if(username.charAt(0) >= '0' && username.charAt(0) <= '9'){
                                                Swal.fire('Invalid username',
                                                  'Username must not start with a number.',
                                                  'error')
                                              }else{
                                                if(format.test(username) || username.includes(" "))
                                                {
                                                  Swal.fire('Invalid username',
                                                  'Username should not contain special characters except _(Underscore) and .(Dot).',
                                                  'error')
                                                }else{
                                              snap.forEach(function(usernamesnapshot){
                                                if(username == usernamesnapshot.val().username){
                                                  usernamefound=1;
                                                }
                                                countu++;
                                                if(countu==snap.numChildren()){
                                                  if(usernamefound==1)
                                                  {
                                                    Swal.fire(
                                                      'Username exists.',
                                                      'Choose another username',
                                                      'error',
                                                    )
                                                  }else{
                                                    if($( "#acc_for option:selected" ).text() == "Select"){
                                                        Swal.fire(
                                                        'Choose account type',
                                                        '',
                                                        'error',
                                                      )
                                                    }else{
                                                      submitPhoneNumberAuth();
                                                    }
                                                  }
                                                }
                                              })
                                            }
                                          }
                                            }
                                          }
                                        }
                                      })
                                    }else{
                                      Swal.fire(
                                        'Invalid E-Mail address',
                                        '',
                                        'error'
                                      )
                                    }
                                  }else{
                                    Swal.fire(
                                      'Invalid E-Mail address',
                                      '',
                                      'error'
                                      )
                                  }
                              }
                            }
                          })

                        })
                        }else{
                          Swal.fire(
                            'Invalid E-Mail address',
                            '',
                            'error'
                          )
                        }
                      }else{
                        Swal.fire(
                          'Invalid E-Mail address',
                          '',
                          'error'
                          )
                      }
            
          }else{
              Swal.fire(
              'Invalid Phone number',
              'Phone number must contain 10 digit.',
              'error',
            )
          }
        }else{
          Swal.fire(
              'All fields are mandatory',
              '',
              'error',
            )
        }
      }

      firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          console.log("USER LOGGED IN");
          // window.location.href = "profile.html";
        } else {
          $('#phone-input-div').show();
          console.log("USER NOT LOGGED IN");
        }
      });

  
      // Create a Recaptcha verifier instance globally
      // Calls submitPhoneNumberAuth() when the captcha is verified
      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
        "recaptcha-container",
        {
          size: "invisible",
          callback: function(response) {
            submitPhoneNumberAuth();
          }
        }
      );

      // This function runs when the 'sign-in-button' is clicked
      // Takes the value from the 'phoneNumber' input and sends SMS to that phone number
      function submitPhoneNumberAuth() {
        var phoneNumber = "+91" + document.getElementById("phoneNumber").value;

        if(phoneNumber.length==13)
        {

        var appVerifier = window.recaptchaVerifier;
        $('#phone-input-div').hide();
          $('#phoneshow').html("OTP sent to <b>" + phoneNumber + "</b><br>");

        $('#code-input-div').show();
        firebase
          .auth()
          .signInWithPhoneNumber(phoneNumber, appVerifier)
          .then(function(confirmationResult) {
            window.confirmationResult = confirmationResult;
          })
          .catch(function(error) {
            console.log(error);
          });
        }else{
          alert("Phone number must contain 10 digit.");
        }
      }
      

      // This function runs when the 'confirm-code' button is clicked
      // Takes the value from the 'code' input and submits the code to verify the phone number
      // Return a user object if the authentication was successful, and auth is complete
      function submitPhoneNumberAuthCode() {
        var icon = ["https://image.flaticon.com/icons/svg/1165/1165817.svg" , "https://image.flaticon.com/icons/svg/2865/2865484.svg","https://image.flaticon.com/icons/svg/2893/2893152.svg","https://image.flaticon.com/icons/svg/806/806647.svg"]
        var random = Math.floor((Math.random() * 4));

        var code = document.getElementById("code").value;
        confirmationResult
          .confirm(code)
          .then(function(result) {
            var user = result.user;
            console.log(user);
            var phoneNumber = document.getElementById("phoneNumber").value;
            var emailid = document.getElementById("email").value;
            var username = document.getElementById("username").value;
            var g = $( "#acc_for option:selected" ).text();
            var type = $( "#acc_for option:selected" ).text();
            if(type == "Individual"){
              g = $( "#gender option:selected" ).text();
            }

            firebase.database().ref('user/'+user.uid).set(
                {
                  "bio" : "No artist tolerates reality",
                  "email" : emailid,
                  "phone" : phoneNumber,
                  "profilePic" : icon[random],
                  "username" : username,
                  "gender" : g
                }
              );

            Swal.fire(
              'Congrats!',
              'Your account has been created. Redirecting to home....',
              'success'
            )
            setTimeout(function () {
                window.location.href = "index.html";
            }, 3000);
          })
          .catch(function(error) {
            console.log(error);
          });
      }




      //This function runs everytime the auth state changes. Use to verify if the user is logged in
      
  function goto(link){
    window.location.href = link;
  }
  


  function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    document.getElementById("livesearch").innerHTML=str;
    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
  }
</script>

</body>
</html>