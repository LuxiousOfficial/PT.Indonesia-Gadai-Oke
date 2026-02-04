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
      <h1 class="fs-3 fw-bold text-warning text-capitalize">Data User</h1>
    </div>

    <section class="bg-white rounded-3 p-4">
      <div class="row">
        <div class="col-md-8 col-10">
          <a href="/user/user/create" class="btn btn-warning mb-3 fw-bold">Add User</a>
        </div>
      </div>

      
    <div class="row">
      <div class="col-xxl-8 col-xl-8 col-md-8 col-12">
        <form class="d-flex my-3" role="search">
          <input style="height: 3rem" class="form-control bg-gray-100" type="search" id="search" name="search" placeholder="Cari Data User" aria-label="Search" autocomplete="off">
          <button style="height: 3rem" class="btn btn-outline-success bg-warning fw-bold text-white border-0 fs-5" type="submit">Search</button>
        </form>
      </div>
    </div>

    <div class="table-responsive col-xxl-12 col-xl-12 col-md-12 col-12 small">
      <table class="table table-sm">
        <thead>
          <tr class="table table-warning text-center text-black fw-bold">
            <th scope="col">No</th>
            <th scope="col">Action</th>
            <th scope="col">Created at</th>
            <th scope="col">Position</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Admin</th>
            <th scope="col">Project Manager</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr class="text-center text-black fw-bold">
          <td>{{ $loop->iteration }}</td>
          <td class="d-flex">
            <a href="/user/user/{{ $user->id }}" class="btn bg-info px-3 fw-bold border-0 text-white">Details</a>
            <a href="/user/user/{{ $user->id }}/edit" class="btn bg-warning px-3 fw-bold border-0 mx-2 text-white">Edit</a>
            <form action="/user/user/{{ $user->id }}" method="post">
              @method('delete')
              @csrf
              <button class="btn bg-danger px-3 fw-bold border-0 text-white" onclick="return confirm('Apa kamu yakin mau menghapus data ini?')">Delete</button>
            </form>
          </td> 
          <td style="color: black;">{{$user->created_at->format("j-m-Y H:i:s")}}</td>
          <td style="color: black;">{{ $user->name }}</td>
          <td style="color: black;">{{ $user->email }}</td>
          <td style="color: black;">{{ $user->password }}</td>
          <td style="color: black;">{{ $user->admin }}</td>
          <td style="color: black;">{{ $user->project_manager }}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    
    {{-- <div class="paginate mt-3">
      {{ $users->links() }}
    </div> --}}
    </section>
  </div>
</x-layout-user>