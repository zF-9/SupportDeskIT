
$("input[name='radio_btn']").click(function() {
    var status = $(this).val();
    console.log(status);
    if (status == 2) {
        //$(".login").show();
        //$(".register").hide();
        document.getElementById('login').style.display = 'hidden';
        document.getElementById('register').style.display = 'visible';
    } else {
        //$(".login").hide();
        //$(".register").show();
        document.getElementById('login').style.display = 'visible';
        document.getElementById('register').style.display = 'hidden';
    }
});