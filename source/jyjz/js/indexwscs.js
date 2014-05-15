// JavaScript Document
 $(document).ready(function(){
	$('.box1 a').mouseover(function(){
		$(this).stop().animate({"top":"-114px"}, 200); 
	})
	$('.box1 a').mouseout(function(){
		$(this).stop().animate({"top":"0"}, 200); 
	})
})
  

startList = function() {
 if (document.all&&document.getElementById) {
  navRoot = document.getElementById("nav");
  for (i=0; i<navRoot.childNodes.length; i++) {
   node = navRoot.childNodes[i];
   if (node.nodeName=="LI") {
    node.onmouseover=function(){
     this.className+=" over";
    }
    node.onmouseout=function(){
     this.className=this.className.replace(" over", "");
    }
   }
  }
 }
}
window.onload=startList;

function SlideShow(c) {
    var a = document.getElementById("slideContainer"), f = document.getElementById("slidesImgs").getElementsByTagName("li"), h = document.getElementById("slideBar"), n = h.getElementsByTagName("li"), d = f.length, c = c || 3000, e = lastI = 0, j, m;
    function b() {
        m = setInterval(function () {
            e = e + 1 >= d ? e + 1 - d : e + 1;
            g()
        }, c)
    }
    function k() {
        clearInterval(m)
    }
    function g() {
        f[lastI].style.display = "none";
        n[lastI].className = "";
        f[e].style.display = "block";
        n[e].className = "on";
        lastI = e
    }
    f[e].style.display = "block";
    a.onmouseover = k;
    a.onmouseout = b;
    h.onmouseover = function (i) {
        j = i ? i.target : window.event.srcElement;
        if (j.nodeName === "LI") {
            e = parseInt(j.innerHTML, 10) - 1;
            g()
        }
    };
    b()
}
;





function overall(root){
	var root = root || document;
	var re = /j_([\w_]+)/;
	var funcs = {};
	$(".js",root).each(function(i) {
		var m = re.exec(this.className);
		if (m) {
			var f = funcs[m[1]];		
			if (!f) {
				f = eval('CF.' + m[1].replace(/\_/gi,'.'));
				funcs[m[1]] = f;
			}			
			f && f(this);
		}
	});
}

var CF = new Object();

CF.common = {
    //tabs切换
    tabs: function(obj) {
        $('>ul', obj).tabs();
    },
    //下拉菜单
    dropMenu: function(obj) {
        $('li', obj).hover(function() {
            $('ul', this).fadeIn();
        }, function() {
            $('ul', this).hide();
        });
    },
    productSaleClick: function(obj) {
        var next = $(obj).parent().next();
        $(obj).click(function() {
            next.show();
            CF.common.productSale(next);
            return false;
        });
        $('#product-sale-close').click(function() {
            next.hide();
        });
    },
    productSale: function(obj) {
        $('dd:eq(0)>ul>li', obj).hover(function() {
            $(this).addClass('current');
        }, function() {
            $(this).removeClass('current');
        });
    },
    //插入圆角
    corner: function(obj) {
        if ($.browser.msie && $.browser.version == '6.0') {
            var obj = $(obj);
            var height = obj.height();
            var outerHeight = obj.outerHeight();
            if (outerHeight % 2 != 0) {
                obj.height(height + 1);
            }
        }
        $('<div class="cornerLT"></div><div class="cornerRT"></div><div class="cornerLB"></div><div class="cornerRB"></div>').appendTo(obj);
    },
    //用户面板显隐
    userPannel: {
        insertIframe: function() {
            if ($.browser.msie && $.browser.version == '6.0') {
                var sIframe = '<iframe width="100%" height="100%" frameborder="0"></iframe>';
                $('#userPannel').append(sIframe);
                $('#userPannel-pop .module-popBox').append('<iframe frameborder="0"></iframe>');
            }
        },
        showPrompt: function(elem) {
            var obj = $(elem);
            obj.show();
            $('a.close', obj).click(function() {
               $(obj).hide();


               if (elem == "#userPannel-prompt") SetIeCookie('userpannel', 'close');
               if (elem == "#userPannel-userInfo")SetIeCookie('userInfo','close');    
               return false
            });            
        },
        click: function(obj) {
            var obj = $(obj);
            var href = obj.attr('href').toString().match(/#(.*)/)[1];
            var popId = $('#' + href);
            obj.click(function() {
                popId.show()
                return false;
            });

            $('a.close', popId).click(function() {
                popId.hide();                
                return false
            });

        },
        //mouseover
        hover: function(obj) {
            var obj = $(obj);
            var href = obj.attr('href').toString().match(/#(.*)/)[1];
            var popId = $('#' + href);
            obj.hover(function() {
                popId.show();
            }, function() {
                popId.hide();
            });
        },
        //pop mouseover
        popHover: function(obj) {
        $('div[id][id!="userPannel-prompt"][id!="userPannel-userInfo"][id!="userPannel-userLogin"]', obj).hover(function() {
                $(this).show();
            },
			function() {
			    $(this).hide();
			});
        }
    },
    //hover行变色(公用)
    lineHoverColor: function(obj) {
        $(obj).children().hover(function() {
            $(this).addClass('current');
        }, function() {
            $(this).removeClass('current');
        });
    },
    lineHoverCurrent: function(obj) {
        $(obj).children().click(function() {
            $(this).parent().find('.current').removeClass();
            $(this).addClass('current');
        });


    }

}
//首页
CF.index = {
	//促销产品跑马灯
	carouseProduct: function(obj){		
		var obj = $(obj);
		var prevChild = obj.prev();
		var visible = 4;
		var liNums = $('li', obj).length;		
		var pageNum = Math.ceil( liNums/visible );
		var pageStr = '';
		prevChild.append('<ul class="jcarouseLiteNav"></ul>');
		var jcarouseLiteNav = $('>ul.jcarouseLiteNav', prevChild);		
		for(var i = 0; i < pageNum; i++){
			pageStr += '<li><a class="' + (i + 1) + '"><span>' + (i + 1) + '</span></a></li>';
		}
		jcarouseLiteNav.prepend('<li class="prev"><a><span>previous</span></a></li>' + pageStr + ' <li class="next"><a><span>next</span></a></li>');
		$('>li .1', jcarouseLiteNav).parent().addClass('current');

		if(liNums <=visible){
			jcarouseLiteNav.hide();
		}
		obj.jCarouselLite({
			btnNext: $('>li.next ', jcarouseLiteNav),
			btnPrev: $('>li.prev a', jcarouseLiteNav),
			visible: visible,
			scroll: visible,
			speed: 1000,
			afterEnd: function(a){
				$('>li.current', jcarouseLiteNav).removeClass('current');
				var currLI = $(a[0]).attr("class").split('order')[1];
				$('>li:eq(' + currLI + ')', jcarouseLiteNav).addClass('current');
			},
			btnGo: $('>li:not([class*=previous]):not([class*=next]) a', jcarouseLiteNav)
		})
		var width = obj.width();
		obj.width( width - 3 );
	},
	//最新卖场和省心生活跑马灯
	carouseOther: function(obj){
		var obj = $(obj);
		var prevChild = obj.prev();
		var pageNum = 3;
		var pageStr = '';
		prevChild.append('<ul class="jcarouseLiteNav"></ul>');
		var jcarouseLiteNav = $('>ul.jcarouseLiteNav', prevChild);
		
		for(var i = 0; i < pageNum; i++){
			pageStr += '<li><a class="' + (i + 1) + '"><span>' + (i + 1) + '</span></a></li>';
		}
		jcarouseLiteNav.prepend('<li class="prev"><a><span>previous</span></a></li>' + pageStr + ' <li class="next"><a><span>next</span></a></li>');
		$('>li .1', jcarouseLiteNav).parent().addClass('current');
		obj.jCarouselLite({
			btnNext: $('>li.next ', jcarouseLiteNav),
			btnPrev: $('>li.prev a', jcarouseLiteNav),
			visible: 1,
			scroll: 1,
			speed: 1000,
			afterEnd: function(a){
				$('>li.current', jcarouseLiteNav).removeClass('current');
				var currLI = $(a[0]).attr("class").split('order')[1];
				$('>li:eq(' + currLI + ')', jcarouseLiteNav).addClass('current');
			},
			btnGo: $('>li:not([class*=previous]):not([class*=next]) a', jcarouseLiteNav)
		})
	}
}

CF.other = {
	picChange: function(obj){
		$(obj).before('<div id="project-pic-nav">').find('ul').cycle({
			fx:'fade',
			timeout: 3000,
			next:obj,
			pager:'#project-pic-nav',
			pageEvent:null
		})

	}
}
function GetCookie(name)       
{
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
     if(arr != null) return unescape(arr[2]); return null;

}
//写cookies函数
function SetIeCookie(name,value)//两个参数，一个是cookie的名子，一个是值
{
    document.cookie = name + "="+ escape (value) + ";path=/;";
}
function SetuserPannel()
{
    var cookie = GetCookie('userpannel');
    if(cookie != 'close')
    {
        CF.common.userPannel.showPrompt('#userPannel-prompt');
    }
}
function SetuserUserInfoPannel() {
    var cookie = GetCookie('userInfo');
    if (cookie != 'close') {
        CF.common.userPannel.showPrompt('#userPannel-userInfo');
    }
}
$(function() {
    overall();
    SetuserPannel();
    SetuserUserInfoPannel();
})
