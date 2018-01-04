/*! modernizr 3.5.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-cssanimations-csstransformslevel2-csstransitions-inputtypes-matchmedia-preserve3d-search-svg-setclasses !*/
!function(e,t,n){function r(e,t){return typeof e===t}function i(){var e,t,n,i,s,o,a;for(var l in w)if(w.hasOwnProperty(l)){if(e=[],t=w[l],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(i=r(t.fn,"function")?t.fn():t.fn,s=0;s<e.length;s++)o=e[s],a=o.split("."),1===a.length?Modernizr[a[0]]=i:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=i),C.push((i?"":"no-")+a.join("-"))}}function s(e){var t=x.className,n=Modernizr._config.classPrefix||"";if(b&&(t=t.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(r,"$1"+n+"js$2")}Modernizr._config.enableClasses&&(t+=" "+n+e.join(" "+n),b?x.className.baseVal=t:x.className=t)}function o(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):b?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function a(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function l(e,t){return!!~(""+e).indexOf(t)}function u(e,t){return function(){return e.apply(t,arguments)}}function f(e,t,n){var i;for(var s in e)if(e[s]in t)return n===!1?e[s]:(i=t[e[s]],r(i,"function")?u(i,n||t):i);return!1}function d(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function p(t,n,r){var i;if("getComputedStyle"in e){i=getComputedStyle.call(e,t,n);var s=e.console;if(null!==i)r&&(i=i.getPropertyValue(r));else if(s){var o=s.error?"error":"log";s[o].call(s,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else i=!n&&t.currentStyle&&t.currentStyle[r];return i}function c(){var e=t.body;return e||(e=o(b?"svg":"body"),e.fake=!0),e}function m(e,n,r,i){var s,a,l,u,f="modernizr",d=o("div"),p=c();if(parseInt(r,10))for(;r--;)l=o("div"),l.id=i?i[r]:f+(r+1),d.appendChild(l);return s=o("style"),s.type="text/css",s.id="s"+f,(p.fake?p:d).appendChild(s),p.appendChild(d),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(t.createTextNode(e)),d.id=f,p.fake&&(p.style.background="",p.style.overflow="hidden",u=x.style.overflow,x.style.overflow="hidden",x.appendChild(p)),a=n(d,e),p.fake?(p.parentNode.removeChild(p),x.style.overflow=u,x.offsetHeight):d.parentNode.removeChild(d),!!a}function v(t,r){var i=t.length;if("CSS"in e&&"supports"in e.CSS){for(;i--;)if(e.CSS.supports(d(t[i]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var s=[];i--;)s.push("("+d(t[i])+":"+r+")");return s=s.join(" or "),m("@supports ("+s+") { #modernizr { position: absolute; } }",function(e){return"absolute"==p(e,null,"position")})}return n}function h(e,t,i,s){function u(){d&&(delete R.style,delete R.modElem)}if(s=r(s,"undefined")?!1:s,!r(i,"undefined")){var f=v(e,i);if(!r(f,"undefined"))return f}for(var d,p,c,m,h,g=["modernizr","tspan","samp"];!R.style&&g.length;)d=!0,R.modElem=o(g.shift()),R.style=R.modElem.style;for(c=e.length,p=0;c>p;p++)if(m=e[p],h=R.style[m],l(m,"-")&&(m=a(m)),R.style[m]!==n){if(s||r(i,"undefined"))return u(),"pfx"==t?m:!0;try{R.style[m]=i}catch(y){}if(R.style[m]!=h)return u(),"pfx"==t?m:!0}return u(),!1}function g(e,t,n,i,s){var o=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+A.join(o+" ")+o).split(" ");return r(t,"string")||r(t,"undefined")?h(a,t,i,s):(a=(e+" "+P.join(o+" ")+o).split(" "),f(a,t,n))}function y(e,t,r){return g(e,n,n,t,r)}var C=[],w=[],S={_version:"3.5.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){w.push({name:e,fn:t,options:n})},addAsyncTest:function(e){w.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=S,Modernizr=new Modernizr,Modernizr.addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect);var x=t.documentElement,b="svg"===x.nodeName.toLowerCase();Modernizr.addTest("preserve3d",function(){var t,n,r=e.CSS,i=!1;return r&&r.supports&&r.supports("(transform-style: preserve-3d)")?!0:(t=o("a"),n=o("a"),t.style.cssText="display: block; transform-style: preserve-3d; transform-origin: right; transform: rotateY(40deg);",n.style.cssText="display: block; width: 9px; height: 1px; background: #000; transform-origin: right; transform: rotateY(40deg);",t.appendChild(n),x.appendChild(t),i=n.getBoundingClientRect(),x.removeChild(t),i=i.width&&i.width<4)});var _=o("input"),T="search tel url email datetime date month week time datetime-local number range color".split(" "),E={};Modernizr.inputtypes=function(e){for(var r,i,s,o=e.length,a="1)",l=0;o>l;l++)_.setAttribute("type",r=e[l]),s="text"!==_.type&&"style"in _,s&&(_.value=a,_.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(r)&&_.style.WebkitAppearance!==n?(x.appendChild(_),i=t.defaultView,s=i.getComputedStyle&&"textfield"!==i.getComputedStyle(_,null).WebkitAppearance&&0!==_.offsetHeight,x.removeChild(_)):/^(search|tel)$/.test(r)||(s=/^(url|email)$/.test(r)?_.checkValidity&&_.checkValidity()===!1:_.value!=a)),E[e[l]]=!!s;return E}(T);var k="Moz O ms Webkit",A=S._config.usePrefixes?k.split(" "):[];S._cssomPrefixes=A;var N=function(t){var r,i=prefixes.length,s=e.CSSRule;if("undefined"==typeof s)return n;if(!t)return!1;if(t=t.replace(/^@/,""),r=t.replace(/-/g,"_").toUpperCase()+"_RULE",r in s)return"@"+t;for(var o=0;i>o;o++){var a=prefixes[o],l=a.toUpperCase()+"_"+r;if(l in s)return"@-"+a.toLowerCase()+"-"+t}return!1};S.atRule=N;var P=S._config.usePrefixes?k.toLowerCase().split(" "):[];S._domPrefixes=P;var z={elem:o("modernizr")};Modernizr._q.push(function(){delete z.elem});var R={style:z.elem.style};Modernizr._q.unshift(function(){delete R.style});var V=function(){function e(e,t){var i;return e?(t&&"string"!=typeof t||(t=o(t||"div")),e="on"+e,i=e in t,!i&&r&&(t.setAttribute||(t=o("div")),t.setAttribute(e,""),i="function"==typeof t[e],t[e]!==n&&(t[e]=n),t.removeAttribute(e)),i):!1}var r=!("onblur"in t.documentElement);return e}();S.hasEvent=V,Modernizr.addTest("inputsearchevent",V("search")),S.testAllProps=g,S.testAllProps=y,Modernizr.addTest("cssanimations",y("animationName","a",!0)),Modernizr.addTest("csstransformslevel2",function(){return y("translate","45px",!0)}),Modernizr.addTest("csstransitions",y("transition","all",!0));var j=S.prefixed=function(e,t,n){return 0===e.indexOf("@")?N(e):(-1!=e.indexOf("-")&&(e=a(e)),t?g(e,t,n):g(e,"pfx"))};Modernizr.addTest("matchmedia",!!j("matchMedia",e)),i(),s(C),delete S.addTest,delete S.addAsyncTest;for(var L=0;L<Modernizr._q.length;L++)Modernizr._q[L]();e.Modernizr=Modernizr}(window,document);