@extends('layout.web.master')

@section('title', 'Home')

@section('content')

    <!-- Image Search -->
    <section class="banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>{{ __('ui.about_us') }}</h2>
                        <span style="font-size: 18px">{{ __('ui.about_us_long') }}</span>
                        <div class="blue-button">
                            <a class="scrollTo" data-scrollTo="popular" href="about.html">{{ __('ui.discover_more') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <div class="StaticBox">
                        <h3 class="boxTitle">
                            {{ __('ui.as_of_date', ['date' => Carbon\Carbon::now()->toFormattedDateString()]) }}</h3>
                        <div class="whiteBox">
                            <div class="rightText">
                                <h3>77</h3>
                                <p>{{ __('ui.dead') }}</p>
                                <div class="subRightText">
                                    <h3>60</h3>
                                    <h3>70</h3>
                                </div>
                                <div class="subRightText">
                                    <p>{{ __('ui.gunshot') }}</p>
                                    <p>{{ __('ui.assault') }}</p>
                                </div>
                            </div>
                            <div class="leftText">
                                <h3>77</h3>
                                <p>Dead</p>
                                <div class="subLeftText">
                                    <h3>60</h3>
                                    <h3>70</h3>
                                </div>
                                <div class="subRightText">
                                    <p>Arrested</p>
                                    <p>Released</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="submit-form">
                            <form id="form-submit" action="" method="get">
                                <div class="row">
                                    <div class="col-md-3 first-item">
                                        <fieldset>
                                            <input name="name" type="text" class="form-control" id="name"
                                                placeholder="Your name..." required="" />
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3 second-item">
                                        <fieldset>
                                            <input name="location" type="text" class="form-control" id="location"
                                                placeholder="Type location..." required="" />
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3 third-item">
                                        <fieldset>
                                            <select required name="category" onchange="this.form">
                                                <option value="">Select category...</option>
                                                <option value="Shops">Shops</option>
                                                <option value="Hotels">Hotels</option>
                                                <option value="Restaurants">Restaurants</option>
                                                <option value="Events">Events</option>
                                                <option value="Meetings">Meetings</option>
                                                <option value="Fitness">Fitness</option>
                                                <option value="Cafes">Cafes</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="btn">
                                                Search Now
                                            </button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </section>
    <!-- Image Search -->

    <!-- Card Container -->
    <section class="featured-Cards" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>{{ __('ui.detained_civilians') }}</h2>
                        <span>{{ __('ui.latest_arrested_civilians') }}</span>
                    </div>
                </div>
            </div>
            <p class="browse"><a href="./ListPage.html">
                    {{ __('ui.browse_all') }}
                </a></p>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="{{ asset('web/img/featured_item_1.jpg') }} " alt="" />
                        </div>
                        <div class="down-content">
                            <h4>Samson</h4>
                            <p>
                                24
                            </p>
                            <p>
                                Yangon
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="{{ asset('web/img/featured_item_2.jpg') }} " alt="" />
                        </div>
                        <div class="down-content">
                            <h4>Samson</h4>
                            <p>
                                24
                            </p>
                            <p>
                                Yangon
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="{{ asset('web/img/featured_item_3.jpg') }} " alt="" />
                        </div>
                        <div class="down-content">
                            <h4>Samson</h4>
                            <p>
                                24
                            </p>
                            <p>
                                Yangon
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="{{ asset('web/img/featured_item_3.jpg') }} " alt="" />
                        </div>
                        <div class="down-content">
                            <h4>Samson</h4>
                            <p>
                                24
                            </p>
                            <p>
                                Yangon
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="{{ asset('web/img/featured_item_1.jpg') }} " alt="" />
                        </div>
                        <div class="down-content">
                            <h4>Samson</h4>
                            <p>
                                24
                            </p>
                            <p>
                                Yangon
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="{{ asset('web/img/featured_item_2.jpg') }} " alt="" />
                        </div>
                        <div class="down-content">
                            <h4>Samson</h4>
                            <p>
                                24
                            </p>
                            <p>
                                Yangon
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="{{ asset('web/img/featured_item_3.jpg') }} " alt="" />
                        </div>
                        <div class="down-content">
                            <h4>Samson</h4>
                            <p>
                                24
                            </p>
                            <p>
                                Yangon
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="{{ asset('web/img/featured_item_3.jpg') }} " alt="" />
                        </div>
                        <div class="down-content">
                            <h4>Samson</h4>
                            <p>
                                24
                            </p>
                            <p>
                                Yangon
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Card Container -->

@endsection
