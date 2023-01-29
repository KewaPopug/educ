<h1>Факультет</h1>
<form method="post" action="{{(isset($faculty->id)) ? route("admin.faculties.update",['user_id' => $faculty->id] ) : route("admin.faculties.create")}}">
    @csrf
    <label for="name_faculty">Название факультета</label><br />
    <input name="name_faculty" id="name_faculty" type="text" placeholder="Название факультета" value="{{(isset($faculty->name_faculty)) ? $faculty->name_faculty : ''}}"/><br />
    <label for="faculty_reduction">Сокращение факультета</label><br />
    <input name="faculty_reduction" id="faculty_reduction" type="text" placeholder="Сокращение факультета" value="{{(isset($faculty->faculty_reduction)) ? $faculty->faculty_reduction : ''}}"/><br />
    <button>Отправить</button>
</form>


