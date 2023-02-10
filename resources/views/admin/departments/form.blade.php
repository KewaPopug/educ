<h1>Группа специальностей</h1>
<form method="post" action="{{(isset($departments->id)) ? route("admin.departments.update",['user_id' => $departments->id] ) : route("admin.departments.create")}}">
    @csrf
    <label for="name_department">Название кафедры</label><br />
    <input name="name_department" id="name_department" type="text" placeholder="Название кафедры" value="{{(isset($departments->name_department)) ? $departments->name_department : ''}}"/><br />

    <label for="short_name">Сокращенное название кафедры</label><br />
    <input name="short_name" id="short_name" type="text" placeholder="Сокращенное название кафедры" value="{{(isset($departments->short_name)) ? $departments->short_name : ''}}"/><br />

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label for="faculty_id">Факультет</label><br />
                    <select name="faculty_id" class="form-control">
                        <option value="">Выберете факультет</option>
                        @foreach ($faculties as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <button>Отправить</button>
    </div>
</form>


