<x-office-layout title="Dashboard">
    <div id="content_list">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Dashboard
                        <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
                        <span class="text-muted fs-7 fw-bold mt-2">#XRS-45670</span>
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                                </svg>
                            </span>
                            Filter
                        </a>
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6220ee064de67">
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">Filter</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <div class="px-7 py-5">
                                <form id="content_filter">
                                    <div class="mb-10">
                                        <label class="form-label fw-bold">Bulan:</label>
                                        <div>
                                            <select class="form-select border-0 flex-grow-1" name="month" data-control="select2" data-placeholder="Search By">
                                                <option>Pilih Bulan</option>
                                                <option value="01" {{date("m") == "01" ? 'selected' : ''}}>Januari</option>
                                                <option value="02" {{date("m") == "02" ? 'selected' : ''}}>Februari</option>
                                                <option value="03" {{date("m") == "03" ? 'selected' : ''}}>Maret</option>
                                                <option value="04" {{date("m") == "04" ? 'selected' : ''}}>April</option>
                                                <option value="05" {{date("m") == "05" ? 'selected' : ''}}>Mei</option>
                                                <option value="06" {{date("m") == "06" ? 'selected' : ''}}>Juni</option>
                                                <option value="07" {{date("m") == "07" ? 'selected' : ''}}>Juli</option>
                                                <option value="08" {{date("m") == "08" ? 'selected' : ''}}>Agustus</option>
                                                <option value="09" {{date("m") == "09" ? 'selected' : ''}}>September</option>
                                                <option value="10" {{date("m") == "10" ? 'selected' : ''}}>Oktober</option>
                                                <option value="11" {{date("m") == "11" ? 'selected' : ''}}>Nopember</option>
                                                <option value="12" {{date("m") == "12" ? 'selected' : ''}}>Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label fw-bold">Member Type:</label>
                                        <select class="form-select border-0 flex-grow-1" name="year" data-control="select2" data-placeholder="Select Year">
                                            <option value="">Pilih Tahun</option>
                                            <option value="2022" {{date("Y") == "2022" ? 'selected' : ''}}>2022</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                        <button type="button" class="btn btn-sm btn-primary" onclick="load_list(1);" data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div id="list_result"></div>
            </div>
        </div>
    </div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-office-layout>