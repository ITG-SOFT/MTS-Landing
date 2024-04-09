<td>
    <a href="{{ route("admin.categories.attributes.create", [$category]) }}" class="btn btn-primary mb-3">
        {{ __('messages.attribute.create') }}
    </a>
    @if($category->attributes->count() != 0)
        <table class="table table-bordered table-hover text-wrap">
            <thead>
            <tr>
                {{--                                                        <th style="width: 10px">#</th>--}}
                <th>Название</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category->attributes as $attribute)
                <tr>
                    {{--                                                            <td>{{ $child->id }}</td>--}}
                    <td>{{ $attribute->title }}</td>
                    <td>
                        <a href="{{ route("admin.categories.attributes.edit", [$category, $attribute]) }}" class="btn btn-info btn-sm float-left">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route("admin.categories.attributes.destroy", [$category, $attribute]) }}" method="post" class="float-left ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Подтвердите удаление')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Свойств нет</p>
    @endif
</td>
