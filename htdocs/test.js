
var casper = require('casper').create();
var fs = require('fs');
var fname = new Date().getTime() + '.txt';
var save = fs.pathJoin(fs.workingDirectory, 'data', fname);

casper.start('https://google.com', function() {
    this.echo('test 123456');
    fs.write(save, this.getTitle() + '\n', 'w');
});

casper.run();