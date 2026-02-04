<title>PT. Astra Honda Motor || Simulasi Kredit</title>
<link rel="stylesheet" href="/css/karyawan.css">

<x-layout>
  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif  
    <section class="container mt-3">
        <div>
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-md-12 col-12">
                    <form action="/user/user" method="post">
                      @csrf
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label fw-bold" for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg @error('name')is-invalid @enderror" placeholder="Ketik nama lengkap anda..." required value="{{ old('name') }}"/>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                          <label class="form-label fw-bold" for="email">Email</label>
                          <input type="email" id="email" name="email" class="form-control form-control-lg @error('email')is-invalid @enderror" placeholder="Ketik alamat email anda..." required value="{{ old('email') }}"/>
                          @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                          <label class="form-label fw-bold" for="password">Password</label>
                          <input type="password" id="password" name="password" class="form-control form-control-lg @error('password')is-invalid @enderror" placeholder="Ketik password anda..." required/>
                          @error('password')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                          <label class="form-label fw-bold" for="admin">Admin</label>
                          <input type="number" id="admin" name="admin" class="form-control form-control-lg @error('admin')is-invalid @enderror" placeholder="Ketik status anda..." required value="{{ old('admin') }}"/>
                          @error('admin')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                          <label class="form-label fw-bold" for="project_manager">Project Manager</label>
                          <input type="number" id="project_manager" name="project_manager" class="form-control form-control-lg @error('project_manager')is-invalid @enderror" placeholder="Ketik status anda..." required value="{{ old('project_manager') }}"/>
                          @error('project_manager')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                          <button  type="submit" name="daftar" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg w-100" style="padding-left: 1.5rem; padding-right: 1.5rem;">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-layout>