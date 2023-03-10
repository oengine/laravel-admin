<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Thiết lập table
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <button type="button" class="btn btn-primary" wire:click='doSave()'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M14 4l0 4l-6 0l0 -4"></path>
                            </svg>
                            Save
                        </button>
                        <button type="button" class="btn btn-warning" wire:click='doApplySetting()'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M14 4l0 4l-6 0l0 -4"></path>
                            </svg>
                            Apply setting
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body" x-data="{
        table_data: @entangle('table_data').defer,
        fields: @entangle('fields').defer,
        table_buttons: @entangle('table_buttons').defer,
        form_buttons: @entangle('form_buttons').defer,
        field_default: {
            name: '',
            db_type: '',
            validations: '',
            html_type: '',
            is_primary: false,
            is_foreign: false,
            is_index: true,
            is_searchable: true,
            in_table: true,
            in_form_add: true,
            in_form_edit: true,
            _delete: false
        }
    }">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-fields" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                                role="tab">Model & Fields</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-table" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                role="tab" tabindex="-1">Table</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-form" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                role="tab" tabindex="-1">Form</a>
                        </li>
                        <li class="nav-item ms-auto" role="presentation">
                            <a href="#tabs-settings" class="nav-link" title="Settings" data-bs-toggle="tab"
                                aria-selected="false" role="tab" tabindex="-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                    </path>
                                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-fields" role="tabpanel">
                            <h4>Model</h4>
                            <div class="row">
                                <div class="col-md-4 col-xl-3">
                                    <div class="mb-3">
                                        <label class="form-label">Model Name (*)</label>
                                        <input x-model="table_data.model_name" type="text" class="form-control"
                                            name="example-text-input" placeholder="Model Name">
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-3">
                                    <div class="mb-3">
                                        <label class="form-label">Table Custom Name</label>
                                        <input x-model="table_data.table_name" type="text" class="form-control"
                                            name="example-text-input" placeholder="Table Custom Name">
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-2">
                                    <div class="mb-3">
                                        <label class="form-label">Model Key</label>
                                        <input table_data.table_name type="text" class="form-control"
                                            name="example-text-input" placeholder="Model Key">
                                    </div>
                                </div>
                            </div>
                            <h4>Fields</h4>
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>Field name</th>
                                            <th>DB Type</th>
                                            <th>Validations</th>
                                            <th>Html Type</th>
                                            <th>Primary</th>
                                            <th>Foreign</th>
                                            <th>Index</th>
                                            <th>Searchable</th>
                                            <th>Table</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="field in fields.filter((item)=>!item._delete)">
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" x-model="field.name">
                                                </td>
                                                <td>
                                                    <select class="form-control" x-model="field.db_type">
                                                        @foreach ($fieldTypes as $field_type)
                                                            <option value="{{ $field_type }}">
                                                                {{ \Illuminate\Support\Str::studly($field_type) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control"
                                                        x-model="field.validations"></td>
                                                <td>
                                                    <select class="form-control" x-model="field.html_type">
                                                        @foreach ($fieldTypes as $field_type)
                                                            <option value="{{ $field_type }}">
                                                                {{ \Illuminate\Support\Str::studly($field_type) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="1" x-model="field.is_primary">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            x-model="field.is_foreign">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            x-model="field.is_index">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            x-model="field.is_searchable">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            x-model="field.in_table">
                                                    </label>
                                                </td>
                                                <td><label class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            x-model="field.in_form_add">
                                                    </label>
                                                </td>
                                                <td><label class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            x-model="field.in_form_edit">
                                                    </label></td>
                                                <td>
                                                    <button class="btn btn-primary btn-pill w-100 btn-icon"
                                                        x-on:click='field._delete=true'>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-trash" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M4 7l16 0"></path>
                                                            <path d="M10 11l0 6"></path>
                                                            <path d="M14 11l0 6"></path>
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12">
                                                            </path>
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    <button class="btn btn-primary"
                                        x-on:click="fields.push(JSON.parse(JSON.stringify(field_default)))">Add
                                        Field</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-table" role="tabpanel">
                            <h4>Table</h4>
                            <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem
                                nunc amet, pellentesque id egestas velit sed</div>
                            <h4>Buttons</h4>
                            <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem
                                nunc amet, pellentesque id egestas velit sed</div>
                        </div>
                        <div class="tab-pane" id="tabs-form" role="tabpanel">
                            <h4><span class="pe-2">Form</span> <label class="form-check form-switch d-inline-block">
                                    <input class="form-check-input" type="checkbox">
                                    <span class="form-check-label">Edit</span>
                                </label></h4>
                            <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem
                                nunc amet, pellentesque id egestas velit sed</div>
                        </div>
                        <div class="tab-pane" id="tabs-settings" role="tabpanel">
                            <h4>Settings</h4>
                            <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit
                                mauris accumsan nibh habitant senectus</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
