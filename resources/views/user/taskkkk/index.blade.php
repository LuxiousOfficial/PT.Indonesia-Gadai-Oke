<x-layout-user>
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('update'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      {{ session('update') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="fs-3 fw-bold text-warning text-capitalize">Data Task 4</h1>
    </div>

    <section class="bg-white rounded-3 p-4">
      @can('manager')
      <div class="row">
        <div class="col-md-8 col-12">
          <a href="/user/taskkkk/create" class="btn btn-warning mb-3 fw-bold">Add Task</a>
        </div>
      </div>
      @endcan

      <div class="table-responsive col-xxl-12 col-xl-12 col-md-12 col-12 small">
          <table class="table table-sm">
            <thead>
              <tr class="table table-warning text-black fw-bold text-center">
                <th scope="col">No</th>
                <th scope="col">Action</th>
                <th scope="col">Created At</th>
                <th scope="col">Description</th>
                <th scope="col">Deadline</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tasks as $task)
              <tr class="text-center text-black fw-bold">
                  <td>{{ $loop->iteration }}</td>
                  <td class="d-flex">
                    <a href="/user/taskkkk/{{ $task->id }}" class="btn btn-info px-3 fw-bold border-0">Details</a>
                    <a href="/user/taskkkk/{{ $task->id }}/edit" class="btn btn-warning px-3 fw-bold border-0 mx-2">Edit</a>
                    @can('manager')
                    <form method="post" action="/user/taskkkk/{{ $task->id }}">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger px-3 fw-bold border-0" onclick="return confirm('Apa kamu yakin mau menghapus data ini?')">Delete</button>
                    </form>
                    @endcan
                  </td>
                  <td style="color: black;">{{$task->created_at->format("j-m-Y H:i:s")}}</td>
                  <td style="color: black;">{{ $task->description }}</td>
                  <td style="color: black;">{{ $task->deadline }}</td>
                  <td style="color: black;">{{ $task->status }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
</x-layout-user>