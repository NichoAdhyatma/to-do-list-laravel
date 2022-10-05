<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
    <div class="modal-box relative">
        <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h3 class="text-lg font-bold" id="title">Form Edit ToDo-list</h3>
        <p class="py-4">
        <form id="form" action="" class="flex flex-col gap-4" method="post">
            @csrf
            @method('put')
            <select name="mahasiswa_id" id="mhs_id"
                class="select select-bordered w-full ">
                @foreach ($mahasiswa as $m)
                    <option value="{{ $m->id }}">{{ $m->nama }}</option>
                @endforeach
            </select>
            <input type="text" id="todo" name="todo" class="input input-bordered w-full"
                placeholder="Judul To-do-list">
            <input type="text" id="keterangan" name="keterangan" class="input input-bordered w-full"
                placeholder="Isi To-do-list">
            <label>Status</label>
            <div>
                <input id="active" type="radio" name="active" class="mr-2" value="active"><label
                    for="active" class="mr-5">active</label>
                <input id="done" type="radio" name="active" class="mr-2" value="done"><label
                    for="done">done</label>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
        </p>
    </div>
</div>