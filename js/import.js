function importHTML(from, to) {
    var content = document.getElementById(from).import
    var stuff = content.getElementById(from);
    document.getElementById(to).appendChild(stuff);
}

$(document).ready(function() {
    // import navbar
    importHTML('nav', 'navbar');

    // import footer
    importHTML('foot', 'footer');
});
