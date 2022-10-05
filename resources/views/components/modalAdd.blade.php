<input type="checkbox" id="my-modal-4" class="modal-toggle" />
<div class="modal">
    <div class="modal-box relative">
        <label for="my-modal-4" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h3 class="text-lg font-bold">Form add ToDo-list</h3>
        <p class="py-4">
        <form action="/Todo" class="flex flex-col gap-4" method="post">
            @csrf
            <select name="mahasiswa_id"
                class="select select-bordered w-full ">
                @foreach ($mahasiswa as $m)
                    <option value="{{ $m->id }}">{{ $m->nama }}</option>
                @endforeach
            </select>
            <input type="text" name="todo"
                class="input input-bordered w-full" placeholder="Judul To-do-list">
            <input type="text" name="keterangan"
                class="input input-bordered w-full" placeholder="Isi To-do-list">
            <button type="submit" class="btn btn-success">Add</button>
        </form>
        </p>
    </div>
</div>