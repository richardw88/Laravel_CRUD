<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Web App</title>
</head>

<body>
    <h1 class="text-center mb-4 mt-2">Data Pegawai</h1>
    <div class="container">
        <a href="/tambahPegawai" class="btn btn-primary mb-2">Tambah Data</a>


        <div class="mb-3 mt-2">
        <form action="" method="GET">
            <input type="search" placeholder="Search" name="search" class="form-control" id="search">
        </form>
        </div>


        <div class="row">
            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Di Buat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nomor = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                        <tr>
                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                            <td> {{ $row->nama }} </td>
                            <td>
                                <img src="{{ asset('fotopegawai/' . $row->foto) }}" width="40px" alt="">
                            </td>
                            <td> {{ $row->jenisKelamin }} </td>
                            <td> 0{{ $row->noTelepon }} </td>
                            <td> {{ $row->created_at->format('D M Y') }} </td>
                            <td>
                                <a href="/editDataPegawai/{{ $row->id }}" class="btn btn-success">Edit</a>
                                <a href="#" class="btn btn-danger delete"  data-id="{{ $row->id }}"
                                    data-nama="{{ $row->nama }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{ $data->links() }}
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
    $(".delete").click(function() {
        var id = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
                title: "Apakah Anda Yakin?",
                text: "Apakah Anda ingin menghapus Data Pegawai dengan nama "+nama+"  ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deleteDataPegawai/"+id+""
                    swal("Data Berhasil di Hapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak hapus");
                }
            });
    });
</script>
<script>
    @if (Session::has('success'))
        toastr.success(" {{ Session::get('success') }} ")
    @endif
</script>

</html>
