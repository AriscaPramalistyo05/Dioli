    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="section_tittle">
                    <p>Popular Menu</p>
                    <h2>Delicious Food Menu</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="nav nav-tabs food_menu_nav" id="myTab" role="tablist">
                    @foreach ($menus as $kategori => $menuList)
                        <a class="{{ $loop->first ? 'active' : '' }}" id="{{ str_replace(' ', '-', $kategori) }}-tab"
                            data-toggle="tab" href="#{{ str_replace(' ', '-', $kategori) }}" role="tab"
                            aria-controls="{{ str_replace(' ', '-', $kategori) }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $kategori }} <img
                                src="assets/img/icon/play.svg" alt="play"></a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    @foreach ($menus as $kategori => $menuList)
                        <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                            id="{{ str_replace(' ', '-', $kategori) }}" role="tabpanel"
                            aria-labelledby="{{ str_replace(' ', '-', $kategori) }}-tab">
                            <div class="row">
                                @foreach ($menuList as $menu)
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="single_food_item media">
                                            <img src="{{ Storage::url($menu->gambar) }}" alt="{{ $menu->title }}">
                                            <div class="media-body align-self-center">
                                                <h3>{{ $menu->title }}</h3>
                                                <p>{{ $menu->deskripsi }}</p>
                                                <h5>Rp. {{ number_format($menu->harga, 0, ',', '.') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
