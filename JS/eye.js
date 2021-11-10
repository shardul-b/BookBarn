classes('eye-up')[0].addEventListener('click',()=>{

	let passRef=ids('new-pass');
	if(passRef.type == 'password'){
		passRef.type = 'text';
	}else{
		passRef.type = 'password';
	}
});
classes('eye-re')[0].addEventListener('click',()=>{
	classes('re-pass-hide')[0].classList.toggle('hide');
	classes('re-pass-show')[0].classList.toggle('hide');
	let passRef=ids('re-pass');
	if(passRef.type == 'password'){
		passRef.type = 'text';
	}else{
		passRef.type = 'password';
	}
});
classes('eye-in')[0].addEventListener('click',()=>{
	classes('in-pass-hide')[0].classList.toggle('hide');
	classes('in-pass-show')[0].classList.toggle('hide');
	let passRef=ids('log-pass');
	if(passRef.type == 'password'){
		passRef.type = 'text';
	}else{
		passRef.type = 'password';
	}
});