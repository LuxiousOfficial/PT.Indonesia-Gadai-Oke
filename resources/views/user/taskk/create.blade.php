<title>PT. Astra Honda Motor || Penerimaan Calon Karyawan</title>
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
                    <form method="post" action="/user/taskk">
                      @csrf

                      <div class="mb-3">
                        <label class="form-label fw-bold" for="description">Description</label>
                        <textarea class="form-control @error('description')is-invalid @enderror" id="description" name="description" rows="3" required value="{{ old('description') }}"></textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>

                      <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label fw-bold" for="deadline">Deadline</label>
                        <input type="date" id="deadline" name="deadline" class="form-control form-control-lg w-50 @error('deadline')is-invalid @enderror" placeholder="Ketik tanggal lahir anda..." required value="{{ old('deadline') }}"/>
                        @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>

                      <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label fw-bold" for="status">Status</label>
                        <select class="form-select" aria-label="Default select example" id="status" name="status">
                          <option selected>Silahkan Pilih</option>
                          <option value="To do">To do</option>
                          <option value="In Progress">In Progress</option>
                          <option value="Done">Done</option>
                        </select>
                      </div>
                          
                      <div class="text-center text-lg-start mt-4 pt-2">
                        <button  type="submit" name="daftar" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg w-100" style="padding-left: 1.5rem; padding-right: 1.5rem;">Save</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>