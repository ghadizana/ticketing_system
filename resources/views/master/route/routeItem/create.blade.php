<div class="modal fade" id="addRouteItem" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Route Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAuthentication" class="mb-3" action="{{ route('route.item.store', $route->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start">Nama</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="name"
                                    placeholder="Masukkan nama proyek" autofocus required value="{{ old('name') }}" />
                            </div>
                            @error('name')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="name">Route</label>
                        <div class="col-sm-9">
                            <select name="route" id="route" class="form-select">
                                @foreach ($routes as $route)
                                    @if (!blank($route->getName()))
                                        <option value="{{ $route->getName() }}">{{ $route->getName() }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('permission_name')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="name">Nama Menu</label>
                        <div class="col-sm-9">
                            <select name="permission_name" id="permission_name" class="form-select">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('permission_name')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="status">Status</label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-select">
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                            @error('status')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Tambah Proyek</button>
                </div>
            </form>
        </div>
    </div>
</div>
