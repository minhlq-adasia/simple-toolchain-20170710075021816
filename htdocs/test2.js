
var casper = require('casper').create();

casper.start('http://google.com', function() {
    this.echo('test 123456');
});

casper.run();