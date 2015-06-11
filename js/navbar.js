$(document).ready(function() {
    function setSelected() {
        var items = $('ul.sf-menu li a');
        var loc = window.location.href;
        for (i in items) {
            if (items[i].href === loc) {
                var parent = $(items[i].parentElement);
                parent.addClass('selected');
            }
        }
    }

    setSelected();
});
