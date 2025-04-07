<html>
<head></head>
<body>
	<form action="{{url('qlsach/luutheloai')}}" method="post">
		<table>
			<tr>
				<td>ID</td>
				<td>Tên thể loại</td>
			</tr>
			<tr>
				<td><input type="text" name="id[]" size="5"></td>
				<td><input type="text" name="ten[]"></td>
			</tr>
			<tr>
				<td><input type="text" name="id[]" size="5"></td>
				<td><input type="text" name="ten[]"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Lưu" name="submit"></td>
			</tr>
		</table>
		{{ csrf_field() }}
	</form>
</body>
</html>