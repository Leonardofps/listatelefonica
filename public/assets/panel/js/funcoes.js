function mascaracelular(i) {
    var v = i.value;
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    i.value = v.substring(0, v.length + 1);
    i.setAttribute("maxlength", "15");
}

function mascarafixo(i) {
    var v = i.value;
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    i.value = v.substring(0, v.length + 1);
    i.setAttribute("maxlength", "14");
}

function mascaracnpj(i) {
    var v = i.value;
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, "$1.$2.$3/$4-$5");//Coloca parênteses em volta dos dois primeiros dígitos
//    v = v.replace(/(\d{3})(\d)/g, "$1.$2"); 
  //  v = v.replace(/(\d)(\d{4})$/, "$1/$2"); //Coloca hífen entre o quarto e o quinto dígitos
    i.value = v.substring(0, v.length + 1);
    i.setAttribute("maxlength", "18");
}