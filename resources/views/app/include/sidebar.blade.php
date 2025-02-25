<!-- {{ $menuActive = strtolower($menuActive) }} -->

<ul class="nav">

    <li class="nav-item {{ ($menuActive == 'dasbor')?'active':'non-active' }} ">
        <a class="nav-link" href="{{route('viewDashboard')}}">
            <i class="material-icons">dashboard</i>
            <p> Daftar Rekening </p>
        </a>
    </li>

    <li class="nav-item {{ ($menuActive == 'kredit')?'active':'non-active' }} ">
        <a class="nav-link" href="{{route("viewMasterPengajuanKredit")}}">
            <i class="material-icons">dashboard</i>
            <p> Pengajuan Kredit </p>
        </a>
    </li>

    <li class="nav-item {{ ($menuActive == '')?'active':'non-active' }} ">
        <a class="nav-link" href="">
            <i class="material-icons">dashboard</i>
            <p> Virtual Account </p>
        </a>
    </li>

    <li class="nav-item {{ ($menuActive == 'feedback')?'active':'non-active' }} ">
        <a class="nav-link" href="{{route('viewMasterFeedback')}}">
            <i class="material-icons">dashboard</i>
            <p> Saran & Keluhan </p>
        </a>
    </li>

    <li class="nav-item {{ ($menuActive == '')?'active':'non-active' }} ">
        <a class="nav-link" href="{{route('viewUpdatePin')}}">
            <i class="material-icons">dashboard</i>
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
