var sgt_slider, ps3_slider, eff_slider;
var total;
var donor_name = "";

function sgt_slider_changed(nv) {
    updateSliders('sgt', nv);
}
function ps3_slider_changed(nv) {
    updateSliders('ps3', nv);
}
function eff_slider_changed(nv) {
    updateSliders('eff', nv);
}

function init_sliders() {
    /* Use a scale of 200 for the sliders so we don't have a 0.5 step when calculating other values */
    window.dhx_globalImgPath = "Images/dhtmlxslider/";

    sgt_slider = new dhtmlxSlider("sgt_amount", 200, "arrowgreen", false, 0, 100, get_sgt_value(), 1);
    sgt_slider.setSkin("arrowgreen");
    sgt_slider.attachEvent("onChange", sgt_slider_changed);
    sgt_slider.attachEvent("onSlideEnd", sgt_slider_changed);
    sgt_slider.init();

    ps3_slider = new dhtmlxSlider("ps3_amount", 200, "arrowgreen", false, 0, 100, get_ps3_value(), 1);
    ps3_slider.setSkin("arrowgreen");
    ps3_slider.attachEvent("onChange", ps3_slider_changed);
    ps3_slider.attachEvent("onSlideEnd", ps3_slider_changed);
    ps3_slider.init();

    eff_slider = new dhtmlxSlider("eff_amount", 200, "arrowgreen", false, 0, 100, get_eff_value(), 1);
    eff_slider.setSkin("arrowgreen");
    eff_slider.attachEvent("onChange", eff_slider_changed);
    eff_slider.attachEvent("onSlideEnd", eff_slider_changed);
    eff_slider.init();

    updateTotal(document.getElementById("donateamount").value);
    updateSliders('sgt', sgt_slider.value);
    updateCommentCounter();
};

function updateTotal(val) {
    if (val == '')
        total = 0;
    else
        total = val;
    sgt = sgt_slider.value;
    ps3 = ps3_slider.value;
    eff = eff_slider.value;

    document.getElementById("paypalamount").value = val;
    
    document.getElementById("sgt").value = total * sgt / 100;
    document.getElementById("ps3").value = total * ps3 / 100;
    document.getElementById("eff").value = total * eff / 100;

    if (eff == 0 &&
        document.getElementById("eff_img").src.indexOf("Images/sony.png") == -1)
        document.getElementById("eff_img").src = "Images/sony.png";
    else if (eff > 0 &&
             document.getElementById("eff_img").src.indexOf("Images/eff.png") == -1)
        document.getElementById("eff_img").src = "Images/eff.png";   

    if (donor_name == "")
        donor_name = document.getElementById("donor").value;

    updateDonorName(donor_name);
                         
}

function updateDonorName(val) {
    sgt = sgt_slider.value;
    ps3 = ps3_slider.value;
    eff = eff_slider.value;
    donor_name = val;

    document.getElementById("paypalcustom").value = sgt + ":" + ps3 + ":" + eff + ":" + donor_name;
    document.getElementById("paypalcancel").value = "http://humblehomebrew.com/index.php?amount=" + total + "&sgt=" + sgt + "&ps3=" + ps3 + "&eff=" + eff + "&donor=" + encodeURIComponent(donor_name) + "#donate";               
}


function updateSliders(type, val) {
    var sgt, eff, ps3;

    sgt = sgt_slider.value;
    ps3 = ps3_slider.value;
    eff = eff_slider.value;

    if(type == 'sgt') {
        if (Math.abs(sgt - val) % 2 == 1) {
            if (sgt - val > 0)
                sgt = val + 1;
            else
                sgt = val - 1;
        } else {
            sgt = val;
        }
        if (val >= 100)
            sgt = 100;

        val = 100 - ps3 - sgt - eff;
        ps3 = ps3 + (val / 2);
        if (ps3 < 0)
            ps3 = 0;
        eff = 100 - sgt - ps3;
        if (eff < 0) {
            ps3 = ps3 + eff;
            eff = 0;
        }
    } else if (type == 'ps3') {
      if (Math.abs(ps3 - val) % 2 == 1) {
            if (ps3 - val > 0)
                ps3 = val + 1;
            else
                ps3 = val - 1;
        } else {
            ps3 = val;
        }
        if (val >= 100)
            ps3 = 100;

        val = 100 - sgt - ps3 - eff;
        sgt = sgt + (val / 2);
        if (sgt < 0)
            sgt = 0;
        eff = 100 - sgt - ps3;
        if (eff < 0) {
            sgt = sgt + eff;
            eff = 0;
        }
    } else if (type == 'eff') {
         if (Math.abs(eff - val) % 2 == 1) {
            if (eff - val > 0)
                eff = val + 1;
            else
                eff = val - 1;
        } else {
            eff = val;
        }
        if (val >= 100)
            eff = 100;

        val = 100 - sgt - ps3 - eff;
        ps3 = ps3 + (val / 2);
        if (ps3 < 0)
            ps3 = 0;
        sgt = 100 - eff - ps3;
        if (sgt < 0) {
            ps3 = ps3 + sgt;
            sgt = 0;
        }
    }

    sgt_slider.setValue(sgt);
    ps3_slider.setValue(ps3);
    eff_slider.setValue(eff);

    updateTotal(total);
};

function updateCommentCounter() {
    document.getElementById("comment_counter").value = 5000 - document.getElementById("comment").value.length;
}


/*
  Algorithm for email and numeric validations taken from the "JavaScript Form Validator v4.0"
  Copyright (C) 2003-2011 JavaScript-Coder.com. All rights reserved.
  http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
*/
function isEmail(email) {
    if (email.length <= 0)
        return false;

    var splitted = email.match("^(.+)@(.+)$");

    if (splitted == null) 
        return false;

    if (splitted[1] != null) {
        var regexp_user = /^\"?[\w-_\.]*\"?$/;
        if (splitted[1].match(regexp_user) == null)
            return false;
    }

    if (splitted[2] != null) {
        var regexp_domain = /^[\w-\.]*\.[A-Za-z]{2,4}$/;
        if (splitted[2].match(regexp_domain) == null) {
            var regexp_ip = /^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
            if (splitted[2].match(regexp_ip) == null)
                return false;
        }
        return true;
    }
    return false;
}

function isNumeric(text) {
    if (text.length > 0 && !text.match(/^[\-\+]?[\d]*\.?[\d]*$/))
        return false;
    return true;
}

function donateError(text) {
    document.getElementById("donate_error").innerHTML = " | " + text + " | ";
    document.location = "#donate";    
}

function submitPaypal() {
    document.getElementById("donate_error").innerHTML = "";
    updateTotal(document.getElementById("donateamount").value);

    if (document.getElementById("donateamount").value.length == 0)
        donateError("Please enter an amount");
    else if (!isNumeric(total))
        donateError("Amount must be a number");
    else if (total <= 0)
        donateError("Amount must be greater than zero");
    else {
        var amount = new Number(total);
        if (amount != "NaN") {
            document.getElementById("paypalamount").value = amount.toFixed(2);
            document.paypalform.submit();
        } else {
            donateError("Amount must be a number");
        }
    }

}

function petitionError(text) {
    document.getElementById("petition_error").innerHTML = " | " + text + " | ";
    document.location = "#petition";    
}

function signPetition() {
    var error = false;

    document.petition.fname.value = document.getElementById("fname").value;
    document.petition.lname.value = document.getElementById("lname").value;
    document.petition.email.value = document.getElementById("email").value;
    document.petition.comment.value = document.getElementById("comment").value;
    document.petition.paygame.value = document.getElementById("paygame").value;
    document.petition.payrights.value = document.getElementById("payrights").value;
    if (document.getElementById("anonymous").checked)
        document.petition.anonymous.value = 1;
    else
        document.petition.anonymous.value = 0;

    document.getElementById("paygame_error").innerHTML = "";
    document.getElementById("payrights_error").innerHTML = "";
    document.getElementById("comment_error").innerHTML = "";
    document.getElementById("email_error").innerHTML = "";
    document.getElementById("petition_error").innerHTML = "";

    if (document.petition.paygame.value.length == 0) {
        document.getElementById("paygame_error").innerHTML = "Please enter a value";
        error = true;
    } else if (!isNumeric(document.petition.paygame.value)) {
        document.getElementById("paygame_error").innerHTML = "Value must be a number";
        error = true;
    } else if (document.petition.paygame.value < 0) {
        document.getElementById("paygame_error").innerHTML = "Value must be greater than zero";
        error = true;
    }

    if (document.petition.payrights.value.length == 0) {
        document.getElementById("payrights_error").innerHTML = "Please enter a value";
        error = true;
    } else if (!isNumeric(document.petition.payrights.value)) {
        document.getElementById("payrights_error").innerHTML = "Value must be a number";
        error = true;
    } else if (document.petition.payrights.value < 0) {
        document.getElementById("payrights_error").innerHTML = "Value must be greater than zero";
        error = true;
    }

    if (document.petition.comment.value.length < 50) {
        document.getElementById("comment_error").innerHTML = "Your message is too small, please write a proper message to Sony";
        error = true;
    } else if (document.petition.comment.value.length > 5000) {
        document.getElementById("comment_error").innerHTML = "Message too long (" + document.petition.comment.value.length + " characters), it must be less than 5000 characters";
        error = true;
    }

    if (!isEmail(document.petition.email.value)) {
        document.getElementById("email_error").innerHTML = "Please enter a valid email address";
        error = true;
    }

    if (error) {
        petitionError("You must fill out the petition form correctly");
    } else {
        document.petition.submit();
    }
}
