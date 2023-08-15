//toggle menu
const toggle = document.getElementById('toggle');
const menu = document.getElementById('menu');

toggle.onclick = function(){
    menu.classList.toggle('active');
}

//botoes para outras páginas
// function redirectToDeletePage() {
//     window.location.href = 'delete.php';
//   }

//   function redirectToIndexPage() {
//     window.location.href = 'index.php';
//   }

//   function redirectToVerifyPage() {
//     window.location.href = 'alterar.php';
//   }

  //validação de senha em 2 etapas
  // const form = document.getElementById('formulario');
  // const passwordField = document.getElementById('password');
  // const confirmPasswordField = document.getElementById('confirm_password');

  // form.addEventListener('submit', function (event) {
  //     if (passwordField.value !== confirmPasswordField.value) {
  //         event.preventDefault();
  //         alert('As senhas não correspondem');
  //     }
  // });

