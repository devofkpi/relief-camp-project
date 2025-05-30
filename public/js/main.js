
$(window).on('load',function(e) {
	var toastr_msg=$('#edit_msg').text();
	if(toastr_msg){
	  toastr.success(toastr_msg);
	}
});

$(window).on('load',function(e) {
	var toastr_msg=$('#edit_msg1').text();
	if(toastr_msg){
	  toastr.error(toastr_msg);
	}
});

$('a[id^=delete_nodal_officer]').on('click',function(e){
	var url=$(this).attr('href');
	console.log(url);
	$('#delete_modal').attr('href',url);
});

$('a[id^=delete_inmate]').on('click',function(e){
    var url=$(this).attr('href');
    console.log(url);
    $('#delete_modal').attr('href',url);
  });

  $('a[id^=delete_relief_camp]').on('click',function(e){
    var url=$(this).attr('href');
    console.log(url);
    $('#delete_modal').attr('href',url);
  });

  $('a[id^=delete_user]').on('click',function(e){
    var url=$(this).attr('href');
    console.log(url);
    $('#delete_modal').attr('href',url);
  });

$('#sub_division').on('change',function(e){
  console.log($(this).val());
  $('#camp_code_slug').text($(this).val()+'-');
});


$('#user_role').on('change',function(e){
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
    var user_role=$(this).val();
    var ajax_url=$('#ajax_url').val();
    if(user_role=='moderate_user')
    {
      var selectOption='<option value="" selected>--Please Select Sub Division--</option>';
    }else{
      var selectOption='<option value="" selected>--Please Select Nodal Officer--</option>';
    }
    $.ajax({
      type:"POST",
      url:ajax_url,
      data:{'user_role':user_role},
      dataType:'json',
      success:function(data){
        $.each(JSON.parse(data),function(index,value){
          if(user_role=='moderate_user'){
            selectOption+='<option value="'+value.id+'">'+value.sub_division_name.charAt(0).toUpperCase() + value.sub_division_name.slice(1)+'</option>';
          }else{
            selectOption+='<option value="'+value.id+'">'+value.officer_name.charAt(0).toUpperCase() + value.officer_name.slice(1)+'</option>';

          }
          $('#user_jurisdiction').html(selectOption);
        });
      },
      error:function(data){
        console.log(data);
      }
    });
  });
  $('#user_jurisdiction').on('change',function(e){
    e.preventDefault();
    if($('#user_role').val()=='normal_user'){
      $('#full_name').val($('#user_jurisdiction option:selected').text());
      $('#full_name').attr('readonly','readonly');
    }else{
      $('#full_name').val('');
      $('#full_name').removeAttr('readonly','readonly');
    }
    
  });


  $('#logout_anchor').on('click',function(e){
    e.preventDefault();
    $('#logout-form').submit();
  });

  $('#login_btn').on('click',function(event){
    event.preventDefault();
    var hashedPwd = forge_sha256($('#login_pwd').val());
    $('#login_pwd').val(hashedPwd); 
    $('#login_form').submit();
  });
  $('#register_btn').on('click',function(event){
    event.preventDefault();
    var hashedPwd = forge_sha256($('#register_pwd').val());
    var hashedCnfPwd= forge_sha256($('#register_cnf_pwd').val());
    $('#register_pwd').val(hashedPwd); 
    $('#register_cnf_pwd').val(hashedCnfPwd); 
    $('#register_form').submit();
  });

  $('#change_pwd_btn').on('click',function(event){
    event.preventDefault();
    var hashedPwd = forge_sha256($('#change_pwd').val());
    var hashedCnfPwd= forge_sha256($('#change_cnf_pwd').val());
    $('#change_pwd').val(hashedPwd); 
    $('#change_cnf_pwd').val(hashedCnfPwd); 
    $('#change_pwd_form').submit();
  });

  $('#change_defalut_pwd_btn').on('click',function(event){
    event.preventDefault();
    var hashedPwd = forge_sha256($('#change_default_pwd').val());
    var hashedCnfPwd= forge_sha256($('#change_default_cnf_pwd').val());
    $('#change_default_pwd').val(hashedPwd); 
    $('#change_default_cnf_pwd').val(hashedCnfPwd); 
    $('#change_default_pwd_form').submit();
  });


  $(function(){

    bsCustomFileInput.init();
		//Initialize Select2 Elements
		$('.select2').select2();
		//Initialize Select2 Elements
		$('.select2bs4').select2({
		  theme: 'bootstrap4'
		})
		
		var donutData        = {
			labels: $('#piechart_labels').val().split(','),
			datasets: [
				{
					data: $('#piechart_data').val().split(','),
					backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#5e1de2', '#16e945'],
				}
			]
		}
		// Get context with jQuery - using jQuery's .get() method.
		var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
		var pieData        = donutData;
		var pieOptions     = {
			maintainAspectRatio : false,
		responsive : true,
	}
	//Create pie or douhnut chart
	// You can switch between pie and douhnut using the method below.
	new Chart(pieChartCanvas, {
		type: 'pie',
		data: pieData,
		options: pieOptions
	})

	});