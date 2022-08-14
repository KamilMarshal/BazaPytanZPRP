function validation(){
    var id=document.f1.user.value;
    var ps=document.f1.pass.value;
    if(id.length=="" && ps.length=="") {
        alert("Pole login i hasło jest puste");
        return false;
    } else {
        if(id.length=="") {
            alert("Pole loginu jest puste!");
            return false;
        }
        if (ps.length=="") {
            alert("Pole hasła jest puste!");
        return false;
        }}}

function fileChange(url){
    const myTimeout = setTimeout(openURL(url), 2000);
}

function openURL(url){
    window.location = url;
    window.location.href = url;
}