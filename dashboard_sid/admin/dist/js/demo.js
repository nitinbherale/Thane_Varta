 function success_message(title,type,text,url) {
	 	swal({   
			title: title,   
             type: type, 
			text: text,
			confirmButtonColor: "#8BC34A", 
			confirmButtonText: "OK"  
        },function(isConfirm){
  if (isConfirm) {
    window.location.href = url;
  }
});
        return false;
	 }
	  function my_function(title) {
	 	 swal({   
			title: title,   
            confirmButtonColor: "#2196F3",   
        });
		return false;
	 }