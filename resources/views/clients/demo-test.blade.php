<h2>Trang web demo</h2>
@if (session('mess'))
    <div class="alert alert-success">
        {{session('mess')}}
    </div>
@endif
<form action="" method="post">
    <input type="text" name="username" placeholder="UserName..."/>
    <button type="submit">Submit</button>
    @csrf
</form>