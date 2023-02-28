<ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
    <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
        <a href="{{ route('floors.edit', $model->id) }}" class="btn btn-sm btn-info">
            <i class="fa fa-edit"></i>
        </a>
    </li>

    @if ($model->rooms_count == 0)
        <form action="{{ route('floors.destroy', $model->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">
                <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm(\'Kamu Yakin ingin menghapus data lantai ini?\')">
                    <i class="fa fa-trash"></i>
                </button>
            </li>
        </form>
    @endif
</ul>
