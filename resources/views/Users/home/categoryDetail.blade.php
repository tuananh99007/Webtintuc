@extends('users.layout.index')
@section('main_contentHome')
    <section class="section_common tmp_section_list_item">
        <div class="container" id="category-infiniteScroll">
            <div class="row">
                @foreach($productsList as $index =>$product)
                    <div class="col-12 col-sm-6 col-md-4 infiniteScroll-item">
                        <div class="item-news"><a class="image-news"
                                                  href="{{route('users.home.detail',['id'=>$product->id])}}">
                                <img
                                    src="{{ asset($product->image) }}"
                                    alt="ĐBQH chất vấn Bộ trưởng Xây dựng về tình trạng “cứ mưa là lụt”"> </a>
                            <div class="box-navi-news mt-2">
                                <div class="tag-news"><a href="/c/tieu-diem">Tiêu điểm</a></div>
                                <span>Thứ 5, 03/11/2022 | 16:42</span></div>
                            <div class="box-content-item mt-3"><h3 class="tmp-title-large"><a
                                        href="/dbqh-chat-van-bo-truong-xay-dung-ve-tinh-trang-cu-mua-la-lut-a578447.html">{{$product->title}}</a>
                                </h3>
                                <div class="tmp-txt-desc mt-3"> {{$product->content}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="load-more-paging text-center mt-5"><span class="load-more" style="display: none"
                                                             data-nextpage-url="/articles-in-cat-ajax/207/layout/desktop/ignoreIds/578438,578448,578446,578447,578430,578421,578406,578398,578387,578358,578331,578348,578342,578289,578307,578231,578242,578240"></span>
            <span class="load-more-manual"
                  data-nextpage-url="/articles-in-cat-ajax/207/layout/desktop/ignoreIds/578438,578448,578446,578447,578430,578421,578406,578398,578387,578358,578331,578348,578342,578289,578307,578231,578242,578240"
                  style="">Xem thêm...</span></div>
        <div class="page-load-status" style="display: none;">
            <div class="loader-ellips infinite-scroll-request" style="display: none;"><span
                    class="loader-ellips__dot"></span> <span class="loader-ellips__dot"></span> <span
                    class="loader-ellips__dot"></span> <span class="loader-ellips__dot"></span></div>
        </div>
    </section>
@endsection
