<ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
    <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Detail">
        <a href="{{ route('rooms.show', $model->id) }}" class="btn btn-sm btn-primary">
            <i class="fa fa-eye"></i>
        </a>
    </li>
    <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
        <a href="{{ route('rooms.edit', $model->id) }}" class="btn btn-sm btn-info">
            <i class="fa fa-edit"></i>
        </a>
    </li>
    @if ($model->room_positions_count == 0)
        <form action="{{ route('rooms.destroy', $model->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">
                <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Yakin ingin menghapus data ruang ini?')">
                    <i class="fa fa-trash"></i>
                </button>
            </li>
        </form>
    @endif
</ul>
