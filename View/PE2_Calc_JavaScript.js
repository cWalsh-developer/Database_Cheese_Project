function buttonClick() 
{
  window.location.href = "../Controller/products_controller.php";
}

function customerRadioChecked()
{
    document.getElementById("Start").style.display = "block";
    document.getElementById("loginForm").style.display = "none";
}
function adminRadioChecked()
{
  document.getElementById("email").value = "Enter your email";
  document.getElementById("Start").style.display = "none";
  document.getElementById("loginForm").style.display = "block";
}

function emailFieldClick()
{
  if(document.getElementById("email").value == "Enter your email")
  {
    document.getElementById("email").value = "";
  }
}


