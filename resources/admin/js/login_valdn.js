var form = document.getElementById('form-user');

  if (form.addEventListener) {
    form.addEventListener("submit", loginValidation);
  } else if(form.attachEvent) {
    form.attachEvent("onsubmit", loginValidation);
  }

  function loginValidation(evt) {

      var deslogin = document.getElementById('deslogin');
      var despassword = document.getElementById('despassword');
      var contError = 0;

      // Password validation
      var box_despassword = document.querySelector('.passwd');
      if (despassword.value == "") {
        box_despassword.innerHTML = 'Please, insert your Password.';
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
      } else {
        box_deslogin.style.display = 'none';
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