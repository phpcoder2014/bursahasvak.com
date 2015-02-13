//***************  SAAT  **************** //
function clock(){
 var Doit=new Date();
 var time=Doit.getHours();
 var minutt=Doit.getMinutes();
 var sekund=Doit.getSeconds();
 if (minutt<=9) minutt="0"+minutt ;
 if (sekund<=9) sekund="0"+sekund;

klokkami=time+":"+minutt+":"+sekund;
saat2.innerHTML=klokkami;
setTimeout("clock()",1000);
}
//***************  SAAT BITIS  *************** //

//***************  Mail Baþlangýç  *************** //
function BosDegerKontrolu(Kontrolismi)
{
	if (Kontrolismi.value!='')
	{return false;	}
	else
	{return true;}
}

function DegerKontrolu(Kontrolismi)
{
	if (Kontrolismi.value!='0')
	{return false;	}
	else
	{return true;}
}

function UzunlukKontrolu(Kontrolismi)
{
	var a =new String;
	a=Kontrolismi.value;
	if (a.lengtd<4)
	{return true;	}
	else
	{return false;}
}

function IcerikKontrolu(Kontrolismi,varChar)
{
	var a = new String;
	a=Kontrolismi.value;
	if (a.length<=5)
	{return true;}

	for (var i=3;i<=a.length+1;i++)
	{
		if (a.substr(i,1)==varChar)
		{return false;}
	}
	return true;

}

function MesajGoruntule(Mesaj)
{
	mesaj.style.color="red";
	mesaj.innerHTML +='<font color=blue>*</font>&nbsp;' + Mesaj+ '<br>';
}
//***************  Mail Bitiþ  *************** //
var a,b,resim=99;
function rauf(adet,Name)
{
resim=adet;
this.document.resim1.src=Name;
}

function klick()
{
if (resim==99)
return;
if (resim==1)
location.href="#";  
if (resim==2)
location.href="#";
if (resim==3)
location.href="#";
}

// alan kontrol
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.lengtd) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.lengtd;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.lengtd;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.lengtd-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.lengtd-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+duzelt(nm)+' Alani Gerekli.\n'; }
  } if (errors) alert('Asagidaki hata(lar) olustu:\n\n'+errors);
  document.MM_returnValue = (errors == '');
}
// resim boyutlari
function openPictureWindow_Fever(imageName,imageWidth,imageHeight,alt,posLeft,posTop) {
	newWindow = window.open("","newWindow","width="+imageWidth+",height="+imageHeight+",left="+posLeft+",top="+posTop);
	newWindow.document.open();
	newWindow.document.write('<html><title>'+alt+'</title><body bgcolor="#e6e6e6" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" onBlur="self.close()">'); 
	newWindow.document.write('<table width="'+imageWidth+'" Height="'+imageHeight+'" border="0" cellspacing="0" cellpadding="0"><tr><td align="center" valign="middle">'); 
	newWindow.document.write('<img src='+imageName+' alt='+alt+' align="absmiddle">'); 
	newWindow.document.write('</td></tr></table></body></html>');
	newWindow.document.close();
	newWindow.focus();
}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function popimage(imagesrc,winwidth,winheight,yazi){
var look='width='+winwidth+',height='+winheight+',scrollbars=yes'
popwin=window.open("","",look)
popwin.document.open()
popwin.document.write('<title>Gömeç Belediyesi Bülten</title><body leftmargin="0" topmargin="0"><p align="center"><img src="'+imagesrc+'"><p align="center"><font face="Times New Roman"><strong><font color="#008000"> '+yazi+' </font></strong></font> </body>')
popwin.moveTo(0,0)
popwin.document.close()
}
function ValidateForm(fm)
{
var msgtext="";

if (fm.ara.value=="") msgtext+=" " ;
if (msgtext.length>0)
{
msgtext= "Aradiginiz ürünün kodu yada açiklamasini yazmadiniz » »\n\n" + msgtext+"\n"
alert (msgtext);
return false
}
return true
}