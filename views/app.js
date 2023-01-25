var originalForm = document.getElementById("forms");
var duplicateButton = document.getElementById("duplicate-form");
var formCounter = 0;


duplicateButton.addEventListener("click", function() {
        var newForm = originalForm.cloneNode(true);
        document.getElementById("section").appendChild(newForm);
        formCounter++;

});

function remove(){
  if( formCounter>=1){
    let node = document.getElementById("forms");
if (node.parentNode) {
  node.parentNode.removeChild(node);
  formCounter--;
}

}

}

