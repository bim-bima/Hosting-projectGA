<!-- Bootstrap core JavaScript-->
<script src="{{ asset ('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset ('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset ('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset ('template/js/sb-admin-2.min.js') }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Animation -->
<script src="{{ asset ('template-landing/vendor/aos/aos.js') }}"></script>
<script src="{{ asset ('template-landing/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset ('template-landing/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset ('template-landing/js/main.js') }}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>



{{-- search dropdown --}}

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script>
    $(document).ready(function(){
      $('.search_aktivitas').selectpicker()
    });
  </script>

<script>
	$(document).ready(function (){
		$('#table').DataTable();
	});
</script>
<script>
	$(document).ready(function (){
		$('#tableriwayat').DataTable();
	});
</script>
<script>
	$(document).ready(function (){
		$('#table_kendaraan').DataTable();
	});
</script>

{{-- alert home management pengajuan --}}
<script>
    $(document).ready(function () {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $('.btndeletepengajuan').click(function (e) {
                e.preventDefault();
                var deleteidpengajuan = $(this).closest("tr").find('.delete_id').val();
                swal({
                    title: "Apakah anda yakin?",
                    text: "Pengajuan ini akan di Hapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                        .then((willDelete) => {
                                if (willDelete) {

                                        var data = {
                                                "_token": $('input[name=_token]').val(),
                                                'id': deleteidpengajuan,
                                        };
                                        $.ajax({
                                                type: "DELETE",

                                                url: 'master_pic/' + deleteidpengajuan,

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

<script>
    $(document).ready(function () {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $('.btndeletepic').click(function (e) {
                e.preventDefault();
                var deleteidpic = $(this).closest("tr").find('.delete_id').val();
                swal({
                    title: "Apakah anda yakin?",
                    text: "Data Pic ini akan di Hapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                        .then((willDelete) => {
                                if (willDelete) {

                                        var data = {
                                                "_token": $('input[name=_token]').val(),
                                                'id': deleteidpic,
                                        };
                                        $.ajax({
                                                type: "DELETE",

                                                url: 'master_pic/' + deleteidpic,

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

<!-- user -->
<script>
    $(document).ready(function () {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $('.btndeleteuser').click(function (e) {
                e.preventDefault();
                var deleteiduser = $(this).closest("tr").find('.delete_id').val();
                swal({
                    title: "Apakah anda yakin?",
                    text: "Data User ini akan di Hapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                        .then((willDelete) => {
                                if (willDelete) {

                                        var data = {
                                                "_token": $('input[name=_token]').val(),
                                                'id': deleteiduser,
                                        };
                                        $.ajax({
                                                type: "DELETE",

                                                url: 'add_user/' + deleteiduser,

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

<!-- Alert Master_Kendaraan -->
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
					title: "Apakah anda yakin?",
					text: "Data Kendaraan ini akan di Hapus!",
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
<!-- Alert category asset -->
<script>
	$(document).ready(function () {
		$.ajaxSetup({
				headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});

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
												url: 'master_categoryasset/' + deleteid2,

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
<!-- Alert request -->
<script>
	$(document).ready(function () {

		$.ajaxSetup({
				headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});

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
												url: 'app_request/' + deleteid2,

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

		$('.btndelete2').click(function (e) {
				e.preventDefault();

				var deleteid2 = $(this).closest("tr").find('.delete_id').val();

				swal({
								title: "Apakah anda yakin?",
								text: "Data PIC ini akan di Hapus!",
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
								text: "Data Aktivitas ini akan di Hapus!",
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
								text: "Data Vendor ini akan di Hapus!",
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
								text: "Data Lokasi Asset ini akan di Hapus!",
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
								text: "Data Asset ini akan di Hapus!",
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

		$('.btndeleteaktivitas').click(function (e) {
				e.preventDefault();

				var deleteidi10 = $(this).closest("div").find('.delete_id').val();

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
<!-- Alert App Asset -->
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
					text: "Asset ini akan dihapus!",
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
<!-- Alert Delete Category -->
<script>
	$(document).ready(function () {

	$.ajaxSetup({
		headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('.btndeletecategory').click(function (e) {
		e.preventDefault();

		var deletecategory = $(this).closest("tr").find('.delete_id').val();

		swal({
						title: "Apakah anda yakin?",
						text: "Kategori ini akan di Hapus!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
				})
				.then((willDelete) => {
						if (willDelete) {

								var data = {
										"_token": $('input[name=_token]').val(),
										'id': deletecategory,
								};
								$.ajax({
										type: "DELETE",
										url: 'master_categoryasset/' + deletecategory,

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
<!-- Alert Delete Request-->
<script>
	$(document).ready(function () {

	$.ajaxSetup({
		headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('.btndeleterequest').click(function (e) {
		e.preventDefault();

		var deleterequest = $(this).closest("tr").find('.delete_id').val();

		swal({
						title: "Apakah anda yakin?",
						text: "Request ini akan di hapus!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
				})
				.then((willDelete) => {
						if (willDelete) {

								var data = {
										"_token": $('input[name=_token]').val(),
										'id': deleterequest,
								};
								$.ajax({
										type: "DELETE",
										url: 'app_request/' + deleterequest,

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
{{-- Alert Jenis Pengajuan --}}
<script>
	$(document).ready(function () {

	$.ajaxSetup({
		headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('.btndeletejenis').click(function (e) {
		e.preventDefault();

		var deletepengajuan = $(this).closest("tr").find('.delete_id').val();

		swal({
						title: "Apakah anda yakin?",
						text: "Pengajuan ini akan di hapus!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
				})
				.then((willDelete) => {
						if (willDelete) {

								var data = {
										"_token": $('input[name=_token]').val(),
										'id': deletepengajuan,
								};
								$.ajax({
										type: "DELETE",
										url: 'master_jenispengajuan/' + deletepengajuan,

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
{{-- Alert Perencanaan --}}
<script>

	$('.show_confirm').click(function(event) {
		var form =  $(this).closest("form");
		var name = $(this).data("name");
		event.preventDefault();
		swal({
				title: `Apakah Anda yakin?`,
				text: "Semua aktivitas di bulan ini akan dihapus!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				form.submit();
			}
		});
	});

</script>

{{-- <script type="text/javascript">

$('.show_confirm_pic').click(function(event) {
	var form =  $(this).closest("form");
	var name = $(this).data("name");
	event.preventDefault();
	swal({
			title: `Apakah anda yakin?`,
			text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			form.submit();
		}
	});
});

</script> --}}


