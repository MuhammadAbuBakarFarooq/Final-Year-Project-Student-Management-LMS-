<style type="text/css">
	p{
		font-weight: bolder;
	}
	span{
		font-weight: lighter;
	}
</style>
<div style="">
	<label>Here is Your Login Details ... </label>
	<p>Name: <span>{{ $data['name']}}</span></p>
	<p>Email: <span>{{ $data['email']}}</span></p>
	<p>Password: <span>{{ $data['pass']}}</span></p>
</div>
