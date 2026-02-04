<x-layout-user>
    <section class="form-pendaftaran rounded-3 mt-3">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12 col-12 bg-white rounded-3 py-4 px-4 mt-3">
                  <h2 class="fw-bold my-2 text-center">Data User</h2>
                  <div class="table-responsive col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 small shadow-3">
                      <table class="table table-sm text-center">
                        <thead>
                            <tr class="table table-warning fw-bold text-center">
                              <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Developer</th>
                              </tr>
                        </thead>
                      <tbody>
                        <tr>
                            <td style="color: black"> <span style="font-weight: bold">
                                {{ $user->name }}
                            </td>
                            <td style="color: black"> <span style="font-weight: bold"> 
                                {{ $user->email }}
                            </td>
                            <td style="color: black"> <span style="font-weight: bold"> 
                                {{ $user->is_developer }}
                            </td>
                        </tr>
                        <thead>
                            <tr class="table table-warning fw-bold text-center">
                                <th scope="col">Admin</th>
                              </tr>
                        </thead>
                        <tr>
                            <td style="color: black"> <span style="font-weight: bold">
                                {{ $user->is_admin }}
                            </td>
                        </tr>
                      </tbody>
                      </table>
                  </div>
                </div>

              <a href="/user/user" class="fs-5 fw-bold text-decoration-none p-2 mb-3 bg-warning text-white rounded">Back</a>
              
            </div>
        </div>
    </section>
</x-layout-user>