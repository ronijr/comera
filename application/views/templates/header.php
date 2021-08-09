<div class="navbar navbar-default">
    <div class="navbar-header">
    
        <a style="color:#fff; font-weight:bold;" class="navbar-brand navbar-brand-center" href="<?php echo base_url('dashboard'); ?>">
        <img style="width:100;margin-left:-65px; margin-right:5px; display:inline; height:40px; margin-top:-10px;" class="navbar-brand-logo" src="<?php echo base_url(); ?>/assets/img/logo_2.png" alt="Comera">
        CV COMERA    
        </a>
        <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
        <span class="sr-only">Toggle navigation</span>
        <span class="bars">
            <span class="bar-line bar-line-1 out"></span>
            <span class="bar-line bar-line-2 out"></span>
            <span class="bar-line bar-line-3 out"></span>
        </span>
        <span class="bars bars-x">
            <span class="bar-line bar-line-4"></span>
            <span class="bar-line bar-line-5"></span>
        </span>
        </button>
        <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="arrow-up"></span>
        <span class="ellipsis ellipsis-vertical">
            <img class="ellipsis-object" width="32" height="32" src="#" alt="">
        </span>
        </button>
    </div>
    <div class="navbar-toggleable">
        <nav id="navbar" class="navbar-collapse collapse">
        <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="bars">
            <span class="bar-line bar-line-1 out"></span>
            <span class="bar-line bar-line-2 out"></span>
            <span class="bar-line bar-line-3 out"></span>
            <span class="bar-line bar-line-4 in"></span>
            <span class="bar-line bar-line-5 in"></span>
            <span class="bar-line bar-line-6 in"></span>
            </span>
        </button>
        <ul class="nav navbar-nav navbar-right">
            <li class="visible-xs-block">
            <h4 class="navbar-text text-center">Hi, Admin</h4>
            </li>
            <li class="hidden-xs hidden-sm">
            <form class="navbar-search navbar-search-collapsed">
                <div class="navbar-search-group">
                <input class="navbar-search-input" type="text" placeholder="Search for people, companies, and more&hellip;">
                <button class="navbar-search-toggler" title="Expand search form ( S )" aria-expanded="false" type="submit">
                    <span class="icon icon-search icon-lg"></span>
                </button>
                <button class="navbar-search-adv-btn" type="button">Advanced</button>
                </div>
            </form>
            </li>
            <li class="dropdown hidden-xs">
            <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
                <img class="rounded" width="36" height="36" src="<?php echo ($this->session->userdata('data_user')[0]->kry_image != "") ?  base_url($this->session->userdata('data_user')[0]->kry_image) : base_url('assets/img/noimage-user.jpeg'); ?>" alt=""> <?php echo $this->session->userdata('data_user')[0]->kry_nama; ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="divider"></li>
                <li class="navbar-upgrade-version">Version: 1.0.0</li>
                <li class="divider"></li>
                <li><a href="profile.html">Profil</a></li>
                <li><a href="<?php echo base_url('login/logout'); ?>">Log out</a></li>
            </ul>
            </li>
            <li class="visible-xs-block">
            <a href="contacts.html">
                <span class="icon icon-users icon-lg icon-fw"></span>
                Contacts
            </a>
            </li>
            <li class="visible-xs-block">
            <a href="profile.html">
                <span class="icon icon-user icon-lg icon-fw"></span>
                Profile
            </a>
            </li>
            <li class="visible-xs-block">
            <a href="login-1.html">
                <span class="icon icon-power-off icon-lg icon-fw"></span>
                Sign out
            </a>
            </li>
        </ul>
        </nav>
    </div>
</div>