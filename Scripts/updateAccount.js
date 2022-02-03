// carrega os dados necessários ao iniciar a window
window.onload = function () {
  loadTheme();
};

/**
 * Listener para a execução da alteração de dados
 */
$("#form").submit(function (e) {
  e.preventDefault();

  try {
    // verifica se as passwords coincidem
    if (
      document.getElementById("password").value !=
      document.getElementById("password-confirmation").value
    ) {
      $("#passwordMessage").slideDown(75);
      return;
    } else {
      $("#passwordMessage").slideUp(75);
    }

    $("#modal").modal("toggle");
  } catch (error) {
    console.log("Fail");
  }
});

/**
 * Verifica as crecências do user
 */
function checkCredentials() {
  $.get({
    url: "/challange/php/api/User/checkPassword.php",
    success: async function (response) {
      var data = JSON.parse(response);

      // verifica a palavra passe
      if ($("#checkPassword").value == data.password) {

        // executa o ajax para inserir na base de dados
        $.post({
          url: "/challange/php/api/User/update.php",
          data: {
            name: document.getElementById("firstName").value,
            surname: document.getElementById("lastName").value,
            username: document.getElementById("username").value,
            email: document.getElementById("email").value,
            password: document.getElementById("password").value,
          },
          success: function (response) {
            $("#modal").modal("hide");

            console.log(response)

            //window.location.replace("/challange/views/updateAccount.php");
          },
        });
      }
    },
  });
}