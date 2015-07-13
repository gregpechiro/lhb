var quotes = [
    'We recently moved into our beautiful new home built by Lancaster Home Builders.',
    'Thank you to everyone at Lancaster Home Builders. We certainly recommend Lancaster Home Builders.',
    'Our design selections and the construction of the final product look beautiful.',
    'While the process was a learning experience and had some expected bumps along the way, we were able to stay on schedule and budget with our builder, Lancaster Home Builders.'
];

(function getQuote() {
    var q = quotes[Math.floor((Math.random() * quotes.length))];
    document.getElementById('randomQuote').innerHTML = q;
    document.getElementById('randomQuote2').innerHTML = q;
    // document.getElementById('randomQuote3').innerHTML = q;
    // document.getElementById('randomQuote4').innerHTML = q;
})();
