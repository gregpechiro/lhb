$(document).ready(function() {
    function setSelected() {
        var listItems = $('ul.sf-menu > li');
        var loc = window.location.href;

        if (loc.indexOf('service') > -1) {
            $('li#services').addClass('selected');
        } else {
            for (var i = 0; i < listItems.length; i++) {
                var aLoc = listItems[i].children[0].href;
                if (aLoc === loc) {
                    var parent = $(listItems[i]);
                    parent.addClass('selected');
                }
            }
        }
    }

    setSelected();
});
