<nav class="navbar navbar-expand-lg navbar-light nav-color">
    <a class="navbar-brand" href="/">
        <img src="logo.png" width="30" height="30"
             class="d-inline-block align-top" alt="">
        JoinMeet
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/meetList">
                    Встречи</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">
                    <img src="{{ asset('enter.png') }}" width="20" height="20"
                         class="d-inline-block align-top" alt="">
                    Вход</a>
            </li>
        </ul>
    </div>
</nav>