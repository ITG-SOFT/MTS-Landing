<td style="text-align: center; background: #303030;">
    @forelse($photos as $photo)
        <div style="display: flex; gap: 1vw; margin-bottom: 1vw; justify-content: center;">
            <img src="{{ $photo->getPath() }}" alt="{{ $photo->created_at }}" style="width: 10vw;">

            <form action="{{ route("admin.photos.destroy", [$photo]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Подтвердите удаление')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>
    @empty
        -
    @endforelse
</td>
