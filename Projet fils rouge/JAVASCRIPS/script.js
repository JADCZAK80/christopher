

function Verification() {
    var nom = document.getElementById('nom').value;
    var regexnom = /^[A-Za-z]+$/
    if(nom===''){
        document.getElementById('nom').style.backgroundColor="red";
        document.getElementById('nom').style.color="#FFF";
        document.getElementById('nom_manquant').innerHTML="nom manquant";
        document.getElementById('nom_manquant').style.color="red";

        return false;
} else if (!regexnom.test(nom)) {
    document.getElementById('nom').style.backgroundColor="orange";
    document.getElementById('nom').style.color="#FFF";
    document.getElementById('nom_manquant').innerHTML="nom incorrect";
    document.getElementById('nom_manquant').style.color="orange";
    return false;
}
else{
    document.getElementById('nom').style.backgroundColor="white";
    document.getElementById('nom').style.color="black";
    document.getElementById('nom_manquant').innerHTML="";
}

var mail = document.getElementById('mail').value;
var regexmail = /^[A-Za-z]+[@]+[A-Za-z]+[.]+[A-Za-z]+$/
if(mail==''){
    document.getElementById('mail').style.backgroundColor="red";
    document.getElementById('mail').style.color="#FFF";
    document.getElementById('mail_manquant').innerHTML="Email manquant";
    document.getElementById('mail_manquant').style.color="red";

    return false;
}else if (!regexmail.test(mail)) {
    document.getElementById('mail').style.backgroundColor="orange";
    document.getElementById('mail').style.color="#FFF";
    document.getElementById('mail_manquant').innerHTML="mail incorrect";
    document.getElementById('mail_manquant').style.color="orange";
    return false;
}else{
    document.getElementById('mail').style.backgroundColor="white";
    document.getElementById('mail').style.color="black";
    document.getElementById('mail_manquant').innerHTML="";

}

var Téléphone = document.getElementById('Téléphone').value;
var regextel = /^[0-9]{10}$/
if(Téléphone==''){
    document.getElementById('Téléphone').style.backgroundColor="red";
    document.getElementById('Téléphone').style.color="#FFF";
    document.getElementById('Téléphone_manquant').innerHTML="Téléphone manquant";
    document.getElementById('Téléphone_manquant').style.color="red";

    return false;
}else if (!regextel.test(Téléphone)) {
    document.getElementById('Téléphone').style.backgroundColor="orange";
    document.getElementById('Téléphone').style.color="#FFF";
    document.getElementById('Téléphone_manquant').innerHTML="tel incorrect";
    document.getElementById('Téléphone_manquant').style.color="orange";
    return false;
}
else{
    document.getElementById('Téléphone').style.backgroundColor="white";
    document.getElementById('Téléphone').style.color="black";
    document.getElementById('Téléphone_manquant').innerHTML="";
}

var adresse = document.getElementById('adresse').value;
if(adresse==''){
    document.getElementById('adresse').style.backgroundColor="red";
    document.getElementById('adresse').style.color="#FFF";
    document.getElementById('adresse_manquant').innerHTML="adresse manquant";
    document.getElementById('adresse_manquant').style.color="red";

    return false;
}
else{
    document.getElementById('adresse').style.backgroundColor="white";
    document.getElementById('adresse').style.color="black";
    document.getElementById('adresse_manquant').innerHTML="";
}
}