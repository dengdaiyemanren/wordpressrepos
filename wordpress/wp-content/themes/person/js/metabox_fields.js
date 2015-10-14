jQuery(document).ready(function(){
  var ashu_upload_frame;
  var value_id;
  jQuery('.ashu_upload_button').live('click',function(event){
    value_id =jQuery( this ).attr('id');
	event.preventDefault();
	if( ashu_upload_frame ){
	  ashu_upload_frame.open();
	  return;
	}
	
	ashu_upload_frame = wp.media({
	  title: 'Insert image',
	  button: {
	    text: 'Insert',
	  },
	  multiple: false
	});
	
	ashu_upload_frame.on('select',function(){
	  attachment = ashu_upload_frame.state().get('selection').first().toJSON();
	  //jQuery('#'+value_id+'_input').val(attachment.url).trigger('change');
	  jQuery('input[name='+value_id+']').val(attachment.url).trigger('change');
	});
	
	ashu_upload_frame.open();
	
	});
	
	jQuery('.ashuwp_url_input').each(function(){
	  jQuery(this).bind('change focus blur', function(){
	    $select = '#' + jQuery(this).attr('name') + '_div';
		$value = jQuery(this).val();
		$image = '<img src ="'+$value+'" />';
		var $image = jQuery($select).html('').append($image).find('img');
		window.setTimeout(function(){
		  if(parseInt($image.attr('width')) < 20){
		    jQuery($select).html('');
		  }
		},500);
	  });
	});
});