@extends('layouts.base')

@section('title','Hitorial')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Movimientos históricos del inventario del articulo N° {{$article->number}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>fecha</th>

                    </tr>
                    </thead>
                    <tbody>


                        @foreach ($hitorial as $article)
                            <tr>
                                <td>
                                    {{$article->type}}
                               </td>

                                <td>
                                     {{$article->amount}}
                                </td>
                                <td>
                                     {{$article->date}}
                                </td>



                            </tr>

                        @endforeach

                    </tbody>


                  </table>
                  {{ $hitorial->links() }}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
        </div>
</div>
</section>
@endsection

@section('stripts')
    <script>
        $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        });
    </script>
@endsection
