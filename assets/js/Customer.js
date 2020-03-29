$(function () {
    $(".sidenav").sidenav();
    $(".tabs").tabs();
    $(".modal").modal();
    $(".datepicker").datepicker();
    $(".timepicker").timepicker();
    $("select").formSelect();
    $(".fixed-action-btn").floatingActionButton();
    $(".tooltipped").tooltip();
});

var wpp = document.getElementById("wpp");
var price = document.getElementById("price_tag");
var cpp = 15;
var totalPrice = 0;
var btnContinue = $("#continue");//document.getElementById("continue")


btnContinue.click(function () {
    var date = document.getElementById("date").value;
    var time = document.getElementById("time").value;
    var pages = document.getElementById("pages").value;
    var subject = document.getElementById("subject").value;
    var topic = document.getElementById("topic").value;
    var instructions = document.getElementById("instructions").value;
    var base_url = "http://localhost/curtsy_writing/customer/order/confirm";

    var formData = new FormData();
    formData.append("date", date);
    formData.append("time", time);
    formData.append("pages", pages);
    formData.append("topic", topic);
    formData.append("instructions", instructions);

    $.ajax({
        url: base_url,
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        method: "POST",

        success: function (response) {
            // you will get response from your php page (what you echo or print)
            //msg_holder.html(`${response}`);
            window.location.assign(response);
            console.log(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText);
            // msg_holder.html(
            //     `<p class="red white-text p-2"><small>${
            //     jqXHR.responseText
            //     }</small></p>`
            // );
        }
    });

});

function up(max) {
    document.getElementById("pages").value = parseInt(document.getElementById("pages").value) + 1;
    if (document.getElementById("pages").value >= parseInt(max)) {
        document.getElementById("pages").value = max;
        updateWpp();
        wpp.innerHTML = "Maximum is 50 Pages : " + 50 * 275 + " Words (Double Spaced)";
    } else {
        updateWpp();
    }
}

function updateWpp() {
    wpp.innerHTML = parseInt(document.getElementById("pages").value) * 275 + " Words (Double Spaced)";
    totalPrice = parseInt(document.getElementById("pages").value) * cpp;
    price.innerHTML = "$" + totalPrice + ".<small>00</small>";
} updateWpp();

function down(min) {
    document.getElementById("pages").value = parseInt(document.getElementById("pages").value) - 1;
    if (document.getElementById("pages").value <= parseInt(min)) {
        document.getElementById("pages").value = min;
        updateWpp();
        wpp.innerHTML = "Minimum is 1 Page : " + 275 + " Words (Double Spaced)";
    } else {
        updateWpp();
    }


}
