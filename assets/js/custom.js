$(document).ready(function () {
   // ====================================
   //   Employee list Data Search script 
   // ====================================
   $("#search").on("input", function () {
      var value = $(this).val().toLowerCase();
      $("#emp-table tr").filter(function () {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
   });
   // ================================
   //   Start Employee data Submit  
   // ================================
   $(".btn button").click(function(){
      var fd = new FormData();

      var files = $('#file')[0].files;

      // Check file selected or not
      if(files.length > 0 ){

         fd.append('file',files[0]);

         // ===================================
         //   Send Ajax Request upload image  
         // ===================================
         $.ajax({
            url:'./upload.php',
            type:'post',
            data:fd,
            contentType: false,
            processData: false,
            success:function(result){
                if(result != 0){
                     // ======================================
                     //   All Input Data Value set Variable 
                     // ======================================

                     let nameValue = $("#emp_name").val();
                     let emailValue = $("#email").val();
                     let compValue = $("#company").val();
                     let addressValue = $("#address").val();
                     let cityValue = $("#cityname").val();
                     let stateValue = $("#statename").val();
                     let countryValue = $("#countryname").val();
                     if (nameValue!="" && emailValue!="" && compValue!="" && addressValue!="" && cityValue!="" && stateValue!="" && countryValue!="")
                     {
                        let data = "id="+result.id+"&name="+nameValue+"&email="+emailValue+"&company="+compValue+"&address="+addressValue+"&city="+cityValue+"&state="+stateValue+"&country="+countryValue;

                        // =====================================
                        //   Send Ajax Request submit all data  
                        // =====================================
                        $.ajax({
                           url: './store_data.php',  
                           type: 'POST',
                           data: data,
                           success: function(responce)
                           {
                              $("select option:first").attr("selected","selected");
                              $("input").val("");
                              $("#emp-table").empty();
                              for(let i=0; i<responce.length;i++)
                              {
                                 $("#emp-table").append("<tr><td>"+(i+1)+"</td><td><img src='"+responce[i].image_add+"' alt='Profile Image' class='pro_img'></td><td>"+responce[i].name+"</td><td>"+responce[i].email+"</td><td>"+responce[i].company+"</td><td>"+responce[i].address+"</td><td>"+responce[i].city+"</td><td>"+responce[i].state+"</td><td>"+responce[i].country+"</td></tr>");
                              }
                           }
                        });
                     }
                }
                else
                {
                    alert('File not uploaded');
                }
            }
        });
      }
      else
      {
        alert("Please select a file.");
      }      
   });
   // ================================
   //    End Employee data Submit
   // ================================
});