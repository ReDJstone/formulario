var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};

function checkWhenLogged() {
    var user = getUrlParameter('u');
    if (user) {
        document.getElementById("post_login").innerHTML = `Welcome, ${user}. Here are all users data.`;
        document.getElementById("post_login").classList.remove("hidden");
    }
}

function checkForLogin() {
    if (getUrlParameter('reg')) {
        document.getElementById("login_status").innerHTML = "Registro correcto. Usa tu usuario y contraseña para entrar.";
        document.getElementById("login_status").classList.add("success");
        document.getElementById("login_status").classList.remove("hidden");
    }

    if (getUrlParameter('err')) {
        document.getElementById("login_status").innerHTML = "Usuario o contraseña incorrectos.";
        document.getElementById("login_status").classList.add("error");
        document.getElementById("login_status").classList.remove("hidden");   
    }
}

function checkForRegError() {
    var reg_st = document.getElementById("reg_status");

    if (getUrlParameter('email')) {
        reg_st.innerHTML += "Este e-mail ya existe!";
        reg_st.classList.remove("hidden");
    }

    if (getUrlParameter('user')) {
        if (getUrlParameter('email') == 1){
            reg_st.innerHTML += "<br>";
        }
        reg_st.innerHTML += "Este user ya existe!";
        reg_st.classList.remove("hidden");
    }

    if (getUrlParameter('tlf')) {
        if (getUrlParameter('user') == 1){
            reg_st.innerHTML += "<br>";
        }
        reg_st.innerHTML += "Este teléfono ya existe!";
        reg_st.classList.remove("hidden");
    }    

    if (getUrlParameter('empty')) {
        reg_st.innerHTML = "Por favor, rellena todos los campos.";
        reg_st.classList.remove("hidden");
    }

    if (getUrlParameter('err')) {
        reg_st.innerHTML = "Algo ha ido mal. Contacta con el desarrollador.";
        reg_st.classList.remove("hidden");
    }

    if (getUrlParameter('caperr')) {
        reg_st.innerHTML = "CAPTCHA incorrecto. Inténtelo de nuevo.";
        reg_st.classList.remove("hidden");
    }
}

function reloadCaptcha() {
    document.getElementById("captcha_img").src = "php/imgGen.php?rand=" + Math.random()
}