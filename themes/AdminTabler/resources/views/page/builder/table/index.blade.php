<div class="card">
    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <div class="text-muted">
                Show
                <div class="mx-2 d-inline-block">
                  <select class="form-control form-control-sm">
                    <option>10</option>
                    <option>15</option>
                    <option>20</option>
                    <option>30</option>
                    <option>50</option>
                  </select>
                </div>
                entries
            </div>
            <div class="ms-auto text-muted">
                Search:
                <div class="ms-2 d-inline-block">
                    <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable" x-data="{
            selectAll: false,
            itemsCard: [],
            checkOne(){

            },
            selectAllCheckboxes() {
                this.selectAll = !this.selectAll
        
                let checkboxes = document.querySelectorAll('.item-select-input');
                let allValues = [];
        
                [...checkboxes].map((el) => {
                    allValues.push(el.value)
        
                    this.itemsCard = this.selectAll ? allValues : []
                })
            }
        }">
            <thead>
                <tr>
                    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                            aria-label="Select all" x-on:click="selectAllCheckboxes()"></th>
                    <th class="w-1"><button class="table-sort">No.</button></th>
                    @foreach ($fields as $field)
                        <th><button class="table-sort"> {{ $field->getTableTitle() }}</button></th>
                    @endforeach
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td><input class="form-check-input item-select-input m-0 align-middle" type="checkbox"
                                aria-label="Select invoice"  value="{{$item->id}}" x-model="itemsCard"  x-on:click="checkOne()"></td>
                        <td><span class="text-muted">001402</span></td>
                        @foreach ($fields as $field)
                            <td>{!! $field->getValue($item) !!}</td>
                        @endforeach
                        <td class="text-end">
                            <span class="dropdown">
                                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                                    data-bs-toggle="dropdown">Actions</button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">
                                        Action
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        Another action
                                    </a>
                                </div>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex align-items-center">
        <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
        <ul class="pagination m-0 ms-auto">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 6l-6 6l6 6"></path>
                    </svg>
                    prev
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
                <a class="page-link" href="#">
                    next
                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 6l6 6l-6 6"></path>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</div>
