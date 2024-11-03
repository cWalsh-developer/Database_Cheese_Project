$(document).ready(initialise);

function initialise()
{
    //$("#submit").on("click", insertData);
}

function insertData()
{
    var firstName = $("#firstName").val().trim();
    var lastName = $("#lastName").val().trim();
    var email = $("#checkoutEmail").val().trim();
    var addressOne = $("#addressLineOne").val().trim();
    var addressTwo = $("#addressLineTwo").val().trim();
    var townCity = $("#townAndCity").val().trim();
    var postcode = $("#checkoutPostcode").val().trim();

    if(postcode !="")
    {
        window.location.href ="../Controller/confirmationController.php?lastName="+lastName+"&firstName="+firstName+"&email="+email+"&addressOne="+addressOne+"&addressTwo="+addressTwo+"&postcode="+postcode+"&townCity="+townCity;
    }
}