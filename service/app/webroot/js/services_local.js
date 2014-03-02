function callbackLogout(data) {

	if (data.success == false) {

	} else {
		console.log(data);
		var user_info = {
			'action' : 'logout',
			'callback' : 'afterLogout'
		};
		var wp_url = rootUrl + 'gotmitto-session.php';
		getAjaxData(wp_url, user_info, 'afterLogout');

	}
}

function afterLogout() {

	window.location.href = rootUrl;
}

function callbackGetAddressByID(data) {

	var item = data.data.data;
	var $inputs = $('#parcel-form input.receive-address[type="text"]');
	var values = {};
	var field_name = '';

    selected_state_name = item.state;

	$inputs.each(function() {

		// input field name is data[city]
		//but from service it is coming like city only.
		//parsing field name to set field
		var name = this.name;
		name = name.split('[');
		name = name[2].split(']');
		name = name[0];

		field_name = item[name];


		$(this).val(field_name);

	});

	//console.log(item.country);
	$('#UserCountry').val(item.country).trigger('change');


	$('#recv-add-id').val(item.id).trigger('change');

}

function clear_parcel_input_fields() {

	var $inputs = $('#parcel-form input[type="text"]:not("input.sender-parcel,#tags,.item-input")');

	$inputs.each(function() {

		$(this).val('');
	});

	selected_state_name = 'NSW';

	$('#UserCountry').val('AU').trigger('change');
	$('#recv-add-id').val('0').trigger('change');
}



function isRadioChecked(){


	var msg = 'Check to ensure dangerous goods';


$.each( $('.check-declaration'), function( key, value ) {

	if ($(this).is(":checked")){
         if($(this).val()==='1'){
         	msg = 'Gomitto will not accept any shipment that contains hazardous goods';
          }else {

          	msg='';
          }
    }

	});
if(msg===''){

   return true;

}else {

	alert(msg);
	return false;
}

}

function radioDeclaration(submitButtonID){

	$(submitButtonID).click(function(){

		var result = isRadioChecked();

		if(result===true){

     if($(submitButtonID).attr("id")==='proceed-to-invoice'){

     	$("form input:disabled").attr("disabled",false);
     	$("form select:disabled").attr("disabled",false);

     }

 }


    return result;

	});

}

function checkBoxDeclaration(submitButtonID,checkBoxID){

$(submitButtonID).click(function(){


var result = false ;

    if($(checkBoxID).is(":checked"))
    {
    	result =  true;
    }else{
    	alert('Confirm security Declaration');
    }

return result;
	});
}



function doAction(objID,eventName,targetObj,callBack){

	$(document).on(eventName, objID, function() {

       callBack(targetObj,objID);
   });

}

function  makeDsiableInput(targetObj,objID){

 $(targetObj).attr('disabled', function(idx,oldAttr){
    return !oldAttr;
 });

}

function  makeDsiableAddFld(targetObj,objID){

	if($(objID).val()==='0')
	 $(targetObj).attr('disabled',false);
	else
	 $(targetObj).attr('disabled',true);
}
function error_message_dispaly(errorList, displayid) {

		var err_length = errorList.length;
		var err_str1 = 'Please fill the required fields';
		var err_str2 = '';

		var required_err = false;
		$.each(errorList, function(index, value) {
			if (value.message == 'required') {
				required_err = true;
			} else {
				err_str2 = value.message;
			}

		});

		var err_str = (required_err == true) ? err_str1 : err_str2;
		$(displayid).show().html(err_str);

	}


/*
Add New Sender Address
after submit send parcel screen
*/
function callbackParcelSaveSender(data) {

	data = data.data;

	$('#SenderAddress').append('<option value="'+data.id +'">'+data.company_name +'</option>');
    $("#SenderAddress").val(data.id);
    $('#join_form').removeClass('overlay');
    $('#parcel-send-add-div').hide();

   //return true;
}

$(function() {

hideMessage('parcel-save-sender-add-result');

	var parcel_send_add_rules = {
		'data[Address][name]' : 'required',
		'data[Address][company_name]' : 'required',
		'data[Address][address1]' : 'required',
		'data[Address][address2]' : 'required',
		'data[Address][city]' : 'required',
		'data[Address][country]' : 'required',
		'data[Address][state]' : 'required',
		'data[Address][postcode]' : 'required'
	};

	var parcel_send_add_message = {
    	'data[Address][name]' : 'required',
		'data[Address][company_name]' : 'required',
		'data[Address][address1]' : 'required',
		'data[Address][address2]' : 'required',
		'data[Address][city]' : 'required',
		'data[Address][country]' : 'required',
		'data[Address][state]' : 'required',
		'data[Address][postcode]' : 'required'
	};


	function validate_gomitto_form(formid, formRules, rulesMessage, resultShow) {

		$(formid).validate({

			showErrors : function(errorMap, errorList) {

				error_message_dispaly(errorList, resultShow);

				this.defaultShowErrors();
			},

			ignore : ":hidden",

			onfocusout : false,
			onkeyup : false,
			onclick : false,

			rules : formRules,
			messages : rulesMessage,

			submitHandler : function(form) {

				$(resultShow).val('').hide();
				submitForm(form);
			}
		});

	}


 validate_gomitto_form('#parcel-save-sender-add', parcel_send_add_rules, parcel_send_add_message, '#parcel-save-sender-add-result');

$( document ).tooltip();

radioDeclaration('#proceed-to-invoice');

checkBoxDeclaration('#com-submit','#sec-decl');
checkBoxDeclaration('#quote-submit-button','#quote-check-decl');

doAction('#who-pay','change','#reply-paid',makeDsiableInput);

doAction('#recv-add-id','change','.receive-address',makeDsiableAddFld);
/*hide comercial invoice scrren link by default*/
hideMessage('cominvoice-link');

/*

con hold form submit


*/

$("#send-parcel-con-held").click(function (){

	event.preventDefault();

	 $("#parcel-form").attr('action',redirectUrl+'shipments/sendConHeld');

     $("#parcel-form").submit();

});

/* this function returns the selected shipment row id from my shipment summary */
function getShipmentID(){


    var ship_id = '';
	$.each( $('.sel-ship-check'), function( key, value ) {

	if ($(this).is(":checked")){
          ship_id = $(this).next().val();
	}

	});

	return ship_id;
}

$('.edit-shipment').click(function(){
	event.preventDefault();
	window.location.href = redirectUrl + 'shipments/sendparcel/'+getShipmentID();
});

/* del-shipment */

$('#del-shipment').click(function(){
	event.preventDefault();
	window.location.href = redirectUrl + 'shipments/deleteShipment/'+getShipmentID();
});


/*select only one checkbox*/

$('.sel-ship-check').on('change',function(){
 var th = $(this);
 if(th.is(':checked')){
     $('.sel-ship-check').not(th).prop('checked',false);
  }
});


	/* Auto complete*/

	var address_id = 0;
	var get_data = 0;
	$("#tags").autocomplete({
		source : function(request, response) {
			$.ajax({
				url : serviceURL + 'addresses/getrecieveraddress',
				dataType : "jsonp",
				data : {
					data : $("#tags").val(),
					//featureClass: "P",
					//style: "full",
					//maxRows: 12,
					//name_startsWith: request.term
				},
				success : function(data) {

					var result = {};

					if (data.data.data.length === 0) {

						result = [{
							'Address' : {
								'company_name' : $("#tags").val(),
								'id' : '0'
							}
						}];
						get_data = 0;
						//no data found in db
					} else {
						result = data.data.data;

						get_data = 1;
					}

					response($.map(result, function(item) {
						return {

							label : item.Address.company_name,
							value : item.Address.id
						};

					}));
				}
			});

		},
		minLength : 2,
		select : function(e, ui) {
			e.preventDefault();
			// <--- Prevent the value from being inserted.
			//$("#meta_search_ids").val(ui.item.value);

			//console.log(ui);

			if (ui.item.label !== 'Nothing found') {

				$(this).val(ui.item.label);

				address_id = ui.item.value;
			} else {
				$("#tags").val('');
			}

		},
		// open: function() {
		//   $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		// },
		close : function() {
			//$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );

			if (get_data === 1) {
				var getaddress_url = serviceURL + 'addresses/getrecieveraddressByID';
				var info = {
					'data' : address_id,
					'callback' : 'callbackGetAddressByID'
				};
				getAjaxData(getaddress_url, info, 'callbackGetAddressByID');

				//$('.del-parcel-field').show().prev().hide();

				//new address?
				$('#newadd-r').val('0');

				clear_parcel_input_fields();
			} else {

				clear_parcel_input_fields();

				//$('.del-parcel-field').hide().prev().show();
				$('#newadd-r').val('1');

			}

		}
	});

	$('#logout-console').click(function() {

		event.preventDefault();

		//alert('clickssss');

		var logout_url = serviceURL + 'users/logout';
		getAjaxData(logout_url, {
			'callback' : 'callbackLogout',
			'data' : ''
		}, 'callbackLogout');

	});
});
