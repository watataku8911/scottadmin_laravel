<!DOCTYPE html>
<html lang="ja">
<head>
	<title>部門情報削除｜ScottAdminMVC Sample</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<meta charset="utf-8">
</head>
<body>
	<h1>部門情報削除</h1>
	<nav>
		<ul>
			<li><a href="/">TOP</a></li>
			<li><a href="/deptList">部門リスト</a></li>
			<li>部門情報削除</li>
		</ul>
	</nav>
	
	<section>
		<p>以下の部門情報を削除します。よろしければ、削除ボタンを押してください。</p>

		<form action="/deptDelete" method="post">
            @csrf
			<table>
				<tbody>
					<tr>
						<th>部門番号</th>
						<td>{{$dept[0]->deptno}}<input type="hidden" name="deleteDeptDeptno" id="deleteDeptDeptno" value="{{$dept[0]->deptno}}"></td>
					</tr>
					<tr>
						<th>部門名</th>
						<td>{{$dept[0]->dname}}</td>
					</tr>
					<tr>
						<th>所在地</th>
						<td>{{$dept[0]->loc}}</td>
					</tr>
					<tr>
						<td colspan="2" class="submit"><input type="submit" value="削除"></td>
					</tr>
				</tbody>
			</table>
		</form>
	</section>
</body>
</html>