<!--**********************************
            Sidebar start
        ***********************************-->
@php
    $users = auth()->user()->can('add users') || auth()->user()->can('edit users') || auth()->user()->can('delete users');
    $roles = auth()->user()->can('add roles') || auth()->user()->can('edit roles') || auth()->user()->can('delete roles');
    $permissions = auth()->user()->can('add permissions') || auth()->user()->can('edit permissions') || auth()->user()->can('delete permissions');
    $mous = auth()->user()->can('add mous') || auth()->user()->can('edit mous') || auth()->user()->can('delete mous');
    $items = auth()->user()->can('add items') || auth()->user()->can('edit items') || auth()->user()->can('delete items');
    $methods = auth()->user()->can('add methods') || auth()->user()->can('edit methods') || auth()->user()->can('delete methods');
    $transaction = auth()->user()->can('add transactions') || auth()->user()->can('edit transactions') || auth()->user()->can('delete transactions');
 @endphp
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                            </li> -->
            <li><a href="home" aria-expanded="false">
                    <i class="icon icon-globe-2"></i><span class="nav-text">Dashboard</span></a></li>
            
            @if($transaction)
            <li class="nav-label">Transaksi</li>
            <li><a href="{{ route('transactions.index') }}" aria-expanded="false">
                <i class="icon icon-globe-2"></i><span class="nav-text">Transaksi</span></a></li>
            </li>
            @endif

            @if($users || $roles || $permissions || $methods || $items || $mous)
            <li class="nav-label">Master</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Data Master</span></a>
                <ul aria-expanded="false">
                    @if($users)
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                    @endif
                    @if($roles)
                    <li><a href="{{ route('roles.index') }}">Roles</a></li>
                    @endif
                    @if($permissions)
                    <li><a href="{{ route('permissions.index') }}">Privilages</a></li>
                    @endif
                    @if($items)
                    <li><a href="{{ route('items.index') }}">Items</a></li>
                    @endif
                    @if($mous)
                    <li><a href="{{ route('mous.index') }}">UoM</a></li>
                    @endif
                    @if($methods)
                    <li><a href="{{ route('methods.index') }}">Pembayaran</a></li>
                    @endif
            </li>
            @endif
        </ul>
    </div>
</div>
<!--**********************************
                    Sidebar end
                ***********************************-->