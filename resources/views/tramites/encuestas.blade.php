  @extends('adminlte::page')

  @section('title', 'IntranetPersoneria')


  @section('content')
      <!--ENCUESTAS -->
      <div class="card">
          <div class="card-body">
              <div class="container">
                  <form action="{{ route('encuestas.store', $encuesta) }}" method="POST">
                      @csrf
                      <div class="container text-center">
                          <div class="row">
                              <div class="col-12">
                                  <h3>ENCUESTA DE SATISFACCIÓN</h3>
                              </div>
                              <div class="col-6">
                                  <div class="input-group mb-3">
                                      <span class="input-group-text" id="basic-addon1">FECHA</span>
                                      <input name="fecha" type="date" class="form-control" placeholder="Fecha"
                                          aria-label="Username" aria-describedby="basic-addon1"
                                          value="{{ $encuesta->fecha }}">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <table height="15" class="table table-bordered table-hover table-sm">
                                  <thead>
                                      <td class="bg-success blancotd" width="400">
                                          <h4>ITEMS</h4>
                                      </td>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>
                                              <h6>¿Cómo califica usted la atención y amabilidad del funcionario que resolvió
                                                  su
                                                  solicitud?</h6>
                                          </td>
                                          <td>
                                              <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">ATENCIÓN</span>
                                                  <select name="atencion" class="form-control"
                                                      id="exampleFormControlSelect1">
                                                      <option value="EXCELENTE">EXCELENTE</option>
                                                      <option value="BUENO">BUENO</option>
                                                      <option value="REGULAR">REGULAR</option>
                                                      <option value="MALO">MALO</option>
                                                  </select>
                                              </div>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <h6>¿Cómo califica usted la asesoría y/o realización del trámite brindado por
                                                  el o
                                                  los funcionarios de la Personería?</h6>
                                          </td>
                                          <td>
                                              <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">ASESORÍA</span>
                                                  <select name="asesoria" class="form-control"
                                                      id="exampleFormControlSelect1">
                                                      <option value="EXCELENTE">EXCELENTE</option>
                                                      <option value="BUENO">BUENO</option>
                                                      <option value="REGULAR">REGULAR</option>
                                                      <option value="MALO">MALO</option>
                                                  </select>
                                              </div>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <h6>¿Cómo califica usted el tiempo esperado para ser atendido?</h6>
                                          </td>
                                          <td>
                                              <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">TIEMPO</span>
                                                  <select name="tiempo" class="form-control"
                                                      id="exampleFormControlSelect1">
                                                      <option value="EXCELENTE">EXCELENTE</option>
                                                      <option value="BUENO">BUENO</option>
                                                      <option value="REGULAR">REGULAR</option>
                                                      <option value="MALO">MALO</option>
                                                  </select>
                                              </div>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <h6>¿Cómo califica usted los espacios físicos de la Personería Municipal para
                                                  la
                                                  prestación del servicio?</h6>
                                          </td>
                                          <td>
                                              <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">ESPACIO</span>
                                                  <select name="espacios" class="form-control"
                                                      id="exampleFormControlSelect1">
                                                      <option value="EXCELENTE">EXCELENTE</option>
                                                      <option value="BUENO">BUENO</option>
                                                      <option value="REGULAR">REGULAR</option>
                                                      <option value="MALO">MALO</option>
                                                  </select>
                                              </div>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <h6>¿Cuál es el grado de satisfacción en general que tiene con la Personería
                                                  Municipal de Sabaneta?</h6>
                                          </td>
                                          <td>
                                              <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">SATISFACCIÓN</span>
                                                  <select name="satisfaccion" class="form-control"
                                                      id="exampleFormControlSelect1">
                                                      <option value="EXCELENTE">EXCELENTE</option>
                                                      <option value="BUENO">BUENO</option>
                                                      <option value="REGULAR">REGULAR</option>
                                                      <option value="MALO">MALO</option>
                                                  </select>
                                              </div>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>

                          <div class="input-group mb-3">
                              <span class="input-group-text">Observaciones</span>
                              <textarea name="observaciones" class="form-control" aria-label="With textarea">{{ $encuesta->strobservaciones }}</textarea>
                          </div>


                          <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Abogado</span>
                              <select name="funcionario" class="form-control" id="exampleFormControlSelect1">
                                  <option value="{{ $encuesta->strprofesional }}">{{ $encuesta->strprofesional }}</option>
                              </select>
                          </div>

                          <div class="input-group   mb-3">
                              <span class="input-group-text" id="basic-addon1">Cédula</span>
                              <input name="cedula" type="text" class="form-control" placeholder="Cédula"
                                  aria-label="Cédula" aria-describedby="basic-addon1" value="{{ $encuesta->intcedula }} ">
                          </div>
                          <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Nombre Usuario</span>
                              <input name="nombreUsuario" type="text" class="form-control"
                                  placeholder="Nombre Usuario" aria-label="Nombre Usuario"
                                  aria-describedby="basic-addon1" value="{{ $encuesta->strnombres }} ">
                          </div>
                          <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Teléfono</span>
                              <input name="telefono" type="text" class="form-control" placeholder="Teléfono"
                                  aria-label="Teléfono" aria-describedby="basic-addon1"
                                  value="{{ $encuesta->strtelefono }} ">
                          </div>
                          <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Dirección</span>
                              <input name="direccion" type="text" class="form-control" placeholder="Dirección"
                                  aria-label="Dirección" aria-describedby="basic-addon1"
                                  value="{{ $encuesta->strdireccion }} ">
                          </div>
                          <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Email</span>
                              <input name="email" type="text" class="form-control" placeholder="Email"
                                  aria-label="Email" aria-describedby="basic-addon1" value="{{ $encuesta->email }} ">
                          </div>

                          <div class="form-row">
                              <div class="col-md-2 mb-2">
                                  <button type="submit" class="btn btn-success form-control cambiar_color">Adicionar
                                      Encuesta</button>
                                  <input type="hidden" name="MM_insert" value="form1" />
                              </div>
                          </div>

                  </form>

              </div>
          </div>
      </div>

      {{-- <div class="card">
          <div class="card-body">
              <div class="row">
                  <div class="col-3">
                      <x-adminlte-card title="Atención" theme="success" icon="fas fa-lg fa-fan" removable collapsible>
                          <canvas id="encuesta">
                      </x-adminlte-card>
                  </div>

                  <div class="col-3">
                      <x-adminlte-card title="Asesoría" theme="success" icon="fas fa-lg fa-fan" removable collapsible>
                          <canvas id="encuesta2">
                          </canvas>
                      </x-adminlte-card>
                  </div>
                  <div class="col-2">
                      <x-adminlte-card title="Tiempo" theme="success" icon="fas fa-lg fa-fan" removable collapsible>
                          <canvas id="encuesta3">
                          </canvas>
                      </x-adminlte-card>
                  </div>
                  <div class="col-2">
                      <x-adminlte-card title="Espacios" theme="success" icon="fas fa-lg fa-fan" removable collapsible>
                          <canvas id="encuesta4">
                          </canvas>
                      </x-adminlte-card>
                  </div>
                  <div class="col-2">
                      <x-adminlte-card title="Satisfacción" theme="success" icon="fas fa-lg fa-fan" removable
                          collapsible>
                          <canvas id="encuesta5">
                          </canvas>
                      </x-adminlte-card>
                  </div>
              </div>

          </div>
      </div>
 --}}

  @stop

  @section('css')
      <link rel="stylesheet" href="/css/admin_custom.css">
  @stop

  @section('js')

      {{--   <script>
          const ctx = document.querySelector('#encuesta').getContext('2d');
          const labels = {!! json_encode($atencion->pluck('atencion')) !!};
          const stackedBar = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: labels,
                  datasets: [{
                      label: 'Atención a los Usuarios',
                      data: {!! json_encode($atencion->pluck('total')) !!},
                      backgroundColor: 'rgba(75,192,192,0.2)',
                      borderColor: 'rgba(75,192,192,0.1)',
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      x: {
                          stacked: true
                      },
                      y: {
                          stacked: true
                      }
                  }
              }
          });

          const ctx2 = document.querySelector('#encuesta2').getContext('2d');
          const labels2 = {!! json_encode($asesoria->pluck('asesoria')) !!};
          const stackedBar = new Chart(ctx2, {
              type: 'bar',
              data: {
                  labels: labels2,
                  datasets: [{
                      label: 'Asesoría a los Usuarios',
                      data: {!! json_encode($asesoria->pluck('total')) !!},
                      backgroundColor: 'rgba(75,192,192,0.2)',
                      borderColor: 'rgba(75,192,192,0.1)',
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      x: {
                          stacked: true
                      },
                      y: {
                          stacked: true
                      }
                  }
              }
          });

          const ctx3 = document.querySelector('#encuesta3').getContext('2d');
          const labels3 = {!! json_encode($tiempo->pluck('tiempo')) !!};
          const stackedBar = new Chart(ctx3, {
              type: 'bar',
              data: {
                  labels: labels3,
                  datasets: [{
                      label: 'Tiempo a los Usuarios',
                      data: {!! json_encode($tiempo->pluck('total')) !!},
                      backgroundColor: 'rgba(75,192,192,0.2)',
                      borderColor: 'rgba(75,192,192,0.1)',
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      x: {
                          stacked: true
                      },
                      y: {
                          stacked: true
                      }
                  }
              }
          });

          const ctx4 = document.querySelector('#encuesta4').getContext('2d');
          const labels4 = {!! json_encode($espacios->pluck('espacios')) !!};
          const stackedBar = new Chart(ctx4, {
              type: 'bar',
              data: {
                  labels: labels4,
                  datasets: [{
                      label: 'Espacios Físicos',
                      data: {!! json_encode($espacios->pluck('total')) !!},
                      backgroundColor: 'rgba(75,192,192,0.2)',
                      borderColor: 'rgba(75,192,192,0.1)',
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      x: {
                          stacked: true
                      },
                      y: {
                          stacked: true
                      }
                  }
              }
          });

          const ctx5 = document.querySelector('#encuesta5').getContext('2d');
          const labels5 = {!! json_encode($satisfaccion->pluck('satisfaccion')) !!};
          const stackedBar = new Chart(ctx5, {
              type: 'bar',
              data: {
                  labels: labels5,
                  datasets: [{
                      label: 'Satisfacción Usuarios',
                      data: {!! json_encode($satisfaccion->pluck('total')) !!},
                      backgroundColor: 'rgba(75,192,192,0.2)',
                      borderColor: 'rgba(75,192,192,0.1)',
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      x: {
                          stacked: true
                      },
                      y: {
                          stacked: true
                      }
                  }
              }
          });
      </script> --}}
  @stop
