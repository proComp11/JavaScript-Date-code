// function for change general request date 
    function changeDateGen(){
        var dateOne = $('#dateOfActivation').val();
        console.log(dateOne);
        var fDate = addDays(dateOne,60); // date extract after 60 days
        fDate = String(fDate);
        var date = new Date(fDate.replace('IST', ''));
        let day = date.getDate();
        let month = date.getMonth()+1;
        let year = date.getFullYear();
        let fmonth = String(month);
        let fday = String(day);
        var newDatefrm= "";
        if(fmonth.length == 1 && fday.length == 1){
            newDatefrm = year+"-0"+fmonth+"-0"+day ;
        }else if(fmonth.length == 1 && fday.length > 1){
            newDatefrm = year+"-0"+fmonth+"-"+day ;
        }else if(fmonth.length > 1 && fday.length == 1){
            newDatefrm = year+"-"+fmonth+"-0"+day ;
        }else{
            newDatefrm = year+"-"+fmonth+"-"+day ;
        }
        console.log(newDatefrm);
        $('#dateOfDisconnection').val(newDatefrm);
    }

    function changeDateUrgent(){
        var urgentDate = $('#urgentDateOfActivation').val();
        console.log("Urgent Date field value " + urgentDate);
        var fDate = addDays(urgentDate,60); // date extract after 60 days
        fDate = String(fDate);
        var date = new Date(fDate.replace('IST', ''));
        let day = date.getDate();
        let month = date.getMonth()+1;
        let year = date.getFullYear();
        let fmonth = String(month);
        let fday = String(day);
        var newDatefrm= "";
        if(fmonth.length == 1 && fday.length == 1){
            newDatefrm = year+"-0"+fmonth+"-0"+day ;
        }else if(fmonth.length == 1 && fday.length > 1){
            newDatefrm = year+"-0"+fmonth+"-"+day ;
        }else if(fmonth.length > 1 && fday.length == 1){
            newDatefrm = year+"-"+fmonth+"-0"+day ;
        }else{
            newDatefrm = year+"-"+fmonth+"-"+day ;
        }
        console.log("urgent date format after 60 days " + newDatefrm);
        $('#urgentDateOfDisconnection').val(newDatefrm);
    }

    function addDays(date, days) {
        var result = new Date(date);
        result.setDate(result.getDate() + days);
        return result;
    }
