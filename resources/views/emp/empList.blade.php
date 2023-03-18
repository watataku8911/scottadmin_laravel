<!DOCTYPE html>
<html>
<head>
	<title>従業員情報リスト|ScottAdmin kadai</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<h1>従業員情報リスト</h1>
	<nav>
		<ul>
		<li><a href="/">TOP</a></li>
		<li>従業員情報リスト</li>
		</ul>
	</nav>
	@if (session('flash_message'))
    <section>
        <p>
            {{ session('flash_message') }}
        </p>
    </section>
    @endif
	<section>
		<p>新規登録は<a href="/goEmpAdd">こちら</a>から</p>
	</section>

	<section>
		<table>
			<thead>
				<tr>
					<th>従業員番号</th>
					<th>従業員名</th>
					<th>役職</th>
					<th>上司</th>
					<th>雇用日</th>
					<th>給与</th>
					<th>歩合</th>
					<th>所属部門</th>
					<th colspan="2">操作</th>
				</tr>
			</thead>
			<tbody>
		    @forelse ($empList as $emp)
				<tr>
					<td align='right'>{{$emp->empno}}</td>
					<td>{{$emp->ename}}</td>
					<td>{{$emp->job}}</td>
					<td>{{$emp->mgr}}</td>
					<td>{{$emp->hiredate}}</td>
					<td align='right'>{{$emp->sal}}</td>
					<td align='right'>{{$emp->comm}}</td>
					<td>{{$emp->deptno}}</td>
					<td>
						<form action='/prepareEmpEdit'>
							<input type='hidden' id='editEmpEmpno' name='editEmpEmpno' value='{{$emp->empno}}'>
						
							<input type='submit' value='編集'>
						</form>
					</td>

					<td>
						<form action='/comfirmEmpDelete' method='post'>
                            @csrf
							<input type='hidden' id='deleteEmpEmpno' name='deleteEmpEmpno' value='{{$emp->empno}}'>
							<input type='submit' value='削除'>
						</form>
					</td>
				</tr>
            @empty
				<tr>
					<td colspan="10">該当データは存在しません</td>
				</tr>
            @endforelse
			</tbody>
		</table>
	</section>
</body>
</html>