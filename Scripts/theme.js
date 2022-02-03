function loadTheme() {
    if(sessionStorage.getItem("theme") === null) {
        element.classList.toggle('root-light')
    } else {
        if(sessionStorage.getItem("theme") == "true") {
            element.classList.toggle('root-dark')
            document.getElementById('themeIndicator').classList.remove('far')
            document.getElementById('themeIndicator').classList.add('fas')
            document.getElementById('themeIndicator').classList.add('content-color-primary')
        } else {
            element.classList.toggle('root-light')
            document.getElementById('themeIndicator').classList.add('far')
            document.getElementById('themeIndicator').classList.remove('fas')
            document.getElementById('themeIndicator').classList.remove('content-color-primary')
        }
    }
}