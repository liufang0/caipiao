/**
 * Created by dell on 2017/6/18.
 */
(function (doc, win) {
  var docEl = doc.documentElement,
    resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
    recalc = function () {
      var clientWidth = docEl.clientWidth;
      if (!clientWidth) return;
      docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
    };

  if (!doc.addEventListener) return;
  win.addEventListener(resizeEvt, recalc, false);
  doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);

(function ($) {
  $.easing['jswing'] = $.easing['swing'];
  $.extend($.easing, {def: 'easeOutQuad', easeOutElastic: function (x, t, b, c, d) {
    var s = 1.70158;
    var p = 0;
    var a = c;
    if (t == 0)
      return b;
    if ((t /= d) == 1)
      return b + c;
    if (!p)
      p = d * .3;
    if (a < Math.abs(c)) {
      a = c;
      var s = p / 4;
    } else
      var s = p / (2 * Math.PI) * Math.asin(c / a);
    return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
  }, easeInOutElastic: function (x, t, b, c, d) {
    var s = 1.70158;
    var p = 0;
    var a = c;
    if (t == 0)
      return b;
    if ((t /= d / 2) == 2)
      return b + c;
    if (!p)
      p = d * (.3 * 1.5);
    if (a < Math.abs(c)) {
      a = c;
      var s = p / 4;
    } else
      var s = p / (2 * Math.PI) * Math.asin(c / a);
    if (t < 1)
      return-.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
    return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b;
  } });
})(jQuery);
(function (jQuery) {

  if (jQuery.browser)
    return;

  jQuery.browser = {};
  jQuery.browser.mozilla = false;
  jQuery.browser.webkit = false;
  jQuery.browser.opera = false;
  jQuery.browser.msie = false;

  var nAgt = navigator.userAgent;
  jQuery.browser.name = navigator.appName;
  jQuery.browser.fullVersion = '' + parseFloat(navigator.appVersion);
  jQuery.browser.majorVersion = parseInt(navigator.appVersion, 10);
  var nameOffset, verOffset, ix;

// In Opera, the true version is after "Opera" or after "Version"
  if ((verOffset = nAgt.indexOf("Opera")) != -1) {
    jQuery.browser.opera = true;
    jQuery.browser.name = "Opera";
    jQuery.browser.fullVersion = nAgt.substring(verOffset + 6);
    if ((verOffset = nAgt.indexOf("Version")) != -1)
      jQuery.browser.fullVersion = nAgt.substring(verOffset + 8);
  }
// In MSIE, the true version is after "MSIE" in userAgent
  else if ((verOffset = nAgt.indexOf("MSIE")) != -1) {
    jQuery.browser.msie = true;
    jQuery.browser.name = "Microsoft Internet Explorer";
    jQuery.browser.fullVersion = nAgt.substring(verOffset + 5);
  }
// In Chrome, the true version is after "Chrome"
  else if ((verOffset = nAgt.indexOf("Chrome")) != -1) {
    jQuery.browser.webkit = true;
    jQuery.browser.name = "Chrome";
    jQuery.browser.fullVersion = nAgt.substring(verOffset + 7);
  }
// In Safari, the true version is after "Safari" or after "Version"
  else if ((verOffset = nAgt.indexOf("Safari")) != -1) {
    jQuery.browser.webkit = true;
    jQuery.browser.name = "Safari";
    jQuery.browser.fullVersion = nAgt.substring(verOffset + 7);
    if ((verOffset = nAgt.indexOf("Version")) != -1)
      jQuery.browser.fullVersion = nAgt.substring(verOffset + 8);
  }
// In Firefox, the true version is after "Firefox"
  else if ((verOffset = nAgt.indexOf("Firefox")) != -1) {
    jQuery.browser.mozilla = true;
    jQuery.browser.name = "Firefox";
    jQuery.browser.fullVersion = nAgt.substring(verOffset + 8);
  }
// In most other browsers, "name/version" is at the end of userAgent
  else if ((nameOffset = nAgt.lastIndexOf(' ') + 1) <
    (verOffset = nAgt.lastIndexOf('/')))
  {
    jQuery.browser.name = nAgt.substring(nameOffset, verOffset);
    jQuery.browser.fullVersion = nAgt.substring(verOffset + 1);
    if (jQuery.browser.name.toLowerCase() == jQuery.browser.name.toUpperCase()) {
      jQuery.browser.name = navigator.appName;
    }
  }
// trim the fullVersion string at semicolon/space if present
  if ((ix = jQuery.browser.fullVersion.indexOf(";")) != -1)
    jQuery.browser.fullVersion = jQuery.browser.fullVersion.substring(0, ix);
  if ((ix = jQuery.browser.fullVersion.indexOf(" ")) != -1)
    jQuery.browser.fullVersion = jQuery.browser.fullVersion.substring(0, ix);

  jQuery.browser.majorVersion = parseInt('' + jQuery.browser.fullVersion, 10);
  if (isNaN(jQuery.browser.majorVersion)) {
    jQuery.browser.fullVersion = '' + parseFloat(navigator.appVersion);
    jQuery.browser.majorVersion = parseInt(navigator.appVersion, 10);
  }
  jQuery.browser.version = jQuery.browser.majorVersion;
})(jQuery);
//搴旂敤鎵╁睍
jQuery.fx.interval = 30;
var Suke = {
  LANG: {
    syserror: "",
    notLoginTip: '',
    otherUserTip: ''
  },
  IMAGE_URL:''
};
Suke.common = {
  webFloatWin: {
    left_nav: {
      cls: {
        obj: '.t6-left',
        menu: '.t6-left .left-nav',
        changBtn: '.l-li-five a'
      },
      objAnimate: function (obj, opt) {
        var _this = this;
        var ml = (opt == 'show') ? '0px' : '-115px';
        var ea = (opt == 'show') ? 'easeOutElastic' : 'easeInOutElastic';
        var sp = (opt == 'show') ? 900 : 1100;

        //version 1.1
        var time = 0;
        $.each(obj, function (i, val) {
          setTimeout(function () {
            $(val).animate({'margin-left': ml}, sp, ea);
          }, time);
          time = time + 300;
        });
      },
      change: function () {
        var _this = this;
        var index = 0;
        $(_this.cls.changBtn).click(function () {
          if (index == 0) {
            /*	version 1.1 */
            _this.objAnimate($(_this.cls.menu + " li:not(.l-li-five)"), "hide");

            $(this).addClass("on");
            index++;
          } else {
            _this.objAnimate($(_this.cls.menu + " li:not(.l-li-five)"), "show");

            $(this).removeClass("on");
            index = 0;
          }
        });
      },
      init: function () {
        var _this = this;
        _this.change();
      }
    },
    init: function () {
      this.left_nav.init();
    }
  },
  //閫氱敤鍒濆鍖�
  init: function () {
    //鍒濆寮曞
    // Suke.common.layer.init();
    if (top.location == self.location) { //涓嶅湪妗嗘灦鍐�
      Suke.common.webFloatWin.init();	//鍚姩宸︿晶鑿滃崟
    }
  }
};
$(function () {
  Suke.common.init();
});
