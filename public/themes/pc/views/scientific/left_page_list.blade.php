<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab',['nav_id' => $nav_tab_id])->render() !!}
        <div class="article-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="news-detail-tab pull-left ">
                <ul>
                    @foreach(app('nav_repository')->children($nav->parent_id) as $key => $nav_item)
                        <li class="@if(Route::currentRouteName() == $nav_item->slug) active @endif transition500" ><a href="{{ $nav_item->url }}">{{ $nav_item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="news-detail-content pull-right nopadding">
                <div class="news-detail-article">
                    <div class="content_2">
                        @foreach($pages as $key=> $page)
                        <table style="line-height:30px;font-size:14px;padding-left:20px" class="ke-zeroborder" width="780" border="0" cellpadding="0" cellspacing="0">
                            <tbody><tr>
                                <td valign="top" width="180" align="left"><img src="{{ '/image/original/'.$page->image }}" alt="" style="display:block;" border="0"></td>
                                <td style="line-height:30px;font-size:14px;padding-left:20px" valign="top" align="left">
                                    <span style="color:#008d43;">{{ $page->title }}</span>
                                    @if($page->description)
                                    <br>{{ $page->description }}
                                    @endif
                               </td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="padding:10px 0;"><hr style="padding:0;margin:0;height:0;line-height:0;overflow:hidden;width:100%;border:none;border-bottom:solid 1px #ccc;">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>