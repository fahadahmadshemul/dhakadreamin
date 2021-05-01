

$('documet').ready(function(){
    $('body').on('blur', '#owner_id', function(){
        var id = $(this).val();
        $('#show_error').html('');
        $.ajax({
          url: 'owner_id_check/'+id,
          method: 'get',
          success: function(result){
            console.log(result);
            if(result.id != null){
              $('#show_error').html('Applicant Code Already Taken...!');
            
              $(".show_owner_error").addClass('error_from');
            }else{
              $('#show_error').html('');
              $(".show_owner_error").removeClass('error_from');
            }
          }
        });
      });
      
      //========PaymentProcessStatus status==============
      $('body').on('change', '#PaymentProcessStatus', function(){
        var id = $(this).attr('data-id');
        if(this.checked){
          var status = 0;
        }else{
          var status = 1;
        }
    
        $.ajax({
          url: 'PaymentProcessStatus/'+id+'/'+status,
          method: 'get',
          success: function(result){
            console.log(result);
          }
        });
      });
      //========change category status==============
      $('body').on('change', '#vehicle_cat', function(){
        var id = $(this).val();
        $('#car_price_get').val();
        $.ajax({
          url: 'vehicle_price_get/'+id,
          method: 'get',
          success: function(result){
            $('#car_price_get').val(result.car_price);
            console.log(result);
          }
        });
      });

      
    //!prefer_time_from prefer_time_to
    

      //========change Slider status==============
      $('body').on('change', '#sliderStatus', function(){
        var id = $(this).attr('data-id');
        if(this.checked){
          var status = 0;
        }else{
          var status = 1;
        }
    
        $.ajax({
          url: 'sliderStatus/'+id+'/'+status,
          method: 'get',
          success: function(result){
            console.log(result);
          }
        });
      });
      //========change Banner status==============
      $('body').on('change', '#bannerStatus', function(){
        var id = $(this).attr('data-id');
        if(this.checked){
          var status = 0;
        }else{
          var status = 1;
        }
    
        $.ajax({
          url: 'bannerStatus/'+id+'/'+status,
          method: 'get',
          success: function(result){
            console.log(result);
          }
        });
      });
      //========change Blog status==============
      $('body').on('change', '#blogStatus', function(){
        var id = $(this).attr('data-id');
        if(this.checked){
          var status = 0;
        }else{
          var status = 1;
        }
    
        $.ajax({
          url: 'blogStatus/'+id+'/'+status,
          method: 'get',
          success: function(result){
            console.log(result);
          }
        });
      });

      $('body').on('change', '#cat_id', function(){
        var id = $(this).val();
        $('#dropDownDest option').remove();
        $.ajax({
          url: 'http://127.0.0.1:8000/category/subCategory/'+id,
          method: 'get',
          success: function(result){
            $.each(result, function (key, value) {
              $("#dropDownDest").append($('<option></option>').val(value.id).html(value.sub_cat));
          });
            console.log(result.cat_id);
          }
        });
      });
      
});