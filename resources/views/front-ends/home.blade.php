@extends('front-ends.layouts.master')

@section('content')

<!-- Banner
================================================== -->
@include('front-ends.components.banner-slide')


<!-- Content
================================================== -->
{{-- <div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-top-75">
				Popular Categories
				<span>Browse <i>the most desirable</i> categories</span>
			</h3>
		</div>

	</div>
</div> --}}

<!-- Categories Carousel -->
{{-- <div class="fullwidth-carousel-container margin-top-25">
    @include('front-ends.components.category-box-slide', ['datas' => $categories])
</div> --}}

<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline margin-bottom-45">
                    TRUYỆN HOT
                    {{-- <span>Discover top-rated local businesses</span> --}}
                </h3>
            </div>
        </div>
        <div class="row">
            @if (isset($stories))
                @foreach ($stories as $story)
                    <!-- Listing Item -->
                    {{-- col-lg-4 col-md-6 --}}
                    <div class="col-lg-3 col-md-3 col-sm-4">
                        @include('front-ends.components.listing-item-grid', ['data' => $story])
                    </div>
                    <!-- Listing Item / End -->
                @endforeach
            @endif
        </div>
    </div>
</section>

<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">
    <div class="container">
        <div class="row">
            
            @include('front-ends.components.slide-item', ['title' => 'Truyện Mới Cập Nhật', 'datas' => $stories])
            
            @include('front-ends.components.slide-item', ['title' => 'Truyện Đang đọc', 'datas' => $stories])

        </div>
    </div>
</section>

{{-- @include('front-ends.components.group-item') --}}


{{-- @include('front-ends.components.flip-banner') --}}

@endsection

@section('script')
        
    <!-- REVOLUTION SLIDER SCRIPT -->
    <script type="text/javascript" src="{{ asset('fronts/scripts/themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/themepunch.revolution.min.js') }}"></script>

    <script type="text/javascript">
        var tpj=jQuery;			
        var revapi4;
        tpj(document).ready(function() {
            if(tpj("#rev_slider_4_1").revolution == undefined){
                revslider_showDoubleJqueryError("#rev_slider_4_1");
            }else{
                revapi4 = tpj("#rev_slider_4_1").show().revolution({
                    sliderType:"standard",
                    jsFileLocation:"scripts/",
                    sliderLayout:"auto",
                    dottedOverlay:"none",
                    delay:9000,
                    navigation: {
                        keyboardNavigation:"off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation:"off",
                        onHoverStop:"on",
                        touch:{
                            touchenabled:"on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        }
                        ,
                        arrows: {
                            style:"zeus",
                            enable:true,
                            hide_onmobile:true,
                            hide_under:600,
                            hide_onleave:true,
                            hide_delay:200,
                            hide_delay_mobile:1200,
                            tmp:'<div class="tp-title-wrap"></div>',
                            left: {
                                h_align:"left",
                                v_align:"center",
                                h_offset:40,
                                v_offset:0
                            },
                            right: {
                                h_align:"right",
                                v_align:"center",
                                h_offset:40,
                                v_offset:0
                            }
                        }
                        ,
                        bullets: {
                    enable:false,
                    hide_onmobile:true,
                    hide_under:600,
                    style:"hermes",
                    hide_onleave:true,
                    hide_delay:200,
                    hide_delay_mobile:1200,
                    direction:"horizontal",
                    h_align:"center",
                    v_align:"bottom",
                    h_offset:0,
                    v_offset:32,
                    space:5,
                    tmp:''
                        }
                    },
                    viewPort: {
                        enable:true,
                        outof:"pause",
                        visible_area:"80%"
                },
                responsiveLevels:[1200,992,768,480],
                visibilityLevels:[1200,992,768,480],
                gridwidth:[1180,1024,778,480],
                gridheight:[640,500,400,300],
                lazyType:"none",
                parallax: {
                    type:"mouse",
                    origo:"slidercenter",
                    speed:2000,
                    levels:[2,3,4,5,6,7,12,16,10,25,47,48,49,50,51,55],
                    type:"mouse",
                },
                shadow:0,
                spinner:"off",
                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,
                shuffle:"off",
                autoHeight:"off",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            });
            }
        });	/*ready*/
    </script>	


    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
        (Load Extensions only on Local File Systems ! 
        The following part can be removed on Server for On Demand Loading) -->	
    <script type="text/javascript" src="{{ asset('fronts/scripts/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/extensions/revolution.extension.video.min.js') }}"></script>

@endsection