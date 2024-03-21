document.getElementById('btn_iniciar_registro').addEventListener('click',register);
document.getElementById('btn_iniciar_sesion').addEventListener('click',login);
document.getElementById('recuperar').addEventListener('click',recuperar);


//Funciones para Login y Register
var contenedor_login_register = document.querySelector('.contenedor_login_register');
var formulario_login = document.querySelector('.formulario_login');
var formulario_login = document.querySelector('.formulario_login');
var formulario_recuperar = document.querySelector('.formulario_recuperar');
var formulario_register = document.querySelector('.formulario_register');
var caja_trasera_login = document.querySelector('.caja_trasera_login');
var caja_trasera_register = document.querySelector('.caja_trasera_register');

function register(){
    formulario_register.style.display = "block";
    contenedor_login_register.style.left= "410px";
    formulario_recuperar.style.display = "none";
    formulario_login.style.display = "none";
    caja_trasera_register.style.opacity = "0";
    caja_trasera_login.style.opacity = "1";
}

function login(){
    formulario_login.style.display = "block";
    contenedor_login_register.style.left= "0px";
    formulario_recuperar.style.display = "none";
    formulario_register.style.display = "none";
    caja_trasera_login.style.opacity = "0";
    caja_trasera_register.style.opacity = "1";
}

function recuperar(){ 
    formulario_login.style.display = "none";
    formulario_recuperar.style.display = "block";
}