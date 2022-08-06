var elm = document.getElementById("scrol_nav_id");
elm.onclick = function() {

}

function showDi() {
    alert('Welcome');
}

$(function() {
    $('#tog_button').click(function() {
        alert("Welcome")
        $('#navbar').toggle();
    });
})


$('.dropdown-toggle').click(function(e) {
    if ($(document).width() > 468) {
        e.preventDefault();

        var url = $(this).attr('href');


        if (url !== '#') {

            window.location.href = url;
        }

    }
});

var Pashto_months = [
    "جنوری",
    "فروری",
    "مارچ",
    "اپریل",
    "مئی",
    "جون",
    "جولائی",
    "اگست",
    "ستمبر",
    "اکتوبر",
    "نومبر",
    "دسمبر"
];

var Pashto_Days = [
    "اتوار",
    "دوشنبه",
    "سه شنبه",
    "چارشنبه",
    "پنجشنبه",
    "جمعه",
    "شنبي"
];

var date = new Date();
var full_date = date.getFullYear() + "-" +
    Pashto_Days[date.getDay()] + "  _ " +
    Pashto_months[date.getMonth()] + "-" +
    String(date.getDate()).padStart(2, '0');
document.getElementById("curr_date_time").innerText = full_date;