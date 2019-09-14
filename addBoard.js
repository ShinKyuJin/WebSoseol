
function submitForm(f) {
  var extArray = new Array('hwp','xls','doc','xlsx','docx','pdf','jpg','gif','png','txt','ppt','pptx');
  var path = $('.boardFile').val();
  if(!path) {
    return false;
  }
  var pos = path.indexOf(".");
  if(pos < 0) {
    return false;
  }

  var ext = path.slice(pos + 1).toLowerCase();
  var checkExt = false;
  
  for(var i=0; i<extArray.length; i++) {
    if(ext == extArray[i])
      checkExt = true;
  }

  if(!checkExt) return false;

  $_FILES['boardFile'] = path;

  return true;
}
