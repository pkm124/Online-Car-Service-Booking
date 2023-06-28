<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mech Login</title>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="register.css">
    <script defer src="./index.js"></script>
</head>
<body>
    <div class="container">
        <form id="form" action="mech_login_process.php" method="POST" style="margin-top: 32vh;">
            <h1>Login</h1>
            
            <div class="input-control">
                <input id="username" name="username" type="text" placeholder="Username">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input id="password" name="password" type="password" placeholder="Password">
                <div class="error"></div>
            </div>
            
            <input type="submit" name="register" id="button" value="Login">
        </form>
    </div>
</body>
</html>



<script>
// const form = document.getElementById('form');
// const fname = document.getElementById('fname');
// const mno = document.getElementById('mno');
// const username = document.getElementById('username');
// const email = document.getElementById('email');
// const password = document.getElementById('password');
// const password2 = document.getElementById('password2');
// const address = document.getElementById('address');

// form.addEventListener('submit', e => {
//     /e.preventDefault();

//     validateInputs();
// });

// const setError = (element, message) => {
//     const inputControl = element.parentElement;
//     const errorDisplay = inputControl.querySelector('.error');

//     errorDisplay.innerText = message;
//     inputControl.classList.add('error');
//     inputControl.classList.remove('success')
// }

// const setSuccess = element => {
//     const inputControl = element.parentElement;
//     const errorDisplay = inputControl.querySelector('.error');

//     errorDisplay.innerText = '';
//     inputControl.classList.add('success');
//     inputControl.classList.remove('error');
// };

// const isValidEmail = email => {
//     const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return re.test(String(email).toLowerCase());
// }

// const validateInputs = () => {
//     const fnameValue = fname.value.trim();
//     const usernameValue = username.value.trim();
//     const mnoValue = mno.value.trim();
//     const emailValue = email.value.trim();
//     const passwordValue = password.value.trim();
//     const password2Value = password2.value.trim();
//     const addressValue = address.value.trim();

//     if(fnameValue === '') {
//         setError(fname, 'Full Name is required');
//     } else {
//         setSuccess(fname);
//     }

//     if(usernameValue === '') {
//         setError(username, 'Username is required');
//     } else {
//         setSuccess(username);
//     }

//     // if(mnoValue === '') {
//     //     setError(mno, 'Mobile Number is required');
//     // } else if (mnoValue.length = 10 ) {
//     //     setError(mno, 'Mobile number should be of 10 digits')
//     // } else {
//     //     setSuccess(mno);
//     // }

//     if(emailValue === '') {
//         setError(email, 'Email is required');
//     } else if (!isValidEmail(emailValue)) {
//         setError(email, 'Provide a valid email address');
//     } else {
//         setSuccess(email);
//     }

//     if(passwordValue === '') {
//         setError(password, 'Password is required');
//     } else if (passwordValue.length < 8 ) {
//         setError(password, 'Password must be at least 8 character.')
//     } else {
//         setSuccess(password);
//     }

//     if(password2Value === '') {
//         setError(password2, 'Please confirm your password');
//     } else if (password2Value !== passwordValue) {
//         setError(password2, "Passwords doesn't match");
//     } else {
//         setSuccess(password2);
//     }
//     if(addressValue === '') {
//         setError(address, 'Address is required');
//     } else {
//         setSuccess(address);
//     }

// };

</script>