<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register & Login</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <style>
         body {
        margin: 0;
        font-family: "Poppins", Arial, sans-serif;
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
        background: #f3f4f6;
        color: #1f2937;
      }

      h1,
      p {
        margin: 0;
      }

       /* Main Container */
       .main-container {
        display: flex;
        width: 80%;
        max-width: 1200px;
        height: 70%;
        background: #ffffff;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
        border-radius: 15px;
        overflow: hidden;
      }

      /* Left Section */
      .left-section {
        flex: 1;
        background: linear-gradient(135deg, #6c63ff, #ff6584);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 30px;
        text-align: center;
      }


      .left-section h1 {
        font-size: 3rem;
        margin-bottom: 15px;
      }

      .left-section p {
        font-size: 1.2rem;
        line-height: 1.6;
      }

      /* Right Section */
      .right-section {
        flex: 1;
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }

      .container {
        width: 100%;
        max-width: 400px;
        display: none;
      }

      .container.active {
        display: block;
      }

      .form-title {
        text-align: center;
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
      }

      

      .input-group {
        position: relative;
        margin-bottom: 10px;
      }

      .input-group i {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #888;
        font-size: 1.2rem;
      }

      .input-group input {
        width: 100%;
        padding: 12px 12px 12px 35px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        outline: none;
        transition: all 0.3s ease-in-out;
      }

      .input-group input:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 8px rgba(108, 99, 255, 0.4);
      }

      .btn {
        width: 100%;
        padding: 12px;
        right: 20px;
        background: #6c63ff;
        color: rgb(255, 255, 255);
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s ease;
      }

      .btn:hover {
        background: #4a47a3;
      }

      .or {
        text-align: center;
        margin: 15px 0;
        color: #888;
      }

      .icons {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 10px 0;
      }

      .icons i {
        font-size: 1.5rem;
        cursor: pointer;
        color: #888;
        transition: color 0.3s ease, transform 0.3s ease;
      }

      .icons i:hover {
        color: #ff6584;
        transform: scale(1.2);
      }

      .links {
        display: flex;
        text-align: center;
        margin-top: 15px;
        justify-content: center;
        gap: 10px;
        font-size: 1rem;
      }

      .links button {
        background: none;
        border: none;
        color: #6c63ff;
        cursor: pointer;
        text-decoration: underline;
        font-size: 1rem;
      }

      .links button:hover {
        color: #4a47a3;
      }

      /* Responsive Styles */
      @media (max-width: 576px) {
            .main-container {
                flex-direction: column;
                width: 95%;
            }
            .left-section {
                padding: 20px;
                min-height: auto;
            }
            .left-section h1 {
                font-size: 1.8rem;
            }
            .left-section p {
                font-size: 1rem;
            }
            .form-title {
                font-size: 1.5rem;
            }
        }
        @media (min-width: 576px) and (max-width: 992px) {
            .main-container {
                width: 90%;
            }
            .left-section {
                padding: 25px;
            }
            .form-title {
                font-size: 1.8rem;
            }
        }
        @media (min-width: 992px) {
            .main-container {
                height: 70%;
            }
            .left-section h1 {
                font-size: 3rem;
            }
            .form-title {
                font-size: 2rem;
            }
        }

    </style>
</head>
<body>
    <div class="main-container">
        <div class="left-section" id="leftSection">
            <h1>Welcome!</h1>
            <p>Enter Your Email and Password to Continue</p>
        </div>
        <div class="right-section">
            <div class="container active" id="signIn">
                <h1 class="form-title">Login</h1>
                <form method="post" action="register.php">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="username" name="username" placeholder="Username" required />
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="links">
                        <div class="forgot password">
                            <button id="forgotPassword" type="button">Forgot Password?</button>
                        </div>
                    </div>
                    <input type="submit" class="btn" value="Sign In" name="signIn" >
                </form>
                <p class="or">---------- or ----------</p>
                <div class="icons">
                    <i class="fab fa-google"></i>
                    <i class="fab fa-instagram"></i>
                </div>
                <div class="links">
                    <p>Don't have an account?</p>
                    <button id="signUpButton" type="button">Sign Up</button>
                </div>
            </div>

            <div class="container" id="signup">
                <h1 class="form-title">Register</h1>
                <form method="post" action="register.php">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="user_id" placeholder="ID" required />
                    </div>
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required />
                    </div>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required />
                    </div>
                    <input type="submit" class="btn" name="signUp" value="Sign Up" />
                </form>
                <p class="or">---------- or ----------</p>
                <div class="icons">
                    <i class="fab fa-google"></i>
                    <i class="fab fa-instagram"></i>
                </div>
                <div class="links">
                    <p>Already have an account?</p>
                    <button id="signInButton" type="button">Sign In</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById("signUpButton");
        const signInButton = document.getElementById("signInButton");
        const signInForm = document.getElementById("signIn");
        const signUpForm = document.getElementById("signup");
        const leftSection = document.getElementById("leftSection");

        signUpButton.addEventListener("click", function () {
            signInForm.classList.remove("active");
            signUpForm.classList.add("active");
            leftSection.querySelector("h1").textContent = "Welcome!";
            leftSection.querySelector("p").textContent =
                "Register an account first to login";
        });

        signInButton.addEventListener("click", function () {
            signUpForm.classList.remove("active");
            signInForm.classList.add("active");
            leftSection.querySelector("h1").textContent = "Welcome!";
            leftSection.querySelector("p").textContent =
                "Enter Your Email and Password to Continue";
        });
    </script>
</body>
</html>
