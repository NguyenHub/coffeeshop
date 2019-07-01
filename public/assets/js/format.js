function format_datetime(datetime)
    {
      var date=new Date(datetime);
      return  date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear()+" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
      //console.log(ngay);
    }