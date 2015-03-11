var imageselectboxactive=false;var displayingbox=false;function documentEvent(e)
{if(e.type=='click')
{if(displayingbox)
{imageselectboxactive=true;displayingbox=false;e.returnValue=false;return false;}
else
{if(imageselectboxactive)
{hideAllImageSelectBoxes();imageselectboxactive=false;e.returnValue=false;return false;}}}
if(window.routeEvent)window.routeEvent(e);if(e)return e.returnValue;}
if(document.attachEvent)
{document.attachEvent('onclick',documentEvent);}
else if(window.addEventListener)
{window.addEventListener('click',documentEvent,false);}
else if(document.addEventListener)
{document.addEventListener('click',documentEvent,false);}
else
{document.captureEvents(Event.CLICK);document.onclick=documentEvent;}
function displayImageSelectBox(uleltid)
{if(!imageselectboxactive)
{displayingbox=true;var ulelt=document.getElementById(uleltid);var lielts;if(ulelt)
{if(ulelt.className=="imagepulldown")ulelt.className="imagepulldown_show";}}
else
{hideAllImageSelectBoxes();}
return false;}
function hideAllImageSelectBoxes()
{if(imageselectboxactive)
{var ulelts=document.getElementsByTagName('ul');if(ulelts)
{for(i=0;i<ulelts.length;i++)
{if(ulelts[i].className=="imagepulldown_show")
{ulelts[i].className="imagepulldown";}}}
imageselectboxactive=false;}}
function changeValueImageSelectBox(imageselectboxid,ivalue)
{var ulelt=document.getElementById('i'+imageselectboxid+'data');var inputelt=document.getElementById('i'+imageselectboxid);var selectdiv=document.getElementById('i'+imageselectboxid+'selected');var lielts,lielt,hrefelt;if(ulelt)
{lielts=ulelt.getElementsByTagName('li');if(lielts)
{lielt=lielts[ivalue];if(lielt)
{hrefelt=lielt.childNodes[0];if(hrefelt&&hrefelt.href)
{inputelt.value=hrefelt.href;}
if(selectdiv)
{selectdiv.childNodes[2].innerHTML=hrefelt.innerHTML;}}}}}
function changePulldownText(optionsvalue,optionstext,selectid)
{var selelt=document.getElementById(selectid);if(selelt)
{selelt.innerHTML=optionstext;}}
function checkSmallCheckbox(chkbx)
{if(chkbx)
{var chkbxwrap=chkbx.parentNode;if(chkbxwrap)
{if(chkbx.checked)
{chkbxwrap.className='checkboxwrappersmall checked';}
else
{chkbxwrap.className='checkboxwrappersmall';}}}}
function checkCheckbox(chkbx)
{if(chkbx)
{var chkbxwrap=chkbx.parentNode;if(chkbxwrap)
{if(chkbx.checked)
{chkbxwrap.className='checkboxwrapper checked';}
else
{chkbxwrap.className='checkboxwrapper';}}}}
function checkRadiobutton(rdbttn,tocheckvalue)
{if(rdbttn)
{var inpts=document.getElementsByTagName('input');if(inpts&&inpts.length>0)
{var i;for(i=0;i<inpts.length;i++)
{if(rdbttn.name==inpts[i].name)
{var inppar=inpts[i].parentNode;if(inppar&&inppar.className=='radiobuttonwrapper checked')
{inppar.className='radiobuttonwrapper';}}}}
var rdbttnwrap=rdbttn.parentNode;if(rdbttnwrap)
{if(rdbttn.checked)
{rdbttnwrap.className='radiobuttonwrapper checked';}
else
{rdbttnwrap.className='radiobuttonwrapper';}}}}
function checkRadioButtonById(rdbttn,tocheckvalue)
{$("input[name=''customerdeliveryarea]").parent().removeClass('checked');$('#'+rdbttn).parent().addClass('checked');$('#'+rdbttn).prop('checked',true);}