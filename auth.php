<script>
    // Show Password Functionality
    let showPass = document.getElementById('showPass');
    let password = document.getElementById('password');
    let confirmpassword = document.getElementById('confirmpassword');

    showPass.addEventListener('click', (e) => {
        console.log(password, confirmpassword)
        if (password.type == 'password') {
            password.type = 'text';
            confirmpassword.type = 'text';
        } else {
            password.type = 'password'
            confirmpassword.type = 'password';
        }
    })


    // Alert and Remove Alert Functionality
    let rem = document.getElementById('removed');
    setTimeout(() => {
        rem.style.display = "none";
    }, 1700)


    //
</script>