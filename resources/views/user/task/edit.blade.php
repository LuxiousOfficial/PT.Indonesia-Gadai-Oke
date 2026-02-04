<x-layout-user>
  <section>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-md-12 col-12">
                <form method="post" action="/user/task/{{ $task->id }}">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                      <label class="form-label fw-bold" for="description">Description</label>
                      <textarea class="form-control @error('description')is-invalid @enderror" id="description" name="description" rows="3" required value="{{ old('description', $task->description) }}"></textarea>
                      @error('description')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label fw-bold" for="deadline">Deadline</label>
                      <input type="date" id="deadline" name="deadline" class="form-control form-control-lg w-50 @error('deadline')is-invalid @enderror" placeholder="Pilih tanggal lahir anda..." required value="{{ old('deadline', $task->deadline) }}"/>
                      @error('deadline')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label fw-bold" for="status">Status</label>
                      <select class="form-select" aria-label="Default select example" id="status" name="status">
                        <option selected>{{ old('status', $task->status) }}</option>
                        <option value="To do">To do</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Done">Done</option>
                      </select>
                    </div>

                      <div class="text-center text-lg-start mt-4 pt-2">
                        <button  type="submit" name="daftar" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg w-100" style="padding-left: 1.5rem; padding-right: 1.5rem;">Update Data</button>
                      </div>
                </form>
            </div>
        </div>
    </div>
</section>
</x-layout-user>