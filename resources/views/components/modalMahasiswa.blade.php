<input type="checkbox" id="my-modal-6" class="modal-toggle" />
<div class="modal">
    <div class="modal-box relative">
        <label for="my-modal-6" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h3 class="text-lg font-bold" id="title">Form Add Student</h3>
        <p class="py-4">
        <form id="form" action="/mahasiswa" class="flex flex-col gap-4" method="post">
            @csrf
            <input type="text" name="nrp" class="input input-bordered w-full" placeholder="NRP">
            <input type="text" name="nama" class="input input-bordered w-full" placeholder="Nama">
            <input type="text" name="no_telp" class="input input-bordered w-full" placeholder="No. Telepon">

            <select name="angkatan" class="select select-bordered w-full">
                <option disabled>Tahun angkatan</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>

            <div class="flex items-center gap-4">
                <input id="B" type="radio" name="kelas" value="2 D4 IT B"><label for="B">2 D4 IT
                    B</label>
                <input id="A" type="radio" name="kelas" value="2 D4 IT A"><label for="A">2 D4 IT
                    A</label>
            </div>
            <button type="submit" class="btn btn-success mt-5">Submit</button>
        </form>
        </p>
    </div>
</div>
