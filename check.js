
function validateForm()
{
    var x = document.forms["searchform"]["moviename"].value;
  if (x == "") {
    alert( "All fields are mandatory" );
    return false ;
  }
  return true ;
}
