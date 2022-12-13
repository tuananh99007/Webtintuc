@extends('users.layout.index')
@section('main_contentHome')
    <section class="">
        <div class="container">
            <div class="row">
                <section class="main_box_two_col">
                    <section class="tmp_section_banner col-12">
                        <div class="row">
                            @foreach($productsHot_flag01 as $index =>$product)
                                <div class="col-12 mb-3 col-lg-8 col-xl-9">
                                    <div class="box-banner"><a
                                            href="{{route('users.home.detail',['id'=>$product->id])}}">
                                            <img loading="lazy"
                                                 src="{{ asset($product->image) }}"
                                                 alt="Bộ trưởng Xây dựng: Nhà ở xã hội mới đạt 36% so với nhu cầu"> </a>
                                    </div>
                                    <div class="box-title-sapo mt-3"><a
                                            href="/bo-truong-xay-dung-nha-o-xa-hoi-moi-dat-36-so-voi-nhu-cau-a578406.html">
                                            <h2 class="tmp-title-big font-weight-bold fontSize35">{{$product->title}}</h2>
                                        </a>
                                        <div class="txt-sapo mt-3 fontSize20"> {{$product->content}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-12 col-lg-4 col-xl-3 right-side-articles">
                                <div class="w-100">
                                    @foreach($productsHot_flag02 as $index => $products)
                                        <div class="mb-3">
                                            <div class="image-news mb-3"><a
                                                    href="{{route('users.home.detail',['id'=>$products->id])}}"
                                                    class="mb-3 d-block"> <img loading="lazy"
                                                                               src="{{ asset($products->image) }}"
                                                                               alt="">
                                                </a></div>
                                            <a href="">
                                                <h2 class="tmp-title-large font-weight-bold">{{$products->title}}</h2>
                                            </a>
                                            <div class="txt-sapo mt-3"> {{$products->content}}
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row">
                <section class="section_common tmp_section_cate_business horizontal_listing_box ">
                    <div class="container">
                        <h2 class="tmp-title-cate bg-garden-gray text-uppercase pl-3 py-2 heading-with-sub-categories">
                            <a href="/c/the-thao"> Dòng Sự Kiện </a>
                            <ul class="sub-categories">
                                <li><a href="/c/bong-da-viet-nam">Bóng đá Việt Nam</a></li>
                                <li><a href="/c/bong-da-anh">Bóng đá Anh</a></li>
                            </ul>
                        </h2>
                        <div class="row">
                            @foreach($productsList as $index =>$product)
                                <div class="col-12 col-md-4">
                                    <div class="item-news mt20"><a class="image-news"
                                                                   href="{{route('users.home.detail',['id'=>$product->id])}}">
                                            <img loading="lazy" src="{{ asset($product->image) }}"
                                                 alt="Đội hình tối ưu của ĐT Hà Lan tại World Cup 2022: Quá ít ngôi sao">
                                        </a>
                                        <div class="box-navi-news mt-3">
                                            <div class="tag-news"><a href="{{ asset($product->image) }}">Thể thao</a>
                                            </div>
                                            <span>Thứ 4, 02/11/2022 | 11:07</span>
                                        </div>
                                        <div class="box-content-item mt-3">
                                            <h3 class="tmp-title-large"><a
                                                    href="/doi-hinh-toi-uu-cua-dt-ha-lan-tai-world-cup-2022-qua-it-ngoi-sao-a578157.html">{{$product->title}} </a>
                                            </h3>
                                            <div class="tmp-txt-desc mt-3">{{$product->content}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div>{{ $productsList->links('Admin.components.pagination') }}</div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container">
            <div class="row">
                <div class="section_common tmp_section_cate_doisong left_two_one_two_right_box col-12">
                    <div class="in-cultural">
                        <h2 class="tmp-title-cate text-uppercase pd20"><a href="/c/van-hoa"> Giải trí </a></h2>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="item-cate">
                                    <div class="item-cate-news"><a class="image-news"
                                                                   href="/ngoi-sao-ly-a-bang-van-song-sung-tuc-du-no-nan-chong-chat-a578211.html">
                                            <img loading="lazy"
                                                 src="https://media1.nguoiduatin.vn/thumb_x640x384/media/nguyen-ngoc-hoai-thanh/2022/11/02/ngoi-sao-ly-a-bang-van-song-sung-tuc-du-no-nan-chong-chat.jpg"
                                                 alt="Ngôi sao Lý Á Bằng vẫn sống sung túc dù nợ nần chồng chất"> </a>
                                        <div class="box-content-item mt-2">
                                            <div class="box-navi-news not-before mb-2">
                                                <span>Thứ 5, 03/11/2022 | 07:00</span></div>
                                            <h3 class="tmp-title-large"><a
                                                    href="/ngoi-sao-ly-a-bang-van-song-sung-tuc-du-no-nan-chong-chat-a578211.html">
                                                    Ngôi sao Lý Á Bằng vẫn sống sung túc dù nợ nần chồng chất </a></h3>
                                            <div class="tmp-txt-desc mt-3"> Mặc dù kinh doanh thất bại và nợ nần nhiều
                                                nhưng nam diễn viên Lý Á Bằng vẫn duy trì mức sống cao như thời còn ở
                                                đỉnh cao sự nghiệp.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="item-cate-news"><a class="image-news"
                                                               href="/sau-ket-hon-hoa-hau-do-my-linh-duoc-gia-dinh-chong-doi-dai-ra-sao-a578218.html">
                                        <img loading="lazy"
                                             src="https://media1.nguoiduatin.vn/thumb_x480x288/media/ngac-kim-giang/2022/11/02/sau-ket-hon-do-my-linh-duoc-gia-dinh-chong-doi-dai-nhu-the-nao.jpg"
                                             alt="Sau kết hôn, Hoa hậu Đỗ Mỹ Linh được gia đình chồng đối đãi ra sao?">
                                    </a>
                                    <div class="box-content-item mt-2">
                                        <div class="box-navi-news not-before mt-2">
                                            <span>Thứ 4, 02/11/2022 | 19:00</span></div>
                                        <div class="box-content-item mt-2">
                                            <h3 class="tmp-title-medium"><a
                                                    href="/sau-ket-hon-hoa-hau-do-my-linh-duoc-gia-dinh-chong-doi-dai-ra-sao-a578218.html">
                                                    Sau kết hôn, Hoa hậu Đỗ Mỹ Linh được gia đình chồng đối đãi ra
                                                    sao? </a></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-cate-news"><a class="image-news"
                                                               href="/can-canh-can-biet-thu-khung-cua-ngoc-nu-man-anh-ninh-duong-lan-ngoc-a578151.html">
                                        <img loading="lazy"
                                             src="https://media1.nguoiduatin.vn/thumb_x480x288/media/le-thi-anh-tuyet/2022/11/02/can-canh-can-biet-thu-khung-cua-ngoc-nu-man-anh-ninh-duong-lan-ngoc-156.png"
                                             alt="Cận cảnh căn biệt thự khủng của " ngọc="" nữ="" màn="" ảnh"="" ninh=""
                                        dương="" lan="" ngọc"=""> </a>
                                    <div class="box-content-item mt-2">
                                        <div class="box-navi-news not-before mt-2">
                                            <span>Thứ 4, 02/11/2022 | 14:00</span></div>
                                        <div class="box-content-item mt-2">
                                            <h3 class="tmp-title-medium"><a
                                                    href="/can-canh-can-biet-thu-khung-cua-ngoc-nu-man-anh-ninh-duong-lan-ngoc-a578151.html">
                                                    Cận cảnh căn biệt thự khủng của "ngọc nữ màn ảnh" Ninh Dương Lan
                                                    Ngọc </a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="item-cate-news"><a class="image-news"
                                                               href="/vo-tran-thanh-dang-trang-thai-xuong-tinh-than-khien-fan-lo-lang-a577997.html">
                                        <img loading="lazy"
                                             src="https://media1.nguoiduatin.vn/thumb_x480x288/media/nguyen-ngoc-hoai-thanh/2022/11/01/vo-tran-thanh-dang-trang-thai-xuong-tinh-than-khien-fan-lo-lang.png"
                                             alt="Hari Won đăng trạng thái " xuống="" tinh="" thần",="" phản="" ứng=""
                                        của="" trấn="" thành="" mới="" gây="" chú="" ý"=""> </a>
                                    <div class="box-content-item mt-2">
                                        <div class="box-navi-news not-before mt-2">
                                            <span>Thứ 4, 02/11/2022 | 06:00</span></div>
                                        <div class="box-content-item mt-2">
                                            <h3 class="tmp-title-medium"><a
                                                    href="/vo-tran-thanh-dang-trang-thai-xuong-tinh-than-khien-fan-lo-lang-a577997.html">
                                                    Hari Won đăng trạng thái "xuống tinh thần", phản ứng của Trấn Thành
                                                    mới gây chú ý </a></h3>
                                        </div>
                                    </div>
                                    <div class="item-cate-news"><a class="image-news"
                                                                   href="/dat-anh-tho-au-truong-giang-ben-con-gai-dan-mang-tim-ra-dieu-bat-ngo-a577959.html">
                                            <img loading="lazy"
                                                 src="https://media1.nguoiduatin.vn/thumb_x480x288/media/ngac-kim-giang/2022/11/01/truong-giang-nha-phuong.jpg"
                                                 alt="Đặt ảnh thơ ấu của Trường Giang bên con gái, dân mạng tìm ra điều bất ngờ">
                                        </a>
                                        <div class="box-content-item mt-2">
                                            <div class="box-navi-news not-before mt-2">
                                                <span>Thứ 3, 01/11/2022 | 15:00</span></div>
                                            <div class="box-content-item mt-2">
                                                <h3 class="tmp-title-medium"><a
                                                        href="/dat-anh-tho-au-truong-giang-ben-con-gai-dan-mang-tim-ra-dieu-bat-ngo-a577959.html">
                                                        Đặt ảnh thơ ấu của Trường Giang bên con gái, dân mạng tìm ra
                                                        điều bất ngờ </a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
