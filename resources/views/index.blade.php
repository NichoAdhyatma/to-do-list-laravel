<x-guest-layout>
    <div class="flex flex-col items-center gap-5 py-12">

        <div class="flex items-center gap-4">
            <label for="my-modal-4" class="btn btn-primary modal-button flex items-center gap-2 "><i
                    data-feather="file-plus"></i>Add To-Do-List</label>
            <label for="my-modal-6" class="btn btn-primary modal-button flex items-center gap-2 "><i
                    data-feather="user-plus"></i>Add Student</label>
        </div>

        <select class="select select-bordered w-full max-w-md">
            <option selected>List Student</option>
            @foreach ($mahasiswa as $m)
                <option>{{ $m->nrp }} - {{ $m->nama }}</option>
            @endforeach
        </select>


        @if (session()->has('message'))
            @include('components.success')
        @endif

        @if ($errors->any())
            @include('components.failed')
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
                                    data-todo="Testing" class="badge bg-warning cursor-pointer text-white border-0 p-4">
                                    <i data-feather="edit"></i></label>
                                <form action="{{ route('Todo.destroy', $t->id) }}" method="post"
                                    onclick="return confirm('Ingin di hapus?')">
                                    @csrf
                                    @method('delete')
                                    <button type=submit
                                        class="badge bg-error text-white border-0 cursor-pointer p-4 text-xs"><i
                                            data-feather="trash-2"></i></label></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('components.modalEdit')
    @include('components.modalMahasiswa')
    @include('components.modalAdd')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        function setData(id) {
            $('#form-edit').hide()
            $('#loader').show()
            $.get(`/Todo/${id}/edit`, (data) => {
                $(`#mhs_id option[value=${data[0].mahasiswa_id}]`).prop('selected', true);
                $(`#form-edit`).prop('action', `/Todo/${id}`)
                $('#todo').val(data[0].todo)
                $('#keterangan').val(data[0].keterangan)
                if (data[0].is_active == true) {
                    $('#active').prop('checked', true)
                } else {

                    $('#done').prop('checked', true)
                }
            }).then(() =>{ 
                $('#form-edit').show()
                $('#loader').hide()
            })
        }

        $('#close').click(() => {
            $('#alert').hide()
        })

        feather.replace()
    </script>
</x-guest-layout>
