@extends('backend.layout.app')

@push('page-title')

    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">{{ __('title.orders') }}</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">{{ __('title.home') }}</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">{{ __('title.orders') }}</li>
    </ul>

@endpush

@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Category-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="{{ __('label.search') }}..." />
                        </div>
                        <!--end::Search-->
                    </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_brand_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_brand_table .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-100px">Order ID</th>
                                <th class="min-w-100px">{{ __('label.customer') }}</th>
                                <th class="min-w-100px">{{ __('label.customer') }}</th>
                                <th class="min-w-100px">{{ __('label.created_at') }}</th>
                                <th class="min-w-70px">{{ __('label.status') }}</th>
                                <th class="text-end min-w-70px">{{ __('label.actions') }}</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @forelse ($data as $list)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="{{ $list->id }}" />
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.order.detail', $list->id) }}" class="text-primary text-hover-primary fs-5 fw-bolder mb-1" >{{ $list->order_number }}</a>
                                </td>
                                <td class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <a href="{{ route('admin.user.detail', $list->user_id) }}">
                                            @empty(Helper::getCustomerInfo($list->user_id)->photo)
                                            <div class="symbol-label fs-3 bg-light-{{ $state = Helper::getRandomStatus() }} text-{{ $state }}">
                                                @if(!empty(Helper::getCustomerInfo($list->user_id)->first_name) && !empty(Helper::getCustomerInfo($list->user_id)->last_name)) {{ ucfirst(Helper::getCustomerInfo($list->user_id)->first_name[0]).ucfirst(Helper::getCustomerInfo($list->user_id)->last_name[0]) }}
                                                @else {{ ucfirst(Helper::getCustomerInfo($list->user_id)->name[0]) }}
                                                @endif
                                            </div>
                                            @else
                                            <div class="symbol-label">
                                                <img src="{{ asset('users/'.Helper::getCustomerInfo($list->user_id)->photo) }}" alt="{{ Helper::getCustomerInfo($list->user_id)->name }}" class="w-100">
                                            </div>
                                            @endempty
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('admin.user.detail', $list->user_id) }}" class="text-gray-800 text-hover-primary mb-1 td-user-name">{{ Helper::getCustomerInfo($list->user_id)->name }}
                                            @if(Helper::getCustomerInfo($list->user_id)->email_verified)
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                    <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF"></path>
                                                    <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
                                                </svg>
                                            </span>
                                            @endif
                                        </a>
                                        <span>{{ Helper::getCustomerInfo($list->user_id)->email }}</span>
                                    </div>
                                </td>
                                <td class="text-danger">
                                    {{ Helper::getCurSymbol($list->currency) }}{{ number_format($list->total_amount, 2) }}
                                </td>

                                <td>{{ date_format($list->created_at, "d M Y, g:i A") }}</td>

                                <td>
                                    @if($list->status == 'completed')
                                    <div class="badge badge-success">Completed</div>
                                    @elseif($list->status == 'refunded')
                                    <div class="badge badge-danger">Refunded</div>
                                    @elseif($list->status == 'process')
                                    <div class="badge badge-warning">In progress</div>
                                    @elseif($list->status == 'delivered')
                                    <div class="badge badge-info">Delivered</div>
                                    @elseif($list->status == 'new')
                                    <div class="badge badge-primary">New</div>
                                    @else
                                    <div class="badge badge-dark">Canceled</div>
                                    @endif
                                </td>

                                <!--begin::Action=-->
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        {{ __('label.actions') }}
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.order.detail', $list->id) }}" class="menu-link px-3">{{ __('title.buttons.edit') }}</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row">{{ __('title.buttons.delete') }}</a>
                                        </div>
                                    </div>
                                </td>
                                <!--end::Action=-->

                            </tr>
                            @empty
                            @endforelse

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection

@push('page-script')
    <script src="{{ asset('admin-assets/js/pages/order/index.js') }}"></script>
@endpush