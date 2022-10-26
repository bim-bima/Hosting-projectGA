<!-- Bootstrap core JavaScript-->
<script src="{{ asset ('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset ('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset ('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset ('template/js/sb-admin-2.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset ('template/vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset ('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{ asset ('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{ asset ('template/js/sb-admin-2.min.js') }}"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- alert-pic -->
<script>
  $(document).ready(function() {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.btndelete').click(function(e) {
      e.preventDefault();

      var deleteid = $(this).closest("tr").find('.delete_id').val();

      swal({
          title: "Apakah anda yakin?",
          text: "Setelah dihapus, Anda tidak dapat memulihkan Tag ini lagi!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

            var data = {
              "_token": $('input[name=_token]').val(),
              'id': deleteid,
            };
            $.ajax({
              type: "DELETE",
              url: 'master_pic/' + deleteid,

              data: data,
              success: function(response) {
                swal(response.status, {
                    icon: "success",
                  })
                  .then((result) => {
                    location.reload();
                  });
              }
            });
          }
        });
    });

  });
</script>

<!-- alert-aktivitas -->
<script>

    $(document).ready(function () {

</script>


    <!-- Alert Kendaraan -->
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete').click(function (e) {
                e.preventDefault();

                var deleteid = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin ingin menghapus data kendaraan?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'master_kendaraan/' + deleteid,

                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });


        });

    </script>

    <!-- Alert Pic -->
    <script>
                $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


                    var data = {
                        "_token": $('input[name=_token]').val(),
                        'id': deleteid,
                    };
                    $.ajax({
                        type: "DELETE",
                        url: 'master_aktivitas/' + deleteid,

        $('.btndelete2').click(function (e) {
            e.preventDefault();

            var deleteid2 = $(this).closest("tr").find('.delete_id').val();

            swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token]').val(),
                            'id': deleteid2,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: 'master_pic/' + deleteid2,

                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });


        });
    </script>

    <!-- Alert Aktivitas -->
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete3').click(function (e) {
                e.preventDefault();

                var deleteid3 = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid3,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'master_aktivitas/' + deleteid3,

                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });

    </script>

    <!-- Alert Vendor -->
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete4').click(function (e) {
                e.preventDefault();

                var deleteid4 = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid4,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'master_vendor/' + deleteid4,

                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });

    </script>

    <!-- Alert Barang -->
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete5').click(function (e) {
                e.preventDefault();

                var deleteid5 = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid5,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'master_barang/' + deleteid5,

                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });

    </script>

    <!-- Alert Jenis Barang -->
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete6').click(function (e) {
                e.preventDefault();

                var deleteid6 = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid6,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'master_jenisbarang/' + deleteid6,

                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });

    </script>

    <!-- alert Status Follow Up -->
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete7').click(function (e) {
                e.preventDefault();

                var deleteid7 = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid7,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'master_statusfollowup/' + deleteid7,

                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });

    </script>

    <!-- Alert Lokasi Asset -->
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete8').click(function (e) {
                e.preventDefault();

                var deleteid8 = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid8,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'master_lokasiasset/' + deleteid8,

                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });

    </script>

    <!-- Alert Asset -->
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndeleteasset').click(function (e) {
                e.preventDefault();

                var deleteidasset = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteidasset,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'app_asset/' + deleteidasset,

                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });

    </script>

    <!-- Alert Item -->
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndeleteitem').click(function (e) {
                e.preventDefault();

                var deleteiditem = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteiditem,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'app_kendaraan/' + deleteiditem,

                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });

    </script>

    <!-- Alert Perencanaan -->
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete10').click(function (e) {
                e.preventDefault();

                var deleteidi10 = $(this).closest("div").find('.delete_id2').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteidi10,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'app_perencanaan/' + deleteidi10,

                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });

    </script>

