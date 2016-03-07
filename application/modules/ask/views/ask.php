<div class="heading">
	<div class="container">
		<br><br><br>
		<div class="row col-md-10 col-md-offset-1">

			<h2>Quản lý các ASK</h2>


		</div>

	</div>
</div>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<h5>Tên ASK</h5>
			<form>
				<input type="text" class="form-control" id="askname" placeholder="Tên ASK">
			</form>
		</div>
		<div class="col-md-3">
			<h5>Mô tả</h5>
			<form>
				<textarea class="form-control" rows="2"  id="askmota"placeholder="Mô tả ASK"></textarea>
			</form>
		</div>
		<div class="col-md-3">
			<h5>Danh mục cha</h5>
			<select class="form-control" id="catparent">
				<option>Kỹ năng</option>
				<option>Kỹ năng mềm</option>
				<option>Kỹ năng nghề nghiệp</option>
				<option>Kỹ năng xã hội</option>
			</select>
		</div>
		<div class="col-md-3">
			<br>
			<input type="submit" value="Thêm ASK" class="btn btn-primary btn-block">
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<select name="action" class="form-control" id="bulk-action-selector-top">
				<option value="-1" selected="selected">Tác vụ</option>
				<option value="delete">Xóa</option>
			</select>
		</div>
		<div class="col-md-2">
			<input type="submit" id="doaction" class="btn btn-primary btn-block" value="Áp dụng">
		</div>

	</div>
	<br>
	<div class="row">
		<table class="table table-condensed table-bordered">
			<thead>
				<th>
					#
				</th>
				<th>
					Tên ASK
				</th>
				<th>
					Mô tả ASK
				</th>
				<th>
					Danh mục cha
				</th>
				<th>
					Xác nhận ASK
				</th>
			</thead>
			<tr>
				<td>
					1
				</td>
				<td>
					Lập trình PHP trên Lavarel
				</td>
				<td>
					Đây là kỹ năng lập trình web bằng ngôn ngữ PHP trên nền tảng Lavarel.
				</td>
				<td>
					Lập trình trên nền Web
				</td>
				<td>
					15
				</td>
			</tr>
			<tr>
				<td>
					2
				</td>
				<td>
					Kỹ năng thuyết trình
				</td>
				<td>
					Đây là những kỹ năng trình bày về một chủ đề nào đó trước cuộc họp hoặc đám đông, nhằm truyền tải thuyết phục người nghe.
				</td>
				<td>
					Kỹ năng mềm
				</td>
				<td>
					7
				</td>
			</tr>

		</table>
	</div>
</div>