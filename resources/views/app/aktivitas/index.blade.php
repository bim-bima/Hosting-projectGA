<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

 
  
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>General Affair</title>
  @include('template.head')
  <style> 
      .fc-event-hover{
        position: relative !important ;
        height:   17px; 
      }
      .fc-event-hover .fc-content{
        position: absolute !important ;
        top: 1px;
        left: 0;
        z-index: 999999;
        width:  auto;
        overflow: visible !important;
        background-color: rgba(0, 0, 0, 0.8);
        padding: 15px;
        border-radius: 5px;
      }
      .fc-content-skeleton tr td:last-child .fc-event-hover .fc-content {
        left: auto;
        right:  0;
      }

  </style>  
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Modal -->
    <div class="modal fade centered" id="aktivitasmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Aktivitas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body row">
            <!-- <div class="col-12 mb-2">
              <label for="category" class="form-label">Category Aktivitas</label>
              <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                <option value="">Pilih Category Aktivitas</option>
                @foreach ($maktivitas as $aktivitas)
                <option value="{{ $aktivitas->ma_category_aktivitas }}">{{ $aktivitas->ma_category_aktivitas }}</option>
                @endforeach    
              </select>
              @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div> -->

            <!-- <div class="col-12 mb-2">
              <label for="title" class="form-label">Aktivitas</label>
              <select name="title" id="title" class="form-control @error('title') is-invalid @enderror " 
              data-live-search="true" required>
                <option value="">Pilih Aktivitas</option>
                @foreach ($maktivitas as $aktivitas)
                <option value="{{ $aktivitas->ma_nama_aktivitas }}">{{ $aktivitas->ma_nama_aktivitas}}</option>
                @endforeach    
              </select>
              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div> -->


      <div class="col-md-12">  
          <div class="form-group">  
              <label for="title">Aktivitas</label>
              <input type="text" id="title" name="title" list="list_title" class="form-control">
             <datalist id="list_title" class="select2">  
                @foreach ($maktivitas as $aktivitas)
                  <option value="{{ $aktivitas->ma_nama_aktivitas }}">{{ $aktivitas->ma_nama_aktivitas}} <p class="hidden"> Category : {{ $aktivitas->ma_category_aktivitas}}</p></option>
                @endforeach
              </datalist> 
          </div>  
      </div>

    <script>
      $(document).ready(function() {
        $('.select2').select2();
      });
    </script>


            <div class="form-check mb-3 ml-3 col-6">
              <input class="form-check-input" type="checkbox" value="reminder" id="reminder" >
              <label class="form-check-label p-0" for="reminder">
                Reminder
              </label>
            </div>
            <div class="col-md-6">
              <label class="form-label">Ulangi</label>
              <select name="ulangi" id="ulangi" class="custom-select custom-select-md mb-3">
                <option value="oneday">Hanya Hari ini</option>
                <option value="allday">Setiap Hari</option>
                <option value="twodays">2Hari 1x</option>
                <option value="threedays">3Hari 1x</option>
                <option value="fourdays">4Hari 1x</option>
                <option value="fivedays">5Hari 1x</option>
                <option value="sixdays">6Hari 1x</option>
                <option value="weekly">Seminngu 1x</option>
              </select>
            </div>
            <div class="col-md-6 mb-1">
              <label for="todate" class="form-label">Sampai Tanggal</label>
              <input type="date" class="form-control" id="todate">
              @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-12">
              <label class="form-label">Prioritas</label>
              <select name="prioritas" id="prioritas" class="custom-select custom-select-md mb-3">
                <option value="rendah" class="text-primary">Rendah</option>
                <option value="sedang" class="text-success">Sedang</option>
                <option value="utama" class="text-danger">Tinggi</option>
              </select>
            </div>
            <div class="mb-1">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" rows="3"></textarea>
            </div>
            <span id="titleError" class="text-danger"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fa fa-times"></i>
              Tutup
            </button>
            <button type="button" id="saveBtn" class="btn btn-success">
              <i class="fa fa-plus-circle"></i>
              Tambah Aktivitas
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Sidebar -->
    @include('template.sidebar')
    <!-- End of Sidebar -->
    <!-- Sweet Alert -->
    @include('sweetalert::alert')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        @include('template.topbar')
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid p-sm-2 p-0">
          <div class="card shadow mb-4">
            <div class="card-header px-sm-3 px-2 py-3">
              <div class="align-items-center">
                <div class="d-flex">
                  <div class="">
                    <a href="{{ route('app_perencanaan.index') }}" class="text-light btn-sm text-decoration-none btn-circle btn-primary">
                      <i class="fa fa-angle-left"></i>
                    </a>
                  </div>
                  <div class="ml-1 mt-1">
                    <h6 class="font-weight-bold text-primary">Aktivitas</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-sm-3 px-2">
              <div id='calendar'></div>
            </div>
          </div>
        </div>
      </div>
      @include('template.footer')
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Anda akan keluar dari halaman ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-primary" href="login.html">Ya</a>
        </div>
      </div>
    </div>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  <!-- Calendar -->
  <script>
    $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        var aktivitas = @json($events);
        $('#calendar').fullCalendar({
            header:{
            left:'month',
            center:'title',
            right:'month'
            },
            defaultDate: moment('{{ $perencanaan->ap_tahun.$perencanaan->ap_bulan }}'),
            events:aktivitas,
            selectable:true,
            selectHelper:true,
            @if(auth()->user()->level == "general-affair")
            select: function (start, end, allDays)
            {
                $('#aktivitasmodal').modal('toggle');

                $('#saveBtn').click(function(){
                    var title = $('#title').val();
                    var reminder = $('#reminder').val();
                    var ulangi = $('#ulangi').val();
                    var todate = $('#todate').val();
                    var start_date = moment(start).format('YYYY-MM-DD');
                    var end_date = moment(end).format('YYYY-MM-DD');
                    var deskripsi = $('#deskripsi').val();
                    var prioritas = $('#prioritas').val();
                $.ajax({
                    url: "{{ route('app_aktivitas.store') }}",
                    type: "POST",
                    dataType: 'json',
                    data: { title, reminder, ulangi, todate,  start_date, end_date, deskripsi, prioritas},
                    success:function(response)
                    {
                      location.reload()
                      $('.fc-event').mouseenter(function() {
                            $(this).addClass('fc-event-hover');
                      });
                      $('.fc-event').mouseleave(function() {
                            $(this).removeClass('fc-event-hover');
                      });
                      $('.fc-event').css('color','white');
                      $('.fc-event').css('font-size','15px');
                      $('.fc-event').css('padding','2px');
                      $('#aktivitasmodal').modal('hide')
                      $('#calendar').fullCalendar('refetchEvents');
                      $('#calendar').fullCalendar('renderEvent',{
                        'title'      : response.title,
                        'reminder'   : response.reminder,
                        'ulangi'     : response.ulangi,
                        'todate'     : response.todate,
                        'start'      : response.start,
                        'end'        : response.end,
                        'deskripsi'  : response.deskripsi,
                        'prioritas'  : response.prioritas,
                        'color'      : response.color,
                      });
                    },
                    error:function(error)
                    {
                      if(error.responseJSON.errors){
                        $('#titleError').html(error.responseJSON.errors.title)
                      }
                    },
                  });
                });
            },
            editable:true,
            eventDrop:function(event) {
                var id = event.id;
                var start_date = moment(event.start).format('YYYY-MM-DD');
                var end_date = moment(event.end).format('YYYY-MM-DD');

                $.ajax({
                    url: "{{ route('app_aktivitas.update', '') }}" +'/'+ id,
                    type: "PATCH",
                    dataType: 'json',
                    data: {start_date, end_date },
                    success:function(response)
                    {
                      console.log(response)
                      $('.fc-event').mouseenter(function() {
                            $(this).addClass('fc-event-hover');
                      });
                      $('.fc-event').mouseleave(function() {
                            $(this).removeClass('fc-event-hover');
                      });
                      $('.fc-event').css('color','white');
                      $('.fc-event').css('font-size','15px');
                      $('.fc-event').css('padding','2px');

                    },
                    error:function(error)
                    {
                      console.log(error)
                    },
                  });
            },   
            eventClick: function(event){
              var id = event.id; 
              if(confirm('yakin ingin menghapus ini ')){
                    $.ajax({
                    url: "{{ route('app_aktivitas.destroy', '') }}" +'/'+ id,
                    type: "DELETE",
                    dataType: 'json',
                    success:function(response)
                    {
                      $('#calendar').fullCalendar('removeEvents' ,response);
                      $('.fc-event').mouseenter(function() {
                            $(this).addClass('fc-event-hover');
                      });
                      $('.fc-event').mouseleave(function() {
                            $(this).removeClass('fc-event-hover');
                      });
                      $('.fc-event').css('color','white');
                      $('.fc-event').css('font-size','15px');
                      $('.fc-event').css('padding','2px');
                    },
                    error:function(error)
                    {
                      console.log(error)
                    },
                  });    
              }         
            },
            @endif
    });

        $('.fc-event').mouseenter(function() {
              $(this).addClass('fc-event-hover');
        });
        $('.fc-event').mouseleave(function() {
              $(this).removeClass('fc-event-hover');
        });
        $("#aktivitasmodal").on("hidden.bs.modal", function() {
          $('#title').val('');
           $('.fc-event').css('color','white');
           $('.fc-event').css('font-size','15px');
           $('.fc-event').css('font-weight','bold');
           $('.fc-event').css('padding','5px');
          $('#saveBtn').unbind();
        });

        $('.fc-event').css('font-size','15px');
        $('.fc-event').css('font-weight','bold');
        $('.fc-event').css('padding','5px');
        $('.fc-view-container').css('background-color','rgb(176,196,222,0.1)');
        $('.fc-center h2').css('color','blue');
        $('.fc-month-button').css('color','blue');
        $('.fc-agendaDay-button').css('color','blue');
        $('.fc-agendaWeek-button').css('coF#lor','blue');
        $('.fc-event').css('color','white');
      });
  </script>
</body>
@include('template.script')  
</html>


        <!-- DONT DELETE THE TEXT BELOW -->
        <!-- DONT DELETE THE TEXT BELOW -->
        <!-- DONT DELETE THE TEXT BELOW -->


{{-- //     $(document).ready(function() {
//     var $months = $('#months');
//     var $calendar = $('#calendar');

//     $calendar.fullCalendar({
//         viewRender: function() {
//             buildMonthList();
//         }
//     });

//     $('#months').on('change', function() {
//         $calendar.fullCalendar('gotoDate', $(this).val());
//     });

//     buildMonthList(); // set initial jump list on load

//     function buildMonthList() {
//         $('#months').empty(); // clear jump list
//         var month = $calendar.fullCalendar('getDate');
//         var initial = month.format('YYYY-MM'); // where are we?
//         month.add(-6, 'month'); // 6 months past
//         for (var i = 0; i < 13; i++) { // 6 months future
//             var opt = document.createElement('option');
//             opt.value = month.format('YYYY-MM-01');
//             opt.text = month.format('MMM YYYY');
//             opt.selected = initial === month.format('YYYY-MM'); // current selection
//             $months.append(opt);
//             month.add(1, 'month');
//         }
//     }
// }); --}}


  {{-- });
    </script>
    </body>
    
   @include('template.script')  
</html> --}}

<!-- <html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    @include('template.head')


  <title>General Affair </title>
</head>
<body>
  <div class="col-lg-8">
  <div id="calendar">
  </div>
    
  </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        var aktivitas = @json($events);
        $('#calendar').fullCalendar({
          header:{
          'left':'prev,next today',
          'center':'title',
          'right':'month,agendaWeek,agendaDay' 
          },
          events: aktivitas,
          selectable:true,
          selectHelper:true,
          select: function (start, end, allDays)
            {
                $('#aktivitasmodal').modal('toggle');

                $('#saveBtn').click(function(){
                    var title = $('#title').val();
                    var start_date = moment(start).format('YYYY-MM-DD');
                    var end_date = moment(end).format('YYYY-MM-DD');

                $.ajax({
                    url: "{{ route('app_aktivitas.store') }}",
                    type: "POST",
                    dataType: 'json',
                    data: {title,start_date,end_date},
                    success:function(response)
                    {
                      $('#aktivitasmodal').modal('hide')
                      // $('#calendar').fullCalendar('renderEvent');
                      // alert("Added Successfully");
                      // $('#calendar').fullCalendar('renderEvents',{
                      //   'title' : response.title,
                      //   'start' : response.start_date,
                      //   'end'   : response.end_date
                      // });
                    },
                    error:function(error)
                    {
                      if(error.responseJSON.errors){
                        $('#titleError').html(error.responseJSON.errors.title);
                      }
                    },
                });
            }); 
            },
            editable: true,

    })
  });


  </script>
</html> 


