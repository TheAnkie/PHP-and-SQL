</div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        
        
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
        
        <script src="js/MooTools.js" type="text/javascript"></script>
        <script type="text/javascript">  
  
   $('#addvd').click(function() {  
   //alert("a");
    return !$('#select1 option:selected').remove().appendTo('#select2');  
   });  
   $('#removevd').click(function() {  
    return !$('#select2 option:selected').remove().appendTo('#select1');  
   });  
  
 </script>  
        <?php /*?><script src="js/StrongPass.js" type="text/javascript"></script><?php */?>
        
        <?php /*?><script src="typeahead.min.js"></script><?php */?>
        <?php /*?><script>
    $(document).ready(function(){
		//alert("y");
    $('input.keywords').typeahead({
        name: 'keywords',
        remote:'ajax_search.php?key=%QUERY',
        limit : 10
    });
});
    </script><?php */?>
       <script type="text/javascript">
	   $('#birthDateNotAvailable').on('ifChecked', function(event) {
		   var dob = document.getElementById("birthDate");
		   dob.value = "Birth Date Not Available";
		   dob.disabled=true;
	   });
	   
	   $('#birthDateNotAvailable').on('ifUnchecked', function(event) {
		   var dob = document.getElementById("birthDate");
		   dob.value = "";
		   dob.disabled=false;
	   });
	   
	   $("#dietIntakeMilk").change(function () {
        var dietIntakeMilkBrandt = document.getElementById('dietIntakeMilkBrand');
       

        if (this.value != "Data not avaliable" && this.value !="") {
           //alert("y")            
            dietIntakeMilkBrandt.disabled = false;
            
        } else {
			//alert("n")
			dietIntakeMilkBrandt.value = "";
            dietIntakeMilkBrandt.disabled = true;
            
        }
    });
	
	$("#dietIntakeFats").change(function () {
        var dietIntakeFatsBrandt = document.getElementById('dietIntakeFatsBrand');
       

        if (this.value != "Data not avaliable" && this.value !="") {
           //alert("y")            
            dietIntakeFatsBrandt.disabled = false;
            
        } else {
			//alert("n")
			dietIntakeFatsBrandt.value = "";
            dietIntakeFatsBrandt.disabled = true;
            
        }
    });
	
	$("#dietIntakeOils").change(function () {
        var dietIntakeOilsBrandt = document.getElementById('dietIntakeOilsBrand');
       

        if (this.value != "Data not avaliable" && this.value !="") {
           //alert("y")            
            dietIntakeOilsBrandt.disabled = false;
            
        } else {
			//alert("n")
			dietIntakeOilsBrandt.value = "";
            dietIntakeOilsBrandt.disabled = true;
            
        }
    });
	
	$("#relativeOneDegree").change(function () {        

        if (this.value != "Data not avaliable" && this.value !="") {
           //alert("y")            
            document.getElementById('relativeOneCancerType').disabled = false;
            
        } else {
			//alert("n")
			document.getElementById('relativeOneCancerType').value = "";
            document.getElementById('relativeOneCancerType').disabled = true;
            
        }
    });
	
	$("#relativeTwoDegree").change(function () {        

        if (this.value != "Data not avaliable" && this.value !="") {
           //alert("y")            
            document.getElementById('relativeTwoCancerType').disabled = false;
            
        } else {
			//alert("n")
			document.getElementById('relativeTwoCancerType').value = "";
            document.getElementById('relativeTwoCancerType').disabled = true;
            
        }
    });
	
	$("#relativeThreeDegree").change(function () {        

        if (this.value != "Data not avaliable" && this.value !="") {
           //alert("y")            
            document.getElementById('relativeThreeCancerType').disabled = false;
            
        } else {
			//alert("n")
			document.getElementById('relativeThreeCancerType').value = "";
            document.getElementById('relativeThreeCancerType').disabled = true;
            
        }
    });
	
	$("#relativeFourDegree").change(function () {        

        if (this.value != "Data not avaliable" && this.value !="") {
           //alert("y")            
            document.getElementById('relativeFourCancerType').disabled = false;
            
        } else {
			//alert("n")
			document.getElementById('relativeFourCancerType').value = "";
            document.getElementById('relativeFourCancerType').disabled = true;
            
        }
    });
	
	$("#relativeFiveDegree").change(function () {        

        if (this.value != "Data not avaliable" && this.value !="") {
           //alert("y")            
            document.getElementById('relativeFiveCancerType').disabled = false;
            
        } else {
			//alert("n")
			document.getElementById('relativeFiveCancerType').value = "";
            document.getElementById('relativeFiveCancerType').disabled = true;
            
        }
    });
	   
	   $("#pStatus").change(function () {
        var cause = document.getElementById('deathCause');
        var code = document.getElementById('deathID10Code');
        var place = document.getElementById('deathPlace');
        var date = document.getElementById('deathDate');

        if (this.value !== "Death") {
            cause.value = "";
            code.value = "";
            place.value = "";
            date.value = "";

            cause.disabled = true;
            code.disabled = true;
            place.disabled = true;
            date.disabled = true;
        } else {
            cause.disabled = false;
            code.disabled = false;
            place.disabled = false;
            date.disabled = false;
        }
    });
	   
	   $('.selde2').on('ifChecked', function(event) {
		  // alert("here");
		 // alert($(this).value());
    $(this).closest('tr').addClass('checked-bgr');
	
});

$('.selde2').on('ifUnchecked', function(event) {
		  // alert("here");
		 // alert($(this).value());
    $(this).closest('tr').removeClass('checked-bgr');
	
});

     $('.getSrc').click(function() {
        var src =$(this).attr('alt');
//alert("asdsd".src);
        $('.showPic').attr('src', src);
     });
	 
	 $('.selde').on('ifChecked', function(event){
  //alert(event.type + ' callback');
  $('.selde2').iCheck('check');
});
$('.selde').on('ifUnchecked', function(event){
  //alert(event.type + ' callback');
  $('.selde2').iCheck('uncheck');
});

$('.sendimm').on('ifChecked', function(event){
  //alert(event.type + ' callback');
  //$('.sendimm2').iCheck('check');
  checkcal();
});

 $('.datepicker').datepicker({
		  format: "yyyy-mm-dd",
		  autoclose: true,
		  clearBtn: true,
		  todayHighlight: false
    });
	$('.datepicker2').datepicker({
		  format: "yyyy-mm-dd",
		  autoclose: true,
		  clearBtn: true,
		  todayHighlight: false
    });
	$('.datepicker3').datepicker({
		  format: "yyyy-mm-dd",
		  autoclose: true,
		  clearBtn: true,
		  todayHighlight: false
    });
	$('.datepicker4').datepicker({
		  format: "yyyy-mm-dd",
		  autoclose: true,
		  clearBtn: true,
		  todayHighlight: false
    });
	$('.datepicker5').datepicker({
		  format: "yyyy-mm-dd",
		  autoclose: true,
		  clearBtn: true,
		  todayHighlight: false
    });
	$('.datepicker6').datepicker({
		  format: "yyyy-mm-dd",
		  autoclose: true,
		  clearBtn: true,
		  todayHighlight: false
    });
	$('.datepicker7').datepicker({
		  format: "yyyy-mm-dd",
		  autoclose: true,
		  clearBtn: true,
		  todayHighlight: false
    });
</script>

    </body>
</html>