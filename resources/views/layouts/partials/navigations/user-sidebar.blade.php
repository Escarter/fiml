<nav id="sidebar" class="px-0 bg-dark bg-gradient sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="logo-nav-item">
            <a class="navbar-brand" href="#">
                <img src="img/logo-white.png" width="145" height="32.3" alt="FIML">
            </a>
        </li>
        @if (Auth::user()->status == 'Active')
            <li>
                <h6 class="nav-header">General</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index.html">
                    <i class="batch-icon batch-icon-browser-alt"></i>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <li>
                    <h6 class="nav-header">Trainings</h6>
                </li>
                <li class="nav-item">
                    <a href="/users/training-content/forex" class="nav-link" >
                        <i class="batch-icon batch-icon-transfer"></i>
                        Forex Training
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/users/training-content/binary" class="nav-link">
                        <i class="batch-icon batch-icon-tag-alt-3"></i>
                        Binary Training
                        </a>
                </li>
                <li class="nav-item">
                    <a href="/users/training-content/fiml" class="nav-link" >
                        <i class="batch-icon batch-icon-support-alt-2"></i>
                        FIML Training
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/users/training-content/affiliate" class="nav-link">
                        <i class="batch-icon batch-icon-wallet-alt"></i>
                        Marketing and Affiliate 
                    </a>
                </li>
            </li>
        </ul>

        <ul class="nav nav-pills flex-column">
            <li>
                <h6 class="nav-header">Resources Download</h6>
            </li>
            <li class="nav-item">
                <a href="/users/downloadable-content/pdf" class="nav-link">
                    <i class="batch-icon batch-icon-document"></i>
                    Download pdf
                </a>
            </li>
            <li class="nav-item">
                <a href="/users/downloadable-content/robot" class="nav-link">
                    <i class="batch-icon batch-icon-settings-alt-3"></i>
                    Trading bots
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column">
            <li>
                <h6 class="nav-header">Affiliate Section</h6>
            </li>
            <li class="nav-item">
                <a href="/users/downloadable-content/pdf" class="nav-link">
                    <i class="batch-icon batch-icon-document"></i>
                    Download pdf
                </a>
            </li>
            <li class="nav-item">
                <a href="/users/downloadable-content/robot" class="nav-link">
                    <i class="batch-icon batch-icon-settings-alt-3"></i>
                    Trading bots
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column">
            <li>
                <h6 class="nav-header">Profile Section</h6>
            </li>
            <li class="nav-item">
                <a href="/users/downloadable-content/pdf" class="nav-link">
                    <i class="batch-icon batch-icon-settings-alt-2"></i>
                   Account Settings
                </a>
            </li>
            <li class="nav-item">
                <a href="/logout" class="nav-link">
                    <i class="batch-icon batch-icon-power"></i>
                    Logout
                </a>
            </li>
        </ul>
    @else
    <ul class="nav nav-pills flex-column">
        <li>
            <h6 class="nav-header">Account Activation</h6>
        </li>
        <li class="nav-item">
            <a href="/users/pricing" class="nav-link">
                <i class="batch-icon batch-icon-credit-card"></i>
                Pricing 
            </a>
        </li>
        <li class="nav-item">
            <a href="/logout" class="nav-link">
                <i class="batch-icon batch-icon-power"></i>
                Logout
            </a>
        </li>
    </ul>
    @endif
    <ul class="nav nav-pills flex-column">
        <li>
            <h6 class="nav-header">Support</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="calendar.html">
                <i class="batch-icon batch-icon-headphones"></i>
                FAQs
            </a>
        </li>
    </ul>
  
</nav>
