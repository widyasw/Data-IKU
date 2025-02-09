@extends('admin.admin_template')

@section('main')
    <div id="content_layout">
        @include('admin.partials.breadcrumb')
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <div>
                        <h4 class="card-title">{{ $title }}
                        </h4>
                        <p class="text-muted">{{ $subtitle }}
                        </p>
                    </div>

                    <div>
                        <a href="{{ route('admin.iku-8.print') }}" target="_blank">
                            <button class="btn inline-flex justify-center btn-secondary">
                                <span class="flex items-center">
                                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2"
                                        icon="heroicons-outline:printer"></iconify-icon>
                                    <span>Cetak</span>
                                </span>
                            </button>
                        </a>
                        <button class="btn inline-flex justify-center btn-primary" onclick="openModal()">
                            <span class="flex items-center">
                                <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2"
                                    icon="heroicons-outline:plus-circle"></iconify-icon>
                                <span>Tambah</span>
                            </span>
                        </button>
                    </div>

                </header>
                <div class="card-body px-6 pb-6">
                    @include('admin.partials.alert')
                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table
                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                    <thead class=" bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class=" table-th ">
                                                Id
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Nama program studi
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Akreditasi BAN-PT
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Masa Berlaku
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Akreditasi Internasional
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Masa Berlaku
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Berkas Pendukung
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($items as $key => $item)
                                            <tr>
                                                <td class="table-td">{{ $key + 1 }}</td>
                                                <td class="table-td">{{ $item->name }}</td>
                                                <td class="table-td">{{ $item->banpt_rating }}</td>
                                                <td class="table-td">{{ Carbon\Carbon::parse($item->banpt_start_date)->format('d M Y') }} s.d. {{ Carbon\Carbon::parse($item->banpt_end_date)->format('d M Y') }}</td>
                                                <td class="table-td">{{ $item->international_rating ?? '-'}}</td>
                                                @php
                                                    $startDate = $item->international_start_date ? Carbon\Carbon::parse($item->international_start_date)->format('d M Y') : '';
                                                    $endDate = $item->international_end_date ? Carbon\Carbon::parse($item->international_end_date)->format('d M Y') : '';
                                                @endphp
                                                <td class="table-td">{{ $item->international_start_date && $item->international_end_date ? ( $startDate . ' s.d. ' . $endDate) : '-' }}</td>
                                                <td class="table-td">
                                                    <a href="{{ route('show_file', ['path' => 'iku-8', 'id' => $item->id, 'preview' => true]) }}"
                                                        class="text-primary hover:underline"
                                                        target="_blank">{{ $item->file_name }}</a>
                                                </td>
                                                <td class="table-td ">
                                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                                        <button class="toolTip onTop justify-center action-btn"
                                                            data-tippy-content="Edit" data-tippy-theme="info"
                                                            onclick="edit({{ $item }})">
                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                        </button>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('admin.iku-8.destroy', $item->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button
                                                                class="toolTip onTop justify-center action-btn delete-btn"
                                                                type="submit" data-tippy-content="Delete"
                                                                data-tippy-theme="danger" data-id="{{ $item->id }}">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Modal Area Start -->
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                id="form_modal" tabindex="-1" aria-labelledby="form_modal" aria-hidden="true">
                <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
                    <div
                        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                                                rounded-md outline-none text-current">
                        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                                <h3 id="form-title" class="text-xl font-medium text-white dark:text-white capitalize">
                                    Form Modal
                                </h3>
                                <button type="button"
                                    class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                                            dark:hover:bg-slate-600 dark:hover:text-white"
                                    data-bs-dismiss="modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                                                                                                                                                                                                                                                                                                                                    11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div>
                                <form id="form-el" action="{{ route('admin.iku-8.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-6 space-y-6">
                                        <!-- Name -->
                                        <div class="input-group">
                                            <label for="name"
                                                class="text-sm font-Inter font-normal text-slate-900 block">Nama program
                                                studi</label>
                                            <input type="text" id="name" name="name"
                                                class="text-sm font-Inter font-normal text-slate-600 block w-full py-3 px-4 border border-slate-400 rounded-md focus:outline-none focus:ring-0 mt-1"
                                                placeholder="Masukkan nama" required>
                                        </div>

                                        <!-- Akreditasi BAN-PT -->
                                        <div class="input-group">
                                            <label for="banpt_rating"
                                                class="text-sm font-Inter font-normal text-slate-900 block">Akreditasi
                                                BAN-PT</label>
                                            <input type="text" id="banpt_rating" name="banpt_rating"
                                                class="text-sm font-Inter font-normal text-slate-600 block w-full py-3 px-4 border border-slate-400 rounded-md focus:outline-none focus:ring-0 mt-1"
                                                placeholder="Masukkan Akreditasi BAN-PT" required>
                                        </div>

                                        <!-- Start Date -->
                                        <div class="input-group">
                                            <label for="banpt_start_date"
                                                class="text-sm font-Inter font-normal text-slate-900 block">Waktu Mulai</label>
                                            <input type="date" id="banpt_start_date" name="banpt_start_date"
                                                class="text-sm font-Inter font-normal text-slate-600 block w-full py-3 px-4 border border-slate-400 rounded-md focus:outline-none focus:ring-0 mt-1"
                                                placeholder="Masukkan waktu" required>
                                        </div>
                                        <!-- End Date -->
                                        <div class="input-group">
                                            <label for="banpt_end_date"
                                                class="text-sm font-Inter font-normal text-slate-900 block">Waktu Akhir</label>
                                            <input type="date" id="banpt_end_date" name="banpt_end_date"
                                                class="text-sm font-Inter font-normal text-slate-600 block w-full py-3 px-4 border border-slate-400 rounded-md focus:outline-none focus:ring-0 mt-1"
                                                placeholder="Masukkan waktu" required>
                                            <p id="banpt_end_date_danger" class="text-danger-500 hidden end_date_danger">Waktu akhir tidak boleh melebihi waktu mulai</p>
                                        </div>

                                        <!-- Akreditasi Internasional -->
                                        <div class="input-group">
                                            <label for="international_rating"
                                                class="text-sm font-Inter font-normal text-slate-900 block">Akreditasi
                                                Internasional</label>
                                            <input type="text" id="international_rating" name="international_rating"
                                                class="text-sm font-Inter font-normal text-slate-600 block w-full py-3 px-4 border border-slate-400 rounded-md focus:outline-none focus:ring-0 mt-1"
                                                placeholder="Masukkan Akreditasi Internasional">
                                        </div>

                                        <!-- Start Date -->
                                        <div class="input-group">
                                            <label for="international_start_date"
                                                class="text-sm font-Inter font-normal text-slate-900 block">Waktu Mulai</label>
                                            <input type="date" id="international_start_date" name="international_start_date"
                                                class="text-sm font-Inter font-normal text-slate-600 block w-full py-3 px-4 border border-slate-400 rounded-md focus:outline-none focus:ring-0 mt-1"
                                                placeholder="Masukkan waktu">
                                        </div>
                                        <!-- End Date -->
                                        <div class="input-group">
                                            <label for="international_end_date"
                                                class="text-sm font-Inter font-normal text-slate-900 block">Waktu Akhir</label>
                                            <input type="date" id="international_end_date" name="international_end_date"
                                                class="text-sm font-Inter font-normal text-slate-600 block w-full py-3 px-4 border border-slate-400 rounded-md focus:outline-none focus:ring-0 mt-1"
                                                placeholder="Masukkan waktu">
                                            <p id="international_end_date_danger" class="text-danger-500 hidden end_date_danger">Waktu akhir tidak boleh melebihi waktu mulai</p>
                                        </div>

                                        <!-- File -->
                                        <div class="input-group">
                                            <label for="file"
                                                class="text-sm font-Inter font-normal text-slate-900 block">Berkas Pendukung</label>
                                            <input type="file" id="file" name="file"
                                                class="text-sm font-Inter font-normal text-slate-600 block w-full py-3 px-4 border border-slate-400 rounded-md focus:outline-none focus:ring-0 mt-1"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                        <button data-bs-dismiss="modal" type="button"
                                            class="btn inline-flex justify-center btn-outline-dark">Close</button>
                                        <button type="submit"
                                            class="btn inline-flex justify-center text-white bg-black-500"
                                            id="submit-button">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form Modal Area End -->
        </div>
    </div>

    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Ambil semua tombol delete
            $(".delete-btn").click(function(event) {
                event.preventDefault(); // Mencegah submit langsung

                let id = $(this).data("id"); // Ambil ID dari atribut data-id

                Swal.fire({
                    title: "Are you sure?",
                    text: "This action cannot be undone!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#delete-form-${id}`).submit(); // Submit form sesuai ID
                    }
                });
            });

            $('#international_rating, #international_start_date, #international_end_date').on('change', function() {
                const internationalRating = $('#international_rating').val();
                const internationalStartDate = $('#international_start_date').val();
                const internationalEndDate = $('#international_end_date').val();
                if (internationalRating.trim() === '' && internationalStartDate.trim() === '' && internationalEndDate.trim() === '') {
                    $('#international_rating, #international_start_date, #international_end_date').removeAttr('required');
                } else {
                    $('#international_rating, #international_start_date, #international_end_date').attr('required', 'required');
                }
            });

            $("#form-el input, #form-el select, #form-el textarea").on("input change", function() {
                checkDatePeriode('#banpt_start_date', '#banpt_end_date', '#banpt_end_date_danger')
                checkDatePeriode('#international_start_date', '#international_end_date', '#international_end_date_danger')

                checkForm('.end_date_danger')
            });
        });

        function openModal() {
            reset_form();
            $('#form-title').html('Tambah IKU 8');
            $('#form_modal').modal('show');
        }

        function edit(data) {
            reset_form();
            $('#form-title').html('Edit IKU 8');
            $("#file").prop("required", false); // Hapus required
            var currentAction = $("#form-el").attr("action");
            $("#form-el").attr("action", `${currentAction}/${data?.id}?_method=PUT`);

            // set edit data
            $('#name').val(data?.name);
            $('#banpt_rating').val(data?.banpt_rating);
            $('#banpt_start_date').val(data?.banpt_start_date);
            $('#banpt_end_date').val(data?.banpt_end_date);
            $('#international_rating').val(data?.international_rating);
            $('#international_start_date').val(data?.international_start_date);
            $('#international_end_date').val(data?.international_end_date);

            checkForm();

            $('#form_modal').modal('show');
        }

        function reset_form() {
            $("#form-el").attr("action", "{{ route('admin.iku-8.store') }}");

            let form = $("#form-el");
            form[0].reset();

            // Reset Select2
            form.find("select").val(null).trigger("change");

            // Reset File Input
            form.find("input[type='file']").val("");

            // Reset Textarea
            form.find("textarea").val("");

            $("#file").prop("required", true); // Tambahkan required kembali
        }
    </script>
@endpush
