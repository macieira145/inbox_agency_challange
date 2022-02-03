// var de controlo de produtos
var product_count = 0;

var cart_product_count = 0;

const currency = {
  dollar: 1.1323,
  real: 5.9677,
  eur: 1,
};

const currency_symbol = {
  dollar: "$",
  real: "R$",
  eur: "€",
};

/**
 * Carrega
 */
function loadMore() {
  product_count += 3;
  loadProductsList();
}

function filterByAll() {
  product_count = 0;
  // adiciona os produtos à interface
  document.getElementById("products").innerHTML = "";
  loadProductsList();
}

/**
 * Carrega os produtos para a página
 */
function loadProductsList() {
  var xhttp = new XMLHttpRequest();

  var output = "";

  // tratamento de dados
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // converte o jsonArray
      var json = JSON.parse(this.responseText);

      let currencyValue = localStorage.getItem("currency");

      // var de verificação de items
      var count = 0;

      // itera no jsonArray
      for (var i = 0; i < json.data.length; i++) {
        // verifica se é o primeiro item
        if (count == 0) output += '<div class="row justify-content-center">';
        count++;
        // cria um novo card
        output +=
          `<div class=\"card\">
                <img src="../Resources/usb_drive.jpg" alt="Product Image">
                <div class=\"card-body\"> 
                    <div class=\"details-box\">
                        <h2>` +
          json.data[i].description +
          `</h2>
                        <p>
                            <small>` +
          json.data[i].details +
          `</small>
                        </p>
                    </div>
                    <div class=\"price-box\">
                        <h1>` +
          parseFloat(json.data[i].unitPrice * currency[currencyValue]).toFixed(
            2
          ) +
          `</h1>
                        <h1>${currency_symbol[currencyValue]}</h1>
                    </div>
                    <div class=\"card-buttons\">
                        <div class=\"button\" onclick="addToCart(` +
          json.data[i].id +
          `)">
                            <i class=\"bx bx-cart\"></i>
                            <span> Carrinho </span>
                        </div>
                    </div>
                </div>
            </div>`;
        // se existirem 3 produtos, fecha a tag
        if (count == 3) {
          output += "</div>";
          count = 0;
        }
      }

      // fecha a div
      output += "</div>";

      // adiciona os produtos à interface
      document.getElementById("products").innerHTML += output;
    }
  };

  // abre ligação e envia
  xhttp.open("GET", "../php/api/Product/getAll.php?row=" + product_count, true);
  xhttp.send();
}

/**
 * Pesquisa por um produto na base de dados
 */
function searchProduct() {
  // dados para o post
  let search = document.getElementById("searchBar").value;

  // code for enter
  $.post({
    url: "../php/api/Product/get.php?search=" + search,
    success: function (response) {
      // converte o jsonArray
      var json = JSON.parse(response);

      let currencyValue = localStorage.getItem("currency");

      // inicialização da var
      var output = "";

      // var de verificação de items
      var count = 0;

      // itera no jsonArray
      for (var i = 0; i < json.data.length; i++) {
        // verifica se é o primeiro item
        if (count == 0) output += '<div class="row justify-content-center">';
        count++;
        // cria um novo card
        output +=
          `<div class=\"card\">
            <img src="../Resources/usb_drive.jpg" alt="Product Image">
            <div class=\"card-body\"> 
                <div class=\"details-box\">
                    <h2>` +
          json.data[i].description +
          `</h2>
                    <p>
                        <small>` +
          json.data[i].details +
          `</small>
                    </p>
                </div>
                <div class=\"price-box\">
                    <h1>` +
          parseFloat(json.data[i].unitPrice * currency[currencyValue]).toFixed(
            2
          ) +
          `</h1>
                    <h1>${currency_symbol[currencyValue]}</h1>
                </div>
                <div class=\"card-buttons\">
                    <div class=\"button\">
                        <i class=\"bx bx-cart\"></i>
                        <span> Carrinho </span>
                    </div>
                </div>
            </div>
        </div>`;
        // se existirem 3 produtos, fecha a tag
        if (count == 3) {
          output += "</div>";
          count = 0;
        }
      }

      // fecha a div
      output += "</div>";

      if (json.data.length == 0) {
        output = "Não foram encontrados produtos!";
      }

      // adiciona os produtos à interface
      document.getElementById("products").innerHTML = output;
    },
  });
}

/**
 * Event listener para executar o enter
 */
document.querySelector("#searchBar").addEventListener("keypress", function (e) {
  // se carregar na tecla enter continua
  if (e.key === "Enter") {
    searchProduct();
  }
});

/**
 * Adiciona o produto ao carrinho
 * @param {ID do produto} id
 */
function addToCart(id) {
  $.ajax({
    url: "/challange/php/api/Product/get.php?id=" + id,
    success: function (response) {
      const product = JSON.parse(response);

      // recebe o carrinho do localstorage e adiciona o novo produto adicionado ao carrinho
      // devolve o array novamente ao localStorage
      var cart = JSON.parse(localStorage.getItem("cart"));
      cart.push(response);
      localStorage.setItem("cart", JSON.stringify(cart));

      // carrega o carrinho com dados
      loadCart();
    },
  });
}

/**
 * Remove o produto do carrinho ao carregar no botão de remoção
 * @param {objeto} e
 */
function removeFromCart(e) {
  // recebe o hmtl do cartContent
  var cartContent = document.getElementById("cartContent");

  // recebe o children do cart content
  var nodeList = document.querySelectorAll(".cart-item");
  // converte a nodelist para array
  var elementArray = Array.from(nodeList);

  // acede ao parent do item clicado
  var clicked = $(e).parents().eq(2);

  // recebe o index do item clicado no array nodelist
  var indexOfClicked = elementArray.indexOf(clicked[0]);

  // remove o item clicado do nodelist array
  elementArray.splice(indexOfClicked, 1);

  // coloca a lista novamente na interface
  $("#cartContent").html(elementArray);

  // recebe o carrinho do localstorage e adiciona o novo produto adicionado ao carrinho
  // devolve o array novamente ao localStorage
  var cart = JSON.parse(localStorage.getItem("cart"));
  var product = JSON.parse(cart[indexOfClicked]);

  // var de contagem do preço
  var total = parseFloat($("#cartProductTotalPrice").html());

  // subtrai o preço do produto
  total -= product.unitPrice;

  // remove o produto do array do carrinho
  cart.splice(indexOfClicked, 1);
  // upload do array novamente para o localStorage
  localStorage.setItem("cart", JSON.stringify(cart));

  $("#cartProductTotalPrice").html(total);

  loadCart();
}

/**
 * Carrega os dados do carrinho para os respetivos campos
 */
function loadCart() {
  // recebe os dados guardados no localStorage
  var cart = JSON.parse(localStorage.getItem("cart"));

  var total = 0;

  // conta o número de produtos no carrinho
  var cartCount = cart.length;

  document.getElementById("cartContent").innerHTML = "";
  $("#cartProductTotalPrice").html("0,00");

  // coloca o número de produtos na navbar e no texto da interface do carrinho
  $("#navCartCount").html(cartCount);
  $("#cartProductCount").html(cartCount);

  // verifica se o carrinho tem dados
  // se tiver carrega os dados para o carrinho
  // se não carrega os dados default para o carrinho
  if (cartCount == 0) {
    // coloca os dados default no carrinho
    $("#cartProductTotalPrice").html("0,00");
    document.getElementById("cartContent").innerHTML += `
    <div class="cart-item">
      Não tem nenhum item no seu carrinho de compras.
    </div>`;
  } else {
    // var de contagem do preço
    var total = 0;

    var cartItemsHolder = document.getElementById("cartContent");

    let currencyValue = localStorage.getItem("currency");

    cartItemsHolder.innerHTML = "";

    // itera em todos os produtos no array
    for (var i = 0; i < cartCount; i++) {
      // recebe o produto
      var product = JSON.parse(cart[i]);

      // var de montagem do produto
      var output = "";

      output +=
        `
      <div class="cart-item">
          <img src="../Resources/usb_drive.jpg" alt="">
          <div class="item-info">
              <h5>` +
        product.description +
        `</h5>
              <div class="item-bottom">
                  <h6>` +
        parseFloat(product.unitPrice * currency[currencyValue]).toFixed(2) +
        `${currency_symbol[currencyValue]}</h6>
                  <div onclick="removeFromCart(this)" class="d-flex align-items-center" id="testT">
                      <i id="cartClose" class="fas fa-times"></i><span style="margin-left: 5px;">Remover</span>
                  </div>
              </div>
          </div>
      </div>`;

      // adiciona o valor do produto à var
      total += parseFloat(product.unitPrice);

      // adiciona o item do produto na lista
      document.getElementById("cartContent").innerHTML += output;
    }
  }

  let currencyValue = localStorage.getItem("currency");

  if (cartCount == 1) {
    // coloca o valor total de todos os produtos na interface
    $("#cartProductTotalPrice").html(
      parseFloat(
        parseFloat(
          JSON.parse(cart[0]).unitPrice * currency[currencyValue]
        ).toFixed(2)
      )
    );
    $("#currency_symbol").html(currency_symbol[currencyValue]);
  } else {
    // coloca o valor total de todos os produtos na interface
    $("#cartProductTotalPrice").html(
      parseFloat(total * currency[currencyValue]).toFixed(2)
    );
    console.log(
      "ESTE É O VALOR -> " +
        parseFloat(total * currency[currencyValue]).toFixed(2)
    );
    $("#currency_symbol").html(currency_symbol[currencyValue]);
  }
}

/**
 * Faz o checkout do carrinho
 */
function checkout() {
  var products = JSON.parse(localStorage.getItem("cart"));

  // verifica se o carrinho tem produtos para efectuar a compra
  if (products.length == 0) {
    $.alert({
      title: "Aviso!",
      content: "É necessário adicionar produtos ao carrinho para continuar!",
      icon: "fas fa-exclamation-triangle",
      type: "orange",
    });
  } else {
    var toDeliver = false;

    var theme = getTheme();

    $.confirm({
      animation: "zoom",
      closeAnimation: "scale",
      title: "Compra",
      content: "Tem certeza que pretende finalizar a compra?",
      theme: theme,
      type: "blue",
      icon: "fas fa-question",
      buttons: {
        confirm: {
          text: "Sim",
          action: function () {
            // envia o email ao user
            $.get({
              url: "/challange/php/api/Utils/sendMail.php",
              success: function (response) {
                let data = JSON.parse(response);

                if (data.result) {
                  $.confirm({
                    title: "Email!",
                    content:
                      "Foi enviado um email para si a confirmar a compra!",
                    buttons: {
                      OK: function () {
                      },
                    },
                  });
                }
              },
            });

            openModal();

            var newCart = [];
            localStorage.setItem("cart", JSON.stringify(newCart));
            $("#cartContent").html("");
            loadCart();
          },
        },
        cancel: {
          text: "Não",
          action: function () {
            var newCart = [];
            localStorage.setItem("cart", JSON.stringify(newCart));
            $("#cartContent").html("");
            loadCart();
          },
        },
      },
    });
  }
}

/**
 * Carrega os dados ao inicializar a página
 */
window.onload = function () {
  loadTheme();

  let currencyValue = localStorage.getItem("currency");

  $("#select_currency").val(currencyValue);

  // define por default a currency caso esta não tenha sido definida
  if (!localStorage.getItem("currency"))
    localStorage.setItem("currency", "eur");

  loadProductsList();

  // verifica se o carrinho foi inicializado
  // se sim carrega os dados
  // se não, inicializa e carrega os dados de seguida
  if (localStorage.getItem("cart") == null) {
    localStorage.setItem("cart", JSON.stringify([]));
    loadCart();
  } else {
    loadCart();
  }
};

// fecha o carrinho ao clicar sobre a cruz
$("#cartClose").on("click", function () {
  $("#cartContainer").removeClass("animate__slideInRight");
  $("#cartContainer").addClass("animate__slideOutRight");
  document.documentElement.style.overflow = "auto";
  document.getElementById("cartContent").style.overflowY = "hidden";
  setTimeout(function () {
    $("#sideContainer").fadeOut("fast");
  }, 100);
});

// recebe o tema
function getTheme() {
  var theme = sessionStorage.getItem("theme");
  if (theme == "true") return "dark";
  else return "light";
}

// altera a currency atual do programa
$("#select_currency").on("change", () => {
  // recebe o valor selecionado
  let val = $("#select_currency").find(":selected").val();

  // define a currency
  localStorage.setItem("currency", val);

  // reset aos items e recarrega a lista de items
  product_count = 0;
  document.getElementById("products").innerHTML = "";

  // verifica se está a ser feita uma pesquisa
  // caso esteja a ser feita a pesquisa
  if (!document.getElementById("searchBar").value == "") {
    searchProduct();
  } else {
    loadProductsList();
  }

  loadCart();
});

/**
 * Abre a modal
 */
function openModal() {
  // recebe os dados guardados no localStorage
  var cart = JSON.parse(localStorage.getItem("cart"));

  let currencyValue = localStorage.getItem("currency");

  // var a deolver com dados
  var output = "";

  total = 0;

  // carrega os dados para a interface
  for (var i = 0; i < cart.length; i++) {
    let product = JSON.parse(cart[i]);

    output +=
      `<tr>
          <td>` +
      product.description +
      `</td>
          <td>` +
      parseFloat(product.unitPrice * currency[currencyValue]).toFixed(2) +
      `${currency_symbol[currencyValue]}</td>
      </tr>`;

    total += parseFloat(product.unitPrice);
  }

  document.getElementById("modalTableContent").innerHTML = output;

  // coloca o número da venda na interface
  $("#total").html(
    parseFloat(total * currency[currencyValue]).toFixed(2) +
      currency_symbol[currencyValue]
  );

  $("#modal").modal("toggle");
}
