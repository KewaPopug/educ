<h1>Группа специальностей</h1>
<form method="post" action="{{(isset($groupsSpecializations->id)) ? route("admin.groups_specializations.update",['user_id' => $groupsSpecializations->id] ) : route("admin.groups_specializations.create")}}">
    @csrf
    <label for="name_group_specialization">Название группы специальностей</label><br />
    <input name="name_group_specialization" id="name_group_specialization" type="text" placeholder="Название группы специальностей" value="{{(isset($groupsSpecializations->name_group_specialization)) ? $groupsSpecializations->name_group_specialization : ''}}"/><br />

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


