var addWb = new Object();
addWb.comment = function(){
	alert("A");
}()

var addListener = function(elm, type, func) {
  if(! elm) { return false; }
  if(elm.addEventListener) { /* W3C���֥饦���� */
    elm.addEventListener(type, func, false);
  } else if(elm.attachEvent) { /* Internet Explorer�� */
    elm.attachEvent('on'+type, func);
  } else {
    return false;
  }
  return true;
};

addListener(window,"load","function(){
	addListener(document.getElementById("INPUT_COMMENT"),"change",addWb.comment);
}");
