function abrirTexto() {
    let alanTuring = document.getElementById("Alan-Turing");
    let adaLovelace = document.getElementById("Ada-Lovelace");
    // inserir a terceira pessoa
    let btn1 = document.getElementById("btn1");
    let btn2 = document.getElementById("btn2");
    let btn3 = document.getElementById("btn3");


    btn1.addEventListener('click', () => {
        alanTuring.classList.toggle("d-none");
    });

    btn2.addEventListener('click', () => {
        adaLovelace.classList.toggle("d-none");
    });
    // inserir o btn3
}
function limparform(){
    document.getElementById('LimparBtn').addEventListener('click', () => {

        document.getElementById("text_name").focus();
        document.getElementById("text_birthdate").focus();
        document.getElementById("text_email").focus();
        document.getElementById("text_senha").focus();
        document.getElementById("text_phone").focus();

    });
}

abrirTexto();


