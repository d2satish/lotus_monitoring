window.onload = function() 
{
    "use strict";
    
    var    month, day, setDay, setDate, setMonth,
           setHours, setMinutes, setSeconds, amPm, $;
    
    month =  ['January', 'February', 'March', 'April',
             'May', 'June', 'July', 'August', 'September',
             'October', 'November', 'December']
             
    day =    ['Sunday', 'Monday', 'Tuesday', 'Wednesday',
             'Thursday', 'Friday', 'Saturday']
                
    
    function twelveHourTime()
    {
        setDay = new Date().getDay();
        setDate = new Date().getDate();
        setMonth = new Date().getMonth();
        setHours = new Date().getHours();
        setMinutes = new Date().getMinutes();
        setSeconds = new Date().getSeconds();
        
        $ = document.getElementById.bind(document);
        
        //hours
        if (setHours > 9) 
        {
            if (setHours == 12) 
            {
                $("h").innerHTML = setHours + ":";
                $("am-pm").innerHTML = "PM";
            } 
            else if (setHours > 12 && setHours < 22) 
            {
                $("h").innerHTML = "0" + (setHours - 12) + ":";
                $("am-pm").innerHTML = "PM";
            }
            else if (setHours > 21 && setHours <= 23) 
            {
                $("h").innerHTML = (setHours - 12) + ":";
                $("am-pm").innerHTML = "PM";
            }
            else if (setHours > 9 && setHours < 12) 
            {
                $("h").innerHTML = setHours + ":";
                $("am-pm").innerHTML = "AM";
            }
        } else {
            if (setHours == 0)
            {
                $("h").innerHTML = (setHours + 12) + ":";
                $("am-pm").innerHTML = "AM";
            }
            else if (setHours < 10 && setHours != 0) 
            {
                $("h").innerHTML = "0" + setHours + ":";
                $("am-pm").innerHTML = "AM";
            }
        }
        
        //minutes
        if (setMinutes < 10)
            $("m").innerHTML = "0" + setMinutes;
        else
            $("m").innerHTML = setMinutes;
        
        //seconds
        if (setSeconds < 10)
            $("s").innerHTML = "0" + setSeconds;
        else
            $("s").innerHTML = setSeconds;
        
        //day of the week
        switch (setDay) {
            case 0:
                setDay = day[0];
                break;
            case 1:
                setDay = day[1];
                break;
            case 2:
                setDay = day[2];
                break;
            case 3:
                setDay = day[3];
                break;
            case 4:
                setDay = day[4];
                break;
            case 5:
                setDay = day[5];
                break;
            default:
                setDay = day[6];
        }
        
        //month
        switch (setMonth) {
            case 0:
                setMonth = month[0];
                break;
            case 1:
                setMonth = month[1];
                break;
            case 2:
                setMonth = month[2];
                break;
            case 3:
                setMonth = month[3];
                break;
            case 4:
                setMonth = month[4];
                break;
            case 5:
                setMonth = month[5];
                break;
            case 6:
                setMonth = month[6];
                break;
            case 7:
                setMonth = month[7];
                break;
            case 8:
                setMonth = month[8];
                break;
            case 9:
                setMonth = month[9];
                break;
            case 10:
                setMonth = month[10];
                break;
            default:
                setMonth = month[11];
        }
        
        //set date
        if (setDate < 10)
            $("date").innerHTML = setDay + " 0" + setDate + 
                " " + setMonth;
        else
            $("date").innerHTML = setDay + " " + setDate +
                " " + setMonth;
    }
    setTimeout(twelveHourTime, -1000);
    setInterval(twelveHourTime, 1000);
}




var message="Sorry dude!!! This is purely for lotusbroadband only!";

function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}
function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}
if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("alert(message);return false")