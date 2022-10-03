<x-guest-layout>
    <h1 class="text-center font-bold py-10">To Do List</h1>

    <div class="flex flex-col items-center gap-5">

        <label for="my-modal-4" class="btn btn-primary modal-button" onClick="setTitle()">Add To-do-list</label>

        @if (session()->has('message'))
            <div id="alert" class="alert bg-green-500 shadow-lg max-w-xl text-white">
                <div class="flex items-center justify-between w-full">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span> <strong>Success {{ session('message') }}</strong> ✅</span>
                    </div>
                    <div id="close" class="btn btn-sm btn-ghost btn-circle">✕</div>
                </div>
            </div>
        @endif
        <div class="overflow-x-auto">

            <table class="table w-full">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Todo</th>
                        <th>Keterangan</th>
                        <th>Active</th>
                        <th>Done</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($todo as $t)
                        <tr class="hover">

                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $t->mahasiswa->nama }}</td>
                            <td>{{ $t->todo }}</td>
                            <td>{{ $t->keterangan }}</td>
                            <td class="text-center">
                                @if ($t->is_active)
                                    ✅
                                @endif
                            </td>
                            <td>
                                @if ($t->is_done)
                                    ✅
                                @endif
                            </td>

                            <td class="flex items-center gap-2">
                                <label for="my-modal-3" onClick="setData({{ $t->id }})" data-mahasiswa_id="1"
                                    data-todo="Testing"
                                    class="badge bg-warning cursor-pointer text-white border-0">Edit</label>
                                <form action="/Todo/{{ $t->id }}" method="post"
                                    onclick="return confirm('Ingin di hapus?')">
                                    @csrf
                                    @method('delete')
                                    <button type=submit
                                        class="badge bg-error text-white border-0 cursor-pointer">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative">
            <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold" id="title">Form Edit ToDo-list</h3>
            <p class="py-4">
            <form id="form" action="" class="flex flex-col gap-4" method="post">
                @csrf
                @method('put')
                <select name="mahasiswa_id" id="mhs_id" @error('mahasiswa_id') is-invalid @enderror
                    class="select select-bordered w-full ">
                    @foreach ($mahasiswa as $m)
                        <option value="{{ $m->id }}">{{ $m->nama }}</option>
                    @endforeach
                </select>
                <input type="text" @error('todo') is-invalid @enderror id="todo" name="todo"
                    class="input input-bordered w-full" placeholder="Judul To-do-list">
                <input type="text" @error('keterangan') is-invalid @enderror id="keterangan" name="keterangan"
                    class="input input-bordered w-full" placeholder="Isi To-do-list">
                <label for="status">Status</label>
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

    <input type="checkbox" id="my-modal-4" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative">
            <label for="my-modal-4" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Form add ToDo-list</h3>
            <p class="py-4">
            <form action="/Todo" class="flex flex-col gap-4" method="post">
                @csrf
                <select name="mahasiswa_id" @error('mahasiswa_id') is-invalid @enderror
                    class="select select-bordered w-full ">
                    @foreach ($mahasiswa as $m)
                        <option value="{{ $m->id }}">{{ $m->nama }}</option>
                    @endforeach
                </select>
                <input type="text" @error('todo') is-invalid @enderror name="todo"
                    class="input input-bordered w-full" placeholder="Judul To-do-list">
                <input type="text" @error('keterangan') is-invalid @enderror name="keterangan"
                    class="input input-bordered w-full" placeholder="Isi To-do-list">
                <button type="submit" class="btn btn-success">Add</button>
            </form>
            </p>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        function setData(id) {
            $.get(`/Todo/${id}/edit`, function(data) {
                $(`#mhs_id option[value=${data[0].mahasiswa_id}]`).attr('selected', 'selected');
                $(`#form`).attr('action', `/Todo/${id}`)
                $('#todo').val(data[0].todo)
                $('#keterangan').val(data[0].keterangan)
                if (data[0].is_active) {
                    $('#active').attr('checked', true)
                }
                if (data[0].is_done) {
                    $('#done').attr('checked', true)
                }
            })
        }

        $('#close').click(() => {
            $('#alert').hide()
        })
    </script>
</x-guest-layout>
