<html>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<form>
		pass:       <input type="password" name="pass" required/>
pass again:  <input type="password" name="pass2" required/>
		<button type="submit">Demo</button>
	</form>
</body>
<script type="text/javascript">
$(document).ready(function() {
    $('input[name=pass2]').keyup(function() {
        if($('input[name=pass]').val() == $('input[name=pass2]').val()) {
            $('#pass_hint').empty();
            $('#pass_hint').html('match');
            $(this).prop('valid', true);
        } else {
            $('#pass_hint').empty();
            $('#pass_hint').html('mismatch');
            $('#pass2').prop('invalid', true);
        }
    });
});
</script>
</html>