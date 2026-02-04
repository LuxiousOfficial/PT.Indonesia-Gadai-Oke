<x-layout-user>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="fs-3 fw-bold text-warning text-capitalize">Data Task 5</h1>
    </div>
      <section class="form-pendaftaran bg-white rounded-3 p-4">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12 col-12">
                  <div class="table-responsive col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 small">
                        <table class="table table-sm text-center fs-5">
                          <thead class="fs-4">
                            <tr class="table table-info">
                              <th scope="col">Info</th>
                              <th scope="col">Keterangan</th>
                            </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>Description</td>
                            <td>{{ $taskkkkk->description }}</td>
                          </tr>
                          <tr>
                            <td>Deadline</td>
                            <td>{{ $taskkkkk->deadline }}</td>
                          </tr>
                          <tr>
                            <td>Status</td>
                            <td>{{ $taskkkkk->status }}</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="daftar text-center text-capitalize mt-5">
                      <a href="/user/taskkkkk" class="fs-5 fw-bold text-decoration-none py-3 px-3 bg-warning text-light rounded">Back</a>
                    </div>
                </div>
            </div>
        </div>
      </section>
</x-layout-user>