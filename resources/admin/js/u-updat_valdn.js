var form = document.getElementById('form-user');

  if (form.addEventListener) {
    form.addEventListener("submit", userValidation);
  } else if(form.attachEvent) {
    form.attachEvent("onsubmit", userValidation);
  }

  function userValidation(evt) {

      var desperson = document.getElementById('desperson');
      var deslogin = document.getElementById('deslogin');
      var despassword = document.getElementById('despassword');
      var desemail = document.getElementById('desemail');
      var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
      var contError = 0;

      // Name validation
      var box_desperson = document.querySelector('.name');
      if (desperson.value == "") {
        box_desperson.innerHTML = 'Please, insert your Name.';
        box_desperson.style.display = 'block';
        contError += 1;
      } else if (desperson.value.length < 2) {
        box_desperson.innerHTML = 'Minimum of 2 characters!';
        box_desperson.style.display = 'block';
        contError += 1;
      } else {
        box_desperson.style.display = 'none';
      }

      // Password validation
      var box_despassword = document.querySelector('.passwd');
      if (despassword.value == "") {
        box_despassword.innerHTML = 'Please, insert your Password.';
        box_despassword.style.display = 'block';
        contError += 1;
      } else if (despassword.value.length < 6) {
        box_despassword.innerHTML = 'Minimum of 6 characters!';
        box_despassword.style.display = 'block';
        contError += 1;
      } else {
        box_despassword.style.display = 'none';
      }

      // Login validation
      var box_deslogin = document.querySelector('.login');
      if (deslogin.value == "") {
        box_deslogin.innerHTML = 'Please, insert your Login.';
        box_deslogin.style.display = 'block';
        contError += 1;
      }else if (deslogin.value.length < 5) {
        box_deslogin.innerHTML = 'Minimum of 5 characters!';
        box_deslogin.style.display = 'block';
        contError += 1;
      } else {
        box_deslogin.style.display = 'none';
      }

      // E-mail validation
      var box_email = document.querySelector('.email');
      if(desemail.value == ""){
        box_email.innerHTML = "Please, insert your E-mail.";
        box_email.style.display = 'block';
        contError += 1;
      }else if(filtro.test(desemail.value)){
        box_email.style.display = 'none';
      }else{
        box_email.innerHTML = "Invalid E-mail format!";
        box_email.style.display = 'block';
        contError += 1;
      }



      // Counts errors and prevents the button from sending to the form
      if (contError > 0) {
        
       evt.preventDefault();

      }


      // Campo senha 2
      
      /*var box_password2 = document.querySelector('.msg-senha');
      if (password.value == "") {
        box_password2.innerHTML = 'Preencher a senha!';
        box_password2.style.display = 'block';
        contError += 1;
      } else if (senha.value.lenght < 5) {
        box_password2.innerHTML = 'Preencher a senha com o minimo de 5 caracteres!';
        box_login.style.display = 'block';
      } else {
        box_login.style.display = 'none';
      }
      
      if (senha.value != "" && senha2.value != "" && senha.value != senha2.value) {
        box_password2.innerHTML = 'O campo Repita a senha é diferente do campo senha!';
        contError += 1;
      }
      */


  }