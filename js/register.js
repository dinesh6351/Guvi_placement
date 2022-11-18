var signup = document.querySelector("#register");
signup.addEventListener("click", function(event){
  event.preventDefault();
  alert("Please Provide all  ")
              let user_name= document.getElementById('user_username') 
              let user_email= document.getElementById('user_email') 
              var dob= document.getElementById('user_birthday') 
              
                var pwd= document.getElementById('user_password')   
                var cpwd= document.getElementById('conf_user_password') 
				var address =document.getElementById('user_address')
				var number= document.getElementById('user_contact')   

                var formData = new FormData($('#myform')[0])
                

                if (user_name !=''&& user_email != '' && dob !=''&& address !=''&& number != ''&& pwd != '' && cpwd!='')
                {
                  $.ajax({
                  type: 'post',
                  url: './php/register.php',
                  data: formData,
                  contentType:false,
                  processData:false,
                  success:function(response){
                    console.log(response);
                  }
                         })     
     }

          else{
            alert("Please Provide all Information ")
          };
        
        });