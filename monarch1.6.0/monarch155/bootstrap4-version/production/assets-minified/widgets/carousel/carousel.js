function _classCallCheck(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(a){return typeof a}:function(a){return a&&"function"==typeof Symbol&&a.constructor===Symbol&&a!==Symbol.prototype?"symbol":typeof a},_createClass=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),Carousel=function(a){var b="carousel",c="4.0.0-alpha.6",d="bs.carousel",e="."+d,f=".data-api",g=a.fn[b],h=600,i=37,j=39,k={interval:5e3,keyboard:!0,slide:!1,pause:"hover",wrap:!0},l={interval:"(number|boolean)",keyboard:"boolean",slide:"(boolean|string)",pause:"(string|boolean)",wrap:"boolean"},m={NEXT:"next",PREV:"prev",LEFT:"left",RIGHT:"right"},n={SLIDE:"slide"+e,SLID:"slid"+e,KEYDOWN:"keydown"+e,MOUSEENTER:"mouseenter"+e,MOUSELEAVE:"mouseleave"+e,LOAD_DATA_API:"load"+e+f,CLICK_DATA_API:"click"+e+f},o={CAROUSEL:"carousel",ACTIVE:"active",SLIDE:"slide",RIGHT:"carousel-item-right",LEFT:"carousel-item-left",NEXT:"carousel-item-next",PREV:"carousel-item-prev",ITEM:"carousel-item"},p={ACTIVE:".active",ACTIVE_ITEM:".active.carousel-item",ITEM:".carousel-item",NEXT_PREV:".carousel-item-next, .carousel-item-prev",INDICATORS:".carousel-indicators",DATA_SLIDE:"[data-slide], [data-slide-to]",DATA_RIDE:'[data-ride="carousel"]'},q=function(){function f(b,c){_classCallCheck(this,f),this._items=null,this._interval=null,this._activeElement=null,this._isPaused=!1,this._isSliding=!1,this._config=this._getConfig(c),this._element=a(b)[0],this._indicatorsElement=a(this._element).find(p.INDICATORS)[0],this._addEventListeners()}return f.prototype.next=function(){if(this._isSliding)throw new Error("Carousel is sliding");this._slide(m.NEXT)},f.prototype.nextWhenVisible=function(){document.hidden||this.next()},f.prototype.prev=function(){if(this._isSliding)throw new Error("Carousel is sliding");this._slide(m.PREV)},f.prototype.pause=function(b){b||(this._isPaused=!0),a(this._element).find(p.NEXT_PREV)[0]&&Util.supportsTransitionEnd()&&(Util.triggerTransitionEnd(this._element),this.cycle(!0)),clearInterval(this._interval),this._interval=null},f.prototype.cycle=function(a){a||(this._isPaused=!1),this._interval&&(clearInterval(this._interval),this._interval=null),this._config.interval&&!this._isPaused&&(this._interval=setInterval((document.visibilityState?this.nextWhenVisible:this.next).bind(this),this._config.interval))},f.prototype.to=function(b){var c=this;this._activeElement=a(this._element).find(p.ACTIVE_ITEM)[0];var d=this._getItemIndex(this._activeElement);if(!(b>this._items.length-1||b<0)){if(this._isSliding)return void a(this._element).one(n.SLID,function(){return c.to(b)});if(d===b)return this.pause(),void this.cycle();var e=b>d?m.NEXT:m.PREV;this._slide(e,this._items[b])}},f.prototype.dispose=function(){a(this._element).off(e),a.removeData(this._element,d),this._items=null,this._config=null,this._element=null,this._interval=null,this._isPaused=null,this._isSliding=null,this._activeElement=null,this._indicatorsElement=null},f.prototype._getConfig=function(c){return c=a.extend({},k,c),Util.typeCheckConfig(b,c,l),c},f.prototype._addEventListeners=function(){var b=this;this._config.keyboard&&a(this._element).on(n.KEYDOWN,function(a){return b._keydown(a)}),"hover"!==this._config.pause||"ontouchstart"in document.documentElement||a(this._element).on(n.MOUSEENTER,function(a){return b.pause(a)}).on(n.MOUSELEAVE,function(a){return b.cycle(a)})},f.prototype._keydown=function(a){if(!/input|textarea/i.test(a.target.tagName))switch(a.which){case i:a.preventDefault(),this.prev();break;case j:a.preventDefault(),this.next();break;default:return}},f.prototype._getItemIndex=function(b){return this._items=a.makeArray(a(b).parent().find(p.ITEM)),this._items.indexOf(b)},f.prototype._getItemByDirection=function(a,b){var c=a===m.NEXT,d=a===m.PREV,e=this._getItemIndex(b),f=this._items.length-1;if((d&&0===e||c&&e===f)&&!this._config.wrap)return b;var g=a===m.PREV?-1:1,h=(e+g)%this._items.length;return h===-1?this._items[this._items.length-1]:this._items[h]},f.prototype._triggerSlideEvent=function(b,c){var d=a.Event(n.SLIDE,{relatedTarget:b,direction:c});return a(this._element).trigger(d),d},f.prototype._setActiveIndicatorElement=function(b){if(this._indicatorsElement){a(this._indicatorsElement).find(p.ACTIVE).removeClass(o.ACTIVE);var c=this._indicatorsElement.children[this._getItemIndex(b)];c&&a(c).addClass(o.ACTIVE)}},f.prototype._slide=function(b,c){var d=this,e=a(this._element).find(p.ACTIVE_ITEM)[0],f=c||e&&this._getItemByDirection(b,e),g=Boolean(this._interval),i=void 0,j=void 0,k=void 0;if(b===m.NEXT?(i=o.LEFT,j=o.NEXT,k=m.LEFT):(i=o.RIGHT,j=o.PREV,k=m.RIGHT),f&&a(f).hasClass(o.ACTIVE))return void(this._isSliding=!1);if(!this._triggerSlideEvent(f,k).isDefaultPrevented()&&e&&f){this._isSliding=!0,g&&this.pause(),this._setActiveIndicatorElement(f);var l=a.Event(n.SLID,{relatedTarget:f,direction:k});Util.supportsTransitionEnd()&&a(this._element).hasClass(o.SLIDE)?(a(f).addClass(j),Util.reflow(f),a(e).addClass(i),a(f).addClass(i),a(e).one(Util.TRANSITION_END,function(){a(f).removeClass(i+" "+j).addClass(o.ACTIVE),a(e).removeClass(o.ACTIVE+" "+j+" "+i),d._isSliding=!1,setTimeout(function(){return a(d._element).trigger(l)},0)}).emulateTransitionEnd(h)):(a(e).removeClass(o.ACTIVE),a(f).addClass(o.ACTIVE),this._isSliding=!1,a(this._element).trigger(l)),g&&this.cycle()}},f._jQueryInterface=function(b){return this.each(function(){var c=a(this).data(d),e=a.extend({},k,a(this).data());"object"===(void 0===b?"undefined":_typeof(b))&&a.extend(e,b);var g="string"==typeof b?b:e.slide;if(c||(c=new f(this,e),a(this).data(d,c)),"number"==typeof b)c.to(b);else if("string"==typeof g){if(void 0===c[g])throw new Error('No method named "'+g+'"');c[g]()}else e.interval&&(c.pause(),c.cycle())})},f._dataApiClickHandler=function(b){var c=Util.getSelectorFromElement(this);if(c){var e=a(c)[0];if(e&&a(e).hasClass(o.CAROUSEL)){var g=a.extend({},a(e).data(),a(this).data()),h=this.getAttribute("data-slide-to");h&&(g.interval=!1),f._jQueryInterface.call(a(e),g),h&&a(e).data(d).to(h),b.preventDefault()}}},_createClass(f,null,[{key:"VERSION",get:function(){return c}},{key:"Default",get:function(){return k}}]),f}();return a(document).on(n.CLICK_DATA_API,p.DATA_SLIDE,q._dataApiClickHandler),a(window).on(n.LOAD_DATA_API,function(){a(p.DATA_RIDE).each(function(){var b=a(this);q._jQueryInterface.call(b,b.data())})}),a.fn[b]=q._jQueryInterface,a.fn[b].Constructor=q,a.fn[b].noConflict=function(){return a.fn[b]=g,q._jQueryInterface},q}(jQuery);