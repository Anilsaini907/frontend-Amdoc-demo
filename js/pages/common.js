
var apiUrl = "http://localhost/demo/rest_api";

function dynamictitle(){
  var fileName = location.href.split("/").slice(-1);
  var nfileName=String(fileName).split(".")[0];
  document.getElementById("title").innerHTML="Admin "+nfileName;
  // console.log("File: " +nfileName );
}
dynamictitle();