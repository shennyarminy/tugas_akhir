function updateSubcriteria() {
 let criteria_id =  $("#criteria_id").val()
 $("#nama_subcriteria").children().remove()
 $("#nama_subcriteria").val('');
 $("#nama_subcriteria").append(`<option value="">--Pilih Subkriteria--</option>`);
 $("#nama_subcriteria").prop('disabled',true)
  if (criteria_id!='' && criteria_id!=null) {
    $.ajax({
       url: '/list_subcriteria/'+criteria_id,
       type: "GET",
       dataType: "json",
       success:function(res){
          
         $("#nama_subcriteria").prop('disabled',false)
         let tampilan_option = '';
         $.each(res,function(index,data){
           tampilan_option+=`<option value="${data.id}">${data.nama_subcriteria}</option>`
          })
          $("#nama_subcriteria").append(tampilan_option)
       }
    });
    
  }
  
  
  
}

function updateItem() {
  let namasubcriteria = $("#nama_subcriteria").val();
  console.log(namasubcriteria)
}