<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>従業員情報削除｜ScottAdmin kadai</title>
	<link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
<h1>従業員情報削除</h1>
	<nav>
		<ul>
			<li><a href="/">TOP</a></li>
			<li><a href="/empList">従業員リスト</a></li>
			<li>従業員情報削除確認</li>
		</ul>
	</nav>
<section>
	<p>以下の従業員情報を削除します。<br>よろしければ、削除ボタンをクリックしてください</p>
		<form action="/empDelete" method="post">
            @csrf
			<table>
				<tbody>
					<tr>
						<th>従業員番号</th>
						<td>{{$emp[0]->empno}}<input type="hidden" id="deleteEmpEmpno" name="deleteEmpEmpno" value="{{$emp[0]->empno}}"></td>
					</tr>
					<tr>
						<th>従業員名</th>
						<td>{{$emp[0]->ename}}</td>
					</tr>
					<tr>
						<th>役職</th>
						<td>{{$emp[0]->job}}</td>
					</tr>
					<tr>
						<th>上司番号</th>
						<td>{{$emp[0]->mgr}}</td>
					</tr>
					<tr>
						<th>雇用日</th>
						<td>{{$emp[0]->hiredate}}</td>
					</tr>
					<tr>
						<th>給与</th>
						<td>{{$emp[0]->sal}}</td>
					</tr>
					<tr>
						<th>歩合</th>
						<td>{{$emp[0]->comm}}</td>
					</tr>
					<tr>
						<th>部門番号</th>
						<td>{{$emp[0]->deptno}}</td>
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