function setActiveTab() {

    var url = document.URL.split("/");
    var navLinks = document.getElementsByTagName("nav")[0].getElementsByTagName("a");

    var i = 0;
    // zoberie poslednu splitnutu cast url napr. index.php
    var currentPage = url[url.length - 1];
    for (i; i < navLinks.length; i++) {
        var lb = navLinks[i].href.split("/");
        if (lb[lb.length - 1] == currentPage) {
            navLinks[i].className += " active";
        }
    }
}


setActiveTab();