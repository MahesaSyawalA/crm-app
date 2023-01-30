        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Admin</li>

                        <li>
                            <a href="#" class="has-arrow waves-effect">
                                <i class="bx bx-buildings"></i>
                                <span key="t-places">Kelola Tempat</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('buildings') }}" key="t-buildings">Gedung</a></li>
                                <li><a href="{{ route('floors') }}" key="t-floors">Lantai</a></li>
                                <li><a href="{{ route('rooms') }}" key="t-rooms">Ruang</a></li>
                                <li><a href="{{ route('rpositions') }}" key="t-rpositions">Posisi Ruang</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="has-arrow waves-effect">
                                <i class="bx bx-group"></i>
                                <span key="t-users">Kelola User</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('marketings') }}" key="t-marketings">Marketing</a></li>
                                <li><a href="{{ route('technicians') }}" key="t-technicians">Teknik</a></li>
                                <li><a href="{{ route('finances') }}" key="t-finances">Keuangan</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('grades') }}" class="waves-effect">
                                <i class="bx bx-bar-chart-square"></i>
                                <span key="t-chat">Kelola Grade</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('services') }}" class="waves-effect">
                                <i class="bx bx-wrench"></i>
                                <span key="t-file-manager">Additional Service</span>
                            </a>
                        </li>

                        <li class="menu-title" key="t-menu">Marketing</li>

                        <li>
                            <a href="{{ route('leadmanagements') }}" class="waves-effect">
                                <i class="bx bx-user"></i>
                                <span key="t-lead-managements">Lead Management</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('tenants') }}" class="waves-effect">
                                <i class="bx bx-user-check"></i>
                                <span key="t-tenants">Data Tenant</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('contracts') }}" class="waves-effect">
                                <i class="bx bx-file"></i>
                                <span key="t-contracts">Data Kontrak Sewa</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('billings') }}" class="waves-effect">
                                <i class="bx bx-spreadsheet"></i>
                                <span key="t-billings">Data Billing</span>
                            </a>
                        </li>

                        <li class="menu-title" key="t-menu">Kepala Divisi</li>

                        <li>
                            <a href="{{ route('approvals') }}" class="waves-effect">
                                <i class="bx bx-list-check"></i>
                                <span key="t-approvals">Approval Sewa</span>
                            </a>
                        </li>

                        <li class="menu-title" key="t-menu">Teknik</li>

                        <li>
                            <a href="{{ route('caters') }}" class="waves-effect">
                                <i class='bx bx-hard-hat'></i>
                                <span key="t-caters">Kelola User Cater</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('electricities') }}" class="waves-effect">
                                <i class="bx bx-bolt-circle"></i>
                                <span key="t-electricities">Kelola Tarif Listrik</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('powers') }}" class="waves-effect">
                                <i class="bx bx-bulb"></i>
                                <span key="t-powers">Kelola Daya Tenant</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('standmeters') }}" class="waves-effect">
                                <i class='bx bx-tachometer'></i>
                                <span key="t-standmeters">Kelola Standmeter</span>
                            </a>
                        </li>

                        <li class="menu-title" key="t-menu">Keuangan</li>

                        <li>
                            <a href="{{ route('accounts') }}" class="waves-effect">
                                <i class='bx bx-credit-card-alt'></i>
                                <span key="t-accounts">Kelola Rekening</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('invoices-fn') }}" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-invoices-fn">Data Invoice</span>
                            </a>
                        </li>

                        <li class="menu-title" key="t-menu">Tenant</li>

                        <li>
                            <a href="{{ route('invoices-tn') }}" class="waves-effect">
                                <i class='bx bx-receipt'></i>
                                <span key="t-invoices-tn">Data Invoice</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('receipts') }}" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-receipts">Kwitansi</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
