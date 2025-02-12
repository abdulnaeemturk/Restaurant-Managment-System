// start dynamic form submission functionality
function submitFormDynamically(_form_id, _link_to_url, _success_action_message, _error_message = "", _method_type, _contentType = false, _processData = false, _cache = false, _data_type = 'json') {

    var return_information = '';
    // var formData = $('#' + _form_id).serialize();
    var form_info = $('#' + _form_id)[0]
    var formData = new FormData(form_info);
    $.ajax({
        url: _GLOBAL_URL + _link_to_url,
        contentType: _contentType,
        processData: _processData,
        cache: _cache,
        type: _method_type,
        dataType: _data_type,
        async: false,
        headers: { 'X-CSRF-TOKEN': _TOKEN, 'Csrf-Token':_TOKEN },
        data: formData,
        success: function(data) {
            toastr.success(_success_action_message);
            return_information = "success";
            // return data;
            $('#' + _form_id)[0].reset();
        },
        error: function(data) {
            return_information = "failed";
            a = JSON.parse(data["responseText"]);
            if(a.error)
            {
                toastr.error(a.error); 
            }else{
                toastr.error(_error_message); 
            }
            $.each(a, function(key, value) {
                $('#' + _form_id + ' #error_' + key).removeAttr('hidden');
                $('#' + _form_id + ' #error_' + key).text(value[0]);
                $('#' + _form_id + ' #error_' + key).siblings('input').addClass('error');
                $('#' + _form_id + ' #error_' + key).siblings('select').addClass('error');
            });
        }
    });
    return return_information;
}

// end dynamic submit

// to fetch records into table dynamically
function fetchRecordsDynamically(_field_id, _link_to_url, _perpage = 10, _page_number = 0, _appened = 0, _success_action_message = 'Successfull')
{

		var page_number_string = "";
		if(_page_number !=0)
		{
			page_number_string = "?page="+_page_number;
		}

		var return_information = '';
		$.ajax({
			url: _GLOBAL_URL + _link_to_url+"/"+_perpage+"/"+_appened+page_number_string,
			success: function(data) {
				if(_appened === 0)
				{
					$('#' + _field_id ).html(data);

				}else{
					$('#' + _field_id ).append(data);
				}
				toastr.success(_success_action_message);
				return_information = "success";
				// return data;
			}
        });		
        
        return return_information;
}
// to fetch records into table dynamically

// to fetch records into table dynamically
function fetchViewDynamically(_link_to_url, _field_id, _success_action_message = 'Successfull')
{

		var return_information = '';
		$.ajax({
			url: _GLOBAL_URL + _link_to_url, 
            async: false,
			success: function(data) {
				$('#' + _field_id ).html(data);
				return_information = "success";
			}
        });		
        
        return return_information;
}
// to fetch records into table dynamically
// to fetch a single records for form from every model dynamically
function getFormRecordDynamically(_form_id, _link_to_url, _record_id, _method_type, _button_id, _add_form_id, _update_form_id)
{
   
		
		var return_information = '';
		$.ajax({
			url: _GLOBAL_URL + _link_to_url+"/"+_record_id+"/edit",
			type: _method_type,
			headers: { 'X-CSRF-TOKEN': _TOKEN },
			success: function(result) {

				for(var key in result)
				{
					if(result.hasOwnProperty(key))
					{
						$('#'+_form_id+" #"+key).val(result[key]);
					}
				}

                $('#'+_form_id+" #"+_button_id).attr("onclick", "updateRecord("+_record_id+")");
				toastr.success("Record Found Successfully");
				return_information = "success";
				
                $('#'+_add_form_id).hide();
                $('#'+_update_form_id).show();
				
					
				
				
				// return data;
			},
            error: function(data) {
                return_information = "failed";
                toastr.error("Record Not Found"); 
                }
		});

		return return_information;

}
// to fetch records for every model dynamically

function cancelUpdateForm(_add_form_id, _update_form_id)
{
    $('#'+_add_form_id).show();
    $('#'+_update_form_id).hide();
    $('#' + _update_form_id)[0].reset();
}


function fillSelectBoxDynamically(_link_to_url,_search, _form_id, _filled_to_be, _method_type, _option_value, _option_title, _select_title)
{
    var return_information = '';
    if(_search != '' || _search!= "")
    {
        _search = "/"+_search;
    }
		$.ajax({
			url: _GLOBAL_URL + _link_to_url+_search,
			type: _method_type,
			headers: { 'X-CSRF-TOKEN': _TOKEN },
			success: function(result) {
                // console.log(result);
                _option_created = createDynamicSelect(result, _option_value, _option_title, _select_title);
                // console.log(_option_created);
                $('#'+_form_id+' #' +_filled_to_be).html(_option_created);
				// return data;
			},
            error: function(data) {
                return_information = "failed";
                toastr.error("Record Not Found"); 
                }
		});
		return return_information;


}

// create dynamic option
function createDynamicSelect(_result_set, _option_value, _option_title, _select_title)
{
    var return_information = '<option value="">'+_select_title+'</option>';
    $.each(_result_set, function(index, value) {
        // console.log(_result_set[index]);
        // console.log(_result_set[index][_option_title]);
        return_information+= '<option value="'+_result_set[index][_option_value]+'">'+_result_set[index][_option_title]+'</option>';
      });
	return return_information;

}



function dynamicInputs(_input_placeholder ='', _input_value = '', _input_id = '', _input_name ='', _input_label='',  _input_label_class='', _input_class_info= '' )
{
    var data = '';
    if(_input_label != '')
    {
        data+= '<label class="'+_input_label_class+'" id="label'+_input_id+'" for="'+_input_label+'">'+_input_label+'</label>';
    }
    data+='<input placeholder="'+_input_placeholder+'" value="'+_input_value+'" id="'+_input_id+'" name="'+_input_name+'" class="'+_input_class_info+'" />'
    return data;
}

function redirectTo(_redirect_to, historyofpage = 'on')
{
    // similar behavior as an HTTP redirect
    if(historyofpage == 'on'){
        window.location = _redirect_to;
    }else{
        window.location.replace(_redirect_to);
    }

}

function removeIt(item_id_or_class)
{
    $(item_id_or_class).remove();
}
function hideElement(_element_information)
{
    $(_element_information).hide();   
}

function showElement(_element_information)
{
    $(_element_information).show();
  
}



// javascript to export spefic id to pdf

function printElement(printabkeid, title) {
    let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');
  
    mywindow.document.write(`<html><head><title>${title}</title>`);
    mywindow.document.write('</head><body >');
    mywindow.document.write(document.getElementById(printabkeid).innerHTML);
    mywindow.document.write('</body></html>');
  
    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/
  
    mywindow.print();
    mywindow.close();
  
    return true;
  }