     function format_number (){
    $('#luongcoban').keyup(function(){
    	var number =$('#luongcoban').val();
    	$('#luongcoban').val(number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 "));
    });
     $('#luongcoban').keydown(function(){
     	var number =$('#luongcoban').val();
    	number= number.toString().replace(/\s+/g,"");
    	$('#luongcoban').val(number);
    });
};
