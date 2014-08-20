$(document).ready(function(){ 


$(function() {
  $('ul.bxslider').bxSlider({
    auto:true,
    speed:300,
    mode:'horizontal',
    slideMargin:200,
    easing:'ease-out',
    captions:true,
    responsive:true,
    slideWidth:544
  });
});

//jrumble
$('#nav-main li.rogo a img').jrumble({
	speed: 100
});

$('#nav-main li.rogo a img').hover(function(){
	$(this).trigger('startRumble');
}, function(){
	$(this).trigger('stopRumble');
});



/*var today = new Date();
var ustime=$('span.times');
ustime.append(today.toString('MM/dd h(:mm)'));
setInterval( function(){$("span.times").text(Date());}, 1000);
*/

String.prototype.right = function(n){
	return this.substr(this.length - n, n);
};

Date.prototype.setTimezone = function(tz){
    var utc = new Date(this.getTime() + this.getTimezoneOffset() * 60 * 1000);
    return new Date(utc.getTime() + tz / 100 * 60 * 60 * 1000);
};

$(function(){
  setInterval(function(){
    var now = new Date();
    $('.timezone').each(function(){
      var dst = now.setTimezone($(this).attr('data-timezone'));

      // UTC??????????toTimeString?getUTCHours??????

      $(this).val(

        + ("0" + (dst.getMonth() + 1)).right(2) + '/'
        + ("0" + dst.getDate()).right(2) + '/'
        + dst.getFullYear() + '  '
        + ("0" + dst.getHours()).right(2) + ':'
        + ("0" + dst.getMinutes()).right(2) + ':'
        + ("0" + dst.getSeconds()).right(2)
      ).next().text(dst);
    });
  }, 1000);

});

});




