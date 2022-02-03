var element = document.documentElement

// abre o menu de opções quando se faz o mouse hover
$('#nav-user-container').on('click', function(){
    $('#options').slideToggle(150)
})

// altera o tema
function changeTheme() {
    if($('#themeIndicator').hasClass("far")) {
        document.getElementById('themeIndicator').classList.remove('far')
        document.getElementById('themeIndicator').classList.add('fas')
        document.getElementById('themeIndicator').classList.add('content-color-primary')
    } else {
        document.getElementById('themeIndicator').classList.add('far')
        document.getElementById('themeIndicator').classList.remove('fas')
        document.getElementById('themeIndicator').classList.remove('content-color-primary')
    }

    switch(sessionStorage.getItem("theme")) {
        case null:
            console.log("ENTREI NO NULL")

            sessionStorage.setItem("theme", "true")
            element.classList.toggle('root-dark')
            console.log("tema definido para " + sessionStorage.getItem("theme"))
            break;

        case "true":
            console.log("ENTREI NO TRUE - COLOCANDO PARA LIGHT")

            sessionStorage.setItem("theme", "false")
            element.classList.remove('root-dark')
            element.classList.toggle('root-light')
            console.log("tema definido para " + sessionStorage.getItem("theme"))

            document.getElementById('themeIndicator').classList.add('far')
            document.getElementById('themeIndicator').classList.remove('fas')
            document.getElementById('themeIndicator').classList.remove('content-color-primary')

            break;

        case "false":
            console.log("ENTREI NO FALSE - COLOCANDO PARA DARK")

            sessionStorage.setItem("theme", "true")
            element.classList.remove('root-light')
            element.classList.toggle('root-dark')

            document.getElementById('themeIndicator').classList.remove('far')
            document.getElementById('themeIndicator').classList.add('fas')
            document.getElementById('themeIndicator').classList.add('content-color-primary')

            console.log("tema definido para " + sessionStorage.getItem("theme"))
            break;

        default:
            
            console.log("Problemas no switch nha mano!")

            break;
    }
}

function logOut() {
    $.ajax({
    	url: "/challange/php/api/Utils/logout.php",
    	success: function(data){ 
            console.log(data)
            if(data == 1) {
               window.location.replace('/challange/index.php')
            } else {
                alert("Não funfaa")
            }
    	},
        async: false
    });
}

$('#navCart').on('click', function(){
    $('#cartContainer').addClass('animate__slideInRight')
    $('#cartContainer').removeClass('animate__slideOutRight')
    document.documentElement.style.overflow = "hidden"
    document.getElementById('cartContent').style.overflowY = "auto"
    $('#sideContainer').show();
})