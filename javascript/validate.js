function validateForm() {
    var str = document.forms["Form"]["link"].value;
var protocol = str.split(":");
    if ( protocol[0] != "http" ) {
        alert( "Url must contain a protocol " + protocol[0] );
        return false;
    }
}
