$(document).ready(function() {
	
	$('.commentSubmit').click(function() {
		var editActiveLength = $('.commentEditActive').length;
		var replyActiveLength = $('.commentReplyActive').length;
		var replyEditActiveLength = $('.replyEditActive').length;
		
		if((editActiveLength < 1) && (replyActiveLength < 1) && (replyEditActiveLength < 1)) {
			$.post($('.commentForm').attr('action'), $('.commentForm :input').serializeArray(), function(info) {$('.commentSection').load('commentSection.php');});
		}
	});
	
	$('.deleteI').click(function() {
		var indivDeleteId = $(this).attr('data-id');
		var deleteCheck = $('.deleteForm');;
		var deleteStore;
		var editActiveLength = $('.commentEditActive').length;
		var replyActiveLength = $('.commentReplyActive').length;
		var replyEditActiveLength = $('.replyEditActive').length;
		
		for(i=0 ; i < deleteCheck.length; i++) {
		  if((editActiveLength < 1) && (replyActiveLength < 1) && (replyEditActiveLength < 1)) {	
			if($(deleteCheck[i]).attr('data-id') == indivDeleteId) {
				deleteStore = $(deleteCheck[i]);
				deleteStore.attr('class', 'deleteActive');
				$.post($('.deleteActive').attr('action'), $('.deleteActive :input').serializeArray(), function(info) {$('.commentSection').load('commentSection.php');});
			}
		  }	
	    }
	});

	$('.subLikeI').click(function() {
		var indivSubLikeId = $(this).attr('data-id');
		var subLikeCheck = $('.subLikeForm');;
		var subLikeStore;
		var editActiveLength = $('.commentEditActive').length;
		var replyActiveLength = $('.commentReplyActive').length;
		var replyEditActiveLength = $('.replyEditActive').length;
		
		if(editActiveLength==0){
		
		for(i=0 ; i < subLikeCheck.length; i++) {
		  if((editActiveLength < 1) && (replyActiveLength < 1) && (replyEditActiveLength < 1)) {	
			if($(subLikeCheck[i]).attr('data-id') == indivSubLikeId) {
				subLikeStore = $(subLikeCheck[i]);
				subLikeStore.attr('class', 'subLikeActive');
				$.post($('.subLikeActive').attr('action'), $('.subLikeActive :input').serializeArray(), function(info) {$('.commentSection').load('commentSection.php');});
			}
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
		var replyEditActiveLength = $('.replyEditActive').length;
		
		
		for(i=0 ; i < commentCheck.length; i++) {
			if($(commentCheck[i]).attr('data-id') == indivEditId) {
				commentStore = $(commentCheck[i]);
				if((editActiveLength < 1) && (replyActiveLength < 1) && (replyEditActiveLength < 1)) {
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
		var replyEditActiveLength = $('.replyEditActive').length;
		
		
		for(i=0 ; i < commentCheck.length; i++) {
			if($(commentCheck[i]).attr('data-id') == indivReplyId) {
				commentStore = $(commentCheck[i]);
				if((editActiveLength < 1) && (replyActiveLength < 1) && (replyEditActiveLength < 1)) {
				commentStore.attr('class', 'commentReplyActive');
				}
			}
	    }
		
		for(i=0 ; i < replyCheck.length; i++) {
			if($(replyCheck[i]).attr('data-id') == indivReplyId) {
				replyStore = $(replyCheck[i]);
				replyStore.attr('class', 'replyActive');
				if((editActiveLength < 1) && (replyActiveLength < 1) && (replyEditActiveLength < 1)) {
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


	$('.replyLikeI').click(function() {
		var indivReplyLikeId = $(this).attr('data-id');
		var replyLikeCheck = $('.replyLikeForm');;
		var replyLikeStore;
		var editActiveLength = $('.commentEditActive').length;
		var replyActiveLength = $('.commentReplyActive').length;
		var replyEditActiveLength = $('.replyEditActive').length;
		
		if((editActiveLength < 1) && (replyActiveLength < 1) && (replyEditActiveLength < 1)) {
		
		for(i=0 ; i < replyLikeCheck.length; i++) {
			if($(replyLikeCheck[i]).attr('data-id') == indivReplyLikeId) {
				replyLikeStore = $(replyLikeCheck[i]);
				replyLikeStore.attr('class', 'replyLikeActive');
				$.post($('.replyLikeActive').attr('action'), $('.replyLikeActive :input').serializeArray(), function(info) {$('.commentSection').load('commentSection.php');});
			}
	    }
		}	
	});
	
	$('.replyLikeI').mouseover(function() {
		var indivReplyLikeId = $(this).attr('data-id');
		var replyUserListCheck = $('.replyHiddenUserList');;
		var replyUserListStore;
		
		for(i=0 ; i < replyUserListCheck.length; i++) {
			if($(replyUserListCheck[i]).attr('data-id') == indivReplyLikeId) {
				replyUserListStore = $(replyUserListCheck[i]);
				replyUserListStore.attr('class', 'replyHiddenUserListReveal');
			}
	    }
		
	});
	
	$('.replyLikeI').mouseleave(function() {
		var indivReplyLikeId = $(this).attr('data-id');
		var replyUserListCheck = $('.replyHiddenUserListReveal');
		var replyUserListStore;
		
		for(i=0 ; i < replyUserListCheck.length; i++) {
			if($(replyUserListCheck[i]).attr('data-id') == indivReplyLikeId) {
				replyUserListStore = $(replyUserListCheck[i]);
				replyUserListStore.attr('class', 'replyHiddenUserList');
			}
	    }
		
	});
	
	
	
	
	
	
	$('.replyEditI').click(function() {
		var indivReplyEditId = $(this).attr('data-id');
		var replyCheck = $('.replyDiv');
		var replyEditCheck = $('.replyEditForm');
		var editActiveLength = $('.commentEditActive').length;
		var replyActiveLength = $('.commentReplyActive').length;
		var replyEditStore;
		var replyStore;
		var replyEditActiveLength = $('.replyEditActive').length;
		
		
		for(i=0 ; i < replyCheck.length; i++) {
			if($(replyCheck[i]).attr('data-id') == indivReplyEditId) {
				replyStore = $(replyCheck[i]);
				if((editActiveLength < 1) && (replyActiveLength < 1) && (replyEditActiveLength < 1)) {
				replyStore.attr('class', 'replyEditActive');
				}
			}
	    }
		
		for(i=0 ; i < replyEditCheck.length; i++) {
			if($(replyEditCheck[i]).attr('data-id') == indivReplyEditId) {
				replyEditStore = $(replyEditCheck[i]);
				replyEditStore.attr('class', 'replyFormEditActive');
				$.post($('.replyFormEditActive').attr('action'), $('.replyFormEditActive :input').serializeArray(), function(info) {$('.replyEditActive').load('replyEditPartial.php');});
			}
	    }
	
		
	});
	
	$('.replyEditSubmit').click(function() {
			$.post($('.replyEditPartialForm').attr('action'), $('.replyEditPartialForm :input').serializeArray(), function(info) {$('.commentSection').load('commentSection.php');});
			//$.post($('.editPartialForm').attr('action'), $('.editPartialForm :input').serializeArray(), function(info) {$('.commentSection').load('editComment.php');});
		
	});
	
	$('.replyEditCancel').click(function() {
			$('.commentSection').load('commentSection.php');
	});
	

	
	$('.replyDeleteI').click(function() {
		var indivReplyDeleteId = $(this).attr('data-id');
		var replyDeleteCheck = $('.replyDeleteForm');;
		var replyDeleteStore;
		var editActiveLength = $('.commentEditActive').length;
		var replyActiveLength = $('.commentReplyActive').length;
		var replyEditActiveLength = $('.replyEditActive').length;
		
		for(i=0 ; i < replyDeleteCheck.length; i++) {
			if($(replyDeleteCheck[i]).attr('data-id') == indivReplyDeleteId) {
			  if((editActiveLength < 1) && (replyActiveLength < 1) && (replyEditActiveLength < 1)) {	
				replyDeleteStore = $(replyDeleteCheck[i]);
				replyDeleteStore.attr('class', 'replyDeleteActive');
				$.post($('.replyDeleteActive').attr('action'), $('.replyDeleteActive :input').serializeArray(), function(info) {$('.commentSection').load('commentSection.php');});
			  }
			}
	    }
	});



});


