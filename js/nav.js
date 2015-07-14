function getPageName() {
    var page = window.location.pathname.split('/');
    page = page[page.length - 1];
    page = page.split('.')[0];

    document.getElementById('pageName2').className += 'hidden-lg';
    page = page.charAt(0).toUpperCase() + page.substring(1,page.length);

    return page;
}
function getPageName2() {
    var page = window.location.pathname.split('/');
    page = page[page.length - 1];
    page = page.split('.')[0];
    if (page === "home") {
        document.getElementById('pageName').className += 'hidden-lg';
        page = "Lancaster " + page.charAt(0).toUpperCase() + page.substring(1,page.length) + " Builders";
    }
    return page;
}

var pageName = getPageName();
var pageName2 = getPageName2();
document.getElementById('pageName').innerHTML = pageName;
document.getElementById('pageName2').innerHTML = pageName2;

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
