function verificaSeoValorEmenorOuIgualaZero(){
    valor = document.getElementById("quantia").innerText;
    if(valor <= 0){
        window.confirm("O valor não pode ser menor ou igual a zero.");
    }
}