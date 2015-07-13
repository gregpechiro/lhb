function getPageName() {
    var page = window.location.pathname.split('/');
    page = page[page.length - 1];
    page = page.split('.')[0];
    // if (page === "home") {
    //     document.getElementById('pageName').className += 'nav-home';
    //     page = "Lancaster " + page.charAt(0).toUpperCase() + page.substring(1,page.length) + " Builders";
    // } else {
        page = page.charAt(0).toUpperCase() + page.substring(1,page.length);
    // }
    return page;
}
var pageName = getPageName();
document.getElementById('pageName').innerHTML = pageName;
document.getElementById('pageName2').innerHTML = pageName;

function setSelected() {
    var listItems = document.querySelectorAll('ul.nav > li');
    var loc = window.location.href;

    for (var i = 0; i < listItems.length; i++) {
        var aLoc = listItems[i].children[0].href;
        if (aLoc === loc) {
            listItems[i].className += 'active';
        }
    }
}
setSelected();
