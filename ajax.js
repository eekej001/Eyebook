$(document).ready(function() {
	
	/*$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
    options.async = true;
}); */
	
	
	


$('img.likeImg').click(function() {
	var indivLikeId = $(this).attr('data-id');
		var likeCheck = $('.likeForm');;
		var likeStore;
		
		for(i=0 ; i < likeCheck.length; i++) {
			if($(likeCheck[i]).attr('data-id') == indivLikeId) {
				likeStore = $(likeCheck[i]);
				likeStore.attr('class', 'likeActive');
				$.post($('.likeActive').attr('action'), $('.likeActive :input').serializeArray(), function(info) {$('.likeSection').load('likeSection.php');});
			}
	    }
});


$('.registerSubmit').click(function() {
	var formCheck = $('.registerForm').length;
	/*var aLength = $('.registerForm :input').serializeArray().length;
	
		for(i=0; i<aLength; i++) {
			alert ('Name: ' + $('.registerForm :input').serializeArray()[i].name + ' Value: ' + $('.registerForm :input').serializeArray()[i].value);
		} */
		
	console.debug($('.registerForm :input').serializeArray());
	$.post($('.registerForm').attr('action'), $('.registerForm :input').serializeArray(), function(info) {$('.registerSection').load('registerForm.php');});
	
	    
});




});















/*function like_add(page_id) {
	$.post('like.php', {page_id:page_id}, function(data) {
		if(data=='success') {
			like_get(page_id)
		}
		else {
			alert(data);
		}
	});
}


function like_get(page_id) {
	$.post('get.php', {page_id:page_id}, function(data) {
		
		$('#page_'+page_id+'_likes').text(data);
	});
}*/