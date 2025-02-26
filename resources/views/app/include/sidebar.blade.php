<!-- {{ $menuActive = strtolower($menuActive) }} -->

<ul class="nav">

    <li class="nav-item {{ ($menuActive == 'home')?'active':'non-active' }} ">
        <a class="nav-link" href="{{route('viewHome')}}">
            <i class="material-icons">dashboard</i>
            <p> Menu Utama </p>
        </a>
    </li>

    <li class="nav-item {{ ($menuActive == 'dasbor')?'active':'non-active' }} ">
        <a class="nav-link" href="{{route('viewDashboard')}}">
            <i class="fas fa-money-check-alt"></i>
            <p> Daftar Rekening </p>
        </a>
    </li>

    <li class="nav-item {{ ($menuActive == 'kredit')?'active':'non-active' }} ">
        <a class="nav-link" href="{{route("viewMasterPengajuanKredit")}}">
            <i class="fas fa-file-invoice-dollar fa-lg"></i>
            <p> Pengajuan Kredit </p>
        </a>
    </li>

    <li class="nav-item {{ ($menuActive == 'va')?'active':'non-active' }} ">
        <a class="nav-link" href="{{route('viewMasterVA')}}">
            <i class="fas fa-receipt fa-lg"></i>
            <p> Virtual Account </p>
        </a>
    </li>

    <li class="nav-item {{ ($menuActive == 'feedback')?'active':'non-active' }} ">
        <a class="nav-link" href="{{route('viewMasterFeedback')}}">
            <i class="fa-solid fa-comments"></i>
            <p> Saran & Keluhan </p>
        </a>
    </li>

    <li class="nav-item {{ ($menuActive == '')?'active':'non-active' }} ">
        <a class="nav-link" href="{{route('viewUpdatePin')}}">
            <i class="fa-solid fa-user-lock fa-2xl"></i>
            <p> Ganti PIN </p>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal10">
            <i class="material-icons">power_settings_new</i>
            <p> Exit </p>
        </a>
    </li>
</ul>
