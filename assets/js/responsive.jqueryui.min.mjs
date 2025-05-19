/*! jQuery UI integration for DataTables' Responsive
 * © SpryMedia Ltd - datatables.net/license
 */
import jQuery from"jquery";import DataTable from"datatables.net-jqui";import Responsive from"datatables.net-responsive";let $=jQuery;var _display=DataTable.Responsive.display,_original=_display.modal;_display.modal=function(r){return function(a,e,i,t){var o;return $.fn.dialog?!1!==(o=i())&&!e&&($("<div/>").append(o).appendTo("body").dialog($.extend(!0,{close:t,title:r&&r.header?r.header(a):"",width:500},r.dialog)),!0):_original(a,e,i,t)}};export default DataTable;