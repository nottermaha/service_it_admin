!function(a,b,c){function d(a){for(var b=[],c=0,d=a.length;c<d;c++)b[a[c]]=c;return b}function e(a,b,c){var d=a.splice(b,1)[0];a.splice(c,0,d)}function f(a,b,c){for(var d=[],e=0,f=a.childNodes.length;e<f;e++)1==a.childNodes[e].nodeType&&d.push(a.childNodes[e]);var g=d[b];null!==c?a.insertBefore(g,d[c]):a.appendChild(g)}$.fn.dataTableExt.oApi.fnColReorder=function(a,b,c){var g,h,i,j,k,l,m=!!$.fn.dataTable.Api,n=a.aoColumns.length,o=function(a,b,c){if(a[b]){var d=a[b].split("."),e=d.shift();isNaN(1*e)||(a[b]=c[1*e]+"."+d.join("."))}};if(b!=c){if(b<0||b>=n)return void this.oApi._fnLog(a,1,"ColReorder 'from' index is out of bounds: "+b);if(c<0||c>=n)return void this.oApi._fnLog(a,1,"ColReorder 'to' index is out of bounds: "+c);var p=[];for(g=0,h=n;g<h;g++)p[g]=g;e(p,b,c);var q=d(p);for(g=0,h=a.aaSorting.length;g<h;g++)a.aaSorting[g][0]=q[a.aaSorting[g][0]];if(null!==a.aaSortingFixed)for(g=0,h=a.aaSortingFixed.length;g<h;g++)a.aaSortingFixed[g][0]=q[a.aaSortingFixed[g][0]];for(g=0,h=n;g<h;g++){for(l=a.aoColumns[g],i=0,j=l.aDataSort.length;i<j;i++)l.aDataSort[i]=q[l.aDataSort[i]];m&&(l.idx=q[l.idx])}for(m&&$.each(a.aLastSort,function(b,c){a.aLastSort[b].src=q[c.src]}),g=0,h=n;g<h;g++)l=a.aoColumns[g],"number"==typeof l.mData?(l.mData=q[l.mData],a.oApi._fnColumnOptions(a,g,{})):$.isPlainObject(l.mData)&&(o(l.mData,"_",q),o(l.mData,"filter",q),o(l.mData,"sort",q),o(l.mData,"type",q),a.oApi._fnColumnOptions(a,g,{}));if(a.aoColumns[b].bVisible){var r=this.oApi._fnColumnIndexToVisible(a,b),s=null;for(g=c<b?c:c+1;null===s&&g<n;)s=this.oApi._fnColumnIndexToVisible(a,g),g++;for(k=a.nTHead.getElementsByTagName("tr"),g=0,h=k.length;g<h;g++)f(k[g],r,s);if(null!==a.nTFoot)for(k=a.nTFoot.getElementsByTagName("tr"),g=0,h=k.length;g<h;g++)f(k[g],r,s);for(g=0,h=a.aoData.length;g<h;g++)null!==a.aoData[g].nTr&&f(a.aoData[g].nTr,r,s)}for(e(a.aoColumns,b,c),e(a.aoPreSearchCols,b,c),g=0,h=a.aoData.length;g<h;g++){var t=a.aoData[g];m?(t.anCells&&e(t.anCells,b,c),"dom"!==t.src&&$.isArray(t._aData)&&e(t._aData,b,c)):($.isArray(t._aData)&&e(t._aData,b,c),e(t._anHidden,b,c))}for(g=0,h=a.aoHeader.length;g<h;g++)e(a.aoHeader[g],b,c);if(null!==a.aoFooter)for(g=0,h=a.aoFooter.length;g<h;g++)e(a.aoFooter[g],b,c);if(m){new $.fn.dataTable.Api(a).rows().invalidate()}for(g=0,h=n;g<h;g++)$(a.aoColumns[g].nTh).off("click.DT"),this.oApi._fnSortAttachListener(a,a.aoColumns[g].nTh,g);$(a.oInstance).trigger("column-reorder",[a,{iFrom:b,iTo:c,aiInvertMapping:q}])}};var g=function(a,f){"use strict";var g=function(b,c){var d;a.fn.dataTable.Api?d=new a.fn.dataTable.Api(b).settings()[0]:b.fnSettings?d=b.fnSettings():"string"==typeof b?a.fn.dataTable.fnIsDataTable(a(b)[0])&&(d=a(b).eq(0).dataTable().fnSettings()):b.nodeName&&"table"===b.nodeName.toLowerCase()?a.fn.dataTable.fnIsDataTable(b.nodeName)&&(d=a(b.nodeName).dataTable().fnSettings()):b instanceof jQuery?a.fn.dataTable.fnIsDataTable(b[0])&&(d=b.eq(0).dataTable().fnSettings()):d=b;var e=a.fn.dataTable.camelToHungarian;return e&&(e(g.defaults,g.defaults,!0),e(g.defaults,c||{})),this.s={dt:null,init:a.extend(!0,{},g.defaults,c),fixed:0,fixedRight:0,dropCallback:null,mouse:{startX:-1,startY:-1,offsetX:-1,offsetY:-1,target:-1,targetIndex:-1,fromIndex:-1},aoTargets:[]},this.dom={drag:null,pointer:null},this.s.dt=d.oInstance.fnSettings(),this.s.dt._colReorder=this,this._fnConstruct(),d.oApi._fnCallbackReg(d,"aoDestroyCallback",a.proxy(this._fnDestroy,this),"ColReorder"),this};return g.prototype={fnReset:function(){for(var a=[],b=0,c=this.s.dt.aoColumns.length;b<c;b++)a.push(this.s.dt.aoColumns[b]._ColReorder_iOrigCol);return this._fnOrderColumns(a),this},fnGetCurrentOrder:function(){return this.fnOrder()},fnOrder:function(a){if(a===c){for(var b=[],e=0,f=this.s.dt.aoColumns.length;e<f;e++)b.push(this.s.dt.aoColumns[e]._ColReorder_iOrigCol);return b}return this._fnOrderColumns(d(a)),this},_fnConstruct:function(){var a,b=this,c=this.s.dt.aoColumns.length;for(this.s.init.iFixedColumns&&(this.s.fixed=this.s.init.iFixedColumns),this.s.fixedRight=this.s.init.iFixedColumnsRight?this.s.init.iFixedColumnsRight:0,this.s.init.fnReorderCallback&&(this.s.dropCallback=this.s.init.fnReorderCallback),a=0;a<c;a++)a>this.s.fixed-1&&a<c-this.s.fixedRight&&this._fnMouseListener(a,this.s.dt.aoColumns[a].nTh),this.s.dt.aoColumns[a]._ColReorder_iOrigCol=a;this.s.dt.oApi._fnCallbackReg(this.s.dt,"aoStateSaveParams",function(a,c){b._fnStateSave.call(b,c)},"ColReorder_State");var e=null;if(this.s.init.aiOrder&&(e=this.s.init.aiOrder.slice()),this.s.dt.oLoadedState&&void 0!==this.s.dt.oLoadedState.ColReorder&&this.s.dt.oLoadedState.ColReorder.length==this.s.dt.aoColumns.length&&(e=this.s.dt.oLoadedState.ColReorder),e)if(b.s.dt._bInitComplete){var f=d(e);b._fnOrderColumns.call(b,f)}else{var g=!1;this.s.dt.aoDrawCallback.push({fn:function(){if(!b.s.dt._bInitComplete&&!g){g=!0;var a=d(e);b._fnOrderColumns.call(b,a)}},sName:"ColReorder_Pre"})}else this._fnSetColumnIndexes()},_fnOrderColumns:function(b){if(b.length!=this.s.dt.aoColumns.length)return void this.s.dt.oInstance.oApi._fnLog(this.s.dt,1,"ColReorder - array reorder does not match known number of columns. Skipping.");for(var c=0,d=b.length;c<d;c++){var f=a.inArray(c,b);c!=f&&(e(b,f,c),this.s.dt.oInstance.fnColReorder(f,c))}""===this.s.dt.oScroll.sX&&""===this.s.dt.oScroll.sY||this.s.dt.oInstance.fnAdjustColumnSizing(),this.s.dt.oInstance.oApi._fnSaveState(this.s.dt),this._fnSetColumnIndexes()},_fnStateSave:function(b){var c,d,e,f=this.s.dt,g=f.aoColumns;if(b.ColReorder=[],b.aaSorting){for(c=0;c<b.aaSorting.length;c++)b.aaSorting[c][0]=g[b.aaSorting[c][0]]._ColReorder_iOrigCol;var h=a.extend(!0,[],b.aoSearchCols);for(c=0,d=g.length;c<d;c++)e=g[c]._ColReorder_iOrigCol,b.aoSearchCols[e]=h[c],b.abVisCols[e]=g[c].bVisible,b.ColReorder.push(e)}else if(b.order){for(c=0;c<b.order.length;c++)b.order[c][0]=g[b.order[c][0]]._ColReorder_iOrigCol;var i=a.extend(!0,[],b.columns);for(c=0,d=g.length;c<d;c++)e=g[c]._ColReorder_iOrigCol,b.columns[e]=i[c],b.ColReorder.push(e)}},_fnMouseListener:function(b,c){var d=this;a(c).on("mousedown.ColReorder",function(a){a.preventDefault(),d._fnMouseDown.call(d,a,c)})},_fnMouseDown:function(d,e){var f=this,g=a(d.target).closest("th, td"),h=g.offset(),i=parseInt(a(e).attr("data-column-index"),10);i!==c&&(this.s.mouse.startX=d.pageX,this.s.mouse.startY=d.pageY,this.s.mouse.offsetX=d.pageX-h.left,this.s.mouse.offsetY=d.pageY-h.top,this.s.mouse.target=this.s.dt.aoColumns[i].nTh,this.s.mouse.targetIndex=i,this.s.mouse.fromIndex=i,this._fnRegions(),a(b).on("mousemove.ColReorder",function(a){f._fnMouseMove.call(f,a)}).on("mouseup.ColReorder",function(a){f._fnMouseUp.call(f,a)}))},_fnMouseMove:function(a){if(null===this.dom.drag){if(Math.pow(Math.pow(a.pageX-this.s.mouse.startX,2)+Math.pow(a.pageY-this.s.mouse.startY,2),.5)<5)return;this._fnCreateDragNode()}this.dom.drag.css({left:a.pageX-this.s.mouse.offsetX,top:a.pageY-this.s.mouse.offsetY});for(var b=!1,c=this.s.mouse.toIndex,d=1,e=this.s.aoTargets.length;d<e;d++)if(a.pageX<this.s.aoTargets[d-1].x+(this.s.aoTargets[d].x-this.s.aoTargets[d-1].x)/2){this.dom.pointer.css("left",this.s.aoTargets[d-1].x),this.s.mouse.toIndex=this.s.aoTargets[d-1].to,b=!0;break}b||(this.dom.pointer.css("left",this.s.aoTargets[this.s.aoTargets.length-1].x),this.s.mouse.toIndex=this.s.aoTargets[this.s.aoTargets.length-1].to),this.s.init.bRealtime&&c!==this.s.mouse.toIndex&&(this.s.dt.oInstance.fnColReorder(this.s.mouse.fromIndex,this.s.mouse.toIndex),this.s.mouse.fromIndex=this.s.mouse.toIndex,this._fnRegions())},_fnMouseUp:function(c){a(b).off("mousemove.ColReorder mouseup.ColReorder"),null!==this.dom.drag&&(this.dom.drag.remove(),this.dom.pointer.remove(),this.dom.drag=null,this.dom.pointer=null,this.s.dt.oInstance.fnColReorder(this.s.mouse.fromIndex,this.s.mouse.toIndex),this._fnSetColumnIndexes(),""===this.s.dt.oScroll.sX&&""===this.s.dt.oScroll.sY||this.s.dt.oInstance.fnAdjustColumnSizing(),null!==this.s.dropCallback&&this.s.dropCallback.call(this),this.s.dt.oInstance.oApi._fnSaveState(this.s.dt))},_fnRegions:function(){var b=this.s.dt.aoColumns;this.s.aoTargets.splice(0,this.s.aoTargets.length),this.s.aoTargets.push({x:a(this.s.dt.nTable).offset().left,to:0});for(var c=0,d=0,e=b.length;d<e;d++)d!=this.s.mouse.fromIndex&&c++,b[d].bVisible&&this.s.aoTargets.push({x:a(b[d].nTh).offset().left+a(b[d].nTh).outerWidth(),to:c});0!==this.s.fixedRight&&this.s.aoTargets.splice(this.s.aoTargets.length-this.s.fixedRight),0!==this.s.fixed&&this.s.aoTargets.splice(0,this.s.fixed)},_fnCreateDragNode:function(){var b=""!==this.s.dt.oScroll.sX||""!==this.s.dt.oScroll.sY,c=this.s.dt.aoColumns[this.s.mouse.targetIndex].nTh,d=c.parentNode,e=d.parentNode,f=e.parentNode,g=a(c).clone();this.dom.drag=a(f.cloneNode(!1)).addClass("DTCR_clonedTable").append(e.cloneNode(!1).appendChild(d.cloneNode(!1).appendChild(g[0]))).css({position:"absolute",top:0,left:0,width:a(c).outerWidth(),height:a(c).outerHeight()}).appendTo("body"),this.dom.pointer=a("<div></div>").addClass("DTCR_pointer").css({position:"absolute",top:b?a("div.dataTables_scroll",this.s.dt.nTableWrapper).offset().top:a(this.s.dt.nTable).offset().top,height:b?a("div.dataTables_scroll",this.s.dt.nTableWrapper).height():a(this.s.dt.nTable).height()}).appendTo("body")},_fnDestroy:function(){var b,c;for(b=0,c=this.s.dt.aoDrawCallback.length;b<c;b++)if("ColReorder_Pre"===this.s.dt.aoDrawCallback[b].sName){this.s.dt.aoDrawCallback.splice(b,1);break}a(this.s.dt.nTHead).find("*").off(".ColReorder"),a.each(this.s.dt.aoColumns,function(b,c){a(c.nTh).removeAttr("data-column-index")}),this.s.dt._colReorder=null,this.s=null},_fnSetColumnIndexes:function(){a.each(this.s.dt.aoColumns,function(b,c){a(c.nTh).attr("data-column-index",b)})}},g.defaults={aiOrder:null,bRealtime:!1,iFixedColumns:0,iFixedColumnsRight:0,fnReorderCallback:null},g.version="1.1.2",a.fn.dataTable.ColReorder=g,a.fn.DataTable.ColReorder=g,"function"==typeof a.fn.dataTable&&"function"==typeof a.fn.dataTableExt.fnVersionCheck&&a.fn.dataTableExt.fnVersionCheck("1.9.3")?a.fn.dataTableExt.aoFeatures.push({fnInit:function(a){var b=a.oInstance;if(a._colReorder)b.oApi._fnLog(a,1,"ColReorder attempted to initialise twice. Ignoring second");else{var c=a.oInit,d=c.colReorder||c.oColReorder||{};new g(a,d)}return null},cFeature:"R",sFeature:"ColReorder"}):alert("Warning: ColReorder requires DataTables 1.9.3 or greater - www.datatables.net/download"),a.fn.dataTable.Api&&(a.fn.dataTable.Api.register("colReorder.reset()",function(){return this.iterator("table",function(a){a._colReorder.fnReset()})}),a.fn.dataTable.Api.register("colReorder.order()",function(a){return a?this.iterator("table",function(b){b._colReorder.fnOrder(a)}):this.context.length?this.context[0]._colReorder.fnOrder():null})),g};"function"==typeof define&&define.amd?define(["jquery","datatables"],g):"object"==typeof exports?g(require("jquery"),require("datatables")):jQuery&&!jQuery.fn.dataTable.ColReorder&&g(jQuery,jQuery.fn.dataTable)}(window,document);