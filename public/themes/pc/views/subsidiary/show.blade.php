
<!-- 内容 -->
<div class="main subsidiary">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTabShow')->render() !!}
        <div class="article-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="news-detail-tab pull-left ">
                <ul>
                    @foreach($top_subsidiaries as $key =>$top_subsidiary)
                        <li class="@if($subsidiary->id == $top_subsidiary->id) active @endif transition500"><a href="{{ route('pc.subsidiary.show',$top_subsidiary->id)  }}">{{ $top_subsidiary->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="news-detail-content pull-right nopadding">
                <div class="news-detail-article subsidiary-detail">
                    <div class="subsidiary-title">{!! $subsidiary->name !!}</div>
                    {!! $subsidiary->content !!}
                </div>
               @if(count($children_subsidiaries))
				<div class="branch">
					<div class=" ">
						<div class="con-title tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
							<span  class="transition500">SUBSIDIARY</span>
							<h1>子公司</h1>
						</div>
						<div class="branch-con">
							 @foreach($children_subsidiaries as $key =>$children_subsidiary)
							<div class="branch-item col-lg-4 col-md-4 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".4s">
								<a  href="{{ route('pc.subsidiary.show',$children_subsidiary->id)  }}">
									<div class="img"><img class="transition500" src="{{ url('image/original'.$children_subsidiary->image) }}" alt="{{ $children_subsidiary->name }}"></div>
									<p class="transition500">{{ $children_subsidiary->name }}</p>
								</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				@endif
            </div>

        </div>

    </div>
</div>