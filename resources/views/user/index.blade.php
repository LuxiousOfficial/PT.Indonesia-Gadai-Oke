<x-layout-user>
    @cannot('admin')
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-6 col-6 my-2">
                    <div class="card sport shadow" style="background-color: rgb(67, 241, 67); height: 7rem">
                        <div class="card-body text-center" style="color: white">
                          <h4 class="card-title fs-4">Data Task 1</h4>
                          <h4 class="card-title fs-4">{{ $tasks }}</h4>
                        </div>
                      </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-6 col-6 my-2">
                    <div class="card sport shadow" style="background-color: rgb(238, 238, 19); height: 7rem">
                        <div class="card-body text-center" style="color: white">
                          <h4 class="card-title fs-4">Data Task 2</h4>
                          <h4 class="card-title fs-4">{{ $taskks }}</h4>
                        </div>
                      </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-6 col-6 my-2">
                    <div class="card sport shadow" style="background-color: orange; height: 7rem">
                        <div class="card-body text-center" style="color: white">
                          <h4 class="card-title fs-4">Data Task 3</h4>
                          <h4 class="card-title fs-4">{{ $taskkks }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-6 col-6 my-2">
                  <div class="card sport shadow" style="background-color: rgb(27, 204, 204); height: 7rem">
                      <div class="card-body text-center" style="color: white">
                        <h4 class="card-title fs-4">Data Task 4</h4>
                        <h4 class="card-title fs-4">{{ $taskkkks }}</h4>
                      </div>
                  </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-6 col-6 my-2">
                    <div class="card sport shadow" style="background-color: rgb(233, 25, 25); height: 7rem">
                        <div class="card-body text-center" style="color: white">
                          <h4 class="card-title fs-4">Data Task 5</h4>
                          <h4 class="card-title fs-4">{{ $taskkkkks }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endcannot
</x-layout-user>