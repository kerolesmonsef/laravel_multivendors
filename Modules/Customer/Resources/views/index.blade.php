@extends('customer::layouts.master')

@section('content')
    <div id="main">

        <div id="displayTop" class="displaytopthree">
            <div class="container">
                <div class="row">
                    <div class="nov-row  col-lg-12 col-xs-12" ><div class="nov-row-wrap row">
                            <div class="nov-html col-xl-3 col-lg-3 col-md-3">
                                <div class="block">
                                    <div class="block_content">

                                    </div>
                                </div>
                            </div>

                            <div id="nov-slider" class="slider-wrapper theme-default col-xl-9 col-lg-9 col-md-9 col-md-12"
                                 data-effect="random"
                                 data-slices="15"
                                 data-animSpeed="500"
                                 data-pauseTime="10000"
                                 data-startSlide="0"
                                 data-directionnav="false"
                                 data-controlNav="true"
                                 data-controlNavThumbs="false"
                                 data-pauseOnHover="true"
                                 data-manualAdvance="false"
                                 data-randomStart="false">
                                <div class="nov_preload">
                                    <div class="process-loading active">
                                        <div class="loader">
                                            <div class="dot"></div>
                                            <div class="dot"></div>
                                            <div class="dot"></div>
                                            <div class="dot"></div>
                                            <div class="dot"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nivoSlider">
                                    <a href="#">
                                        <img src="http://demo.bestprestashoptheme.com/savemart/modules/novnivoslider/images/266cf50ba4d1d91fa5f5ded20bb66ea38de3b350_1.jpg" alt="" title="#htmlcaption_42" />
                                    </a>
                                    <a href="#">
                                        <img src="http://demo.bestprestashoptheme.com/savemart/modules/novnivoslider/images/62896aebffd6fdce749d957fc76bd83d734fa338_2.jpg" alt="" title="#htmlcaption_43" />
                                    </a>
                                    <a href="#">
                                        <img src="http://demo.bestprestashoptheme.com/savemart/modules/novnivoslider/images/195d62088850e3489886855b4239edcc4fb1868f_3.jpg" alt="" title="#htmlcaption_57" />
                                    </a>
                                </div>
                                <div id="htmlcaption_42" class="nivo-html-caption">
                                    <div class="nov-slider-ct">
                                        <div class="nov-center slider-none">
                                            <div class="nov-title effect-0" >
                                                Slide Home 3 01
                                            </div>
                                            <div class="nov-description effect-0" >
                                                <p>Slide Home 3 01</p>
                                            </div>
                                            <div class="nov-html effect-0">
                                                <p>Slide Home 3 01</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="htmlcaption_43" class="nivo-html-caption">
                                    <div class="nov-slider-ct">
                                        <div class="nov-center slider-none">
                                            <div class="nov-title effect-0" >
                                                Slide Home 3 02
                                            </div>
                                            <div class="nov-description effect-0" >
                                                <p>Slide Home 3 02</p>
                                            </div>
                                            <div class="nov-html effect-0">
                                                <p>Slide Home 3 02</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="htmlcaption_57" class="nivo-html-caption">
                                    <div class="nov-slider-ct">
                                        <div class="nov-center slider-none">
                                            <div class="nov-title effect-0" >
                                                Slider Home 3 03
                                            </div>
                                            <div class="nov-description effect-0" >
                                                <p>Slider Home 3 03</p>
                                            </div>
                                            <div class="nov-html effect-0">
                                                <p>Slider Home 3 03</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div></div>
                </div>
            </div>
        </div>

        <section id="content" class="page-home pagehome-three">
            <div class="container">
                <div class="row">

                    <div class="nov-row  col-lg-12 col-xs-12">
                        <div class="nov-row-wrap row">
                            <div class="nov-productlist nov-countdown-productlist col-xl-4 col-lg-4 col-md-4  col-xs-12 col-md-12">
                                <div class="block block-product clearfix">
                                    <h2 class="title_block">
                                        FLASH DEALS
                                    </h2>
                                    <div class="block_content">
                                        <div id="productlist706506225"
                                             class="product_list countdown-productlist countdown-column-1 owl-carousel owl-theme"
                                             data-autoplay="false" data-autoplayTimeout="6000" data-loop="false"
                                             data-margin="30" data-dots="false" data-nav="true" data-items="1"
                                             data-items_large="1" data-items_tablet="2" data-items_mobile="1">
                                            @for($i=0;$i<6;$i++)
                                                <?php
                                                /** @var  $second_random_6_product */
                                                /** @var  $i */
                                                $product_i = $second_random_6_product[$i];
                                                ?>
                                                <div class="item item-list">
                                                    <div class="product-miniature js-product-miniature first_item"
                                                         data-id-product="12" data-id-product-attribute="232"
                                                         itemscope itemtype="http://schema.org/Product">
                                                        <div class="thumbnail-container">

                                                            <a href="{{ route('customer.product.show',$product_i->id) }}"
                                                               class="thumbnail product-thumbnail two-image">
                                                                <img class="img-fluid image-cover"
                                                                     src="{{ show_image($product_i->image) }}"
                                                                     alt=""
                                                                     data-full-size-image-url="{{ show_image($product_i->image) }}"
                                                                     width="600"
                                                                     height="600"
                                                                >
                                                                <img
                                                                    class="img-fluid image-secondary"
                                                                    src="{{ show_image($product_i->image) }}"
                                                                    alt=""
                                                                    data-full-size-image-url="{{ show_image($product_i->image) }}"
                                                                    width="600"
                                                                    height="600"
                                                                >
                                                            </a>

                                                            <div class="product-flags discount">Sale</div>

                                                        </div>
                                                        <div class="product-description">
                                                            <div class="product-groups">

                                                                <div class="product-title" itemprop="name">
                                                                    <a
                                                                        href="{{ route('customer.product.show',$product_i->id) }}">
                                                                        {{ $product_i->details }}
                                                                    </a>
                                                                </div>

                                                                <div class="product-comments">
                                                                    <div class="star_content">
                                                                        <div class="star"></div>
                                                                        <div class="star"></div>
                                                                        <div class="star"></div>
                                                                        <div class="star"></div>
                                                                        <div class="star"></div>
                                                                    </div>
                                                                    <span>0 review</span>
                                                                </div>

                                                                <p class="seller_name">
                                                                    <a title="View seller profile"
                                                                       href="{{ route('customer.product.show',$product_i->id) }}">
                                                                        <i class="fa fa-user"></i>
                                                                        {{ $product_i->merchant->user->name }}
                                                                    </a>
                                                                </p>


                                                                <div class="product-group-price">

                                                                    <div class="product-price-and-shipping">
                                                                        <span itemprop="price" class="price">{{ $product_i->price }}$</span>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="product-buttons d-flex justify-content-center"
                                                                 itemprop="offers" itemscope
                                                                 itemtype="http://schema.org/Offer">
                                                                <form
                                                                    action="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق"
                                                                    method="post" class="formAddToCart">
                                                                    <input type="hidden" name="token"
                                                                           value="28add935523ef131c8432825597b9928">
                                                                    <input type="hidden" name="id_product"
                                                                           value="12">
                                                                    <a class="add-to-cart" href="#"
                                                                       data-button-action="add-to-cart"><i
                                                                            class="novicon-cart"></i><span>أضف للسلة</span></a>
                                                                </form>


                                                                <a class="addToWishlist wishlistProd_12" href="#"
                                                               data-rel="12"
                                                               onclick="WishlistCart('wishlist_block_list', 'add', '12', false, 1); return false;">
                                                                <i class="fa fa-heart"></i>
                                                                <span>Add to Wishlist</span>
                                                            </a>

                                                            <a href="#" class="quick-view hidden-sm-down"
                                                               data-link-action="quickview">
                                                                <i class="fa fa-search"></i><span> نظرة سريعة</span>
                                                            </a>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="nov-productlist  productlist-rows     col-xl-8 col-lg-8 col-md-8 col-xs-12 col-md-12">
                                <div class="block block-product clearfix">
                                    <h2 class="title_block">
                                        NEW ARRIVALS
                                    </h2>
                                    <div class="block_content">
                                        <div id="productlist1693764381"
                                             class="product_list grid owl-carousel owl-theme multi-row"
                                             data-autoplay="false" data-autoplayTimeout="6000" data-loop="false"
                                             data-margin="30" data-dots="false" data-nav="true" data-items="2"
                                             data-items_large="2" data-items_tablet="3" data-items_mobile="1">

                                            @for($i=0;$i<6;$i++)
                                                <div class="item text-center">
                                                    @for($j=0;$j<3;$j++)

                                                        <?php
                                                        /** @var  $first_random_18_product */
                                                        /** @var  $j */
                                                        /** @var  $i */
                                                        $product_i = $first_random_18_product[$j + ($i * 3)]; ?>
                                                        <div
                                                            class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row last_item"
                                                            data-id-product="3" data-id-product-attribute="95"
                                                            itemscope itemtype="http://schema.org/Product">
                                                            <div class="col-12 col-w40 pl-0">
                                                                <div class="thumbnail-container">

                                                                    <a href="{{ route('customer.product.show',$product_i->id) }}"
                                                                       class="thumbnail product-thumbnail two-image">
                                                                        <img
                                                                            class="img-fluid image-cover"
                                                                            src="{{ show_image($product_i->image) }}"
                                                                            alt=""
                                                                            data-full-size-image-url="{{ show_image($product_i->image) }}"
                                                                            width="600"
                                                                            height="600"
                                                                        >
                                                                        <img
                                                                            class="img-fluid image-secondary"
                                                                            src="{{ show_image($product_i->image) }}"
                                                                            alt=""
                                                                            data-full-size-image-url="{{ show_image($product_i->image) }}"
                                                                            width="600"
                                                                            height="600"
                                                                        >
                                                                    </a>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-w60 no-padding">
                                                                <div class="product-description">
                                                                    <div class="product-groups">

                                                                        <!-- begin modules/novproductcomments/novproductcomments_reviews.tpl -->
                                                                        <div class="product-comments">
                                                                            <div class="star_content">
                                                                                <div class="star star_on"></div>
                                                                                <div class="star star_on"></div>
                                                                                <div class="star star_on"></div>
                                                                                <div class="star star_on"></div>
                                                                                <div class="star star_on"></div>
                                                                            </div>
                                                                            <span>5 review</span>
                                                                        </div>
                                                                        <!-- end modules/novproductcomments/novproductcomments_reviews.tpl -->

                                                                        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->
                                                                        <p class="seller_name">
                                                                            <a title="View seller profile"
                                                                               href="{{ route('customer.product.show',$product_i->id) }}">
                                                                                <i class="fa fa-user"></i>
                                                                                {{ $product_i->merchant->user->name }}
                                                                            </a>
                                                                        </p>

                                                                        <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->


                                                                        <div class="product-title" itemprop="name"><a
                                                                                href="{{ route('customer.product.show',$product_i->id) }}">Mauris
                                                                                {{ $product_i->details }}
                                                                            </a></div>

                                                                        <div class="product-group-price">

                                                                            <div class="product-price-and-shipping">

                                                                                <span itemprop="price" class="price">{{ $product_i->price }}$</span>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="product-buttons d-flex justify-content-center"
                                                                        itemprop="offers" itemscope
                                                                        itemtype="http://schema.org/Offer">
                                                                        <form
                                                                            action="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق"
                                                                            method="post" class="formAddToCart">
                                                                            <input type="hidden" name="token"
                                                                                   value="28add935523ef131c8432825597b9928">
                                                                            <input type="hidden" name="id_product"
                                                                                   value="3">
                                                                            <a class="add-to-cart" href="#"
                                                                               data-button-action="add-to-cart"><i
                                                                                    class="novicon-cart"></i><span>أضف للسلة</span></a>
                                                                        </form>

                                                                        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                                                        <a class="addToWishlist wishlistProd_3" href="#"
                                                                           data-rel="3"
                                                                           onclick="WishlistCart('wishlist_block_list', 'add', '3', false, 1); return false;">
                                                                            <i class="fa fa-heart"></i>
                                                                            <span>Add to Wishlist</span>
                                                                        </a>
                                                                        <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                                                        <a href="#" class="quick-view hidden-sm-down"
                                                                           data-link-action="quickview">
                                                                            <i class="fa fa-search"></i><span> نظرة سريعة</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novpagemanage/views/source/productlist.tpl -->
                        </div>
                    </div>
                    <div class="nov-row spacing-30 col-lg-12 col-xs-12">
                        <div class="nov-row-wrap row">

                        </div>
                    </div>
                    <div class="nov-row  col-lg-12 col-xs-12">
                        <div class="nov-row-wrap row">
                            <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novpagemanage/views/source/productlist.tpl -->

                            <div class="nov-productlist   productlist-slider      col-xl-9 col-lg-9 col-md-9 col-xs-12 col-md-12 col-lg-12">
                                <div class="block block-product clearfix">
                                    <h2 class="title_block">
                                        TRENDING NOW
                                    </h2>
                                    <div class="block_content">
                                        <div id="productlist381904327"
                                             class="product_list grid owl-carousel owl-theme multi-row"
                                             data-autoplay="false" data-autoplayTimeout="6000" data-loop="false"
                                             data-margin="0" data-dots="false" data-nav="true" data-items="3"
                                             data-items_large="3" data-items_tablet="3" data-items_mobile="2">

                                            @for($i=0;$i<6;$i++)
                                                <div class="item text-center">
                                                    @for($j=0;$j<2;$j++)
                                                        <?php $product_i = $forth_random_12_product[$i*2 + $j]; ?>
                                                        <div
                                                            class="product-miniature js-product-miniature item-one first_item"
                                                            data-id-product="3" data-id-product-attribute="95"
                                                            itemscope itemtype="http://schema.org/Product">
                                                            <div class="thumbnail-container">

                                                                <a href="{{ route("customer.product.show",$product_i->id) }}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{ show_image($product_i->image) }}"
                                                                alt=""
                                                                data-full-size-image-url="{{ show_image($product_i->image) }}"
                                                                width="600"
                                                                height="600"
                                                            >
                                                            <img
                                                                class="img-fluid image-secondary"
                                                                src="{{ show_image($product_i->image) }}"
                                                                alt=""
                                                                data-full-size-image-url="{{ show_image($product_i->image) }}"
                                                                width="600"
                                                                height="600"
                                                            >
                                                        </a>


                                                    </div>

                                                    <div class="product-description">
                                                        <div class="product-groups">

                                                            <div class="category-title">
                                                                <a
                                                                    href="{{ route("customer.product.show",$product_i->id) }}">
                                                                    {{ $product_i->name }}
                                                                </a>
                                                            </div>


                                                            <!-- begin modules/novproductcomments/novproductcomments_reviews.tpl -->
                                                            <div class="product-comments">
                                                                <div class="star_content">
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                </div>
                                                                <span>5 review</span>
                                                            </div>

                                                            <p class="seller_name">
                                                                <a title="View seller profile"
                                                                   href="http://demo.bestprestashoptheme.com/savemart/ar/jmarketplace/2_taylor-jonson/">
                                                                    <i class="fa fa-user"></i>
                                                                    {{ $product_i->merchant->user->name }}
                                                                </a>
                                                            </p>

                                                            <div class="product-title" itemprop="name"><a
                                                                    href="{{ route("customer.product.show",$product_i->id) }}">Mauris
                                                                    {{ $product_i->details }}
                                                                </a></div>

                                                            <div class="product-group-price">
                                                                <div class="product-price-and-shipping">
                                                                    <span itemprop="price" class="price">{{ $product_i->price }}$</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-buttons d-flex justify-content-center"
                                                             itemprop="offers" itemscope
                                                             itemtype="http://schema.org/Offer">
                                                            <form action="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق"
                                                                  method="post" class="formAddToCart">
                                                                <input type="hidden" name="token"
                                                                       value="28add935523ef131c8432825597b9928">
                                                                <input type="hidden" name="id_product"
                                                                       value="3">
                                                                <a class="add-to-cart" href="#"
                                                                   data-button-action="add-to-cart"><i
                                                                        class="novicon-cart"></i><span>أضف للسلة</span></a>
                                                            </form>

                                                            <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                                            <a class="addToWishlist wishlistProd_3" href="#"
                                                               data-rel="3"
                                                               onclick="WishlistCart('wishlist_block_list', 'add', '3', false, 1); return false;">
                                                                <i class="fa fa-heart"></i>
                                                                <span>Add to Wishlist</span>
                                                            </a>
                                                            <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                                            <a href="#" class="quick-view hidden-sm-down"
                                                               data-link-action="quickview">
                                                                <i class="fa fa-search"></i><span> نظرة سريعة</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div
                                class="nov-productlist     productlist-liststyle-2  col-xl-3 col-lg-3 col-md-3 col-xs-12 col-md-12 col-lg-12">
                                <div class="block block-product clearfix">
                                    <h2 class="title_block">
                                        BEST SELLERS
                                    </h2>
                                    <div class="block_content">
                                        <div id="productlist331208303"
                                             class="product_list grid owl-carousel owl-theme multi-row"
                                             data-autoplay="false" data-autoplayTimeout="6000" data-loop="false"
                                             data-margin="0" data-dots="false" data-nav="true" data-items="1"
                                             data-items_large="3" data-items_tablet="2" data-items_mobile="1">
                                            <div class="item  text-center">
                                                @for($i=0;$i<6;$i++)
                                                    <?php $product_i = $third_random_6_product[$i]; ?>
                                                    <div
                                                        class="d-flex flex-wrap align-items-start product-miniature js-product-miniature  first_item"
                                                        data-id-product="1" data-id-product-attribute="40"
                                                        itemscope itemtype="http://schema.org/Product">
                                                        <div class="col-12 col-w37 no-padding">
                                                            <div class="thumbnail-container">

                                                                <a href="{{ route("customer.product.show",$product_i->id) }}"
                                                                   class="thumbnail product-thumbnail two-image">
                                                                    <img
                                                                        class="img-fluid image-cover"
                                                                        src="{{ show_image($product_i->image) }}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{ show_image($product_i->image) }}"
                                                                        width="600"
                                                                        height="600"
                                                                    >
                                                                    <img
                                                                        class="img-fluid image-secondary"
                                                                        src="{{ show_image($product_i->image) }}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{ show_image($product_i->image) }}"
                                                                        width="600"
                                                                        height="600"
                                                                    >
                                                                </a>

                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-w63 no-padding">
                                                            <div class="product-description">
                                                                <div class="product-groups">

                                                                <div class="product-comments">
                                                                    <div class="star_content">
                                                                        <div class="star star_on"></div>
                                                                        <div class="star star_on"></div>
                                                                        <div class="star star_on"></div>
                                                                        <div class="star star_on"></div>
                                                                        <div class="star star_on"></div>
                                                                    </div>
                                                                    <span>5 review</span>
                                                                </div>
                                                                    <p class="seller_name">
                                                                        <a title="View seller profile"
                                                                           href="{{ route("customer.product.show",$product_i->id) }}">
                                                                            <i class="fa fa-user"></i>
                                                                            {{ $product_i->merchant->user->name }}
                                                                        </a>
                                                                    </p>

                                                                    <div class="product-title" itemprop="name">
                                                                        <a
                                                                            href="{{ route("customer.product.show",$product_i->id) }}">
                                                                            {{ $product_i->details }}
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span itemprop="price" class="price">{{ $product_i->price }}$</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
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


    </div>
@endsection
