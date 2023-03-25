<nav class="navbar navbar-expand-lg navbar-light nav-laundry mt-0">
            <div class="container">
              <a class="navbar-brand" href="/" style="display: none"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    {{-- <ul class="navbar-nav navbar-left" style="width: 100px">
                      <li class="nav-item">
                        @if (!request()->is('/'))
                        <a href="/" class="text-decoration-none nav-link" style="color: black"><h5> Home</h5></a>
                        @endif
                      </li>
                    </ul> --}}
                    <ul class="navbar-nav navbar-right ml-auto">
                      
                      <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? ' active' : ''}}" aria-current="page" href="/about">Tentang</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ request()->is('layanan') ? ' active' : ''}}" href="/layanan">Layanan</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? ' active' : ''}}" href="/contact">Hubungi Kami</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ request()->is('faq') ? ' active' : ''}}" href="/faq">FAQ</a>
                      </li>
                      <li class="nav-item">
                        <a href="/login" class="nav-link {{ request()->is('login') ? ' active' : ''}}">Masuk</a>
                      </li>                       
                    </ul>
                  </div>
            </div>
          </nav>