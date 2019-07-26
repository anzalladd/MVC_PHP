$('#menu-nav').click(function(){
	$('.items').toggleClass('block');
})

$('#form-login').submit(function(){
	var email = $('#email-login').val();
	var password = $('#password-login').val();
	if (email.length == 0 || password.length == 0) {
		$('.danger').addClass('danger-block');
		$('.danger').text('Tolong isi semua inputan');
		return false;
	}
	else if(password.length < 6){
		$('.danger').addClass('danger-block');
		$('.danger').text('Password harus diatas 6 karakter');
		return false;
	}
})

$('.guest').click(function(){
	$('.float-form').toggleClass('float-input-block');
})

$('.get_started').click(function(){
	window.location.href = '/lks_6/public/home/login';
})