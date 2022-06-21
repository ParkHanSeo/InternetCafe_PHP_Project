<script>
	function onclickCheckId(){
		var id = document.getElementById("id").value;
		if(id){
			$.ajax({
				url: "idCheck.php?id="+id,
				type: "GET",
			}).done(function(data) {
				if(data == 1){
					$("input[name='checked_id']").val(id);
					alert(id+"는 사용 가능한 아이디입니다.");
				}else if(data == 2){
					alert(id+"는 이미 사용중인 아이디입니다.");
				}
			});
		}else if(id == null && id == ""){
			alert("id를 입력해주세요.");
		}
	}

	function signUpUser(){
		var id = $("#id").val();
		var idCheck = $("input[name='checked_id']").val();
		var password = $("#password").val();
		var passwordCheck = $("#passwordCheck").val();
		var name = $("#name").val();
		var email = $("#email").val();
		
		// 아이디 공란 확인
		if(id == ''){
			alert("아이디가 입력되지 않았습니다.");
			$("#id").focus();
			return false;
		}

		if(idCheck == '' || idCheck != id){
			alert("아이디 중복체크를 하지 않았습니다.")
			$("input[name='checked_id']").focus();
			return false;
		}
		
		// 비밀번호 공란 확인
		if(password == ''){
			alert("비밀번호가 입력되지 않았습니다.");
			$("#password").focus();
			return false;
		}
		
		// 비밀번호 확인 공란 확인
		if(passwordCheck == ''){
			alert("비밀번호가 확인이 입력되지 않았습니다.");
			$("#passwordCheck").focus();
			return false;
		}

		// 비밀번호 일치 확인
		if(password != passwordCheck){
			alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.");
			$("#passwordCheck").focus();
			return false;
		}
		
		// 이름 공란 확인
		if(name == ''){
			alert("이름이 입력되지 않았습니다.");
			return false;
		}	
		// 이메일 유효성 검사
		var email = $("#email").val();
		var regEmail = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/;
		
		if(!regEmail.test(email)){
			alert("이메일을 정확하게 입력해주세요.");
			$("#email").focus();
			return false;
		}
		document.form_userSubmit.submit();

	}

	function cancel(){
		window.close();
	}
</script>