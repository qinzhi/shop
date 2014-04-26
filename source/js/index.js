// JavaScript Documentvar focus_width = 350;
var focus_height =250;
var imgurls = "img/保时捷车1.jpg|img/布加迪1.jpg|img/宾利5.jpg|img/宝马车1.jpg|img/法拉利车1.jpg|";

var imglinks = "http://www.lanrentuku.com/|http://www.lanrentuku.com/|http://www.lanrentuku.com/|http://www.lanrentuku.com/|http://www.lanrentuku.com/|";

var imgtitles = "劳斯莱斯 幻影 6.7加长版|宾利 雅致|布加迪 威龙 Coupe|法拉利 612发 动 机|保时捷 911 Turbo AT|";

imgurls = imgurls.substr(0, imgurls.length-1)
imglinks = imglinks.substr(0, imglinks.length-1)
imgtitles = imgtitles.substr(0, imgtitles.length-1)
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ focus_height +'">');
document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="fs/taodpcom.swf">');
document.write('<param name="quality" value="high"><param name="bgcolor" value="#FFFFFF">');
document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
document.write('<param name="FlashVars" value="imgurls='+imgurls+'&imglinks='+imglinks+'&imgtitles='+imgtitles+'">');
document.write('<embed src="fs/taodpcom.swf" wmode="opaque" FlashVars="imgurls='+imgurls+'&imglinks='+imglinks+'&imgtitles='+imgtitles+'" menu="false" bgcolor="#FFFFFF" quality="high" width="'+ focus_width +'" height="'+ focus_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
document.write('</object>');