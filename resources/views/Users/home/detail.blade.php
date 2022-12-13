@extends('users.layout.index')
@section('main_contentHome')
    <section class="section_common tmp_section_detail_content mt-3 mt-xl-4 article-section">
        <div class="container">
            <div class="row tmp-row-custom d-flex">
                <div class="col-12 col-md-auto tmp-group-left tmp-w-big">
                    <div class="box-img-cover text-center"><img class="w-100" src="{{ asset($productDetail->image) }}"
                                                                alt="{{ $productDetail->title }}"></div>
                    <div class="tmp-entry-header px-10">
                        <h1 class="tmp-title-big text-center font-weight-bold mt-3"> {{ $productDetail->title }} </h1>
                        <div class="box-author py-3 border-bottom mb-3">
                            <div class="author-infos pl-3 pr-1">
                                <div class="txt-name">{{ $productDetail->author }}</div>
                                <div class="txt-datetime">{{ $productDetail->post_time }}</div>
                                <div class="row justify-content-between mt-2 mt-md-3 overflow-hidden">
                                    <div class="col-6">
                                        <div class="fb-like fb_iframe_widget"
                                             data-href="https://www.nguoiduatin.vn/hsbc-viet-nam-dan-dau-trong-khu-vuc-asean-ve-dau-tu-cong-a575477.html"
                                             data-layout="button_count" data-action="like" data-size="small"
                                             data-share="true" fb-xfbml-state="rendered"
                                             fb-iframe-plugin-query="action=like&amp;app_id=3015887275317802&amp;container_width=217&amp;href=https%3A%2F%2Fwww.nguoiduatin.vn%2Fhsbc-viet-nam-dan-dau-trong-khu-vuc-asean-ve-dau-tu-cong-a575477.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;size=small">
                                            <span style="vertical-align: bottom; width: 150px; height: 28px;"><iframe
                                                    name="f370c3a2ef664b4" width="1000px" height="1000px"
                                                    data-testid="fb:like Facebook Social Plugin"
                                                    title="fb:like Facebook Social Plugin" frameborder="0"
                                                    allowtransparency="true" allowfullscreen="true" scrolling="no"
                                                    allow="encrypted-media" src="./chitiet_files/like.html"
                                                    style="border: none; visibility: visible; width: 150px; height: 28px;"
                                                    class=""></iframe></span>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <ul class="connect-zalo d-flex">
                                            <li class="d-flex align-items-start">
                                                <div class="zalo-share-button pull-right"
                                                     style="margin-right: 5px; overflow: hidden; display: inline-block; width: 70px; height: 20px; position: relative;"
                                                     data-href="https://www.nguoiduatin.vn/hsbc-viet-nam-dan-dau-trong-khu-vuc-asean-ve-dau-tu-cong-a575477.html"
                                                     data-oaid="2754308560683001796" data-layout="1" data-color="blue"
                                                     data-customize="false">
                                                    <iframe frameborder="0" allowfullscreen="" scrolling="no"
                                                            width="70px"
                                                            height="20px" src="./chitiet_files/share.html"></iframe>
                                                    <iframe
                                                        id="67ffc531-72e8-4344-8882-5c515c122769"
                                                        name="67ffc531-72e8-4344-8882-5c515c122769" frameborder="0"
                                                        allowfullscreen="" scrolling="no" width="70px" height="20px"
                                                        src="https://button-share.zalo.me/share_inline?id=67ffc531-72e8-4344-8882-5c515c122769&amp;layout=1&amp;color=blue&amp;customize=false&amp;width=70&amp;height=20&amp;isDesktop=true&amp;url=https%3A%2F%2Fwww.nguoiduatin.vn%2Fhsbc-viet-nam-dan-dau-trong-khu-vuc-asean-ve-dau-tu-cong-a575477.html&amp;d=eyJ1cmwiOiJodHRwczovL3d3dy5uZ3VvaWR1YXRpbi52bi9oc2JjLXZpZXQtbmFtLWRhbi1kYXUtdHJvbmcta2h1LXZ1Yy1hc2Vhbi12ZS1kYXUtdHUtY29uZy1hNTc1NDc3Lmh0bWwifQ%253D%253D&amp;shareType=0"
                                                        style="position: absolute; z-index: 99; top: 0px; left: 0px;"></iframe>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-start">
                                                <div class="zalo-follow-only-button pull-right"
                                                     style="margin-right: -20px; height: 20px; overflow: hidden; display: inline-block;"
                                                     data-oaid="2754308560683001796">
                                                    <iframe frameborder="0"
                                                            allowfullscreen="" scrolling="no" width="102px"
                                                            height="35px"
                                                            src="https://button-follow.zalo.me?oaid=2754308560683001796&amp;style=blue&amp;customize=false&amp;callback=null&amp;cbfollowed=null&amp;domain=file%3A%2F%2F%2FC%3A%2FUsers%2FPC%2FDesktop%2Fchitiet.html&amp;id=07282056-cea3-45ff-9b7c-a45e7f4c39f6"></iframe>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="common-title-cover mb-0 px-10">
                        <div class="tmp-title-large my-4"> {{ $productDetail->title }} </div>
                    </div>
                    <section class="tmp-entry-content px-10">
                        <article class="article-content" itemprop="articleBody">
                            <p class="first-letter">{{ $productDetail->content }}</p>

                        </article>
                    </section>
                    <div class="module-tags d-flex flex-wrap align-items-center border-top-3 mt-4 pt-3"> <span
                            class="font-weight-bold pr-3">Tag:</span> <a class="btn btn-light f-rbs font-weight-normal"
                                                                         href="https://www.nguoiduatin.vn/tag/asean">ASEAN</a>
                        <a
                            class="btn btn-light f-rbs font-weight-normal"
                            href="https://www.nguoiduatin.vn/tag/hsbc">HSBC</a> <a
                            class="btn btn-light f-rbs font-weight-normal"
                            href="https://www.nguoiduatin.vn/tag/tai-khoa">tài khóa</a> <a
                            class="btn btn-light f-rbs font-weight-normal"
                            href="https://www.nguoiduatin.vn/tag/tham-hut-ngan-sach">thâm hụt ngân sách</a> <a
                            class="btn btn-light f-rbs font-weight-normal"
                            href="https://www.nguoiduatin.vn/tag/chinh-sach-1">chính
                            sách</a></div>
                    <section class="section_common tmp_section_group_module mt-5">

                        <div id="comment" data-id="575477" data-count="0">
                            <div class="comment-widget module_comment">
                                @if ($userLogin = Auth::guard('users')->user())
                                    <form method="POST"
                                          action="{{ route('users.home.postComment', ['product_id' => $productDetail->id]) }}">
                                        @csrf
                                        <div class="form-chat mt-3"
                                             style="background-color: rgb(247, 247, 247); max-height: 527px; overflow: hidden auto;">
                                            <div class="form-group">
                                                <textarea rows="3" type="text" name="content"
                                                          placeholder="Bạn nghĩ gì về tin này?"
                                                          style="width: 100%; padding: 5px;"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex w-100"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto mr-auto">
                                                    <button type="submit"
                                                            class="btn btn-red mb-2"
                                                            style="height: 35px; background-color: rgb(78, 105, 162); color: rgb(255, 255, 255);"><span>Gửi
                                                            bình luận</span></button>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button"
                                                            class="btn px-3 py-0 mr-3 mb-2"
                                                            style="background-color: rgb(78, 105, 162); color: rgb(255, 255, 255);"><span
                                                            class="fontSize12" style="line-height: 30px;">Đăng
                                                            nhập</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                                <div class="show-content-chat">
                                    <div class="mt-3 mt-md-4"><span style="font-size: 0px;"></span>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <p class="font-weight-bold mb-2">Bình luận tiêu biểu (0)</p>
                                            </div>
                                            <div class="col-12 col-md-6 fontSize12 text-md-right d-flex d-md-block">
                                                <span class="pr-3 cursor-pointer">Sắp xếp theo lượt thích</span><span
                                                    class="d-inline-block"> | </span><span class="pl-3 cursor-pointer">Sắp
                                                    xếp theo ngày</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-chat">
                                        @foreach ($commentsList as $index => $commentList)
                                            <div id="comment-{{$commentList->id}}" class="col-8">
                                                <ul>
                                                    <li>
                                                        <img src="{{ asset($commentList->users_avatar) }}" alt=""
                                                             style="height: 35px ">
                                                        {{ $commentList->users_name }}: "{{ $commentList->content }}"
                                                        @if (!empty($userLogin) == true)
                                                            @if ($userLogin->id == $commentList->user_id)
                                                                {{--                                                                <button type="submit" class="btn btn-red mb-2">--}}
                                                                {{--                                                                    <a--}}
                                                                {{--                                                                        href="{{ route('users.home.deleteComment', ['id' => $commentList->id]) }}">xóa--}}
                                                                {{--                                                                        cmt</a>--}}
                                                                {{--                                                                </button>--}}
                                                                <button class=" event-delete btn btn-red mb-2"
                                                                        data-id="{{ $commentList->id }}">delete cmt
                                                                </button>
                                                            @endif
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>

                    <div class="module_cungchuyenmuc mt-5">
                        <div class="tmp-title-cate bg-garden-gray text-uppercase pl-3 py-2">Cùng chuyên mục</div>
                        @foreach ($similarPosts as $index => $similarPost)
                            <div class="inner">
                                <div class="item-cate-news">
                                    <div class="row">
                                        <div class="col-3"><a class="image-news"
                                                              href="{{ route('users.home.detail', ['id' => $similarPost->id]) }}">
                                                <img src="{{ asset($similarPost->product_image) }}"
                                                     alt="{{ $similarPost->title }}"> </a>
                                        </div>
                                        <div class="col-9">
                                            <div class="box-content-item">
                                                <h3 class="tmp-title-large"><a
                                                        href="{{ route('users.home.detail', ['id' => $similarPost->id]) }}">
                                                        {{ $similarPost->title }}:</a></h3>
                                                <div class="box-navi-news not-before mt-1">
                                                    <span>{{ $similarPost->post_time }}</span>
                                                </div>
                                                <div class="tmp-txt-desc mt-3"> {{ $similarPost->content }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <section>
                        <ul id="others-in-cat" data-id="575477">
                            <div class="d-flex justify-content-center align-items-center load-more mt-3"><span
                                    class="btn">Xem
                                    thêm</span></div>
                        </ul>
                    </section>
                </div>

            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $(".event-delete").click(function () {
                swal({
                    title: "Are you sure?",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            var id = $(this).data('id');
                            $.ajax({
                                url: '/users/home/deleteComment?id=' + id,
                                type: 'GET',
                                success: function (html) {
                                    $("#comment-" + id).remove();
                                }
                            });
                            swal("Đã xóa thành công", {
                                icon: "success",
                            });
                        } else {
                            swal("ko xoa thi thoi");
                        }
                    });
            });
        });
    </script>
@endsection
