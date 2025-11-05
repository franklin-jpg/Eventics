@extends('layouts.app')
@section('content')
    <main>
        <!-- BREADCRUMB SECTION START -->
        <section
            class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30">
            <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
                <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Event Details</h1>
                <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                    <li class="opacity-80"><a href="index.html" class="hover:text-etBlue">Home</a></li>
                    <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                    <li class="current-page">Event Details</li>
                </ul>
            </div>
        </section>
        <!-- BREADCRUMB SECTION END -->


        <!-- main content -->
        <div class="et-event-details-content py-[130px] lg:py-[80px] md:py-[60px]">
            <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
                <div class="flex gap-[30px] lg:gap-[20px] md:flex-col md:items-center">
                    <!-- left content -->
                    <div class="left">
                        <!-- img -->
                        <div class="relative rounded-[8px] overflow-hidden">
                            <img src="{{ Storage::url('event-images/' . $event->image) }}" class=""
                                style="height: 400px; width: 100%; object-position: cover;" alt="event-details-img">
                            <!-- hall number tag -->
                            <span
                                class="absolute top-[20px] left-[20px] bg-etBlue rounded-[6px] text-white px-[12px] py-[5px] inline-block font-normal text-[16px]">{{ $event->category->name }}</span>
                        </div>

                        <!-- txt -->
                        <div>
                            <h4
                                class="text-[30px] xs:text-[25px] xxs:text-[22px] font-medium text-etBlack mb-[11px] mt-[27px]">
                                {{ $event->title }}</h4>

                            <div class="flex flex-wrap gap-[20px] mb-[20px] text-etGray">
                                <div class="flex items-center gap-[8px]">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span>{{ $event->getFormatedDate() }}</span>
                                </div>
                                <div class="flex items-center gap-[8px]">
                                    <i class="fa-regular fa-clock"></i>
                                    <span>{{ $event->getFormatedTime() }}</span>
                                </div>
                                <div class="flex items-center gap-[8px]">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>{{ $event->location }}</span>
                                </div>
                            </div>

                            <p class="font-light text-[16px] text-etGray mb-[15px]">
                                {{ $event->description }}
                            </p>
                        </div>


                    </div>

                    <!-- right sidebar -->
                    <div class="right max-w-full w-[370px] lg:w-[360px] shrink-0 space-y-[30px]">
                        <!-- ticket widget -->
                        <div class="et-event-details-ticket-widgget border border-[#e5e5e5] rounded-[16px] overflow-hidden">
                            <!-- heading -->
                            <div class="bg-etBlue p-[16px] xxs:p-[12px]">
                                <h5 class="font-medium text-[20px] text-white text-center">Select Date and Time</h5>
                            </div>

                            <!-- body  -->
                            <div class="p-[22px] lg:p-[16px]">
                                <!-- time schedule -->
                                <div class="flex justify-between items-center mt-[6px] mb-[16px]">
                                    <h6 class="font-medium text-[16px] text-[#232323]">Time Schedule</h6>
                                </div>




                                <div class="flex flex-wrap gap-[20px] mb-[20px] text-etGray">
                                    <div class="flex items-center gap-[8px]">
                                        <i class="fa-regular fa-calendar"></i>
                                        <span>{{ $event->getFormatedDate() }}</span>
                                    </div>
                                    <div class="flex items-center gap-[8px]">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>{{ $event->getFormatedTime() }}</span>
                                    </div>
                                    <div class="flex items-center gap-[8px]">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>{{ $event->location }}</span>
                                    </div>
                                </div>

                                <!-- events -->
                                <form action="{{ route('events.pay', $event) }}" method="POST"
                                    class="space-y-[10px] mb-[30px]">
                                    @csrf

                                    <div>
                                        <label for="">Ticket Quantity</label>
                                        <input type="number" name="quantity" min="1" max="10">

                                        @error('quantity')  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror

                                    </div>


                                    <div>
                                        <h1>&#8358;{{ number_format($event->ticket_price, 2) }}</h1>
                                    </div>
                                    <!-- button -->
                                    <button type="submit"
                                        class="bg-etBlue h-[50px] rounded-full px-[15px] flex items-center justify-center gap-x-[10px] w-full text-white text-[15px] hover:bg-[#000D83]">
                                        <span><img src="assets/img/ticket-icon.svg" alt="ticket icon"></span>
                                        <span>Buy Tickets Now</span>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>



                <h2 class="mt-10">Related Events</h2>
                {{-- related events   --}}
                @if ($relatedEvents->count() > 0)
                    <!-- events -->
                    <div class="et-schedules-tab-container">
                        <div id="tab1" class="et-tab active">
                            <div class="all-scheduled-events space-y-[30px]">
                                @forelse ($relatedEvents as $relatedEvent)
                                    <!-- single schedule -->
                                    <div
                                        class="et-schedule bg-[#EDF3FE]/40 border border-[#e5e5e5] p-[8px] rounded-[20px] flex md:flex-wrap gap-x-[30px] gap-y-[20px] justify-between rev-slide-up">
                                        <!-- img -->
                                        <div class="w-[270px] h-[226px]  shrink-0 rounded-[20px] overflow-hidden xs:w-full">
                                            <img src="{{ Storage::url('event-images/' . $relatedEvent->image) }}"
                                                alt="{{ $relatedEvent->title }}" class="w-full">
                                        </div>

                                        <!-- text -->
                                        <div
                                            class="pr-[37px] sm:pr-[22px] w-full rounded-[20px] flex gap-y-[15px] xs:flex-col items-center xs:items-start">
                                            <div
                                                class="et-schedule__heading pr-[40px] sm:pr-[25px] xs:pr-0 mr-[40px] sm:mr-[25px] xs:mr-0 border-r xs:border-r-0 border-[#d9d9d9]">
                                                <!-- date & time -->
                                                <div
                                                    class="et-schedule-date-time border border-[rgba(217,217,217,0.89)] py-[7px] px-[15px] rounded-full inline-flex xxs:w-full items-center justify-center gap-x-[24px] gap-y-[10px] mb-[10px] xxs:border-0 xxs:p-0 xxs:justify-start">
                                                    <div class="date flex items-center gap-[10px]">
                                                        <span class="icon">
                                                            <svg width="16" height="17" viewBox="0 0 16 17"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_2043_1443)">
                                                                    <path
                                                                        d="M14.125 1.75H13.375V0.5H12.125V1.75H3.875V0.5H2.625V1.75H1.875C0.841125 1.75 0 2.59113 0 3.625V14.625C0 15.6589 0.841125 16.5 1.875 16.5H14.125C15.1589 16.5 16 15.6589 16 14.625V3.625C16 2.59113 15.1589 1.75 14.125 1.75ZM14.75 14.625C14.75 14.9696 14.4696 15.25 14.125 15.25H1.875C1.53038 15.25 1.25 14.9696 1.25 14.625V6.375H14.75V14.625ZM14.75 5.125H1.25V3.625C1.25 3.28038 1.53038 3 1.875 3H2.625V4.25H3.875V3H12.125V4.25H13.375V3H14.125C14.4696 3 14.75 3.28038 14.75 3.625V5.125Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M3.625 7.6875H2.375V8.9375H3.625V7.6875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M6.125 7.6875H4.875V8.9375H6.125V7.6875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M8.625 7.6875H7.375V8.9375H8.625V7.6875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M11.125 7.6875H9.875V8.9375H11.125V7.6875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M13.625 7.6875H12.375V8.9375H13.625V7.6875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M3.625 10.1875H2.375V11.4375H3.625V10.1875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M6.125 10.1875H4.875V11.4375H6.125V10.1875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M8.625 10.1875H7.375V11.4375H8.625V10.1875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M11.125 10.1875H9.875V11.4375H11.125V10.1875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M3.625 12.6875H2.375V13.9375H3.625V12.6875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M6.125 12.6875H4.875V13.9375H6.125V12.6875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M8.625 12.6875H7.375V13.9375H8.625V12.6875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M11.125 12.6875H9.875V13.9375H11.125V12.6875Z"
                                                                        fill="var(--et-blue)" />
                                                                    <path d="M13.625 10.1875H12.375V11.4375H13.625V10.1875Z"
                                                                        fill="var(--et-blue)" />
                                                                </g>
                                                            </svg>
                                                        </span>

                                                        <span
                                                            class="text-etGray font-normal text-[16px]">{{ $relatedEvent->getFormatedDate() }}</span>
                                                    </div>

                                                    <div class="time flex items-center gap-[10px] xxs:hidden">
                                                        <span class="icon">
                                                            <svg width="16" height="17" viewBox="0 0 16 17"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10.8505 9.91291L8.61967 8.23979V4.8316C8.61967 4.48891 8.34266 4.21191 7.99998 4.21191C7.65729 4.21191 7.38029 4.48891 7.38029 4.8316V8.54966C7.38029 8.74485 7.47201 8.92892 7.62817 9.04541L10.1069 10.9044C10.2138 10.985 10.3441 11.0285 10.478 11.0284C10.667 11.0284 10.8529 10.9435 10.9744 10.7799C11.1802 10.5066 11.1244 10.118 10.8505 9.91291Z"
                                                                    fill="var(--et-blue)" />
                                                                <path
                                                                    d="M8 0.5C3.58853 0.5 0 4.08853 0 8.5C0 12.9115 3.58853 16.5 8 16.5C12.4115 16.5 16 12.9115 16 8.5C16 4.08853 12.4115 0.5 8 0.5ZM8 15.2607C4.27266 15.2607 1.23934 12.2273 1.23934 8.5C1.23934 4.77266 4.27266 1.73934 8 1.73934C11.728 1.73934 14.7607 4.77266 14.7607 8.5C14.7607 12.2273 11.7273 15.2607 8 15.2607Z"
                                                                    fill="var(--et-blue)" />
                                                            </svg>
                                                        </span>

                                                        <span
                                                            class="text-etGray font-normal text-[16px]">{{ $relatedEvent->getFormatedTime() }}</span>
                                                    </div>
                                                </div>

                                                <!-- title -->
                                                <h3
                                                    class="et-schedule-title text-[24px] sm:text-[22px] font-regular text-etBlack leading-[1.25] mb-[16px] anim-text">
                                                    <a href="event-details.html" class="hover:text-etBlue">Siempre Son
                                                        Flores"
                                                        Musica Cubana Salsa Jazz adipi scing elit. Nullam</a>
                                                </h3>

                                                <!-- location -->
                                                <div class="et-schedule-loaction flex items-center gap-[12px]">
                                                    <span class="icon">
                                                        <svg width="12" height="16" viewBox="0 0 12 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.99998 0C2.80482 0 0.205383 2.59944 0.205383 5.79456C0.205383 9.75981 5.39098 15.581 5.61176 15.8269C5.81913 16.0579 6.1812 16.0575 6.3882 15.8269C6.60898 15.581 11.7946 9.75981 11.7946 5.79456C11.7945 2.59944 9.1951 0 5.99998 0ZM5.99998 8.70997C4.39241 8.70997 3.0846 7.40212 3.0846 5.79456C3.0846 4.187 4.39245 2.87919 5.99998 2.87919C7.60751 2.87919 8.91532 4.18703 8.91532 5.79459C8.91532 7.40216 7.60751 8.70997 5.99998 8.70997Z"
                                                                fill="var(--et-blue)" />
                                                        </svg>
                                                    </span>
                                                    <h6 class="text-[16px] text-etGray">135 W, 46nd Street, New York</h6>
                                                </div>
                                            </div>

                                            <div
                                                class="flex shrink-0 xxl:flex-col flex-wrap items-center xxl:items-start gap-x-[30px] gap-y-[16px]">
                                                <a href="{{ route('events.show', $relatedEvent->slug) }}"
                                                    class="et-btn border border-etBlue bg-etBlue text-white inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] font-normal text-[17px] rounded-full hover:!bg-transparent hover:!text-etBlue">
                                                    View Details
                                                </a>
                                                <div class="flex items-center">
                                                    <div class="flex *:-ml-[20px]">
                                                        <img src="assets/img/reviewer-1.png" alt="Person"
                                                            class="w-[45px] h-[45px] rounded-full border-[3px] border-white first:ml-0">
                                                        <img src="assets/img/reviewer-2.png" alt="Person"
                                                            class="w-[45px] h-[45px] rounded-full border-[3px] border-white first:ml-0">
                                                        <img src="assets/img/reviewer-3.png" alt="Person"
                                                            class="w-[45px] h-[45px] rounded-full border-[3px] border-white first:ml-0">
                                                        <div
                                                            class="w-[45px] h-[45px] rounded-full border-[3px] border-white first:ml-0 text-white bg-etBlue font-semibold flex items-center justify-center text-[16px]">
                                                        </div>
                                                    </div>
                                                    <span class="font-semibold text-etBlue text-[16px] -ml-[29px]"><span
                                                            class="text-white">Spe</span>akers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <div class="text-center py-12">
                                        <p class="text-xl text-gray-700 ">No Upcoming events at the moment. Check back
                                            soon!
                                        </p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @else
                    <p>There is no related events</p>
                @endif

            </div>
        </div>
        
    </main>


    
    
@endsection