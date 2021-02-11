<div class="navbar-fixed">
    <nav class="red lighten-1">
        <div class="nav-wrapper">
            <div class="row">
                <div class="col s12">
                    <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
                    <a href="#" target="_blank" class="brand-logo">Cadastro de <span class="hide-on-small-only">Devedores e Dívidas</span>
                        </span>
                    </a>
                    <ul class="right">
                        <li>
                            <a class="btn dark-toggle transparent z-depth-0" href="#" onclick="localStorage.setItem('mode', (localStorage.getItem('mode') || 'dark') === 'dark' ? 'light' : 'dark'); localStorage.getItem('mode') === 'dark' ? document.querySelector('body').classList.add('dark') : document.querySelector('body').classList.remove('dark')" title="Dark/light"><i class="material-icons left">brightness_4</i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<ul id="slide-out" class="sidenav">
    <li><a class="subheader">Links</a></li>
    <li><a href="#!">First Link</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">More links</a></li>
    <li><a href="#!">Third Link</a></li>
    <li><a href="#!">Fourth Link</a></li>
    <li><a href="https://codepen.io/collection/nbBqgY">More Materialize Pens</a></li>
    <li><a class="dark-toggle" href="#" onclick="localStorage.setItem('mode', (localStorage.getItem('mode') || 'dark') === 'dark' ? 'light' : 'dark'); localStorage.getItem('mode') === 'dark' ? document.querySelector('body').classList.add('dark') : document.querySelector('body').classList.remove('dark')" title="Dark/light"><i class="material-icons left">brightness_4</i> Toggle Dark Mode</a></li>
</ul>

