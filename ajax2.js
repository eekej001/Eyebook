$(document).ready(function() {
	
	$('.commentSubmit').click(function() {
		var editActiveLength = $('.commentEditActive').length;
		var replyActiveLength = $('.commentReplyActive').length;
		
		if((editActiveLength < 1) && (replyActiveLength < 1)) {
			$.post($('.commentForm').attr('action'), $('.commentForm :input').serializeArray(), function(info) {$('.commentSection').load('commentSection.php');});
		}
	});
	
	$('img.deleteI').click(function() {
		var indivDeleteId = $(this).attr('data-id');
		var deleteCheck = $('.deleteForm');;
		var deleteStore;
		
		for(i=0 ; i < deleteCheck.length; i++) {
			if($(deleteCheck[i]).attr('data-id') == indivDeleteId) {
				deleteStore = $(deleteCheck[i]);
				deleteStore.attr('class', 'deleteActive');
				$.post($('.deleteActive').attr('action'), $('.deleteActive :input').serializeArray(), function(info) {$('.commentSection').load('commentSection.php');});
			}
	    }
	});

	$('.subLikeI').click(function() {
		var indivSubLikeId = $(this).attr('data-id');
		var subLikeCheck = $('.subLikeForm');;
		var subLikeStore;
		var editActiveLength = $('.commentEditActive').length;
		
		if(editActiveLength==0){
		
		for(i=0 ; i < subLikeCheck.length; i++) {
			if($(subLikeCheck[i]).attr('data-id') == indivSubLikeId) {
				subLikeStore = $(subLikeCheck[i]);
				subLikeStore.attr('class', 'subLikeActive');
				$.post($('.subLikeActive').attr('action'), $('.subLikeActive :input').serializeArray(), function(info) {$('.commentSection').load('commentSection.php');});
			}
	    }
		}	
	});
	
	$('.subLikeI').mouseover(function() {
		var indivSubLikeId = $(this).attr('data-id');
		var userListCheck = $('.hiddenUserList');;
		var userListStore;
		
		for(i=0 ; i < userListCheck.length; i++) {
			if($(userListCheck[i]).attr('data-id') == indivSubLikeId) {
				userListStore = $(userListCheck[i]);
				userListStore.attr('class', 'hiddenUserListReveal');
			}
	    }
		
	});
	
	$('.subLikeI').mouseleave(function() {
		var indivSubLikeId = $(this).attr('data-id');
		var userListCheck = $('.hiddenUserListReveal');
		var userListStore;
		
		for(i=0 ; i < userListCheck.length; i++) {
			if($(userListCheck[i]).attr('data-id') == indivSubLikeId) {
				userListStore = $(userListCheck[i]);
				userListStore.attr('class', 'hiddenUserList');
			}
	    }
		
	});
	
	$('.editI').click(function() {
		var indivEditId = $(this).attr('data-id');
		var commentCheck = $('.commentSpecificContent');
		var editCheck = $('.editForm');
		var editActiveLength = $('.commentEditActive').length;
		var replyActiveLength = $('.commentReplyActive').length;
		var editStore;
		var commentStore;
		
		
		for(i=0 ; i < commentCheck.length; i++) {
			if($(commentCheck[i]).attr('data-id') == indivEditId) {
				commentStore = $(commentCheck[i]);
				if((editActiveLength < 1) && (replyActiveLength < 1)) {
				commentStore.attr('class', 'commentEditActive');
				}
			}
	    }
		
		for(i=0 ; i < editCheck.length; i++) {
			if($(editCheck[i]).attr('data-id') == indivEditId) {
				editStore = $(editCheck[i]);
				editStore.attr('class', 'editActive');
				$.post($('.editActive').attr('action'), $('.editActive :input').serializeArray(), function(info) {$('.commentEditActive').load('editPartial.php');});
			}
	    }
	
		
	});
	
	$('.editSubmit').click(function() {
			$.post($('.editPartialForm').attr('action'), $('.editPartialForm :input').serializeArray(), function(info) {$('.commentSection').load('commentSection.php');});
			//$.post($('.editPartialForm').attr('action'), $('.editPartialForm :input').serializeArray(), function(info) {$('.commentSection').load('editComment.php');});
		
	});
	
	$('.editCancel').click(function() {
			$('.commentSection').load('commentSection.php');
	});

	
	
	
	
	$('.reply').click(function() {
		var indivReplyId = $(this).attr('data-id');
		var commentCheck = $('.commentSpecificContent');
		var replyCheck = $('.replyForm');
		var editActiveLength = $('.commentEditActive').length;
		var replyActiveLength = $('.commentReplyActive').length;
		var replyStore;
		var commentStore;
		
		
		for(i=0 ; i < commentCheck.length; i++) {
			if($(commentCheck[i]).attr('data-id') == indivReplyId) {
				commentStore = $(commentCheck[i]);
				if((editActiveLength < 1) && (replyActiveLength < 1)) {
				commentStore.attr('class', 'commentReplyActive');
				}
			}
	    }
		
		for(i=0 ; i < replyCheck.length; i++) {
			if($(replyCheck[i]).attr('data-id') == indivReplyId) {
				replyStore = $(replyCheck[i]);
				replyStore.attr('class', 'replyActive');
				if((editActiveLength < 1) && (replyActiveLength < 1)) {
					$('.commentReplyActive').append("<div class='commentReplyActiveDiv'></div>");
					$.post($('.replyActive').attr('action'), $('.replyActive :input').serializeArray(), function(info) {$('.commentReplyActiveDiv').load('replyPartial.php');});
				}	
			}
	    }
	
		
	});
	
	$('.replySubmit').click(function() {
			$.post($('.replyPartialForm').attr('action'), $('.replyPartialForm :input').serializeArray(), function(info) {$('.commentSection').load('commentSection.php');});
			//$.post($('.replyPartialForm').attr('action'), $('.replyPartialForm :input').serializeArray(), function(info) {$('.commentSection').load('replyAdd.php');});
		
	});
	
	$('.replyCancel').click(function() {
			$('.commentSection').load('commentSection.php');
	});





});


