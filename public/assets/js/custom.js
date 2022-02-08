//Disable inspect element
/*$(document).bind("contextmenu",function(e) {
 e.preventDefault();
});
$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});*/


// scrollTop animation scroll
const st = document.getElementById('st');

window.addEventListener('scroll', () => {
    if (window.scrollY >400) { // la condition s'applique après avoir scrollé les 400 premiers pixels de la page
        st.style.animation = 'fadeInOpacity 1s';
        st.style.display = 'block';
        st.style.opacity = '0.7'; // le display et l'opacity finissent par disparaitre ??
    }else{
        st.style.animation = 'fadeOutOpacity 1s';
        setTimeout(function(){ 
            st.style.display = 'none';
            st.style.opacity = '0'; 
        }, 600);
    }
});


// popbox
if (document.location.href!='http://unpeudefrancaissansip/vue/connexion_page.php') {
    // opacity 1 connexion_form
    let inputMail = document.getElementById("inputMail");
    if (inputMail) {
        inputMail.addEventListener("click",function(){
            let popbox = document.getElementById("popbox");
            popbox.setAttribute("style", "opacity: 1 !important");
            popbox.style.visibility="visible";
        });
    }
    let inputPwd = document.getElementById("inputPwd");
    if (inputPwd) {
        inputPwd.addEventListener("click",function(){
            let popbox = document.getElementById("popbox");
            popbox.setAttribute("style", "opacity: 1 !important");
            popbox.style.visibility="visible";
        });
    }  
    // opacity 0 connexion_form
    document.addEventListener("click",function(event){
        let popbox = document.getElementById("popbox");
        if (popbox) {
            if (!event.target.matches('.saisieConnexion')) {
                popbox.removeAttribute("style", "opacity: 1 !important");
            }
        }
    });
}


// Connexion_form hide password
let hidePwd=1;
function hidePassword() {
    if (hidePwd==1) {
        document.getElementById("inputPwd").type="text";
        document.getElementById("eyePwd").className="far fa-eye-slash";
        hidePwd++;
    }else{
        document.getElementById("inputPwd").type="password";
        document.getElementById("eyePwd").className="far fa-eye";
        hidePwd=1;
    }  
}



// Script filter category shop Jquery
$(document).ready(function(){
    $(".shopFilter").on('click', function(){ 
        let value=$(this).val();
        if(value == "all") {
            // $(".grid-loaded").removeClass('heightGrid');
            $('.filter').show('1000');

            // Nb of results
            let result = ("Showing "+document.querySelectorAll(".filter").length+" results");
            document.getElementById('resultsNumber').innerHTML=result;
        }else{
            $(".grid-loaded").addClass('heightGrid'); // ajoute la class mettant une height de 100% pour réduire la hauteur de fenêtre
            $(".filter").not('.'+value).hide('1000'); 
            $('.filter').filter('.'+value).show('1000');

            // Nb of results
            let result = (document.getElementsByClassName("grid-layout").innerHTML = "Showing "+parseInt((document.querySelectorAll(".filter").length)-($(".filter").not('.'+value).hide('1000').length))+" results");
            document.getElementById('resultsNumber').innerHTML=result;
        }   
    });
});


// Script fiter category footer Jquery
let filterOnUrl=document.location.search.substr(10); // donne la catégorie stockée dans l'URL
if (filterOnUrl) {
    $(".grid-layout").addClass('heightGrid'); // ajoute la class mettant une height de 100% pour réduire la hauteur de fenêtre
    $(".filter").not('.'+filterOnUrl).hide('1000'); 
    $('.filter').filter('.'+filterOnUrl).show('1000');

    // Nb of results
    let result = (document.getElementsByClassName("grid-layout").innerHTML = "Showing "+parseInt((document.querySelectorAll(".filter").length)-($(".filter").not('.'+filterOnUrl).hide('1000').length))+" results");
    document.getElementById('resultsNumber').innerHTML=result;
}


// Copy content in textarea for newsletter
function copyContacts() {
    let copyText = document.getElementById("copyContacts");
   copyText.select();
   document.execCommand("Copy");
   alert("Le code est copié dans le presse papier");  
}


// Paypal checkout div center
// document.getElementById("buttons-container").addClass('position-absolute top-50 start-50 translate-middle');
