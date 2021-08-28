<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('setting/updateCompany')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">公司名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="company_name" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{$company['company_name']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">公司缩写</label>
                        <div class="layui-input-inline">
                            <input type="text" name="company_abb_name" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{$company['company_abb_name']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">二维码</label>
                        {!! $company['wechat_qr_code']->files('value')->field('wechat_qr_code')
                        ->url($company['wechat_qr_code']->getUploadUrl('value'))
                        ->uploader()!!}
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">地址</label>
                        <div class="layui-input-inline">
                            <input type="text" name="address" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{$company['address']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">电话</label>
                        <div class="layui-input-inline">
                            <input type="text" name="tel" lay-verify="tel" autocomplete="off" placeholder="" class="layui-input" value="{{$company['tel']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">邮箱</label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" lay-verify="email" autocomplete="off" placeholder="" class="layui-input" value="{{$company['email']}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">邮政编码</label>
                        <div class="layui-input-inline">
                            <input type="text" name="zip_code" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{$company['zip_code']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">传真</label>
                        <div class="layui-input-inline">
                            <input type="text" name="fax" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{$company['fax']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">证券部联系方式</label>
                        <div class="layui-input-inline">
                            <input type="text" name="bond_tel" lay-verify="tel" autocomplete="off" placeholder="" class="layui-input" value="{{$company['bond_tel']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">证券部邮箱</label>
                        <div class="layui-input-inline">
                            <input type="text" name="bond_email" lay-verify="email" autocomplete="off" placeholder="" class="layui-input" value="{{$company['bond_email']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">人力资源部联系方式</label>
                        <div class="layui-input-inline">
                            <input type="text" name="hr_tel" lay-verify="tel" autocomplete="off" placeholder="" class="layui-input" value="{{$company['hr_tel']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">人力资源部邮箱</label>
                        <div class="layui-input-inline">
                            <input type="text" name="hr_email" lay-verify="email" autocomplete="off" placeholder="" class="layui-input" value="{{$company['hr_email']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">营销服务中心传真</label>
                        <div class="layui-input-inline">
                            <input type="text" name="marketing_center_fax" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{$company['marketing_center_fax']}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">宣传视频封面</label>
                        {!! $company['video_poster']->files('value')->field('video_poster')
                        ->url($company['video_poster']->getUploadUrl('value'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">宣传视频VID</label>
                        <div class="layui-input-inline">
                            <input type="text" name="video_vid" autocomplete="off" placeholder="请输入宣传视频链接" class="layui-input" value="{{$company['video_vid']}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">经纬度</label>
                        <div class="layui-input-inline">
                            <input type="text" name="longitude" lay-verify="required" autocomplete="off" placeholder="请输入经度" class="layui-input" value="{{$company['longitude']}}">
                        </div>
                        <div class="layui-input-inline">
                            <input type="text" name="latitude" lay-verify="required" autocomplete="off" placeholder="请输入纬度" class="layui-input" value="{{$company['latitude']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">获取点位</label>
                        <div class="layui-input-inline">
                            <input id="keyword" type="textbox"  class="layui-input"  value="">
                            <input type="button" value="{{ trans('app.search') }}" class="layui-button-mapsearch"  onclick="searchKeyword()">
                            <div class="layui-form-mid layui-word-aux">点击地图快速获取经纬度</div>
                        </div>

                        <div id="map"></div>
                    </div>
                    {!!Form::token()!!}
                    <div class="layui-form-item button-group"><div class="layui-input-block"><button class="layui-btn layui-btn-normal layui-btn-lg" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button></div></div>
                </form>
            </div>

        </div>
    </div>
</div>
<script charset="utf-8" src="https://map.qq.com/api/js?v=2.exp&key={{ config('common.qq_map_key') }}"></script>
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var ue = getUe();
    window.onload = function(){
        init();
    }
    layui.use('laydate', function() {
        var laydate = layui.laydate;
        laydate.render({
            elem: '#business_time'
            ,type:'time'
            ,format:'HH:mm'
            , range: true
        });
    });
</script>
<script>
    var geocoder,map,markers = [];
    var init = function() {
        var center = new qq.maps.LatLng(23.15641,113.3318);
        map = new qq.maps.Map(document.getElementById('map'),{
            center: center,
            zoom: 15
        });

        //调用Poi检索类
        geocoder = new qq.maps.Geocoder({

            complete : function(result){
                console.log(result)
                map.setCenter(result.detail.location);
                var marker = new qq.maps.Marker({
                    map:map,
                    position: result.detail.location
                });
                markers.push(marker)
                document.getElementsByName('longitude')[0].value = result.detail.location.lng;
                document.getElementsByName('latitude')[0].value = result.detail.location.lat;

                qq.maps.event.addListener(marker,'click',function(event) {
                    document.getElementsByName('longitude')[0].value = event.latLng.getLng();
                    document.getElementsByName('latitude')[0].value = event.latLng.getLat();
                })


            },
            //若服务请求失败，则运行以下函数
            error: function() {
                alert("无法获取地址，请检查地址是否正确");
            }
        });
        qq.maps.event.addListener(map,'click',function(event) {
            document.getElementsByName('longitude')[0].value = event.latLng.getLng();
            document.getElementsByName('latitude')[0].value = event.latLng.getLat();
        })
    }
    //清除地图上的marker
    function clearOverlays(overlays) {
        var overlay;
        while (overlay = overlays.pop()) {
            overlay.setMap(null);
        }
    }
    //调用poi类信接口
    function searchKeyword() {
        var keyword = document.getElementById("keyword").value;
        //region = new qq.maps.LatLng(39.936273,116.44004334);
        clearOverlays(markers);

        // searchService.setPageCapacity(5);
        geocoder.getLocation(keyword);//根据中心点坐标、半径和关键字进行周边检索。

    }
</script>