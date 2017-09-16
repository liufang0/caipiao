/**
 * Created by dell on 2017/6/18.
 */
/*
 * 	jquery鑳屾櫙婊戝姩鎻掍欢
 * 	$(".egame-banner").slidebigbg({});
 * */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a:a(jQuery)}(function(a){function b(b){var g=b||window.event,h=i.call(arguments,1),j=0,l=0,m=0,n=0,o=0,p=0;if(b=a.event.fix(g),b.type="mousewheel","detail"in g&&(m=-1*g.detail),"wheelDelta"in g&&(m=g.wheelDelta),"wheelDeltaY"in g&&(m=g.wheelDeltaY),"wheelDeltaX"in g&&(l=-1*g.wheelDeltaX),"axis"in g&&g.axis===g.HORIZONTAL_AXIS&&(l=-1*m,m=0),j=0===m?l:m,"deltaY"in g&&(m=-1*g.deltaY,j=m),"deltaX"in g&&(l=g.deltaX,0===m&&(j=-1*l)),0!==m||0!==l){if(1===g.deltaMode){var q=a.data(this,"mousewheel-line-height");j*=q,m*=q,l*=q}else if(2===g.deltaMode){var r=a.data(this,"mousewheel-page-height");j*=r,m*=r,l*=r}if(n=Math.max(Math.abs(m),Math.abs(l)),(!f||f>n)&&(f=n,d(g,n)&&(f/=40)),d(g,n)&&(j/=40,l/=40,m/=40),j=Math[j>=1?"floor":"ceil"](j/f),l=Math[l>=1?"floor":"ceil"](l/f),m=Math[m>=1?"floor":"ceil"](m/f),k.settings.normalizeOffset&&this.getBoundingClientRect){var s=this.getBoundingClientRect();o=b.clientX-s.left,p=b.clientY-s.top}return b.deltaX=l,b.deltaY=m,b.deltaFactor=f,b.offsetX=o,b.offsetY=p,b.deltaMode=0,h.unshift(b,j,l,m),e&&clearTimeout(e),e=setTimeout(c,200),(a.event.dispatch||a.event.handle).apply(this,h)}}function c(){f=null}function d(a,b){return k.settings.adjustOldDeltas&&"mousewheel"===a.type&&b%120===0}var e,f,g=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],h="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],i=Array.prototype.slice;if(a.event.fixHooks)for(var j=g.length;j;)a.event.fixHooks[g[--j]]=a.event.mouseHooks;var k=a.event.special.mousewheel={version:"3.1.12",setup:function(){if(this.addEventListener)for(var c=h.length;c;)this.addEventListener(h[--c],b,!1);else this.onmousewheel=b;a.data(this,"mousewheel-line-height",k.getLineHeight(this)),a.data(this,"mousewheel-page-height",k.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var c=h.length;c;)this.removeEventListener(h[--c],b,!1);else this.onmousewheel=null;a.removeData(this,"mousewheel-line-height"),a.removeData(this,"mousewheel-page-height")},getLineHeight:function(b){var c=a(b),d=c["offsetParent"in a.fn?"offsetParent":"parent"]();return d.length||(d=a("body")),parseInt(d.css("fontSize"),10)||parseInt(c.css("fontSize"),10)||16},getPageHeight:function(b){return a(b).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})});

;(function($){
  $.fn.slidebigbg=function(opts){
    var dopts={
      defaultPic:0,			//榛樿Index
      autoRun:true,			//鏄惁鑷姩杞挱
      autotime:5000,			//鑷姩杞挱鏃堕棿
      mouseWheel:false,		//鏄惁鐩戝惉榧犳爣婊氳疆婊氬姩浜嬩欢
      resizeWin:false,		//鏄惁鑷€傚簲灞忓箷
      minHeight:768			//鏈€灏忛珮搴�
    };

    opts = $.extend({}, dopts, opts || {}); //鏍规嵁鍙傛暟鍒濆鍖栭粯璁ら厤缃�

    var me=this;
    var clickBtn=$(me).find(".icons").children("a");

    var autorun="";
    if(opts.autoRun==true){
      autorun=reRun();
    }
    function reRun(){
      return setInterval(function(){
        opts.defaultPic++;
        if(opts.defaultPic>(clickBtn.size()-1)){
          opts.defaultPic=0;
        }
        changePic(opts.defaultPic);
      },dopts.autotime);
    }

    var aniisrun=false;
    function changePic(index,opts2){
      if(opts2=='reRun'&&autorun!=""&&opts.autoRun==true){clearInterval(autorun);}
      aniisrun=true;
      var hideObj=$(me).find(".slide_bg").children("div.on");
      var showObj=$(me).find(".slide_bg").children("div").eq(index);

      hideObj.css({"z-index":1});
      showObj.css({"z-index":10}).fadeIn(1000,function(){aniisrun=false;});
      clickBtn.children("i.ico").removeClass("selected");
      clickBtn.children("i.ico").eq(index).addClass("selected");

      hideObj.fadeOut(2000);

      hideObj.removeClass("on");
      showObj.addClass("on");

      if(opts2=='reRun'&&autorun!=""&&opts.autoRun==true){autorun=reRun();}
    }

    clickBtn.click(function(){
      opts.defaultPic=$(this).index()
      changePic(opts.defaultPic,"reRun");
    });

    if(opts.mouseWheel){
      $(me).bind('mousewheel', function(event, delta) {
        if(aniisrun) return;
        var dir = delta > 0 ? 'Up' : 'Down',
          vel = Math.abs(delta);
        if(dir=="Up"){
          opts.defaultPic--;
        }else{
          opts.defaultPic++;
        }
        if(opts.defaultPic>(clickBtn.size()-1)) opts.defaultPic=0;
        if(opts.defaultPic<0) opts.defaultPic=clickBtn.size()-1;

        changePic(opts.defaultPic,"reRun");
        return false;
      });
    }

    function setHeight(){
      var height=$(window).height()<=opts.minHeight?opts.minHeight:$(window).height();
      $(me).css({"height":height+"px"});
      $(me).find(".slide_bg").css({"height":height+"px"});
      $(me).find(".slide_bg>div").css({"height":height+"px"});
    }
    if(opts.resizeWin){
      setHeight();
      $(window).resize(function(){
        setHeight();
      });
    }
  };
})(jQuery);