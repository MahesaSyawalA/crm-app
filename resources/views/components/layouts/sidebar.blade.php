        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->

                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect">
                                <i class="bx bx-home"></i>
                                <span key="t-dashboard">Dashboard</span>
                            </a>
                        </li>

                        @role('admin')
                            <li class="menu-title" key="t-menu">Admin</li>

                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bx-buildings"></i>
                                    <span key="t-places">Kelola Tempat</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('buildings.index') }}" key="t-buildings">Gedung</a></li>
                                    <li><a href="{{ route('floors.index') }}" key="t-floors">Lantai</a></li>
                                    <li><a href="{{ route('rooms.index') }}" key="t-rooms">Ruang</a></li>
                                    <li><a href="{{ route('roompositions.index') }}" key="t-room-positions">Posisi Ruang</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bx-group"></i>
                                    <span key="t-users">Kelola User</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('users.index') }}" key="t-users">User</a></li>

                                    <li class="sub-menu-title" key="t-menu">Assign Role</li>

                                    <li><a href="{{ route('marketings.index') }}" key="t-marketings">Marketing</a></li>
                                    <li><a href="{{ route('technicians.index') }}" key="t-technicians">Teknik</a></li>
                                    <li><a href="{{ route('finances.index') }}" key="t-finances">Keuangan</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="{{ route('grades.index') }}" class="waves-effect">
                                    <i class="bx bx-bar-chart-square"></i>
                                    <span key="t-chat">Kelola Grade</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('services.index') }}" class="waves-effect">
                                    <i class="bx bx-wrench"></i>
                                    <span key="t-file-manager">Additional Service</span>
                                </a>
                            </li>
                        @endrole

                        @role('marketing')
                            <li class="menu-title" key="t-menu">Marketing</li>

                            <li>
                                <a href="{{ route('leadmanagements.index') }}" class="waves-effect">
                                    <i class="bx bx-user"></i>
                                    <span key="t-lead-managements">Lead Management</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('tenants.index') }}" class="waves-effect">
                                    <i class="bx bx-user-check"></i>
                                    <span key="t-tenants">Data Tenant</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('contracts.index') }}" class="waves-effect">
                                    <i class="bx bx-file"></i>
                                    <span key="t-contracts">Data Kontrak Sewa</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('billings.index') }}" class="waves-effect">
                                    <i class="bx bx-spreadsheet"></i>
                                    <span key="t-billings">Data Billing</span>
                                </a>
                            </li>
                        @endrole

                        @role('hod')
                            <li class="menu-title" key="t-menu">Kepala Divisi</li>

                            <li>
                                <a href="{{ route('approvals.index') }}" class="waves-effect">
                                    <i class="bx bx-list-check"></i>
                                    <span key="t-approvals">Approval Sewa</span>
                                </a>
                            </li>
                        @endrole

                        @role('technician')
                            <li class="menu-title" key="t-menu">Teknik</li>

                            <li>
                                <a href="{{ route('caters.index') }}" class="waves-effect">
                                    <i class='bx bx-hard-hat'></i>
                                    <span key="t-caters">Kelola User Cater</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('electricities.index') }}" class="waves-effect">
                                    <i class="bx bx-bolt-circle"></i>
                                    <span key="t-electricities">Kelola Tarif Listrik</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('powers.index') }}" class="waves-effect">
                                    <i class="bx bx-bulb"></i>
                                    <span key="t-powers">Kelola Daya Tenant</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('standmeters.index') }}" class="waves-effect">
                                    <i class='bx bx-tachometer'></i>
                                    <span key="t-standmeters">Kelola Standmeter</span>
                                </a>
                            </li>
                        @endrole

                        @role('finance')
                            <li class="menu-title" key="t-menu">Keuangan</li>

                            <li>
                                <a href="{{ route('accounts.index') }}" class="waves-effect">
                                    <i class='bx bx-credit-card-alt'></i>
                                    <span key="t-accounts">Kelola Rekening</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('invoicesfinance.index') }}" class="waves-effect">
                                    <i class="bx bx-receipt"></i>
                                    <span key="t-invoices-fn">Data Invoice</span>
                                </a>
                            </li>
                        @endrole

                        @role('tenant')
                            <li class="menu-title" key="t-menu">Tenant</li>

                            <li>
                                <a href="{{ route('invoicestenant.index') }}" class="waves-effect">
                                    <i class='bx bx-receipt'></i>
                                    <span key="t-invoices-tn">Data Invoice</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('receipts.index') }}" class="waves-effect">
                                    <i class="bx bx-receipt"></i>
                                    <span key="t-receipts">Kwitansi</span>
                                </a>
                            </li>
                        @endrole

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
