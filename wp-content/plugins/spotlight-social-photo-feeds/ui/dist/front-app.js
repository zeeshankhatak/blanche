var Spotlight=(window.webpackJsonpSpotlight=window.webpackJsonpSpotlight||[]).push([[13],{0:function(t,e){t.exports=React},1072:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});const o=n(282);document.addEventListener("DOMContentLoaded",o.init)},15:function(t,e){var n;n=function(){return this}();try{n=n||new Function("return this")()}catch(t){"object"==typeof window&&(n=window)}t.exports=n},20:function(t,e,n){t.exports=n(53)()},22:function(t,e){t.exports=ReactDOM},282:function(t,e,n){"use strict";var o=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(e,"__esModule",{value:!0}),e.SliPreloadedMedia=e.SliAccountInfo=e.SliFrontCtx=e.feed=e.init=void 0;const i=o(n(0)),r=o(n(22)),a=n(102),c=n(10),s=n(174),l=n(283),u=n(26),d=n(285);function f(t={}){const e=document.getElementsByClassName("spotlight-instagram-feed");for(let n=0,o=e.length||0;n<o;++n){const o=p(e[n],t);o&&(window.SpotlightInstagram.instances[n]=o)}}function p(t,n={}){const o=t.getAttribute("data-feed-var"),f=(p=o,e.SliFrontCtx[p]=e.SliFrontCtx.hasOwnProperty(p)?e.SliFrontCtx[p]:w("sli__f__"+p));var p;const S=function(t){return e.SliAccountInfo[t]=e.SliAccountInfo.hasOwnProperty(t)?e.SliAccountInfo[t]:w("sli__a__"+t)}(o),h=function(t){return e.SliPreloadedMedia[t]=e.SliPreloadedMedia.hasOwnProperty(t)?e.SliPreloadedMedia[t]:w("sli__m__"+t)}(o);if(o&&"object"==typeof f&&Array.isArray(S)){if(!(t.children.length>0)){const e=u.Responsive.getDevice(s.getWindowSize());let n=new c.FeedState(f,e,c.FeedEntityResolver.forFrontApp(S));d.isObjectEmpty(h)||([n]=n.load(h));const o={run(){const e=i.default.createElement(l.FrontApp,{feedState:n});r.default.render(e,t)}};return a.runWhenDomReady(()=>o.run()),o}n.silent}return null}function w(t){const e=document.getElementById(t);return e&&e.hasAttribute("data-json")?JSON.parse(e.getAttribute("data-json")):null}e.init=f,e.feed=p,window.SliFrontCtx||(window.SliFrontCtx={}),window.SliAccountInfo||(window.SliAccountInfo={}),window.SliPreloadedMedia||(window.SliPreloadedMedia={}),window.SpotlightInstagram||(window.SpotlightInstagram={instances:[],init:f,feed:p}),e.SliFrontCtx=window.SliFrontCtx,e.SliAccountInfo=window.SliAccountInfo,e.SliPreloadedMedia=window.SliPreloadedMedia},283:function(t,e,n){"use strict";var o=this&&this.__createBinding||(Object.create?function(t,e,n,o){void 0===o&&(o=n),Object.defineProperty(t,o,{enumerable:!0,get:function(){return e[n]}})}:function(t,e,n,o){void 0===o&&(o=n),t[o]=e[n]}),i=this&&this.__setModuleDefault||(Object.create?function(t,e){Object.defineProperty(t,"default",{enumerable:!0,value:e})}:function(t,e){t.default=e}),r=this&&this.__importStar||function(t){if(t&&t.__esModule)return t;var e={};if(null!=t)for(var n in t)"default"!==n&&Object.hasOwnProperty.call(t,n)&&o(e,t,n);return i(e,t),e};Object.defineProperty(e,"__esModule",{value:!0}),e.FrontApp=void 0;const a=r(n(0));n(284);const c=n(201);e.FrontApp=function({feedState:t}){const[e,n]=a.useState(t);return a.default.createElement("div",{className:"spotlight-instagram-app"},a.default.createElement(c.InstagramFeed,{state:e,onUpdateState:n,autoDevice:!0,autoLoad:!0}))}},284:function(t,e,n){t.exports={"spotlight-instagram-app":"spotlight-instagram-app"}},53:function(t,e,n){"use strict";var o=n(54);function i(){}function r(){}r.resetWarningCache=i,t.exports=function(){function t(t,e,n,i,r,a){if(a!==o){var c=new Error("Calling PropTypes validators directly is not supported by the `prop-types` package. Use PropTypes.checkPropTypes() to call them. Read more at http://fb.me/use-check-prop-types");throw c.name="Invariant Violation",c}}function e(){return t}t.isRequired=t;var n={array:t,bool:t,func:t,number:t,object:t,string:t,symbol:t,any:t,arrayOf:e,element:t,elementType:t,instanceOf:e,node:t,objectOf:e,oneOf:e,oneOfType:e,shape:e,exact:e,checkPropTypes:r,resetWarningCache:i};return n.PropTypes=n,n}},54:function(t,e,n){"use strict";t.exports="SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED"}},[[1072,3,1,2,0]]]);