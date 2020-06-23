function validateFormL() {
    var x = document.forms["loginform"]["pass"].value;
	var Regex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
    if (!Regex.test(x)) {
        alert("Password must be filled out");
        return false;
    }
}

function validateFormR() {
    /*var x = document.forms["registrationform"]["pass"].value;
	var RegexPass = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
    if (!RegexPass.test(x)) {
        alert("Password must be filled out");
        return false;*/
    //}

    var y = document.forms["registrationform"]["pincode"].value;
    var RegexPin = new RegExp("/(^[^0])([0-9]{6}*$)/");
    if (!RegexPin.test(y)) {
     	alert("Pincode entered is wrong");
        return false;
    }

      var z = document.forms["registrationform"]["contact"].value;
      var RegexCon = new RegExp("/[1-9].[0-9]{9}/");
      if (!RegexCon.test(z)) {
        alert("enter correct contact number");
        return false;
    }
}