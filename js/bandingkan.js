function setValueKeInput(id, merek, type){
	// console.log(id, merek, type)
	if($("#banding_1").val() == ''){
		$("#banding_1").val(merek + " " + type);
	}else{
		$("#banding_2").val(merek + " " + type);
	}
	
}