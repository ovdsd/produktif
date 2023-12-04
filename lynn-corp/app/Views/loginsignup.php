<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lynn Corp - Login</title>

</head>

<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <form action="/login" method="post" autocomplete="off" class="sign-in-form" id="login">
            <div class="logo">
              <img src="https://cdn.discordapp.com/attachments/961820020302815292/1168060559137189978/logo.png?ex=6550642a&is=653def2a&hm=a031bfdda83c0588d7a7f380075da162ff199bec734681b497da10585c89bd97&" alt="easyclass" />
              <h4>L y n n.</h4>
            </div>

            <div class="heading">
              <h2>Log In</h2>
              <h6>Don't Have An Account?</h6>
              <a href="#" class="toggle">Sign up</a>
            </div>

            <div class="actual-form">
              <div class="input-wrap">
                <input name="username" type="text" minlength="4" class="input-field username" autocomplete="off" required />
                <label>Username</label>
              </div>

              <div class="input-wrap">
                <input name="password" type="password" minlength="6" class="input-field password" autocomplete="off" required />
                <label>Password</label>
              </div>

              <div class="input-wrap">
                <div class="checkbox-wrapper-2">
                  <input style="margin-top: 6px;" type="checkbox" class="sc-gJwTLC ikxBAC" name="remember" id="remember">
                </div>
                <label style="margin-left: 45px;">Remember Me</label>
              </div>

              <input type="submit" value="Log In" class="sign-btn" id="signin-btn" />
            </div>
          </form>

          <form action="/register" method="post" autocomplete="off" class="sign-up-form" id="signup">
            <div class="logo">
              <img src="https://cdn.discordapp.com/attachments/961820020302815292/1168060559137189978/logo.png?ex=6550642a&is=653def2a&hm=a031bfdda83c0588d7a7f380075da162ff199bec734681b497da10585c89bd97&" alt="easyclass" />
              <h4>L y n n.</h4>
            </div>

            <div class="heading">
              <h2>Get Started</h2>
              <h6>Already have an account?</h6>
              <a href="#" class="toggle">Log In</a>
            </div>

            <div class="actual-form">
              <div class="input-wrap">
                <input name="name" type="text" minlength="4" class="input-field username" autocomplete="off" required />
                <label>Name</label>
              </div>

              <div class="input-wrap">
                <input name="suusername" type="text" minlength="4" class="input-field username" autocomplete="off" required />
                <label>Username</label>
              </div>

              <div class="input-wrap">
                <input name="supassword" type="password" minlength="6" class="input-field password" autocomplete="off" required />
                <label>Password</label>
              </div>

              <div class="input-wrap">
                <input name="supassword_confirm" type="password" minlength="6" class="input-field password" autocomplete="off" required />
                <label>Confirm Password</label>
              </div>

              <input type="submit" value="Sign Up" class="sign-btn" id="signup-btn" />

              <p class="text">
                By signing up, I agree to the
                <a href="#">Terms of Services</a> and
                <a href="#">Privacy Policy</a>
              </p>
            </div>
          </form>
        </div>

        <div class="carousel">
          <div class="images-wrapper">
            <img style="margin-top: -40px;" src="https://cdn.discordapp.com/attachments/961820020302815292/1167041383907983420/Lua-Logo_128x128_1.png?ex=654caefc&is=653a39fc&hm=bb92f3ac1cf003678e422c20c4425b4631ac2e4cc8b46d60dff884c32e7e7002&" class="image img-1 show" alt="" />
            <img style="display: inline-block; margin: 0 auto;" src="https://cdn.discordapp.com/attachments/1069951518637314048/1153354343001620480/WhatsApp_Image_2023-09-18_at_10.33.00_PM.jpeg?ex=6549086f&is=6536936f&hm=f16e55a1ec6f79625e8758f0350bf06a78c6bf1a7d9cb3a22c0f597e4888dd6e&" class="image img-2" alt="" />
            <img style="height: auto; width: 350px; display: inline-block; margin: 0 auto;" src="https://cdn.discordapp.com/attachments/1069951518637314048/1112614261710139522/Untitled-1.png?ex=65487a47&is=65360547&hm=ee5a3f5797c1ffbc6b8acf5c606af1cf618c796072bbc4c7ecf277a6adce89ce&" class="image img-3" alt="" />
          </div>

          <div class="text-slider">
            <div class="text-wrap">
              <div class="text-group">
                <h2>L y n n.</h2>
                <h2>Muhammad Is'ad Prabaswara</h2>
                <h2>Beginner Programmer</h2>
              </div>
            </div>

            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Javascript file -->
  <script src="<?= base_url('assets/js/login.js'); ?>"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

    *,
    *::before,
    *::after {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body,
    input {
      font-family: "Poppins", sans-serif;
    }

    main {
      width: 100%;
      min-height: 100vh;
      overflow: hidden;
      background-image: url('https://cdn.discordapp.com/attachments/1120552966290686184/1147694825441853482/image.png?ex=65347199&is=6521fc99&hm=c209799fd51d5b4e16ea50391e1b341aa8ebdebf21cc032074be7b39e2769d73&');
      background-size: cover;
      padding: 2rem;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .checkbox-wrapper-2 .ikxBAC {
      appearance: none;
      background-color: #dfe1e4;
      border-radius: 72px;
      border-style: none;
      flex-shrink: 0;
      height: 20px;
      margin: 0;
      position: relative;
      width: 30px;
    }

    .checkbox-wrapper-2 .ikxBAC::before {
      bottom: -6px;
      content: "";
      left: -6px;
      position: absolute;
      right: -6px;
      top: -6px;
    }

    .checkbox-wrapper-2 .ikxBAC,
    .checkbox-wrapper-2 .ikxBAC::after {
      transition: all 100ms ease-out;
    }

    .checkbox-wrapper-2 .ikxBAC::after {
      background-color: #fff;
      border-radius: 50%;
      content: "";
      height: 14px;
      left: 3px;
      position: absolute;
      top: 3px;
      width: 14px;
    }

    .checkbox-wrapper-2 input[type=checkbox] {
      cursor: default;
    }

    .checkbox-wrapper-2 .ikxBAC:hover {
      background-color: #c9cbcd;
      transition-duration: 0s;
    }

    .checkbox-wrapper-2 .ikxBAC:checked {
      background-color: #6e79d6;
    }

    .checkbox-wrapper-2 .ikxBAC:checked::after {
      background-color: #fff;
      left: 13px;
    }

    .checkbox-wrapper-2 :focus:not(.focus-visible) {
      outline: 0;
    }

    .checkbox-wrapper-2 .ikxBAC:checked:hover {
      background-color: #535db3;
    }


    .box {
      position: relative;
      width: 100%;
      max-width: 1020px;
      height: 640px;
      background-color: #45a07d;
      border-radius: 3.3rem;
      box-shadow: 0 60px 40px -30px rgba(0, 0, 0, 0.27);
    }

    .inner-box {
      position: absolute;
      width: calc(100% - 4.1rem);
      height: calc(100% - 4.1rem);
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .forms-wrap {
      position: absolute;
      height: 100%;
      width: 45%;
      top: 0;
      left: 0;
      display: grid;
      grid-template-columns: 1fr;
      grid-template-rows: 1fr;
      transition: 0.8s ease-in-out;
    }

    form {
      max-width: 260px;
      width: 100%;
      margin: 0 auto;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      grid-column: 1 / 2;
      grid-row: 1 / 2;
      transition: opacity 0.02s 0.4s;
    }

    form.sign-up-form {
      opacity: 0;
      pointer-events: none;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      width: 27px;
      margin-right: 0.3rem;
    }

    .logo h4 {
      font-size: 1.1rem;
      margin-top: -9px;
      letter-spacing: -0.5px;
      color: #fcfcfc;
    }

    .heading h2 {
      font-size: 2.1rem;
      font-weight: 600;
      color: #fcfcfc;
    }

    .heading h6 {
      color: #bababa;
      font-weight: 400;
      font-size: 0.75rem;
      display: inline;
    }

    .toggle {
      color: #fcfcfc;
      text-decoration: none;
      font-size: 0.75rem;
      font-weight: 500;
      transition: 0.3s;
    }

    .toggle:hover {
      color: #8371fd;
    }

    .input-wrap {
      position: relative;
      height: 37px;
      margin-bottom: 2rem;
    }

    .input-field {
      position: absolute;
      width: 100%;
      height: 100%;
      background: none;
      border: none;
      outline: none;
      border-bottom: 1px solid #bbb;
      padding: 0;
      font-size: 0.95rem;
      color: #fcfcfc;
      transition: 0.4s;
    }

    label {
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      font-size: 0.95rem;
      color: #bbb;
      pointer-events: none;
      transition: 0.4s;
    }

    .input-field.active {
      border-bottom-color: #fcfcfc;
    }

    .input-field.active+label {
      font-size: 0.75rem;
      top: -2px;
    }

    .sign-btn {
      display: inline-block;
      width: 100%;
      height: 43px;
      background-color: #fff;
      color: rgb(22, 20, 20);
      border: none;
      cursor: pointer;
      border-radius: 0.8rem;
      font-size: 0.8rem;
      margin-bottom: 2rem;
      transition: 0.3s;
    }

    .sign-btn:hover {
      background-color: #8371fd;
    }

    .text {
      color: #bbb;
      font-size: 0.7rem;
    }

    .text a {
      color: #bbb;
      transition: 0.3s;
    }

    .text a:hover {
      color: #8371fd;
    }

    main.sign-up-mode form.sign-in-form {
      opacity: 0;
      pointer-events: none;
    }

    main.sign-up-mode form.sign-up-form {
      opacity: 1;
      pointer-events: all;
    }

    main.sign-up-mode .forms-wrap {
      left: 55%;
    }

    main.sign-up-mode .carousel {
      left: 0%;
    }

    .carousel {
      position: absolute;
      height: 100%;
      width: 55%;
      left: 45%;
      top: 0;
      background-color: #0b0b0b;
      border-radius: 2rem;
      display: grid;
      grid-template-rows: auto 1fr;
      padding-bottom: 2rem;
      overflow: hidden;
      transition: 0.8s ease-in-out;
    }

    .images-wrapper {
      display: grid;
      grid-template-columns: 1fr;
      grid-template-rows: 1fr;
    }

    .image {
      width: 100%;
      grid-column: 1/2;
      grid-row: 1/2;
      opacity: 0;
      transition: opacity 0.3s, transform 0.5s;
    }

    .img-1 {
      transform: translate(0, -50px);
    }

    .img-2 {
      transform: scale(0.4, 0.5);
    }

    .img-3 {
      transform: scale(0.3) rotate(-20deg);
    }

    .image.show {
      opacity: 1;
      transform: none;
    }

    .text-slider {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    .text-wrap {
      max-height: 2.2rem;
      overflow: hidden;
      margin-bottom: 2.5rem;
    }

    .text-group {
      display: flex;
      flex-direction: column;
      text-align: center;
      transform: translateY(0);
      transition: 0.5s;
      color: #fff;
    }

    .text-group h2 {
      line-height: 2.2rem;
      font-weight: 600;
      font-size: 1.6rem;
    }

    .bullets {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .bullets span {
      display: block;
      width: 0.5rem;
      height: 0.5rem;
      background-color: #aaa;
      margin: 0 0.25rem;
      border-radius: 50%;
      cursor: pointer;
      transition: 0.3s;
    }

    .bullets span.active {
      width: 1.1rem;
      background-color: #45a07d;
      border-radius: 1rem;
    }

    @media (max-width: 850px) {
      .box {
        height: auto;
        max-width: 550px;
        overflow: hidden;
      }

      .inner-box {
        position: static;
        transform: none;
        width: revert;
        height: revert;
        padding: 2rem;
      }

      .forms-wrap {
        position: revert;
        width: 100%;
        height: auto;
      }

      form {
        max-width: revert;
        padding: 1.5rem 2.5rem 2rem;
        transition: transform 0.8s ease-in-out, opacity 0.45s linear;
      }

      .heading {
        margin: 2rem 0;
      }

      form.sign-up-form {
        transform: translateX(100%);
      }

      main.sign-up-mode form.sign-in-form {
        transform: translateX(-100%);
      }

      main.sign-up-mode form.sign-up-form {
        transform: translateX(0%);
      }

      .carousel {
        position: revert;
        height: auto;
        width: 100%;
        padding: 3rem 2rem;
        display: flex;
      }

      .images-wrapper {
        display: none;
      }

      .text-slider {
        width: 100%;
      }
    }

    @media (max-width: 530px) {
      main {
        padding: 1rem;
      }

      .box {
        border-radius: 2rem;
      }

      .inner-box {
        padding: 1rem;
      }

      .carousel {
        padding: 1.5rem 1rem;
        border-radius: 1.6rem;
      }

      .text-wrap {
        margin-bottom: 1rem;
      }

      .text-group h2 {
        font-size: 1.2rem;
      }

      form {
        padding: 1rem 2rem 1.5rem;
      }
    }
  </style>

</body>

</html>