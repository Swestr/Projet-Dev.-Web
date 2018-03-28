function init(){
    var allElements = document.querySelectorAll("[id^='chat_n']");
    for (var i = 0; i < allElements.length; i++) {
        var id=allElements[i].id;
        document.getElementById(allElements[i].id).addEventListener("keyup",keyDownTextField);
    }
}
function keyDownTextField (event) {
    if (event.keyCode==13)
        {
            var id=event.currentTarget.id;
            var number=id.match(/\d/g).join("");
            var txt=document.getElementById(id).value;
            document.getElementById(id).value="";
            window.location='Page.php?chat='+number+'&msg='+txt+"#afficherMsg_box";
            //AJOUT A LA BD
        }

}
