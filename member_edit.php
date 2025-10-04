<?
	include "main_top.php";
?>
<!--  현재 페이지 자바스크립  -------------------------------------------->
<script>
	function FindZip(zip_kind) 
	{
		w=window.open("zipcode.php?zip_kind="+zip_kind, "zip", 
			"width=440,height=320,scrollbars=no");
	}

	function Check_Value() {
		if (form2.pwd.value != form2.pwd1.value) {
			alert("암호가 일치하지 않습니다.");	
			form2.pwd.focus();	return;	
		}
		if (!form2.name.value) {
			alert("이름이 잘못되었습니다.");	form2.name.focus();	return;
		}
		if (!form2.birthday1.value || !form2.birthday2.value || !form2.birthday3.value) {
			alert("생일이 잘못되었습니다.");	form2.birthday1.focus();	return;
		}
		if (!form2.tel1.value || !form2.tel2.value || !form2.tel3.value) {
			alert("핸드폰이 잘못되었습니다.");	form2.tel1.focus();	return;
		}
		if (!form2.zip.value) {
			alert("우편번호가 잘못되었습니다.");	form2.zip.focus();	return;
		}
		if (!form2.juso.value) {
			alert("주소가 잘못되었습니다.");	form2.juso.focus();	return;
		}
		if (!form2.email.value) {
			alert("이메일이 잘못되었습니다.");	form2.email.focus();	return;
		}

		form2.submit();
	}
</script>
<?
	$db = mysqli_connect("localhost", "shop36", "1234", "shop36");
	
	$sql = "select * from member where id=$cookie_id";
	$result = mysqli_query($db, $sql);
	
	$row = mysqli_fetch_array($result); //aaa
	$count = mysqli_num_rows($result);
	
	$tel1 = trim(substr($row["tel"],0,3));
	$tel2 = trim(substr($row["tel"],3,4));
	$tel3 = trim(substr($row["tel"],7,4));
	
	$birthday1 = substr($row["birthday"],0,4);
	$birthday2 = substr($row["birthday"],5,2);
	$birthday3 = substr($row["birthday"],8,2);
	
?>
<div class="row m-5 mb-0">
	<div class="col" align="center">

		<h2 class="m-3 mt-3" style="font-size: 35px"><font color='#AF2031'>회원정보</font></h2>

		<hr size="4px" class="m-0">
		<br>

		<!-- form2 시작 -->
		<form name="form2" method="post" action="member_update.php">

		<table style="font-size:13px;">
			<tr height="40">
				<td align="left" width="120">아이디 <font color="red">*</font></td>
				<td align="left"><?=$row["uid"]; ?></td>
			</tr>
			
			<tr height="40">
				<td align="left">이름 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="name" size="20" value="<?=$row["name"]; ?>" 
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="left">휴대폰 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="tel1" size="3" maxlength="3" 
							value="<?=$tel1; ?>" class="form-control form-control-sm">-
						<input type="text" name="tel2" size="4" maxlength="4" 
							value="<?=$tel2; ?>" class="form-control form-control-sm">-
						<input type="text" name="tel3" size="4" maxlength="4" 
							value="<?=$tel3; ?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="90">
				<td align="left">주소 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex mb-1">
						<input type="text" name="zip" size="5" maxlength="5" 
							value="<?=$row["zip"]; ?>" class="form-control form-control-sm">&nbsp;
					</div>
					<a href="javascript:FindZip(0);"  style="font-size:13px"
						class="btn btn-sm btn-secondary text-white mb-1"  >우편번호 찾기</a><br>
					<div class="d-inline-flex">
						<input type="text" name="juso" size="50" 
							value="<?=$row["juso"]; ?>" 
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="left">E-Mail</td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="email" size="50" 
							value="<?=$row["email"]; ?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>

			<tr height="40">
				<td align="left">생일</td>
				<td align="left">
					<div class="d-inline-flex mt-2">
						<input type="text" name="birthday1" size="6" maxlength="4" 
							value="<?=$birthday1; ?>" class="form-control form-control-sm"> -
						<input type="text" name="birthday2" size="2" maxlength="2" 
							value="<?=$birthday2; ?>" class="form-control form-control-sm"> -
						<input type="text" name="birthday3" size="2" maxlength="2" 
							value="<?=$birthday3; ?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40"></tr>
			<tr height="40">
				<td align="left">새 비밀번호</td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="password" name="pwd" size="20" value="<?=$pwd1; ?>" 
							class="form-control form-control-sm">
					</div>
					<br>&nbsp; ※ 비밀번호 변경 시에만 입력하십시오.
				</td>
			</tr>
			<tr height="40">
				<td align="left">새 비밀번호 확인</td>
				<td align="left">
					<div class="d-inline-flex my-1">
						<input type="password" name="pwd1" size="20" value="<?=$pwd2; ?>" 
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
		</table>
		<br>
		<a href="javascript:Check_Value();"  class="btn btn-sm btn-dark text-white my-4">&nbsp;회원정보 수정&nbsp;</a>

		</form>
		
	</div>
</div>

<br><br><br>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "main_bottom.php";
?>