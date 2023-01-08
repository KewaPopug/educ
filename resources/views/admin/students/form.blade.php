<h1>Студенты</h1>
<form method="POST" action="{{route("admin.students.create")}}">
    @csrf
    <label for="secondname">Фамилия</label><br />
    <input name="secondname" id="secondname" type="text" placeholder="Фамилия" value="{{(isset($student->secondname)) ? $student->secondname : ''}}"/><br />
    <label for="firstname">Имя</label><br />
    <input name="firstname" id="firstname" type="text" placeholder="Имя" value="{{(isset($student->firstname)) ? $student->firstname : ''}}"/><br />
    <label for="middlename">Отчество</label><br />
    <input name="middlename" id="middlename" type="text" placeholder="Отчество" value="{{(isset($student->middlename)) ? $student->middlename : ''}}"/><br />
    <label for="email">Email</label><br />
    <input name="email" id="email" type="text" placeholder="Email" value="{{(isset($student->email)) ? $student->email : ''}}"/><br />
    <label for="password">Пароль</label><br />
    <input name='password' id='password' type='password' placeholder='password' value=''/><br />

    <button>Отправить</button>
</form>


