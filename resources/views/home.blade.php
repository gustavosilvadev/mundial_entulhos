
@include('partials.header')
@include('partials.nav')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <!-- <div class="content-wrapper container-xxl p-0"> -->
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">

                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="content-detached content"> -->
                <div class="content-body">

                    <?php if($conteudos):?>
                        <?php foreach ($conteudos as $conteudo) { ?>
                            <section id="default-divider">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <a href="/page/{{$conteudo->slug}}" class="text-dark">
                                                <div class="card-header bg-dark w-24">
                                                    <h4 class="card-title text-white">
                                                            {{$conteudo->created_at}}
                                                    </h4>
                                                </div>

                                                <div class="card-body p-2">
                                                    <h1>{{$conteudo->titulo}}</h1>
                                                    <hr style="height:1px;border:none;background-color:#CCC;"/>
                                                    <!-- <em class="card-text"><b>19/03/2022 - 17:45</b></em> -->
                                                    <em class="card-text"><b>{{$conteudo->created_at}}</b></em>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </section>

                         <?php } ?>

                    <?php else:?>
                    <?php endif;?>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>
    <!-- END: Content-->

@include('partials.footer')
