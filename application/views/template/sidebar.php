<style>
#idx-calendar {
    margin: 0 auto;
    max-width: 500px;
    text-align: center;
    width: 100%;
} 
#idx-calendar div > ul {
    list-style: none ;
    background-color: #333333;
    margin: 0;
    padding: 0 10px;
}
#idx-calendar #dayNames > ul {
    background-color: #232323;
}
#idx-calendar ul li {
    color: #FFFFFF;
    float: left;
    font-family: Tahoma;
    font-weight: inherit;
}
#dayNames ul li {
    font-weight: bold;
    margin: 2% 0;
    padding: 3% 0;
    width: 14.2857%;
}
#daysNum ul li:hover {
    background-color: #232323;
}
#daysNum ul li {
    padding: 2.5% 0;
    width: 14.2857%;
}
#dayNames,#daysNum {
    clear: both;
    width: 100%;
}
#dayNames:after,#daysNum:after,#idx-calendar div > ul:after  {
    content: "";
    display: table;
    clear: both;
}
#idx-calendar div > ul li:first-child {
    color: #F05558;
    font-weight: bold;
}
#idx-calendar li.dayNow {
    color: #0084B4 !important;
    font-weight: bold;
    background-color: #232323;
    position: relative;
    z-index: 2;
}
.monthNow {
    color: #0084B4;
    font-family: arial;
    font-size: 40px;
    text-align: left;
}
#monthNow {
    background-color:#4188D0;
    font-family: serif;
	font-size:small;
    font-weight: bold;
    color: #FFFFFF;
    padding: 20px;
    text-transform: uppercase;
}
#calendar-control {
    position: relative;
}
#nextMonth, #prevMonth {
    transition:0.5s;
    background-color: #232323;
    color: #FFFFFF;
    font-family: verdana;
    height: 100%;
    position: absolute;
    right: 0;
    text-transform: uppercase;
    top: 0;
    width: 60px;
}
#prevMonth{
    left: 0;            
}
#prevMonth:before, #nextMonth:before {
    background-color: #4188D0;
    border-radius: 50%;
    transition:0.5s;
    border-right: 1px solid #FFFFFF;
    border-top: 1px solid #FFFFFF;
    content: "";
    display: block;
    height: 20px;
    left: 20px;
    position: relative;
    top: 18px;
    transform: rotate(45deg);
    width: 20px;
}
#prevMonth:before{
    transform: rotate(-135deg);
}
#nextMonth:hover, #prevMonth:hover{
    background-color: transparent;
}
#nextMonth:hover:before, #prevMonth:hover:before{
    border-radius: 0%;
}
</style>

<div  class="widget widget_tt_popular_post">
                            <div class="tt-popular-post border-bottom-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tt-popular-post-tab1" data-toggle="tab" aria-expanded="true">Kalender</a>
                                    </li>
                                    
                                </ul>

                                <!-- Tab panes -->
                                
                                <div class="tab-content">
                                
                                <!--KALENDER-->
                                <div id="idx-calendar">
                                 <div id="calendar-control">
                                  <div id="monthNow">Januari 2014</div>
                                  <div id="nextMonth"></div>
                                  <div id="prevMonth"></div>
                                 </div>
                                 <div id="dayNames">
                                  <ul>
                                   <li>M</li>
                                   <li>S</li>
                                   <li>S</li>
                                   <li>R</li>
                                   <li>K</li>
                                   <li>J</li>
                                   <li>S</li>
                                  </ul>
                                 </div>
                                 <div id="daysNum">
                                 </div>
                                </div>
					<!--END OF CALENDER-->
                                
                                </div>
                                
                                <!-- /.tab-content -->
                            </div><!-- /.tt-popular-post -->
                          </div>
                          
 <script>
 
function displayCalendar(month, year){
    
    var monthNow = new Date().getMonth();
    var yearNow = new Date().getFullYear();;
    var nextMonth = month+1;
    var prevMonth = month-1;
    var day = 0;
    
    if((month == monthNow)&&(year == yearNow)){
        var day = new Date().getDate();
    }
    
    var htmlContent ="";
    var FebNumberOfDays ="";
    var counter = 1;
    var Nameday = 1;
    
    if (month == 1){
        if ( (year%100!=0) && (year%4==0) || (year%400==0)){
            FebNumberOfDays = 29;
            }else{
            FebNumberOfDays = 28;
        }
    }
    
    var monthNames = ["January","February","March","April","May","June","July","August","September","October","November", "December"];
    var monthNum = ["1","2","3","4","5","6","7","8","9","10","11", "12"];
    var dayNames = ["Sunday","Monday","Tuesday","Wednesday","Thrusday","Friday", "Saturday"];
    var dayPerMonth = ["31", ""+FebNumberOfDays+"","31","30","31","30","31","31","30","31","30","31"]
    var nextDate = new Date(nextMonth +' 1 ,'+year);
    var weekdays = nextDate.getDay();
    var weekdays2 = weekdays
    var numOfDays = dayPerMonth[month];
                                    
    while (weekdays>0){
    htmlContent += "<li style='padding:1 0 0;'></li>";
        weekdays--;
    }
    
    while (counter <= numOfDays){
        
        if (weekdays2 > 6){
            weekdays2 = 0;
            htmlContent += "</ul><ul>";
        }
        if (counter == day){
            htmlContent +="<li class='dayNow'>"+counter+"</li>";
            Nameday = counter;
            }else{
            htmlContent +="<li>"+counter+"</li>";
        }
        weekdays2++;
        counter++;
    }
    
    document.getElementById("monthNow").innerHTML= monthNames[month]+" "+ year ;
    document.getElementById("daysNum").innerHTML= "<ul id="+monthNum[month]+" class="+year+">"+htmlContent+"</ul>";
}


(function() {
    var dateNow = new Date();
    var month = dateNow.getMonth();
    var year = dateNow.getFullYear();
    displayCalendar(month,year)
})(window);


document.getElementById("nextMonth").onclick = function(){
    var idmonth = document.getElementById("daysNum");
    var month = idmonth.getElementsByTagName("ul")[0].id;
    var nextYear = idmonth.getElementsByTagName("ul")[0].className;
    var nextMonth = Number(month);
    if(nextMonth == 12){
        nextMonth = 0;
        nextYear = Number(nextYear) + 1
    }
    displayCalendar(nextMonth,nextYear);
}


document.getElementById("prevMonth").onclick = function(){
    var idmonth = document.getElementById("daysNum");
    var month = idmonth.getElementsByTagName("ul")[0].id;
    var prevYear = idmonth.getElementsByTagName("ul")[0].className;
    var prevMonth = Number(month) - 2;
    if(prevMonth < 0 ){
        prevMonth = 11;    
        prevYear = Number(prevYear) - 1
    }
    displayCalendar(prevMonth,prevYear);
}
 </script>