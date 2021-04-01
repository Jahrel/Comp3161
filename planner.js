window.onload = function() {

    var upbutton = document.getElementById("signup");
    var inbutton  = document.getElementById("signin");
    var container = document.getElementById("container");

    upbutton.addEventListener("click", function () {
	    container.classList.add("right-panel-active");
    });

    inbutton.addEventListener("click", function () {
	    container.classList.remove("right-panel-active");
        document.getElementById("result").innerHTML = "Successfully Sign In";
    });

}