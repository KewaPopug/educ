<h1>Администраторы</h1>
<form method="post" action="{{(isset($administrator->id)) ? route("admin.administrators.update",['user_id' => $administrator->id] ) : route("admin.administrators.create")}}">
    @csrf
    <label for="secondname">Фамилия</label><br />
    <input name="secondname" id="secondname" type="text" placeholder="Фамилия" value="{{(isset($administrator->secondname)) ? $administrator->secondname : ''}}"/><br />
    <label for="firstname">Имя</label><br />
    <input name="firstname" id="firstname" type="text" placeholder="Имя" value="{{(isset($administrator->firstname)) ? $administrator->firstname : ''}}"/><br />
    <label for="middlename">Отчество</label><br />
    <input name="middlename" id="middlename" type="text" placeholder="Отчество" value="{{(isset($administrator->middlename)) ? $administrator->middlename : ''}}"/><br />
    <label for="email">Email</label><br />
    <input name="email" id="email" type="text" placeholder="Email" value="{{(isset($administrator->email)) ? $administrator->email : ''}}"/><br />
    <label for="password">Пароль</label><br />
    <input name='password' id='password' type='password' placeholder='password' value=''/><br />

    <button>Отправить</button>
</form>



