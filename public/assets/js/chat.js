
const URLROOT = "http://localhost/iqube";
$(document).ready(function () {
    $("#openchat").click(function () {
        document.getElementById("chat").style.display = "block";
        $.get( URLROOT + "/student/iqube_support", function (data) {
            $("#chat").html(data);
        });
    });
 });

 
