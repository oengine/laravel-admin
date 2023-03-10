<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        {{ $table->getTitle() }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        @if (isset($buttonAction) && $buttonAction)
                        @foreach ($buttonAction as $button)
                            <a href="{{ $button->getLink() }}" class="btn btn-primary d-none d-sm-inline-block">
                                {!! $button->getIcon() !!}
                                {!! $button->getTitle() !!}
                            </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            {!! table_render($data, $fields, $table, $buttonInTable) !!}
        </div>
    </div>
</div>
