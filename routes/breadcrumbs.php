<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', url('/'));
});
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Profile', url('profile'));
});
Breadcrumbs::for('account', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Account', url('account'));
});
Breadcrumbs::for('adminPanel', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Admin Panel', url('adminPanel'));
});
