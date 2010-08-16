$(document).ready(function() {
	$('#content > h2:first-child, #content h3, span').hookMenu();
	$('ul.tab_hooks').duxTab();
	loadSortableLists();
	loadAJAXDialogLinks();
	loadEditableMeta();
	
	$('img.flag').each(function(i){$(this).after(" ["+$(this).attr('alt')+"]");});
	
	$('nav#menu li').filter(function(index){ return $('div',this).length==1; }).bind({
		mouseenter: function(e){
			var leftpoint = $(this).position().left + 'px';
			$(this).children('div').css('left',leftpoint).fadeIn(100);
		},
		mouseleave: function(e){
			$(this).children('div').fadeOut('fast');
		}
	});

	$('.message').dialog({modal:true});
});


function loadAJAXDialogLinks() {
	$('a.ajax-modal').click(function(e) {
		var uri = $(this).attr('href');
		var dialog_title = $(this).attr('title');
		if(!$('div#ajax-modal-dialog').length) {
			var dialog = $('<div id="ajax-modal-dialog"></div>').appendTo('body');
		} else {
			var dialog = $('div#ajax-modal-dialog');
			dialog.html('');
		}
		dialog.load(uri,{},function(r,s,xHR){
			dialog.dialog({modal:true,minHeight:0,title:dialog_title});
		});
		e.preventDefault();
	});
}

function loadSortableLists() {
	var sortable_lists = $('#content ul.sortable');
	sortable_lists.each(function(i){
		var current_s_list = this;
		$(current_s_list).find('li span.mover').addTouch();
		$(current_s_list).data('controller',$(current_s_list).attr('class').split(" ")[1]);
		$(current_s_list).sortable({
			stop: function(e,ui){
				$(current_s_list).data('Final',$(this).sortable('serialize',{key:'data[Final][]'}));
				ajax_data_string = $(current_s_list).data('Initial') + '&' + $(current_s_list).data('Final');
				ajax_url = '/admin/' + $(current_s_list).data('controller') + '/reorder';
				$.ajax({
					url:ajax_url,
					data:ajax_data_string,
					type:'POST',
					success:function(d,s,xHR){
						if(d=='Fail'){
							window.location.reload();
						} else {
							$(current_s_list).data('Initial',$(current_s_list).sortable('serialize',{key:'data[Initial][]'}));
						}
					},
					fail:function(d,s,xHR) {
						window.location.reload();
					}
				});
			},
			helper: function(e,ui) {
				ui.children().each(function() {$(this).width($(this).width());});
				return ui;
			},
			placeholder: 'sortable-placeholder',
			handle: 'span.mover',
			axis: 'y'
		});
		$(current_s_list).data('Initial',$(current_s_list).sortable('serialize',{key:'data[Initial][]'}));
	});	
}
function loadEditableMeta() {
	var editable = $('div.meta span.editable');
	if(editable.length > 0) {
	 	var editable_form = $('div.meta form'),
			editable_url = editable_form.attr('action'),
			e_id = editable_url.split('/')[4],
			e_controller = editable.parents('ul').eq(0).attr('class');

		editable.bind('click',function(e){});
		editable.inlineEdit({
			placeholder: '',
			save: function(e,i_data){
				var e_method = this.element.attr('class').split(' ')[1];
				var post_data = new Object();
				post_data["data[" + e_controller + "][" + e_method + "]"] = i_data.value;
				post_data["data[" + e_controller + "][id]"] = e_id;
				$.ajax({type:'POST',url:editable_url,dataType:'text',data:post_data});
			}
		});
		editable_form.remove();
	}
}