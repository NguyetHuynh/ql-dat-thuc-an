/*script xu ly giao dien*/
$(document).ready(function(){
	showMenu();
	$('#dataTable').DataTable({
            "order": [ 0, 'desc' ]
            } );
	$('[data-toggle="tooltip"]').tooltip();
	$('#price').number( true, 0 );//plugin number format
        $('#go-back').click(function(){
            window.history.back();
        });
//	$(function() {
//        $( "form>#ten" ).autocomplete({
//            source: "<?php echo base_url('search/search_item')?>", 
//            });
//            });
//            $('#add-order').click(function(){
//                    addInput("Tên Món Ăn", "thucan[][ten]", "Số Lượng", "thucan[][soluong]");
//            });
});

//menu toggle
function showMenu(){
	// $('.menu-item>a>.menu-title').after('<i class="fa fa-angle-right"></i>');

	$('.menu-item').click(function(){
		if($(this).hasClass('activing')){
			$(this).children('.submenu').slideUp();
			$(this).removeClass('activing');
		}
		else{
			$('.submenu').slideUp();
			$(this).children('.submenu').slideDown();
			$('.menu-item>').removeClass('activing');
			$(this).addClass('activing');
		}
	});
}

//allow or no allow click when status change
function clickPermission($status)
{    
    if($status !== 1)
    {
        $('.ship').addClass('avoid-click');
//        alert($status);
    }
    else{
        $('.ship').removeClass('avoid-click');
//        alert('00')
    }
}

//add new input in Them Moi form
function addInput($label1,$name1, $label2, $name2)
{
	var text = "<div class='form-group' id='inp'>"+
				"<label class='control-label col-sm-3' for='ten'>"+$label1+"</label>";
	var text2 = "<div class='col-md-5'>"
		        + "<input type='text' class='form-control' autocomplete='off'"
		        + "id='ten' name='"+$name1+"'></div>";
	var text3 = "<label class='control-label col-sm-2' for='soluong'>"+$label2+"</label>"
	        	+"<div class='col-sm-2'>"
	      		+"<input type='number' class='form-control' id='soluong' value='1' min='1' name='"+$name2+"'>"
	        	+"</div></div>";
	$(".inp:last-of-type").after(text, text2, text3);
}