function hideBtn(){
    if(!document.getElementById) return;

    var sub_btn = document.getElementById("sub_btn");
    var sub_btn2 = document.getElementById("sub_btn2");
    var sub_btn3 = document.getElementById("sub_btn3");
    
    var card1 = document.getElementById("card1");
    var card2 = document.getElementById("card2");
    var card3 = document.getElementById("card3");
    
    var check_btn = document.form.checkbox.checked;

    // sub_btn.style.visibility=(check_btn) ? "visible" : "hidden";
    // sub_btn2.style.visibility=(check_btn) ? "visible" : "hidden";
    // sub_btn3.style.visibility=(check_btn) ? "visible" : "hidden";

    sub_btn.disabled = (check_btn) ? false : true;
    sub_btn2.disabled = (check_btn) ? false : true;
    sub_btn3.disabled = (check_btn) ? false : true;
    
    card1.style.backgroundColor=(check_btn) ? "rgba(0,0,0,0.3)" : "rgba(0,0,0,0.2)";
    card2.style.backgroundColor=(check_btn) ? "rgba(0,0,0,0.3)" : "rgba(0,0,0,0.2)";
    card3.style.backgroundColor=(check_btn) ? "rgba(0,0,0,0.3)" : "rgba(0,0,0,0.2)";
}