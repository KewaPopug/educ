<h1>Учитель</h1>
<form method="POST" action="{{isset($teacher->id) ? route("admin.teachers.update",['user_id' => $teacher->id]) : route("admin.teachers.create")}}">
    @csrf
    <label for="secondname">Фамилия</label><br />
    <input name="secondname" id="secondname" type="text" placeholder="Фамилия" value="{{(isset($teacher->secondname)) ? $teacher->secondname : ''}}"/><br />
    <label for="firstname">Имя</label><br />
    <input name="firstname" id="firstname" type="text" placeholder="Имя" value="{{(isset($teacher->firstname)) ? $teacher->firstname : ''}}"/><br />
    <label for="middlename">Отчество</label><br />
    <input name="middlename" id="middlename" type="text" placeholder="Отчество" value="{{(isset($teacher->middlename)) ? $teacher->middlename : ''}}"/><br />
    <label for="email">Email</label><br />
    <input name="email" id="email" type="text" placeholder="Email" value="{{(isset($teacher->email)) ? $teacher->email : ''}}"/><br />
    <label for="password">Пароль</label><br />
    <input name='password' id='password' type='password' placeholder='password' value=''/><br />

    <button>Отправить</button>
</form>
