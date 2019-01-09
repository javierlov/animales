$("#razas").change(function(event){
   $.get("razas/"+event.target.value+"",function(response, raza){
       console.log(response);
       
       $("#razas").empty();
       for(i=0; i<response.length ;i++){
           $("#razas").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
       }
   }
   ); 
});
