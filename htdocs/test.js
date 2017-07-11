// Casperインスタンス生成
var casper = require('casper').create({
  viewportSize: { width: 375, height: 667 }
});

var BASE_URL = 'https://www.facebook.com/';
casper.start(BASE_URL);

casper.then(function(){
  casper.echo('minh test');
})

casper.run();