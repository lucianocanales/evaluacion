@extends('layouts.base')

@section('title','Articulos')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listado de Articulos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="articulos" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Número de artículo</th>
                      <th>Descripción</th>
                      <th>Inventario</th>
                      <th>Ubicación</th>
                      <th>Histoial</th>
                    </tr>
                    </thead>
                    <tbody>


                        @foreach ($articles as $article)
                            <tr>
                                <td>
                                     {{$article->number}}
                                </td>
                                <td>
                                     {{$article->description}}
                                </td>
                                <td>
                                     {{$article->inventario}}
                                </td>
                                <td>
                                    {{$article->country}}, {{$article->province}}, {{$article->city}}, {{$article->street}}
                                </td>
                                <td>
                                    <a href="{{ route('historial.index', $article->id) }}"><i class="fas fa-history"></i></a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>


                  </table>
                  {{ $articles->links() }}
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
