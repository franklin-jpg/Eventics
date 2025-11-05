 @extends('layouts.user')
@section('content')



                <!-- Page Title Start -->
                <div class="flex justify-between items-center mb-6">
                    <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Dashboard</h4>

                    <div class="md:flex hidden items-center gap-2.5 font-semibold">
                        <div class="flex items-center gap-2">
                            <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Attex</a>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                            <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Menu</a>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                            <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400"
                                aria-current="page">Dashboard</a>
                        </div>
                    </div>
                </div>
                <!-- Page Title End -->

                <div class="grid 2xl:grid-cols-5 lg:grid-cols-6 md:grid-cols-2 gap-6 mb-6">
                    <div class="2xl:col-span-1 lg:col-span-2">
                        <div class="card">
                            <div class="p-6">
                                <div class="flex justify-between">
                                    <div class="grow overflow-hidden">
                                        <h5 class="text-base/3 text-gray-400 font-normal mt-0"
                                            title="Number of Customers">Customers</h5>
                                        <h3 class="text-2xl my-6">54,214</h3>
                                        <p class="text-gray-400 truncate">
                                            <span
                                                class="bg-success rounded-md text-xs px-1.5 py-0.5 text-white me-1"><i
                                                    class="ri-arrow-up-line"></i> 2,541</span>
                                            <span>Since last month</span>
                                        </p>
                                    </div>
                                    <div class="shrink">
                                        <div id="widget-customers" class="apex-charts" data-colors="#47ad77,#e3e9ee">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end p-6-->
                        </div> <!-- end card-->
                    </div>

                    <div class="2xl:col-span-1 lg:col-span-2">
                        <div class="card">
                            <div class="p-6">
                                <div class="flex justify-between">
                                    <div class="grow overflow-hidden">
                                        <h5 class="text-base/3 text-gray-400 font-normal mt-0"
                                            title="Number of Orders">Orders</h5>
                                        <h3 class="text-2xl my-6">7,543</h3>
                                        <p class="text-gray-400 truncate">
                                            <span class="bg-danger rounded-md text-xs px-1.5 py-0.5 text-white me-1"><i
                                                    class="ri-arrow-down-line"></i> 1.08%</span>
                                            <span>Since last month</span>
                                        </p>
                                    </div>
                                    <div id="widget-orders" class="apex-charts" data-colors="#3e60d5,#e3e9ee"></div>
                                </div>
                            </div> <!-- end p-6-->
                        </div> <!-- end card-->
                    </div>

                    <div class="2xl:col-span-1 lg:col-span-2">
                        <div class="card">
                            <div class="p-6">
                                <div class="flex justify-between">
                                    <div class="grow overflow-hidden">
                                        <h5 class="text-base/3 text-gray-400 font-normal mt-0"
                                            title="Average Revenue">Revenue</h5>
                                        <h3 class="text-2xl my-6">$9,254</h3>
                                        <p class="text-gray-400 truncate">
                                            <span class="bg-danger rounded-md text-xs px-1.5 py-0.5 text-white me-1"><i
                                                    class="ri-arrow-down-line"></i> 7.00%</span>
                                            <span>Since last month</span>
                                        </p>
                                    </div>
                                    <div id="widget-revenue" class="apex-charts" data-colors="#16a7e9,#e3e9ee"></div>
                                </div>

                            </div> <!-- end p-6-->
                        </div> <!-- end card-->
                    </div>

                    <div class="2xl:col-span-1 lg:col-span-3">
                        <div class="card">
                            <div class="p-6">
                                <div class="flex justify-between">
                                    <div class="grow overflow-hidden">
                                        <h5 class="text-base/3 text-gray-400 font-normal mt-0" title="Growth">Growth
                                        </h5>
                                        <h3 class="text-2xl my-6">+ 20.6%</h3>
                                        <p class="text-gray-400 truncate">
                                            <span
                                                class="bg-success rounded-md text-xs px-1.5 py-0.5 text-white me-1"><i
                                                    class="ri-arrow-up-line"></i> 4.87%</span>
                                            <span>Since last month</span>
                                        </p>
                                    </div>
                                    <div id="widget-growth" class="apex-charts" data-colors="#ffc35a,#e3e9ee"></div>
                                </div>

                            </div> <!-- end p-6-->
                        </div> <!-- end card-->
                    </div>

                    <div class="2xl:col-span-1 lg:col-span-3 md:col-span-2">
                        <div class="card">
                            <div class="p-6">
                                <div class="flex justify-between">
                                    <div class="grow overflow-hidden">
                                        <h5 class="text-base/3 text-gray-400 font-normal mt-0"
                                            title="Conversation Ration">Conversation</h5>
                                        <h3 class="text-2xl my-6">9.62%</h3>
                                        <p class="text-gray-400 truncate">
                                            <span
                                                class="bg-success rounded-md text-xs px-1.5 py-0.5 text-white me-1"><i
                                                    class="ri-arrow-up-line"></i> 3.07%</span>
                                            <span>Since last month</span>
                                        </p>
                                    </div>
                                    <div id="widget-conversation" class="apex-charts" data-colors="#f15776,#e3e9ee">
                                    </div>
                                </div>

                            </div> <!-- end p-6-->
                        </div> <!-- end card-->
                    </div>
                </div>

            </main>
            @endsection



            