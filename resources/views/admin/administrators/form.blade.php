<h1>Администраторы</h1>

<form method="POST" action="{{route("admin.administrators.create")}}">
    @csrf
    <input name="secondname" id="secondname" type="text" placeholder="Фамилия"/>
    <button>Отправить</button>
</form>


