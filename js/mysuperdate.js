// superdate

var mydate=new Date() 
var year=mydate.getYear() 
if (year < 1000) 
year+=1900 
var day=mydate.getDay() 
var month=mydate.getMonth() 
var daym=mydate.getDate() 
if (daym<10) 
daym="0"+daym
var hours=mydate.getHours()
if (hours<10) 
hours="0"+hours
var minutes=mydate.getMinutes()
if (minutes<=9)
minutes="0"+minutes
var amp="AM"
if(hours<12)
var amp="AM"
if(hours>12)
amp= "PM"

var dayarray=new Array("Domingo,","Lunes,","Martes,","Miércoles,"," Jueves,","Viernes,","Sábado,") 
var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")
document.write(""+daym+" de "+montharray[month]+" de "+year+" | "+hours+":"+minutes+" "+amp+"") 


