const d = new Date();

var ano = d.getFullYear();

var mes_to_convert_min = d.getMonth()+1;

if(mes_to_convert_min <=9){

    mesAtual = "0" + mes_to_convert_min;

}else{

    mesAtual = mes_to_convert_min;

}

var mes_to_convert_max = d.getMonth()+3;

if(mes_to_convert_max <=9){

    mesPosterior = "0" + mes_to_convert_max;

}else{

    mesPosterior = mes_to_convert_max;

}

var datestringmin = ano + "-" + mesAtual + "-" + d.getDate();

var datestringmax = ano + "-" + mesPosterior + "-" + d.getDate();

console.log(datestringmax);


document.getElementById("campoData").min = datestringmin;

document.getElementById("campoData").max = datestringmax;