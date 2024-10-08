<div id="modal-form-edit-role-{{ $grupUser->id }}" class="modal fade" tabindex="-1"
    aria-labelledby="modal-form-edit-role-{{ $grupUser->id }}-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('grup-user.update', $grupUser->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-edit-role-{{ $grupUser->id }}-label">Edit Grup User
                        ({{ $grupUser->name }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Grup User</label>
                        <input type="text" class="form-control" id="name" placeholder="Grup User" name="name"
                            value="{{ $grupUser->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="guard_name" class="form-label">Guard</label>
                        <input type="text" class="form-control" id="guard_name" placeholder="Guard Name"
                            name="guard_name" value="{{ $grupUser->guard_name }}">
                    </div>

                    <div class="mb-3">
                        <label for="permissions[]" class="form-label">Nama Akses</label>
                        <div class="d-flex flex-wrap">
                            @foreach ($permissions as $permission)
                                <div class="d-flex align-items-center mb-3" style="width: 50%;">
                                    <input class="form-check-input me-2" type="checkbox" name="permissions[]"
                                        value="{{ $permission->name }}" @if($grupUser->hasPermissionTo($permission->name)) checked @endif />
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea type="text" class="form-control" id="description" placeholder="Role description" name="deskripsi">{{ $grupUser->deskripsi }}</textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success ">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
