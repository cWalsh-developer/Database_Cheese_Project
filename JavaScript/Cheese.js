function buttonClick() 
{
  window.location.href = "../Controller/products_controller.php";
}

function customerRadioChecked()
{
    document.getElementById("Title").innerHTML = "Welcome";
    document.getElementById("Start").style.display = "inline-block";
    document.getElementById("loginForm").style.display = "none";
}
function adminRadioChecked()
{

  document.getElementById("Title").innerHTML = "Admin Login";
  document.getElementById("admin").checked = "true";
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

document.getElementById("customer").onclick = customerRadioChecked;
document.getElementById("admin").onclick = adminRadioChecked;
