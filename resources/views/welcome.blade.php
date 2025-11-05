  @extends('layouts.app')
  @section('content')
  
  
  <main>
        <!-- BANNER SECTION START -->
        <section class="et-5-banner relative overflow-hidden z-[1] pt-[clamp(120px,12.61vw,240px)] pb-[clamp(163px,17.18vw,327px)]">
            <div class="et-5-banner-container max-w-[calc(clamp(1100px,84.60vw,1610px)+30px)] px-[15px] mx-auto">
                <div class="et-5-banner-content">
                    <div class="flex sm:flex-col items-center gap-[clamp(40px,4.20vw,80px)]">
                        <h1 class="text-[clamp(38px,8.93vw,170px)] leading-[110%] font-semibold tracking-[-0.03em] text-white anim-text">Events <span class="!inline-flex flex-wrap items-center gap-x-[clamp(15px,1.58vw,30px)] italic"><img src="assets/img/arrow-up-right-banner.svg" alt="icon" class="max-w-[clamp(60px,6.46vw,123px)] md:hidden"> Conference</span></h1>
                        <div class="et-5-banner-img relative shrink-0 p-[clamp(17px,1.84vw,35px)] before:absolute before:inset-0 before:bg-[linear-gradient(90deg,#FFFFFF_0.09%,rgba(255,255,255,0)_100%)] rounded-full before:rounded-full before:-z-[1] before:animate-grRotate">
                            <img src="assets/img/et-5-banner-img.png" alt="Image" class="max-w-[clamp(305px,22.33vw,425px)] xxs:max-w-full rounded-full">
                            <img src="assets/img/banner%3d-5-img-vecctor.svg" alt="vector" class="animate-pulse absolute -z-[2] -bottom-[clamp(55px,5.78vw,110px)] -left-[clamp(50px,5.25vw,100px)] max-w-[clamp(432px,34.26vw,652px)] xxs:max-w-[136%]">
                        </div>
                    </div>
                </div>
            </div>

            <!-- vectors -->
            <div class="et-5-banner-vectors h-full absolute inset-0 -z-[2] *:absolute *:animate-[ping_3s_linear_infinite] *:duration-1000">
                <div class="!animate-[pulse_2s_linear_infinite] xxs:!hidden top-[clamp(67px,7.20vw,137px)] -left-[20px]"><img src="assets/img/banner-5-vector-1.svg" alt="vector"></div>
                <div class="sm:!hidden !-left-[20px] bottom-[clamp(95px,9.98vw,190px)] !top-auto"><img src="assets/img/banner-5-vector-2.svg" alt="vector"></div>
                <div class="!animate-[pulse_2s_linear_infinite] !left-0 bottom-[clamp(32px,3.42vw,65px)]"><img src="assets/img/banner-5-vector-3.svg" alt="vector"></div>
                <div class="sm:!hidden !top-[clamp(95px,9.98vw,190px)] !left-[clamp(236px,24.80vw,472px)]"><img src="assets/img/banner-5-vector-4.svg" alt="vector"></div>
                <div class="!animate-[pulse_2s_linear_infinite] sm:!hidden !top-[clamp(137px,14.45vw,275px)] !left-1/2"><img src="assets/img/banner-5-vector-5.svg" alt="vector"></div>
                <div class="!animate-[spin_2s_linear_infinite_forwards] xxs:!hidden bottom-[31%] !left-[58%]"><img src="assets/img/banner-5-vector-6.svg" alt="vector"></div>
                <div class="!animate-[pulse_2s_linear_infinite] !top-[clamp(52px,5.47vw,104px)] -right-[10px]"><img src="assets/img/banner-5-vector-7.svg" alt="vector"></div>
                <div class="bottom-0 -right-[5px]"><img src="assets/img/banner-5-vector-8.svg" alt="vector"></div>
            </div>
        </section>
        <!-- BANNER SECTION END -->


        <!-- COUNTDOWN SECTION START -->
        <div class="max-w-[calc(clamp(1100px,73.57vw,1400px)+30px)] px-[15px] mx-auto relative z-[2] -translate-y-1/2 md:-translate-y-[30%] sm:-translate-y-[20%]">
            <div class="bg-etBlue relative z-[1] py-[60px] sm:py-[40px] px-[clamp(20px,9.20vw,175px)] xxl:px-[clamp(20px,7.20vw,175px)] xs:px-[20px] rounded-full sm:rounded-[150px] xs:rounded-[100px] overflow-hidden -mb-[114px] shadow-[0_4px_50px_rgba(18,96,254,0.2)] border-[10px] border-white/80 after:absolute after:inset-0 after:-z-[1] after:bg-[url(../assets/img/et-counter-bg.jpg)] after:bg-cover after:bg-no-repeat after:mix-blend-screen flex items-center md:flex-wrap gap-y-[20px]">
                <div class="pr-[clamp(34px,2.84vw,54px)] border-r md:border-r-0 border-white/20 md:text-center md:pr-0 md:w-full">
                    <h2 class="et-section-title !text-white mb-[28px] anim-text">Count Every Second Until Event.</h2>
                    <a href="contact.html" class="et-btn bg-etBlue inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] text-white font-normal text-[17px] rounded-full border-white border hover:!bg-white hover:!text-etBlue">Buy Ticket</a>
                </div>

                <!-- counter -->
                <div class="et-countdown flex sm:flex-wrap justify-center gap-y-[10px] md:w-full *:border-r *:sm:border-r-0 *:border-white/20 *:px-[clamp(26px,2.42vw,46px)] *:sm:px-[26px] *:xs:px-[16px] font-medium text-white text-[16px] text-center">
                    <div class="last:pr-0 last:md:pr-[30px] last:xs:pr-[20px] last:border-r-0">
                        <span class="days number block"></span>
                        <span>Days</span>
                    </div>

                    <div class="last:pr-0 last:md:pr-[30px] last:xs:pr-[20px] last:border-r-0">
                        <span class="hours number block"></span>
                        <span>Hours</span>
                    </div>

                    <div class="last:pr-0 last:md:pr-[30px] last:xs:pr-[20px] last:border-r-0">
                        <span class="minutes number block"></span>
                        <span>Minutes</span>
                    </div>

                    <div class="last:pr-0 last:md:pr-[30px] last:xs:pr-[20px] last:border-r-0">
                        <span class="seconds number block"></span>
                        <span>Seconds</span>
                    </div>
                </div>

                <!-- vectors -->
                <div class="sm:hidden">
                    <img src="assets/img/counter-vector.png" alt="vector" class="pointer-events-none absolute top-[26px] left-[53%]">
                    <img src="assets/img/counter-vector.png" alt="vector" class="pointer-events-none absolute bottom-[33px] right-[90px]">
                </div>
            </div>
        </div>
        <!-- COUNTDOWN SECTION END -->


        <!-- CATEGORIES SECTION START -->
        <section class="et-5-categories py-[clamp(60px,6.31vw,120px)] relative">
            <div class="et-1-container">
                <!-- section heading -->
                <div class="et-speakers-heading flex xs:flex-col justify-between items-center mb-[46px] xl:mb-[26px] lg:mb-[16px] gap-[15px]">
                    <div class="left xs:text-center">
                        <h6 class="et-section-sub-title anim-text">Event Category</h6>
                        <h2 class="et-section-title anim-text">Select Event Category</h2>
                    </div>

                    <div class="right">
                        <div class="et-5-category-slider-nav flex gap-[16px] sm:gap-[12px]">
                            <button class="prev border border-[#D9D9D9] rounded-full w-[60px] sm:w-[50px] h-[60px] sm:h-[50px] text-[18px] text-etBlack hover:bg-etBlue hover:border-etBlue hover:text-white">
                                <i class="fa-solid fa-arrow-left-long"></i>
                            </button>
                            <button class="next border border-[#D9D9D9] rounded-full w-[60px] sm:w-[50px] h-[60px] sm:h-[50px] text-[18px] text-etBlack hover:bg-etBlue hover:border-etBlue hover:text-white">
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- slider -->
                <div class="swiper et-5-category-slider">
                    <div class="swiper-wrapper">
                        <!-- Card -->
                        <div class="swiper-slide">
                            <div class="et-5-category relative text-center">
                                <div class="rounded-[135px] overflow-hidden border-[10px] border-gray-300 w-full aspect-[270/395] relative">
                                    <img src="assets/img/event-category-1.jpg" alt="Birthday" class="object-cover w-full h-full" />
                                    <span class="bg-white/10 px-[clamp(12px,0.84vw,16px)] rounded-full font-medium text-white text-[clamp(18px,1.16vw,22px)] tracking-[-0.02em] block absolute bottom-[clamp(45px,3.68vw,70px)] left-1/2 -translate-x-1/2">Birthday</span>
                                </div>
                                <a href="events.html" class="absolute bottom-0 left-1/2 -translate-x-1/2 bg-white/50 text-white text-[30px] w-[clamp(68px,4.62vw,88px)] aspect-square inline-flex items-center justify-center translate-y-1/2">↗</a>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="swiper-slide">
                            <div class="et-5-category relative text-center">
                                <div class="rounded-[135px] overflow-hidden border-[10px] border-gray-300 w-full aspect-[270/395] relative">
                                    <img src="assets/img/event-category-2.jpg" alt="Birthday" class="object-cover w-full h-full" />
                                    <span class="bg-white/10 px-[clamp(12px,0.84vw,16px)] rounded-full font-medium text-white text-[clamp(18px,1.16vw,22px)] tracking-[-0.02em] block absolute bottom-[clamp(45px,3.68vw,70px)] left-1/2 -translate-x-1/2">Business</span>
                                </div>
                                <a href="events.html" class="absolute bottom-0 left-1/2 -translate-x-1/2 bg-white/50 text-white text-[30px] w-[clamp(68px,4.62vw,88px)] aspect-square inline-flex items-center justify-center translate-y-1/2">↗</a>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="swiper-slide">
                            <div class="et-5-category relative text-center">
                                <div class="rounded-[135px] overflow-hidden border-[10px] border-gray-300 w-full aspect-[270/395] relative">
                                    <img src="assets/img/event-category-3.jpg" alt="Birthday" class="object-cover w-full h-full" />
                                    <span class="bg-white/10 px-[clamp(12px,0.84vw,16px)] rounded-full font-medium text-white text-[clamp(18px,1.16vw,22px)] tracking-[-0.02em] block absolute bottom-[clamp(45px,3.68vw,70px)] left-1/2 -translate-x-1/2">Music</span>
                                </div>
                                <a href="events.html" class="absolute bottom-0 left-1/2 -translate-x-1/2 bg-white/50 text-white text-[30px] w-[clamp(68px,4.62vw,88px)] aspect-square inline-flex items-center justify-center translate-y-1/2">↗</a>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="swiper-slide">
                            <div class="et-5-category relative text-center">
                                <div class="rounded-[135px] overflow-hidden border-[10px] border-gray-300 w-full aspect-[270/395] relative">
                                    <img src="assets/img/event-category-4.jpg" alt="Birthday" class="object-cover w-full h-full" />
                                    <span class="bg-white/10 px-[clamp(12px,0.84vw,16px)] rounded-full font-medium text-white text-[clamp(18px,1.16vw,22px)] tracking-[-0.02em] block absolute bottom-[clamp(45px,3.68vw,70px)] left-1/2 -translate-x-1/2">Festivals</span>
                                </div>
                                <a href="events.html" class="absolute bottom-0 left-1/2 -translate-x-1/2 bg-white/50 text-white text-[30px] w-[clamp(68px,4.62vw,88px)] aspect-square inline-flex items-center justify-center translate-y-1/2">↗</a>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="swiper-slide">
                            <div class="et-5-category relative text-center">
                                <div class="rounded-[135px] overflow-hidden border-[10px] border-gray-300 w-full aspect-[270/395] relative">
                                    <img src="assets/img/event-category-2.jpg" alt="Birthday" class="object-cover w-full h-full" />
                                    <span class="bg-white/10 px-[clamp(12px,0.84vw,16px)] rounded-full font-medium text-white text-[clamp(18px,1.16vw,22px)] tracking-[-0.02em] block absolute bottom-[clamp(45px,3.68vw,70px)] left-1/2 -translate-x-1/2">Business</span>
                                </div>
                                <a href="events.html" class="absolute bottom-0 left-1/2 -translate-x-1/2 bg-white/50 text-white text-[30px] w-[clamp(68px,4.62vw,88px)] aspect-square inline-flex items-center justify-center translate-y-1/2">↗</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- vectors -->
            <div class="*:absolute *:-z-10">
                <img src="assets/img/et-5-category-vector-2.svg" alt="Vector" class="top-[clamp(150px,10.46vw,199px)] right-[clamp(35px,3.52vw,67px)] xxs:hidden">
                <img src="assets/img/et-5-category-vector-1.svg" alt="Vector" class="bottom-[clamp(150px,16.03vw,305px)] left-0">
            </div>
        </section>
        <!-- CATEGORIES SECTION END -->


        <!-- ABOUT SECTION START -->
        <section class="et-about py-[130px] xl:py-[80px] md:py-[60px] overflow-hidden relative z-[1] bg-[#F2F6FE] before:bg-[url('assets/img/et-5-about-bg.svg')] before:bg-no-repeat before:bg-cover before:bg-center before:absolute before:inset-0 before:-z-[1]">
            <div class="et-1-container">
                <div class="grid grid-cols-2 md:grid-cols-1 items-center md:flex-wrap gap-x-[60px] xl:gap-x-[40px] lg:gap-x-[30px] gap-y-[40px] sm:gap-y-[40px] lg:justify-center">
                    <!-- left -->
                    <div class="et-about-img relative z-[1] w-max max-w-full ml-auto md:mx-auto">
                        <a href="https://www.youtube.com/watch?v=AQleI8oFqZo&amp;t=1s" data-fslightbox="about-video" class="w-[107px] aspect-square rounded-full border border-white/20 flex justify-center items-center text-etBlue absolute top-1/2 left-1/2 -translate-1/2 z-[1] text-[18px] before:absolute before:w-[56px] before:h-[56px] before:bg-white before:rounded-full before:-z-[1] hover:text-white hover:before:bg-etBlue"><i class="fa-solid fa-play"></i></a>
                        <img src="assets/img/et-5-about-img.png" alt="image" class="max-w-[clamp(430px,27.85vw,530px)] w-full aspect-square object-cover rounded-full">
                        <img src="assets/img/et-5-about-img-vector.svg" alt="vector" class="absolute -z-[1] -left-[clamp(40px,4.20vw,80px)] -right-[40px] -bottom-[20px] max-w-[clamp(501px,31.58vw,601px)] xxs:max-w-[116%]">
                    </div>

                    <!-- right -->
                    <div class="et-about__txt max-w-[570px] md:max-w-full grow">
                        <h6 class="et-section-sub-title anim-text">About Eventek</h6>
                        <h2 class="et-section-title mb-[24px] md:mb-[19px] anim-text">Personal Even and Mega Conference</h2>

                        <p class="mb-[30px] text-[16px] font-light text-etGray md:mb-[30px] rev-slide-up">
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                        </p>

                        <!-- about infos -->
                        <div class="flex xs:flex-col flex-wrap gap-[30px] py-[30px] border-y border-[#D9D9D9] mb-[50px] xxs:mb-[30px]">
                            <!-- single info -->
                            <div class="flex items-center gap-[20px] rev-slide-up">
                                <div class="shrink-0 h-[80px] w-[80px] rounded-[6px] shadow-[0_4px_50px_10px_rgba(18,96,254,0.10)] flex items-center justify-center">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M35.625 5H32.5V3.75C32.5 3.08696 32.2366 2.45107 31.7678 1.98223C31.2989 1.51339 30.663 1.25 30 1.25C29.337 1.25 28.7011 1.51339 28.2322 1.98223C27.7634 2.45107 27.5 3.08696 27.5 3.75V5H22.5V3.75C22.5 3.08696 22.2366 2.45107 21.7678 1.98223C21.2989 1.51339 20.663 1.25 20 1.25C19.337 1.25 18.7011 1.51339 18.2322 1.98223C17.7634 2.45107 17.5 3.08696 17.5 3.75V5H12.5V3.75C12.5 3.08696 12.2366 2.45107 11.7678 1.98223C11.2989 1.51339 10.663 1.25 10 1.25C9.33696 1.25 8.70107 1.51339 8.23223 1.98223C7.76339 2.45107 7.5 3.08696 7.5 3.75V5H4.375C3.5462 5 2.75134 5.32924 2.16529 5.91529C1.57924 6.50134 1.25 7.2962 1.25 8.125V33.125C1.25 33.9538 1.57924 34.7487 2.16529 35.3347C2.75134 35.9208 3.5462 36.25 4.375 36.25H21.875C22.0408 36.25 22.1997 36.1842 22.3169 36.0669C22.4342 35.9497 22.5 35.7908 22.5 35.625C22.5 35.4592 22.4342 35.3003 22.3169 35.1831C22.1997 35.0658 22.0408 35 21.875 35H4.375C3.87818 34.9985 3.40212 34.8005 3.05081 34.4492C2.6995 34.0979 2.50148 33.6218 2.5 33.125V13.75H37.5V24.375C37.5 24.5408 37.5658 24.6997 37.6831 24.8169C37.8003 24.9342 37.9592 25 38.125 25C38.2908 25 38.4497 24.9342 38.5669 24.8169C38.6842 24.6997 38.75 24.5408 38.75 24.375V8.125C38.75 7.2962 38.4208 6.50134 37.8347 5.91529C37.2487 5.32924 36.4538 5 35.625 5ZM28.75 3.75C28.75 3.41848 28.8817 3.10054 29.1161 2.86612C29.3505 2.6317 29.6685 2.5 30 2.5C30.3315 2.5 30.6495 2.6317 30.8839 2.86612C31.1183 3.10054 31.25 3.41848 31.25 3.75V7.5C31.25 7.83152 31.1183 8.14946 30.8839 8.38388C30.6495 8.6183 30.3315 8.75 30 8.75C29.6685 8.75 29.3505 8.6183 29.1161 8.38388C28.8817 8.14946 28.75 7.83152 28.75 7.5V3.75ZM18.75 3.75C18.75 3.41848 18.8817 3.10054 19.1161 2.86612C19.3505 2.6317 19.6685 2.5 20 2.5C20.3315 2.5 20.6495 2.6317 20.8839 2.86612C21.1183 3.10054 21.25 3.41848 21.25 3.75V7.5C21.25 7.83152 21.1183 8.14946 20.8839 8.38388C20.6495 8.6183 20.3315 8.75 20 8.75C19.6685 8.75 19.3505 8.6183 19.1161 8.38388C18.8817 8.14946 18.75 7.83152 18.75 7.5V3.75ZM8.75 3.75C8.75 3.41848 8.8817 3.10054 9.11612 2.86612C9.35054 2.6317 9.66848 2.5 10 2.5C10.3315 2.5 10.6495 2.6317 10.8839 2.86612C11.1183 3.10054 11.25 3.41848 11.25 3.75V7.5C11.25 7.83152 11.1183 8.14946 10.8839 8.38388C10.6495 8.6183 10.3315 8.75 10 8.75C9.66848 8.75 9.35054 8.6183 9.11612 8.38388C8.8817 8.14946 8.75 7.83152 8.75 7.5V3.75ZM37.5 12.5H2.5V8.125C2.50148 7.62818 2.6995 7.15212 3.05081 6.80081C3.40212 6.4495 3.87818 6.25148 4.375 6.25H7.5V7.5C7.5 8.16304 7.76339 8.79893 8.23223 9.26777C8.70107 9.73661 9.33696 10 10 10C10.663 10 11.2989 9.73661 11.7678 9.26777C12.2366 8.79893 12.5 8.16304 12.5 7.5V6.25H17.5V7.5C17.5 8.16304 17.7634 8.79893 18.2322 9.26777C18.7011 9.73661 19.337 10 20 10C20.663 10 21.2989 9.73661 21.7678 9.26777C22.2366 8.79893 22.5 8.16304 22.5 7.5V6.25H27.5V7.5C27.5 8.16304 27.7634 8.79893 28.2322 9.26777C28.7011 9.73661 29.337 10 30 10C30.663 10 31.2989 9.73661 31.7678 9.26777C32.2366 8.79893 32.5 8.16304 32.5 7.5V6.25H35.625C36.1218 6.25148 36.5979 6.4495 36.9492 6.80081C37.3005 7.15212 37.4985 7.62818 37.5 8.125V12.5Z" fill="#1260FE" />
                                        <path d="M18.75 18.125C18.75 17.7935 18.6183 17.4755 18.3839 17.2411C18.1495 17.0067 17.8315 16.875 17.5 16.875H15C14.6685 16.875 14.3505 17.0067 14.1161 17.2411C13.8817 17.4755 13.75 17.7935 13.75 18.125V20C13.75 20.3315 13.8817 20.6495 14.1161 20.8839C14.3505 21.1183 14.6685 21.25 15 21.25H17.5C17.8315 21.25 18.1495 21.1183 18.3839 20.8839C18.6183 20.6495 18.75 20.3315 18.75 20V18.125ZM15 20V18.125H17.5V20H15ZM11.25 18.125C11.25 17.7935 11.1183 17.4755 10.8839 17.2411C10.6495 17.0067 10.3315 16.875 10 16.875H7.5C7.16848 16.875 6.85054 17.0067 6.61612 17.2411C6.3817 17.4755 6.25 17.7935 6.25 18.125V20C6.25 20.3315 6.3817 20.6495 6.61612 20.8839C6.85054 21.1183 7.16848 21.25 7.5 21.25H10C10.3315 21.25 10.6495 21.1183 10.8839 20.8839C11.1183 20.6495 11.25 20.3315 11.25 20V18.125ZM7.5 20V18.125H10V20H7.5ZM32.5 21.25C32.8315 21.25 33.1495 21.1183 33.3839 20.8839C33.6183 20.6495 33.75 20.3315 33.75 20V18.125C33.75 17.7935 33.6183 17.4755 33.3839 17.2411C33.1495 17.0067 32.8315 16.875 32.5 16.875H30C29.6685 16.875 29.3505 17.0067 29.1161 17.2411C28.8817 17.4755 28.75 17.7935 28.75 18.125V20C28.75 20.3315 28.8817 20.6495 29.1161 20.8839C29.3505 21.1183 29.6685 21.25 30 21.25H32.5ZM30 18.125H32.5V20H30V18.125ZM18.75 23.75C18.75 23.4185 18.6183 23.1005 18.3839 22.8661C18.1495 22.6317 17.8315 22.5 17.5 22.5H15C14.6685 22.5 14.3505 22.6317 14.1161 22.8661C13.8817 23.1005 13.75 23.4185 13.75 23.75V25.625C13.75 25.9565 13.8817 26.2745 14.1161 26.5089C14.3505 26.7433 14.6685 26.875 15 26.875H17.5C17.8315 26.875 18.1495 26.7433 18.3839 26.5089C18.6183 26.2745 18.75 25.9565 18.75 25.625V23.75ZM15 25.625V23.75H17.5V25.625H15ZM11.25 23.75C11.25 23.4185 11.1183 23.1005 10.8839 22.8661C10.6495 22.6317 10.3315 22.5 10 22.5H7.5C7.16848 22.5 6.85054 22.6317 6.61612 22.8661C6.3817 23.1005 6.25 23.4185 6.25 23.75V25.625C6.25 25.9565 6.3817 26.2745 6.61612 26.5089C6.85054 26.7433 7.16848 26.875 7.5 26.875H10C10.3315 26.875 10.6495 26.7433 10.8839 26.5089C11.1183 26.2745 11.25 25.9565 11.25 25.625V23.75ZM7.5 25.625V23.75H10V25.625H7.5ZM17.5 28.125H15C14.6685 28.125 14.3505 28.2567 14.1161 28.4911C13.8817 28.7255 13.75 29.0435 13.75 29.375V31.25C13.75 31.5815 13.8817 31.8995 14.1161 32.1339C14.3505 32.3683 14.6685 32.5 15 32.5H17.5C17.8315 32.5 18.1495 32.3683 18.3839 32.1339C18.6183 31.8995 18.75 31.5815 18.75 31.25V29.375C18.75 29.0435 18.6183 28.7255 18.3839 28.4911C18.1495 28.2567 17.8315 28.125 17.5 28.125ZM15 31.25V29.375H17.5V31.25H15ZM22.5 21.25H25C25.3315 21.25 25.6495 21.1183 25.8839 20.8839C26.1183 20.6495 26.25 20.3315 26.25 20V18.125C26.25 17.7935 26.1183 17.4755 25.8839 17.2411C25.6495 17.0067 25.3315 16.875 25 16.875H22.5C22.1685 16.875 21.8505 17.0067 21.6161 17.2411C21.3817 17.4755 21.25 17.7935 21.25 18.125V20C21.25 20.3315 21.3817 20.6495 21.6161 20.8839C21.8505 21.1183 22.1685 21.25 22.5 21.25ZM22.5 18.125H25V20H22.5V18.125ZM21.25 25.625C21.25 25.9565 21.3817 26.2745 21.6161 26.5089C21.8505 26.7433 22.1685 26.875 22.5 26.875C22.6658 26.875 22.8247 26.8092 22.9419 26.6919C23.0592 26.5747 23.125 26.4158 23.125 26.25C23.125 26.0842 23.0592 25.9253 22.9419 25.8081C22.8247 25.6908 22.6658 25.625 22.5 25.625V23.75H25C25.1658 23.75 25.3247 23.6842 25.4419 23.5669C25.5592 23.4497 25.625 23.2908 25.625 23.125C25.625 22.9592 25.5592 22.8003 25.4419 22.6831C25.3247 22.5658 25.1658 22.5 25 22.5H22.5C22.1685 22.5 21.8505 22.6317 21.6161 22.8661C21.3817 23.1005 21.25 23.4185 21.25 23.75V25.625ZM10 28.125H7.5C7.16848 28.125 6.85054 28.2567 6.61612 28.4911C6.3817 28.7255 6.25 29.0435 6.25 29.375V31.25C6.25 31.5815 6.3817 31.8995 6.61612 32.1339C6.85054 32.3683 7.16848 32.5 7.5 32.5H10C10.3315 32.5 10.6495 32.3683 10.8839 32.1339C11.1183 31.8995 11.25 31.5815 11.25 31.25V29.375C11.25 29.0435 11.1183 28.7255 10.8839 28.4911C10.6495 28.2567 10.3315 28.125 10 28.125ZM7.5 31.25V29.375H10V31.25H7.5Z" fill="#1260FE" />
                                        <path d="M30.625 22.5C29.018 22.5 27.4471 22.9765 26.111 23.8693C24.7748 24.7621 23.7334 26.031 23.1185 27.5157C22.5035 29.0003 22.3426 30.634 22.6561 32.2101C22.9696 33.7862 23.7435 35.2339 24.8798 36.3702C26.0161 37.5065 27.4638 38.2804 29.0399 38.5939C30.616 38.9074 32.2497 38.7465 33.7343 38.1315C35.219 37.5166 36.4879 36.4752 37.3807 35.139C38.2735 33.8029 38.75 32.232 38.75 30.625C38.7475 28.4709 37.8907 26.4057 36.3675 24.8825C34.8443 23.3593 32.7791 22.5025 30.625 22.5ZM30.625 37.5C29.2653 37.5 27.936 37.0968 26.8055 36.3414C25.6749 35.5859 24.7937 34.5122 24.2733 33.2559C23.753 31.9997 23.6168 30.6174 23.8821 29.2838C24.1474 27.9501 24.8022 26.7251 25.7636 25.7636C26.7251 24.8022 27.9501 24.1474 29.2838 23.8821C30.6174 23.6168 31.9997 23.753 33.256 24.2733C34.5122 24.7937 35.5859 25.6749 36.3414 26.8055C37.0968 27.936 37.5 29.2653 37.5 30.625C37.4979 32.4477 36.7728 34.1951 35.484 35.484C34.1951 36.7728 32.4477 37.4978 30.625 37.5Z" fill="#1260FE" />
                                        <path d="M34.2363 28.0055L29.375 32.8668L27.1656 30.6568C27.0478 30.5429 26.8899 30.4799 26.726 30.4814C26.5621 30.4828 26.4054 30.5485 26.2895 30.6644C26.1736 30.7803 26.1079 30.937 26.1065 31.1009C26.105 31.2648 26.168 31.4226 26.2819 31.5405L28.9331 34.1924C29.0503 34.3096 29.2093 34.3754 29.375 34.3754C29.5407 34.3754 29.6997 34.3096 29.8169 34.1924L35.12 28.8893C35.2339 28.7714 35.2969 28.6135 35.2954 28.4496C35.294 28.2858 35.2283 28.129 35.1124 28.0131C34.9965 27.8973 34.8398 27.8315 34.6759 27.8301C34.512 27.8287 34.3541 27.8917 34.2363 28.0055Z" fill="#1260FE" />
                                    </svg>
                                </div>

                                <!-- txt -->
                                <div>
                                    <h6 class="font-medium text-[18px] text-black mb-[8px]">When Start</h6>
                                    <p class="text-[16px] font-light text-etGray">Tuesday – Friday 16 to 20 January, 2024</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-[20px] rev-slide-up">
                                <div class="shrink-0 h-[80px] w-[80px] rounded-[6px] shadow-[0_4px_50px_10px_rgba(18,96,254,0.10)] flex items-center justify-center">
                                    <svg width="28" height="40" viewBox="0 0 28 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.0762 3.12502C13.6441 3.1219 13.2918 3.46955 13.2887 3.9008C13.2855 4.33205 13.6324 4.6844 14.0644 4.68752C14.4957 4.69065 14.848 4.34377 14.8512 3.91252C14.8543 3.48127 14.5074 3.12893 14.0762 3.12502ZM14.0406 7.81244C11.0241 7.79104 8.55373 10.2246 8.53092 13.2401C8.50819 16.2555 10.943 18.7271 13.9586 18.7498L14.0004 18.7499C16.9968 18.7499 19.4456 16.3237 19.4683 13.3221C19.491 10.3069 17.0562 7.83518 14.0406 7.81244ZM14.0003 17.1875L13.9703 17.1874C11.8163 17.1711 10.0771 15.4056 10.0933 13.2518C10.1095 11.1077 11.8586 9.37471 13.9989 9.37471L14.0289 9.37486C16.1829 9.39111 17.9221 11.1566 17.9058 13.3104C17.8896 15.4546 16.1406 17.1875 14.0003 17.1875ZM17.4083 3.71752C17.0019 3.5733 16.5551 3.78619 16.4108 4.19291C16.2667 4.59963 16.4796 5.04611 16.8862 5.19033C20.3274 6.40994 22.6208 9.68737 22.5933 13.3457C22.5901 13.7771 22.9372 14.1296 23.3687 14.1328H23.3747C23.8033 14.1328 24.1525 13.7869 24.1558 13.3574C24.1883 9.03346 21.4766 5.15947 17.4083 3.71752Z" fill="#1260FE" />
                                        <path d="M18.7933 29.4095C23.9896 22.7209 27.2371 19.233 27.2809 13.3811C27.3359 6.01836 21.3607 0 13.9986 0C6.7223 0 0.774021 5.89281 0.718709 13.1819C0.674021 19.1924 3.98176 22.6755 9.21394 29.4084C4.00886 30.1863 0.718709 32.1407 0.718709 34.5312C0.718709 36.1326 2.19887 37.5695 4.8866 38.5773C7.33293 39.4947 10.5694 39.9999 13.9998 39.9999C17.4302 39.9999 20.6667 39.4947 23.113 38.5773C25.8007 37.5695 27.2809 36.1325 27.2809 34.5312C27.2809 32.142 23.9938 30.188 18.7933 29.4095ZM2.28113 13.1937C2.32988 6.76172 7.57793 1.5625 13.9987 1.5625C20.4955 1.5625 25.7669 6.87406 25.7185 13.3695C25.6769 18.9268 22.233 22.3516 16.7348 29.519C15.7541 30.7968 14.8535 32.0049 14.001 33.1867C13.151 32.0042 12.2683 30.8177 11.2729 29.5185C5.54746 22.051 2.23879 18.8851 2.28113 13.1937ZM13.9998 38.4375C7.29269 38.4375 2.28113 36.3752 2.28113 34.5312C2.28113 33.1637 5.27707 31.4362 10.3144 30.838C11.4279 32.2991 12.4042 33.6264 13.3617 34.982C13.4338 35.0841 13.5293 35.1673 13.6402 35.2248C13.7511 35.2823 13.8742 35.3124 13.9991 35.3125H13.9998C14.1246 35.3125 14.2476 35.2826 14.3585 35.2253C14.4694 35.1679 14.565 35.0849 14.6371 34.983C15.5856 33.6451 16.5886 32.285 17.6925 30.8389C22.7252 31.4377 25.7185 33.1647 25.7185 34.5313C25.7184 36.3752 20.7069 38.4375 13.9998 38.4375Z" fill="#1260FE" />
                                    </svg>
                                </div>

                                <!-- txt -->
                                <div>
                                    <h6 class="font-medium text-[18px] text-black mb-[8px]">Locations</h6>
                                    <p class="text-[16px] font-light text-etGray">1901 Thornridge Cir. Shiloh, Hawaii 81063</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[16px] rev-slide-up">
                            <a href="about.html" class="et-btn bg-etBlue inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] text-white font-normal text-[17px] rounded-full hover:!bg-black hover:!text-white">Register Now</a>

                            <div class="flex items-center gap-[9px]">
                                <div class="w-[clamp(40px,2.31vw,44px)] outline outline-etBlue outline-offset-[2px] aspect-square bg-etBlue rounded-full inline-flex items-center justify-center text-white text-[clamp(13px,0.84vw,16px)]"><i class="fa-solid fa-phone-volume"></i></div>
                                <div>
                                    <span class="block text-etGray font-medium text-[12px]">Call Us Now</span>
                                    <a href="tel:1234567890" class="text-[#2E2A20] text-[clamp(13px,0.84vw,16px)] font-medium hover:text-etBlue">+1 123 456 7890</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="et-5-about-vectors *:absolute *:-z-[1]">
                <img src="assets/img/et-5-about-vector-1.svg" alt="vector" class="bottom-0 left-0 max-w-[clamp(152px,15.92vw,303px)] md:hidden">
                <img src="assets/img/et-5-about-vector-2.svg" alt="vector" class="bottom-0 right-0 max-w-[clamp(100px,13.50vw,257px)]">
            </div>
        </section>
        <!-- ABOUT SECTION END -->


        <!-- EVENT SCHEDULE SECTION START -->
        <section class="et-5-schedules py-[130px] xl:py-[80px] md:py-[60px] relative z-[1]">
            <div class="et-1-container rev-slide-up">
                <!-- heading -->
                <div class="et-schedule-heading flex sm:flex-col justify-between items-center mb-[40px] gap-[15px]">
                    <div class="left xs:text-center max-w-[50%] sm:max-w-full">
                        <h6 class="et-section-sub-title anim-text">Event Timetable</h6>
                        <h2 class="et-section-title anim-text">Information Of Event Schedule</h2>
                    </div>

                </div>

                <!-- events -->
                <div class="et-schedules-tab-container">
                    <div id="tab1" class="et-tab active">
                        <div class="all-scheduled-events space-y-[30px]">


                            @forelse ($events as $event)
                            
                            <!-- single schedule -->
                            <div class="et-schedule bg-[#EDF3FE]/40 border border-[#e5e5e5] p-[8px] rounded-[20px] flex md:flex-wrap gap-x-[30px] gap-y-[20px] justify-between rev-slide-up">
                                <!-- img -->
                                <div class="w-[270px] h-[226px]  shrink-0 rounded-[20px] overflow-hidden xs:w-full"> 
                                     @if ($event->image)
                                                    <img class="w-12 h-12 rounded-md object-cover"
                                                        src="{{ Storage::url('event-images/' . $event->image) }}"
                                                        alt="{{ $event->title }}">
                                                @else
                                                    <div
                                                        class="w-12 h-12 rounded-md bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                        <i class="ri-calendar-event-line text-gray-400"></i>
                                                    </div>
                                                @endif</div>

                                <!-- text -->
                                <div class="pr-[37px] sm:pr-[22px] w-full rounded-[20px] flex gap-y-[15px] xs:flex-col items-center xs:items-start">
                                    <div class="et-schedule__heading pr-[40px] sm:pr-[25px] xs:pr-0 mr-[40px] sm:mr-[25px] xs:mr-0 border-r xs:border-r-0 border-[#d9d9d9]">
                                        <!-- date & time -->
                                        <div class="et-schedule-date-time border border-[rgba(217,217,217,0.89)] py-[7px] px-[15px] rounded-full inline-flex xxs:w-full items-center justify-center gap-x-[24px] gap-y-[10px] mb-[10px] xxs:border-0 xxs:p-0 xxs:justify-start">
                                            <div class="date flex items-center gap-[10px]">
                                                <span class="icon">
                                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2043_1443)">
                                                            <path d="M14.125 1.75H13.375V0.5H12.125V1.75H3.875V0.5H2.625V1.75H1.875C0.841125 1.75 0 2.59113 0 3.625V14.625C0 15.6589 0.841125 16.5 1.875 16.5H14.125C15.1589 16.5 16 15.6589 16 14.625V3.625C16 2.59113 15.1589 1.75 14.125 1.75ZM14.75 14.625C14.75 14.9696 14.4696 15.25 14.125 15.25H1.875C1.53038 15.25 1.25 14.9696 1.25 14.625V6.375H14.75V14.625ZM14.75 5.125H1.25V3.625C1.25 3.28038 1.53038 3 1.875 3H2.625V4.25H3.875V3H12.125V4.25H13.375V3H14.125C14.4696 3 14.75 3.28038 14.75 3.625V5.125Z" fill="var(--et-blue)" />
                                                            <path d="M3.625 7.6875H2.375V8.9375H3.625V7.6875Z" fill="var(--et-blue)" />
                                                            <path d="M6.125 7.6875H4.875V8.9375H6.125V7.6875Z" fill="var(--et-blue)" />
                                                            <path d="M8.625 7.6875H7.375V8.9375H8.625V7.6875Z" fill="var(--et-blue)" />
                                                            <path d="M11.125 7.6875H9.875V8.9375H11.125V7.6875Z" fill="var(--et-blue)" />
                                                            <path d="M13.625 7.6875H12.375V8.9375H13.625V7.6875Z" fill="var(--et-blue)" />
                                                            <path d="M3.625 10.1875H2.375V11.4375H3.625V10.1875Z" fill="var(--et-blue)" />
                                                            <path d="M6.125 10.1875H4.875V11.4375H6.125V10.1875Z" fill="var(--et-blue)" />
                                                            <path d="M8.625 10.1875H7.375V11.4375H8.625V10.1875Z" fill="var(--et-blue)" />
                                                            <path d="M11.125 10.1875H9.875V11.4375H11.125V10.1875Z" fill="var(--et-blue)" />
                                                            <path d="M3.625 12.6875H2.375V13.9375H3.625V12.6875Z" fill="var(--et-blue)" />
                                                            <path d="M6.125 12.6875H4.875V13.9375H6.125V12.6875Z" fill="var(--et-blue)" />
                                                            <path d="M8.625 12.6875H7.375V13.9375H8.625V12.6875Z" fill="var(--et-blue)" />
                                                            <path d="M11.125 12.6875H9.875V13.9375H11.125V12.6875Z" fill="var(--et-blue)" />
                                                            <path d="M13.625 10.1875H12.375V11.4375H13.625V10.1875Z" fill="var(--et-blue)" />
                                                        </g>
                                                    </svg>
                                                </span>

                                                <span class="text-etGray font-normal text-[16px]">{{ $event->getFormatedDate()}}</span>
                                            </div>

                                            <div class="time flex items-center gap-[10px] xxs:hidden">
                                                <span class="icon">
                                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.8505 9.91291L8.61967 8.23979V4.8316C8.61967 4.48891 8.34266 4.21191 7.99998 4.21191C7.65729 4.21191 7.38029 4.48891 7.38029 4.8316V8.54966C7.38029 8.74485 7.47201 8.92892 7.62817 9.04541L10.1069 10.9044C10.2138 10.985 10.3441 11.0285 10.478 11.0284C10.667 11.0284 10.8529 10.9435 10.9744 10.7799C11.1802 10.5066 11.1244 10.118 10.8505 9.91291Z" fill="var(--et-blue)" />
                                                        <path d="M8 0.5C3.58853 0.5 0 4.08853 0 8.5C0 12.9115 3.58853 16.5 8 16.5C12.4115 16.5 16 12.9115 16 8.5C16 4.08853 12.4115 0.5 8 0.5ZM8 15.2607C4.27266 15.2607 1.23934 12.2273 1.23934 8.5C1.23934 4.77266 4.27266 1.73934 8 1.73934C11.728 1.73934 14.7607 4.77266 14.7607 8.5C14.7607 12.2273 11.7273 15.2607 8 15.2607Z" fill="var(--et-blue)" />
                                                    </svg>
                                                </span>

                                                <span class="text-etGray font-normal text-[16px]">{{$event->getFormatedTime() }}</span>
                                            </div>
                                        </div>

                                        <!-- title -->
                                        <h3 class="text-[16px] text-etGray"> {{ $event->title }}</h3>
                                        {{-- slug --}}
                                        <h3 class="text-[16px] text-etGray">{{$event->slug}}</h3>
                                        {{-- category name --}}
                                         <span class="inline-flex items-center text-etGray px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 text-[16px]">
                                                {{ $event->category->name }}
                                            </span>

                                        <!-- location -->
                                        <div class="et-schedule-loaction flex items-center gap-[12px]">
                                            <span class="icon">
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.99998 0C2.80482 0 0.205383 2.59944 0.205383 5.79456C0.205383 9.75981 5.39098 15.581 5.61176 15.8269C5.81913 16.0579 6.1812 16.0575 6.3882 15.8269C6.60898 15.581 11.7946 9.75981 11.7946 5.79456C11.7945 2.59944 9.1951 0 5.99998 0ZM5.99998 8.70997C4.39241 8.70997 3.0846 7.40212 3.0846 5.79456C3.0846 4.187 4.39245 2.87919 5.99998 2.87919C7.60751 2.87919 8.91532 4.18703 8.91532 5.79459C8.91532 7.40216 7.60751 8.70997 5.99998 8.70997Z" fill="var(--et-blue)" />
                                                </svg>
                                            </span>
                                            <h6 class="text-[16px] text-etGray">{{$event->location}}</h6>
                                        </div>
                                    </div>

                                    <div class="flex shrink-0 xxl:flex-col flex-wrap items-center xxl:items-start gap-x-[30px] gap-y-[16px]">
                                        <a href="{{ route('events.show', $event->slug) }}" class="et-btn border border-etBlue bg-etBlue text-white inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] font-normal text-[17px] rounded-full hover:!bg-transparent hover:!text-etBlue">View Details</a>
                                        <div class="flex items-center">
                                            <div class="flex *:-ml-[20px]">
                                                <img src="assets/img/reviewer-1.png" alt="Person" class="w-[45px] h-[45px] rounded-full border-[3px] border-white first:ml-0">
                                                <img src="assets/img/reviewer-2.png" alt="Person" class="w-[45px] h-[45px] rounded-full border-[3px] border-white first:ml-0">
                                                <img src="assets/img/reviewer-3.png" alt="Person" class="w-[45px] h-[45px] rounded-full border-[3px] border-white first:ml-0">
                                                <div class="w-[45px] h-[45px] rounded-full border-[3px] border-white first:ml-0 text-white bg-etBlue font-semibold flex items-center justify-center text-[16px]"></div>
                                            </div>
                                            <span class="font-semibold text-etBlue text-[16px] -ml-[29px]"><span class="text-white">Spe</span>akers</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             @empty
                             <div class="text-center py-12">
                                <p class="text-x1 text-gray-400">
                                    No upcoming events at the moment. check back soon
                                </p>

                             </div>


                            @endforelse

                        </div>
                    </div>

                  
                </div>

            </div>

            <div class="et-5-schedule-vectors *:absolute *:-z-[1] sm:hidden">
                <img src="assets/img/et-5-schedule-vector-1.svg" alt="vector" class="top-[50%] left-[50px]">
                <img src="assets/img/et-5-schedule-vector-2.svg" alt="vector" class="top-[55%] right-[75px]">
            </div>
        </section>
        <!-- EVENT SCHEDULE SECTION END -->


        <!-- SPEAKERS SECTION START -->
        <section class="et-5-speakers py-[clamp(60px,6.31vw,120px)] bg-[#011A4D] rounded-[clamp(20px,1.58vw,30px)] relative z-[1] overflow-hidden">
            <div class="et-1-container">
                <!-- section heading -->
                <div class="et-speakers-heading flex xs:flex-col justify-center items-center mb-[46px] xl:mb-[26px] lg:mb-[16px] gap-[15px]">
                    <div class="left text-center">
                        <h6 class="et-section-sub-title anim-text !text-white before:!bg-white">Event Speakers</h6>
                        <h2 class="et-section-title anim-text !text-white">Meet Our Creatives Speakers</h2>
                    </div>
                </div>

                <!-- speakers -->
                <div class="grid grid-cols-3 md:grid-cols-2 xxs:grid-cols-1 gap-[clamp(20px,1.58vw,30px)]">
                    <!--  single speaker -->
                    <div class="col">
                        <div class="et-5-speaker group relative z-1 overflow-hidden h-full">
                            <div class="et-5-speaker-img h-full flex relative z-0 rounded-[clamp(60px,5.25vw,100px)] overflow-hidden before:bg-[#D9D9D9] before:absolute before:inset-0 before:top-[24%] before:rounded-[clamp(60px,5.25vw,100px)] before:-z-[2] after:bg-white/20 after:absolute after:inset-0 after:top-[20%] after:rounded-[clamp(60px,5.25vw,100px)] after:-z-[1]">
                                <img src="assets/img/et-5-speaker-1.png" alt="speaker" class="mx-auto max-w-[90%]">
                            </div>
                            <div class="et-5-speaker-txt py-[clamp(8px,0.79vw,15px)] text-center absolute z-10 bg-white inset-x-[clamp(15px,1.58vw,30px)] bottom-[clamp(20px,2.10vw,40px)] rounded-full shadow-[0_0_30px_rgba(0,0,0,0.05)] group-[:hover]:bg-etBlue transition duration-[0.4s]">
                                <h4 class="et-5-speaker-name font-medium text-[clamp(17px,1.05vw,20px)] leading-[160%] mb-[3px]"><a href="#" class="group-[:hover]:text-white hover:text-black">Albert Flores</a></h4>
                                <p class="et-5-speaker-role text-etGray text-[clamp(13px,0.94vw,16px)] group-[:hover]:text-white transition duration-[0.4s]">Medical Assistant</p>
                            </div>
                        </div>
                    </div>

                    <!--  single speaker -->
                    <div class="col">
                        <div class="et-5-speaker group relative z-1 overflow-hidden h-full">
                            <div class="et-5-speaker-img h-full flex relative z-0 rounded-[clamp(60px,5.25vw,100px)] overflow-hidden before:bg-[#D9D9D9] before:absolute before:inset-0 before:top-[24%] before:rounded-[clamp(60px,5.25vw,100px)] before:-z-[2] after:bg-white/20 after:absolute after:inset-0 after:top-[20%] after:rounded-[clamp(60px,5.25vw,100px)] after:-z-[1]">
                                <img src="assets/img/et-5-speaker-2.png" alt="speaker" class="mx-auto max-w-[90%]">
                            </div>
                            <div class="et-5-speaker-txt py-[clamp(8px,0.79vw,15px)] text-center absolute z-10 bg-white inset-x-[clamp(15px,1.58vw,30px)] bottom-[clamp(20px,2.10vw,40px)] rounded-full shadow-[0_0_30px_rgba(0,0,0,0.05)] group-[:hover]:bg-etBlue transition duration-[0.4s]">
                                <h4 class="et-5-speaker-name font-medium text-[clamp(17px,1.05vw,20px)] leading-[160%] mb-[3px]"><a href="#" class="group-[:hover]:text-white hover:text-black">Albert Flores</a></h4>
                                <p class="et-5-speaker-role text-etGray text-[clamp(13px,0.94vw,16px)] group-[:hover]:text-white transition duration-[0.4s]">Medical Assistant</p>
                            </div>
                        </div>
                    </div>

                    <!--  single speaker -->
                    <div class="col">
                        <div class="et-5-speaker group relative z-1 overflow-hidden h-full">
                            <div class="et-5-speaker-img h-full flex relative z-0 rounded-[clamp(60px,5.25vw,100px)] overflow-hidden before:bg-[#D9D9D9] before:absolute before:inset-0 before:top-[24%] before:rounded-[clamp(60px,5.25vw,100px)] before:-z-[2] after:bg-white/20 after:absolute after:inset-0 after:top-[20%] after:rounded-[clamp(60px,5.25vw,100px)] after:-z-[1]">
                                <img src="assets/img/et-5-speaker-3.png" alt="speaker" class="mx-auto max-w-[90%]">
                            </div>
                            <div class="et-5-speaker-txt py-[clamp(8px,0.79vw,15px)] text-center absolute z-10 bg-white inset-x-[clamp(15px,1.58vw,30px)] bottom-[clamp(20px,2.10vw,40px)] rounded-full shadow-[0_0_30px_rgba(0,0,0,0.05)] group-[:hover]:bg-etBlue transition duration-[0.4s]">
                                <h4 class="et-5-speaker-name font-medium text-[clamp(17px,1.05vw,20px)] leading-[160%] mb-[3px]"><a href="#" class="group-[:hover]:text-white hover:text-black">Albert Flores</a></h4>
                                <p class="et-5-speaker-role text-etGray text-[clamp(13px,0.94vw,16px)] group-[:hover]:text-white transition duration-[0.4s]">Medical Assistant</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- vectors -->
            <div class="et-5-speakers-vectors *:absolute *:-z-[1]">
                <img src="assets/img/et-5-speaker-vector-1.svg" alt="vector" class="top-[clamp(73px,7.67vw,146px)] left-[clamp(64px,6.73vw,128px)] sm:hidden">
                <img src="assets/img/et-5-speaker-vector-2.svg" alt="vector" class="top-[clamp(75px,7.62vw,145px)] right-[clamp(83px,8.67vw,165px)] sm:hidden">
                <img src="assets/img/et-5-speaker-vector-3.svg" alt="vector" class="left-[clamp(114px,11.93vw,227px)] bottom-[clamp(24px,2.36vw,45px)]">
                <img src="assets/img/et-5-speaker-vector-4.svg" alt="vector" class="right-0 bottom-[clamp(45px,4.73vw,90px)]">
            </div>
        </section>
        <!-- SPEAKERS SECTION END -->


        <!-- GALLRY SECTION START -->
        <section class="py-[clamp(60px,6.31vw,120px)]">
            <div class="max-w-[calc(clamp(1150px,79.35vw,1510px+30px))] px-[15px] mx-auto">
                <!-- section heading -->
                <div class="flex xs:flex-col justify-center items-center mb-[46px] xl:mb-[26px] lg:mb-[16px] gap-[15px]">
                    <div class="left text-center">
                        <h6 class="et-section-sub-title anim-text">Our Gallery</h6>
                        <h2 class="et-section-title anim-text">Beautiful Snapshot Of Recent Events</h2>
                    </div>
                </div>

                <!-- gallery grid -->
                <div class="grid grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-[clamp(15px,1.58vw,30px)]">
                    <!-- single gallery item -->
                    <div class="et-5-gallery-item order-1">
                        <img src="assets/img/et-5-gallery-1.jpg" alt="Gallery Item" class="w-full aspect-[479/389] rounded-[30px]">
                    </div>

                    <!-- single gallery item -->
                    <div class="et-5-gallery-item order-2 sm:order-3 relative">
                        <img src="assets/img/et-5-gallery-2.jpg" alt="Gallery Item" class="w-full aspect-[479/389] rounded-[30px]">
                        <div class="text-center rounded-tl-[200px] rounded-tr-[200px] absolute bottom-0 inset-x-[clamp(25px,2.68vw,51px)] mix-blend-hard-light bg-etBlue py-[clamp(15px,1.58vw,30px)] px-[15px]">
                            <span class="block text-white font-semibold text-[clamp(20px,1.26vw,24px)] leading-[0.86] -tracking-[0.02em] mb-[4px] anim-text">2020</span>
                            <h2 class="et-section-title !text-white !text-[clamp(17px,1.05vw,20px)] !font-normal mb-[clamp(12px,1.16vw,22px)] anim-text">Our Events Gallery</h2>
                            <a href="gallery.html" class="inline-flex items-center justify-center rounded-full border border-white text-[16px] h-[45px] px-[15px] text-white hover:bg-white hover:text-etBlue">View All Gallery</a>
                        </div>
                    </div>

                    <!-- single gallery item -->
                    <div class="et-5-gallery-item order-3 sm:order-2">
                        <img src="assets/img/et-5-gallery-3.jpg" alt="Gallery Item" class="w-full aspect-[479/389] rounded-[30px]">
                    </div>
                </div>
            </div>
        </section>
        <!-- GALLRY SECTION END -->


        <!-- SPONSORS SECTION START -->
        <section class="et-2-sponsors max-w-[clamp(1150px,79.35vw,1510px)] mx-auto lg:mx-[15px] rounded-[clamp(15px,1.58vw,30px)] bg-etBlue py-[130px] lg:py-[80px] md:py-[60px] relative z-[1] before:absolute before:inset-0 before:bg-[url('assets/img/testimonial-bg.png')] before:bg-cover before:bg-center before:bg-no-repeat before:-z-[1] before:opacity-[8%] before:mix-blend-multiply">
            <div class="et-1-container">
                <!-- heading -->
                <div class="text-center mb-[52px] xl:mb-[42px] md:mb-[32px]">
                    <h6 class="et-section-sub-title !text-white before:!bg-white anim-text">Sponsors & Exhibitors</h6>
                    <h2 class="et-section-title !text-white anim-text">We're Sponsored By</h2>
                </div>

                <!-- sponsors -->
                <div class="flex flex-wrap justify-center gap-y-[60px] lg:gap-y-[40px] gap-x-[76px] xxl:gap-x-[56px] xl:gap-x-[46px] lg:gap-x-[36px] md:gap-x-[15px] *:xxs:max-w-[47%]">
                    <div><img src="assets/img/sponsor-1-light.png" alt="sponsor logo" class="w-[80%] mx-auto"></div>
                    <div><img src="assets/img/sponsor-2-light.png" alt="sponsor logo" class="w-[80%] mx-auto"></div>
                    <div><img src="assets/img/sponsor-3-light.png" alt="sponsor logo" class="w-[80%] mx-auto"></div>
                    <div><img src="assets/img/sponsor-4-light.png" alt="sponsor logo" class="w-[80%] mx-auto"></div>
                    <div><img src="assets/img/sponsor-5-light.png" alt="sponsor logo" class="w-[80%] mx-auto"></div>
                    <div><img src="assets/img/sponsor-6-light.png" alt="sponsor logo" class="w-[80%] mx-auto"></div>
                    <div><img src="assets/img/sponsor-7-light.png" alt="sponsor logo" class="w-[80%] mx-auto"></div>
                    <div><img src="assets/img/sponsor-8-light.png" alt="sponsor logo" class="w-[80%] mx-auto"></div>
                    <div><img src="assets/img/sponsor-9-light.png" alt="sponsor logo" class="w-[80%] mx-auto"></div>
                    <div><img src="assets/img/sponsor-2-light.png" alt="sponsor logo" class="w-[80%] mx-auto"></div>
                    <div><img src="assets/img/sponsor-10-light.png" alt="sponsor logo" class="w-[80%] mx-auto"></div>
                </div>
            </div>
        </section>
        <!-- SPONSORS SECTION END -->


        <!-- PRICING SECTION START -->
        <section class="py-[clamp(60px,6.31vw,120px)] relative z-[1]">
            <div class="et-1-container">
                <!-- section heading -->
                <div class="flex xs:flex-col justify-center items-center mb-[46px] xl:mb-[26px] lg:mb-[16px] gap-[15px]">
                    <div class="left text-center">
                        <h6 class="et-section-sub-title anim-text">Event Tickets Price</h6>
                        <h2 class="et-section-title anim-text">Choose Your Tickets</h2>
                    </div>
                </div>

                <!-- pricing package grid -->
                <div class="grid grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-[30px] lg:gap-[20px]">
                    <!-- single pricing -->
                    <div class="et-5-pricing-plan p-[clamp(20px,2.10vw,40px)] pt-[clamp(57px,3.15vw,60px)] overflow-hidden relative z-[1] rev-slide-up">
                        <div class="bg-etBlue py-[10px] px-[16px] text-white rounded-full absolute -z-[1] top-0 left-1/2 -translate-x-1/2 text-center min-w-[36%]">
                            <h5 class="font-normal text-[15px]">Basic Plan</h5>
                        </div>

                        <!-- price -->
                        <div class="border-b border-[#DBDBDB]">
                            <div class="flex items-center justify-between mb-[25px]">
                                <div>
                                    <h4 class="font-semibold text-[40px] md:text-[35px] leading-[0.8] mb-[9px]">$39.00</h4>
                                    <span class="block text-[18px] text-etGray">One Day</span>
                                </div>

                                <img src="assets/img/et-5-pricing-vector.svg" alt="vector">
                            </div>

                            <p class="text-[16px] text-etGray mb-[23px]">Lnteger sapien nec sapien sollicitudin ultrices Cras tempor id lorem et</p>
                        </div>

                        <!-- features -->
                        <ul class="text-[16px] font-light text-etGray pt-[23px] mb-[31px] space-y-[17px] *:relative *:pl-[25px] *:before:absolute *:before:bg-[url(../assets/img/checkmark-blue.svg)] *:before:w-[14px] *:before:aspect-square *:before:left-0 *:before:top-[4px]">
                            <li>Get everything a Conference pass</li>
                            <li>Enjoy 2 days of inspiring talks</li>
                            <li>Breakout sessions exploring</li>
                            <li>Challenging topics, great food.</li>
                            <li>With experts at a Workshops</li>
                        </ul>

                        <span class="font-light text-[15px] text-etGray block mb-[13px]">Up to 10 users + 1.99 per user</span>

                        <a href="#" class="flex items-center gap-[10px] justify-center rounded-full border border-[#384BFF] h-[55px] px-[15px] font-semibold text-[16px] text-[#384BFF] hover:bg-[#384BFF] hover:text-white">
                            <span>Choose Plan</span>
                            <span class="icon"> <i class="fa-solid fa-arrow-right-long"></i> </span>
                        </a>
                    </div>

                    <!-- single pricing -->
                    <div class="et-5-pricing-plan p-[clamp(20px,2.10vw,40px)] pt-[clamp(57px,3.15vw,60px)] overflow-hidden relative z-[1] rev-slide-up">
                        <div class="bg-[#FE8F0E] py-[10px] px-[16px] text-white rounded-full absolute -z-[1] top-0 left-1/2 -translate-x-1/2 text-center min-w-[36%]">
                            <h5 class="font-normal text-[15px]">Most Popular</h5>
                        </div>

                        <!-- price -->
                        <div class="border-b border-[#DBDBDB]">
                            <div class="flex items-center justify-between mb-[25px]">
                                <div>
                                    <h4 class="font-semibold text-[40px] md:text-[35px] leading-[0.8] mb-[9px]">$49.00</h4>
                                    <span class="block text-[18px] text-etGray">One Day</span>
                                </div>

                                <img src="assets/img/et-5-pricing-vector.svg" alt="vector">
                            </div>

                            <p class="text-[16px] text-etGray mb-[23px]">Lnteger sapien nec sapien sollicitudin ultrices Cras tempor id lorem et</p>
                        </div>

                        <!-- features -->
                        <ul class="text-[16px] font-light text-etGray pt-[23px] mb-[31px] space-y-[17px] *:relative *:pl-[25px] *:before:absolute *:before:bg-[url(../assets/img/checkmark-blue.svg)] *:before:w-[14px] *:before:aspect-square *:before:left-0 *:before:top-[4px]">
                            <li>Get everything a Conference pass</li>
                            <li>Enjoy 2 days of inspiring talks</li>
                            <li>Breakout sessions exploring</li>
                            <li>Challenging topics, great food.</li>
                            <li>With experts at a Workshops</li>
                        </ul>

                        <span class="font-light text-[15px] text-etGray block mb-[13px]">Up to 10 users + 1.99 per user</span>

                        <a href="#" class="flex items-center gap-[10px] justify-center rounded-full border bg-[#384BFF] text-white border-[#384BFF] h-[55px] px-[15px] font-semibold text-[16px] hover:text-[#384BFF] hover:bg-white">
                            <span>Choose Plan</span>
                            <span class="icon"> <i class="fa-solid fa-arrow-right-long"></i> </span>
                        </a>
                    </div>

                    <!-- single pricing -->
                    <div class="et-5-pricing-plan p-[clamp(20px,2.10vw,40px)] pt-[clamp(57px,3.15vw,60px)] overflow-hidden relative z-[1] rev-slide-up">
                        <div class="bg-etBlue py-[10px] px-[16px] text-white rounded-full absolute -z-[1] top-0 left-1/2 -translate-x-1/2 text-center min-w-[36%]">
                            <h5 class="font-normal text-[15px]">Premium Plan</h5>
                        </div>

                        <!-- price -->
                        <div class="border-b border-[#DBDBDB]">
                            <div class="flex items-center justify-between mb-[25px]">
                                <div>
                                    <h4 class="font-semibold text-[40px] md:text-[35px] leading-[0.8] mb-[9px]">$99.00</h4>
                                    <span class="block text-[18px] text-etGray">One Day</span>
                                </div>

                                <img src="assets/img/et-5-pricing-vector.svg" alt="vector">
                            </div>

                            <p class="text-[16px] text-etGray mb-[23px]">Lnteger sapien nec sapien sollicitudin ultrices Cras tempor id lorem et</p>
                        </div>

                        <!-- features -->
                        <ul class="text-[16px] font-light text-etGray pt-[23px] mb-[31px] space-y-[17px] *:relative *:pl-[25px] *:before:absolute *:before:bg-[url(../assets/img/checkmark-blue.svg)] *:before:w-[14px] *:before:aspect-square *:before:left-0 *:before:top-[4px]">
                            <li>Get everything a Conference pass</li>
                            <li>Enjoy 2 days of inspiring talks</li>
                            <li>Breakout sessions exploring</li>
                            <li>Challenging topics, great food.</li>
                            <li>With experts at a Workshops</li>
                        </ul>

                        <span class="font-light text-[15px] text-etGray block mb-[13px]">Up to 10 users + 1.99 per user</span>

                        <a href="#" class="flex items-center gap-[10px] justify-center rounded-full border border-[#384BFF] h-[55px] px-[15px] font-semibold text-[16px] text-[#384BFF] hover:bg-[#384BFF] hover:text-white">
                            <span>Choose Plan</span>
                            <span class="icon"> <i class="fa-solid fa-arrow-right-long"></i> </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="et-5-pricing-vectors *:absolute *:-z-[1]">
                <img src="assets/img/et-5-pricing-vector-1.svg" alt="vector" class="left-0 top-[40%]">
                <img src="assets/img/et-5-pricing-vector-2.svg" alt="vector" class="right-0 top-[36%] md:hidden">
            </div>
        </section>
        <!-- PRICING SECTION END -->


        <!-- TESTIMONIAL SECTION START -->
        <section class="bg-[#F2F6FE] py-[clamp(60px,6.31vw,120px)] relative z-[1] overflow-hidden after:absolute after:inset-0 after:bg-[url(../assets/img/features-bg.png)] after:bg-no-repeat after:bg-cover after:-z-[2] after:mix-blend-multiply after:pointer-events-none">
            <div class="et-1-container">
                <div class="flex md:flex-col items-start gap-[clamp(20px,1.58vw,30px)]">
                    <!-- left /heading -->
                    <div class="heading max-w-[clamp(305px,24.70vw,470px)] shrink-0 relative z-[2] pt-[clamp(0px,1.68vw,32px)]">
                        <h6 class="et-section-sub-title">Testimonial</h6>
                        <h2 class="et-section-title anim-text">What Our Clients Say About Our Events</h2>
                        <div class="et-4-testimonial-slider-nav flex gap-5 *:w-[clamp(45px,2.94vw,56px)] *:aspect-square *:rounded-full *:border *:border-etBlue *:text-etBlue *:text-[clamp(15px,0.95vw,18px)] mt-[clamp(22px,2.21vw,42px)]">
                            <button class="prev hover:bg-etBlue hover:text-white"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next hover:bg-etBlue hover:text-white"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>

                    <!-- slider -->
                    <div class="et-4-testimonial-slider-wrapper md:w-[calc(100vw-(clamp(15px,2.63vw,50px))*2)]">
                        <div class="et-4-testimonial-slider swiper overflow-visible md:overflow-hidden w-[calc(100vw-clamp(374px,19.81vw,377px))] max-w-full md:w-full">
                            <div class="swiper-wrapper">
                                <!-- single testimony  -->
                                <div class="swiper-slide  md:max-w-full group">
                                    <div class="et-4-testimony p-[40px] lg:p-[30px] md:p-[20px] border border-[#256E56]/10 bg-white rounded-[16px]">
                                        <div class="ml-auto w-max max-w-full">
                                            <svg width="46" height="32" viewBox="0 0 46 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.89997 20.8595C7.91 23.3494 6.35003 25.8094 4.26501 28.1795C3.60501 28.9295 3.51501 30.0094 4.055 30.8494C4.47504 31.5094 5.16498 31.8694 5.91498 31.8694C6.125 31.8694 6.33503 31.8545 6.54504 31.7794C10.955 30.4894 21.26 25.9145 21.545 11.2444C21.65 5.58947 17.51 0.72949 12.125 0.17449C9.14001 -0.125525 6.17004 0.849416 3.965 2.82943C1.76004 4.82446 0.5 7.67449 0.5 10.6445C0.5 15.5944 4.01004 19.9295 8.89997 20.8595Z" class="fill-etBlue" />
                                                <path d="M36.065 0.17449C33.095 -0.125525 30.125 0.849416 27.92 2.82943C25.715 4.82446 24.455 7.67449 24.455 10.6445C24.455 15.5944 27.965 19.9295 32.855 20.8595C31.865 23.3494 30.305 25.8094 28.22 28.1795C27.56 28.9295 27.47 30.0094 28.01 30.8494C28.43 31.5094 29.12 31.8694 29.87 31.8694C30.08 31.8694 30.29 31.8545 30.5 31.7794C34.91 30.4894 45.215 25.9144 45.5 11.2444V11.0345C45.5 5.46944 41.405 0.72949 36.065 0.17449Z" class="fill-etBlue" />
                                            </svg>
                                        </div>

                                        <!-- rating stars -->
                                        <div class="flex gap-[9px] text-[#FFC532] text-[18px] mb-[12px]">
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                        </div>

                                        <h6 class="text-[18px] mb-[16px]">Eventek Special Event on Business</h6>

                                        <p class="text-etBlack/70 font-normal text-[16px] mb-[40px]">"Choosing eventek was one of the best decisions for our marketing strategy. They not only promised results but delivered them consistently. Trustworthy, reliable, and results-oriented. We're grateful for their strategic insights and seamless execution.</p>

                                        <!-- single testimonay bottom -->
                                        <div class="flex items-center gap-x-[16px] xxs:flex-col xxs:items-start gap-y-[10px">
                                            <div class="img rounded-full overflow-hidden p-[7px] w-max max-w-full shrink-0">
                                                <img src="assets/img/reviewer-1.png" alt="reviewer image" class="w-[48px] h-[48px]">
                                            </div>

                                            <div class="txt">
                                                <h5 class="text-etBlack font-normal text-[18px] mb-[3px]">David Anderson</h5>
                                                <h6 class="text-etGray/70 font-normal text-[16px]">Marketing Director, Kingosto Tech</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- max-w-[clamp(290px,23.59vw,449px)] -->

                                <!-- single testimony  -->
                                <div class="swiper-slide  md:max-w-full group">
                                    <div class="et-4-testimony p-[40px] lg:p-[30px] md:p-[20px] border border-[#256E56]/10 bg-white rounded-[16px]">
                                        <div class="ml-auto w-max max-w-full">
                                            <svg width="46" height="32" viewBox="0 0 46 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.89997 20.8595C7.91 23.3494 6.35003 25.8094 4.26501 28.1795C3.60501 28.9295 3.51501 30.0094 4.055 30.8494C4.47504 31.5094 5.16498 31.8694 5.91498 31.8694C6.125 31.8694 6.33503 31.8545 6.54504 31.7794C10.955 30.4894 21.26 25.9145 21.545 11.2444C21.65 5.58947 17.51 0.72949 12.125 0.17449C9.14001 -0.125525 6.17004 0.849416 3.965 2.82943C1.76004 4.82446 0.5 7.67449 0.5 10.6445C0.5 15.5944 4.01004 19.9295 8.89997 20.8595Z" class="fill-etBlue" />
                                                <path d="M36.065 0.17449C33.095 -0.125525 30.125 0.849416 27.92 2.82943C25.715 4.82446 24.455 7.67449 24.455 10.6445C24.455 15.5944 27.965 19.9295 32.855 20.8595C31.865 23.3494 30.305 25.8094 28.22 28.1795C27.56 28.9295 27.47 30.0094 28.01 30.8494C28.43 31.5094 29.12 31.8694 29.87 31.8694C30.08 31.8694 30.29 31.8545 30.5 31.7794C34.91 30.4894 45.215 25.9144 45.5 11.2444V11.0345C45.5 5.46944 41.405 0.72949 36.065 0.17449Z" class="fill-etBlue" />
                                            </svg>
                                        </div>

                                        <!-- rating stars -->
                                        <div class="flex gap-[9px] text-[#FFC532] text-[18px] mb-[12px]">
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                        </div>

                                        <h6 class="text-[18px] mb-[16px]">Eventek Special Event on Business</h6>

                                        <p class="text-etBlack/70 font-normal text-[16px] mb-[40px]">"Choosing eventek was one of the best decisions for our marketing strategy. They not only promised results but delivered them consistently. Trustworthy, reliable, and results-oriented. We're grateful for their strategic insights and seamless execution.</p>

                                        <!-- single testimonay bottom -->
                                        <div class="flex items-center gap-x-[16px] xxs:flex-col xxs:items-start gap-y-[10px">
                                            <div class="img rounded-full overflow-hidden p-[7px] w-max max-w-full shrink-0">
                                                <img src="assets/img/reviewer-1.png" alt="reviewer image" class="w-[48px] h-[48px]">
                                            </div>

                                            <div class="txt">
                                                <h5 class="text-etBlack font-normal text-[18px] mb-[3px]">David Anderson</h5>
                                                <h6 class="text-etGray/70 font-normal text-[16px]">Marketing Director, Kingosto Tech</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- max-w-[clamp(290px,23.59vw,449px)] -->

                                <!-- single testimony  -->
                                <div class="swiper-slide  md:max-w-full group">
                                    <div class="et-4-testimony p-[40px] lg:p-[30px] md:p-[20px] border border-[#256E56]/10 bg-white rounded-[16px]">
                                        <div class="ml-auto w-max max-w-full">
                                            <svg width="46" height="32" viewBox="0 0 46 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.89997 20.8595C7.91 23.3494 6.35003 25.8094 4.26501 28.1795C3.60501 28.9295 3.51501 30.0094 4.055 30.8494C4.47504 31.5094 5.16498 31.8694 5.91498 31.8694C6.125 31.8694 6.33503 31.8545 6.54504 31.7794C10.955 30.4894 21.26 25.9145 21.545 11.2444C21.65 5.58947 17.51 0.72949 12.125 0.17449C9.14001 -0.125525 6.17004 0.849416 3.965 2.82943C1.76004 4.82446 0.5 7.67449 0.5 10.6445C0.5 15.5944 4.01004 19.9295 8.89997 20.8595Z" class="fill-etBlue" />
                                                <path d="M36.065 0.17449C33.095 -0.125525 30.125 0.849416 27.92 2.82943C25.715 4.82446 24.455 7.67449 24.455 10.6445C24.455 15.5944 27.965 19.9295 32.855 20.8595C31.865 23.3494 30.305 25.8094 28.22 28.1795C27.56 28.9295 27.47 30.0094 28.01 30.8494C28.43 31.5094 29.12 31.8694 29.87 31.8694C30.08 31.8694 30.29 31.8545 30.5 31.7794C34.91 30.4894 45.215 25.9144 45.5 11.2444V11.0345C45.5 5.46944 41.405 0.72949 36.065 0.17449Z" class="fill-etBlue" />
                                            </svg>
                                        </div>

                                        <!-- rating stars -->
                                        <div class="flex gap-[9px] text-[#FFC532] text-[18px] mb-[12px]">
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                        </div>

                                        <h6 class="text-[18px] mb-[16px]">Eventek Special Event on Business</h6>

                                        <p class="text-etBlack/70 font-normal text-[16px] mb-[40px]">"Choosing eventek was one of the best decisions for our marketing strategy. They not only promised results but delivered them consistently. Trustworthy, reliable, and results-oriented. We're grateful for their strategic insights and seamless execution.</p>

                                        <!-- single testimonay bottom -->
                                        <div class="flex items-center gap-x-[16px] xxs:flex-col xxs:items-start gap-y-[10px">
                                            <div class="img rounded-full overflow-hidden p-[7px] w-max max-w-full shrink-0">
                                                <img src="assets/img/reviewer-1.png" alt="reviewer image" class="w-[48px] h-[48px]">
                                            </div>

                                            <div class="txt">
                                                <h5 class="text-etBlack font-normal text-[18px] mb-[3px]">David Anderson</h5>
                                                <h6 class="text-etGray/70 font-normal text-[16px]">Marketing Director, Kingosto Tech</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- max-w-[clamp(290px,23.59vw,449px)] -->

                                <!-- single testimony  -->
                                <div class="swiper-slide  md:max-w-full group">
                                    <div class="et-4-testimony p-[40px] lg:p-[30px] md:p-[20px] border border-[#256E56]/10 bg-white rounded-[16px]">
                                        <div class="ml-auto w-max max-w-full">
                                            <svg width="46" height="32" viewBox="0 0 46 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.89997 20.8595C7.91 23.3494 6.35003 25.8094 4.26501 28.1795C3.60501 28.9295 3.51501 30.0094 4.055 30.8494C4.47504 31.5094 5.16498 31.8694 5.91498 31.8694C6.125 31.8694 6.33503 31.8545 6.54504 31.7794C10.955 30.4894 21.26 25.9145 21.545 11.2444C21.65 5.58947 17.51 0.72949 12.125 0.17449C9.14001 -0.125525 6.17004 0.849416 3.965 2.82943C1.76004 4.82446 0.5 7.67449 0.5 10.6445C0.5 15.5944 4.01004 19.9295 8.89997 20.8595Z" class="fill-etBlue" />
                                                <path d="M36.065 0.17449C33.095 -0.125525 30.125 0.849416 27.92 2.82943C25.715 4.82446 24.455 7.67449 24.455 10.6445C24.455 15.5944 27.965 19.9295 32.855 20.8595C31.865 23.3494 30.305 25.8094 28.22 28.1795C27.56 28.9295 27.47 30.0094 28.01 30.8494C28.43 31.5094 29.12 31.8694 29.87 31.8694C30.08 31.8694 30.29 31.8545 30.5 31.7794C34.91 30.4894 45.215 25.9144 45.5 11.2444V11.0345C45.5 5.46944 41.405 0.72949 36.065 0.17449Z" class="fill-etBlue" />
                                            </svg>
                                        </div>

                                        <!-- rating stars -->
                                        <div class="flex gap-[9px] text-[#FFC532] text-[18px] mb-[12px]">
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                        </div>

                                        <h6 class="text-[18px] mb-[16px]">Eventek Special Event on Business</h6>

                                        <p class="text-etBlack/70 font-normal text-[16px] mb-[40px]">"Choosing eventek was one of the best decisions for our marketing strategy. They not only promised results but delivered them consistently. Trustworthy, reliable, and results-oriented. We're grateful for their strategic insights and seamless execution.</p>

                                        <!-- single testimonay bottom -->
                                        <div class="flex items-center gap-x-[16px] xxs:flex-col xxs:items-start gap-y-[10px">
                                            <div class="img rounded-full overflow-hidden p-[7px] w-max max-w-full shrink-0">
                                                <img src="assets/img/reviewer-1.png" alt="reviewer image" class="w-[48px] h-[48px]">
                                            </div>

                                            <div class="txt">
                                                <h5 class="text-etBlack font-normal text-[18px] mb-[3px]">David Anderson</h5>
                                                <h6 class="text-etGray/70 font-normal text-[16px]">Marketing Director, Kingosto Tech</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- max-w-[clamp(290px,23.59vw,449px)] -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- TESTIMONIAL SECTION END -->


        <!-- BLOG/NEWS SECTION START -->
        <section class="et-blogs overflow-hidden py-[130px] xl:py-[80px] md:py-[60px]">
            <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
                <!-- heading -->
                <div class="et-blogs-heading flex xs:flex-col justify-center items-center text-center mb-[52px] xl:mb-[32px] lg:mb-[22px] gap-[15px]">
                    <div class="left xs:text-center">
                        <h6 class="et-section-sub-title anim-text">Latest News</h6>
                        <h2 class="et-section-title anim-text">Our Latest News</h2>
                    </div>
                </div>

                <!-- news cards -->
                <div class="grid grid-cols-3 lg:grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] xxl:gap-[20px] rev-slide-up">
                    <!-- single news -->
                    <div class="et-blog relative">
                        <div class="et-blog__img relative overflow-hidden z-[1]">
                            <img src="assets/img/et-3-news-1.jpg" alt="category-icon" class="w-full aspect-[338/240] object-cover transition duration-[400ms] group-hover:scale-105">
                        </div>

                        <div class="et-blog__txt bottom-0 z-[3] p-[clamp(15px,1.58vw,30px)] shadow-[0px_4px_25px_rgba(0,0,0,0.06)]">
                            <div class="et-blog__infos flex gap-x-[clamp(20px,1.58vw,30px)] mb-[16px]">
                                <div class="bg-etBlue bottom-[20px] right-[20px] text-white px-[20px] py-[13px]">
                                    <span class="block text-[24px] font-medium leading-[0.7] mb-[6px]">15</span>
                                    <span class="block text-[12px] font-medium leading-[0.7]">Dec</span>
                                </div>

                                <!-- single info -->
                                <div class="et-blog-info flex items-center gap-x-[10px]">
                                    <span class="icon"><img src="assets/img/user-blue.svg" alt="icon"></span>
                                    <span class="text font-normal text-[14px] text-etGray">By Admin</span>
                                </div>

                                <!-- single info -->
                                <div class="et-blog-info flex items-center gap-x-[10px]">
                                    <span class="icon"><img src="assets/img/tag.svg" alt="icon"></span>
                                    <span class="text font-normal text-[14px] text-etGray">Music</span>
                                </div>
                            </div>

                            <h4 class="text-[22px] xl:text-[20px] sm:text-[18px] font-semibold leading-[1.4] mb-[14px]"><a href="news-details.html" class="hover:text-etBlue">Many of those Products Offer the Potential</a></h4>

                            <a href="news-details.html" class="text-[16px] text-etGray inline-flex items-center gap-[10px] hover:text-etBlue">Read More <span><i class="fa-solid fa-arrow-right-long"></i></span></a>
                        </div>
                    </div>

                    <!-- single news -->
                    <div class="et-blog relative">
                        <div class="et-blog__img relative overflow-hidden z-[1]">
                            <img src="assets/img/et-3-news-2.jpg" alt="category-icon" class="w-full aspect-[338/240] object-cover transition duration-[400ms] group-hover:scale-105">
                        </div>

                        <div class="et-blog__txt bottom-0 z-[3] p-[clamp(15px,1.58vw,30px)] shadow-[0px_4px_25px_rgba(0,0,0,0.06)]">
                            <div class="et-blog__infos flex gap-x-[clamp(20px,1.58vw,30px)] mb-[16px]">
                                <div class="bg-etBlue bottom-[20px] right-[20px] text-white px-[20px] py-[13px]">
                                    <span class="block text-[24px] font-medium leading-[0.7] mb-[6px]">15</span>
                                    <span class="block text-[12px] font-medium leading-[0.7]">Dec</span>
                                </div>

                                <!-- single info -->
                                <div class="et-blog-info flex items-center gap-x-[10px]">
                                    <span class="icon"><img src="assets/img/user-blue.svg" alt="icon"></span>
                                    <span class="text font-normal text-[14px] text-etGray">By Admin</span>
                                </div>

                                <!-- single info -->
                                <div class="et-blog-info flex items-center gap-x-[10px]">
                                    <span class="icon"><img src="assets/img/tag.svg" alt="icon"></span>
                                    <span class="text font-normal text-[14px] text-etGray">Music</span>
                                </div>
                            </div>

                            <h4 class="text-[22px] xl:text-[20px] sm:text-[18px] font-semibold leading-[1.4] mb-[14px]"><a href="news-details.html" class="hover:text-etBlue">Harmony in Every Note: The Journey of Aria Melody"</a></h4>

                            <a href="news-details.html" class="text-[16px] text-etGray inline-flex items-center gap-[10px] hover:text-etBlue">Read More <span><i class="fa-solid fa-arrow-right-long"></i></span></a>
                        </div>
                    </div>

                    <!-- single news -->
                    <div class="et-blog relative">
                        <div class="et-blog__img relative overflow-hidden z-[1]">
                            <img src="assets/img/et-3-news-3.jpg" alt="category-icon" class="w-full aspect-[338/240] object-cover transition duration-[400ms] group-hover:scale-105">
                        </div>

                        <div class="et-blog__txt bottom-0 z-[3] p-[clamp(15px,1.58vw,30px)] shadow-[0px_4px_25px_rgba(0,0,0,0.06)]">
                            <div class="et-blog__infos flex gap-x-[clamp(20px,1.58vw,30px)] mb-[16px]">
                                <div class="bg-etBlue bottom-[20px] right-[20px] text-white px-[20px] py-[13px]">
                                    <span class="block text-[24px] font-medium leading-[0.7] mb-[6px]">15</span>
                                    <span class="block text-[12px] font-medium leading-[0.7]">Dec</span>
                                </div>

                                <!-- single info -->
                                <div class="et-blog-info flex items-center gap-x-[10px]">
                                    <span class="icon"><img src="assets/img/user-blue.svg" alt="icon"></span>
                                    <span class="text font-normal text-[14px] text-etGray">By Admin</span>
                                </div>

                                <!-- single info -->
                                <div class="et-blog-info flex items-center gap-x-[10px]">
                                    <span class="icon"><img src="assets/img/tag.svg" alt="icon"></span>
                                    <span class="text font-normal text-[14px] text-etGray">Music</span>
                                </div>
                            </div>

                            <h4 class="text-[22px] xl:text-[20px] sm:text-[18px] font-semibold leading-[1.4] mb-[14px]"><a href="news-details.html" class="hover:text-etBlue">Many of those Products Offer the Potential</a></h4>

                            <a href="news-details.html" class="text-[16px] text-etGray inline-flex items-center gap-[10px] hover:text-etBlue">Read More <span><i class="fa-solid fa-arrow-right-long"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- BLOG/NEWS SECTION END -->
    </main>